<?php

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////VUE MISE A JOUR DE LA GESTION DES LISTES////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//VUE AJOUT ANIMATION

if(isset($_POST["NUM_ANIM"])){
    
    if($numero != "" && $ajoutAnimation == 1){?>
    
       <h6>L'ajout a bien été effectué !</h6>
       
<?php
}
else{  ?>
       <h6>Ajout impossible !<br>
          Veuillez saisir un numéro incompris dans la liste !</h6>
   
<!--Formulaire pour ajouter  une animation-->
        
            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Animation </legend><br>
                        <section>
                            <label>Numéro :</label>
                            <input id="zone_text" type="number" name="NUM_ANIM" placeholder="Numero animation" /><br /><br />
                            
                            <label>Libelle :</label>
                            <input id="zone_text" type="text" name="LIBELLE_ANIMATION" placeholder="Libelle animation" /><br /><br />
                            
                            
                            <label>Thème :</label>
                            <input id="zone_text" type="text" name="THEME" placeholder="thème"  /><br /><br/>
                            
                            <label>Présentation  :</label>
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
        <br>
<?php
}   
}

//VUE MODIFICATION PERIODE ANIMATION

elseif(isset($_POST["NumAnim"])){
    
    if($numAnim != "" && $modifAnimation == 1){?>
    
        <h6>La modification a bien été effectué !</h6>
<?php
}
else{  ?>
        <h6>Modification impossible !<br>
           Veuillez entrer un numéro compris dans la liste !</h6>

<!--Formulaire pour modifier la période d'une animation-->
        
            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Modification Période Animation </legend><br>
                        <section>
                            <label>Numéro :</label>
                            <input id="zone_text" type="number" name="NumAnim" placeholder="Numéro animation à modifier" /><br /><br />
                            
                            <label>Date début :</label>
                             <input id="zone_text" type="text" name="DateDebut" placeholder="AAAA-MM-JJ"  /><br /><br/>
                            
                            <label>Date fin :</label>
                            <input id="zone_text" type="text" name="DateFin" placeholder="AAAA-MM-JJ"  /><br /><br/>                                                  
              
                             <input  type="submit" value="Modifier"/>
                         </section>
                </fieldset>
            </form>
<?php
}   
}

// VUE SUPPRESSION ANIMATION

elseif(isset($_POST["NumAnimS"])){
  if($leNumero != "" && $suppAnimation == 1){?>
                <h6>La suppression a bien été effectué !</h6>
         <?php
          }
         else{ ?>
                
<!--Formulaire pour supprimer une animation-->  

        <h6>Suppression impossible !<br>
            Veuillez entrer un numéro compris dans la liste !</h6>

            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Animation </legend><br>
                        <section>
                              <label>Numéro :</label>
                                 <input id="zone_text" type="number" name="NumAnimS" placeholder="Numero animation à supprimer" /><br />    
                           
                                <br />
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
<br>
<?php

}
}     

//VUE AJOUT ACTIVITE

elseif(isset($_POST["NumeroActivite"])){
    
    if($numeroActivite != "" && $ajoutActivite == 1){?>
    
           <h6>L'ajout a bien été effectué !</h6>

<?php
}
else{  ?>
           <h6>Ajout impossible !<br>                
               Veuillez saisir un numéro incompris dans la liste!</h6>
       
 <!--Formulaire pour ajouter  une activité-->
        
            <form class="mjr" action="./?action=miseJour" method="POST">
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
              
                             <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>
 <br>
<?php
}   
}

// VUE SUPPRESSION ACTIVITE 

elseif(isset($_POST["NumeroActiviteS"])){
  if($numeroActiviteS != "" && $suppActivite == 1){?>
 
                  <h6>La suppression a bien été effectué !</h6>
<?php
  }
 else{ ?>
                  <h6>Suppression impossible !<br>
                      Veuillez entrer un numéro compris dans la liste !</h6>
 
<!--Formulaire pour supprimer une activité-->

            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Activité </legend><br>
                        <section>
                              <label>Numéro :</label>
                                  <input id="zone_text" type="number" name="NumeroActiviteS" placeholder="Numero activité à supprimer" /><br><br>   
                           
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
<br>
<?php
}   
}

