<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>




    <style>
        .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}

body{background-image: url("../assets/background2.jpg");
  mask-repeat: no-repeat;
  position: fixed; 
 top: 0; 
 left: 0; 
 min-width: 100%;
 min-height: 100%;
 }
      
    </style>




<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/heroes/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
  
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <br><br><br><br><br><br>
        <a href="../index.php"><img src="../Assets/kkh-logo.png" style="width: 300px;height:200;" class="img-fluid" alt="Sample image"></a>
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

      <form onLoad="this.form.reset();" onsubmit="this.form.reset();" method="POST" action="../traitement/co.php" name="login_form">
         <?php if(isset($_GET['error'])) { ?>
            <div class="error"><?php echo $_GET['error']; ?></div> 
        <?php } ?>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0" style="color:white"> Bienvenue Chez Nous</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input name="email" type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required>
            <label class="form-label" for="form3Example3" style="color:gray ;">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="password" type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" required/>
            <label class="form-label" for="form3Example4" style="color:lightgray ;">Password</label>
          </div>

          

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg" id="btnconnect"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"
              onclick="submitForm()">Connecter</button>
            <p class="small fw-bold mt-2 pt-1 mb-0" style="color:red">Vous N'etes pas encore inscrit ? 
            <a href="inscription.php">S'inscrire</a>
            
          </div>

          <!-- <script>
            function submitForm() {
            document.login_form.submit();
            document.login_form.reset();
            }
        </script> -->

        </form>
      </div>
    </div>
  </div>
 
</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    
</body>
</html>