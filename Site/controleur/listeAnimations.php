<?php

include_once('modele/animation.php');
include_once('modele/animationDAO.php');
include_once('modele/enfant.php');
include_once('modele/activite.php');
include_once('modele/activiteDAO.php');
include_once('modele/animateur.php');

//RECUPERATION DES ANIMATIONS

$listeAnimations = animationDAO::chargerLesAnimations();


include('vue/entete.html.php');
include('vue/vueAnimations.php');
include("$racine/vue/pied.html.php");






