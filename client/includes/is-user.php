<div id="userNav" class="user-nav">
    <div class="flips">
        <div id="accountButton" class="flip account-flip">
            <span><i class="fas fa-user-circle"></i></span>
            <p>Account</p>
        </div>

        <div id="cartButton" class="flip cart-flip" style=" <?php if($page == "Checkout") { echo "display: none"; } ?>">
            <span><i class="fas fa-shopping-cart"></i></span>
            <p>Cart</p>
        </div>
    </div>
    <div class="widget-container">
        <div id="accountWidget" class="account-content">
            <div  class="account-header">
                <p>Welcome</p>
                <p class="account-name"><?php echo $_SESSION["fName"] . ' ' . $_SESSION["sName"]?></p>
                <hr>
            </div>
            <div class="account-nav">
                <a href="account.php?s=beats"><i class="fas fa-record-vinyl"></i> My beats</a>
                <a href="account.php?s=orders"><i class="fas fa-shopping-bag"></i> Order history</a>
                <a href="account.php?s=settings"><i class="fas fa-cog"></i> Account Settings</a>
                <a href="PHPscripts/logout.inc.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
            </div>
        </div>

        <?php require 'includes/cart.php'; ?>

    </div>

    
</div>