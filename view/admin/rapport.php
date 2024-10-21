<?php  
    session_start();
    require_once('../../bdd/connexion.php');
    if ($_SESSION['role']=="caissier") {
        header("location:plat.php");
    }

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
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
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
                                            <?php $nblmd=$pdo->prepare('SELECT * FROM commande');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd); ?></span> Commande</a>
                        </li>
                    </ul>
                </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
               <h4>
                    TABLEAU DE BORD
                </h4>
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
                                            <?php $nblmd=$pdo->prepare('SELECT * FROM commande');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd); ?></span> Commande</a>
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
                            <form class="form-header" method="get" action="">
                                
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
                                            
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">INFORMATION GENERALE </h2>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2><?php
                                    $nblmd=$pdo->prepare('SELECT * FROM client');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?>&nbsp;&nbsp;<a href="imprime-client.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2></h2>
                                                <span>CLIENTS</span>
                                            </div>

                                        </div>
                                        
                                        <div class="overview-chart">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h2><?php
                                    $nblmd=$pdo->prepare('SELECT * FROM plat');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?>&nbsp;&nbsp;<a href="imprimer-plat.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2>
                                                <span>PRODUIT</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">COMMANDE</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                
                                            </div>
                                            <div class="text">
                                                <h2><?php
                                    $nblmd=$pdo->prepare('SELECT * FROM commande');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo count($nblmd);
                                ?>&nbsp;&nbsp;<a href="imprimer-commande.php" class="btn btn-secondary" title="Souhaitez-vous imprimer?">Imprimer</a></h2>
                                                <span>COMMANDE</span>

                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2 style="font-size:25px"><?php
                                    $nblmd=$pdo->prepare('SELECT SUM(pt) AS prix_total FROM commande');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetch()['prix_total'];
                                    echo ("Global : ".$nblmd."$"."<br>");
                                    if (isset($_GET['pt'])) {
                                        $pt=$_GET['pt'];
                                    $taux=$nblmd*$pt;
                                    echo "CDF:".$taux."Fc";    
                                    }
                                    if (isset($_GET['dates'])) {
                                        $dates=$_GET['dates'];
                                        $_SESSION['date_c']=$dates;
                                        $nblmd=$pdo->prepare("SELECT SUM(pt) AS prix_total FROM commande WHERE date LIKE '%$dates%'");
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetch()['prix_total'];
                                       echo ("Date : ".$nblmd."$");
                                       ?>
                                        <a  href="consulter-commande.php" title="consulter les commandes du <?php echo " ".$dates ?>?" class="btn btn-outline-secondary">Consulter</a>
                                       <?php
                                    }
                                    
                                ?></h2>
                                                <span>PT Global Commandé</span>
                                                
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <form method="GET" action="">
                                                    <input type="number" class="form-control" name="pt" placeholder="taux" onchange="this.form.submit()">

                                                </form><br>
                                                <form method="GET" action="">
                                                    <input type="date" class="form-control" name="dates" placeholder="taux" value="<?= $dates ?>" onchange="this.form.submit()">

                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="text">
                                                <h2 style="font-size:25px;"><?php
                                    $dates=isset($_GET['dates'])?$_GET['dates']:"";
                                    
                                    $nblmd=$pdo->prepare('SELECT * FROM detail_commande');
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo "Total : ".count($nblmd)."<br/>";
                                    if (isset($_GET['date_pl'])) {
                                        $date_plat=$_GET['date_pl'];
                                        $_SESSION['date_p']=$date_plat;
                                        $nblmd=$pdo->prepare("SELECT * FROM detail_commande WHERE date LIKE '%$date_plat%'");
                                    $nblmd->execute();
                                    $nblmd=$nblmd->fetchAll();
                                    echo "Date : ".count($nblmd);
                                    ?>
                                    <a  href="consulter-date.php" title="consulter les plats commandés le <?php echo " ".$date ?>?" class="btn btn-outline-secondary">Consulter</a>
                                    <?php
                                    }
                                    
                                ?></h2>
                                                <span>Les Produits Commandés</span>
                                            </div>
                                        </div>
                                         <a href="consulter.php" class="btn btn-secondary" title="Souhaitez-vous consulter?">Voir les Produits</a>
                                        <div class="overview-chart">&nbsp;
                                            <form method="GET" action="">
                                                    <input type="date" class="form-control" name="date_pl" placeholder="taux" value="<?= $date_plat ?>" onchange="this.form.submit()">
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       

                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

   <?php require_once('footer.php'); ?>
</body>

</html>
<!-- end document-->
