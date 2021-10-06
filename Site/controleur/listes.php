<?php

include_once("$racine/modele/animation.php");
include_once("$racine/modele/animationDAO.php");
include_once("$racine/modele/enfant.php");
include_once("$racine/modele/enfantDAO.php");
include_once("$racine/modele/activite.php");
include_once("$racine/modele/activiteDAO.php");
include_once("$racine/modele/activiteAnime.php");
include_once("$racine/modele/activiteAnimeDAO.php");
include_once("$racine/modele/animateur.php");
include_once("$racine/modele/animateurDAO.php");
include_once("$racine/modele/materiel.php");
include_once("$racine/modele/materielDAO.php");


// RECUPERATION DE LA LISTE DES ACTIVITES
$listeActivites = activiteDAO::chargerLesActvites();

// RECUPERATION DE LA LISTE DES  ANIMATIONS
$liste_Animations = animationDAO::chargerLesAnimations();

// RECUPERATION DE LA LISTE DES ANIMATEURS
$listeAnimateurs = animateurDAO::chargerLesAnimateurs();

// RECUPERATION DE LA LISTE DES ENFANTS
$listeEnfants = enfantDAO::chargerLesEnfants();

// RECUPERTION DE LA LISTE DES MATERIELS
$listeMateriels = materielDAO::chargerLesMateriels();

// RECUPERATION DE LA LISTE DES ACTIVITES ANIMES
$listeActivitesAnimes = activiteAnimeDAO::chargerLesActivitesAnimes();


include("$racine/vue/entete.html.php");
include("$racine/vue/vueListes.php");
include("$racine/vue/pied.html.php");

