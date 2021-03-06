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
                    <div class="panel-heading text-center">
                        <div class="outter"><img class="image-circle" src="img-connect.png" style="width: 180px; height:180px"></div>
                    </div>
                    <div class="panel-body">
                        <form  action="new_user_var.php" method="POST">
                            <fieldset>
                            <!-- NOM UTILISATEUR -->
                                <div class="form-group">
                                   <label>UTILISATEUR</label>
                                   <input class="form-control" name="login" type="text">
                                </div>
                                <!-- MOT DE PASSE -->
                                <div class="form-group">
                                    <label>MOT DE PASSE</label>
                                    <input class="form-control" name="Mot_de_passe" type="text">
                                </div>
                                <!-- BOUTON VALIDER -->
                                <div class='col-md-6 col-md-offset-6'>
                                        <input type="submit" class="form-control" value="validation">
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
