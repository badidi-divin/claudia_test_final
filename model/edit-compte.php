<?php 
	$requser=$pdo->prepare("SELECT * FROM user WHERE id=?");
	$requser->execute(array($_SESSION['id']));
	$userinfo=$requser->fetch();

	if (isset($_POST['envoie'])) {
		$username=htmlspecialchars($_POST['username']);
		$password=md5($_POST['password']);

		$ps=$pdo->prepare("UPDATE user SET username=?, password=? WHERE id=?");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($username,$password,$_SESSION['id']);
		//Execution de la requête par leur paramètre en ordre 
		$ps->execute($params);
		?>
		<script type="text/javascript">
			alert('Vos données ont été bien Modifiées')
		</script>
		<?php
		header("location:rapport.php");
}