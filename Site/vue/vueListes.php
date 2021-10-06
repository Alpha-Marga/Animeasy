
<!-- LISTE ANIMATIONS-->

<h2>Liste des animations</h2>
<br>
<table class ="table_liste">
    <tr>
        <td ><b>Numéro</b></td>
        <td><b>Libelle</b></td>
        <td><b>Thème</b></td>
        <td><b>Date Début</b></td>
        <td ><b>Date Fin</b></td>
    </tr>
<?php
for($i=0; $i<count($liste_Animations); $i++){ ?>
    
    <tr>
          <td><?=$liste_Animations[$i]->getNumAnimation()?></td>
          <td><?=$liste_Animations[$i]->getLibelleAnimation()?></td>
          <td><?=$liste_Animations[$i]->getTheme()?></td>
          <td><?=$liste_Animations[$i]->getDateDebut()?></td>
          <td><?=$liste_Animations[$i]->getDateFin()?></td>
    </tr>
         
  <?php
   }
   ?>

 </table>

<br/><br/>

<div class="formulaire">
            
<!--Formulaire pour ajouter  une animation-->
        
            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Animation </legend><br>
                        <section>
                            <label>Numéro :</label>
                            <input id="zone_text" type="number" name="NUM_ANIM" placeholder="Numero animation" /><br /><br />
                            
                            <label>Libelle :</label>
                            <input id="zone_text" type="text" name="LIBELLE_ANIMATION" placeholder="Libelle animation" /><br /><br />
                            
                            
                            <label>Thème :</label>
                            <input id="zone_text" type="text" name="THEME" placeholder="thème"  /><br /><br/>
                            
                            <label>Présentation :</label>
                            <textarea type="text" name="PRESENTATION" rows="3" cols="50" size="500"></textarea><br/><br/>
                            
                            
                            
                            <label>Date début :</label>
                            <input id="zone_text" type="text" name="DATE_DEBUT" placeholder="AAAA-MM-JJ" /><br/><br/>
                            
                            <label>Date fin :</label>
                            <input id="zone_text" type="text" name="DATE_FIN" placeholder="AAAA-MM-JJ" /><br/><br/>                        
        
                            <label>Photo :</label>
                            <input id="zone_text" type="text" name="CHEMIN_P" placeholder="dossier/nom_image" /><br/><br/>
                            
              
                             <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>


            
<!--Formulaire pour supprimer une animation-->

            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Animation </legend><br>
                        <section>
                              <label>Numéro :</label><div>
                                 <input id="zone_text" type="number" name="NumAnimS" placeholder="Numero animation à supprimer" /><br />    
                           
                                <br />
                                <input  type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
<br>

<!--Formulaire pour modifier la période d'une animation-->
        
            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Modification Période Animation </legend><br>
                        <section>
                            <label>Numéro :</label>
                            <input id="zone_text" type="number" name="NumAnim" placeholder="Numéro animation à modifier" /><br /><br />
                            
                            <label>Date début :</label>
                             <input id="zone_text" type="text" name="DateDebut" placeholder="AAAA-MM-JJ"  /><br /><br/>
                            
                            <label>Date fin :</label>
                            <input id="zone_text" type="text" name="DateFin" placeholder="AAAA-MM-JJ"  /><br /><br/>                                                  
              
                             <input type="submit" value="Modifier"/>
                         </section>
                </fieldset>
            </form>

</div>

<br/><br/><br/>   

<!-- LISTE ACTIVITES-->

<h2>Liste des activités</h2>
<br>
<table class ="table_liste">
    <tr><td><b>Numéro</b></td>
        <td><b>Désignation</b></td>
        <td><b>Catégorie</b></td>
        <td><b>Min Participants</b></td>
        <td><b>Max Partcipants</b></td>
    </tr>
<?php
for($i=0; $i<count($listeActivites); $i++){?>
    <tr>
          <td><?=$listeActivites[$i]->getNumActivite()?></td>
          <td><?=$listeActivites[$i]->getDesignationActivite()?></td>
          <td><?=$listeActivites[$i]->getLibelleCategorie()?></td>
          <td><?=$listeActivites[$i]->getNbMin()?></td>
          <td><?=$listeActivites[$i]->getNbMax()?></td>
    </tr>
   <?php   
   }
   ?>

 </table>
    
<br/><br/>

<div class ="formulaire">
            
