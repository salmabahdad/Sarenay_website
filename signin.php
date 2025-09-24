
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    <style>
     
     .custom-input {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        .custom-input:focus {
            outline: none;
            border-color: #007bff;
        }

        .custom-input::placeholder {
            color: #999;
        }

        .custom-input-wrapper {
            margin-bottom: 20px;
        }

     .items-start {
    align-items: flex-start;
  }

  nav{
    background-color: white;

     margin-top:-40px;
     margin-bottom:15px
  }

  nav ul {
    width: 100%;
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center; 
    
  }
  nav li{
    height: 50px;
  }

  nav a{
    height: 100%;
    padding: 0 30px 0 0;
    text-decoration: none;
    display: flex;
    align-items: center;
    color: black;
    
  }

  
.sidebar{
    position: fixed;
    top: 0; 
    left: 0;
    height: 100vh;
    width: 250px;
    background-color: white;
    backdrop-filter: blur(12px);
    box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
    list-style: none;
    display: none;
    flex-direction: column;
    justify-content: flex-start;
    z-index: 999;
    backdrop-filter: blur(12px);
 
  }

  .sidebar li{
    width: 100%;
  }

  .sidebar a{
    width: 100%;
  }

  .menu-button{
    display: none;
  }

  @media(max-width: 800px){
    .hideOnMobile{
      display: none;
      
    }
    .menu-button{
      display: block;
      position:absolute;
      top:1px;
    }
  }

  @media(max-width: 400px){
    .sidebar{
      width: 100%;
      height: 100%;
    }
  }

@media(max-width: 800px){
    #logo{
        display: none;
        
    }
  }

  @media(max-width: 800px){
    #contactus{
        display: none;
       

    }
  }
 
    </style>
</head>
<body>



<?php
session_start();
// Connexion à la base de données
$host = "localhost"; // Adresse du serveur MySQL
$user = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$database = "shop-db"; // Nom de la base de données
$port =3307;
$conn = mysqli_connect($host, $user, $password, $database,$port);

// Vérification de la connexion
if (!$conn) {
  header("location:error404.html");
 }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$address = $_POST['address'];




$_SESSION["user_email"]=$email;

// Vérification de l'unicité de l'email
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  $errors['email'] = "Email already exists";
} else {
    
    

    // Insertion de l'utilisateur dans la base de données
    $insert_query = "INSERT INTO users (email, password,tel,ville,adresse) VALUES ('$email', '$password','$phone','$city','address')";
    
    if (mysqli_query($conn, $insert_query)) {
      header("location:home.php");
    }else{
      exit;
    }
   
    }}

