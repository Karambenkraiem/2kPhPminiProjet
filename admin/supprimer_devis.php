<?php
    require('../Servicedel.php');
    $serviceG= new ServiceGlobal();

    $id=$_GET['id'];
    $res1=$serviceG->suppDevis($id);
    $res2=$serviceG->suppLigneDevis($id);
    if ($res1 && $res2){
      header("Location: gestDevis.php?success=Devis supprimé avec succès!");
    }
?>