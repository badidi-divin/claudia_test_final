<?php 
	if (isset($_SESSION['nom_complet'])) {
          header('location:dashbord-client.php');
      }else{
	if (isset($_POST['envoie'])) {
		$nom_complet=htmlspecialchars($_POST['nom_complet']);
		$password=md5($_POST['password']);
		if (!empty($nom_complet) && !empty($password)) {
			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM client WHERE nom_complet=? AND password=?");
			$requiser->execute(array($nom_complet,$password));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['id']=$userinfo['id'];
				$_SESSION['nom_complet']=$userinfo['nom_complet'];
				$_SESSION['password']=$userinfo['password'];
				header("Location: accueil.php");		
			}
			else
			{
				$erreur="Mauvais Pseudo ou mauvais mot de passe! ";
			}
		}else{
			$erreur="Tous les champs doivent être complétés!";
		}
	}
}
