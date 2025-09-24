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
         <p id="notifs" ></p>
         <!--<button class="text-white font-bold mr-0 ml-11" onClick="del()" id="mybutton" onClick="del()">
             <span class="hover:text-red-700 icon text-2xl text-white font-thin" aria-hidden="true" >X</span>
         </button>-->
     </div>
     </header><br>
<div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
  <div class="px-4 pt-8">
    <p class="text-xl font-medium">Order Summary</p>
    <p class="text-gray-400">Check your items. And select a suitable shipping method.</p>

    <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "shop-db";
$port = 3307;
$conn = mysqli_connect($host, $user, $password, $database,$port);

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

 echo'<div class="flex flex-col rounded-lg bg-white sm:flex-row">
        <img class="m-2 h-24 w-28 rounded-md border object-cover object-center" src="images/'.$image.'"/>
        <div class="flex w-full flex-col px-4 py-4">
          <span class="font-semibold">'.$name.'</span>
          <span class="float-right text-gray-400">'.$cat.'</span>
          <p class="text-lg font-bold">'.$price.'$</p>
        </div>
      </div>
 ';
      }    


?>      

    </div>

    <p class="mt-8 text-lg font-medium">Payment Methods</p>
    <form method="post" class="mt-5 grid gap-6">

      <div class="relative">
        <input class="peer hidden" id="radio_1" type="radio" onclick="afficher()" name="radio" checked />
        <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
        <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_1">
          <img class="w-14 object-contain" src="/images/naorrAeygcJzX0SyNI4Y0.png" alt="" />
          <div class="ml-5">
            <span class="mt-2 font-semibold">Credit/Debit Card Payment</span>
            
          </div>
        </label>
      </div>

      

      <div class="relative">
        <input class="peer hidden" id="radio_2" type="radio" name="radio" onclick="remove()"  />
        <span class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
        <label class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4" for="radio_2">
          <img class="w-14 object-contain" src="/images/oG8xsl3xsOkwkMsrLGKM4.png" alt="" />
          <div class="ml-5">
            <span class="mt-2 font-semibold">Cash on Delivery</span>
           
          </div>
        </label>
      </div> 
      
      
      <br>
 </form>



  </div>
  <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0 h-auto">

    
    <p class="text-xl font-medium">Payment Details</p>
    <p class="text-gray-400">Complete your order by providing your payment details.</p>
    
      
      
     

<div  style="visibility:hidden;" id="divi">

      <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Card Holder</label>
      <div class="relative">
        <input type="text" id="card-holder" name="card-holder" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your full name here" />
        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
          </svg>
        </div>
      </div>
      <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Card Details</label>
      <div class="flex">
        <div class="relative w-7/12 flex-shrink-0">
          <input type="text" id="card-no" name="card-no" class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
              <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
            </svg>
          </div>
        </div>
        <input type="text" name="credit-expiry" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="MM/YY" />
        <input type="text" name="credit-cvc" class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="CVC" />
      </div>

</div>

<div class="">

    
       <form  method="post">
      <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>       
        <input type="text" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 " placeholder="your.email@gmail.com" />
       <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Billing Address</label>
       <input type="text" id="billing-address" name="billing-address" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Street Address" />
       <button type="submit" name="submiti" class="mt-4 mb-8 w-full rounded-md bg-black px-6 py-3 font-medium text-white">Place Order</button>
      </form>

    
    </div>
      
<?php 
$prixtotal=0;
$session1=$_SESSION['user_email'];
$requete100="SELECT * FROM shoppingbag where emailclient='$session1'";
  $resultat10000=mysqli_query($conn,$requete100);


  while($row=mysqli_fetch_assoc($resultat10000)){
     $ref=$row['referenceprod'];
     $requete20000="SELECT * from produits where reference='$ref'";
     $resultat20000=mysqli_query($conn,$requete20000);
     $row=mysqli_fetch_assoc($resultat20000);
     $price=$row['prix'];
     $prixtotal+=$price;}
?>
      <!-- Total -->
      <div class="mt-6 border-t border-b py-2">
        <div class="flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900">Subtotal</p>
          <p class="font-semibold text-gray-900"> <?php echo $prixtotal.'$';
     ?></p>
        </div>
        <div class="flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900">Shipping</p>
          <p class="font-semibold text-gray-900">0$</p>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-between">
        <p class="text-sm font-medium text-gray-900">Total</p>
        <p class="text-2xl font-semibold text-gray-900"> <?php echo $prixtotal.'$';
     ?></p>
      </div>
    </div>

   
   
   
  </div>
 </form>
</div><br>


<header class=" flex relative h-10 items-center justify-center bg-black px-10  font-thin text-xs  text-white sm:px-20 lg:px-20" id="myheader">
        <div id="cont">
         <p id="notifs" ></p>
         <!--<button class="text-white font-bold mr-0 ml-11" onClick="del()" id="mybutton" onClick="del()">
             <span class="hover:text-red-700 icon text-2xl text-white font-thin" aria-hidden="true" >X</span>
         </button>-->
     </div>
     </header>
     <?php 


$host = "localhost";
$user = "root";
$password = "";
$database = "shop-db";
$port = 3307;
$conn = mysqli_connect($host, $user, $password, $database,$port);

/*$sql1 = "ALTER TABLE lignedecommande
ADD CONSTRAINT fk_commande_num
FOREIGN KEY (numcmd) REFERENCES commande(num)
";*/

//mysqli_query($conn,$sql1);

if(isset($_POST['submiti'])){
    
   $email=$_POST['email'];
   
$sql2="INSERT INTO commande(date,emailclient) values (CURDATE(),'$email')";
mysqli_query($conn,$sql2);
$last_command_id = mysqli_insert_id($conn);

$session1=$_SESSION['user_email'];
$requete100="SELECT * FROM shoppingbag where emailclient='$session1'";
$resultat100=mysqli_query($conn,$requete100);
while($row=mysqli_fetch_assoc($resultat100)){
    $ref=$row['referenceprod'];
    $sql3="INSERT INTO lignedecommande(refp,numcmd,quantite) values ('$ref','$last_command_id',1)";
    mysqli_query($conn,$sql3);
}
}


?>
  



     <script>
          function  afficher(){
     document.getElementById('divi').style.visibility="visible";
         }
          function  remove(){
     document.getElementById('divi').style.visibility="hidden";
         }

        </script>





</body>
</html>