// Fermeture de la connexion
mysqli_close($conn);
?>




    <header class=" flex relative h-10 items-center justify-center bg-black px-10  font-thin text-xs  text-white sm:px-20 lg:px-20" id="myheader">
        <div id="cont">
         <p id="notifs" >ENJOY OUR SIGNATURE GIFTWRAPPING ON EVERY ORDER</p>
         <!--<button class="text-white font-bold mr-0 ml-11" onClick="del()" id="mybutton" onClick="del()">
             <span class="hover:text-red-700 icon text-2xl text-white font-thin" aria-hidden="true" >X</span>
         </button>-->
     </div>
     </header>

    <div class="relative  h-36  " >
  
        <div class="inline-flex    " >
          
         
            <button type="button"  id="contactus" class="font-thin text-xs hover:text-gray-600  relative  left-20  text-gray-400" onclick="redirectToPagecontactus()">CONTACT US</button> 
           
          <button class="absolute left-0  menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z"/></svg></a></button>
           <button > <img src="images/search.png" id="logo" class="h-8 py-0 ml-0 relative 
              left-28 "  alt="search_bar" >
          </button>
    
         </div>
        
        <div class=" h-11   absolute right-1 md:right-20  inline-flex">
        
        
        <a href="login.php" class="font-thin mt-2.5 text-sm hover:text-gray-600  text-gray-400"><img class="h-4 mt-0 ml-auto"src="images/user.png"></a>
        
        <a href="#" class="font-thin mt-2.5 text-sm hover:text-gray-600 h-10 text-gray-400"><img class="h-4 mt-0  ml-7  " src="images/heart.png" alt="wishlist"></a>
        <a href="#" class="font-thin mt-2.5 text-sm hover:text-gray-600 h-10 text-gray-400"><img class="h-4 mt-0  ml-7  " src="images/shopping-cart (1).png" alt="myroducts"></a>
    </div>
    
           <form  class="max-w-lg mx-auto relative" >
           <div     style="visibility:hidden;" class="h-96">
          
                  
    
           <div class=" relative w-72 "style="visibility:hidden;" id="search-bar" onClick="showsearchbar()">
              <input type="search"  class="h-12 block  p-2.5 w-full absolute top-4 z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search" required />
              <button type="submit" class=" z-50 top-4 absolute end-0 p-2.5 text-sm font-medium h-full text-black bg-white rounded-e-lg  hover:bg-gray-500 focus:ring-4 focus:outline-none focus:bg-slate-300 dark:bg-gray-600 dark:hover:bg-gray-300 dark:focus:to-black">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                  </svg>
                  <span class="sr-only">Search</span>
              </button>
     
            
        </div>
      </div>
          </form>
          
        
    
        <div class="absolute  top-8 inset-x-0 flex justify-center items-center ">
           <a href="home.php"><img src="images/serenaylogo.png" class="h-14"></a>
        </div>
        
    </div>
    
    <nav>

      <ul class="sidebar ">
 
     <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg></a>
     </li>
    <li>
     <form  class="w-auto mx-auto relative" >
       <div class="h-96">
        <div class=" relative w-60"  id="search-bar">
          <input type="search"  class="h-12 block bg-white  p-2.5 w-full absolute top-4 z-20 text-sm text-gray-900      dark:bg-gray-700   dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search" required />
          <button type="submit" class=" z-50 top-4 absolute end-0 p-2.5 text-sm font-medium h-full text-black bg-white rounded-e-lg  hover:bg-gray-500 focus:ring-4 focus:outline-none focus:bg-slate-300 dark:bg-gray-600 dark:hover:bg-gray-300 dark:focus:to-black">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
              <span class="sr-only">Search</span>
          </button>
       </div>
       </div>
      </form>
   </li>
 
  
 
   <div class="flex flex-wrap  h-10 justify-between items-center   mx-auto max-w-screen-xl p-4 relative top-[-28]">
   <button data-collapse-toggle="mega-menu-full" type="button" class="inline-flex items-center px-52 w-10 h-10  text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-full" aria-expanded="false">
       <span class="sr-only">Open main menu</span>
       <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
       </svg>
   </button>
   
 
               <li>
                   <a href="home.php" class="  block  text-gray-500  text-sm "  aria-current="page">Home</a>
               </li>
               <li>
                   <a href="aboutus.html" class=" block  text-gray-500  text-sm ">About Us</a>
               </li>
               <li>
                 <a href="jewerly.html" class=" block  text-gray-500   text-sm mr-8">Jewerly</a>
             </li>
          
               <li>
                   <a href="gifts.html" class=" block  text-gray-500 text-sm mr-8">Gifts</a>
               </li>
               <li>
                   <a href="news.html" class="  block  text-gray-500  text-sm mr-8">News</a>
               </li>
               <li>
                 <a href="contactus.html" class="  block  text-gray-500  text-sm mr-8">Contact Us</a>
             </li>
           </ul>
      
 </div>
   
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
               <a href="jewerly.html" class="underline-on-hover block py-2 px-3 text-gray-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 text-sm mr-8">Jewerly</a>
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





 


 
 <div class="  min-h-auto flex justify-center relative bg-gray-50   items-center px-4">
  <!-- Left Section (Login) -->
  <div class="max-w-3xl bg-gray-50 p-8  text-gray-800">
      <h2 class="text-xl font-mono mb-4 text-center text-black">CREATE YOUR ACCOUNT</h2>
      <p class="text-xs font-serif text-gray-600 text-center">This section grants you control over your personal details, e-Boutique purchases.</p><br>
      <form name="signin" action="" method="post">
          <div class="mb-0">
              <label for="email" class="block text-sm font-serif text-gray-500" >Email Address *</label><br>
              <div class="custom-input-wrapper">
  <input type="email" class="custom-input" placeholder="Email" aria-required="true" required name="email">
