<?php 
	require_once('../../bdd/connexion.php');

    $id=$_GET['id'];
	
    if ($_GET['etat']==1) {
        # code...
        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE commande SET etat=1 WHERE id=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user

        $requete="SELECT * FROM detail_commande WHERE code_commande='$id'";	
	    $resultat=$pdo->query($requete);

        while ($et=$resultat->fetch()){
            $requser=$pdo->prepare("SELECT * FROM plat WHERE designation=?");
            $requser->execute(array($et['plat']));
            $userinfo=$requser->fetch();
            if ($userinfo['qte_stock']<$et['qte_com']) {
               ?>
                <script>
                    alert('la quantité acheté doit être inferieur à celle en stock')
                    window.open('commande.php','_self')
                </script>
               <?php
            }else{
                $new_qte=$userinfo['qte_stock']-$et['qte_com'];

                $requser=$pdo->prepare("UPDATE plat SET qte_stock=?");
                $requser->execute(array($new_qte));
            }
            
        
        }



        header("location:".$_SERVER['HTTP_REFERER']);



    }else{
          //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE commande SET etat=0 WHERE id=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($_GET['id']);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        header("location:".$_SERVER['HTTP_REFERER']);
    }