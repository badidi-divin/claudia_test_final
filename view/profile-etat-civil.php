<?php
	session_start();
	$c=1;
	require_once('../bdd/connexionBDD.php');
	$nblmd=$pdo->prepare('SELECT SUM(montant) AS total FROM etat_civil');
    $nblmd->execute();
    $nblmd=$nblmd->fetch()['total'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Maison Communale</title> 
	<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.css">
</head>
	<style type="text/css">
		/** Pour creer un decallage **/
			.spacer{
				margin-top: 10px;
			}
			.space{
				margin-top: 100px;
			}
			.spac{
				margin-top: 80px;
			}
			.a{
				text-align:center;
				text-decoration: blink;
			}
	</style>
	<body>
		<!-- Navigation -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
			<ul class="nav navbar-nav">
				<li class="nav-item">
					<img src="../includes/images/logo_mini.png" height="50px" width="35px">
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="profile.php">Tableau de bord</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" style="font-size: 23px" href="logout.php">Se deconnecter(<?php
						echo $_SESSION['nom_complet'];
					?>) </a>
				</li>
			</ul>
		</div>
	<!-- navigation end -->
	<?php 
	    require_once("../bdd/connexionBDD.php");
		require_once('../model/selection_etat-civil.php');
	?>
		<div class="col-md-12 col-xd-12 space">
			<form method="get" action="">
				<div class="form-group">
					<label for="motcle" class="control-label">
						<p>Mot Clé:</p>
					</label>

				<div class="form-group">
					<input type="text" class="form-control" name="motcle" value="<?php echo ($mc) ?>" placeholder="Entrer le Nom à chercher...">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Rechercher</button>
					<a href="imprimer-hygiene.php" class="btn btn-primary">Imprimer</a>
					<a href="ajout-hygiene.php" class="btn btn-primary">Ajouter</a>
				</div>				
				</div>
			</form>
		</div>

		<div align="center" style="	padding-top: 150px;">

			<h1 style="font-size: 45px;">
				Bienvenue <?php echo $_SESSION['nom_complet']; ?> du Service de <?php echo $_SESSION['role']; ?>

			</h1>
		</div>

			<div class="col-md-12 col-xs-12 spacer">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info spacer">
					<!-- titre dans bootstrap -->
					<div class="panel-heading">
						Rapport du service <?php echo $_SESSION['role']; ?>
					</div>	
					<!-- Le corps du tableau où l'on mettra le contenu -->
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>CODE</th><th>NOM-COMPLET</th><th>SEXE</th><th>TELEPHONE</th><th>AGE</th><th>TAILLE</th><th>POIDS</th><th>ADRESSE</th><th>FICHIER</th><th>MONTANT</th><th>DATE</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$ps->fetch()){?>
								<tr>
								<td><?php  echo $c;?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php  echo($et['sexe'])?></td>
								<td><?php  echo($et['telephone'])?></td>
								<td><?php  echo($et['age'])?></td>
								<td><?php  echo($et['taille'])?></td>
								<td><?php  echo($et['poids'])?></td>
								<td><?php  echo($et['adresse'])?></td>
								<td><a href="../includes/pdf/<?php  echo($et['fichier'])?>" target="_blank" title="cliquez ?"><?php  echo($et['fichier'])?></a></td>
								<td><?php  echo($et['montant'])?></td>
								<td><?php  echo($et['dates'])?></td>
								<!--liens -->
								<td><a onclick="return confirm('Etes-vous sûre...?');" href="../model/supprimer-hygiene.php?id=<?php echo($et['code'])?>" class="btn btn-danger">Supprimer</a></td>
								<td><a href="../view/editer-hygiene.php?id=<?php echo($et['code'])?>"  class="btn btn-primary">Editer</a></td>
											</tr>	
									<?php $c++; } ?>	
							</tbody>
							<tfoot style="background: #0a4db1; color:white;font-size: 17px !important;text-align: center !important;">
                                <tr>
                                   <th colspan="4" style="text-align: center;">Total Montant: (<?php echo $nblmd."$";?>)</th>
                                </tr>
                            </tfoot>
							<tfoot>
								<tr>
									
								</tr>
							</tfoot>
						</table>
					</div>
				</div>	
			</div>
	<!-- Circulation de la page -->
	</body>
</html>
