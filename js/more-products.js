
function display() {
    
    //var products = document.querySelectorAll('[id=hidden-product]');
    var value =  document.getElementById("hidden-product").style.display;
    //var value = products[0].style.display;
    
    if(value == "block") {
        
        //for(var i=0; i<products.length; i++) {
        //    products[i].style.display = "none";
        //}
        
        document.getElementById("hidden-product").style.display = "none";
        document.getElementById("button-text").innerHTML = "Afficher plus";
    } else {
        //for(var i=0; i<products.length; i++) {
        //    products[i].style.display = "block";
        //}
        document.getElementById("hidden-product").style.display = "block";
        document.getElementById("button-text").innerHTML = "Affichez moins";
    }
}