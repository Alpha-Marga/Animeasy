<?php

include_once("$racine/modele/animation.php");
include_once("$racine/modele/animationDAO.php");
include_once("$racine/modele/enfant.php");
include_once("$racine/modele/enfantDAO.php");
include_once("$racine/modele/activite.php");
include_once("$racine/modele/activiteDAO.php");
include_once("$racine/modele/animateur.php");
include_once("$racine/modele/animateurDAO.php");
include_once("$racine/modele/activiteAnime.php");
include_once("$racine/modele/activiteAnimeDAO.php");
include_once("$racine/modele/materiel.php");
include_once("$racine/modele/materielDAO.php");
include_once("$racine/modele/materielUtilise.php");
include_once("$racine/modele/materielUtiliseDAO.php");


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////MISE A JOUR DE LA GESTION DES LISTES////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// RECUPERATION DE DONNEES POUR AJOUTER UNE ANIMATION DE LA LISTE

if (isset($_POST["NUM_ANIM"]) && isset($_POST["LIBELLE_ANIMATION"])&& isset($_POST["THEME"])&& isset($_POST["PRESENTATION"])&& isset($_POST["DATE_DEBUT"])&& isset($_POST["DATE_DEBUT"]) && isset($_POST["CHEMIN_P"])){
        $numero=$_POST["NUM_ANIM"];
        $libelle=$_POST["LIBELLE_ANIMATION"];
        $theme=$_POST["THEME"];
        $presentation=$_POST["PRESENTATION"];
        $dateDebut=$_POST["DATE_DEBUT"];
        $dateFin=$_POST["DATE_FIN"];
        $cheminP =$_POST["CHEMIN_P"];

    
    if($numero !=""){
         $ajoutAnimation = animationDAO::ajoutAnimationDAO($numero, $libelle, $theme, $presentation, $dateDebut, $dateFin, $cheminP);
    }
    
    
}


// RECUPERATION DE DONNEES POUR SUPPRIMER UNE ANIMATION DE LA LSITE 

elseif(isset($_POST["NumAnimS"])){
    
     $leNumero=$_POST["NumAnimS"];
     
     if($leNumero !=""){
         $suppAnimation = animationDAO::suppAnimationDAO($leNumero);
     }

}



// RECUPERATION DE DONNEES POUR MODIFEIR LA PERIODE D'UNE ANIMATION

elseif(isset($_POST["NumAnim"]) && isset($_POST["DateDebut"]) && isset($_POST["DateFin"])){
        $numAnim = $_POST["NumAnim"];
        $date_Debut = $_POST["DateDebut"];
        $date_Fin = $_POST["DateFin"];
    
     if($numAnim !=""){
         $modifAnimation = animationDAO::updateAnimation($numAnim, $date_Debut, $date_Fin);
     }

}



// RECUPERATION DE DONNEES POUR AJOUTER UNE ACTIVITE DANS LA LISTE

elseif(isset($_POST["NumeroActivite"]) && isset($_POST["Categorie"])&& isset($_POST["Designation"])&& isset($_POST["Description"])&& isset($_POST["NbMin"])&& isset($_POST["NbMax"]) && isset($_POST["Photo"])){
        $numeroActivite=$_POST["NumeroActivite"];
        $categorie=$_POST["Categorie"];
        $designation=$_POST["Designation"];
        $description=$_POST["Description"];
        $nbMin=$_POST["NbMin"];
        $nbMax=$_POST["NbMax"];
        $photo=$_POST["Photo"];

   
        if($numeroActivite !=""){
            $ajoutActivite = activiteDAO::ajoutActiviteDAO($numeroActivite, $categorie, $designation, $description, $nbMin, $nbMax, $photo);
    }
    
    
}


// RECUPERATION DE DONNEES POUR SUPPRIMER UNE ACTIVITE DE LA LISTE

elseif(isset($_POST["NumeroActiviteS"])){
     $numeroActiviteS=$_POST["NumeroActiviteS"];
     
        if($numeroActiviteS !=""){
           $suppActivite = activiteDAO::suppActiviteDAO($numeroActiviteS);
        }

}



