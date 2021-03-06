
# -----------------------------------------------------------------------------
#       BASE DE DONNEES: ANIMEASY
# -----------------------------------------------------------------------------

CREATE DATABASE ANIMEASY;


# -----------------------------------------------------------------------------
#       TABLE : ANIMATION
# -----------------------------------------------------------------------------

CREATE TABLE ANIMATION
 (
   NUM_ANIMATION INTEGER(2) NOT NULL PRIMARY KEY ,
   LIBELLE_ANIMATION VARCHAR(30),
   THEME VARCHAR(100) NULL  ,
   PRESENTATION VARCHAR(1000) NULL  ,
   DATE_DEBUT DATE NULL  ,
   DATE_FIN DATE NULL  
 ) ;

# -----------------------------------------------------------------------------
#       TABLE : ANIMATEUR
# -----------------------------------------------------------------------------

CREATE TABLE ANIMATEUR
 (
   NUM_PERSONNE INTEGER(2) NOT NULL PRIMARY KEY ,
   NOM VARCHAR(32) NULL  ,
   PRENOM VARCHAR(50) NULL ,
   ADRESSE VARCHAR(100) NULL  ,
   CP INTEGER(5) NULL  ,
   VILLE VARCHAR(30) NULL  ,
   TELEPHONE VARCHAR(15) NULL  
 ) ;

# -----------------------------------------------------------------------------
#       TABLE : ENFANT
# -----------------------------------------------------------------------------

CREATE TABLE ENFANT
 (
   NUM_PERSONNE INTEGER(2) NOT NULL PRIMARY KEY ,
   NOM VARCHAR(32) NULL  ,
   PRENOM VARCHAR(50) NULL ,
   AGE INTEGER(2) NULL  
 ) ;


# -----------------------------------------------------------------------------
#       TABLE : MATERIEL
# -----------------------------------------------------------------------------

CREATE TABLE MATERIEL
 (
   CODE_MATERIEL VARCHAR(10) NOT NULL PRIMARY KEY ,
   LIBELLE_MATERIEL VARCHAR(32) NULL  
 ) ;

# -----------------------------------------------------------------------------
#       TABLE : ACTIVITE
# -----------------------------------------------------------------------------

CREATE TABLE ACTIVITE
 (
   NUM_ACTIVITE INTEGER(2) NOT NULL PRIMARY KEY,
   LIBELLE_CATEGORIE VARCHAR(30) NOT NULL  ,
   DESIGNATION VARCHAR(50) NULL  ,
   DESCRIPTION VARCHAR(1000) NULL  ,
   NBMIN_PARTICIPANT INTEGER(2) NULL  ,
   NBMAX_PARTICIPANT INTEGER(2) NULL  
 ) 
 ;

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER ANIMATEUR
# -----------------------------------------------------------------------------

CREATE TABLE PARTICIPER_ANIMATEUR
 (
   NUM_ANIMATION INTEGER(2) NOT NULL  ,
   NUM_PERSONNE_ANIMATEUR INTEGER(2) NOT NULL  , 
   PRIMARY KEY (NUM_ANIMATION, NUM_PERSONNE_ANIMATEUR) 
 ) ;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPER ANIMATEUR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPER_ANIMATION
     ON PARTICIPER_ANIMATEUR (NUM_ANIMATION ASC);

CREATE  INDEX I_FK_PARTICIPER_ANIMATEUR
     ON PARTICIPER_ANIMATEUR (NUM_PERSONNE_ANIMATEUR ASC);


# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER ENFANT
# -----------------------------------------------------------------------------

CREATE TABLE PARTICIPER_ENFANT
 (
   NUM_ANIMATION INTEGER(2) NOT NULL  ,
   NUM_PERSONNE_ENFANT INTEGER(2) NOT NULL  , 
   PRIMARY KEY (NUM_ANIMATION, NUM_PERSONNE_ENFANT) 
 ) ;

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPER ENFANT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPER_ANIMATION
     ON PARTICIPER_ENFANT (NUM_ANIMATION ASC);

CREATE  INDEX I_FK_PARTICIPER_ANIMATEUR
     ON PARTICIPER_ENFANT (NUM_PERSONNE_ENFANT ASC);


# -----------------------------------------------------------------------------
#       TABLE : UTILISER
# -----------------------------------------------------------------------------

CREATE TABLE UTILISER_MATERIEL
 (
   CODE_MATERIEL VARCHAR(10) NOT NULL  ,
   NUM_ACTIVITE INTEGER(2) NOT NULL  ,
   QTE_MATERIEL INTEGER(2) NULL , 
   PRIMARY KEY (CODE_MATERIEL,NUM_ACTIVITE) 
 ) ;


# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE UTILISER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_UTILISER_MATERIEL
     ON UTILISER_MATERIEL (CODE_MATERIEL ASC);

CREATE  INDEX I_FK_UTILISER_ACTIVITE
     ON UTILISER_MATERIEL (NUM_ACTIVITE ASC);

# -----------------------------------------------------------------------------
#       TABLE : APTE
# -----------------------------------------------------------------------------

CREATE TABLE  APTE_ENFANT
 (
   NUM_PERSONNE INTEGER(2) NOT NULL  ,
   NUM_ACTIVITE INTEGER(2) NOT NULL  , 
   PRIMARY KEY (NUM_PERSONNE,NUM_ACTIVITE) 
 ) ;


# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE APTE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_APTE_ENFANT
     ON APTE_ENFANT (NUM_PERSONNE ASC);