<!--Formulaire pour ajouter  une activité-->
        
            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Activité </legend><br>
                        <section>
                            <label>Numéro :</label>
                            <input id="zone_text" type="number" name="NumeroActivite" placeholder="Numero activité" /><br/><br/>
                            
                            <label>Catégorie :</label>
                            <input id="zone_text" type="text" name="Categorie" placeholder="Libelle Categorie" /><br /><br/>
                            
                            
                            <label>Désignation :</label>
                             <input id="zone_text" type="text" name="Designation" placeholder="Designation"  /><br /><br/>
                            
                            <label>Description :</label>                         
                             <textarea type="text" name="Description" rows="3" cols="50" size="500"></textarea><br/><br/>
                            
                            <label>Min Partcipants :</label>
                            <input id="zone_text" type="number" name="NbMin" placeholder="Nombre minimum participants" /><br /><br/>
                            
                            <label>Max Participants :</label>
                            <input id="zone_text" type="number" name="NbMax" placeholder="Nombre maximum participants" /><br /><br/>                        
        
                            <label>Photo :</label>
                            <input id="zone_text" type="text" name="Photo" placeholder="dossier\nom_image" /><br /><br/>                           
              
                             <input  type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>
            
<!--Formulaire pour supprimer une activité-->

            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Activité </legend><br>
                        <section>
                              <label>Numéro :</label><div>
                                 <input id="zone_text" type="number" name="NumeroActiviteS" placeholder="Numero activité à supprimer" /><br />   
                           
                                <br />
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
</div>
<br>


<br/><br/>

<!-- LISTE ACTIVITES ANIMES-->

<h2>Liste des activités prévues d'être animés</h2><br>

<table class ="table_liste">
    <tr>
        <td><b>Numéro</b></td>
        <td><b>Désignation</b></td>
        <td><b>Catégorie</b></td>
        <td><b>Date</b></td>
        <td><b>Debut Activité</b></td>
        <td><b>Fin Activité</b></td>
    </tr>
    
<?php

 $table = array();
 for($i=0; $i<count($listeActivitesAnimes); $i++){
     
     if(!in_array($listeActivitesAnimes[$i]->getActiviteAnime()->getNumActivite(), $table)){?>
        <tr>
           <td><?=$listeActivitesAnimes[$i]->getActiviteAnime()->getNumActivite()?></td>
           <td><?=$listeActivitesAnimes[$i]->getActiviteAnime()->getDesignationActivite()?></td>
           <td><?=$listeActivitesAnimes[$i]->getActiviteAnime()->getLibelleCategorie()?></td>
           <td><?=$listeActivitesAnimes[$i]->getDateActivite()?></td>
           <td><?=$listeActivitesAnimes[$i]->getHeureDebut()?></td>
           <td><?=$listeActivitesAnimes[$i]->getHeureFin()?></td>
        </tr>
        
        <?php
          $table[] = $listeActivitesAnimes[$i]->getActiviteAnime()->getNumActivite();
     }
   }
   ?>
 </table>

<br/><br/>


<div class="formulaire">
<!--Formulaire pour ajouter  une activité animé-->
        
            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Activité Animé </legend><br>
                        <section>
                            <label>N° Animateur :</label>
                             <input id="zone_text" type="number" name="NumAnimActivite" placeholder="Numéro animateur activité" /><br /><br />
                            
                            <label>N° Activité :</label>
                            <input id="zone_text" type="number" name="NumActiviteAnime" placeholder="Numéro activité animé" /><br><br>
                            
                            
                            <label>Date :</label>
                            <input id="zone_text" type="text" name="DateActivite" placeholder="AAAA-MM-JJ"  /><br><br>
                            
                            <label>Heure Début :</label>
                            <input id="zone_text" type="text" name="HeureDebut" placeholder="HH:MM" /><br><br>                           
                            
                            <label>Heure Fin :</label>
                            <input id="zone_text" type="text" name="HeureFin" placeholder="HH:MM" /><br><br>                        
        
                             <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>
            
<!--Formulaire pour supprimer une activité animé-->

            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Activité Animé </legend><br>
                        <section>
                              <label>Numéro :</label>
                              <input id="zone_text" type="number" name="NumActiviteAnimeS" placeholder="Numéro activité à supprimer" /><br><br>
                           
                               <label>Date :</label>
                               <input id="zone_text" type="text" name="DateActiviteS" placeholder="AAAA-MM-JJ"  /><br /><br>
                               
                               <input  type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
<br>

<!--Formulaire pour modifier la date d'animation d'une activité-->
        
            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Modification Date Activité </legend><br>
                        <section>
                            <label>Numéro :</label>
                            <input id="zone_text" type="number" name="NumActiviteAnimeM" placeholder="Numéro activité à modifier" /><br /><br />
                            
                            <label>Ancienne Date :</label>
                                <input id="zone_text" type="text" name="OldDate" placeholder="AAAA-MM-JJ"  /><br><br>
                            
                            <label>Nouvelle Date :</label>
                                <input id="zone_text" type="text" name="NewDate" placeholder="AAAA-MM-JJ"  /><br><br>                                                 
              
                            <input type="submit" value="Modifier"/>
                         </section>
                </fieldset>
            </form>
