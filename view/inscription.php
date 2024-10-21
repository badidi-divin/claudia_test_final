<?php 
      session_start();
      require_once('../bdd/connexion.php');
      require_once('../model/inscription.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>LE CHANTIER</title>

    <!-- Fontfaces CSS-->
    <link href="admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="admin/css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div class="page-wrapper">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h3>INSCRIPTION</h3>
                        </div>
                        <div class="login-form">
                             <?php
                                    if (isset($erreur)) {
                                        echo "<font color='red'>".$erreur."</font>";
                                    }
                                ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Nom Complet</label>
                                    <input class="au-input au-input--full" type="text" name="nom_complet" placeholder="XXXXXXXXX" required="required">
                                </div>
                                <div class="form-group">
                                     <label for="sexe">Sexe:</label>
                                     <select name="sexe" class="form-control" id="sexe" autocomplete="off" required="required">
                                        <option value="M">
                                           M
                                        </option>
                                        <option value="F">
                                           F
                                        </option>
                                     </select>
                                </div>
                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="  xxxxx@xxxx.com" required="required">
                                </div>
                                <div class="form-group">
                                    <label>TELEPHONE</label>
                                    <input class="au-input au-input--full" type="number" name="phone" placeholder="+2438125125152" required="required">
                                </div>
                                <div class="form-group">
                                    <label>ADRESSE COMPLETE</label>
                                    <input class="au-input au-input--full" type="text" name="adresse" placeholder="xxxxxxxxxxxxxxxxxxxxxxxx" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Mot de Passe</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required="required">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="envoie">Créer un compte</button>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

     <!-- Jquery JS-->
    <script src="admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="admin/vendor/slick/slick.min.js">
    </script>
    <script src="admin/vendor/wow/wow.min.js"></script>
    <script src="admin/vendor/animsition/animsition.min.js"></script>
    <script src="admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="admin/js/main.js"></script>

</body>

</html>
<!-- end document-->