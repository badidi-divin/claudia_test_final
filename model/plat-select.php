<?php 
   require_once('../bdd/connexion.php');
   
   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
    
    if (isset($_GET['search'])) {
        $requete="SELECT * FROM plat WHERE designation LIKE '%$mot1%' WHERE qte_stock>0";   
        
        
    }else{
        $requete="SELECT * FROM plat WHERE qte_stock>0";    
    }
	
  $requser=$pdo->prepare($requete);
  $requser->execute();

  $data=$requser->fetchAll(PDO::FETCH_OBJ);
  $requser->closeCursor();
