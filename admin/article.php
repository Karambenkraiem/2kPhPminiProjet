<?php
session_start();
if ($_SESSION['typeCompte']=="admin"){
if(isset($_SESSION['cinClt']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>gestion des articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="styleDevisClient.css" rel="stylesheet" />
  <style>
    body{background-color: skyblue;
      font-family: Georgia;
      }
  </style>
</head>

<body >

<?php include '../components/headerAdmin.php'; ?>

<br><br><br>
<section>
  <label class="lglb">Bonjour M/Mme:     </label> <label style="text-align:left; color: black; font-size: large; text-transform: capitalize;" class="lglb"><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></label> <br>
  <label class="lglb"> Votre N°CIN:         </label> <label class="lglb"><?php echo $_SESSION['cinClt'] ?></label>
</section>
<br>
<img src="../Assets/kkh-logo.png" style="width:200px;height: 150px ;float:left" alt="logo">


<br><br>

<div class="container py-2">
    <h2 style="font-family: Georgia;">Liste des articles</h2>
    <a href="ajout_article.php" class="btn btn-primary" style="float:right">Ajouter produit</a>
















    <table class="table table-striped table-hover">
        <thead style="text-align: center;">
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Prix</th>
                <th>Quantité en stock</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
        <?php
        require'../Servicedel.php';
        $serviceG= new ServiceGlobal();
        $res=$serviceG->getAllArticle();
        $ligne=$res->fetchAll(PDO::FETCH_OBJ);
        foreach ($ligne as $res){
            ?>
            <tr>
                <td><?= $res->refart ?></td>
                <td><?= $res->libelle ?></td>
                <td><?= number_format($res->pu, 3, ',', ' ') ?></i></td>
                <td><?= $res->qte ?></td>
                <td><img class="img-fluid" width="90" src="../Assets/imgProduit/<?= $res->image ?>" alt="<?= $res->libelle ?>"></td>
                <td>
                    <a class="btn btn-primary" style="" href="modifier_article.php?id=<?php echo $res->refart ?>">Modifier</a>
                </td>
                <td>
                    <a class="btn btn-danger" style="" href="supprimer_article.php?id=<?php echo $res->refart ?>" onclick="return confirm('Voulez vous vraiment supprimer cet article <?php echo $res->libelle?> ?')">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>


</body>
</html>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php 
}
else{
  header("Location: index.php");
  exit();
  
}
}
else{
header("Location: home.php"); 
}
?>