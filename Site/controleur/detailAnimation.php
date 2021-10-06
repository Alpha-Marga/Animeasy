<?php

include_once("$racine/modele/animation.php");
include_once("$racine/modele/animationDAO.php");
include_once("$racine/modele/enfant.php");
include_once("$racine/modele/activite.php");
include_once("$racine/modele/activiteDAO.php");
include_once("$racine/modele/animateur.php");

// RECUPERATION DU NUMERO D"ANIMATION
$numAnimation = $_GET["NUM_ANIMATION"];

// RECUPERATION D"UNE ANIMATION
$uneAnimation = animationDAO::chargerUneAnimation($numAnimation);


include("$racine/vue/entete.html.php");
include("$racine/vue/vueDetailAnimation.php");
include("$racine/vue/pied.html.php");



