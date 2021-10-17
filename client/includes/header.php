<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MartinsBeats <?php echo "| $page"; ?></title>
    <base href="http://localhost/prosjekter/VicxeBeats/client/index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="media/imgs/vicxe.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/<?php echo $stylesheet?>.css" />
    <script src="https://kit.fontawesome.com/724ce007b4.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php if($page == "" || $page == "beats") { echo '<script src="https://js.stripe.com/v3/"></script>'; } ?>
    <script src="js/cartJS/addToCart.js"></script>
    <script src="js/cartJS/resetCart.js"></script>

</head>
<body>