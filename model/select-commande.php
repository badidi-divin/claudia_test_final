<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";

	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM commande WHERE client LIKE '%$mot1%' AND masque=0";	
		
		
	}else{
		$requete="SELECT * FROM commande WHERE masque=0";	
	}
	
	$resultat=$pdo->query($requete);