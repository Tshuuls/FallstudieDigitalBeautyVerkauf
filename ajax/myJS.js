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
    $.post("inc/searchProdukt.inc.php", {PID : PID})
                .done(function( data ){
                    document.getElementById("positionsList").innerHtml=document.getElementById("positionsList").innerHtml+data;
            
        });
}