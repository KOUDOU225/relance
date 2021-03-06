<?php

  $message="";
  if(isset($_POST['suivant']))
  {
    require_once('../../connexion_file.php');
    if(isset($_POST['nom_prenoms']) && isset($_POST['contact']) && isset($_POST['email']) && isset($_POST['pays']) && isset($_POST['ville']) && isset($_POST['adresse']))
    {
      if(!empty($_POST['nom_prenoms']) && !empty($_POST['contact']) && !empty($_POST['email']) && !empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['adresse']))
      {
        $noms_prenoms=$_POST['nom_prenoms'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $pays=$_POST['pays'];
        $ville=$_POST['ville'];
        $adresse=$_POST['adresse'];
  
          $insertion=$based->prepare("INSERT INTO personnelle (Nom_Prenom,ContactPersonnelle,Email,Ville,Pays,Adresse) VALUES(?,?,?,?,?,?)");
          $stmt=$insertion->execute(array($noms_prenoms,$contact,$email,$ville,$pays,$adresse));
  
          if($stmt)
          {
            header('Location:../admin.php');
          }
      }
      else
      {
        $message="Veillez renseigner tous les champs";
        header('Location:../perso.php?message='.$message);

      }
    }
  }
?>
