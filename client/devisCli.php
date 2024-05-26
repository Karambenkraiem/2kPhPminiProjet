<?php
session_start();
if(isset($_SESSION['cinClt']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) 
{  

?>

<!DOCTYPE html>
<html>
<head>
    <title>home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="styleDevisClient.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>

    <style>
      body{background-color: skyblue;
      font-family: Georgia;
      }
    </style>


    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   
    <script src="../js/counter.js"  defer='defer'></script>

</head>
<body>


<?php
require('../Servicedel.php');
$serviceG=new ServiceGlobal();
?>


<?php include '../components/headerCli.php'; ?>

<br><br><br>
<section>
  <label class="lglb">Bonjour M/Mme:     </label> <label style="text-align:left; color: black; font-size: large; text-transform: capitalize;" class="lglb"><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></label> <br>
  <label class="lglb"> Votre N°CIN:         </label> <label class="lglb"><?php echo $_SESSION['cinClt'] ?></label>
</section>
<br>
<img src="../Assets/kkh-logo.png" style="width:200px;height: 150px ;" alt="logo">




<div class="container py-2">
    <?php 
      $res=$serviceG->getAllArticle();
      $ligne=$res->fetchAll(PDO::FETCH_OBJ);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col mt-4">
                <div class="row">
                    <?php require_once 'afficher_articles.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>
<?php 
}
else{
  header("Location: index.php");
  exit();
}

?>
