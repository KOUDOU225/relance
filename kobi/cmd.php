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
                            <li><a>4. Enregistrer</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        </header>

        <div id="global">
            <div class="container-fluid cm-container-white"></div>

            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">ÉTAPE 3 : COMMANDE</div>
                    <div class="text-danger text-center"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></div>
                    <div class="panel-body" id="demo-buttons">

                        <form class="form-horizontal" action="var/end.php" method="POST" autocomplete="off">

                        <div class="panel-body">

                        <div class="form-group">
                                        <label for="" class="col-sm-1 control-label">TYPE</label>
                                        <div class="col-sm-4">
                                        <select name="type" class="form-control">
                                            <option selected></option>
                                            <option>Pack Perso</option>
                                            <option>Pack Ivoire</option>
                                            <option>Pack Start-Up</option>
                                            <option>Pack Etudiant</option>
                                            <option>Pack Blog trotting</option>
                                            <option>Pack Asso</option>
                                        </select>&nbsp;&nbsp;
                                        </div>
                                        <label for="" class="col-sm-1 control-label">URL</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" name="url">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-1 control-label">DSN1</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="" name="dsn1">
                                        </div>
                                        <label for="" class="col-sm-1 control-label">DSN2</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="" name="dsn2">
                                        </div>
                                        <label for="" class="col-sm-1 control-label">DSN3</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="" name="dsn3">
                                        </div>
                                        <div class="col-sm-3">
                                          <?php include('../fonction/aleatoire.php');?>
                                            <input type="hidden" class="form-control" id="" name="numcmd" value="<?php echo random_text(14);?>" >
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-5 text-right">
                                            <button type="reset" class="btn btn-default" >EFFACER</button>
                                            <button type="submit" class="btn btn-primary" name="valider">VALIDER</button>
                                        </div>
                                    </div>
                        </div>
                    </form>
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
