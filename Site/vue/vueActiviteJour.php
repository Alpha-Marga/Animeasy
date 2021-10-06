<?php

if($activitesJour != null){

$tab = array();
$tab2 = array();

for($i=0; $i<count($activitesJour); $i++){
      if(!in_array($activitesJour[$i]->getActiviteAnime()->getNumActivite(), $tab)){
    ?>

<!-- Description de l'activité du jour -->

         <h1>Activité <?=($i+1)?>:  <?= $activitesJour[$i]->getActiviteAnime()->getDesignationActivite()?></h1>
         
<table class="table_animation">
    <tr>
        <td>
<?php
    echo( "<img src='{$activitesJour[$i]->getActiviteAnime()->getPhotoActivite()}'/>");?>
        </td>
        <td>
            <h4><br>
        <b>Catégorie: </b><?=$activitesJour[$i]->getActiviteAnime()->getLibelleCategorie()?><br><br>
       <b>Description: </b><?=$activitesJour[$i]->getActiviteAnime()->getDescription()?><br><br>
       <b>Nombre minimum de participants:  </b><?=$activitesJour[$i]->getActiviteAnime()->getNbMin()?><br><br>
       <b>Nombre maximum de participants:  </b><?=$activitesJour[$i]->getActiviteAnime()->getNbMax()?><br><br>
       <b>Date du jour:  </b><?=$activitesJour[$i]->getDateActivite()?><br><br>
       <b>Debut de l'activité:  </b><?=$activitesJour[$i]->getHeureDebut()?><br><br>
       <b>Fin de l'activité:  </b><?=$activitesJour[$i]->getHeureFin()?><br><br>
            </h4>
        </td>
    </tr>
</table>


<!--Deroulement activité!-->

         <h2>Déroulement de l'activité</h2>
         
 <table class ="table_animation">
  
       <tr>
           <td>
               <img src="image/anime.jpg"><br/><br/>
               <h6><br><b>Chargé d'animer l'activité: </b><br/><br/>

<!-- Affichage des animateurs -->
    <?=$activitesJour[$i]->afficherAnimateurs()?><br/></h6><br/>
    
<!-- Affichage des matériels -->

     <?php
    if($activitesJour[$i]->getActiviteAnime()->getLibelleCategorie() == "Activité Manuelle"){
        ?>
                    
    <h6><b><br> Les matériels utilisés: </b><br><br/>
       <?php 
       for($j=0; $j <count($materielsJour); $j++){
            if(!in_array($materielsJour[$j]->getMaterielUtilise()->getCodeMateriel(), $tab2)){ ?>
        
                Libelle: <?=$materielsJour[$j]->getMaterielUtilise()->getLibelleMateriel()?><br/>
                Quantité: <?=$materielsJour[$j]->getQuantite()?><br/><br/>
                
            <?php
            $tab2[]= $materielsJour[$j]->getMaterielUtilise()->getCodeMateriel();      
            }
            }?>
           </h6> 
  <?php  }
    
    else{
    ?>
    <h6><br/>Cette activité ne necessite pas de materiels !<br/><br/></h6>
    <?php
    }
     ?>
         </td>
         <td>
             
<!-- Affichage des enfants participants -->
       <h6> 
           <br><b>Les participants :</b><br><br>
           
           <?=$activitesJour[$i]->getActiviteAnime()->getEnfantApte()?>

            <?php    
           $tab[]= $activitesJour[$i]->getActiviteAnime()->getNumActivite();
           }?>
        </h6>
     </td>
 </tr>
</table>
         <br>
<?php
}
}
else{ ?>

         <h6> Aucune activité n'est prévue aujourd'hui !</h6>
<?php
}