CREATE  INDEX I_FK_APTE_ACTIVITE
     ON APTE_ENFANT (NUM_ACTIVITE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CONTENIR
# -----------------------------------------------------------------------------

CREATE TABLE  CONTENIR_ACTIVITE
 (
   NUM_ANIMATION INTEGER(2) NOT NULL  ,
   NUM_ACTIVITE INTEGER(2) NOT NULL,  
   PRIMARY KEY (NUM_ANIMATION,NUM_ACTIVITE) 
 );

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CONTENIR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CONTENIR_ANIMATION
     ON CONTENIR_ACTIVITE (NUM_ANIMATION ASC);

CREATE  INDEX I_FK_CONTENIR_ACTIVITE
     ON CONTENIR_ACTIVITE (NUM_ACTIVITE ASC);

# -----------------------------------------------------------------------------
#       TABLE : ANIMER
# -----------------------------------------------------------------------------

CREATE TABLE  ANIMER
 (
   NUM_PERSONNE INTEGER(2) NOT NULL  ,
   NUM_ACTIVITE INTEGER(2) NOT NULL  ,
   UNEDATE CHAR(32) NOT NULL  ,
   DEBUT_ACTIVITE TIME NULL  ,
   FIN_ACTIVITE TIME NULL  ,
   PRIMARY KEY (NUM_PERSONNE,NUM_ACTIVITE,UNEDATE) 
 ) ;
# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ANIMER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ANIMER_ANIMATEUR
     ON ANIMER (NUM_PERSONNE ASC);

CREATE  INDEX I_FK_ANIMER_ACTIVITE
     ON ANIMER (NUM_ACTIVITE ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE PARTICIPER_ANIMATEUR 
  ADD FOREIGN KEY FK_PARTICIPER_A_ANIMATION (NUM_ANIMATION)
      REFERENCES ANIMATION (NUM_ANIMATION) ;


ALTER TABLE PARTICIPER_ANIMATEUR
  ADD FOREIGN KEY FK_PARTICIPER_ANIMATEUR (NUM_PERSONNE_ANIMATEUR)
      REFERENCES ANIMATEUR (NUM_PERSONNE) ;


ALTER TABLE PARTICIPER_ENFANT
  ADD FOREIGN KEY FK_PARTICIPER_E_ANIMATION (NUM_ANIMATION)
      REFERENCES ANIMATION (NUM_ANIMATION) ;


ALTER TABLE PARTICIPER_ENFANT
  ADD FOREIGN KEY FK_PARTICIPER_ENFANT (NUM_PERSONNE_ENFANT)
      REFERENCES ENFANT (NUM_PERSONNE) ;


ALTER TABLE UTILISER_MATERIEL 
  ADD FOREIGN KEY FK_UTILISER_MATERIEL (CODE_MATERIEL)
      REFERENCES MATERIEL (CODE_MATERIEL) ;


ALTER TABLE UTILISER_MATERIEL 
  ADD FOREIGN KEY FK_UTILISER_ACTIVITE (NUM_ACTIVITE)
      REFERENCES ACTIVITE (NUM_ACTIVITE) ;


ALTER TABLE APTE_ENFANT 
  ADD FOREIGN KEY FK_APTE_ENFANT (NUM_PERSONNE)
      REFERENCES ENFANT (NUM_PERSONNE) ;


ALTER TABLE APTE_ENFANT 
  ADD FOREIGN KEY FK_APTE_ACTIVITE (NUM_ACTIVITE)
      REFERENCES ACTIVITE (NUM_ACTIVITE) ;


ALTER TABLE CONTENIR_ACTIVITE 
  ADD FOREIGN KEY FK_CONTENIR_ANIMATION (NUM_ANIMATION)
      REFERENCES ANIMATION (NUM_ANIMATION) ;


ALTER TABLE CONTENIR_ACTIVITE 
  ADD FOREIGN KEY FK_CONTENIR_ACTIVITE (NUM_ACTIVITE)
      REFERENCES ACTIVITE (NUM_ACTIVITE) ;


ALTER TABLE ANIMER 
  ADD FOREIGN KEY FK_ANIMER_ANIMATEUR (NUM_PERSONNE)
      REFERENCES ANIMATEUR (NUM_PERSONNE) ;


ALTER TABLE ANIMER 
  ADD FOREIGN KEY FK_ANIMER_ACTIVITE (NUM_ACTIVITE)
      REFERENCES ACTIVITE (NUM_ACTIVITE) ;


# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE ANIMATION
# -----------------------------------------------------------------------------

 INSERT INTO ANIMATION 
 VALUES(1, "Animation Toussaint", "Halloween", "Au courant de cette animation les enfants sont plong??s dans un univers d'halloween. Les enfants et les animateurs peuvent d??guiser en un personnage de fiction effrayant. Toutes les activit??s auront un lien soit avec la magie, la sorcellerie, les mondes fantastiques.", "2020-10-17", "2020-10-31");

 INSERT INTO ANIMATION
 VALUES(2, "Animation No??l", "No??l", "Pendant l'animation de no??l, sont mises en place, des activit??s ??ducatives, jeux, bricolages, coloriages, histoires, comptines, chansons en lien avec l'univers de no??l. Des d??corations de no??l un peu partout pour mieux se plonger dans l'univers.", "2020-12-19", "2021-01-02");

 INSERT INTO ANIMATION
 VALUES(3, "Animation Hiver", "Les Jeux Olympiques", "Ce th??me met en comp??tition les enfants durant toute la p??riode. Des activit??s sportives, manuelles, des quizz sont mises en place en confrontant des equipes. A la fin de chaque activit?? les vainqueurs sont r??compens??s avec des m??dailles ou une coupe.", "2021-02-19", "2021-02-27");

 INSERT INTO ANIMATION
 VALUES(4, "Animation printemps", "A la decouverte de la nature", "Pendant cette animation des activit??s seront mises en place dans l'objectif de faire d??couvrir la nature. On proposera des quizz aux enfants, des seances d'art plastiques et on fera des sorties pour d??couvrir la nature et ces composants.", "2021-04-19", "2021-04-30");

 INSERT INTO ANIMATION
 VALUES(5, "Animation Juillet", "L'univers des pirates", "Dans ce th??me nous cherchons ?? plonger les enfants dans l'univers des pirates. Les enfants et les animateurs se d??guiseront en pirates. Des activit??s manuelles qui feront r??ferences aux outils d'un pirate seront r??alis??es, ainsi que de jeux ext??rieurs qui mettront les jeunes pirates au d??fi", "2021-07-07", "2021-07-30");

 INSERT INTO ANIMATION
 VALUES(6, "Animation Ao??t", "Le Moyen-??ge", "Un petit retour dans le pass?? ! Nous retrouverons dans ce th??me des activit??s manuelles, des d??guisements, des maquillages, des bricolages sur le th??me du moyen-??ge ! R??aliser et amuser les enfants ?? travers des jeux tir??s de cette ??poque du moyen-??ge. Embarquer les enfants dans l???univers des chevaliers, des ch??teaux???", "2021-08-02", "2021-08-27");


# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE ANIMATEUR
# -----------------------------------------------------------------------------

 INSERT INTO ANIMATEUR
 VALUES(1, "BALDE", "Alpha Mamadou", "9 rue delaitre", 75020, "Paris", "07-66-74-79-96" );

 INSERT INTO ANIMATEUR
 VALUES(2, "DURAND", "Valentine", "8 rue beaupaire", 92120, "Montrouge", "07-66-70-01-14" );


 INSERT INTO ANIMATEUR
 VALUES(3, "DUBOIS", "Mathilde", "5 rue l??on-blum", 75014, "Paris", "07-56-80-01-24" );


 INSERT INTO ANIMATEUR
 VALUES(4, "BERTRAND", "Oph??lie", "30 rue des loisirs", 92110, "Clichy", "07-77-40-31-69" );


 INSERT INTO ANIMATEUR
 VALUES(5, "MOREL", "David", "17 rue turbigo", 75019, "Paris", "07-67-05-81-12" );


 INSERT INTO ANIMATEUR
 VALUES(6, "DIALLO", "Ismatou", "22 rue victor-hugo", 92200, "Neuilly-sur-Seine", "07-60-67-03-14" );


# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE ENFANT
# -----------------------------------------------------------------------------


 INSERT INTO ENFANT
 VALUES(7, "ROUX", "Gabriel", 10);

 INSERT INTO ENFANT
 VALUES(8, "FOURNIER", "Emma", 6);

 INSERT INTO ENFANT
 VALUES(9, "BONNET", "Rapha??l", 11);

 INSERT INTO ENFANT
 VALUES(10, "LAMBERT", "Louis", 8);

 INSERT INTO ENFANT
 VALUES(11, "MERCIER", "Jade", 7);

 INSERT INTO ENFANT
 VALUES(12, "DIAKITE", "Mohamed", 10);

 INSERT INTO ENFANT
 VALUES(13, "BARRY", "Mariam", 7);

 INSERT INTO ENFANT
 VALUES(14, "LEFEVRE", "Lucas", 9);

 INSERT INTO ENFANT
 VALUES(15, "FOURNIER", "Benjamin", 8);

 INSERT INTO ENFANT
 VALUES(16, "GAILLARD", "Adam", 7);

 INSERT INTO ENFANT
 VALUES(17, "LEROUX", "Caroline", 5);

 INSERT INTO ENFANT
 VALUES(18, "DUMONT", "Liam", 8);

 INSERT INTO ENFANT
 VALUES(19, "LAMBERT", "Alice", 6);

 INSERT INTO ENFANT
 VALUES(20, "MEUNIER", "Chlo??", 9);

 INSERT INTO ENFANT
 VALUES(21, "GUICHARD", "Noah", 7);

 INSERT INTO ENFANT
 VALUES(22, "TRABELSTI", "In??s", 10);

 INSERT INTO ENFANT
 VALUES(23, "SAIDI", "Omar", 6);

 INSERT INTO ENFANT
 VALUES(24, "FONTAINE", "Gabriel", 5);

 INSERT INTO ENFANT
 VALUES(25, "DIOP", "Souleyman", 7);

 INSERT INTO ENFANT
 VALUES(26, "DIALLO", "Kadiatou", 9);

 INSERT INTO ENFANT
 VALUES(27, "NGNAKOURI", "Okou", 8);

 INSERT INTO ENFANT
 VALUES(28, "HOLLANDE", "Nathan", 5);

 INSERT INTO ENFANT
 VALUES(29, "BAH", "Mamadou", 8);

 INSERT INTO ENFANT
 VALUES(30, "CHIAPPA", "Mareline", 5);

 INSERT INTO ENFANT
 VALUES(31, "BON", "Emmanuelle", 9);

 INSERT INTO ENFANT
 VALUES(32, "MAROUANE", "Illi??s", 11);

 INSERT INTO ENFANT
 VALUES(33, "SARCOZY", "Robert", 8);

 INSERT INTO ENFANT
 VALUES(34, "LAOUNI", "Mohamed", 9);

 INSERT INTO ENFANT
 VALUES(35, "LAOUNI", "A??cha", 6);

 INSERT INTO ENFANT
 VALUES(36, "DOUKOURE", "Slimakan", 7);



# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE ACTIVITE
# -----------------------------------------------------------------------------


INSERT INTO ACTIVITE
VALUES(1, "Activit?? Manuelle", "Maisonnette", "Petites maisonnettes sympas en rouleaux de papier toilette et toiture en papier cartonn??.", 1, 22);

INSERT INTO ACTIVITE
VALUES(2, "Activit?? Sportive", "Courses ?? ??pingles ?? linge", "Installer une longue corde ?? linge entre deux chaises. Former deux ??quipes. Chaque ??quipe re??oit un sac contenant des ??pingles ?? linge. Au signal, les enfants fixent les ??pingles sur la corde, le temps d'une chanson. Passez au comptage : l'??quipe qui a install?? le plus d'??pingles sur la cordeBoite gagne! Assurez-vous de bien identifier les ??pingles avec des crayons de couleurs diff??rentes",  8, 22);

INSERT INTO ACTIVITE
VALUES(3, "Activit?? Manuelle", "Avions", "Des avions minuscules en pinces ?? linge et b??tonnets de glace.", 1, 22);

INSERT INTO ACTIVITE
VALUES(4, "Jeu Ext??rieur", "Patate chaude", "S'assoir en cercle avec les enfants. Ces derniers se passent une pomme de terre (ou un ballon)  de main en main, au son d'une musique rythm??e. Quand la musique s'arr??te, l'enfant qui tient la pomme de terre doit s'installer au centre du cercle. Le jeu reprend ensuite.", 6, 22);

INSERT INTO ACTIVITE
VALUES(5, "Activit?? Manuelle", "Couronne de coeurs", "Une couronne de coeurs en papier color?? et un pompon suspendu.", 1, 22);

INSERT INTO ACTIVITE
VALUES(6, "Jeu Ext??rieur/Int??rieur", "Je vais dans la jungle et j'apporte...", "S'assoir avec les enfants en cercle et commencer le jeu en disant : ?? Je vais dans la jungle et j'apporte... ?? (exemple : une lampe de poche). L'enfant ?? c??t?? doit dire : ?? Je vais dans la jungle et j'apporte une lampe de poche et... ?? (exemple : une boussole). Chaque enfant doit r??p??ter ce que les autres ont dit et ajouter un ??l??ment.", 6, 16);

INSERT INTO ACTIVITE
VALUES(7, "Activit?? Manuelle", "Voilliers", "De petits voiliers en bouchons de li??ge, cure-dent et voile en papier.", 1, 22);

INSERT INTO ACTIVITE
VALUES(8, "Activit?? Sportive", "Salades Fruits", "Les enfants sont divis??s en deux ??quipes. Ils se placent sur deux lignes, une ??quipe en face de l'autre. Placez un ballon ou tout autre objet au centre des deux ??quipes. Attribuez un nom de fruit diff??rent ?? chacun des joueurs de la premi??re ??quipe. Faites la m??me chose pour chacun des joueurs de la deuxi??me ??quipe en vous assurant d'utiliser les m??mes noms de fruits. Lorsque vous nommez un fruit, les deux joueurs (un de chaque ??quipe) doivent se rendre au centre du cercle dans le but de r??cup??rer le ballon et aller s'assoir avec son ??quipe. Celui qui r??ussit marque un point pour son ??quipe. Recommencer encore et encore!", 8, 22);

INSERT INTO ACTIVITE
VALUES(9, "Activit?? Manuelle", "Mobile Musical", "Recyclage de bo??tes de conserve pour fabriquer un mobile musical r??cup.", 1, 22);

INSERT INTO ACTIVITE
VALUES(10, "Jeu ext??rieur", "L'animal musical", "Faire jouer une musique et, lorsqu'on l'arr??te, montrer une image d'animal aux enfants. Ils doivent imiter celui-ci, son cri et sa d??marche. Lorsque vous repartez la musique, les enfants recommencent ?? danser. Lorsque la musique est arr??t??, il y a un nouvel animal ?? imiter.", 6, 16);

INSERT INTO ACTIVITE
VALUES(11, "Activit?? Manuelle", "Papillons", "Des filtres ?? caf?? color??s et pinces ?? linge pour fabriquer des papillons mignons.", 1, 22);

INSERT INTO ACTIVITE
VALUES(12, "Activit?? Culinaire", "Mouler une corne de licorne dans la p??te ?? modeler. Pour cela, rouler un morceau de p??te ?? modeler pour faire un saucisson ou rouleau. Plier le rouleau obtenu en deux et entortiller le entre vos doigts. Planter un pique ou un cure-dent et laisesr s??cher ?? l'air. Une fois la corne s??che, la tremper dans de la peinture or et laisser s??cher. Cr??er le reste de vos ??l??ments pour faire la couronne fleurie en p??te ?? sel ou coller des petits ??l??ments d??coratifs tout pr??ts. C'est comme vous pr??f??rez ! Coller la corne et vos ??l??ments fleuris au pistolet ?? colle. Faire les joues ?? l'aide d'un pinceau et de peinture rose.", 6, 16);

INSERT INTO ACTIVITE
VALUES(13, "Activit?? Manuelle", "Memory", "Un sachet, rempli de souvenirs photo imprim??es et coll??es sur des cercles en bois.", 1, 22);

INSERT INTO ACTIVITE
VALUES(14, "Activit?? Sportive", "Tague-Statue", "Choisir un enfant qui a la tague. Il doit essayer d'attraper les autres. Lorsqu'un enfant se fait attraper, il se transforme en statue d??s qu'il est touch??. Les autres enfants peuvent le d??livrer en venant passer en dessous de ses bras.", 8, 22);

INSERT INTO ACTIVITE
VALUES(15, "Activit?? Manuelle", "Poussin", "Un poussin en rouleau de papier toilette et plumes.", 1, 22);

INSERT INTO ACTIVITE
VALUES(16, "Jeu Ext??rieur", "Porteurs de Livre", "Faites un trajet simple ?? suivre pour les enfants. On peut simplement faire des trac??s au sol avec du ruban adh??sif de couleur et ajouter une petite poutre, des c??nes ?? contourner, etc. Les enfants doivent se d??placer ?? l'int??rieur du parcours en portant un livre (vieux livre, bottin t??l??phonique, etc.) sur leur t??te sans le faire tomber.", 6, 22);

INSERT INTO ACTIVITE
VALUES(17, "Activit?? Manuelle", "Ma famille", "Un arbre g??n??alogique, fait sur papier, pour conna??tre mieux les origines de sa famille", 1, 22);

INSERT INTO ACTIVITE
VALUES(18, "Jeu Ext??rieur", "Saute-grenouille", "Mettre les enfants en ligne, les uns derri??re les autres. Les enfants se penchent en grenouille et baissent la t??te. Le dernier saute par-dessus les enfants et se replace en grenouille au bout de la ligne. L'enfant qui est alors le dernier refait la m??me chose... et ainsi de suite (saute-mouton).", 10, 22);

INSERT INTO ACTIVITE
VALUES(19, "Activit?? Manuelle", "Attrape-r??ve", "Un attrape-r??ves fabriqu?? ?? partir d???un anneau en bois, pompons et motifs en feutrine multicolores.", 1, 22);

INSERT INTO ACTIVITE
VALUES(20, "Jeu Ext??rieur", "La Mare aux grenouilles", "Faites un grand cercle sur le sol avec une corde et demandez aux enfants de se placer au centre du cercle. Le cercle repr??sente la mare aux grenouilles. Vous menez le jeu et vous restez sur la rive. Lorsque vous dites ?? sur la rive ??, les enfants doivent sauter hors du cercle. Lorsque vous dites ?? dans la mare ??, les enfants doivent y retourner ou ne pas bouger s'ils y sont d??j??. Un enfant peut ensuite prendre la place du meneur.",6, 22);

INSERT INTO ACTIVITE
VALUES(21, "Jeu Ext??ieur/Int??rieur", "Cachette sonore", "Prendre un r??veille-matin (ou une minuterie) que vous programmez pour qu'il sonne quelques minutes plus tard. Cachez-le dans le local. Les enfants doivent le trouver en se fiant uniquement au son.", 6, 22);



# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE MATERIEL
# -----------------------------------------------------------------------------

 INSERT INTO MATERIEL
 VALUES("RP", "Roleau papier toilette");

 INSERT INTO MATERIEL
 VALUES("LC", "Longue corde");

 INSERT INTO MATERIEL
 VALUES("PC", "Papier cartonn??");

 INSERT INTO MATERIEL
 VALUES("PL", "Pince ?? linge");

 INSERT INTO MATERIEL
 VALUES("BG", "B??tonnets de glace");

 INSERT INTO MATERIEL
 VALUES("BL", "Ballon");

 INSERT INTO MATERIEL
 VALUES("PCL", "Papier color??");

 INSERT INTO MATERIEL
 VALUES("PMP", "Pompon");

 INSERT INTO MATERIEL
 VALUES("BLG", "Bouchon de li??ge");

 INSERT INTO MATERIEL
 VALUES("CD", "Cure-dent");

 INSERT INTO MATERIEL
 VALUES("PB", "Papier blanc");

 INSERT INTO MATERIEL
 VALUES("AB", "Anneau en bois");

 INSERT INTO MATERIEL
 VALUES("CBO", "Cercle en bois");

 INSERT INTO MATERIEL
 VALUES("BC", "Bo??te de conserve");

 INSERT INTO MATERIEL
 VALUES("FC", "Filtre ?? caf?? color??");

 INSERT INTO MATERIEL
 VALUES("PHI", "Photo imprim??e");

 INSERT INTO MATERIEL
 VALUES("PLM", "Plume");

 INSERT INTO MATERIEL
 VALUES("MFM", "Motif en feutrine multicolore");


# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE PARTICIPER ANIMATEUR
# -----------------------------------------------------------------------------

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(1,1);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(1,2);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(1,3);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(1,4);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(2,3);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(2,4);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(2,5);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(2,6);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(3,1);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(3,2);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(3,5);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(3,6);

  INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(4,1);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(4,2);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(4,3);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(4,4);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(5,1);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(5,2);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(5,3);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(5,4);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(5,5);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(5,6);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(6,1);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(6,2);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(6,3);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(6,4);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(6,5);

 INSERT INTO PARTICIPER_ANIMATEUR
 VALUES(6,6);


# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE PARTICIPER ENFANT
# -----------------------------------------------------------------------------


INSERT INTO PARTICIPER_ENFANT
VALUES(1,7);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,8);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,9);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,10);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,11);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,12);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,13);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,14);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,15);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,16);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,17);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,18);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,19);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,20);

