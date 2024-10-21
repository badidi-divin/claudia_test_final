<?php
    session_start();

    $id=$_SESSION['code'];
    
    if (isset($_POST['search'])) {

        $table=htmlspecialchars($_POST['mot1']);
        $errors=array();

        //Création de l'objet prepare et envoie de la requête
        $ps=$pdo->prepare("UPDATE commande_resto SET tables=? WHERE code_commande=?");
        //Pour bien recupere les données on crée un table de parametre
        $params=array($table,$id);
        //Execution de la requête par leur paramètre en ordre 
        $ps->execute($params);
        // Pour recuperer l'id du user
        ?>
        <script type="text/javascript">
           alert('votre commande à été envoyés, nous venons vous servir dans quelques instants!')
        </script>
        <script>
        	window.open('../view/pannier-resto.php?deletepanier=true','_self')
        </script>
        <?php
            exit();
    }