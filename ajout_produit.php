<?php
//REQUIRE de init.php
require_once "init.php";
/**
 * 4status de fichier sur git
 *  -untrack => les fichiers crée mais non suivies par git
 *  -tracked => fichier déja suivi par git mais non envoyé vers le repository
 *  -staged => les fichiers suivi enregistré mais non envoyé vers le repository
 *  -commitred => Tous les fichiers envoyé et non modifié de mon projet
 * 
 */

if (!empty($_POST)) {
    if (!empty($_FILES["photo"]["name"])) {
        
    copy($_FILES['photo']['tmp_name'],'photos/'. time() .'-'.$_FILES['photo']['name']);
    }
    $requete= $bdd->prepare("INSERT INTO produit VALUES (NULL,:titre, :prix, :description, :photo)");

    $success = $requete->execute([
            ':titre' => $_POST['titre'],
            ':prix' => $_POST['prix'],
            ':description' => $_POST['description'],
            ':photo' =>  time() .'-'.$_FILES['photo']['name'],
        ]);

        if($success){
            $successMessage="ENVOIE REUSSI";
        } else {
            $errorMessage="ENVOIE ECHOUE";
        }

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout en BDD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    
<h1 class="text-center mt-5">Ajout produit</h1>

    <?php if (!empty($successMessage)) 
    {
        echo '<div class="alert alert-success col-md-6 mx-auto text-center"> ';
        echo $successMessage;
        echo '</div>';
    }
    ?>

    <?php if (!empty($errorMessage)) {
        echo '<div class="alert alert-danger col-md-6 mx-auto text-center"> ';
        echo $errorMessage;
        echo '</div>';
    }

    ?>
    
    
    <form action="" class="col-md-6 mx-auto" method="post"  enctype="multipart/form-data">
            <label for="titre" class="form-label">titre</label>
            <input type="text" class="form-control" name="titre" id="titre">

            <label for="prix" class="form-label">prix</label>
            <input type="number" class="form-control" name="prix" id="prix" step="0.1">

    
            <label for="description">description</label>
            <textarea class="form-control rounded-0" name="description" id="description" rows="3"></textarea>
            
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" name="photo" id="photo">

            <button class="btn btn-success mt-3 d-block mx-auto">Enregistrer</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>