function display(idCategorie, nbProducts) {
    
    //var products = document.querySelectorAll('[id=categorie-height]');

  //  var categorieProperties = document.getElementById("categorie-"+idCategorie);

//    window.alert(categorieProperties.length);
//var test =  document.getElementById("categorie-"+idCategorie).getElementsByClassName("hidden-product");
//window.alert(test.innerHTML);
    

    var value =  document.getElementById("categorie-"+idCategorie).getElementsByClassName("hidden-product")[0].style.display;
    
    var nbLigneToDisplay = nbProducts/3;
    var ligneInPixel = nbLigneToDisplay * 312 + 312;
    
    if(value == "block") {
        
        //for(var i=0; i<products.length; i++) {
        //    products[i].style.display = "none";
        //}
        
        document.getElementById("categorie-"+idCategorie).getElementsByClassName("hidden-product")[0].style.display = "none";
        document.getElementById("categorie-"+idCategorie).getElementsByClassName("button-text")[0].innerHTML = "Afficher plus";

        //for(var i=0; i<products.length; i++) {
                //products[2].style.height = "312px";
                document.getElementById("categorie-"+idCategorie).getElementsByClassName("isotope")[0].style.height = "312px";
          //  }
    } else {
        //for(var i=0; i<products.length; i++) {
        //    products[i].style.display = "block";
        //}
        document.getElementById("categorie-"+idCategorie).getElementsByClassName("hidden-product")[0].style.display = "block";
        document.getElementById("categorie-"+idCategorie).getElementsByClassName("button-text")[0].innerHTML = "Affichez moins";

        //for(var i=0; i<products.length; i++) {
            document.getElementById("categorie-"+idCategorie).getElementsByClassName("isotope")[0].style.height = ligneInPixel+"px";
        //}

    }
}