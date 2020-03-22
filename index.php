<?php  
 session_start();  
if(! isset($_SESSION['NB'])) $_SESSION['NB']=0; 
$host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "ch.e-commerce";  
 $message = "";  

   try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      if(isset($_POST["envoie"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $message = '<label>Tous les champs sont obligatoires</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM login WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
					 $_SESSION["password"] = $_POST["password"];
                     header("location:Commande.php?f=true");  
                    exit();
                }  
                else  
                {  
                     $message = '<label>Nom d\'utilisateur ou mot de passe incorrecte</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
  
 ?>  
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
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/w3images/mac.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
 a:hover .sub-menu {
  visibility: visible;
  opacity: 1;
  margin-top: 0;
}
 
.sub-menu >li { 
 position: absolute;
  list-style: none;
  width: 220px;
  left: 0;
  top: 100%;
  padding: 20px 0;
  visibility: hidden;
  opacity: 0;
  margin-top: 50px;
  background: #fff;
  z-index: 99;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
  -webkit-box-shadow: 2px 7px 20px rgba(0, 0, 0, 0.2);
  box-shadow: 2px 7px 20px rgba(0, 0, 0, 0.2); 
  color:red;
}
 

  .main-menu ul li:hover .sub-menu {
  visibility: visible;
  opacity: 1;
  margin-top: 0;
}

.main-menu ul li .sub-menu {
  
  list-style: none;
  width: 220px;
  height: 220px;
  left: 0;
  top: 100%;
  padding: 20px 0;
  visibility: hidden;
  opacity: 0;
  margin-top: 50px;
  background: #fff;
  color:red;
  z-index: 99;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
  -webkit-box-shadow: 2px 7px 20px rgba(0, 0, 0, 0.2);
  box-shadow: 2px 7px 20px rgba(0, 0, 0, 0.2);
}

   
    .ulnv>li{
        	display: inline-block;   
        margin-left:130px;
    }

 
</head>
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" ><img src="img2/logo-carousel/LL.png" style="width:100px;height:70px;margin-left:10px;"></a>
    <!-- Right-sided navbar links -->
    
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small" >
        <?php
     echo'  <form method="get"> <a href="index.php" class="w3-bar-item w3-button" style="background:#DAA520;padding:22px;">ACCUEIL</a>
      
      <a href="index.php#work" class="w3-bar-item w3-button" style="padding:22px; "><i class="fa fa-th"></i> PRODUITS</a>
      
      <a href="contact.html" class="w3-bar-item w3-button" style="padding:22px;"><i class="fa fa-envelope"></i> CONTACT</a>
    
    <a href="http://localhost/PorjetE-commerce/index.php?login=true" class="w3-bar-item w3-button" style="padding:22px;"><i class=""></i> COMMANDER +'.$_SESSION['NB'].'</a>
        
</form>';
        



        ?>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
        
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">ACCUEIL</a>
  
  <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">PRODUITS</a>
  
  <a href="contact.html" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
    <?php
       echo' <a href="http://localhost/PorjetE-commerce/index.php?login=true" class="w3-bar-item w3-button" style="padding:22px;"><i class=""></i> COMMANDER +'.$_SESSION['NB'].'</a>';?>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px;background-image: url('img/slider-2.jpg'); width:100%;height:120%;margin-top:-60px;margin-bottom:-60px;">
 
    <span class="w3-jumbo w3-hide-small">Collection</span><br>
    <span class="w3-xxlarge w3-hide-large w3-hide-medium"></span><br>
    <span class="w3-large" style="margin:55%;font-family:initial;font-weight:bold;font-size: xx-large;font-variant-caps: titling-caps;  ">
     <CENTER> <h1>Collection
    2020</h1></CENTER></span>
         <?php
if(isset($_GET['login']) && $_GET['login'] = true){
echo '<div style="width:25%; height:50%;  padding:5%; margin-left:38%; background-color: rgba(0,0,0,0.5);">
<form method="POST" action="#">
 
 Identifiez vous svp: <br/> 
<label>Login : </label><input type="text" name="username" style=" border: 1px solid #ccc;

            border-radius:  20px;"/> <br/> 
<label>Password : </label><input type="password" name="password"  style=" border: 0px solid #ccc;

            border-radius:  20px;"/> <br/> <br/> 
<input type="submit" name="envoie" value="Entrer" style=" background: #DAA520; border: 0px; margin-left:33%;  border-radius:  15px;
color:white;padding-left:3%;padding-right:3%;
  "/>
 
</form>';?>
   
<?php 
								if($message!=""){?>			
									<div class="alert alert-danger alert-dismissible"style="color:#8B0000;font-weight:bold;
                                                                                            font-size:large;margin-top:4%;text-align:center;" >
									
										<?php echo $message ?>
									</div>			
						<?php 	}	?>

</div>
<?php  }
else{
    echo'';
}
      ?>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px;margin-top:-50%;">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    
    
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</header>

<!-- About Section -->


<!-- Promo Section - "We know design" -->


<!-- Team Section -->

  <h3 class="w3-center">Nos nouveautées</h3>
  <p class="w3-center w3-large"></p>
  
   
       <div style="display:inline-block;">
    <?php    $reponse = $connect->query("SELECT * FROM produits WHERE type='nouveaute-vetements'");
         echo'<ul class="ulnv">';
        while ($donnees = $reponse->fetch()){
    
    echo'  <li><div class="w3-card" style="margin-top=-4%;">
    
        <img src="'.$donnees['photo'].
            '"alt="John" style="height: 20Opx;margin-top=-4%;">
        <div class="w3-container">
          <h3></h3>
          <p class="w3-opacity"></p>
          <p>'.$donnees['description'].'</p>
         
        </div>
      </div></li>';
        }
       echo '</ul>';
        ?>
   </div>
<!--    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="img2/products/women-2.jpg" alt="Jane" style="width:100%; height:310px;">
        <div class="w3-container">
          <h3>Tricot </h3>
          <p class="w3-opacity">nouvelle colloction 2020</p>
          <p>tricot en laine à manches longues.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class='fas fa-plus-circle'></i>    details</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="img2/products/women-1.jpg" alt="Mike" style="width:100%; height:310px;">
        <div class="w3-container">
          <h3>Tricot </h3>
          <p class="w3-opacity">nouvelle colloction 2020</p>
          <p>tricot en laine à manches longues.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class='fas fa-plus-circle'></i>    details</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="img2/products/product-6.jpg" alt="Dan" style="width:100%; height:310px;">
        <div class="w3-container">
          <h3>Tricot</h3>
          <p class="w3-opacity">nouvelle colloction 2020</p>
          <p>tricot en laine à manches longues.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class='fas fa-plus-circle'></i>    details</button></p>
        </div>
      </div>
    </div>-->
  


<!-- Promo Section "Statistics" -->

<!-- Work Section -->
<div class="w3-container" style="padding:128px 16px" id="work">
  <h3 class="w3-center">Nos produits</h3>
  <p class="w3-center w3-large">Nous vous présentons nos categories</p>

  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6">
       <a href="products.php"><img src="img2/products/product-6.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" >
    </a><p class="w3-opacity"><h3>Vetements</h3></p></div>
    <div class="w3-col l3 m6">
      <a href="productsaccs.php"><img src="img2/products/product-5.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A phone"></a><p class="w3-opacity"><h3>Accessoirs</h3></p>
    </div>
    <div class="w3-col l3 m6">
      <a href="productssacs.php"><img src="img2/products/women-4.jpg" style="width:100%; height:350px;" onclick="onClick(this)" class="w3-hover-opacity" alt="A drone"></a><p class="w3-opacity"><h3>Sacs</h3></p>
    </div>
    <div class="w3-col l3 m6">
      <a href="productsch.php"><img src="img2/products/product-9.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Soundbox"></a><p class="w3-opacity"><h3>Chaussures</h3></p>
    </div>
  </div>

  <!--<div class="w3-row-padding w3-section">
    <div class="w3-col l3 m6">
      <img src="/w3images/tech_tablet.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tablet">
    </div>
    <div class="w3-col l3 m6">
      <img src="/w3images/tech_camera.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A camera">
    </div>
    <div class="w3-col l3 m6">
      <img src="/w3images/tech_typewriter.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A typewriter">
    </div>
    <div class="w3-col l3 m6">
      <img src="/w3images/tech_tableturner.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tableturner">
    </div>
  </div>-->
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Skills Section -->



<!-- Pricing Section -->


<!-- Contact Section -->
 <!--<div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
  <h3 class="w3-center">CONTACT</h3>
  <p class="w3-center w3-large">Lets get in touch. Send us a message:</p>
  <div style="margin-top:48px">
    <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> Chicago, US</p>
    <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> Phone: +00 151515</p>
    <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> Email: mail@mail.com</p>
    <br>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-black" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>-->
    <!-- Image of location/map 
    <img src="/w3images/map.jpg" class="w3-image w3-greyscale" style="width:100%;margin-top:48px">
  </div>
</div>-->

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>Vers le haut</a>
  <div class="w3-xlarge w3-section">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <!--<i class="fa fa-snapchat w3-hover-opacity"></i>-->
    <!--<i class="fa fa-pinterest-p w3-hover-opacity"></i>-->
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
 <!-- <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>-->
</footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>
