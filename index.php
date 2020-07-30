<?php

    // CONNEXION A LA BDD
    require_once("init.php");

    // Récupération de tous les produits en BDD
    $result = $pdo->query("SELECT * FROM produit");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo 2 - INSERT / POST / AJAX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

<div class="container">


    <div class="row col-md-10 mx-auto mt-5">

        <div class="col-md-12 msg">
        </div>

        <!-- SELECT OPTION qui permet de charger la fiche produit du produit sélectionné -->

        <div class="col-md-3 mt-5">

            <!-- CRÉATION DE MON SELECT DE FAÇON DYNAMIQUE -->

            <select class="custom-select" id="selectProduit">
                <option value="0" disabled selected> Veuillez choisir un produit</option>
                <?php while( $produit = $result->fetch(PDO::FETCH_ASSOC) ) { ?>
                    <option value="<?php echo $produit['id_produit'] ?>"> <?php echo $produit['titre'] ?> </option>
                <?php } ?>
            </select>

        </div>

        <div class="col-md-9">

            <form id="myForm" action="" method="POST" enctype="multipart/form-data">
            
                <input type="hidden" name="id_produit" id="id_produit">

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="reference">Reference</label>
                        <input type="text" class="form-control" id="reference" name="reference">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="categorie">Categorie</label>
                        <input type="text" class="form-control" id="categorie" name="categorie">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="couleur">Couleur</label>
                        <input type="text" class="form-control" id="couleur" name="couleur">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="taille">Taille</label>
                        <input type="text" class="form-control" id="taille" name="taille">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" id="prix" name="prix">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock">
                    </div>
                    <div class="w-100"></div>

                    <!-- FAIRE VARIABLED LE SELECTED DES INPUTS -->

                    <div class="form-group col-md-2">
                        <label for="public_m">Public</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="public_m" name="public" class="custom-control-input" value="m" checked>
                            <label class="custom-control-label" for="public_m">Masculin</label>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="public_f" style="color:transparent">Public</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="public_f" name="public" class="custom-control-input" value="f">
                            <label class="custom-control-label" for="public_f">Féminin</label>
                        </div>
                    </div>
                    
                    <div class="custom-file mb-5">
                        <input type="file" class="custom-file-input" name="photo">
                        <label class="custom-file-label" for="photo">Choisir une photo</label>

                        <img id="photo" class="img-fluid" style="width:40px" src="http://localhost:8080/php/boutique/photo/11-d-23_bleu.jpg">

                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                </div>
                                        
                <button type="submit" class="btn btn-primary" name="modifierUnproduit">Modifier un produit</button>

            </form>

        </div>

    </div>

    

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>