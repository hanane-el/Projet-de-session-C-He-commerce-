<?php
//Affichage des erreurs PHP ( A mettre au début de tes scripts PHP )
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

// Démarrage des sessions si pas déjà démarrées
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(! isset($_SESSION['prixTotal']))  $_SESSION['prixTotal']=0; 
if(! isset($_SESSION['code'])) $_SESSION['code']=0; 
if(! isset($_SESSION['article'])) $_SESSION['article']=""; 
if(! isset($_SESSION['prix'])) $_SESSION['prix']=0; 
if(! isset($_SESSION['qte'])) $_SESSION['qte']=0; 
if(! isset($_SESSION['NB'])) $_SESSION['NB']=0; 
 
//CONX BD
$host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "ch.e-commerce";  
 $message = "";  

   try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }


  function addProduct($id_produit,$libelle_produit,$qte=1,$prix_unitaire_produit){
$code=$id_produit;  
$article=$libelle_produit;  
$prix=$prix_unitaire_produit;
$Qte=$qte;
$_SESSION['code']= $_SESSION['code']."//".$code;  
$_SESSION['article']= $_SESSION['article']."//".$article;  
$_SESSION['prix']= $_SESSION['prix']."//".$prix; 
      $_SESSION['qte']= $_SESSION['qte']."//".$Qte;
      $_SESSION['NB']=$_SESSION['NB']+1; 
  }
  
 


 if(isset($_GET['id']) )
                                {
                                    
                                $ID=$_GET['id'];
                $reponse = $connect->query("SELECT * FROM produits WHERE id= $ID ");
   
        while ($donnees = $reponse->fetch()){
            $DESC=$donnees['description'];
            $PRIX=$donnees['prix'];
            
            $_SESSION['id']=$ID;
addProduct($ID,$DESC,1,$PRIX);

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();

    


        }}


?>