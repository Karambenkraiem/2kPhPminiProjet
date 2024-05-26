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
    body{background:skyblue ;
        background-size: cover;
      font-family: georgia;}
  </style>
</head>

<body>

<?php include '../components/headerAdmin.php'; ?>
<br><br><br>
<section>
  <label class="lglb">Bonjour M/Mme:     </label> <label style="text-align:left; color: black; font-size: large; text-transform: capitalize;"  class="lglb"><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></label> <br>
  <label class="lglb"> Votre N°CIN:         </label> <label class="lglb"><?php echo $_SESSION['cinClt'] ?></label>
  <br><br>
  <img src="../Assets/kkh-logo.png" style="width:200px;height: 150px ;float:left" alt="logo">

</section>

<br>
<?php if(isset($_GET['error'])) { ?>
  <div class="error"><?php echo $_GET['error']; ?></div> 
<?php } ?>
<br>

<div class="container py-2">
    <h4>Ajouter Aricle</h4>
    <form method="POST" enctype="multipart/form-data" action="ajout_article.php">
        <label class="form-label">Reférence Article</label>
        <input type="text" class="form-control" name="refart">

        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle">

        <label class="form-label">Prix unitaire</label>
        <input type="number" class="form-control" name="pu" step="0.1" min="0">

        <label class="form-label">Quantité</label>
        <input type="number" class="form-control" name="qte" step="1" min="0">

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image">


        <input type="submit" value="Ajouter Article" class="btn btn-success my-2" name="ajouter">
    </form>


    <?php
require('../Servicedel.php');
$article= new Article();
$serviceG= new ServiceGlobal();

$filename = 'produit.png';
if (!empty($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];
    $filename = uniqid().$image;
    move_uploaded_file($_FILES['image']['tmp_name'], '../Assets/imgProduit/' . $filename);
}

if(array_key_exists('ajouter',$_POST))
{
	$article->refart=test_input($_POST['refart']);
	$article->libelle=test_input($_POST['libelle']);
	$article->pu=test_input($_POST['pu']);
  $article->qte=test_input($_POST['qte']);
  $article->image=$filename;

if ($serviceG->addArticle($article)) 
{
  echo "<script> alert(\"Article ajouté avec succès\");</script>";
  header("Location: article.php");
} 
else {
  //header("ajout_article.php?error=Erreur Ajout de l'article !");
}
}?>

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