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
                            <li><a>3. Commande</a></li>
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
                <!-- <div class="row cm-fix-height">
                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="assets/img/sass-less.png" alt="Less support" class="img-responsive">
                                <br>
                                <p>Clearmin ships with vanilla CSS, but its source code utilizes Less CSS preprocessor. Quickly get started with precompiled CSS or build on the source. Colors and sizes are easily customizable with less variables.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="assets/img/devices.png" alt="Responsive across devices" class="img-responsive">
                                <br>
                                <p>Clearmin easily and efficiently scales your websites and applications with a single code base, from phones to tablets to desktops with CSS media queries. Swipe from left on phones to toggle main menu.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <img src="assets/img/components.png" alt="Components" class="img-responsive">
                                <br>
                                <p>With Bootstrap, you get extensive and beautiful documentation for common HTML elements, dozens of custom HTML and CSS components, and awesome jQuery plugins.</p>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="panel panel-default">
                    <div class="panel-heading">ÉTAPE 2 : Informations administratives et techniques</div>
                    <div class="text-danger text-center"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></div>
                    <div class="panel-body" id="demo-buttons">

                    <form class="form-horizontal" action="var/admin.php" method="POST" autocomplete="off">
                        <!-- ADRESSE DE COLLECTE -->
                        <div class="alert alert-info shadowed" role="alert"> <i class="fa fa-fw fa-info-circle"></i>INFORMATIONS ADMINISTRATIFS</div>
                        <div class="panel-body">

                                    <div class="form-group">

                                        <label for="" class="col-sm-1 control-label">CONTACT</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" name="contact">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-1 control-label">EMAIL 1</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="" name="email1">
                                        </div>
                                        <label for="" class="col-sm-1 control-label">EMAIL 2</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="" name="email2">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-1 control-label">ENTREPRISE</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="" name="entreprise">
                                        </div>
                                        <label for="" class="col-sm-1 control-label">PAYS</label>
                                        <div class="col-sm-3">
                                          <input type="text" class="form-control" id="" name="pays">&nbsp;&nbsp;
                                        </div>
                                        <label for="" class="col-sm-1 control-label">VILLE</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="" name="ville">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-sm-1 control-label">ADRESSE</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="" name="adresse">
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom:0">
                                        <div class="col-sm-offset-2 col-sm-5 text-right">
                                            <button type="reset" class="btn btn-default">EFFACER</button>
                                            <button type="submit" class="btn btn-primary" name="suivant">SUIVANT</button>
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