// RECUPERATION DE DONNEES POUR AJOUTER UNE ACTIVITE ANIME DANS LA LISTE

elseif(isset($_POST["NumActiviteAnime"]) && isset($_POST["NumAnimActivite"])&& isset($_POST["DateActivite"])&& isset($_POST["HeureDebut"])&& isset($_POST["HeureFin"])){
        $numActiviteAnime=$_POST["NumActiviteAnime"];
        $numAnimActivite=$_POST["NumAnimActivite"];
        $date=$_POST["DateActivite"];
        $heureDebut=$_POST["HeureDebut"];
        $heureFin=$_POST["HeureFin"];


        if($numActiviteAnime !=""){
           $ajoutActiviteAnime = activiteAnimeDAO::ajoutActiviteAnime($numAnimActivite, $numActiviteAnime, $date, $heureDebut, $heureFin);
        }
    
    
}

// RECUPERATION DE DONNEES POUR SUPPRIMER UNE ACTIVITE ANIME DE LA LISTE

elseif(isset($_POST["NumActiviteAnimeS"]) && isset($_POST["DateActiviteS"])){
     $numActiviteAnimeS=$_POST["NumActiviteAnimeS"];
     $dateS=$_POST["DateActiviteS"];
    
     if($numActiviteAnimeS !=""){
         $suppActiviteAnime = activiteAnimeDAO::suppActiviteAnime($numActiviteAnimeS, $dateS);
     }

}

// RECUPERATION DE DONNEES POUR MODIFIER LA DATE D'UNE ACTIVITE ANIME 

elseif(isset($_POST["NumActiviteAnimeM"]) && isset($_POST["OldDate"]) && isset($_POST["NewDate"])){
        $numActiviteAnimeM=$_POST["NumActiviteAnimeM"];
        $oldDate=$_POST["OldDate"];
        $newDate=$_POST["NewDate"];
    
     if($numActiviteAnimeM !=""){
         $modifActiviteAnime = activiteAnimeDAO::updateActiviteAnime($numActiviteAnimeM, $oldDate, $newDate);
     }

}


//RECUPERATION DES DONNEES POUR AJOUTER UN ENFANT DANS LA LISTE

elseif(isset($_POST["NumeroEnfant"]) && isset($_POST["NomEnfant"])&& isset($_POST["PrenomEnfant"])&& isset($_POST["Age"])){
        $numeroEnfant=$_POST["NumeroEnfant"];
        $nomEnfant=$_POST["NomEnfant"];
        $prenomEnfant=$_POST["PrenomEnfant"];
        $age=$_POST["Age"];


        if($numeroEnfant !=""){
           $ajoutEnfant = enfantDAO::ajoutEnfantDAO($numeroEnfant, strtoupper($nomEnfant), $prenomEnfant, $age);
        }
    
    
}

// RECUPERATION DES DONNEES POUR SUPPRIMER UN ENFANT DE LA LISTE

elseif(isset($_POST["NumeroEnfantS"])){
     $numeroEnfantS=$_POST["NumeroEnfantS"];
    
    
     if($numeroEnfantS !=""){
         $suppEnfant = enfantDAO::suppEnfantDAO($numeroEnfantS);
     }

}


// RECUPERATION DES DONNEES POUR AJOUTER UN MATERIEL DANS LA LISTE

elseif(isset($_POST["CodeMat"]) && isset($_POST["LibelleMateriel"])){
        $codeMat=$_POST["CodeMat"];
        $libelleMateriel=$_POST["LibelleMateriel"];


        if($codeMat !=""){
           $ajoutMateriel = materielDAO::ajoutMaterielDAO(strtoupper($codeMat), $libelleMateriel);
        }
    
    
}


// RECUPERATION DES DONNEES POUR SUPPRIMER UN MATERIEL DE LA LISTE