// VUE AJOUT ACTIVITE ANIME

elseif(isset($_POST["NumActiviteAnime"])){
    
    if($numActiviteAnime != "" && $ajoutActiviteAnime == 1){ ?>
    
               <h6>L'ajout a bien été effectué !</h6>
<?php
}
else{  ?>
               <h6>Ajout impossible !<br>
                   Veuillez entrer un numéro d'activité et une date incompris dans la liste!</h6>
               
 <!--Formulaire pour ajouter une activité animé-->
        
            <form class="mjr" action="./?action=miseJour" method="POST">
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
 <br>
<?php
}   
}

// VUE SUPPRESSION ACTIVITE ANIME

elseif(isset($_POST["NumActiviteAnimeS"])){
    
    if($numActiviteAnimeS != "" && $suppActiviteAnime == 1){?>
    
           <h6>La suppression a bien été effectué !</h6>
<?php
}
else{  ?>
           <h6>Suppression impossible !<br>
               Veuillez entrer un numéro et une date compris dans la liste !</h6>
            
            
<!--Formulaire pour supprimer une activité animé-->

            <form class="mjr" action="./?action=miseJour" method="POST">
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
<?php
}   
}

// VUE MODIFICATION DATE ACTIVITE ANIME

elseif(isset($_POST["NumActiviteAnimeM"])){
    
    if($numActiviteAnimeM != "" && $oldDate !="" && $newDate !="" && $modifActiviteAnime ==1){?>
    
             <h6>La modification a bien été effectué !</h6>
<?php
}            
else{  ?>
             <h6>Modification impossible !<br>
                 Veuillez entrer un numéro compris dans la liste et l'ancienne date correspondant !</h6>
                
 
  <!--Formulaire pour modifier la date d'animation d'une activité-->
        
            <form class="mjr" action="./?action=miseJour" method="POST">
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
  <br>
<?php
}   
}

// VUE AJOUT ENFANT

elseif(isset($_POST["NumeroEnfant"])){
    
    if($numeroEnfant != "" && $ajoutEnfant == 1){?>
    
         <h6>L'ajout a bien été effectué !</h6>
<?php
}
else{ ?>
         <h6>Ajout impossible !<br>
             Veuillez entrer un identifiant incompris dans la liste !</h6>

<!--Formulaire pour ajouter un enfant-->

        <form class="mjr" action="./?action=miseJour" method="POST">
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
              
                             <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>
<br>
</form>
<?php
}   
}

// VUE SUPPRESSION ENFANT

elseif(isset($_POST["NumeroEnfantS"])){
    
    if($numeroEnfantS != "" && $suppEnfant == 1){?>
    
          <h6>La suppression a bien été effectué !</h6>
<?php
}
else{  ?>
          <h6>Mise à jour impossible !<br>
              Veuillez entrer un identifiant compris dans la liste !</h6>
 
 <!--Formulaire pour supprimer un enfant de la liste-->

            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Enfant </legend><br>
                        <section>
                              <label>Identifiant :</label>
                                 <input id="zone_text" type="number" name="NumeroEnfantS" placeholder="Identifiant enfant à supprimer" /><br/><br/>
                        
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>

 <br>        
<?php
}   
}

// VUE AJOUT MATERIEL

elseif(isset($_POST["CodeMat"])){
    
    if($codeMat != "" && $ajoutMateriel == 1){ ?>
    
        <h6>L'ajout a bien été effectué !</h6>

<?php
}
else{  ?>
        <h6>Ajout impossible !<br>
            Veuillez entrer un code incompris dans la liste !</h6>
               
<!--Formulaire pour ajouter un matériel-->
        
            <form class="mjr" action="./?action=miseJour" method="POST">
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
<br>
<?php
}   
}

// VUE SUPPRESSION MATERIEL

