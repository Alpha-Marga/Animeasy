

<?php

// AFFICHAGE DES LIBELLES D'ANIMATIONS ET DE LEURS PHOTOS

for($i=0; $i<count($listeAnimations); $i++){ ?>

<div class = "accueil">
    
        <div >
         <?php echo "<a href='./?action=detailAnimation&NUM_ANIMATION=" .$listeAnimations[$i]->getNumAnimation(). "'>" 
                    ."<img src='{$listeAnimations[$i]->getPhotoAnimation()}'/>"."<br/>"
                    ."<h3>".$listeAnimations[$i]->getLibelleAnimation()."<h3/>"."</a>"; ?> 
        </div>
    
</div>

<?php }?>





