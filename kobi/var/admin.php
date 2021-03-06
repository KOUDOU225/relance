<?php
//header('Location:../cmd.php');
if(isset($_POST['suivant']))
{
  require_once('../../connexion_file.php');
  if(isset($_POST['email2']) && isset($_POST['contact']) && isset($_POST['email1']) && isset($_POST['pays']) && isset($_POST['ville']) && isset($_POST['adresse']) && isset($_POST['entreprise']))
  {
    if(!empty($_POST['email2']) && !empty($_POST['contact']) && !empty($_POST['email1']) && !empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['adresse']) && !empty($_POST['entreprise']))
    {
        $entreprise=htmlspecialchars($_POST['entreprise']);
        $contact=htmlspecialchars($_POST['contact']);
        $email1=htmlspecialchars($_POST['email1']);
        $email2=htmlspecialchars($_POST['email2']);
        $pays=htmlspecialchars($_POST['pays']);
        $ville=htmlspecialchars($_POST['ville']);
        $adresse=htmlspecialchars($_POST['adresse']);
    
        $req1=$based->query("SELECT LAST_VALUE(idPersonnelle) AS idPersonnelle FROM personnelle");
        foreach($req1->fetchAll() as $row1)
        {
          $personnelleId=$row1['idPersonnelle'];
        }
  
        $insertion=$based->prepare("INSERT INTO entreprise (ContactEntreprise,Email1,Email2,Entreprise,Pays,Ville,Adresse,Personnelle_idPersonnelle) VALUES(?,?,?,?,?,?,?,?)");
        $stmt=$insertion->execute(array($contact,$email1,$email2,$entreprise,$pays,$ville,$adresse,$personnelleId));
  
        
        $req2=$based->query("SELECT LAST_VALUE(idEntreprise) AS idEntreprise FROM entreprise");
        foreach($req2->fetchAll() as $row2)
        {
          $EntrepriseId=$row2['idEntreprise'];
        }
  
        $insert=$based->prepare("INSERT INTO posseder (Personnelle_idPersonnelle,Entreprise_idEntreprise) VALUES(?,?)");
        $st=$insert->execute(array($personnelleId,$EntrepriseId));
  
        if($stmt && $st)
        {
          header('Location:../cmd.php');
        }
  
    }
    else
    {
      $message="Veillez remplir tous les champs!";
      header('location:../admin.php?message='.$message);
    }
  }
}
?>
