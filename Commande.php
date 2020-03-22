<?php
//Affichage des erreurs PHP ( A mettre au début de tes scripts PHP )
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

// Démarrage des sessions si pas déjà démarrées
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<!DOCTYPE html>
<html>
    <head>
    <title>C & H</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
<link rel="stylesheet" href="familycss.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="font-awesome.min.css">
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='jss.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
<?php 
        $_SESSION['prixTotal']=0;
require("AjoutPanier.php");

 echo' <div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" ><img src="img2/logo-carousel/LL.png" style="width:100px;height:70px;margin-left:10px;"></a>
    <!-- Right-sided navbar links -->
    
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small" >
        
    
      <a href="index.php?logout=true" class="w3-bar-item w3-button" style="padding:22px;"><i class=""></i> LOGOUT</a>
    
    
        
</form>
        



       
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
        
  </div>
</div>';





function aff(){
   if(isset($_GET['f'])&& $_GET['f']=true){
  echo ' <table  style="margin-top:90px;" >';
echo '<tr><td colspan=\"3\" style="background-color:#DAA520; padding:5px;border-radius:5px;"><b>Récapitulatif de votre commande</b></td><br>';
echo '<br><tr style="background-color:#EEE8AA;"><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;</ th><th>&nbsp;
prix&nbsp;</th>';
$total=0;
$tab_code=explode("//",$_SESSION['code']);  
$tab_article=explode("//",$_SESSION['article']);  
$tab_prix=explode("//",$_SESSION['prix']);  
  

for($i=1;$i<count($tab_code);$i++)  
{
echo "<tr> <td>{$tab_code[$i]}</td> <td>{$tab_article[$i]}</td><td>
".sprintf("%01.2f", $tab_prix[$i])."&nbspDH</td>";
$_SESSION['prixTotal']+=$tab_prix[$i];  
}
echo '<tr> <td colspan=2><b> PRIX TOTAL</b> </td> <td  style="background-color:#FFA07A;">'.sprintf("%01.2f", $_SESSION['prixTotal']).'
DH</td>';
echo "</table>";
   
} 
}

aff();
if(isset($_GET['logout']) ){ 
    session_unset();  
session_destroy(); 
}

 /*if(isset($_GET['delete']) ){  
     
         $ID=$_GET['delete'];
       echo "<table border=\"1\" >";
echo "<tr><td colspan=\"3\"><b>Récapitulatif de votre commande</b></td>";
echo "<tr><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;</ th><th>&nbsp;
prix&nbsp;</th>";
$total=0;
$tab_code=explode("//",$_SESSION['code']);  
$tab_article=explode("//",$_SESSION['article']);  
$tab_prix=explode("//",$_SESSION['prix']);  
     
     for($i=1;$i<count($tab_code);$i++)  
{
         if($tab_code[$i]!=$ID)
         {
            echo "<tr> <td>{$tab_code[$i]}</td> <td>{$tab_article[$i]}</td><td>
".sprintf("%01.2f", $tab_prix[$i])."</td><td><a href=http://localhost/PorjetE-commerce/Commande.php?delete=".$tab_code[$i]."  >supprimer</a></td>";
$_SESSION['prixTotal']+=$tab_prix[$i]; 
         }
   
   elseif($tab_code[$i]==$ID){

       unset($_SESSION['code'][$i]);
       
   } 

}         echo "<tr> <td colspan=2> PRIX TOTAL </td> <td>".sprintf("%01.2f", $_SESSION['prixTotal'])."
</td>";
echo "</table>";
 }*/
  


echo'</body>
    </html>';
        











?>