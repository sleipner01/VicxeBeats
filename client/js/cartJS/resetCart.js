$(document).ready(function() {
    $("#cartReset").click(function(e) {
        $("#cart").load("PHPscripts/reset-cart.inc.php");
    });
});