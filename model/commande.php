<?php
	session_start();
	require_once('../bdd/connexion.php');
	require_once('function_panier.php');
	$products= '';

	$total=montantglobal();


	$name=$_SESSION['nom_complet'];
	
	$ps=$pdo->prepare("INSERT INTO commande(pt,client)VALUES(?,?)");
    //Pour bien recupere les données on crée un table de parametre
    $params=array($total,$name);

    //Execution de la requête par leur paramètre en ordre 
    $ps->execute($params);
     $lastid=$pdo->lastInsertId();
    // Pour recuperer l'id du user

    for ($i=0; $i < count($_SESSION['panier']['libelleproduit']); $i++) {

		$product=$_SESSION['panier']['libelleproduit'][$i];
		$quantity=$_SESSION['panier']['qteproduit'][$i];
		$prix=$_SESSION['panier']['prixproduit'][$i];

		// ***********recherche***********************
		$requser=$pdo->prepare("SELECT * FROM plat WHERE designation=?");
		$requser->execute(array($product));
		$userinfo=$requser->fetch();

		$ps=$pdo->prepare("INSERT INTO detail_commande(code_commande,plat,qte_com,prix)VALUES(?,?,?,?)");
	   //Pour bien recupere les données on crée un table de parametre
	   $params=array($lastid,$product,$quantity,$prix);
		//Execution de la requête par leur paramètre en ordre 
		$ps->execute($params);
	 }
    ?>
    <script type="text/javascript">
        alert('Merci pour votre commande, nous vous contactons par mail dans quelques minutes!')
        window.open('../view/pannier.php?deletepanier=true','_self')
    </script>