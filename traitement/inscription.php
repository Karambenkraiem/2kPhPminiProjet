<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Inscription</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/heroes/">
   <!-- Bootstrap core CSS -->
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>     
        body{background-image: url("../assets/background.jpg");
        top: 0; 
        left: 0; 
        min-width: 100%;
        min-height: 100%;
        font-family: Georgia;
        
        
      
      }
      
        
#imglogo{
  position: relative;
  bottom: 0mm;
  left: 300mm;
 
}
    </style>
  </head>
  
  
  
  
  
  
  
  <body class="p-3 m-0 border-0 bd-example">
  <?php
require('../Servicedel.php');

$client= new Client();
$serviceG= new ServiceGlobal();




?>



<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="../index.php"> <i><img style="width: 30px;height: 20px;;"src="../Assets/kkh-logo.png"> </i> Accueil </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Home</a>
  </nav> -->






    
    <form method="post" action="inscription.php" class="row g-3">
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">N° Carte d'identité</label>
    <input type="number" name="cinClt" class="form-control" id="validationDefault05" placeholder="Votre c.i.n" required>
  </div>

  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control" id="validationDefault01" placeholder="Votre nom" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label" style="color:lightgray">Prénom</label>
    <input type="text" name="prenom" class="form-control" id="validationDefault02" placeholder="Votre prénom" required>
  </div>
  <div class="col-md-4">
    <label for="validationDefaultUsername" class="form-label">Email</label>
    <div class="input-group">
      <span class="input-group-text" id="inputGroupPrepend2">@</span>
      <input type="email" name="email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" placeholder="exemple@xyz.com" required>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Mot de passe</label>
    <input type="password" name="mpasse" class="form-control" id="validationDefault01" required>
  </div>
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Adresse</label>
    <input type="text" name="adresse" class="form-control" id="validationDefault03" required>
  </div>
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label" style="color:lightgray">Téléphone</label>
    <input type="tel" name="tel" class="form-control" id="validationDefault05" placeholder="00 123 456"  pattern="[0-9]{2}[0-9]{3}[0-9]{3}" required>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2" style="text-decoration: underline;">
        Agree to terms and conditions
      </label>
    </div>
  </div>
  <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
    <button type="submit" name = "valider" class="btn btn-primary btn-lg px-4 gap-3" style="border:solid black 1px;">S'inscrire</button>
      
</form>      
<form action="../index.php"><button type="submit" class="btn btn-danger btn-lg px-4" style="border:solid black 1px; color:black;">Annuler</button></form> 
</div>   
      
     
      
      <div class="col-md-9 col-lg-6 col-xl-5">
        <a href="../index.php"><img src="../Assets/kkh-logo.png" style="width: 300px;height:200;" class="img-fluid" alt="Sample image" id="imglogo"></a>
      </div>





      <?php
if(array_key_exists('valider', $_POST)){
    $client->cinClt=$_POST['cinClt'];
    $client->prenom=$_POST['prenom'];
    $client->nom=$_POST['nom'];
    $client->email=$_POST['email'];
    $client->mp=$_POST['mpasse'];
    $client->adresse=$_POST['adresse'];
    $client->tel=$_POST['tel'];
    

    if($serviceG->addUser($client)){
        echo "<script> alert(\"Inscription effectuée avec succès\"); </script>";
        header("Location:../index.php");
    }
    else{
        header("Location:inscription.php?error=Erreur d'inscription essayer une autre fois");
    }
    
}

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


</body>
</html>




