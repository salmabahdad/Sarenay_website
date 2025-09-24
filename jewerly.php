<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>JEWERLY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="home.css">
    <style>
.xs\:hidden {
    display: none;
  }
#search-bar {
  display: flex;
  align-items: center;
  height: 3rem; 
  position: relative; 
}
#dropdown{
    position:absolute;
    bottom:-155px;

}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

.underline-on-hover:hover::after {
        content: '';
        display: block;
        width: 100%;
        height: 2px;
        background-color: #000; /* Couleur de la ligne */
        transition: width 0.3s ease; /* Transition de la largeur de la ligne */
    }
    .fonts{
      font-family:serif;
      font-size:x-large;
      font-style: italic;
    }
  

    </style>
  
</head>
<body>
     

<header class=" flex relative h-10 items-center justify-center bg-black px-10  font-thin text-xs  text-white sm:px-20 lg:px-20" id="myheader">
       <div id="cont">
        <p id="notifs" >ENJOY OUR SIGNATURE GIFTWRAPPING ON EVERY ORDER</p>
        <!--<button class="text-white font-bold mr-0 ml-11" onClick="del()" id="mybutton" onClick="del()">
            <span class="hover:text-red-700 icon text-2xl text-white font-thin" aria-hidden="true" >X</span>
        </button>-->
    </div>
</header>

<div class="relative  h-36" >
  
    <div class="inline-flex">
      
     
        <button type="button"  id="contactus" class="font-thin text-xs hover:text-gray-600  relative  left-20  text-gray-400" onclick="redirectToPagecontactus()">CONTACT US</button> 
       
      <button class="absolute left-0  menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></button>
       <button > <img src="images/search.png" id="logo" class="h-8 py-0 ml-0 relative 
          left-28 "  alt="search_bar" >
      </button>

    </div>
    
<div class=" h-11   absolute right-1 md:right-20  inline-flex">
    
    &nbsp;
   

    <div id="dropdown" class=" dropdown absolute right-0 top-6  w-56  rounded-md   ring-black ring-opacity-5 focus:outline-none" style="visibility:hidden;">
    <div class=" absolute right-0 z-10 mt-2 w-56 origin-top-right  bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"  role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <div class="py-1" role="none">
      <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
      <a href="shoppingbag.php" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">Orders</a>
      <a href="#" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">MY WISHLIST</a>
      
      <form method="POST" name="signout"  role="none">
        <button type="submit" class="text-gray-700 block w-full px-4 py-2 text-left text-sm" role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>

      </form>
    </div>
    </div>
    </div>

    <a href="#" class="font-thin mt-2.5 text-sm hover:text-gray-600 h-10 text-gray-400"><img class="h-4 mt-0  ml-7  " src="images/heart.png" alt="wishlist"></a>
    <a href="shoppingbag.php" class="font-thin mt-2.5 text-sm hover:text-gray-600 h-10 text-gray-400"><img class="h-4 mt-0  ml-7  " src="images/shopping-cart (1).png" alt="myroducts"></a>
</div>

       <form  class="max-w-lg mx-auto relative" method="post" action="searchresult.php">
       <div     style="visibility:hidden;" class="h-96">
      
              

       <div class=" relative w-72 "style="visibility:hidden;" id="search-bar" onClick="showsearchbar()">
    
          <input name="inputi" type="search"  class="h-12 block  p-2.5 w-full absolute top-4 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search" required />
          <button type="submit" name="butsearch" class=" z-50 top-4 absolute end-0 p-2.5 text-sm font-medium h-full text-black bg-white rounded-e-lg  hover:bg-gray-500 focus:ring-4 focus:outline-none focus:bg-slate-300 dark:bg-gray-600 dark:hover:bg-gray-300 dark:focus:to-black">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
              <span class="sr-only">Search</span>
          </button>
        
    </div>
  </div>
      </form>

    

    <div class="absolute  top-8 inset-x-0 flex justify-center items-center ">
       <a href="home.html"><img src="images/serenaylogo.png" class="h-14"></a>
    </div>
    
</div>

 <nav>
<div class="flex flex-wrap  h-10 justify-between items-center   mx-auto max-w-screen-xl p-4  relative top-0">
    <button data-collapse-toggle="mega-menu-full" type="button" class="inline-flex items-center px-52 w-10 h-10  text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-full" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    
        <ul class="hideOnMobile">
            <li>
                <a href="home.php" class="underline-on-hover block py-2 px-3 text-gray-500 rounded md:hover:bg-transparent md:hover:text-gray-900  md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent text-sm mr-8"  aria-current="page">Home</a>
            </li>
            <li>
                <a href="aboutus.html" class="underline-on-hover  block py-2 px-3 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 text-sm mr-8">About Us</a>
            </li>
            <li>
              <a href="jewerly.php" class="underline-on-hover block py-2 px-3 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 text-sm mr-8">Jewerly</a>
          </li>
       
            <li>
                <a href="gifts.html" class=" underline-on-hover block py-2 px-3 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 text-sm mr-8">Gifts</a>
            </li>
            <li>
                <a href="news.html" class=" underline-on-hover block py-2 px-3 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 text-sm mr-8">News</a>
            </li>
        </ul>
    </div>
   
  </nav>


