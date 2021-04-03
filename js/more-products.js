function display(idCategorie, nbProducts, isMobile) {
    
    //var products = document.querySelectorAll('[id=categorie-height]');

  //  var categorieProperties = document.getElementById("categorie-"+idCategorie);

//    window.alert(categorieProperties.length);
//var test =  document.getElementById("categorie-"+idCategorie).getElementsByClassName("hidden-product");
//window.alert(test.innerHTML);
    

    var value =  document.getElementById("categorie-"+idCategorie).getElementsByClassName("hidden-product")[0].style.display;
    var pixelToDisplay;
    var pixelToHide;

    var containerWidth = window.screen.width;

    if(containerWidth >= 500 && containerWidth <= 800) {
        pixelToDisplay = (nbProducts/2) * 312 + 156;
        pixelToHide = (nbProducts/2) + 312;
    } else if(isMobile) {
        pixelToDisplay = nbProducts * 312;
        pixelToHide = 936;
    } else {
        pixelToDisplay = (nbProducts/3) * 312 + 200;
        pixelToHide = 312;
    }
    
    if(value == "block") {
        
        hiddenElements = document.getElementById("categorie-"+idCategorie).getElementsByClassName("hidden-product");

        for(var i=0; i<hiddenElements.length; i++) {
            hiddenElements[i].style.display = "none";
        }
        document.getElementById("categorie-"+idCategorie).getElementsByClassName("button-text")[0].innerHTML = "Afficher plus";

        //for(var i=0; i<products.length; i++) {
                //products[2].style.height = "312px";
                document.getElementById("categorie-"+idCategorie).getElementsByClassName("isotope")[0].style.height = pixelToHide+"px";
          //  }
    } else {
        //for(var i=0; i<products.length; i++) {
        //    products[i].style.display = "block";
        //}
        hiddenElements = document.getElementById("categorie-"+idCategorie).getElementsByClassName("hidden-product");

        for(var i=0; i<hiddenElements.length; i++) {
            hiddenElements[i].style.display = "block";
        }
        document.getElementById("categorie-"+idCategorie).getElementsByClassName("button-text")[0].innerHTML = "Affichez moins";

        //for(var i=0; i<products.length; i++) {
            document.getElementById("categorie-"+idCategorie).getElementsByClassName("isotope")[0].style.height = pixelToDisplay+"px";
        //}

    }
}