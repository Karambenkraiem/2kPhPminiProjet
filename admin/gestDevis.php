<?php
session_start();
if ($_SESSION['typeCompte']=="admin"){
if(isset($_SESSION['cinClt']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>gestion devis</title>
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
  <label class="lglb">Bonjour M/Mme:     </label> <label style="text-align:left; color: black; font-size: large; text-transform: capitalize;" class="lglb"><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></label> <br>
  <label class="lglb"> Votre N°CIN:         </label> <label class="lglb"><?php echo $_SESSION['cinClt'] ?></label>
</section>
<br>
<img src="../Assets/kkh-logo.png" style="width:200px;height: 150px ;float:left" alt="logo">


<div class="container py-2">
    <h2>Liste des devis</h2>
    <a href="../client/devisCli.php" class="btn btn-primary">Créer un devis</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#ID Devis</th>
                <th>Date de demande</th>
                <th>Montant Total</th>
                <th>C.I.N du client</th>
                <th></th>
                <th>Validation</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require'../Servicedel.php';
        $serviceG= new ServiceGlobal();
        $res=$serviceG->getAllDevis();
        $ligne=$res->fetchAll(PDO::FETCH_OBJ);
        foreach ($ligne as $res){
            ?>
            <tr>
                <td><?= $res->numdevis ?></td>
                <td><?= $res->dtdevis ?></td>
                <td><?= number_format($res->mtotal, 3, ',', ' ')?> TND</i></td>
                <td><?= $res->cinClt ?></td>
                <td>
                    <a class="btn btn-primary" href="modifier_devis.php?id=<?php echo $res->numdevis ?>">Modifier</a>
                    <a class="btn btn-danger" href="supprimer_devis.php?id=<?php echo $res->numdevis ?>" onclick="return confirm('Voulez vous vraiment supprimer ce devis N° <?php echo $res->numdevis?> ?')">Supprimer</a>
                </td>
                <td>
                <a class="btn btn-success" href="impression_devis.php?id=<?php echo $res->numdevis ?>">Voir détails</a>
                <?php 
                if($res->valid==1){
                    echo "<span id=\"boot-icon\" class=\"bi bi-check-circle\" style=\"font-size: 20px; color: rgb(0, 128, 55); -webkit-text-stroke-width: 1.8px;\"></span></form>";
                    }
                    else{
                    echo "Pas encore traité!";
                    }
                ?>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
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