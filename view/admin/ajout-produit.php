<?php 
      session_start();
      require_once('../../bdd/connexion.php');
      require_once('../../model/insert-plat.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("header.php") ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h3>AJOUT</h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Designation</label>
                                    <input class="au-input au-input--full" type="text" name="designation" placeholder="Nom du produit">
                                </div>
                                <div class="form-group">
                                    <label> Description</label>
                                    <textarea class="au-input au-input--full" type="text" name="description" placeholder="description"></textarea> 
                                </div>
                                <div class="form-group">
                                    <label> PU($)</label>
                                    <input class="au-input au-input--full" type="number" name="pu" placeholder="PU en $">
                                </div>
                                <div class="form-group">
                                    <label>Qte en Stock</label>
                                    <input class="au-input au-input--full" type="number" name="qte_stock" placeholder="Qte">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="au-input au-input--full" type="file" name="img">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie">Ajouter</button>
                            </form>
                           <?php
                                    if (isset($erreur)) {
                                        echo "<font color='red'>".$erreur."</font>";
                                    }
                                ?>
                        </div>
                    </div>
            </div>
        </div>

    </div>

    <?php require_once('footer.php'); ?>

</body>

</html>
<!-- end document-->