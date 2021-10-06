
<!-- Description Activité -->

<h1><?=$uneActivite->getDesignationActivite()?></h1>
<table class="table_animation">
    <tr>
        <td>
<?php
echo( "<img src='{$uneActivite->getPhotoActivite()}'/>");?>
        </td>
        <td >
            <h4><br>
        <b>Catégorie: </b><?=$uneActivite->getLibelleCategorie()?><br><br>
       <b>Description: </b><?=$uneActivite->getDescription() ?><br><br>
       <b>Nombre minimum de participants:  </b><?=$uneActivite->getNbMin()?><br><br>
       <b>Nombre maximum de participants:  </b><?=$uneActivite->getNbMax()?><br><br>
            </h4>
        </td>
    </tr>
</table>
<br>

<!--La liste des enfants aptes à participer à l'activité-->

<h2>Les Enfants aptent à participer à l'activité</h2>
       
<table class="table_animation">
    <tr>
        <td>
            <img src="image/enfants.jpeg"><br><br>
            <img src="image/enfants2.jpg">
        </td>
        <td>
            <h4><br><?=$uneActivite->getEnfantApte()?></h4>
        </td>
     
            
<!--Formulaire pour ajouter un enfant apte-->

        <td>
            <form class="reform" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Enfant </legend><br>
                        <input type="hidden" name="NumActiviteDetail" value="<?php print($uneActivite->getNumActivite())?>" />   
                        <section>
                            <label>Identifiant * :</label><div>
                              <input id="zone_text" type="number" name="NumEnfantActivite" placeholder="Identifiant de l'enfant à ajouter" />   
                              <br /><br>
                                <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>

              <br/>

<!--Formulaire pour supprimer un enfant apte-->

            <form class="reform" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Enfant </legend><br>
                        <input type="hidden" name="NumActiviteDetailS" value="<?php print($uneActivite->getNumActivite())?>" />     
                        <section>
                            <label>Identifiant * :</label><div>
                                <input id="zone_text" type="number" name="NumEnfantActiviteS" placeholder="Identifiant de l'enfant à supprimer" />
                                <br /><br>
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
            
        </td>
    </tr>
</table>

<h4 class="px">*Pour trouver les identifiants veuillez cliquer <a href="./?action=listes"><font color = "blue"><u>ici</u></a></h4>      
<br>

<!-- Les matériels utilisés par l'activité-->

<h2>Les matériels necessaires</h2>

<table class = "table_animation">
    <tr>
        <td>
            <img src="image/materiel.jpg">
        </td>
        <td>
        <?php
        if(count($materielsUtilises) != 0){
        ?>
        <?php 

        $i=0;
        while($i<count($materielsUtilises)){?>

            <h4><b>Libelle: </b><?=$materielsUtilises[$i]->getMaterielUtilise()->getLibelleMateriel()?><br>
              <b>Quantité: </b><?=$materielsUtilises[$i]->getQuantite()?></h4>

          <?php
          $i++;
          }
        }
        else{
            ?>
            <h4><br>Cette activité ne necessite pas de materiels !<br><br></h4>
            <?php
        }
?>
        
        </td>
      
             
<!--Formulaire pour ajouter un matériel à une activité-->

        <td>
            <form class="reform" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Ajout Matériel </legend><br>
                        <input type="hidden" name="NumActiviteM" value="<?php print($uneActivite->getNumActivite())?>" /> 
                        <section>
                            <label>Code Matériel * :</label><div>
                             <input type="text" name="CodeMateriel" placeholder="Code matériel" />   
                            <br/><br/>
                            <label>Quantité * :</label><div>
                            <input type="number" name="Quantite" placeholder="Quantité" />
                            <br /><br>
                             <input type="submit" value="Ajouter"/>
                         </section>
                </fieldset>
            </form>

              <br/>

<!--Formulaire pour supprimer un matériel d'une activité-->

            <form class="reform" action="./?action=miseJour" method="POST">
                <fieldset>
                    <legend>Suppresion Matériel </legend><br>
                        <input type="hidden" name="NumActiviteMS" value="<?php print($uneActivite->getNumActivite())?>" />     
                        <section>
                            <label>Code Matériel * :</label><div>
                                <input id="zone_text" type="text" name="CodeMaterielS" placeholder="Code matériel" />
                                <br><br>
                                <input type="submit" value="Supprimer" />
                        </section>
                </fieldset>
            </form>
            
        </td>
    </tr>
</table>       
<h4 class="px">*Pour trouver les codes matériels veuillez cliquer <a href="./?action=listes"><font color = "blue"><u>ici</u></a></h4>
<br>
<div></div>      
        
        
