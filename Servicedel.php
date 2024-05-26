<?php
class Client{
    public $cinClt;
    public $nom;
    public $prenom;
    public $email;
    public $mp;
    public $typeCompte;
    public $adresse;
    public $tel;
}

class Article{
    public $refart;
    public $libelle;
    public $pu;
    public $qte;
}

class devis{
    public $numdevis;
    public $dtdevis;
    public $mtotal;
    public $cinClt;
}

class lignedevis{
    public $numdevis;
    public $refart;
    public $qteCmd;
    public $remise;
    public $ptArt;
}

class ServiceGlobal{

public $serveur;
public $user_name;
public $password;
public $con;


public function __construct() {
    $this->serveur="localhost";
    $this->user_name="root";
    $this->password="";
    try{
    $this->con= new PDO("mysql:host=$this->serveur;dbname=devisenligne",$this->user_name,$this->password);
    }
    catch (PDOException $e)
    {
        print_r($e);
    }
    $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}

//----------------------------------------------------------------------------------

//*Les méthodes de la classe Article    
public function addArticle($article){
    $req="INSERT INTO article values('$article->refart', '$article->libelle', $article->pu, $article->qte, '$article->image');";
    return($this->con->query($req));
}

public function suppArticle($article){
    $req="delete from article where refart='$article->refart';";
    return($this->con->query($req));
}

public function modifArticle($article){
    $req="update article set libelle='$article->libelle', pu=$article->pu, qte=$article->qte, image='$article->image' where refart='$article->refart';";
    return($this->con->query($req));    
}
public function modifArticleSansImage($article){
    $req="update article set libelle='$article->libelle', pu=$article->pu, qte=$article->qte where refart='$article->refart';";
    return($this->con->query($req));    
}
       
public function getArticleById($refart){
    $req="select * from article where refart='$refart';";
    $res=$this->con->query($req);
    return $res;
}

public function getArticlePu($refart){
    $req="select pu from article where refart='$refart';";
    $res=$this->con->query($req);
    return $res;
}

public function getAllArticle(){
    $req="select * from article;";
    $res=$this->con->query($req);
    return $res;    
}

public function existAtricle($refart){
    $req="SELECT* FROM article WHERE refart='$refart';";
    $res=$this->con->query($req);
    return $res; 
}

public function getArticlesDevis($idProduits){
    $req="SELECT * from article where refart IN ('$idProduits');";
    $res=$this->con->query($req);
    return $res;
}
//*Les méthodes de la classe Article

//----------------------------------------------------------------------------------

//*Les méthodes de la classe Client
public function getUserName($uname, $pass){
    $req="SELECT * FROM client WHERE email LIKE '$uname' AND mp LIKE '$pass';";
    $res=$this->con->query($req);
    return $res;
}

public function compteur(){
    $res=0;
    $req="SELECT COUNT(*) FROM client;";
    $res=$this->con->query($req);
    return $res;
}

public function addUser($client){
    $req="INSERT INTO client values($client->cinClt, '$client->nom', '$client->prenom', '$client->email', '$client->mp', 'client', '$client->adresse', $client->tel);";
    $res=$this->con->query($req);
    return $res;
}

public function getClientById($id){
    $req="SELECT nom, prenom, adresse, tel FROM client WHERE cinClt=$id;";
    $res=$this->con->query($req);
    return($res);
}
//*Les méthodes de la classe Client

//----------------------------------------------------------------------------------

//*Les méthodes de la classe Devis
public function addDevis($dvs){
    $req="INSERT INTO devis values(0,'$dvs->dtdevis',$dvs->mtotal,$dvs->cinClt,0);";
    $this->con->query($req);
    return($this->con->lastInsertID('devis'));
}

public function getAllDevis(){
    $req="SELECT * FROM devis";
    $res=$this->con->query($req);
    return($res);
}

public function getDevisById($id){
    $req="SELECT * from devis where numdevis=$id;";
    $res=$this->con->query($req);
    return($res);
}

public function validateDevis($id, $val, $total){
    $req="UPDATE devis SET mtotal=$total, valid=$val  WHERE numdevis=$id;";
    $res=$this->con->query($req);
    return($res);
}

public function suppDevis($id){
    $req="delete from devis where numdevis=$id;";
    return($this->con->query($req));
}

public function getDevisByCinClt($cinClt){
    $req="SELECT * from devis where cinClt=$cinClt and valid=1;";
    $res=$this->con->query($req);
    return($res);
}
//*Les méthodes de la classe Devis

//----------------------------------------------------------------------------------

//*Les méthodes de la classe lignedevis
public function addLigneDevis($ldv){
    $req="INSERT INTO lignedevis values($ldv->numdevis,'$ldv->refart', $ldv->qteCmd, $ldv->remise, $ldv->ptArt);";
    return($this->con->query($req));
}

public function getLigneDevisById($id){
    $req="select * from lignedevis where numdevis=$id;";
    $res=$this->con->query($req);
    return $res;
}

public function updateRemise($rem,$id,$ref){
    $req="UPDATE lignedevis SET remise=$rem WHERE numdevis=$id and refart='$ref';";
    $res=$this->con->query($req);
    return($res);
}

public function suppLigneDevis($id){
    $req="delete from lignedevis where numdevis=$id;";
    return($this->con->query($req));
}
//*Les méthodes de la classe lignedevis

//----------------------------------------------------------------------------------
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function calculerRemise($prix, $remise)
{
    return $prix - (($prix * $remise) / 100);
}

?>