<?php 
    session_start();
    require_once('../bdd/connexion.php');
    require_once('../model/function_panier.php');
    require_once('../model/pannier.php');
 ?>
 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title> 
    <link rel="stylesheet" type="text/css" href="css/test.css">
    <link rel="stylesheet" type="text/css" href="css/style-client.css">
</head>
    <body>
        <!-- Navigation -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <!--cette class utilisé c pour avoir une barre de navigation horizontal -->
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="font-size: 23px" href="menu-resto.php">Plat</a>
                </li>
            </ul>
        </div>
            
            <div class="col-md-12 col-xs-12 spacer">
                <!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
                <div class="panel panel-info spacer">
                    <!-- titre dans bootstrap -->
                    <div class="panel-heading">
                        VOTRE PANIER
                    </div>  
                    <!-- Le corps du tableau où l'on mettra le contenu -->
                    <div class="panel-body">
                        <form method="post" action="">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>LIBELLE</th><th>PU</th><th>QTE</th><th>ACTION</th>
                                    </tr>
                                    <?php
                                    if(isset($_GET['deletepanier'])&& $_GET['deletepanier']==true){
                                        supprimerpanier();
                                    }
                                    if(creationPanier()){
                                    $nbProduits= count($_SESSION['panier']['libelleproduit']);
                                    if($nbProduits <= 0 ){
                                        echo '<p style="color:red;font-size:50px;"><b>Desolé,panier vide!</b></p>';
                                    }else{
                                        $total=montantglobal();
                                        //$paypal=new paypal();
                                        $params=array(

                                            // 'RETURNURL'=>'http://127.0.0.1/Site e-commerce/process.php';

                                        );
                                            
                                        for($i=0;$i<$nbProduits;$i++ ){
                                            ?>
                                </thead>

                                <tbody>
                                    <td><br><?php echo $_SESSION['panier']['libelleproduit'][$i]; ?></td>
                                    <td><br><?php echo $_SESSION['panier']['prixproduit'][$i]; ?>$</td>
                                    <td><br><input type="text" name="q[]" value="<?php echo $_SESSION['panier']['qteproduit'][$i]; ?>" size="5"></td>
                                    <td><br><a href="panier.php?action=suppression&amp;l=<?php echo rawurlencode($_SESSION['panier']['libelleproduit'] [$i]); ?>">Supprimer</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr>

                                                        <td colspan="2"><br>
                                    <p>Total:<?php echo montantglobal()."$"; ?></p><br>
                                    <a href="../model/commande-resto.php" class="btn btn-success">Valider la Commande</a>
                                     <a href="../view/paiement.php" class="btn btn-success">Payer Commande</a>
                                                        </td>
                                                    </tr>
                                                
                                                    <tr>
                                                        <td colspan="4">
                                                            <input type="submit" class="btn btn-primary" value="Actualiser votre panier">
                                                            <input type="hidden" name="action" value="refresh">
                                                            <a href="?deletepanier=true" class="btn btn-danger">Supprimer le panier</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                
                                                }
                                            }

                                           ?>                                    
                                    </tr>   
                                    
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>  
            </div>
    <!-- Circulation de la page -->
    </body>
</html>

