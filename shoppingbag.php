<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
   










     

<header class="flex relative h-10 items-center justify-cente px-10  font-thin text-xs  text-white sm:px-20 lg:px-20" id="myheader">
   <div class="absolute  top-8 inset-x-0 flex justify-center items-center ">
       <a href="home.php"><img src="images/serenaylogo.png" class="h-14"></a>
   </div>
</header>

<div class="relative">
   <p class="font-mono mt-14 ml-24 text-3xl">SHOPPING BAG</p><br>
   <div class="bg-gray-50 w-1/2 h-16 ml-24 py-5 px-4">
     <p class="font-light text-lg">bla bla bla bla bla ..................</p>
   </div><br>
</div>

<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "shop-db";
$port = 3307;
$conn = mysqli_connect($host, $user, $password, $database,$port);


   if(!isset($_SESSION['user_email'])){
         
     if(isset($_SESSION['panier'])){
      foreach ($_SESSION['panier'] as $item) {
              
         $requete80="SELECT * FROM produits where reference='$item'";
         $res=mysqli_query($conn,$requete80);
         $row=mysqli_fetch_assoc($res);
        
            $price=$row['prix'];
            $cat=$row['categorie'];
            $image=$row['image'];
            $name=$row['name'];
          
echo '
   <div class="bg-gray-50 flex h-446 w-1/2 ml-24  py-4 "> 

    <div class="ml-4">

      <img src="images/'.$image.'" class="h-36 w-28">
    </div>

    <div class="flex flex-col justify-center ml-6">
    <form method="post" action="">
    <button type="submit" name="deletefromcart" value="'.$item.'" class="pl-96 pt-0    text-gray-500 rounded">X</button>
    </form>
    
       <p class="mb-2">  '.$name.'</p>
       <p class="mb-2 font-extralight">'.$cat.'</p>
       <p class="font-extralight">'.$price.'$</p>
       
    </div>
   </div><br>';
   }}}
   else{
     
      $session1=$_SESSION['user_email'];
      $requete100="SELECT * FROM shoppingbag where emailclient='$session1'";
      $resultat100=mysqli_query($conn,$requete100);
      while($row=mysqli_fetch_assoc($resultat100)){
          $ref=$row['referenceprod'];
          $requete200="SELECT * from produits where reference='$ref'";
          $resultat200=mysqli_query($conn,$requete200);
          $row=mysqli_fetch_assoc($resultat200);
          $price=$row['prix'];
          $cat=$row['categorie'];
          $image=$row['image'];
          $name=$row['name'];
echo '
   <div class="bg-gray-50 flex h-446 w-1/2 ml-24  py-4 "> 

    <div class="ml-4">

      <img src="images/'.$image.'" class="h-36 w-28">
    </div>
    <div class="flex flex-col justify-center ml-6"> 
     <form method="post">
    <button type="submit" name="deletefromcart" value="'.$ref.'" class="pl-96 pt-0    text-gray-500 rounded">X</button>
    </form>
    <p class="mb-2">  '.$name.'</p>
       <p class="mb-2 font-extralight">'.$cat.'</p>
       <p class="font-extralight">'.$price.'$</p>
       
    </div>
   </div><br>';

      }

   }
   
   if(isset($_POST['deletefromcart'])){
      
      if(!isset($_SESSION['user_email'])){


$index = array_search($_POST['deletefromcart'],$_SESSION['panier']);
if ($index !== false) {
    unset($_SESSION['panier'][$index]);
}

// Re-indexer le tableau après suppression
$_SESSION['panier'] = array_values($_SESSION['panier']);

      }
      else{
         $refe=$_POST['deletefromcart'];
          $requete5000="DELETE FROM shoppingbag where referenceprod='$refe'";
          mysqli_query($conn,$requete5000);
      }
   }
?>

<?php 
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "shop-db";
        $port = 3307;
        $conn = mysqli_connect($host, $user, $password, $database,$port);
           $prixtotal=0;
        if(isset($_SESSION['user_email'])){
           $session1=$_SESSION['user_email'];
      $requete100="SELECT * FROM shoppingbag where emailclient='$session1'";
            $resultat10000=mysqli_query($conn,$requete100);


            while($row=mysqli_fetch_assoc($resultat10000)){
               $ref=$row['referenceprod'];
               $requete20000="SELECT * from produits where reference='$ref'";
               $resultat20000=mysqli_query($conn,$requete20000);
               $row=mysqli_fetch_assoc($resultat20000);
               $price=$row['prix'];
               $prixtotal+=$price;
        }}
        else{
         if(isset($_SESSION['panier'])){
            foreach ($_SESSION['panier'] as $item) {
                    
               $requete30000="SELECT * FROM produits where reference='$item'";
               $res=mysqli_query($conn,$requete30000);
               $row=mysqli_fetch_assoc($res);
              
                  $price=$row['prix'];
                  $prixtotal+=$price;
        }}}
?>


</div>
</div>
 <!-- Nouvelle div à droite --> 
     <div class="bg-gray-50 w-1/3 ml-auto mr-24 border border-black px-6">
     <p class="font-mono text-lg">SUBTOTAL :<p class="px-0">
     <?php echo $prixtotal.'$';
     ?>
     
     </p></p>
     <p class="font-extralight text-sm  text-gray-500">incl. VAT</p><br>
     <form method="post">
     <button name="proceed" class="bg-black text-white w-96">PROCEED TO CHECKOUT</button>
     </form>
     <br><br></div>

     <form method="post">
     <button name="return" class="bg-gray-100 text-black w-56 h-24" >Return To Shop</button>
      </form>

     <br>
     <?php 
     
     if(isset($_POST['proceed'])){
      if(isset($_POST['user_email'])){
      header('location:checkout.php');
     }
    else{
      header('location:login.php');
    }
    }
     ?>
 <?php 
     if(isset($_POST['return'])){
      header('location:jewerly.php');
     }
     ?>
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
</body>
</html>