<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clearmin.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.css">
        <link rel="stylesheet" type="text/css" href="assets/css/material-design.css">
        <link rel="stylesheet" type="text/css" href="assets/css/small-n-flat.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <title>ADMINISTRATION</title>
    </head>
    <body class="cm-no-transition cm-1-navbar">
        <div id="cm-menu">


            <nav class="cm-navbar cm-navbar-primary">
                <!-- Logo -->
                <?php
                 include("vue/logo.php")
                ?>
                <!-- Fin logo -->
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>

            <!-- MENU -->
            <?php
              include("vue/main.php")
            ?>
            <!-- Fin MENU -->

        </div>

        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>CLIENT</h1>
                </div>

                <!-- notifications -->
                <?php
                  include("vue/notification.php");
                ?>

                <!-- Utilisateur -->
                 <?php
                  include("vue/user.php")
                ?>


            </nav>
        </header>
        <div id="global">
            <div class="container-fluid cm-container-white">
                <h2 style="margin-top:0;">Détails Client</h2>
            </div>
            
            <?php
                     require_once('../connexion_file.php');
                    $numeroclient=$_GET['client'];
                    
                    //REQUETE 1
                    $requete=$based->query("SELECT  idPersonnelle,NOM_PRENOM,ContactPersonnelle,Email,personnelle.Ville,personnelle.Pays,personnelle.Adresse,idEntreprise,ContactEntreprise,Email1,Email2,Entreprise,entreprise.Ville,entreprise.Pays,entreprise.Adresse,Personnelle_idPersonnelle,Num_CMD
                                                                FROM personnelle,entreprise,commande WHERE idPersonnelle=Entreprise_idEntreprise AND Entreprise_idEntreprise=Personnelle_idPersonnelle AND Num_CMD=".$numeroclient );
                          While($result=$requete->fetch())
                          
                          {
                                $nom=$result['NOM_PRENOM'];
                                $contactpersonne=$result['ContactPersonnelle'];
                                $mailpersonne=$result['Email'];
                                //$villepersonne=$result['personnelle.Ville'];
                                //$payspersonne=$result['personnelle.Pays'];
                                //$adrpersonne=$result['personnelle.Adresse'];
                                $contEnt=$result['ContactEntreprise'];
                                $mail1=$result['Email1'];
                                $mail2=$result['Email2'];
                                $nonEnt=$result['Entreprise'];
                                //$villeEnt=$result['entreprise.Pays'];
                                //$paysEnt=$result['personnelle.Pays'];
                                //$adrEnt=$result['entreprise.Adresse'];
                           }
            ?>
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-body" id="demo-buttons">


                <div class="result cm-fix-height">  
                                       
                     <!-- INFORMATIONS PERSONNELLE -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">INFORMATIONS PERSONNEL</div>
                            <div class="panel-body">
                                <address>
                                    <strong>Nom et prenoms : </strong> <?php echo $nom;?>
                                    <br><br>
                                    <strong>Contact : </strong> <?php echo $contactpersonne;?>
                                    <br><br>
                                    <strong>Email : </strong> <a href="mailto:#"></a> <?php echo $mailpersonne;?>
                                    <br><br>
                                    <strong>Entreprrise : </strong> <?php echo $nonEnt;?>
                                    <br><br>
                                    <strong>Pays : </strong>
                                    <br><br>
                                    <strong>Ville : </strong> 
                                    <br><br>
                                    <strong>Adresse : </strong> 
                                </address>
                            </div>
                        </div>
                    </div>

                    <!-- INFORMATIONS ADMINISTRATIVE -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">INFORMATIONS ADMINISTRATIFS</div>
                            <div class="panel-body">
                                <address>
                                    <strong>Nom et prenoms : </strong> <?php echo $nom;?>
                                    <br><br>
                                    <strong>Contact : </strong> <?php echo $contEnt;?>
                                    <br><br>
                                    <strong>Email : </strong> <a href="mailto:#">  <?php echo $mail1;?>  </a>
                                </address>
                            </div>
                        </div>
                    </div>
                    
                     <!-- INFORMATIONS TECHNIQUES -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">INFORMATIONS TECHNIQUES</div>
                            <div class="panel-body">
                                <address>
                                    <strong>Nom et prenoms : </strong><?php echo $nom;?>
                                    <br><br>
                                    <strong>Contact : </strong><?php echo $contEnt;?>
                                    <br><br>
                                    <strong>Email : </strong> <a href="mailto:#">  <?php echo $mail2;?>  </a>
                                </address>
                            </div>
                        </div>
                    </div>



                </div>




                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php
                include("vue/footer.php")
            ?>
            <!-- Fin footer -->

        </div>
        <script src="assets/js/lib/jquery-2.1.3.min.js"></script>
        <script src="assets/js/jquery.mousewheel.min.js"></script>
        <script src="assets/js/jquery.cookie.min.js"></script>
        <script src="assets/js/fastclick.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/clearmin.min.js"></script>
        <script src="assets/js/demo/home.js"></script>
    </body>
</html>
