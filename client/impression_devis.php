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



    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>   
    <script src="../js/counter.js"  defer='defer'></script>

    <style>
         body{
            font-family: georgia;
        }
    @media print {
   .Printbutton{
    display:none;
    }
    }
    </style>

</head>
<body>

<?php include '../components/headerCli.php'; ?>
<br><br><br>

<section hidden>
  <label class="lglb">Bonjour M/Mme:     </label> <label class="lglb"><?php echo $_SESSION['prenom'] ?> <?php echo $_SESSION['nom'] ?></label> <br>
  <label class="lglb"> Votre ID:         </label> <label class="lglb"><?php echo $_SESSION['cinClt'] ?></label>
</section><br>
<img src="../Assets/kkh-logo.png" style="width:200px;height: 150px ;float:left" alt="logo"><br><br>


<h1 style="text-align: center;"> DEVIS EN LIGNE </h1>
<br><br><br>
<?php
    $dt = new \DateTime();
    $dt->format('y/m/d');
    $year=$dt->format('Y') ."";
?>
    <?php
        require('../Servicedel.php');
        $serviceG=new ServiceGlobal();
        $dvs=new devis();
        $ldv=new lignedevis();
        $id=$_GET['id'];
        //importation de données Devis
        $resDvs=$serviceG->getDevisById($id);
        $RD=$resDvs->fetchAll();
        foreach($RD as $resDvs){
            $numdevis=$resDvs['numdevis'];
            $dtdevis=$resDvs['dtdevis'];
            $cinClt=$resDvs['cinClt'];
            $valid=$resDvs['valid'];    
        }
        //importation de données Client
        $resCli=$serviceG->getClientById($cinClt);
        $RC=$resCli->fetchAll();
        foreach($RC as $resCli){
            $nom=$resCli['nom'];
            $prenom=$resCli['prenom'];
            $adresse=$resCli['adresse'];
            $tel=$resCli['tel'];    
        }
        //importation de données LigneDevis
        $resLD=$serviceG->getLigneDevisById($id);
    ?>

    <table>
        <tr>
            <td>N° Devis : </td>
            <td><?= $numdevis?> / <?= $year ?> </td>
        </tr>
        <tr>
            <td>Date : </td>
            <td><?= $dtdevis?></td>
        </tr>
        <tr>
            <td>Etat : </td>
            <td><?php if($valid==1){echo 'Validé';} ?></td>
        </tr>
        <tr>
            <td>Client</td>
        </tr>
        <tr>
            <td style="text-transform: capitalize;">Nom & Prénom :</td>
            <td style="text-transform: capitalize;"><?= $prenom?>  <?= $nom ?></td>
        </tr>
        <tr>
            <td >Adresse : </td>
            <td style="text-transform: capitalize;"><?= $adresse?></td>
        </tr>
        <tr>
            <td>N° Téléphone :</td>
            <td><?= $tel?></td>
        </tr>
    </table>




<br><br><br>
<div class="container py-2">
    <div class="container">
        <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#ID Article</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Qte</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Remise</th>
                        <th scope="col"><i class="fa fa-percent"></i> Prix remise</th>
                        <th scope="col">Total HT</th>
                    </tr>
                        </thead>
                        <?php

                                $total=0;
                                $RLD=$resLD->fetchAll();
                                foreach($RLD as $resLD){
                                $refart=$resLD['refart'];

                                $resart=$serviceG->getArticleById($refart);
                                $detart=$resart->fetch();
                                $totalProduit = $resLD['ptArt'];
                                $totalRemise = calculerRemise($detart['pu'], $resLD['remise']);
                                $total += $totalProduit;
                                ?>
                                    <tr>
                                        <td><?php echo $resLD['refart']  ?></td>
                                        <td><?php echo $detart['libelle']  ?></td>
                                        <td><?php echo $resLD['qteCmd'] ?></td>
                                        <td align="right"><?php echo number_format($detart['pu'], 3, ',', ' ');?></i></td>
                                        <td><?php echo $resLD['remise'] ?>%</i></td>
                                        <td align="right"><?= number_format($totalRemise, 3, ',', ' ') ?></i></td>
                                        <td align="right"><?php echo number_format($resLD['ptArt'], 3, ',', ' ') ?></i></td>
                                    </tr>
                                <?php
                                }
                                $thtva=$total*0.19;
                                $tf=0.600;
                                $ttc=$total+$thtva-$tf;
                                ?>


                                <tfoot>
                                <tr>
                                    <td colspan="7" align="right"><strong>Total HT=</strong></td>
                                    <td><?= number_format($total, 3, ',', ' ') ?>TND</i></td>
                                </tr>
                                <tr>
                                    <td colspan="7" align="right"><strong>Montant TVQ 19%=</strong></td>
                                    <td><?= number_format($thtva, 3, ',', ' ')  ?>TND</i></td>
                                </tr>
                                <tr>
                                    <td colspan="7" align="right"><strong>Timbre fiscal=</strong></td>
                                    <td><?= number_format($tf, 3, ',', ' ')  ?>TND</i></td>
                                </tr>
                                <tr>
                                    <td colspan="7" align="right"><strong>Total TTC=</strong></td>
                                    <td><?= number_format($ttc, 3, ',', ' ')  ?>TND</i></td>
                                </tr>
                                <tr>
                                    <?php $icon="<i class=\"bi bi-printer\"></i>" ?>
                                    <td colspan="8" align="right">
                                    <form method="post" action="#">
                                        <input name="taux" type="hidden" value="1">
                                        <input name="id" type="hidden" value="<?php ?>">
                                        <div id="printBox">
                                            <button class="Printbutton btn btn-success" type="submit" onclick="imprimer_page()" name="imprimer">
                                                  <?= $icon ?>  Imprimer  
                                            </button>
                                            <a class="Printbutton btn btn-primary" href="gestDevisCli.php">Mes devis</a>
                                        </div>
                                    </form>
                                    </td>
                                </tr>
                            </tfoot>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
function imprimer_page(){
  window.print()
}
</script>


</body>
</html>
<?php
}
else{
  header("Location: ./index.php");
  exit();
}

?>