<?php
	$login=$_POST['login'];
	$Mot_de_passe=$_POST['Mot_de_passe'];
	
	if(isset($login) && isset($Mot_de_passe))
	{
		
		if(!empty($login) && !empty($Mot_de_passe))
		{
			include('../connexion_file.php');
                
             // Hachage du mot de passe
            $pass_hache = password_hash($_POST['Mot_de_passe'], PASSWORD_DEFAULT);
                
			$sql="INSERT INTO se_connecter (login,Mot_de_passe)VALUES('$login', '$pass_hache')";
			$requete=$based->exec($sql);
			if($requete)
			{
				echo "<h2>login cree avec success</h2>";
				header('Location:index.php');
			}
			else
			{
				echo 'echec';
				header('Location:new_user.php');
			}
		}
	}
	
?>