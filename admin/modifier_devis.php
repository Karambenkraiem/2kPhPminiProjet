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

  
    <style>
        #imgLogo{
            width:200px;
            height:150px;
            float:left
        }
      body{background:skyblue ;
        background-size: cover;
      font-family: georgia;}
      table{
        text-align: center;
      }
    </style>
</head>
<body>

<?php include '../components/headerMD.php'; ?>

<br><br><br>
<section>
  <label class="lglb">Bonjour M/Mme:     </label> <label style="text-align:left; color: black; font-size: large; text-transform: capitalize; class="lglb"><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></label> <br>
  <label class="lglb"> Votre ID:         </label> <label class="lglb"><?php echo $_SESSION['cinClt'] ?></label>
</section>
<img src="../Assets/kkh-logo.png" alt="logo" id="imgLogo">



    <?php
        require('../Servicedel.php');
        $serviceG=new ServiceGlobal();
        $dvs=new devis();
        $ldv=new lignedevis();
        $id=$_GET['id'];
        $res=$serviceG->getLigneDevisById($id);
    ?>

<div class="container py-2">
<section>
    <?php
    $dt = new \DateTime();
    $dt->format('y/m/d');
    echo $dt->format('d/m/Y') ."";
?>
</section>
    <div class="container">
        <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Qte</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Remise</th>
                        <th scope="col"><i class="fa fa-percent"></i>Remise</th>
                        <th scope="col">Total</th>
                    </tr>
                        </thead>
                        <?php
                            
                            $total = 0;
                            $res=$serviceG->getLigneDevisById($id);
                            $ligne=$res->fetchAll(PDO::FETCH_OBJ);
                            foreach ($ligne as $res){
                                $remise=$res->remise;
                                if($_POST!=null){
                                    if($res->refart===$_POST['id']){
                                        $remise=$_POST['remise'];
                                        $res->remise=$remise;
                                        $id=$res->numdevis;
                                        $ref=$res->refart;
                                        $rms=$serviceG->updateRemise($remise,$id,$ref);                               
                                   }
                                }
                                
                                $refart=$res->refart;
                                $resart=$serviceG->getArticleById($refart);
                                $detart=$resart->fetch();
                                $totalRemise = calculerRemise($detart['pu'], $remise);
                                $totalProduit = $totalRemise * $res->qteCmd;
                                $total += $totalProduit;
                                ?>
                                <tr>
                                    <td><?=  $res->refart ?></td>
                                    <td><img width="80px" src="../Assets/imgProduit/<?php echo $detart['image'] ?>" alt=""></td>
                                    <td><?php echo $detart['libelle'] ?></td>
                                    <td><?=  $res->qteCmd ?></td>
                                    <td><?php echo number_format($detart['pu'], 3, ',', ' ') ?> <i class="fa fa-solid fa-dollar"></i></td>
                                    <td><?php include 'counter.php' ?></td>
                                    <td><?php echo number_format($totalRemise, 3, ',', ' ') ?> <i class="fa fa-solid fa-dollar"></i></td>
                                    <td> <?php echo number_format($totalProduit, 3, ',', ' ') ?> <i class="fa fa-solid fa-dollar"></i></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tfoot>
                                <tr>
                                    <td colspan="7" align="right"><strong>Total</strong></td>
                                    <td style="width: 150px;"><?php echo number_format($total, 3, ',', ' ') ?> <i class="fa fa-solid fa-dollar"></i></td>
                                </tr>
                                <tr>
                                    <td colspan="8" align="right">
                                    <form method="post" action="#">
                                        <input name="taux" type="hidden" value="1">
                                        <input name="id" type="hidden" value="<?php echo $res->numdevis ?>">
                                        <input type="submit" class="btn btn-success" name="valider" value="Valider">
                                        <a class="btn btn-primary" href="gestDevis.php">gestion des devis</a>
                                    </form>
                                    </td>
                                </tr>
                            </tfoot>
            </table>
        </div>
    </div>
</div>
<?php
if(isset($_POST['valider'])){
    $val=$_POST['taux'];
    $id=$res->numdevis;
    $mttc=$total;
    $res=$serviceG->validateDevis($id, $val, $mttc);
    if($res){
        echo '<script>';
        echo 'alert("Devis validé avec succès")';  //not showing an alert box.
        echo '</script>';
    }
    else{
        echo'Erreur validtion! contactez votre administrateur!';
    }

  }
?>

<?php include '../components/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>



    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   
    <script src="../js/counter.js"  defer='defer'></script>
</body>
</html>
<?php
}
else{
  header("Location: ./index.php");
  exit();
}

?>