<form name="fil" class="flex justify-center">&nbsp;
  <select id="pricingType" name="pricingType" class=" w-1/2 rounded-3xl h-10 border-2 focus:outline-none font-thin text-gray-700 px-2 md:px-3 py-0 text-sm tracking-wider">
      <option value="RECOMMENDED" selected>RECOMMENDED</option>
      <option value="PRICE HIGH TO LOW">PRICE HIGH TO LOW</option>
      <option value="PRICE LOW TO HIGH">PRICE LOW TO HIGH</option>
  </select>
  &nbsp;&nbsp;
  <input type="submit"  name="filter" class="bg-black text-white h-10 text-sm text-center w-32" value="FILTER">
</form>
<br><br>

<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "shop-db";
$port =3307;
$conn = mysqli_connect($host, $user, $password, $database,$port);


if(isset($_POST['filter'])){
  $filtrage=$_POST['pricingType'];

  if($filtrage=="RECOMMENDED"){
 $sql900="SELECT * FROM produits";
 $result1900=mysqli_query($conn,$sql1900);
 while($row=mysqli_fetch_assoc($result1900)){
  $ref=$row['reference'];
  $price=$row['prix'];
  $cat=$row['categorie'];
  $image=$row['image'];
  $name=$row['name'];

echo'<div class="">
<div class="  w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none  lg:h-80">
  <img src="images/'.$image.'" class="" >
</div>
<div class="mt-4 flex justify-between">
  <div>
    <h3 class="text-sm text-gray-700">
    
      
        <span aria-hidden="true" class="absolute inset-0"></span>
        '.$name.'
      
    </h3>
    <p class="mt-1 text-sm text-gray-500">'.$cat.'</p>
  </div>
  <p class="text-sm font-medium text-gray-900">'.$price.'$</p>
  
</div><br>';
echo' 
  <form method="post">
  <button type="submit" name="addtocart" value="'.$ref.'" class="flex w-full items-center justify-center rounded-md hover:bg-gray-500 bg-black px-5 py-2.5 text-center text-sm font-medium text-white ">
  <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    Add to cart</button>
  </form></div>

';
}
}
if($filtrage=="PRICE HIGH TO LOW"){
  $sql900="SELECT * FROM produits ORDER BY prix";
  $result1900=mysqli_query($conn,$sql1900);
  while($row=mysqli_fetch_assoc($result1900)){
   $ref=$row['reference'];
   $price=$row['prix'];
   $cat=$row['categorie'];
   $image=$row['image'];
   $name=$row['name'];
 
 echo'<div class="">
 <div class="  w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none  lg:h-80">
   <img src="images/'.$image.'" class="" >
 </div>
 <div class="mt-4 flex justify-between">
   <div>
     <h3 class="text-sm text-gray-700">
     
       
         <span aria-hidden="true" class="absolute inset-0"></span>
         '.$name.'
       
     </h3>
     <p class="mt-1 text-sm text-gray-500">'.$cat.'</p>
   </div>
   <p class="text-sm font-medium text-gray-900">'.$price.'$</p>
   
 </div><br>';
 echo' 
   <form method="post">
   <button type="submit" name="addtocart" value="'.$ref.'" class="flex w-full items-center justify-center rounded-md hover:bg-gray-500 bg-black px-5 py-2.5 text-center text-sm font-medium text-white ">
   <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
   <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
     </svg>
     Add to cart</button>
   </form></div>
 
 ';
}


}
if($filtrage=="PRICE LOW TO HIGH"){
  $sql900="SELECT * FROM produits ORDER BY prix DESC";
  $result1900=mysqli_query($conn,$sql1900);
  while($row=mysqli_fetch_assoc($result1900)){
   $ref=$row['reference'];
   $price=$row['prix'];
   $cat=$row['categorie'];
   $image=$row['image'];
   $name=$row['name'];
 
 echo'<div class="">
 <div class="  w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none  lg:h-80">
   <img src="images/'.$image.'" class="" >
 </div>
 <div class="mt-4 flex justify-between">
   <div>
     <h3 class="text-sm text-gray-700">
     
       
         <span aria-hidden="true" class="absolute inset-0"></span>
         '.$name.'
       
     </h3>
     <p class="mt-1 text-sm text-gray-500">'.$cat.'</p>
   </div>
   <p class="text-sm font-medium text-gray-900">'.$price.'$</p>
   
 </div><br>';
 echo' 
   <form method="post">
   <button type="submit" name="addtocart" value="'.$ref.'" class="flex w-full items-center justify-center rounded-md hover:bg-gray-500 bg-black px-5 py-2.5 text-center text-sm font-medium text-white ">
   <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
   <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
     </svg>
     Add to cart</button>
   </form></div>
 
 ';
}
}
}
?>


<div class="bg-gray-50">
    <div class="mx-auto max-w-2xl px-4  sm:px-6  lg:max-w-7xl lg:px-8">
      
  
      <div class=" grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

 <?php

