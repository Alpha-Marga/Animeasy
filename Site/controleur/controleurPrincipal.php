<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "listeAnimations.php";
    $lesActions["accueil"] = "listeAnimations.php";
    $lesActions["listes"] = "listes.php";
    $lesActions["detailAnimation"] = "detailAnimation.php";
    $lesActions["detailActivite"] = "detailActivite.php";
    $lesActions["activiteJour"] = "activiteJour.php";
    $lesActions["miseJour"] = "miseAjour.php";
    

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } 
    else {
        return $lesActions["defaut"];
    }
    
}