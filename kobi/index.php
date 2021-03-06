<?php 
session_start();
if(isset($_SESSION['login'])){
?>
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
                    <h1>ACCEUIL</h1>

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
                <h2 style="margin-top:0;">LISTE DES COMMANDES</h2>
            </div>

            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading">TITRE PAGE</div>
                    
                    
                    <div class="panel-body" id="demo-buttons">

                      <?php
                          require_once('../connexion_file.php');
                          $requete=$based->query("SELECT  NOM_PRENOM AS CLIENT,Email,Num_CMD,type,Url,Date_Debut,Date_Fin,CURRENT_TIMESTAMP AS temps FROM personnelle,commande WHERE idPersonnelle=Entreprise_idEntreprise");
                      ?>


                <div class="row">
                    <div class="col-md-12">
                            <div class="panel-body">

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Num CMD</th>
                                            <th>CLIENT</th>
                                            <th>TYPE</th>
                                            <th>ADRESSE URL</th>
                                            <th>DATE DEBUT</th>
                                            <th>DATE FIN</th>
                                            <th>TEMPS RESTANT</th>
                                        </tr>
                                    </thead>
                                    
                                     <?php    $rouge="<button type='button' class='btn btn-danger'><i class='fa fa-fw fa-close fa-lg'></i></button>";   
                                              $vert="<button type='button' class='btn btn-success'><i class='fa fa-fw fa fa-fa fa-check fa-lg'></i></button>";?>
                                            
                                    <tbody>
                                      <?php 
                                          while($tableau=$requete->fetch(PDO::FETCH_ASSOC)){
                                              
                                              /*    AUJOURD'HUI    */
                                                $aujourdhui = new DateTime($tableau['temps']);
                                               
                                               /*    DIFFERENCE DE DATE 1    */
                                                $debut = strtotime($tableau['Date_Debut']);
                                                $fin = strtotime($tableau['Date_Fin']);
                                                $dif = ceil(abs($fin - $debut) / 86400);
                                                //echo  $dif;
                                                

                                                /*    DIFFERENCE DE DATE 2    */
                                                $datetime2 = new DateTime($tableau['Date_Fin']);
                                                $difference = $datetime2->diff($aujourdhui);
                                               // $difference=$aujourdhui->diff($datetime2);
                                                //$tempsrestant = $difference ->format('%R%a');
                                                $tempsrestant = $difference ->format('%a');
                                                // echo 'Difference: '.$difference->y.' Annees, ' .$difference->m.' Mois, ' .$difference->d.' Jours'; 

                                                 /*    LES JOURS    */
                                                 $cal=$dif;
                                                 $reste=0;
                                                 $begin = new DateTime($tableau['Date_Debut']);
                                                 $end   = new DateTime($tableau['Date_Fin']);
                                                     for($index = $begin; $index <= $end; $index->modify('+1 day'))
                                                     {
                                                          $cal = $cal-1;
                                                          $reste = $cal+1;
                                                          //echo $reste  . "\n"; 
                                                      }  

                                      ?>
                                      
                                        <tr>
                                            <td scope='row'><a href='view_cmd.php?numecm=<?php echo $tableau['Num_CMD']?>' onClick="event.prevenDefault();"><?php echo $tableau['Num_CMD']?></a></td>
                                            <td><a href='view_clt.php?client=<?php echo $tableau['Num_CMD']?>'>    <?php echo $tableau['CLIENT']?></a></td>
                                            <td><?php echo $tableau['type']?>   <br><?php echo '('. $dif;?> jours&nbsp;) </td>
                                            <td><?php echo $tableau['Url']?></td>
                                            <td>Validé le <?php echo $tableau['Date_Debut']?></td>
                                            <td><?php echo $tableau['Date_Fin']?> </td>
                                            <td>
                                                <?php ?> <br>
                                                 
                                                     <?php 
                                                          if($aujourdhui > $datetime2 )
                                                              {
                                                                   echo'<strong>' . 'D&Eacute;LAI&nbsp;PASS&Eacute;' .  '</strong>' ; 
                                                                }
                                                        elseif($aujourdhui <= $datetime2)
                                                            {
                                                                 echo 'IL RESTE ' . '<strong>'. $tempsrestant . '</strong>'. '&nbsp;' .'JOURS'; 
                                                                }
                                                     ?>
                                                         
                                            </td>
                                            <td>
                                            <?php

                                                 
                                                 if($aujourdhui >= $datetime2 )
                                                    { 
                                                            if($aujourdhui > $datetime2)
                                                                {
                                                                    echo $rouge;
                                                                  }
                                                            else
                                                            {
                                                                   echo $rouge;
                                                                     //==== MAIL DE RELANCE
//                                                                    $to=' ';
//                                                                    $subject = 'the subject';
//                                                                    $message = 'hello';
//                                                                    $headers = 'From: webmaster@example.com' .  " \r\n" .
//                                                                        'Reply-To: webmaster@example.com' . "\r\n" .
//                                                                        'X-Mailer: PHP/' . phpversion();
//                                                                            mail($to, $subject, $message, $headers);
                                                              }             
                                                        
                                                      }                                                 
                                                 else
                                                 {
                                                     echo $vert;
                                                   } 
                                                   //var_dump((int)$tempsrestant);
                                                  //  $tempsrestant=(int)$tempsrestant;
 
                                                  /* if(is_int($tempsrestant))
                                                  {
                                                      if($tempsrestant>0)
                                                      {
                                                          echo $vert;
                                                      }
                                                      else
                                                      {
                                                          echo $rouge;
                                                      }
                                                  } */
                                            ?>  
                                            </td>
                                        </tr>
                                      <?php }?>

                                    </tbody>
                                </table>

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
<?php 
    }
    else
    {
        $erreur="Veillez entrer vos parametre de connexion!";
        header('location:../connexion/index.php?e='.$erreur);
    }
?>
