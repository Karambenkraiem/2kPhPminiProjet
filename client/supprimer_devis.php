<?php
session_start();
if (!isset($_SESSION['cinClt'])) {
    header('location: ../traitement/connexion.php');
}

$idUtilisateur = $_SESSION['cinClt'];

$id = $_POST['id'];
unset($_SESSION['devis'][$idUtilisateur][$id]);
header("location:".$_SERVER['HTTP_REFERER']);
?>