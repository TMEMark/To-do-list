window.onscroll = function() {myFunction()};
var nav_bar_up = document.getElementsByClassName("nav_bar_up");
var sticky = nav_bar_up.offsetTop;
function myFunction() {
    if (window.pageYOffset >= sticky) {
      nav_bar_up.classList.add("sticky")
    } else {
      nav_bar_up.classList.remove("sticky");
    }
}



