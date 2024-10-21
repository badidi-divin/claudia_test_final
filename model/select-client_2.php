<?php

   $mot1=isset($_GET['mot1'])?$_GET['mot1']:"";

	
	if (isset($_GET['search'])) {
		$requete="SELECT * FROM client";	
		
		
	}else{
		$requete="SELECT * FROM client";	
	}
	$resultat=$pdo->query($requete);