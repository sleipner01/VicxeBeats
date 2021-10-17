<?php
 // Retrieving header file, and declearing which page this is
    $stylesheet = "style";
    $page = "Checkout";

    require '../database-login/dbh.inc.php';

    require "includes/header.php";
    // Retrieving database information

    //Sends user back to homepage if the cart is empty
    if(!isset($_SESSION['cart'])) {
        header('Location: index.php?cart=empty');
        exit();
    }
    
    require 'includes/user-nav.php';
?>

<section class="checkout-page">
    <h1>Checkout</h1>
</section>


<script src="js/userNav.js"></script>

<?php
    require "includes/footer.php";
?>