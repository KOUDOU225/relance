<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <title>Connection</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-success">
                <div class="text-danger text-center alert-light"><strong>
                   <?
                         if(isset($_GET['e']))
                         {
                             echo $_GET['e'];
                         }
                   ?>
                   </strong>
                </div>
                    <div class="panel-heading text-center">
                        <div class="outter"><img class="image-circle" src="img-connect.png" style="width: 180px; height:180px"></div>
                    </div>
                    <div class="panel-body">
                        <form role="form" action='traitement.php' method='post'>
                            <fieldset>
                            <!-- NOM UTILISATEUR -->
                                <div class="form-group">
                                    <input class="form-control" placeholder="Login" type="text" autofocus name="login">
                                </div>
                                <!-- MOT DE PASSE -->
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mot de passe" type="password" name="Mot_de_passe">
                                </div>
                                <!-- MOT DE PASSE OUBLIE -->
                                <div>
                                    <?
                                      if((@$_GET['erreur']==true) && (isset($_GET['erreur'])))
                                      {
                                    ?>
                                    <div class="alert-light text-danger text-center py-3">
                                      <? echo $_GET['erreur'];?>
                                    </div>
                                    <?}?>
                                    <?
                                      if((@$_GET['invalide']==true) && (isset($_GET['invalide'])))
                                      {
                                    ?>
                                    <div class="alert-light text-danger text-center py-3">
                                      <? echo $_GET['invalide'];?>
                                    </div>
                                    <?}?>
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="" type="checkbox" value="">Mot de passe oublié
                                    </label>
                                </div> -->
                                <!-- CHAMP CACHE -->
                                <div class="checkbox">
                                        <input type="hidden" value="">
                                </div>
                                <!-- BOUTON VALIDER -->
                                <div class='col-md-6 col-md-offset-6'>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" value="ACCEDER">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="container">
        <div class="row">
        </div>
    </div>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
</body>
</html>
