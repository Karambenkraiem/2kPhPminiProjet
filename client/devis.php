<?php
session_start();
if(isset($_SESSION['cinClt']) && isset($_SESSION['nom']) && isset($_SESSION['prenom'])) 
{  

?>

<!DOCTYPE html>
<html>
<head>
    <title>DEVIS</title>
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
      body{background:skyblue ;
        background-size: cover;
      font-family: georgia;}
    </style>


    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   
    <script src="../js/counter.js"  defer='defer'></script>

</head>
<body>


<?php
require('../Servicedel.php');
$serviceG=new ServiceGlobal();
$dvs=new devis();
$ldv=new lignedevis();
?>


<?php include '../components/headerCli.php'; ?>

<br><br><br>
<section>
  <label class="lglb">Bonjour M/Mme:     </label> <label style="text-align:left; color: black; font-size: large; text-transform: capitalize;" class="lglb"><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></label> <br>
  <label class="lglb"> Votre ID:         </label> <label class="lglb"><?php echo $_SESSION['cinClt'] ?></label>
</section>
<br<br>
<img src="../Assets/kkh-logo.png" style="width:200px;height: 150px ;float:left" alt="logo">
<br>
<br><br>
<div class="container-md"></div>



<div class="container py-2">
<section style="text-align: left;">
<?php
    $dt = new \DateTime();
    $dt->format('y/m/d');
    echo $dt->format('d/m/Y') ."";
?>
</section>
    <?php
    if (isset($_POST['vider'])) {
        $_SESSION['devis'][$idUtilisateur] = [];
        header('location: devis.php');
    }

    $idUtilisateur = $_SESSION['cinClt'] ?? 0;
    $devis = $_SESSION['devis'][$idUtilisateur] ?? [];

    if (!empty($devis)) {
        $idProduits = array_keys($devis);
        $idProduits = implode('\',\'', $idProduits);
        //le problème est à partir de ce niveau
        $res=$serviceG->getArticlesDevis($idProduits);
        if($res){
            $ligne=$res->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    if (!isset($_GET['success'])) {

        ?>
        <h4>Devis (<?php echo $productCount; ?>)</h4>
        <?php
    }
    ?>

    <div class="container">
        <div class="row">
            <?php
            if (empty($devis)) {
                if (!isset($_GET['success'])) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Votre demande de devis a été valider ! <br>
                        Merci pour votre confiance <a class="btn btn-success btn-sm" href="devisCli.php">Acheter des articles</a>
                    </div>
                    <?php
                }
            } else {
                
                ?>
                <a  class="btn btn-info" href="devisCli.php" role="button"><i class="bi bi-cart3"></i>Ajouter des articles</a>
                <table class="table" style="text-align: center;">
                    <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Remise</th>
                        <th scope="col"><i class="fa fa-percent"></i> prix avec remise</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <?php
                    $total = 0;

                    foreach ($ligne as $res) {
                        $remise=0;
                        $idProduit = $res['refart'];
                        $totalProduit = calculerRemise($res['pu'], $remise) * $devis[$idProduit];
                        $total += $totalProduit;
                        ?>
                        <tr>
                            <td><?php echo $res['refart'] ?></td>
                            <td><img width="80px" src="../Assets/imgProduit/<?php echo $res['image'] ?>" alt=""></td>
                            <td><?php echo $res['libelle'] ?></td>
                            <td><?php include 'counter.php' ?></td>
                            <td><?php echo number_format($res['pu'], 3, ',', ' ') ?> <i class="fa fa-solid fa-dollar"></i></td>
                            <td> - <?php echo $remise ?> %</td>
                            <td><?php echo number_format(calculerRemise($res['pu'], $remise), 3, ',', ' ') ?> <i class="fa fa-solid fa-dollar"></i></td>
                            <td> <?php echo number_format($totalProduit, 3, ',', ' ') ?> <i class="fa fa-solid fa-dollar"></i></td>
                        </tr>

                        <?php
                    }
                    ?>
                    <tfoot>
                    <tr>
                        <td colspan="7" align="right"><strong>Total</strong></td>
                        <td style="width: 150px;"><?php echo number_format($total, 3, ',', ' ') ?>TND <i class="fa fa-solid fa-dollar"></i></td>
                    </tr>
                    <tr>
                        <td colspan="8" align="right">
                            <form method="post" action="devis.php">
                                <input type="submit" class="btn btn-success" name="valider" value="Valider la commande">
                                <input onclick="return confirm('Voulez vous vraiment vider le devis ?')" type="submit" class="btn btn-danger" name="vider" value="Vider le devis">
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                        </table>
                    <?php
                }
                    ?>
        </div>
    </div>
</div>


<?php
    if (array_key_exists('valider',$_POST)) {
        $dvs->dtdevis=$dt->format('d/m/Y') ."";
        $dvs->mtotal=$total;
        $dvs->cinClt=$_SESSION['cinClt'];

        $numdevis=$serviceG->addDevis($dvs);

        if($numdevis){
            $cpt=$productCount;
            foreach ($ligne as $res) {
                $rfArt=$res['refart'];
                $ldv->numdevis=$numdevis;
                $ldv->refart=$rfArt;
                $ldv->qteCmd=$devis[$rfArt];
                $ldv->remise=$remise;
                $ldv->ptArt=calculerRemise($res['pu'], $remise) * $devis[$rfArt];
                
                if($serviceG->addLigneDevis($ldv))
                $cpt--;
            }

            if($cpt==0){
                $_SESSION['devis'][$idUtilisateur] = [];
                $productCount=0;
                echo "<script> window.location.href='devis.php';</script>";
            }

        }
        else{ ?>
            <div class="alert alert-error" role="alert">
                Erreur (contactez l'administrateur).
            </div>
        <?php
        }
    }
?>



</body>
</html>
<?php 
}
else{
  header("Location: index.php");
  exit();
}

?>