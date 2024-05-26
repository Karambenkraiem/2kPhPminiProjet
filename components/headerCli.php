<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
<a class="navbar-brand" href="../admin/homeAdmin.php"> <i><img style="width: 30px;height: 20px;;"src="../Assets/kkh-logo.png"> </i>Accueil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="devisCli.php">Création de devis <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="gestDevisCli.php">Mes devis <span class="sr-only">(current)</span></a>
      </li>
      <li>
      </div>
        <?php
        $productCount = 0;
        if (isset($_SESSION['cinClt'])) {
            $idUtilisateur = $_SESSION['cinClt'];
            $productCount = count($_SESSION['devis'][$idUtilisateur] ?? []);
        }
        ?>
        <a class="btn btn-success" href="devis.php" style="color:white; border:solid black 1px ;"><i class="bi bi-file-text"></i><i class="fa-solid fa-cart-shopping"></i> Devis
            (<?php echo $productCount; ?>)</a>
    </div>
      </li>
    </ul>
    <form method="POST" class="form-inline my-2 my-lg-0" action="../index.php">
      <button name="logout" class="btn btn-outline-danger my-2 my-sm-0" type="submit" style="color:white; border:solid black 1px ;">Logout</button>
    </form>
  </div>
</nav>