$(document).ready(function() {
    $(".addCart").click(function(e) {
        var clicked;
        if(e.target.classList.contains("fa-cart-plus")) {
            clicked = e.target.parentNode;
        } else {
            clicked = e.target;
        }
        var beatId = clicked.id;
        var YouTubeId = clicked.parentNode.parentNode.id;
        $("#cart").load("PHPscripts/add-to-cart.inc.php", {
            selectedBeat: beatId,
            confirmationId: YouTubeId
        });
    });
});