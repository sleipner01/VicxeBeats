<?php
    session_start();

    $page = 'User';

    if (!$_SESSION['userId'] /*|| !isset($_POST['admin-submit'])*/) {
        header('Location: ../www/index.php');
        exit();
    }

    require "includes/header.php";
    require "includes/nav.php";
?>



    <div class="main-panel">
      <?php
        require "includes/toolbar.php";
      ?>
        <div class="content">
            <div class="container-fluid">
        
            </div>
        </div>


<?php
    require "includes/suffix-bottom.php";
    require "includes/fixed-plugin.php";
    require "includes/scripts-footer.php";
?>