
function display() {
    var value = document.getElementById("hidden-product").style.display;
    
    if(value == "block") {
        document.getElementById("hidden-product").style.display = "none";
        document.getElementById("button-text").innerHTML = "Afficher plus";
    } else {
        document.getElementById("hidden-product").style.display = "block";
        document.getElementById("button-text").innerHTML = "Affichez moins";
    }
    
}
