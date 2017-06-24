/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//Es werden die HTML Daten von productlist mit Ajax in den searchrestult DIV geladen.
function searchKunde(S){
        //Der Output von Productlist mit den Parametern SS (Suchstring) und KK (0 bei Suche ohne Kategorie, 1 mit Kategorie) wird in searchresult div geladen.
        $.post("inc/searchCustomer.inc.php", {SS : S})
                .done(function( data ){
                    $("#searchresult").html(data);
        });
    }
    
    function searchProdukt(S){
        //Der Output von Productlist mit den Parametern SS (Suchstring) und KK (0 bei Suche ohne Kategorie, 1 mit Kategorie) wird in searchresult div geladen.
        $.post("inc/searchProdukt.inc.php", {SS : S})
                .done(function( data ){
                    $("#searchresultProdukt").html(data);
            
        });
    }
    
function addProduktToCart(PID){
    $.post("inc/warenkorb.inc.php", {PID : PID,operation:"add"})
                .done(function( data ){
                    $("#WarenkorbDIV").html(data);
            
        });
}
function takeProduktFromCart(PID){
    $.post("inc/warenkorb.inc.php", {PID : PID,operation:"löschen"})
                .done(function( data ){
                    $("#WarenkorbDIV").html(data);
            
        });
}


//updated den counter neben dem icon
function updateWarenkorbCount(counter){
    document.getElementById("warenkorbCount").innerHTML=String(counter);
}
    //löscht/leehrt den warenkorb
function warenkorbLöschen(){
      $.post("inc/warenkorb.inc.php", {operation: 'alleslöschen'}, function(result){
        $("span").html(result);
    });  
    document.getElementById("WarenkorbDIV").innerHTML="<div class='col-md-12'><div class='alert alert-danger'> Der Warenkorb ist leider leer. </div></div>";
        
}

function updateWarenkorb(){
    $.post("inc/warenkorb.inc.php", {})
                .done(function( data ){
                    $("#WarenkorbDIV").html(data);
            
        });
}