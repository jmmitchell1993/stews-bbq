//any javascript relating to the navigation

function myFunction() {
    var x = document.getElementById("myTopNav");
    
    if (x.className === "nav-container") {

        x.className += " responsive";

    } else {
        x.className = "nav-container";
    }
}