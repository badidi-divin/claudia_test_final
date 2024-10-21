<?php

   $id=$_GET['id'];
	$requete="SELECT * FROM detail_commande WHERE id='$id'";		
	$resultat=$pdo->query($requete);