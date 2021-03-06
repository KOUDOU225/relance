<?php

  if(isset($_POST['valider']))
  {
    require_once('../../connexion_file.php');
    if(isset($_POST['type']) && isset($_POST['dsn1']) && isset($_POST['dsn2']) && isset($_POST['dsn3']) && isset($_POST['url']))
    {
      if(!empty($_POST['type']) && !empty($_POST['dsn1']) && !empty($_POST['dsn2']) && !empty($_POST['dsn3']) && !empty($_POST['url']))
      {
        $type=$_POST['type'];
        $url=htmlspecialchars($_POST['url']);
        $dsn1=htmlspecialchars($_POST['dsn1']);
        $dsn2=htmlspecialchars($_POST['dsn2']);
        $dsn3=htmlspecialchars($_POST['dsn3']);
        $numeroCmd=htmlspecialchars($_POST['numcmd']);

        $req2=$based->query("SELECT LAST_VALUE(idEntreprise) AS idEntreprise FROM entreprise");
        foreach($req2->fetchAll() as $row2)
        {
          $EntrepriseId=$row2['idEntreprise'];
        }

        switch ($type) {
          case 'Pack Perso':
            $sql=$based->prepare("INSERT INTO commande (Num_CMD,type,Url,DSN1,DSN2,DSN3,Entreprise_idEntreprise,Date_Fin) VALUES(?,?,?,?,?,?,?,ADDDATE(CURRENT_TIMESTAMP,365))");
            break;
          case 'Pack Ivoire':
            $sql=$based->prepare("INSERT INTO commande (Num_CMD,type,Url,DSN1,DSN2,DSN3,Entreprise_idEntreprise,Date_Fin) VALUES(?,?,?,?,?,?,?,ADDDATE(CURRENT_TIMESTAMP,730))");
            break;
          case 'Pack Start-Up':
            $sql=$based->prepare("INSERT INTO commande (Num_CMD,type,Url,DSN1,DSN2,DSN3,Entreprise_idEntreprise,Date_Fin) VALUES(?,?,?,?,?,?,?,ADDDATE(CURRENT_TIMESTAMP,548))");
            break;
          case 'Pack Etudiant':
            $sql=$based->prepare("INSERT INTO commande (Num_CMD,type,Url,DSN1,DSN2,DSN3,Entreprise_idEntreprise,Date_Fin) VALUES(?,?,?,?,?,?,?,ADDDATE(CURRENT_TIMESTAMP,0))");
            break;
          case 'Pack Blog trotting':
            $sql=$based->prepare("INSERT INTO commande (Num_CMD,type,Url,DSN1,DSN2,DSN3,Entreprise_idEntreprise,Date_Fin) VALUES(?,?,?,?,?,?,?,ADDDATE(CURRENT_TIMESTAMP,183))");
            break;
          case 'Pack Asso':
            $sql=$based->prepare("INSERT INTO commande (Num_CMD,type,Url,DSN1,DSN2,DSN3,Entreprise_idEntreprise,Date_Fin) VALUES(?,?,?,?,?,?,?,ADDDATE(CURRENT_TIMESTAMP,455))");
            break;

        }

        // $sql=$based->prepare("INSERT INTO commande (Num_CMD,type,Url,DSN1,DSN2,DSN3,Entreprise_idEntreprise) VALUES(?,?,?,?,?,?,?)");
        $st=$sql->execute(array($numeroCmd,$type,$url,$dsn1,$dsn2,$dsn3,$EntrepriseId));
        if($st)
        {
          header('Location:../end.php');
        }
      }
      else
      {
        $message="Veillez remplir tous les champs!";
        header('location:../cmd.php?message='.$message);
      }
    }
  }
?>
      