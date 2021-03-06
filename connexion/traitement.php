<?php

  include('../connexion_file.php');
  $login=$_POST['login']   ;
  $Mot_de_passe=$_POST['Mot_de_passe']   ;
//  Récupération de l'login et de son pass hashé
$req = $based->prepare('SELECT idLogin, login, Mot_de_passe FROM se_connecter WHERE login = :login ');
$req->execute(array(
    'login' => $login ));
    
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['Mot_de_passe'], $resultat['Mot_de_passe']);

if (!$resultat)
{
     echo ' <body onLoad="alert(\'MEMBRE NON RECONNU\')"> ';
     echo '  <meta http-equiv="refresh" content="0;URL=index.php">  ';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['idLogin'] = $resultat['idLogin'];
        $_SESSION['login'] = $login;
        $_SESSION['Mot_de_passe'] = $Mot_de_passe;
        
         Header("Location: ../kobi/index.php");
        
    }
    else {
            echo ' <body onLoad="alert(\'Mauvais identifiant ou mot de passe !\')"> ';
            echo '  <meta http-equiv="refresh" content="0;URL=index.php">  ';
             }
}

?>
