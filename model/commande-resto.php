<?php
	session_start();
	require_once('../bdd/connexion.php');
	require_once('function_panier.php');
	$products= '';

	$total=montantglobal();


	// Géneration code de la commande
	$requser=$pdo->prepare("SELECT * FROM commande_resto ORDER BY code_commande DESC LIMIT 1");
	$requser->execute();
	$userinfo=$requser->fetch();

	$lastid=$userinfo['code_commande'];

	if ($lastid=="") {
		$matr="Co/101";
	}
	else
	{
		$matr=substr($lastid, 3);
		$matr=intval($matr);
		$matr="Co/".($matr+1);
	}
	
	$_SESSION['code']=$matr;
	
	$ps=$pdo->prepare("INSERT INTO commande_resto(code_commande,pt)VALUES(?,?)");
    //Pour bien recupere les données on crée un table de parametre
    $params=array($matr,$total);
    //Execution de la requête par leur paramètre en ordre 
    $ps->execute($params);
    // Pour recuperer l'id du user

    for ($i=0; $i < count($_SESSION['panier']['libelleproduit']); $i++) { 
		$product=$_SESSION['panier']['libelleproduit'][$i];
		$quantity=$_SESSION['panier']['qteproduit'][$i];
		$prix=$_SESSION['panier']['prixproduit'][$i];
		$ps=$pdo->prepare("INSERT INTO detail_commande_resto(code_commande,plat,qte_com,prix)VALUES(?,?,?,?)");
		//Pour bien recupere les données on crée un table de parametre
		$params=array($matr,$product,$quantity,$prix);
		 //Execution de la requête par leur paramètre en ordre 
		 $ps->execute($params);

	 }

    ?>
    <script type="text/javascript">
        window.open('../view/table.php','_self')
    </script>