INSERT INTO PARTICIPER_ENFANT
VALUES(1,21);



INSERT INTO PARTICIPER_ENFANT
VALUES(2,12);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,13);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,14);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,15);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,16);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,17);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,18);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,19);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,20);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,21);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,22);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,23);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,24);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,25);

INSERT INTO PARTICIPER_ENFANT
VALUES(2,26);



INSERT INTO PARTICIPER_ENFANT
VALUES(3,17);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,18);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,19);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,20);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,21);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,22);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,23);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,24);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,25);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,26);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,27);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,28);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,29);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,30);

INSERT INTO PARTICIPER_ENFANT
VALUES(3,31);



INSERT INTO PARTICIPER_ENFANT
VALUES(4,22);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,23);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,24);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,25);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,26);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,27);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,28);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,29);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,30);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,31);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,32);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,33);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,34);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,35);

INSERT INTO PARTICIPER_ENFANT
VALUES(4,36);



INSERT INTO PARTICIPER_ENFANT
VALUES(5,7);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,8);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,9);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,10);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,11);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,12);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,13);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,14);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,15);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,16);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,17);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,18);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,19);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,20);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,21);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,22);

INSERT INTO PARTICIPER_ENFANT
VALUES(5,23);



INSERT INTO PARTICIPER_ENFANT
VALUES(6,12);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,13);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,14);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,15);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,16);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,17);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,18);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,19);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,20);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,21);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,22);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,23);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,24);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,25);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,26);