</div><p class="error text-red-600 text-xs"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></p><br>
          </div>
          <div class="mb-12">
              <label for="password"  class="block text-gray-500 text-sm font-serif" >Password * </label><br>
              <div class="custom-input-wrapper">
                <input type="password" class="custom-input" placeholder="Password" required name="password">
            </div>
            
          </div>
          <div class="mb-12">
              <label for="password"  class="block text-gray-500 text-sm font-serif" >Phone number * </label><br>
              <div class="custom-input-wrapper">
                <input type="text" class="custom-input" placeholder="Phone number" required name="phone">
            </div>
            
          </div>
          <div class="mb-12">
              <label for="city"  class="block text-gray-500 text-sm font-serif" >City * </label><br>
              <div class="custom-input-wrapper">
                <input type="text" class="custom-input" placeholder="City" required name="city">
            </div>
            
          </div>
          <div class="mb-12">
              <label for="address"  class="block text-gray-500 text-sm font-serif" >Address * </label><br>
              <div class="custom-input-wrapper">
                <input type="text" class="custom-input" placeholder="Address" required name="address">
            </div>
            
          </div>
          <button type="submit"
              class="w-full bg-black text-white py-2 px-4  hover:bg-gray-900 focus:outline-none focus:bg-gray-900">CREATE MY ACCOUNT</button>
      </form>
  </div>

</div>











<br>
 
 

 <footer class="bg-black">
    <div class="mx-auto max-w-screen-xl space-y-8 px-4 py-16 sm:px-6 lg:space-y-16 lg:px-8">
      <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div>
          <div class="text-teal-600">
          <img src="images\logo-no-background.png" class="h-8">
          </div>
  
          <p class="mt-4 max-w-xs text-white">
            "SARENAY doesn't exist"
          </p>
  
          <ul class="mt-8 flex gap-6">
            <li>
              <a
                href="#"
                rel="noreferrer"
                class="text-white transition hover:opacity-75"
              >
                <span class="sr-only">Facebook</span>
  
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>
  
            <li>
              <a
                href="#"
                rel="noreferrer"
                class="text-white transition hover:opacity-75"
              >
                <span class="sr-only">Instagram</span>
  
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>
  
            <li>
              <a
                href="#"
                rel="noreferrer"
                
                class="text-white transition hover:opacity-75"
              >
                <span class="sr-only">Twitter</span>
  
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                  />
                </svg>
              </a>
            </li>
  
            <li>
              <a
                href="#"
                rel="noreferrer"
                
                class="text-white transition hover:opacity-75"
              >
                <span class="sr-only">GitHub</span>
  
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path
                    fill-rule="evenodd"
                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </li>
  
          
          </ul>
        </div>
  
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-4 ml-16">
          <div>
            <p class="font-medium text-white">Services</p>
  
            <ul class="mt-6 space-y-4 text-sm">
              
  
              <li>
                <a href="#" class="text-white transition hover:opacity-75"> Company Review </a>
              </li>
  
              <li>
                <a href="#" class="text-white transition hover:opacity-75"> Accounts Review </a>
              </li>
  
              <li>
                <a href="#" class="text-white transition hover:opacity-75"> HR Consulting </a>
              </li>
  
              
            </ul>
          </div>
  
          <div>
            <p class="font-medium text-white">Company</p>
  
            <ul class="mt-6 space-y-4 text-sm">
              <li>
                <a href="#" class="text-white transition hover:opacity-75"> About </a>
              </li>
  
              <li>
                <a href="#" class="text-white transition hover:opacity-75"> Meet the Team </a>
              </li>
  
              <li>
                <a href="#" class="text-white transition hover:opacity-75"> Accounts Review </a>
              </li>
            </ul>
          </div>
  
          <div>
            <p class="font-medium text-white">Helpful Link</p>
  
            <ul class="mt-6 space-y-4 text-sm">
              
  
              <li>
                <a href="#" class="text-white transition hover:opacity-75"> FAQs </a>
              </li>
  
            
            </ul>
          </div>
  
          
        </div>
      </div>
  
      <p class="text-base text-white">&copy; 2024. Built with &hearts; by SALMA BAHDAD.</p>
    </div>
  </footer>

  
  <script>
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
    function signinpage(){
      window.location.href = "";
}
    
  </script>









</body>
</html>