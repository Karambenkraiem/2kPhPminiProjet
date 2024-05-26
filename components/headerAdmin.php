<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

<style>
  body{
    font-family: georgia;
  }
</style>


</head>
<body>
  



<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="homeAdmin.php"><i><img style="width: 30px;height: 20px;;"src="../Assets/kkh-logo.png"> </i>Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="article.php">Gestion des articles <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Devis
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../client/devisCli.php">Création de devis</a>
          <a class="dropdown-item" href="gestDevis.php">Gestion des devis</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="../client/home.php"><i class="bi bi-shop"></i> CLIENT</a>
      </li>
    </ul>
    <form method="POST" class="form-inline my-2 my-lg-0" action="../index.php">
      <button name="logout" class="btn btn-danger my-2 my-sm-0" type="submit" style="color:white; border:solid black 1px ;">Logout</button>
    </form>
  </div>
</nav>



</body>
</html>