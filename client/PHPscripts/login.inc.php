<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $email = $_POST['email'];
    $password =  $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../login.php?error=emptyFields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php?error=sqlError");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passwordCheck = password_verify($password, $row['userPassword']);
                /* Checks password for wrong password */
                if ($passwordCheck == false) {
                    header("Location: ../login.php?error=wrongPassword");
                    exit();
                }
                /* Check if password is correct */
                else if ($passwordCheck == true) {

                    session_start();
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['fName'] = $row['fName'];
                    $_SESSION['sName'] = $row['sName'];

                    /* Checks if user is admin*/
                    $sqlAdmin = "SELECT * FROM admins;";
                    $resultAdmin = mysqli_query($conn, $sqlAdmin);
                    if (mysqli_num_rows($resultAdmin) > 0) {
                        // Retrieves data of each row
                        while($rowAdmin = mysqli_fetch_assoc($resultAdmin)) {
                            if($rowAdmin['userId'] == $row['userId']) {
                                if ($rowAdmin['isAdmin'] == 1) {
                                    $_SESSION['isAdmin'] = $rowAdmin['isAdmin'];
                                }
                            }
                        }
                    }

                    header("Location: ../index.php?login=success");
                    exit();
                }
                /* If something else has happened, the user wont get logged in before problem is solved */
                else {
                    header("Location: ../login.php?error=wrongPassword");
                    exit();
                }
            }
            else {
                header("Location: ../login.php?error=noUser");
                exit();
            }

        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
    header("Location: ../login.php");
    exit();
}