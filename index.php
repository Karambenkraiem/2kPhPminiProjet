<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>index</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/heroes/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <!-- Bootstrap core CSS -->
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
      /* .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      } */
body{background-image: url("./assets/background2.jpg");
  mask-repeat: no-repeat;
  position: fixed; 
 top: 0; 
 left: 0; 
 min-width: 100%;
 min-height: 100%;
 }
      
        
#imglogo{
  position: absolute;
  bottom: 50mm;
  left: 300mm;
 
}
      /* @media (min-width: 600px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      } */
    </style>

    <!-- Custom styles for this template -->
    <link href="heroes.css" rel="stylesheet">
</head>
<body>




<?php
if(session_start()){
  session_destroy();
  setcookie ("PHPSESSID", "", time() - 3600, '/');
}
?>         
      
<div>
  <main>

<div class="position-relative" style="left:100px" class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
    </div>
    
    <div class="col-lg-6" >
      <br><br><br><br><br>
      <h1 class="display-5 fw-bold lh-1 mb-3" style="font-family:Georgia;">Karam & Kheireddine</h1>
      <p class="lead mb-4" style="color:black"><b style="font-family:Georgia;">Mini projet PHP <br> <p style="font-family:Georgia;font-size: large;">Réalisé par: <br> Karam BEN KRAIEM && Kheireddine MHAMDI</p></b></p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
      <form action="./traitement/inscription.php"><button type="submit" class="btn btn-primary btn-lg px-4 gap-3" style="border:solid black 1px">Créer un compte</button></form> <div>    </div>
      <form action="./traitement/connexion.php"><button type="submit" class="btn btn-outline-secondary btn-lg px-4" style="border:solid black 1px; color:black;">Se connecter</button></form> 
      </div>
    </div>
  </div>
</div>
</main>
<img class="position-relative" style="width: 300px;height:200;" class="d-block mx-auto mb-4" src="./Assets/kkh-logo.png" id="imglogo">

</div>
      



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
      
</body>
</html>
