<?php
    $stylesheet = 'style';
    $page = 'Cancelled';
    
    require '../database-login/dbh.inc.php';

    require 'includes/header.php';
    require 'includes/user-nav.php';
?>
<section class="popular">
    <h1>Something went wrong with your purchase</h1>
    <a href="index.php">Go back to the home page</a>
</section>

<script src="js/userNav.js"></script>

<?php
    require 'includes/footer.php';
?>