<?php

/* Makes sure user arrives from submit-button */
if (isset($_POST['register-submit'])) {

    /* Retrieving database information from external file */
    require "dbh.inc.php";

    /* Retrieving info from form */
    $fName = $_POST['fName'];
    $sName = $_POST['sName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmedPassword = $_POST['confirmed-password'];

    /* If the fields are not complete, user gets sent back with error message and their info*/
    if (empty($fName) || empty($sName) || empty($email) || empty($password) || empty($confirmedPassword)) {
        header("Location: ../register.php?error=emptyFields&fName=".$fName."&sName=".$sName."&email=".$email);
        exit();
    } 
        /* If none of the fields are correct */
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/", $fName) && !preg_match("/^[a-zA-Z]*$/", $sName)) {
            header("Location: ../register.php?error=invalidFNameInvalidSNameInvalidemail");
            exit();
        }
        /* Invalid email */
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../register.php?error=invalidemail&fName=".$fName."&sName=".$sName);
            exit();
        } 
        /* Invalid first name */
        else if (!preg_match("/^[a-zA-Z]*$/", $fName)) {
            header("Location: ../register.php?error=invalidFName&sName=".$sName."&email=".$email);
            exit();
        }
        /* Invalid Second name */
        else if (!preg_match("/^[a-zA-Z]*$/", $sName)) {
            header("Location: ../register.php?error=invalidSName&fName=".$fName."&email=".$email);
            exit();
        }
        else if ($password !== $confirmedPassword) {
            header("Location: ../register.php?error=passwordCheck&fName=".$fName."&sName=".$sName."&email=".$email);
            exit();
        }
        else {

            $sql = "SELECT email from users WHERE email=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../register.php?error=sqlError");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../register.php?error=emailInUse&fName=".$fName."&sName=".$sName);
                exit();
                }
                else {

                    $sql = "INSERT INTO users (fName, sName, email, userPassword) VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../register.php?error=sqlError");
                        exit();
                    }
                        else {
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "ssss", $fName, $sName, $email, $hashedPassword);
                            mysqli_stmt_execute($stmt);

                            session_start();
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;
                            header("Location: signup-auto-login.inc.php");
                            exit();
                        }

                }
            }

        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    
}
else {
    header("Location: ../register.php");
    exit();
}