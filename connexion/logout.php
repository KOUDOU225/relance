<?php 
session_start();
session_destroy();
header('location: ../connexion/index.php');
//header('location: https://jeberge.ci');
?>