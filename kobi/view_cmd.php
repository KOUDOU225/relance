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
                    <h1>COMMANDE</h1>

                </div>

                <!-- notifications -->
                <?php
                  include("vue/notification.php")
                ?>

                <!-- Utilisateur -->
                <?php
                  include("vue/user.php")
                ?>

            </nav>
        </header>
        <div id="global">
            <div class="container-fluid cm-container-white">
                <h2 style="margin-top:0;">Détails Commande</h2>
            </div>

            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-body" id="demo-buttons">
                      <?php
                        require_once('../connexion_file.php');
                          $numeroCommande=$_GET['numecm'];
                          $sql=$based->query("SELECT type,Url,DSN1,DSN2,DSN3,ContactEntreprise,Entreprise,Adresse,Email1,Email2,Pays,Ville 
                                                              FROM commande,entreprise WHERE idCommande=Entreprise_idEntreprise AND Entreprise_idEntreprise=Personnelle_idPersonnelle AND Num_CMD=".$numeroCommande);
                          While($row=$sql->fetch())
                          {
                            $type=$row['type'];
                            $url=$row['Url'];
                            $dsn1=$row['DSN1'];
                            $dsn2=$row['DSN2'];
                            $dsn3=$row['DSN3'];
                            $contact=$row['ContactEntreprise'];
                            $adresse=$row['Adresse'];
                            $Email1=$row['Email1'];
                            $Email2=$row['Email2'];
                            $pays=$row['Pays'];
                            $ville=$row['Ville'];
                            $entreprise=$row['Entreprise'];
                          }
                      ?>

                <div class="row cm-fix-height">

                     <!-- DETAIL COMMANDE -->
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">Detail Commande</div>
                            <div class="panel-body">
                                <address>
                                    <strong>Type : </strong> <?php echo $type;?>
                                    <br><br>
                                    <strong>Adresse URL : </strong> <?php echo $url;?>
                                    <br><br>
                                    <strong>DSN 1 : </strong> <?php echo $dsn1;?>
                                    <br><br>
                                    <strong>DSN 2 : </strong> <?php echo $dsn2;?>
                                    <br><br>
                                    <strong>DSN 3 : </strong> <?php echo $dsn3;?>
                                </address>
                            </div>
                        </div>
                    </div>

                      <!-- INFORMATIONS ADMINISTRATIFS -->
                     <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">INFORMATIONS ADMINISTRATIFS</div>
                            <div class="panel-body">
                                <address>
                                    <strong>Contact : </strong> <?php echo $contact;?>
                                    <br><br>
                                    <strong>Email : </strong> <a href="mailto:#"><?php echo $Email1;?></a>
                                    <br><br>
                                    <strong>Email : </strong> <a href="mailto:#"><?php echo $Email2;?></a>
                                    <br><br>
                                    <strong>Entreprrise : </strong> <?php echo $entreprise;?>
                                    <br><br>
                                    <strong>Pays : </strong> <?php echo $pays;?>
                                    <br><br>
                                    <strong>Ville : </strong> <?php echo $ville;?>
                                    <br><br>
                                    <strong>Adresse : </strong> <?php echo $adresse;?>
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
                                    <strong>Contact : </strong> <?php echo $contact;?>
                                    <br><br>
                                    <strong>Email : </strong> <a href="mailto:#"><?php echo $Email1;?></a>
                                    <br><br>
                                    <strong>Email : </strong> <a href="mailto:#"><?php echo $Email2;?></a>
                                    <br><br>
                                    <strong>Entreprrise : </strong> <?php echo $entreprise;?>
                                    <br><br>
                                    <strong>Pays : </strong> <?php echo $pays;?>
                                    <br><br>
                                    <strong>Ville : </strong> <?php echo $ville;?>
                                    <br><br>
                                    <strong>Adresse : </strong> <?php echo $adresse;?>
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
