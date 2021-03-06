<?php
DEFINE('SERVEUR','localhost');
DEFINE('UTILISATEUR','root');
DEFINE('BASE_DONNEE','bdd');
DEFINE('MOT_PASSE','');
    try {
      $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
      $based=new PDO('mysql:host='.SERVEUR.';dbname='.BASE_DONNEE,UTILISATEUR,MOT_PASSE,$pdo_options);

    } catch (PDOException $e) {

    }

 ?>
