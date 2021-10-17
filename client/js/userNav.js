var userNavEl = document.getElementById("userNav");
var accountWidgetEl = document.getElementById("accountWidget");
var cartWidgetEl = document.getElementById("cartWidget");
var accountButtonEl = document.getElementById("accountButton");
var cartButtonEl = document.getElementById("cartButton");

    accountButtonEl.addEventListener("click", displayAccountWidget);
    cartButtonEl.addEventListener("click", displayCartWidget);

var activeFlip = 0;

function displayAccountWidget() {

    if(activeFlip = 1) {
        cartButtonEl.classList.remove("flip-active");
        cartWidgetEl.classList.remove("cart-content-active");
        userNavEl.classList.remove("user-nav-cart-widget");
    }

    activeFlip = 1;
    accountButtonEl.classList.toggle("flip-active");
    accountWidgetEl.classList.add("account-content-active");
    userNavEl.classList.toggle("user-nav-account-widget");
}
function displayCartWidget() {

    if(activeFlip = 1) {
        accountButtonEl.classList.remove("flip-active");
        accountWidgetEl.classList.remove("account-content-active");
        userNavEl.classList.remove("user-nav-account-widget");
    }

    activeFlip = 1;
    cartButtonEl.classList.toggle("flip-active");
    cartWidgetEl.classList.add("cart-content-active");
    userNavEl.classList.toggle("user-nav-cart-widget");
}