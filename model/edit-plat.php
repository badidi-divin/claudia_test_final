<?php 
	require_once('../../bdd/connexion.php');
	$requser=$pdo->prepare("SELECT * FROM plat WHERE id=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();
    
    if (isset($_POST['envoie'])) {

        $designation=htmlspecialchars($_POST['designation']);
        $description=htmlspecialchars($_POST['description']);
        $pu=htmlspecialchars($_POST['pu']);
        $qte_stock=htmlspecialchars($_POST['qte_stock']);
        $pt=$pu*$qte_stock;
        $errors=array();

        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE plat SET designation=?,description=?,prix=?,qte_stock=?,prix_total=? WHERE id=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($designation,$description,$pu,$qte_stock,$pt,$_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
           alert('Modification Effectué avec Succès!')
        </script>
        <script>
        	window.open('produit.php','_self')
        </script>
        <?php
            exit();
    }