elseif(isset($_POST["CodeMatS"])){
    
    if($codeMatS != "" && $suppMateriel == 1){?>
    
            <h6>La suppression a bien été effectué !</h6>
<?php
}
    else{ ?> 
            <h6>Mise à jour impossible !</br>
                Veuillez un code compris dans la liste !</h6>
      
 <!--Formulaire pour supprimer un matériel liste-->

            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Matériel </legend><br>
                        <section>
                              <label>Code Matériel :</label>
                               <input id="zone_text" type="text" name="CodeMatS" placeholder="Code matériel à supprimer" /><br /><br/>
                        
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
 <br>      
<?php
}   
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////VUE MISE A JOUR DES DETAILS D'UNE ANIMATION/////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// VUE AJOUT ANIMATEUR D'UNE ANIMATION

elseif(isset($_POST["NumAnimateur"])){
    
    if($NumAnimateur != "" && $unAnimateur != NULL && $ajoutAnimateurA == 1){?>
    
           <h6>L'ajout a bien été effectué !</h6>
    <?php       
    }
    else{  ?>
           <h6>Ajout impossible !<br>
               Veuillez entrer l'identifiant d'un animateur incompris dans la liste !</h6>
           
<!--Formulaire pour ajouter un animateur dans une animation-->

          <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Animateur </legend><br>
                        <section>
                            <label>Numéro animation * :</label>
                                <input id="zone_text" type="number" name="NumAnimation" placeholder="Numéro animation à ajouter" /><br /><br>
                        
                            <label>Identifiant * :</label>
                                <input id="zone_text" type="number" name="NumAnimateur" placeholder="Identifiant animateur à ajouter" /><br /><br>
                           
                            <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>
<h4 class="px">*Vous trouverez le numéro de l'animation et les identifiants dans l'onglet "Gestion Listes"</h4>
  <br/> 

<?php
    }
}  
 
// VUE SUPPRESSION ANIMATEUR D'UNE ANIMATION

elseif(isset($_POST["NumAnimateurS"])){
   if($NumAnimateurS != "" && $unAnimateurS != NULL && $suppAnimateurA == 1){ ?>
    
            <h6>La suppression a bien été effectué !</h6>

   <?php    
    }
   else{ ?>
                   <h6>Suppression impossible !<br>
                        Veuillez saisir l'identifiant d'un animateur compris dans la liste !</h6>
                
              
<!--Formulaire pour supprimer un animateur dans une animation-->

            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Animateur </legend>
                         <section>                          
                           <label>Numéro animation * :</label>
                               <input id="zone_text" type="number" name="NumAnimationS" placeholder="Numéro animation" /><br><br>
                       
                            <label>Identifiant * :</label>
                                <input id="zone_text" type="number" name="NumAnimateurS" placeholder="Identifiant animateur à supprimer" /><br><br>
                                
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>     
<h4 class="px">*Vous trouverez le numéro de l'animation et les identifiants dans l'onglet "Gestion Listes"</h4>
<br>

<?php

}
}     

// VUE AJOUT ACTIVITE D'UNE ANIMATION

elseif(isset($_POST["NumActivite"])){
    
    if($NumActivite != "" && $uneActivite != NULL && $ajoutActiviteA == 1){?>
    
             <h6>L'ajout a bien été effectué !</h6>
<?php
    }
    else{  ?>
             <h6>Ajout impossible !<br>
                 Veuillez entrer un numéro d'activité incompris dans la liste !</h6>
 
<!--Formulaire pour ajouter une activite dans une animation-->

            <form class="mjr" action="./?action=miseJour" method="POST">
               <fieldset>
                   <legend>Ajout Activité </legend><br>
                         <section>
                           <label>Numéro Animation * :</label>
                               <input id="zone_text" type="number" name="NumAnimationActiv" placeholder="Numéro animation " /><br><br>
                      
                           <label>Numéro Activité * :</label>
                               <input id="zone_text" type="number" name="NumActivite" placeholder="Numéro activité à ajouter" /><br><br>
                           
                               <input type="submit" value="Ajouter"/>
                        </section>
               </fieldset>
           </form>
<h4 class="px">*Vous trouverez le numéro de l'animation et les numéros des activités dans l'onglet "Gestion Listes"</h4>
<br>

<?php
    }
}   

// VUE SUPPRESSION ACITIVITE D'UNE ANIMATION

elseif(isset($_POST["NumActiviteS"])){
   if($NumActiviteS != "" && $uneActiviteS != NULL && $suppActiviteA == 1){?>
    
            <h6>La suppression a bien été effectué !</h6>
<?php
    }
   else{?>
            <h6>Suppression impossible !<br>
                Veuillez entrer un numéro d'activité compris dans la liste !</h6>
              
<!--Formulaire pour supprimer une activite dans une animation-->

           <form class="mjr" action="./?action=miseJour" method="POST">
               <fieldset>
                   <legend>Suppresion Activité </legend><br>
                       <section>
                           <label>Numéro Animation* :</label>
                               <input id="zone_text" type="number" name="NumAnimationAS" placeholder="Numero animation " /><br><br>
                      
                           <label>Numéro Activité* :</label>
                               <input id="zone_text" type="number" name="NumActiviteS" placeholder="Numéro activité à supprimer" /><br><br>
                             
                               <input type="submit" value="Supprimer" />
                       </section>
               </fieldset>
           </form>
<h4 class="px">*Vous trouverez le numéro de l'animation et les numéros des activités dans l'onglet "Gestion Listes"</h4>
<br>

<?php

}
}  

// VUE AJOUT D'UN ENFANT DANS UNE ANIMATION

elseif(isset($_POST["NumEnfant"])){
    
    if($NumEnfant != "" && $unEnfant != NULL && $ajoutEnfantA == 1){?>
    
             <h6>L'ajout a bien été effectué !</h6>
<?php
    }
    else{  ?>
             
             <h6>Ajout impossible !<br>
                 Veuillez entrer un identifiant d'un enfant incompris dans la liste !</h6>
             
 <!--Formulaire pour ajouter un enfant dans une animation-->
               <form class="mjr" action="./?action=miseJour" method="POST">
                    <fieldset>
                        <legend>Ajout Enfant </legend>
                            <section>
                                <label>Numéro Animation * :</label>
                                    <input id="zone_text" type="number" name="NumAnimationE" placeholder="Numéro animation " /><br ><br>
                           
                                <label>Identifiant * :</label>
                                    <input id="zone_text" type="number" name="NumEnfant" placeholder="Identifiant de l'enfant à ajouter" /><br><br>
                                
                                    <input type="submit" value="Ajouter"/>
                             </section>
                    </fieldset>
                </form>    
 <h4 class="px">*Vous trouverez le numéro de l'animation et les identifiants dans l'onglet "Gestion Listes"</h4>
 <br>
 
<?php
    }
}   

// VUE SUPPRESSION ENFANT D'UNE ANIMATION

elseif(isset($_POST["NumEnfantS"])){
   if($NumEnfantS != "" && $unEnfantS != NULL && $suppEnfantA == 1){ ?>
    
        <h6>La suppression a bien été effectué !</h6>

<?php
    }
   else{ ?>
        <h6>Supression impossible !<br>
            Veuillez entrer un identifiant d'un enfant compris dans la liste !</h6>

<!--Formulaire pour supprimer un enfant dans une animation-->
            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Enfant </legend>
                        <section>
                            <label>Numéro Animation * :</label>
                                <input id="zone_text" type="number" name="NumAnimationES" placeholder="Numéro animation" /><br><br> 
                        
                            <label>Identifiant * :</label>
                                <input id="zone_text" type="number" name="NumEnfantS" placeholder="Identifiant de l'enfant à supprimer" /><br><br>
                              
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
 <h4 class="px">*Vous trouverez le numéro de l'animation et les identifiants dans l'onglet "Gestion Listes"</h4>
<br>


<?php

}
}  


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////VUE MISE A JOUR DES DETAILS D'UNE ACTIVITE//////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// VUE AJOUT ENFANT APTE A PRATIQUER UNE ACTIVITE

elseif(isset($_POST["NumEnfantActivite"])){
    
    if($NumEnfantActivite != "" && $unEnfantActivite != NULL && $ajoutEnfantAct == 1){ ?>
    
            <h6>L'ajout a bien été effectué !</h6>
<?php
    }
    else{  ?> 
            <h6>Ajout impossible !<br>
                Veuillez entrer un identifiant d'un enfant compris dans la liste !</h6>
             
<!--Formulaire pour ajouter un enfant apte-->

            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Enfant </legend>
                        <section>
                            <label>Numéro activité * :</label>
                                <input id="zone_text" type="number" name="NumActiviteDetail" placeholder="Numéro de l'activité" /><br><br>  
                       
                            <label>Identifiant * :</label>
                                <input id="zone_text" type="number" name="NumEnfantActivite" placeholder="Identifiant de l'enfant à ajouter" /><br><br>  
                            
                                <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>
<h4 class="px">*Vous trouverez le numéro de l'activité et les identifiants dans l'onglet "Gestion Listes"</i></h4>  
<br>
   

<?php
    }
} 

// VUE SUPPRESSION ENFANT APTE A PRATIQUER UNE ACTIVITE

elseif(isset($_POST["NumEnfantActiviteS"])){
    
    if($NumEnfantActiviteS != "" && $unEnfantActiviteS != NULL && $suppEnfantAct == 1){ ?>
    
            <h6>La suppression a bien été effectué !</h6>
<?php
    }
    else{  ?>
            <h6>Suppression impossible !<br>
                Veuillez entrer un identifiant d'un enfant compris dans la liste !</h6>
   
 <!--Formulaire pour supprimer un enfant apte-->
 
            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Enfant </legend>
                        <section>
                            <label>Numéro activité * :</label>
                                <input id="zone_text" type="number" name="NumActiviteDetailS" placeholder="Numéro de l'activité" /><br><br>    
                       
                            <label>Identifiant * :</label>
                                <input id="zone_text" type="number" name="NumEnfantActiviteS" placeholder="Identifiant de l'enfant à supprimer"/><br><br>
                                
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>           
 <h4 class="px">*Vous trouverez le numéro de l'activité et les identifiants dans l'onglet "Gestion Listes"</i></h4>    
 <br>
 
<?php
    }
} 

//VUE AJOUT MATERIEL UTILISE

elseif(isset($_POST["CodeMateriel"])){
    
    if($CodeMateriel != "" && $ajoutMaterielU == 1){?>
    
          <h6>L'ajout a bien été effectué !</h6>
<?php
    }
    else{  ?>
                <h6>Ajout impossible !<br>
                    Veuillez entrer un code matériel incompris dans la liste !</h6>
               
<!--Formulaire pour ajouter un matériel à une activité-->
       
            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Matériel </legend><br>
                        <section>
                            <label>Numéro activité * :</label>
                             <input id="zone_text" type="number" name="NumActiviteM" placeholder="Numéro de l'activité" /><br><br>
                        
                            <label>Code Matériel * :</label>
                             <input id="zone_text" type="text" name="CodeMateriel" placeholder="Code matériel" /> <br/><br/> 
                            
                            <label>Quantité * :</label>
                            <input id="zone_text" type="number" name="Quantite" placeholder="Quantité" /><br><br>
                             
                             <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>

<h4 class="px">*Vous trouverez le numéro de l'activité et les codes matériels dans l'onglet "Gestion Listes"</i></h4>  

<br>

<?php
    }
} 

// VUE SUPPRESSION MATERIEL UTILISE

elseif(isset($_POST["CodeMaterielS"])){
    
    if($CodeMaterielS != "" && $suppMaterielU == 1){ ?>
    
           <h6>La suppression a bien été effectué !</h6>
           
<?php
    }
    else{  ?>
           <h6>Suppression impossible !<br>
               Veuillez entrer un code matériel compris dans la liste !</h6>
                

<!--Formulaire pour supprimer un matériel d'une activité-->

            <form class="mjr" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Matériel </legend>
                        <section>
                            <label>Numéro activité * :</label>
                            <input id="zone_text" type="number" name="NumActiviteM" placeholder="Numéro de l'activité" /><br><br>    
  
                            <label>Code Matériel * :</label>
                            <input id="zone_text" type="text" name="CodeMaterielS" placeholder="Code matériel" /> <br><br>
                               
                            <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form> 
<h4 class="px">*Vous trouverez le numéro de l'activité et les codes matériels dans l'onglet "Gestion Listes"</i></h4>  
<br>

<?php
    }
} 






