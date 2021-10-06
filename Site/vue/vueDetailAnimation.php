

<h1><?=$uneAnimation->getLibelleAnimation()?></h1>

<!-- Description de l'animation -->

<table class ="table_animation">
    <tr>
        <td> <?php  echo"<img src='{$uneAnimation->getPhotoAnimation()}'/>" ?> </td>
        <td>
            <h4><br>
                <b>Thème:</b>  <?= $uneAnimation->getTheme() ?><br><br>
                <b>Présentation:</b>  <?= $uneAnimation->getPresentation() ?><br><br>
                <b>Date debut:</b>  <?= $uneAnimation->getDateDebut() ?><br><br>
                <b>Date fin:</b>  <?= $uneAnimation->getDateFin() ?><br><br>
            </h4>
        </td>
    </tr>
</table>
<br>

<!-- Affichage des animateurs de l'animation -->

<h2>Animateurs chargés du déroulement</h2>

<table class="table_animation">
    <tr>
        <td><img src="image/animateurs.jpg"></td>
        <td>
         <h4><br><?= $uneAnimation->getTabAnimateurs()?></h4>
        </td>
         
<!--Formulaire pour ajouter un animateur dans une animation-->
<td>
            <form class="reform" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Animateur </legend><br>
                            <input type="hidden" name="NumAnimation" value="<?php print($uneAnimation->getNumAnimation())?>" />
                        <section>
                            <label>Identifiant * :</label><div>
                                <input id="zone_text" type="number" name="NumAnimateur" placeholder="Identifiant animateur à ajouter" /> <br><br>
                            
                                <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>

              <br/>
              
<!--Formulaire pour supprimer un animateur dans une animation-->

            <form class="reform" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Animateur </legend><br>
                             <input type="hidden" name="NumAnimationS" value="<?php print($uneAnimation->getNumAnimation())?>" />
                        <section>
                            <label>Identifiant * :</label><div>
                                <input id="zone_text" type="number" name="NumAnimateurS" placeholder="Identifiant animateur à supprimer" /><br><br>
                                
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
            
        </td>
        
    </tr>
</table>

<h4 class="px">*Pour trouver les identifiants veuillez cliquer <a href="./?action=listes"><font color = "blue"><u>ici</u></a></h4>
<br>

<!-- Affichage des enfants inscrits -->

<h2>Les enfants inscrits</h2>

<table class="table_animation">
    <tr>
        <td>
            <img src="image/enfants.jpeg"><br><br>
            <img src="image/enfants2.jpg">
        </td>
        <td>
            <h4><br><?=$uneAnimation->getTabEnfants()?></h4>
        </td>
     
            
<!--Formulaire pour ajouter un enfant dans une animation-->

        <td>
            <form class="reform" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Enfant </legend><br>
                            <input type="hidden" name="NumAnimationE" value="<?php print($uneAnimation->getNumAnimation())?>" />
                        <section>
                            <label>Identifiant * :</label><div>
                               <input id="zone_text" type="number" name="NumEnfant" placeholder="Identifiant de l'enfant à ajouter" />
                               <br /><br>
                                <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>

              <br/>

<!--Formulaire pour supprimer un enfant dans une animation-->

            <form class="reform" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Enfant </legend><br>
                              <input type="hidden" name="NumAnimationES" value="<?php print($uneAnimation->getNumAnimation())?>" />
                        <section>
                            <label>Identifiant * :</label><div>
                                <input id="zone_text" type="number" name="NumEnfantS" placeholder="Identifiant de l'enfant à supprimer" />
                                <br><br>
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
            
        </td>
    </tr>
</table>

<h4 class="px">*Pour trouver les identifiants veuillez cliquer <a href="./?action=listes"><font color = "blue"><u>ici</u></a></h4>

<br>

<!-- Affichage des activités de l'animation -->

<h2>Activités prévues</h2>

<?php
 for($i=0; $i<count($uneAnimation->getTabActivites()); $i++){?>
    <div class = "activite">
        <div >
           <?php
    print("<a href='./?action=detailActivite&NUM_ACTIVITE=" . $uneAnimation->getNumeroActivite($i) . "'>".
            "<img src='{$uneAnimation->affichePhotoActivite($i)}'/>"."<br/>"
            ."<h5>".$uneAnimation->afficheNomActivite($i)."</h5>"."</a>"."<br/>"); ?>
             </div>
    
</div>
 <?php } ?>

<!--Formulaire pour ajouter une activite dans une animation-->

<div class ="formulaire">
            <form class ="reforme" action="./?action=miseJour" method="POST">
               <fieldset>
                   <legend>Ajout Activité </legend><br>
                            <input type="hidden" name="NumAnimationActiv" value="<?php print($uneAnimation->getNumAnimation())?>" />
                       <section>
                           <label>Numéro * :</label><div>
                               <input id="zone_text" type="number" name="NumActivite" placeholder="Numéro activité à ajouter" />
                               <br /><br>
                               <input type="submit" value="Ajouter"/>
                        </section>
               </fieldset>
           </form>

               
<!--Formulaire pour supprimer une activite dans une animation-->

           <form class ="reforme" action="./?action=miseJour" method="POST">
               <fieldset>
                   <legend>Suppresion Activité </legend><br>
                            <input type="hidden" name="NumAnimationAS" value="<?php print($uneAnimation->getNumAnimation())?>" />
                       <section>
                           <label>Numéro * :</label><div>
                               <input id="zone_text" type="number" name="NumActiviteS" placeholder="Numéro activité à supprimer" />
                               <br><br>
                               <input type="submit" value="Supprimer" />
                       </section>
               </fieldset>
           </form>
</div>

<h4 class="px">*Pour trouver les numéros veuillez cliquer <a href="./?action=listes"><font color = "blue"><u>ici</u></a></h4>
<br>




