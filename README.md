# OLibrary
D�pot du projet OLibrary

MONFOUGA Hugo
HANOTEL Guillaume
PITAULT Cyriaque
GARDIN K�lian

A LIRE :

RAPPEL DU FONCTIONNEMENT DE GIT :

avant de commencer � travailler : 
git pull

ajouter les fichier modifi�s :
git add *    (� part de la racine du dossier)

faire un commit :
git commit -m "Message de description du commit(important)"

push sur github :
git push 


(commit � chaque nouvelle fonctionnalit� faite)

BASE DE DONNEES :

Pour que chacun puisse acc�der � sa base de donn�es sans avoir � changer le code � chaque fois,
chacun devra cr�er un nouvel utilisateur sur phpmyadmin avec comme login : olibrary et comme mot de passe : erty et cr�er une nouvelle base de donn�es nomm�e : bdd_olibrary
, qu'il garnira gr�ce au fichier MPD.sql pr�sent dans l'Etape 2



ORGANISATION DU CODE :

Chaque page sera organis� de la mani�re suivante :


require('Header.php');
<body>
<div id="accueil">

//Votre code

</div>
</body>

require('Footer.php');



Le html du header et footer seront dans des fichiers � part que l'on appela avec require car ceux-ci ne bougent pas


LE CSS (sous r�serve de faire du BootStrap)

Le fichier CSS sera dur � g�rer car on sera 4 dessus et il n'y aura qu'un seul fichier css pour toutes les pages, mais :
Au sein du fichier on s�parera le code de chacun avec de gros commentaires pour bien identifier � qui est la partie de qui.

apr�s la balise body, vous cr�ez une div avec comme identifiant le titre de la page pour mieux manipuler les s�lecteurs css
ex : si vous mettez un <ul> dans votre code et que vous voulez le stylis� comme suit :

ul {
 color : black;
}

, vous styliserai tous les <ul>, m�me ceux des autres. Donc pour �a pour utiliser l'identifieur d�fini pr�c�demment pour 
au moins s�lectionner les balises <ul> de votre page 
ex :

#accueil ul {
color : black;
}

idem pour toutes les autres balises (cherchez s�lecteur CSS sur google)


DESCRIPTION DES FONCTIONS DE CHAQUE PAGE :

Accueil : 

 