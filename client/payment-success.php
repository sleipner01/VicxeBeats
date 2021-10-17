<?php
    $stylesheet = 'style';
    $page = "Cancelled";

    require '../database-login/dbh.inc.php';

    require 'includes/header.php';
    require 'includes/user-nav.php';
?>

<?php
//Check the payment, all of the Api stuff from Stripe

//Send confirmation mail to user

//Clear the SessionCart

//Update user SQL, give access to beat-download
?>

<h1>Thank you for your purchase!</h1>
<p>A receipt has been sent to your email</p>
<p><a href="#">Go to your account and download the beat</a></p>


<?php
    require 'includes/footer.php';
?>