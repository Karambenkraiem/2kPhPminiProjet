<?php
session_start();
require('../Servicedel.php');

$serviceG= new ServiceGlobal();
if(isset($_POST['email']) && isset($_POST['password'])){

}

$uname=test_input($_POST['email']);
$pass=test_input($_POST['password']);

if(empty($uname)){
    header("Location: index.php?error=Le nom d'utilisateur est requis !");
    exit();
}
else if(empty($pass)){
    header("Location: index.php?error=Mot de passe manquant !");
    exit();
}

$res=$serviceG->getUserName($uname,$pass);
if($ligne = $res->fetch())
{
    if($ligne['email']===$uname && $ligne['mp']===$pass){
        echo"Logged In";
        $_SESSION['cinClt'] = $ligne['cinClt'];
        $_SESSION['nom'] = $ligne['nom'];
        $_SESSION['prenom'] = $ligne['prenom'];
        $_SESSION['typeCompte'] = $ligne['typeCompte'];
        header("Location: ../admin/homeAdmin.php");
        exit();
    }
    else{
        header("Location: index.php?error=Echec de la connexion");
    }
}
else{
    header("Location: index.php?error=Echec de la connexion ! Vérifier le nom d'utilisateur ou le mot de passe !");
    exit();
}
?>