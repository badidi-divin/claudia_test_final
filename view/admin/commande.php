<?php 
    session_start();
    // ************Verification dans le temps **********
        // Selection de la commande
    // ****connexion à la base des données***
    $host='localhost';
    $username='root';
    $password='';
    $database='clau';

    $connexion=mysqli_connect($host,$username,$password,$database);

   

    //require_once('../../bdd/connexion.php');
    //require_once('../../model/select-commande.php');

    

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('header.php'); ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <h3>Tableau de Bord</h3>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="rapport.php">
                                Tableau de bord</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="client.php">
                                Client</a>
                        </li>
                        <li>
                            <a href="produit.php">
                               Produit</a>
                        </li>
                        <li>
                            <a href="commande.php">
                                <span style="border-radius:  50%;
                                            position: relative;
                                            top:10px;
                                            left: -10px; 
                                            background-color:red;
                                            color:white">
                                           </span> Commande</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <h3>Tableau de Bord</h3>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                         <li class="has-sub">
                            <a class="js-arrow" href="rapport.php">
                                Tableau de bord</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="client.php">
                                Client</a>
                        </li>
                        <li>
                            <a href="produit.php">
                               Produit</a>
                        </li>
                        <li>
                            <a href="commande.php">
                                <span style="border-radius:  50%;
                                            position: relative;
                                            top:10px;
                                            left: -10px; 
                                            background-color:red;
                                            color:white">
                                        </span> Commande</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="GET">
                              
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['username']; ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="edition-compte.php">
                                                        <i class="zmdi zmdi-account"></i>Editer</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Se Déconnecter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID_COM</th>
                                                <th>CLIENT</th>
                                                <th>PTOTAL($)</th>
                                                <th>DATE</th>
                                                <th>ETAT_COMMANDE</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php 
                                              
                                              
                                              $resultat=mysqli_query($connexion,"SELECT * FROM commande WHERE masque=0");

                                              while($row=mysqli_fetch_assoc($resultat)){
                                                  $date_commande=strtotime($row['date']);
                                                  $date_actuelle=strtotime(date("Y-m-d H:i:s"));
                                                  if (($date_actuelle-$date_commande)>(30*24*60*60) && $row['etat']=0) {
                                                      // # Masquer la commande
                                                      $id=$row['id'];
                                                      mysqli_query($connexion,"UPDATE commande SET masque=1 WHERE id='$id'");
                                                  }else{
                                                      ?>
                                                     <tr>
                                                <td><?php  echo($row['id'])?></td>
                                                <td><?php  echo($row['client'])?></td>
                                                <td><?php  echo($row['pt'])?></td>
                                                <td><?php  echo($row['date'])?></td>
                                                <td><?php  
                                                    if ($row['etat']==0) {
                                                        ?>
                                                    <a href="etat_change.php?etat=1&id=<?php echo($row['id'])?>" class="btn btn-danger">Non valide</a>
                                                <?php
                                                    }else{
                                                        ?>
                                                        <a href="etat_change.php?etat=0&id=<?php  echo($row['id'])?>" class="btn btn-success">valide</a>
                                                    <?php
                                                    }?></td>
                                               
                                            <td>
                                                <?php if ($_SESSION['role']=="admin") { 
                                             ?>
                                                <a onclick="return confirm('Etes-Vous sûr?')" href="../../model/sup-commande.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                                            <?php
                                                }
                                            ?>
                                                <a  href="detail.php?id=<?= $row['id']; ?>" class="btn btn-success">Detail de la Commande</a>
                                            </td>
                                             </tr>

                                                    <?php
                                                  }
                                              }
                                              
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2024 TFE. All rights reserved. by <a href="#">clau</a>.</p>
                                </div>
                            </div>
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
