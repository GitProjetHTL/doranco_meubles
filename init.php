<?php
//CONNRCTION BDD
try {
    $bdd = new PDO("mysql:host=localhost;dbname=meubles","root","",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ]);
} catch (\Exception $e) {
    die ("ERROR CONNECTION BDD:" .$e->getMessage());
}

//CREATION DE LA FUNCTION DEBUG

function debug ($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

//INITIALSATION DES VARIABLES GLOBALES
$successMessage="";
$errorMessage="";

?>