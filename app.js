// Toute l'application JS développée se retrouve à
// l'intérieur d'un objet
var app = {};

// Tout le code de notre application
// est encapsulé dans une IIFE pour des raisons de sécurité
(function($){

    "use strict";

    // Predefined variables
    var $document = $(document),
    $body = $("body");

    app.getInfoProduct = function() {

        $("#selectProduit").change(function() {

            var idProduitSelectionne = $(this).val();

            $.ajax({
                url:"bdd.php",
                type:"get",
                data: {
                    id_produit : idProduitSelectionne
                },
                dataType:"json",
                success:function(data) {

                    $.each(data, function(property, value){
                        
                        // INPUT TYPE RADIO
                        if(property == "public") {
                            if(value == "f"){
                                $("#public_f").prop("checked", "true");
                            } else{
                                $("#public_m").prop("checked", "true");
                            }
                        } else if(property == "photo"){
                            $("#" + property).attr("src", value);
                        } else {
                            $("#" + property).val(value);
                        }

                    });
                }
            });

        });

    };

    app.modifyNewProduct = function() {

        $("#myForm").submit(function(e) {

            e.preventDefault();

            var form = $(this).serialize();

            $.ajax({
                url:"bdd.php",
                type:"post",
                data: form,
                dataType: "text",
                success:function(data) {

                    $(".msg").html(data);
                    
                }
            });


        });

    };

    // Tant que la page n'est pas entièrrement chargée
    // Je ne charge pas mes méthodes objet
    $document.ready(function() {
        app.getInfoProduct(); 
        app.modifyNewProduct(); 
    });

})(jQuery);