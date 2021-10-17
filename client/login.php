<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MartinsBeats | Log in</title>
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
                    <h2 class="title">Log in</h2>
                    <form action="PHPscripts/login.inc.php" method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="login-submit">Log in</button>
                        </div>
                        <p>Not signed in? Sign in <a href="register.php">here</a>! <br>Don't want to log in? <a href="index.php">Go back</a>!</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>