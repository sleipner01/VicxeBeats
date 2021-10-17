<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MartinsBeats | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="media/imgs/vicxe.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="css/login-register.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <?php
                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "emptyfields") {
                                echo '<p class="error-message">Fill in all the fields!</p>';
                            }
                            else if ($_GET['error'] == "invalidFNameInvalidSNameInvalidemail") {
                                echo '<p class="error-message">Invalid name and email!</p>';
                            }
                            else if ($_GET['error'] == "invalidemail") {
                                echo '<p class="error-message">Invalid email!</p>';
                            }
                            else if ($_GET['error'] == "invalidFName") {
                                echo '<p class="error-message">Invalid first name!</p>';
                            }
                            else if ($_GET['error'] == "invalidSName") {
                                echo '<p class="error-message">Invalid second name!</p>';
                            }
                            else if ($_GET['error'] == "passwordCheck") {
                                echo '<p class="error-message">The passwordfields did not match!</p>';
                            }
                            else if ($_GET['error'] == "emailInUse") {
                                echo '<p class="error-message">The email is already in use!</p>';
                            }
                        }
                    ?>
                    <form action="PHPscripts/register.inc.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="First name" name="fName">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Second name" name="sName">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Confirm password" name="confirmed-password">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="register-submit">Register</button>
                        </div>
                        <p>Already signed in? Log in <a href="login.php">here</a>!<br>Don't want to register? <a href="index.php">Go back</a>!</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>