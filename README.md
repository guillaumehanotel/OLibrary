# OLibrary
Dépot du projet OLibrary

MONFOUGA Hugo
HANOTEL Guillaume
PITAULT Cyriaque
GARDIN Kélian

A LIRE :

RAPPEL DU FONCTIONNEMENT DE GIT :

avant de commencer à travailler : 
git pull

ajouter les fichier modifiés :
git add *    (à part de la racine du dossier)

faire un commit :
git commit -m "Message de description du commit(important)"

push sur github :
git push 


(commit à chaque nouvelle fonctionnalité faite)

BASE DE DONNEES :

Pour que chacun puisse accéder à sa base de données sans avoir à changer le code à chaque fois,
chacun devra créer un nouvel utilisateur sur phpmyadmin avec comme login : olibrary et comme mot de passe : erty et créer une nouvelle base de données nommée : bdd_olibrary
, qu'il garnira grâce au fichier MPD.sql présent dans l'Etape 2



ORGANISATION DU CODE :

Chaque page sera organisé de la manière suivante :


require('Header.php');
<body>
<div id="accueil">

//Votre code

</div>
</body>

require('Footer.php');



Le html du header et footer seront dans des fichiers à part que l'on appela avec require car ceux-ci ne bougent pas


LE CSS (sous réserve de faire du BootStrap)

Le fichier CSS sera dur à gérer car on sera 4 dessus et il n'y aura qu'un seul fichier css pour toutes les pages, mais :
Au sein du fichier on séparera le code de chacun avec de gros commentaires pour bien identifier à qui est la partie de qui.

après la balise body, vous créez une div avec comme identifiant le titre de la page pour mieux manipuler les sélecteurs css
ex : si vous mettez un <ul> dans votre code et que vous voulez le stylisé comme suit :

ul {
 color : black;
}

, vous styliserai tous les <ul>, même ceux des autres. Donc pour ça pour utiliser l'identifieur défini précédemment pour 
au moins sélectionner les balises <ul> de votre page 
ex :

#accueil ul {
color : black;
}

idem pour toutes les autres balises (cherchez sélecteur CSS sur google)


DESCRIPTION DES FONCTIONS DE CHAQUE PAGE :

Accueil : 

 