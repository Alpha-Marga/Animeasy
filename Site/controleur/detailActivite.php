<?php

include_once("$racine/modele/enfant.php");
include_once("$racine/modele/activite.php");
include_once("$racine/modele/activiteDAO.php");
include_once("$racine/modele/materiel.php");
include_once("$racine/modele/materielDAO.php");
include_once("$racine/modele/materielUtilise.php");
include_once("$racine/modele/materielUtiliseDAO.php");

// RECUPERATION DU NUMERO D'UNE ACTIVITE
$numActivite = $_GET["NUM_ACTIVITE"];

// RECUPERATION DE L'ACTIVITE
$uneActivite = activiteDAO::chargerActivite($numActivite);

// RECUPERATION DES MATERIELS UTILISES PAR L'ACTIVITE
$materielsUtilises = materielUtiliseDAO::chargerMaterielsUtilises($numActivite);

include("$racine/vue/entete.html.php");
include("$racine/vue/vueDetailActivite.php");
include("$racine/vue/pied.html.php");
