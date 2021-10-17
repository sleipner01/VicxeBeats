<?php
$stylesheet = "style";
$page = "Account";

$s;

if(file_exists('includes/' . $_GET['s'] . '.php')) {
    $s = 'includes/' . $_GET['s'] . '.php';
} else {
    header("Location: index.php?error=sNotExist");
    exit();
}

require '../database-login/dbh.inc.php';
include_once "includes/header.php";

if(isset($_SESSION['isAdmin'])) {
    echo '<div class="admin">
            <div class="admin-container">
                <p>You are an admin. Visit the admin page: </p>
                <form action="../admin-panel-bootstrap/dashboard.php" method="POST">
                    <button type="submit" name="admin-submit">
                        <i class="fas fa-user-shield fa-2x"></i>
                    </button>
                </form>
            </div>
        </div>';
}
?>

<section class="account-header">
    <a href="index.php" style="display: inline-block;">Go back</a>
    <h1 style="display: inline-block;">Account details</h1>
</section>

<section class="account">
    <div class="account-n">
        <div class="account-uname">
            <p><?php echo $_SESSION["fName"] . ' ' . $_SESSION["sName"]?></p>
        </div>
        <span>
            <a href="account.php?s=beats">My beats</a>
            <a href="account.php?s=orders">Order history</a>
            <a href="account.php?s=settings">My profile</a>
        </span>
    </div>

    <div class="account-main">
        <?php require_once $s; ?>
    </div>
</section>
<?php
include_once "includes/footer.php";
?>