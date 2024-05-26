<?php
session_start();
if ($_SESSION['typeCompte']=="admin"){
if(isset($_SESSION['cinClt']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>administrateur</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="styleDevisClient.css" rel="stylesheet" />

<style>
  body{background-image: url("../assets/background.jpg");
        top: 0; 
        left: 0; 
        min-width: 100%;
        min-height: 100%;
        font-family: Georgia;
        
        
      
      }
</style>
</head>
<body>

<?php include '../components/headerAdmin.php' ?>
<br><br><br>
<section>
  <label class="lglb" >Bonjour M/Mme:     </label> <label class="lglb" style="text-align:left; color: black; font-size: large; text-transform: capitalize;"><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></label> <br>
  <label class="lglb"> Votre N°CIN:         </label> <label class="lglb"><?php echo $_SESSION['cinClt'] ?></label>
</section>
<br>
<img src="../Assets/kkh-logo.png" style="width:200px;height: 150px ;" alt="logo">
<ul>
  
</ul>
</body>
</html>

<?php 
}
else{
  header("Location: index.php");
  exit();
  
}
}
else{
header("Location: ../client/home.php"); 
}
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>