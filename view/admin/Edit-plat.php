<?php 
      session_start();
      require_once('../../bdd/connexion.php');
      require_once('../../model/edit-plat.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("header.php") ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h3>EDITION </h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label> Designation</label>
                                    <input class="au-input au-input--full" type="text" name="designation" placeholder="Nom du plat" value="<?= $userinfo['designation'] ?>">
                                </div>
                                <div class="form-group">
                                    <label> Description</label>
                                    <textarea class="au-input au-input--full" type="text" name="description" placeholder="description"><?= $userinfo['description']; ?></textarea> 
                                </div>
                                <div class="form-group">
                                    <label> PU($)</label>
                                    <input class="au-input au-input--full" type="number" name="pu" placeholder="PU en $" value="<?= $userinfo['prix']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Qte en Stock</label>
                                    <input class="au-input au-input--full" type="number" name="qte_stock" placeholder="Qte" value="<?= $userinfo['qte_stock']; ?>">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie">Edition</button>
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

    </div>

    <?php require_once('footer.php'); ?>

</body>

</html>
<!-- end document-->