INSERT INTO PARTICIPER_ENFANT
VALUES(6,27);


# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE CONTENIR ACTIVITE
# -----------------------------------------------------------------------------

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,1);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,2);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,3);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,4);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,5);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,6);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,7);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,8);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,9);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,10);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,11);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,12);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,13);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,14);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,15);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,16);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,17);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,18);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,19);

INSERT INTO CONTENIR_ACTIVITE
VALUES(1,20);



INSERT INTO CONTENIR_ACTIVITE
VALUES(2,2);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,3);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,4);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,5);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,6);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,7);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,8);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,9);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,10);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,11);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,12);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,13);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,14);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,15);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,16);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,17);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,18);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,19);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,20);

INSERT INTO CONTENIR_ACTIVITE
VALUES(2,21);



INSERT INTO CONTENIR_ACTIVITE
VALUES(3,1);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,2);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,4);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,5);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,6);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,7);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,8);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,9);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,10);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,11);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,12);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,13);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,14);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,15);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,16);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,17);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,18);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,19);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,20);

INSERT INTO CONTENIR_ACTIVITE
VALUES(3,21);



INSERT INTO CONTENIR_ACTIVITE
VALUES(4,1);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,2);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,3);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,5);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,6);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,7);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,8);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,9);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,10);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,11);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,12);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,13);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,14);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,15);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,16);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,17);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,18);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,19);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,20);

