<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        
        
        <!-- FICHIER CSS -->

        <link rel="stylesheet" href="<?= BASE_URL."/css/font-awesome.min.css" ?>">

        <link rel="stylesheet" href="<?= BASE_URL."/css/materialize.min.css" ?>"/>
       
        <link href="<?php echo BASE_URL."/css/style.css"; ?>" rel="stylesheet" type="text/css" />

        <!-- ICONES -->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <!-- FICHIER JS -->
        
        <script type="application/javascript" src="<?= BASE_URL."/js/jquery-2.1.4.js" ?>"></script>
    
        <script type="application/javascript" src="<?= BASE_URL."/js/materialize.min.js" ?>"></script>

        <script type="application/javascript" src="<?= BASE_URL."/js/app.js" ?>"></script>

        
        
        
        
        
        
        
        <title>OLibrary</title>

    </head>
    <body>




        <header>

                     <?php
                   // si pas connecté
                    if(!isset($_SESSION['connect'])){

                    ?>

                        <div class="" id="navbar">
                            <nav class="navbar-wrapped">
                                <div class="row">

                                    <a href="#" data-activates="mobile-demo" class="button-collapse col m2"><i class="material-icons">menu</i></a>
                                    <a href="<?php echo BASE_URL."/index/" ?>" class="brand-logo col m4 offset-m2 offset-l2 "><i class="fa fa-book fa-2x" aria-hidden="true"></i><h1>OLibrary</h1></a>

                                    <ul id="nav-mobile" class=" col m4 right hide-on-med-and-down">
                                        <li><a href="<?= BASE_URL."/connexion/" ?>">Connexion</a></li>
                                        <li><a href="<?= BASE_URL."/inscription/" ?>">Inscription</a></li>

                                    </ul>

                                </div>
                            </nav>


                            <ul class="side-nav" id="mobile-demo">
                                <li><a href="<?= BASE_URL."/connexion/" ?>">Connexion</a></li>
                                <li><a href="<?= BASE_URL."/inscription/" ?>">Inscription</a></li>
                            </ul>

                        </div>





                <?php
                // si connecté
                } else {
                    
                ?>

                        <div class="" id="navbar">
                            <nav class="navbar-wrapped">
                                <div class="row">

                                    <a href="#" data-activates="mobile-demo" class="button-collapse col m2"><i class="material-icons">menu</i></a>
                                    <a href="<?php echo BASE_URL."/index/" ?>" class="brand-logo col m4 offset-m2 offset-l2 "><i class="fa fa-book fa-2x" aria-hidden="true"></i><h1>OLibrary</h1></a>

                                    <ul id="nav-mobile" class=" col m5 right hide-on-med-and-down">
                                        <li><a href="<?= BASE_URL."/espaceperso/" ?>">Espace Perso</a></li>
                                        <li><a href="<?= BASE_URL."/deconnexion/" ?>">Deconnexion</a></li>

                                    </ul>

                                </div>
                            </nav>


                            <ul class="side-nav" id="mobile-demo">
                                <li><a href="<?= BASE_URL."/espaceperso/" ?>">Espace Perso</a></li>
                                <li><a href="<?= BASE_URL."/deconnexion/" ?>">Deconnexion</a></li>
                            </ul>

                        </div>

              
               <?php
                    
                }
                ?>
               
           
           
           




        </header>

