<?php
    require('../Servicedel.php');
    $article= new Article();
    $serviceG= new ServiceGlobal();
    //$id = $_GET['id'];

    $article->refart=$_GET['id'];
        //vérification de l'existence de l'article dans la base de données
        $res=$serviceG->existAtricle($_GET['id']);
        if($ligne = $res->fetch())
        //if(mysqli_num_rows($res)===1)
        {//Suppression
            if ($serviceG->suppArticle($article)) 
            {
              header("Location: article.php?error=Article supprimé avec succès!");
            }
        }
        else 
        {
          header("Location: article.php?error=Erreur de suppression l'article n'existe pas !");
        }//Fin suppression
?>