<?php
    require_once('../../bdd/connexion.php');

    if (isset($_POST['envoie'])) {

        $designation=htmlspecialchars($_POST['designation']);
        $description=htmlspecialchars($_POST['description']);
        $pu=htmlspecialchars($_POST['pu']);
        $qte_stock=htmlspecialchars($_POST['qte_stock']);
        $pt=$pu*$qte_stock;
        $errors=array();
        $tmpName=$_FILES['img']['tmp_name'];
        $name=$_FILES['img']['name'];
        $size=$_FILES['img']['size'];
        $error=$_FILES['img']['error'];
        $type=$_FILES['img']['type'];

        // Voir l'extension du fichiers
        $tabExtension=explode('.', $name);
        $extension=strtolower(end($tabExtension));
        // Extension Autorisé
        $extensionAutorise=['jpg','jpeg','gif','png'];
        $tailleMax=2097152;

    if (in_array($extension, $extensionAutorise)) {
        if ($size<=$tailleMax) {
                if ($error==0) {
                    $uniqueNom=uniqid('',true);
                    $fileName=$uniqueNom.'.'.$extension;
                    move_uploaded_file($tmpName,'../../img/'.$fileName);

                        //Création de l'objet prepare et envoie de la requête
                        $ps=$pdo->prepare("INSERT INTO plat(designation,description,prix,qte_stock,prix_total,image)VALUES(?,?,?,?,?,?)");
                        //Pour bien recupere les données on crée un table de parametre
                        $params=array($designation,$description,$pu,$qte_stock,$pt,$fileName);
                        //Execution de la requête par leur paramètre en ordre 
                        $ps->execute($params);
                        // Pour recuperer l'id du user
                        ?>
                        <script type="text/javascript">
                            alert('Enregistrement Effectué avec Succès!')
                        </script>
                        <script>
                            window.open('produit.php','_self')
                        </script>
                    <?php
                    
                        exit();
            }else{
                $errors='Une erreur se produite lors de l\'importation de l\'image';
            }
        }else{
            $errors='Votre taille est trop importante(Taille Max: 2Mo)';
        }

    }else{
        $errors='Votre Extension est invalide(jpg,jpeg,gif,png)';
    }

    }