INSERT INTO CONTENIR_ACTIVITE
VALUES(4,21);



INSERT INTO CONTENIR_ACTIVITE
VALUES(5,1);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,2);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,3);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,4);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,6);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,7);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,8);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,9);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,10);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,11);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,12);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,13);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,14);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,15);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,16);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,17);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,18);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,19);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,20);

INSERT INTO CONTENIR_ACTIVITE
VALUES(5,21);




INSERT INTO CONTENIR_ACTIVITE
VALUES(6,1);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,2);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,3);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,4);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,5);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,7);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,8);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,9);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,10);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,11);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,12);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,13);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,14);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,15);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,16);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,17);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,18);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,19);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,20);

INSERT INTO CONTENIR_ACTIVITE
VALUES(6,21);




# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE ANIMER
# -----------------------------------------------------------------------------


/*CREATE TABLE  ANIMER
 (
   NUM_PERSONNE INTEGER(2) NOT NULL  ,
   NUM_ACTIVITE INTEGER(2) NOT NULL  ,
   UNEDATE CHAR(32) NOT NULL  ,
   DEBUT_ACTIVITE DATE NULL  ,
   FIN_ACTIVITE DATE NULL  ,
   PRIMARY KEY (NUM_PERSONNE,NUM_ACTIVITE,UNEDATE) 
 ) ;*/


 INSERT INTO ANIMER
 VALUES(1,1,"2020-10-19", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(2,1,"2020-10-19", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(1,2,"2020-10-19", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(2,2,"2020-10-19", "15:00", "16:30");


 INSERT INTO ANIMER
 VALUES(1,3,"2020-10-20", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(2,3,"2020-10-20", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(1,4,"2020-10-20", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(2,4,"2020-10-20", "15:00", "16:30");


 INSERT INTO ANIMER
 VALUES(1,5,"2020-10-21", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(2,5,"2020-10-21", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(1,6,"2020-10-21", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(2,6,"2020-10-21", "15:00", "16:30");


 INSERT INTO ANIMER
 VALUES(1,7,"2020-10-22", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(2,7,"2020-10-22", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(1,8,"2020-10-22", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(2,8,"2020-10-22", "15:00", "16:30");



 INSERT INTO ANIMER
 VALUES(1,9,"2020-10-23", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(2,9,"2020-10-23", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(1,10,"2020-10-23", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(2,10,"2020-10-23", "15:00", "16:30");



 INSERT INTO ANIMER
 VALUES(3,11,"2020-10-26", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(4,11,"2020-10-26", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(3,12,"2020-10-26", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(4,12,"2020-10-26", "15:00", "16:30");


 INSERT INTO ANIMER
 VALUES(3,13,"2020-10-27", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(4,13,"2020-10-27", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(3,14,"2020-10-27", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(4,14,"2020-10-27", "15:00", "16:30");


 INSERT INTO ANIMER
 VALUES(3,15,"2020-10-28", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(4,15,"2020-10-28", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(3,16,"2020-10-28", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(4,16,"2020-10-28", "15:00", "16:30");


 INSERT INTO ANIMER
 VALUES(3,17,"2020-10-29", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(4,17,"2020-10-29", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(3,18,"2020-10-29", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(4,18,"2020-10-29", "15:00", "16:30");


 INSERT INTO ANIMER
 VALUES(3,17,"2020-10-29", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(4,17,"2020-10-29", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(3,18,"2020-10-29", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(4,18,"2020-10-29", "15:00", "16:30");


  INSERT INTO ANIMER
 VALUES(3,19,"2020-10-30", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(4,19,"2020-10-30", "10:00", "11:30");

 INSERT INTO ANIMER
 VALUES(3,20,"2020-10-30", "15:00", "16:30");

 INSERT INTO ANIMER
 VALUES(4,20,"2020-10-30", "15:00", "16:30");


# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE APTE_ENFANT
# -----------------------------------------------------------------------------


 INSERT INTO APTE_ENFANT
 VALUES(7,1);

 INSERT INTO APTE_ENFANT
 VALUES(8,1);

 INSERT INTO APTE_ENFANT
 VALUES(9,1);

 INSERT INTO APTE_ENFANT
 VALUES(10,1);

 INSERT INTO APTE_ENFANT
 VALUES(11,1);

 INSERT INTO APTE_ENFANT
 VALUES(12,1);

 INSERT INTO APTE_ENFANT
 VALUES(13,1);

 INSERT INTO APTE_ENFANT
 VALUES(14,1);

 INSERT INTO APTE_ENFANT
 VALUES(15,1);

 INSERT INTO APTE_ENFANT
 VALUES(16,1);

 INSERT INTO APTE_ENFANT
 VALUES(17,1);

 INSERT INTO APTE_ENFANT
 VALUES(18,1);

 INSERT INTO APTE_ENFANT
 VALUES(19,1);

 INSERT INTO APTE_ENFANT
 VALUES(20,1);

 INSERT INTO APTE_ENFANT
 VALUES(21,1);


 

 INSERT INTO APTE_ENFANT
 VALUES(7,2);

 INSERT INTO APTE_ENFANT
 VALUES(8,2);

 INSERT INTO APTE_ENFANT
 VALUES(9,2);

 INSERT INTO APTE_ENFANT
 VALUES(10,2);

 INSERT INTO APTE_ENFANT
 VALUES(11,2);

 INSERT INTO APTE_ENFANT
 VALUES(12,2);

 INSERT INTO APTE_ENFANT
 VALUES(13,2);

 INSERT INTO APTE_ENFANT
 VALUES(14,2);

 INSERT INTO APTE_ENFANT
 VALUES(15,2);

 INSERT INTO APTE_ENFANT
 VALUES(16,2);

 INSERT INTO APTE_ENFANT
 VALUES(17,2);

 INSERT INTO APTE_ENFANT
 VALUES(18,2);

 INSERT INTO APTE_ENFANT
 VALUES(19,2);

 INSERT INTO APTE_ENFANT
 VALUES(20,2);

 INSERT INTO APTE_ENFANT
 VALUES(21,2);




 
 INSERT INTO APTE_ENFANT
 VALUES(7,3);

 INSERT INTO APTE_ENFANT
 VALUES(8,3);

 INSERT INTO APTE_ENFANT
 VALUES(9,3);

 INSERT INTO APTE_ENFANT
 VALUES(10,3);

 INSERT INTO APTE_ENFANT
 VALUES(11,3);

 INSERT INTO APTE_ENFANT
 VALUES(12,3);

 INSERT INTO APTE_ENFANT
 VALUES(13,3);

 INSERT INTO APTE_ENFANT
 VALUES(14,3);

 INSERT INTO APTE_ENFANT
 VALUES(15,3);

 INSERT INTO APTE_ENFANT
 VALUES(16,3);

 INSERT INTO APTE_ENFANT
 VALUES(17,3);

 INSERT INTO APTE_ENFANT
 VALUES(20,3);

 INSERT INTO APTE_ENFANT
 VALUES(21,3);


  INSERT INTO APTE_ENFANT
 VALUES(7,4);

 INSERT INTO APTE_ENFANT
 VALUES(8,4);

 INSERT INTO APTE_ENFANT
 VALUES(9,4);

 INSERT INTO APTE_ENFANT
 VALUES(10,4);

 INSERT INTO APTE_ENFANT
 VALUES(11,4);

 INSERT INTO APTE_ENFANT
 VALUES(12,4);

 INSERT INTO APTE_ENFANT
 VALUES(13,4);

 INSERT INTO APTE_ENFANT
 VALUES(14,4);

 INSERT INTO APTE_ENFANT
 VALUES(15,4);

 INSERT INTO APTE_ENFANT
 VALUES(16,4);

 INSERT INTO APTE_ENFANT
 VALUES(17,4);

 INSERT INTO APTE_ENFANT
 VALUES(20,4);

 INSERT INTO APTE_ENFANT
 VALUES(21,4);



 INSERT INTO APTE_ENFANT
 VALUES(7,5);

 INSERT INTO APTE_ENFANT
 VALUES(8,5);

 INSERT INTO APTE_ENFANT
 VALUES(9,5);

 INSERT INTO APTE_ENFANT
 VALUES(10,5);

 INSERT INTO APTE_ENFANT
 VALUES(11,5);

 INSERT INTO APTE_ENFANT
 VALUES(12,5);

 INSERT INTO APTE_ENFANT
 VALUES(13,5);

 INSERT INTO APTE_ENFANT
 VALUES(14,5);

 INSERT INTO APTE_ENFANT
 VALUES(15,5);

 INSERT INTO APTE_ENFANT
 VALUES(17,5);

 INSERT INTO APTE_ENFANT
 VALUES(18,5);

 INSERT INTO APTE_ENFANT
 VALUES(19,5);

 INSERT INTO APTE_ENFANT
 VALUES(20,5);

 INSERT INTO APTE_ENFANT
 VALUES(21,5);


 

 INSERT INTO APTE_ENFANT
 VALUES(7,6);

 INSERT INTO APTE_ENFANT
 VALUES(8,6);

 INSERT INTO APTE_ENFANT
 VALUES(9,6);

 INSERT INTO APTE_ENFANT
 VALUES(10,6);

 INSERT INTO APTE_ENFANT
 VALUES(11,6);

 INSERT INTO APTE_ENFANT
 VALUES(12,6);

 INSERT INTO APTE_ENFANT
 VALUES(13,6);

 INSERT INTO APTE_ENFANT
 VALUES(14,6);

 INSERT INTO APTE_ENFANT
 VALUES(15,6);

 INSERT INTO APTE_ENFANT
 VALUES(17,6);

 INSERT INTO APTE_ENFANT
 VALUES(18,6);

 INSERT INTO APTE_ENFANT
 VALUES(19,6);

 INSERT INTO APTE_ENFANT
 VALUES(20,6);

 INSERT INTO APTE_ENFANT
 VALUES(21,6);




 INSERT INTO APTE_ENFANT
 VALUES(7,7);

 INSERT INTO APTE_ENFANT
 VALUES(8,7);

 INSERT INTO APTE_ENFANT
 VALUES(9,7);

 INSERT INTO APTE_ENFANT
 VALUES(10,7);

 INSERT INTO APTE_ENFANT
 VALUES(11,7);

 INSERT INTO APTE_ENFANT
 VALUES(12,7);

 INSERT INTO APTE_ENFANT
 VALUES(13,7);

 INSERT INTO APTE_ENFANT
 VALUES(14,7);

 INSERT INTO APTE_ENFANT
 VALUES(15,7);

 INSERT INTO APTE_ENFANT
 VALUES(16,7);

 INSERT INTO APTE_ENFANT
 VALUES(17,7);

 INSERT INTO APTE_ENFANT
 VALUES(18,7);

 INSERT INTO APTE_ENFANT
 VALUES(19,7);

 INSERT INTO APTE_ENFANT
 VALUES(20,7);

 INSERT INTO APTE_ENFANT
 VALUES(21,7);


 

 INSERT INTO APTE_ENFANT
 VALUES(7,8);

 INSERT INTO APTE_ENFANT
 VALUES(8,8);

 INSERT INTO APTE_ENFANT
 VALUES(9,8);

 INSERT INTO APTE_ENFANT
 VALUES(10,8);

 INSERT INTO APTE_ENFANT
 VALUES(11,8);

 INSERT INTO APTE_ENFANT
 VALUES(12,8);

 INSERT INTO APTE_ENFANT
 VALUES(13,8);

 INSERT INTO APTE_ENFANT
 VALUES(14,8);

 INSERT INTO APTE_ENFANT
 VALUES(15,8);

 INSERT INTO APTE_ENFANT
 VALUES(16,8);

 INSERT INTO APTE_ENFANT
 VALUES(17,8);

 INSERT INTO APTE_ENFANT
 VALUES(18,8);

 INSERT INTO APTE_ENFANT
 VALUES(19,8);

 INSERT INTO APTE_ENFANT
 VALUES(20,8);

 INSERT INTO APTE_ENFANT
 VALUES(21,8);




 INSERT INTO APTE_ENFANT
 VALUES(7,9);

 INSERT INTO APTE_ENFANT
 VALUES(8,9);

 INSERT INTO APTE_ENFANT
 VALUES(9,9);

 INSERT INTO APTE_ENFANT
 VALUES(10,9);

 INSERT INTO APTE_ENFANT
 VALUES(11,9);

 INSERT INTO APTE_ENFANT
 VALUES(12,9);

 INSERT INTO APTE_ENFANT
 VALUES(13,9);

 INSERT INTO APTE_ENFANT
 VALUES(14,9);

 INSERT INTO APTE_ENFANT
 VALUES(15,9);

 INSERT INTO APTE_ENFANT
 VALUES(16,9);

 INSERT INTO APTE_ENFANT
 VALUES(17,9);

 INSERT INTO APTE_ENFANT
 VALUES(18,9);

 INSERT INTO APTE_ENFANT
 VALUES(19,9);

 INSERT INTO APTE_ENFANT
 VALUES(20,9);

 INSERT INTO APTE_ENFANT
 VALUES(21,9);


 

 INSERT INTO APTE_ENFANT
 VALUES(7,10);

 INSERT INTO APTE_ENFANT
 VALUES(8,10);

 INSERT INTO APTE_ENFANT
 VALUES(9,10);

 INSERT INTO APTE_ENFANT
 VALUES(10,10);

 INSERT INTO APTE_ENFANT
 VALUES(11,10);

 INSERT INTO APTE_ENFANT
 VALUES(12,10);

 INSERT INTO APTE_ENFANT
 VALUES(13,10);

 INSERT INTO APTE_ENFANT
 VALUES(14,10);

 INSERT INTO APTE_ENFANT
 VALUES(15,10);

 INSERT INTO APTE_ENFANT
 VALUES(16,10);

 INSERT INTO APTE_ENFANT
 VALUES(17,10);

 INSERT INTO APTE_ENFANT
 VALUES(18,10);

 INSERT INTO APTE_ENFANT
 VALUES(19,10);

 INSERT INTO APTE_ENFANT
 VALUES(20,10;

 INSERT INTO APTE_ENFANT
 VALUES(21,10);


# -----------------------------------------------------------------------------
#    INSERTION DANS LA TABLE UTILISER MATERIEL
# -----------------------------------------------------------------------------


 INSERT INTO UTILISER_MATERIEL
 VALUES("RP", 1, 20);

  INSERT INTO UTILISER_MATERIEL
 VALUES("PC", 1, 20);

 INSERT INTO UTILISER_MATERIEL
 VALUES("PL", 3, 40);

  INSERT INTO UTILISER_MATERIEL
 VALUES("BG", 3, 30);

  INSERT INTO UTILISER_MATERIEL
 VALUES("PMP", 5, 20);

  INSERT INTO UTILISER_MATERIEL
 VALUES("PCL", 5, 30);

   INSERT INTO UTILISER_MATERIEL
 VALUES("BLG", 7, 20);

  INSERT INTO UTILISER_MATERIEL
 VALUES("CD", 7, 20);

   INSERT INTO UTILISER_MATERIEL
 VALUES("PB", 7, 20);

   INSERT INTO UTILISER_MATERIEL
 VALUES("BC", 9, 22);

   INSERT INTO UTILISER_MATERIEL
 VALUES("PL", 11, 30);

  INSERT INTO UTILISER_MATERIEL
 VALUES("FC", 11, 30);

   INSERT INTO UTILISER_MATERIEL
 VALUES("PHI", 13, 22);

  INSERT INTO UTILISER_MATERIEL
 VALUES("CBO", 13, 22);

  INSERT INTO UTILISER_MATERIEL
 VALUES("PLM", 15, 40);

  INSERT INTO UTILISER_MATERIEL
 VALUES("RP", 15, 20);

  INSERT INTO UTILISER_MATERIEL
 VALUES("PB", 17, 40);

  INSERT INTO UTILISER_MATERIEL
 VALUES("AB", 19, 20);

  INSERT INTO UTILISER_MATERIEL
 VALUES("PMP", 19, 20);

  INSERT INTO UTILISER_MATERIEL
 VALUES("MFM", 19, 30);

  