</div>

<br/><br/><br/>

<!--LISTES ENFANTS-->

<h2>Liste des enfants</h2>
<br>
<table class ="table_liste">
    <tr>
        <td><b>Identifiant</b></td>
        <td><b>Nom</b></td>
        <td><b>Prénom</b></td>
        <td><b>Age</b></td>
    </tr>
<?php
for($i=0; $i<count($listeEnfants); $i++){ ?>
    
    <tr>
          <td><?=$listeEnfants[$i]->getNumPersonne()?></td>
          <td><?=$listeEnfants[$i]->getNom()?></td>
          <td><?=$listeEnfants[$i]->getPrenom()?></td>
          <td><?=$listeEnfants[$i]->getAge()?> ans </td>
    </tr>
  <?php       
   }
   ?>
    
 </table>

<br/><br/>
    

<div class="formulaire">
<!--Formulaire pour ajouter un enfant-->
        
            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Enfant </legend><br>
                        <section>
                            <label>Identifiant :</label>
                            <input id="zone_text" type="number" name="NumeroEnfant" placeholder="Identifiant enfant à ajouter" /><br /><br/>
                            
                            <label>Nom :</label>
                            <input id="zone_text" type="text" name="NomEnfant" placeholder="Nom de l'enfant" /><br /><br/>                            
                            
                            <label>Prénom :</label>
                            <input id="zone_text" type="text" name="PrenomEnfant" placeholder="Prénom de l'enfant " /><br /><br/>
                            
                            <label>Age :</label>
                            <input id="zone_text" type="text" name="Age" placeholder="Age de l'enfant" /><br><br>                           
              
                             <input  type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>

            
<!--Formulaire pour supprimer un enfant de la liste-->

            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Enfant </legend><br>
                        <section>
                              <label>Identifiant :</label><div>
                                 <input id="zone_text" type="number" name="NumeroEnfantS" placeholder="Identifiant enfant à supprimer" /><br/><br/>
                        
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
</div>


<br/><br/><br/>

<!<!-- LISTE MATERIELS -->

<h2>Liste des materiels</h2>
<br>
<table class ="table_liste">
    <tr>
        <td><b>Code</b></td>
        <td><b>Libelle</b></td>
 
    </tr>
<?php
for($i=0; $i<count($listeMateriels); $i++){?>
          <tr>
              <td><?=$listeMateriels[$i]->getCodeMateriel()?></td>
              <td><?=$listeMateriels[$i]->getLibelleMateriel()?></td>
          </tr>
   <?php     
   }
   ?>
 </table>

<br/><br/>

<div class ="formulaire">
    
<!--Formulaire pour ajouter un matériel-->
        
            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Matériel </legend><br>
                        <section>
                            <label>Code Matériel :</label>
                            <input id="zone_text" type="text" name="CodeMat" placeholder="Code matériel à ajouter" /><br /><br/>
                            
                            <label>Libelle :</label>
                            <input id="zone_text" type="text" name="LibelleMateriel" placeholder="Libelle matériel" /><br /><br/>                                                  
              
                            <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>


            
<!--Formulaire pour supprimer un matériel liste-->

            <form class="reforme" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Matériel </legend><br>
                        <section>
                              <label>Code Matériel :</label><div>
                               <input id="zone_text" type="text" name="CodeMatS" placeholder="Code matériel à supprimer" /><br /><br/>
                        
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
</div>
                              
<br/><br/><br/>


<!--LISTES ANIMATEURS -->

<h2>Liste des animateurs</h2>
<br>
<table class = "table_liste">
    <tr>
        <td><b>Identifiant</b></td>
        <td><b>Nom</b></td>
        <td><b>Prénom</b></td>
        <td><b>Adresse</b></td>
        <td><b>Téléphone</b></td>
    </tr>
<?php
for($i=0; $i<count($listeAnimateurs); $i++){?>
    
    <tr>
          <td><?=$listeAnimateurs[$i]->getNumPersonne()?></td>
          <td><?=$listeAnimateurs[$i]->getNom()?></td>
          <td><?=$listeAnimateurs[$i]->getPrenom()?></td>
          <td><?=$listeAnimateurs[$i]->getAdresse()?></td>
          <td><?=$listeAnimateurs[$i]->getTelephone()?></td>
    </tr>
   <?php
   }
   ?>

 </table>

<br><br><br><br>