elseif(isset($_POST["CodeMatS"])){
        $codeMatS=$_POST["CodeMatS"];


        if($codeMatS !=""){
                $suppMateriel = materielDAO::suppMaterielDAO(strtoupper($codeMatS));
         }

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////MISE A JOUR DES DETAILS D'UNE ANIMATION////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// RECUPERATION DE DONNEES POUR AJOUTER UN ANIMATEUR DANS ANIMATION

elseif (isset($_POST["NumAnimateur"]) || isset($_POST["NumAnimation"])){
        $NumAnimateur=$_POST["NumAnimateur"];
        $NumAnimation=$_POST["NumAnimation"];

        if($NumAnimateur != ""){
        $unAnimateur = animateurDAO::chargerUnAnimateur($NumAnimateur);
        $une_Animation = animationDAO::chargerUneAnimation($NumAnimation);
            if($unAnimateur != NULL){
                $une_Animation->participerAnimateur($unAnimateur);
                $ajoutAnimateurA = animationDAO::ajoutParticiperAnimateur($NumAnimateur, $NumAnimation);
            }
        }
}


// RECUPERATION DE DONNEES POUR SUPPRIMER UN ANIMATEUR D'UNE ANIMATION

elseif(isset($_POST["NumAnimateurS"]) || isset($_POST["NumAnimationS"])){
        $NumAnimateurS=$_POST["NumAnimateurS"];
        $NumAnimationS=$_POST["NumAnimationS"];
    

        if($NumAnimateurS != ""){
        $unAnimateurS = animateurDAO::chargerUnAnimateur($NumAnimateurS);
        $uneAnimationS = animationDAO::chargerUneAnimation($NumAnimationS);
            if($unAnimateurS != NULL){
                $uneAnimationS->deleteAnimateur($unAnimateurS->getNumPersonne());
                $suppAnimateurA = animationDAO::suppParticiperAnimateur($NumAnimateurS, $NumAnimationS);
             }
        }
}



// RECUPERATION DE DONNEES POUR AJOUTER UNE ACTIVITE DANS UNE ANIMATION

elseif(isset($_POST["NumActivite"]) || isset($_POST["NumAnimationActiv"])){
        $NumActivite=$_POST["NumActivite"];
        $NumAnimationActiv=$_POST["NumAnimationActiv"];

        if($NumActivite != ""){
        $uneActivite = activiteDAO::chargerActivite($NumActivite);
        $uneAnimationActiv = animationDAO::chargerUneAnimation($NumAnimationActiv);
            if($uneActivite != NULL){
                $uneAnimationActiv->ajoutActivite($uneActivite);
                $ajoutActiviteA = animationDAO::ajoutActiviteAnimation($NumAnimationActiv, $NumActivite);
        }
}

}


// RECUPERATION DE DONNEES POUR SUPPRIMER UNE ACTIVITE D'UNE ANIMATION

elseif(isset($_POST["NumActiviteS"]) || isset($_POST["NumAnimationAS"])){
        $NumActiviteS=$_POST["NumActiviteS"];
        $NumAnimationAS=$_POST["NumAnimationAS"];
   

        if($NumActiviteS != ""){
        $uneActiviteS = activiteDAO::chargerActivite($NumActiviteS);
        $uneAnimationAS = animationDAO::chargerUneAnimation($NumAnimationAS);
            if($uneActiviteS != NULL){
                //$uneAnimationAS->deleteActivite($uneActiviteS->getNumActivite());
                $suppActiviteA = animationDAO::suppActiviteAnimation($NumAnimationAS, $NumActiviteS);

        }
    }

}


// RECUPERATION DE DONNEES POUR AJOUTER UN ENFANT DANS UNE ANIMATION

elseif(isset($_POST["NumEnfant"]) || isset($_POST["NumAnimationE"])){
        $NumEnfant=$_POST["NumEnfant"];
        $NumAnimationE=$_POST["NumAnimationE"];
    

        if($NumEnfant != ""){
        $unEnfant = enfantDAO::chargerUnEnfant($NumEnfant);
        $uneAnimationE = animationDAO::chargerUneAnimation($NumAnimationE);
            if($unEnfant != NULL){
                $uneAnimationE->participerEnfant($unEnfant);
                $ajoutEnfantA = animationDAO::ajoutParticiperEnfant($NumEnfant, $NumAnimationE);
            }
}

}


// RECUPERATION DE DONNEES POUR SUPPRIMER UN ENFANT D'UNE ANIMATION

elseif(isset($_POST["NumEnfantS"]) || isset($_POST["NumAnimationES"])){
        $NumEnfantS=$_POST["NumEnfantS"];
        $NumAnimationES=$_POST["NumAnimationES"];
    

        if($NumEnfantS != ""){
        $unEnfantS = enfantDAO::chargerUnEnfant($NumEnfantS);
        $uneAnimationES = animationDAO::chargerUneAnimation($NumAnimationES);
            if($unEnfantS != NULL){
                $uneAnimationES->deleteEnfant($unEnfantS->getNumPersonne());
                $suppEnfantA = animationDAO::suppParticiperEnfant($NumEnfantS, $NumAnimationES);
            }
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////MISE A JOUR DES DETAILS D'UNE ACTIVITE////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// RECUPERATION DE DONNEES POUR AJOUTER UN ENFANT APTENT A PRATIQUER UNE ACTIVITE

elseif(isset($_POST["NumEnfantActivite"]) || isset($_POST["NumActiviteDetail"])){
        $NumEnfantActivite=$_POST["NumEnfantActivite"];
        $NumActiviteDetail=$_POST["NumActiviteDetail"];
    

        if($NumEnfantActivite != ""){
        $unEnfantActivite = enfantDAO::chargerUnEnfant($NumEnfantActivite);
        $uneActiviteD = activiteDAO::chargerActivite($NumActiviteDetail);
            if($unEnfantActivite != NULL){
                $uneActiviteD->ajoutEnfantApte($unEnfantActivite);
                $ajoutEnfantAct = activiteDAO::ajoutEnfantApteDAO($NumEnfantActivite, $NumActiviteDetail);
            }
}

}


// RECUPERATION DE DONNEES POUR SUPPRIMER UN ENFANT  QUI N'EST PLUS APTENT A PRATIQUER UNE ACTIVITE

elseif(isset($_POST["NumEnfantActiviteS"]) || isset($_POST["NumActiviteDetailS"])){
        $NumEnfantActiviteS=$_POST["NumEnfantActiviteS"];
        $NumActiviteDetailS=$_POST["NumActiviteDetailS"];
  

        if($NumEnfantActiviteS != ""){
        $unEnfantActiviteS = enfantDAO::chargerUnEnfant($NumEnfantActiviteS);
        $uneActiviteDS = activiteDAO::chargerActivite($NumActiviteDetailS);
             if($unEnfantActiviteS != NULL){
                $uneActiviteDS->suppEnfant($unEnfantActiviteS->getNumPersonne());
                $suppEnfantAct = activiteDAO::suppEnfantApteDAO($NumEnfantActiviteS, $NumActiviteDetailS);
        }
    }
}

// LA PARTIE PERMETTANT D"AJOUTER ET DE SUPPRIMER UN MATERIEL D"UNE ACTIVITE

// RECUPERATION DE DONNEES POUR AJOUTER UN MATERIEL UTILISE PAR UNE ACTIVITE

elseif(isset($_POST["CodeMateriel"]) || isset($_POST["NumActiviteM"]) || isset($_POST["Quantite"]) ){
        $CodeMateriel=$_POST["CodeMateriel"];
        $NumActiviteM=$_POST["NumActiviteM"];
        $Quantite=$_POST["Quantite"];
   

        if($CodeMateriel != ""){
            $ajoutMaterielU = materielUtiliseDAO::ajoutMaterielUtilise(strtoupper($CodeMateriel), $NumActiviteM, $Quantite);
}

}


// RECUPERATION DE DONNEES POUR SUPPRIMER UN MATERIEL QUI N'EST PLUS UTILISES DANS UNE ACTIVITE

elseif(isset($_POST["CodeMaterielS"]) || isset($_POST["NumActiviteMS"])){
        $CodeMaterielS=$_POST["CodeMaterielS"];
        $NumActiviteMS=$_POST["NumActiviteMS"];
    
        if($CodeMaterielS != ""){
            $suppMaterielU = materielUtiliseDAO::suppMaterielUtilise(strtoupper($CodeMaterielS),$NumActiviteMS);
    }
   
}



include("$racine/vue/entete.html.php");
include("$racine/vue/vueMiseJour.php");
include("$racine/vue/pied.html.php");
