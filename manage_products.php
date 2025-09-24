<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$database = "shop-db";
$port =3307;
$conn = mysqli_connect($host, $user, $password, $database,$port);


if (!$conn) {
    header("location:error404.html");
}


if (!isset($_SESSION['admin_connected'])) {
    header("Location: admin.php");
 
}


$sql="SELECT * FROM produits";
$result=mysqli_query($conn,$sql);
echo'<h1>DELETE PRODUCTS<h1>';
echo'<table border="1">

  <tr>
  <th>Name</th>
  <th>reference</th>
  <th>price</th>
  <th>category</th>
  <th>image</th>
  <th>Delete</th>
  </tr>';

while($row=mysqli_fetch_assoc($result)){
  $name=$row['name'];
  $ref=$row['reference'];
  $price=$row['prix'];
  $cat=$row['categorie'];
  $image=$row['image'];


echo'

  <tr>
  <td>'.$name.'</td>
  <td>'.$ref.'</td>
  <td>'.$price.'</td>
  <td>'.$cat.'</td>
  <td>'.$image.'</td>
  <td><form method="POST" >
  <input type="hidden" name="produit_ref" value="'.$row["reference"].'">
  <input  name="delete" type="submit" value="X"></form></td>
  </tr>

  ';

}
 echo'</table>';

 if(isset($_POST['delete'])) {
    if(isset($_POST['produit_ref']))
       $refprod=$_POST['produit_ref'];
     $sql3= "DELETE FROM produits WHERE reference='$refprod'";
     $retour=mysqli_query($conn,$sql3);
    }




if (isset($_POST['add'])) { 
if(!empty($_POST["ref"]) && !empty($_POST["price"]) && !empty($_POST["cat"]) && !empty($_POST["image"]) && !empty($_POST["name"])){
   
    $name=$_POST['name'];
    $ref=$_POST['ref'];
    $price=$_POST['price'];
    $cat=$_POST['cat'];
    $image=$_POST['image'];

    $sql="INSERT INTO produits(reference,prix,categorie,image,name) VALUES ('$ref','$price','$cat','$image','$name')";
    $retour=mysqli_query($conn,$sql);

}
else{
   
    $erreur["fields"]="fill the fields";
}

}

if (isset($_POST['update'])){
      $reference=$_POST['ref1'];
      $sql20="SELECT * FROM produits WHERE reference='$reference'";
      $res=mysqli_query($conn,$sql20);
      if(mysqli_num_rows($res)==0){
        $er['prod']="the product doens't exit !!";
        
     }
     else{
       $name=$_POST['name1'];
       $price=$_POST['price1'];
       $cat=$_POST['cat1'];
       $image=$_POST['image1'];

     $sql50="UPDATE produits SET prix='$price',categorie='$cat',image='$image',name='$name' WHERE reference='$reference'";
     $result=mysqli_query($conn,$sql50);
     }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MANAGE PRODUCTS</title>
  
    
</head>
<body bgcolor="white">
   
    <form method="post" name="add">
    <h5>ADD PRODUCTS<h5>
    <table border='1'>
            <tr>
                <th>Name</th>
                <th>Reference</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
            <tr>
                <td><input name="name" type="text" cols="20" rows="3" placeholder="Name"></td>
                <td><input name="ref" type="text" cols="20" rows="3" placeholder="Reference"></td>
                <td><input name="price" type="text" cols="20" rows="3" placeholder="Price"></td>
                <td><input name="cat" type="text" cols="20" rows="3" placeholder="Category"></td>
                <td><input name="image" type="file" cols="20" rows="3" placeholder="Image"></td>
            </tr>
        
    </table>

    <p class="error text-red-600 text-xs"><?php echo isset($erreur['fields']) ? $erreur['fields'] : ''; ?></p>
    <button  type="submit" name="add" value="submit">Add Product</button>
</form><br>

<h5>UPDATE PRODUCTS</h5>
<form method="post" name="update">
<table border='1'>
            <tr>
            <th>Name</th>
                <th>Reference</th>
                <th>Price</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
            <tr>
                <td><input name="name1" type="text" cols="20" rows="3" placeholder="New Name"></td>
                <td><input name="ref1" type="text" cols="20" rows="3" placeholder="Reference"></td>
                <td><input name="price1" type="text" cols="20" rows="3" placeholder="New Price"></td>
                <td><input name="cat1" type="text" cols="20" rows="3" placeholder="New Category"></td>
                <td><input name="image1" type="file" cols="20" rows="3" placeholder="New Image"></td>
            </tr>
        
    </table>
    <p style="font-size:20px;"><?php echo isset($er['prod']) ? $er['prod'] : ''; ?></p>
    <button  type="submit" name="update" value="update">Update Product</button>
 </form>
<br>
    <a style="font-size:20px;" href="admin_dashboard.php">Return</a>
</body>
</html>
