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
                    <h1>NOUVEAU</h1>

                    <!-- <form id="cm-search" action="index.html" method="get">
                        <input type="search" name="q" autocomplete="off" placeholder="Search...">
                    </form> -->

                </div>

                <!-- <div class="pull-right">
                    <div id="cm-search-btn" class="btn btn-primary md-search-white" data-toggle="cm-search"></div>
                </div> -->

                <!-- notifications -->
                <?php
                  include("vue/notification.php")
                ?>

                <!-- Utilisateur -->
                <?php
                  include("vue/user.php")
                ?>
            </nav>

            <!-- Les etapes -->
            <nav class="cm-navbar cm-navbar-default cm-navbar-slideup">
                <div class="cm-flex">
                    <div class="nav-tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a>1. INFO PERSONELLES</a></li>
                            <li class="active"><a>2. Administration / Technique </a></li>
                            <li class="active"><a>3. Commande</a></li>
                            <!-- <li><a href="creation_colis3.php">4. Recepteur du colis</a></li> -->
                            <li class="active"><a>4. Enregistrer</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </header>

        <div id="global">
            <div class="container-fluid cm-container-white"></div>

            <div class="container-fluid cm-container-white">
              <?php
                require_once('../connexion_file.php');
                $sql=$based->query("SELECT NOM_PRENOM AS nom FROM personnelle WHERE idPersonnelle=LAST_VALUE(idPersonnelle)");
                foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row)
                {
                  $noms_prenoms=$row['nom'];
                }
              ?>
                <h2 style="margin-top:0;">	<?php echo $noms_prenoms;?></h2>
                <p>Le client a ete bien enregistre.</p>
            </div>

            <div class="container-fluid">

                <div class="panel panel-default">
                    <div class="panel-body" id="demo-buttons">
                    </div>

                    <div class="row">

                        <div class="col-sm-1">
                        </div>

                        <div class="col-sm-6">
                          <?php
                          $sql=$based->query("SELECT Num_CMD AS ncmd FROM commande WHERE idCommande=LAST_VALUE(idCommande)");
                          foreach($sql->fetchAll(PDO::FETCH_ASSOC) as $row)
                          {
                            $numero_cmd=$row['ncmd'];
                          }
                          ?>
                        <pre style="margin-bottom:0">
                            <code>
                                NUM CMD: <?php echo   $numero_cmd;?>
                            </code>
                        </pre>
                        </div>

                        <div class="col-sm-4 center">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="assets/img/img-facture.JPEG" class="img-responsive">

                                <div class="panel-body demo-btn">
                                    <button type="button" class="btn btn-danger">Telecharger la fiche</button>
                                    <p><a href="index.php">Page acceuil</a></p>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-1">
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
