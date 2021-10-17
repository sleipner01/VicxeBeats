<?php

session_start();
if (isset($_SESSION['email'])) {
    
    require 'dbh.inc.php';

    $email = $_SESSION['email'];
    $password =  $_SESSION['password'];

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
                header("Location: ../index.php?error=wrongPassword");
                exit();
            }
            /* Check if password is correct */
            else if ($passwordCheck == true) {
                session_unset();
                $_SESSION['userId'] = $row['userId'];
                $_SESSION['fName'] = $row['fName'];
                $_SESSION['sName'] = $row['sName'];

                header("Location: ../index.php?signupLogin=success");
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
else {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}