<?php 
	if (isset($_POST['envoie'])) {
		$username=htmlspecialchars($_POST['username']);
		$password=md5($_POST['password']);
		if (!empty($username) && !empty($password)) {
			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM user WHERE username=? AND password=?");
			$requiser->execute(array($username,$password));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['id']=$userinfo['id'];
				$_SESSION['username']=$userinfo['username'];
				$_SESSION['role']=$userinfo['role'];
				header("Location: rapport.php");		
			}
			else
			{
				$erreur="Mauvais Pseudo ou mauvais mot de passe! ";
			}
		}else{
			$erreur="Tous les champs doivent être complétés!";
		}
	}
