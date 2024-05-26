<?php
session_start();
if (!isset($_SESSION['cinClt'])) {
    header('location: ../traitement/connexion.php');
}

$id = $_POST['id'];
$qty = $_POST['qty'];
$idUtilisateur = $_SESSION['cinClt'];
if (!isset($_SESSION['devis'][$idUtilisateur])) {
    $_SESSION['devis'][$idUtilisateur] = [];
}
if($qty == 0){
    unset($_SESSION['devis'][$idUtilisateur][$id]);
}else{
    $_SESSION['devis'][$idUtilisateur][$id] = $qty;
}

header("location:".$_SERVER['HTTP_REFERER']);