$host = "localhost";
$user = "root";
$password = "";
$database = "shop-db";
$port =3307;
$conn = mysqli_connect($host, $user, $password, $database,$port);

if (!$conn) {
    header("location:error404.html");
}

$sql="SELECT * FROM produits";
$result=mysqli_query($conn,$sql);




while($row=mysqli_fetch_assoc($result)){
  $ref=$row['reference'];
  $price=$row['prix'];
  $cat=$row['categorie'];
  $image=$row['image'];
  $name=$row['name'];

echo'<div class="">
<div class="  w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none  lg:h-80">
  <img src="images/'.$image.'" class="" >
</div>
<div class="mt-4 flex justify-between">
  <div>
    <h3 class="text-sm text-gray-700">
    
      
        <span aria-hidden="true" class="absolute inset-0"></span>
        '.$name.'
      
    </h3>
    <p class="mt-1 text-sm text-gray-500">'.$cat.'</p>
  </div>
  <p class="text-sm font-medium text-gray-900">'.$price.'$</p>
  
</div><br>';
echo' 
  <form method="post">
  <button type="submit" name="addtocart" value="'.$ref.'" class="flex w-full items-center justify-center rounded-md hover:bg-gray-500 bg-black px-5 py-2.5 text-center text-sm font-medium text-white ">
  <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    Add to cart</button>
  </form></div>

';
}

if(isset($_POST['addtocart'])){
  $refduproduit=$_POST['addtocart'];
   if(isset($_SESSION['user_email'])){ 
    
     $session=$_SESSION['user_email'];
     
     $requete1 = "INSERT INTO shoppingbag values ('$refduproduit','$session')";
     $result=mysqli_query($conn,$requete1);
 }
 if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
  // 'panier' existe et est un tableau, donc nous pouvons ajouter directement l'élément
  $_SESSION['panier'][] = $_POST['addtocart'];
} else {
  // 'panier' n'existe pas ou n'est pas un tableau, nous devons l'initialiser comme un tableau
  $_SESSION['panier'] = array($_POST['addtocart']); 
}
}



?>

      </div>
          </div>
            
         
</div>
<script>
     /*
        function del(){
        document.getElementById('myheader').style.visibility='hidden';
    }*/
    
// Récupérer l'élément de la barre de recherche
const searchBar = document.getElementById('search-bar');

// Récupérer l'élément du logo
const logo = document.getElementById('logo');

// Écouter l'événement de survol sur le logo
logo.addEventListener('mouseenter', function() {
    // Calculer la position du logo
    const logoRect = logo.getBoundingClientRect();

    // Définir la position de la barre de recherche en fonction de la position du logo
    searchBar.style.top = `-15px`; // Positionner en bas du logo
    searchBar.style.left = `${logo.offsetLeft - searchBar.offsetWidth -100}px`; // Positionner à gauche avec une marge de 20px

    // Afficher la barre de recherche
    searchBar.style.visibility = 'visible';
});

// Écouter l'événement de sortie du survol sur le logo pour cacher la barre de recherche
logo.addEventListener('mouseleave', function() {
    // Cacher la barre de recherche

    searchBar.style.visibility = 'hidden';

});

// Écouter l'événement de survol sur la barre de recherche pour la garder affichée
searchBar.addEventListener('mouseenter', function() {
    searchBar.style.visibility = 'visible';

});

searchBar.addEventListener('mouseleave', function() {
    searchBar.style.visibility = 'hidden';

});
function displayflyout(){
    document.getElementById('flyout').style.visibility="visible";
}
function deleteflyout(){
    document.getElementById('flyout').style.visibility="hidden";
}


function affichernavbar(){
  document.getElementById("navbar-default").style.visibility="visible";
}
  




// Mobile menu toggle
const mobileMenuButton = document.querySelector(".mobile-menu-button")
const mobileMenu = document.querySelector(".navigation-menu")
  

  mobileMenuButton.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
  })
  


  // Sélectionner tous les liens dans le menu de navigation
const navLinks = document.querySelectorAll('.navigation-menu a');

// Ajouter un gestionnaire d'événements à chaque lien
navLinks.forEach(link => {
    link.addEventListener('click', function(event) {
        // Empêcher le comportement par défaut du lien
        event.preventDefault();
        // Rediriger vers l'URL spécifiée dans l'attribut href du lien
        window.location.href = this.getAttribute('href');
    });
});
function redirectToPagecontactus(){
  window.location.href = "contactus.html";
}



function showSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }
    function hideSidebar(){
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }
    function showsearchbar(){
     searchbar= document.getElementById("search-bar");
     searchbar.style.visibility="visible";
      }  
    function afficherdropdown(){
      const dropdown= document.getElementById("dropdown");
     dropdown.style.visibility="visible";
    }
  
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        if (dropdown.style.visibility === 'visible') {
            dropdown.style.visibility = 'hidden';
        } else {
            dropdown.style.visibility = 'visible';
        }
    }

   

</script>


</body>
</html>