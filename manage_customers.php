<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 

session_start();

$host = "";
$user = "";
$password = "";
$database = "";
$port =;
$conn = mysqli_connect($host, $user, $password, $database,$port);


if (!$conn) {
    header("location:error404.html");
}


if (!isset($_SESSION['admin_connected'])) {
    header("Location: admin.php");
}

if (isset($_POST['add'])) { 
    if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["pn"]) && !empty($_POST["city"])&& !empty($_POST["address"])){
       
        $email=$_POST['email'];
        $sql100="SELECT * FROM users WHERE email='$email'";
         $res100=mysqli_query($conn,$sql100);
         if($nbline=mysqli_num_rows($res100)==0){
        $password=$_POST['password'];
        $pn=$_POST['pn'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $sql="INSERT INTO users(email,password,tel,ville,adresse) VALUES ('$email','$password','$pn','$city','$address')";
        $retour=mysqli_query($conn,$sql);
        }
        else{
            $erreur["mail"]="the user already exists";
              
          }
    
        
    
    }
    else{
       
        $erreur["fields"]="fill the fields";
    }
    
    }


//partie delete

$sql="SELECT * FROM users";
$result=mysqli_query($conn,$sql);
echo'<h5>DELETE PRODUCTS<h5>';
echo'<table border="1">

<tr>
<th>Email</th>
<th>Password</th>
<th>Phone NUmber</th>
<th>City</th>
<th>Address</th>
<th>Delete</th>
</tr>';

while($row=mysqli_fetch_assoc($result)){

  $email=$row['email'];
  $password=$row['password'];
  $pn=$row['tel'];
  $city=$row['ville'];
  $address=$row['adresse'];


echo'

  <tr>
  <td>'.$email.'</td>
  <td>'.$password.'</td>
  <td>'.$pn.'</td>
  <td>'.$city.'</td>
  <td>'.$address.'</td>
  <td><form method="POST" >
  <input type="hidden" name="user_email" value="'.$row["email"].'">
  <input  name="delete" type="submit" value="X"></form></td>
  </tr>

  ';

}
 echo'</table>';




 if(isset($_POST['delete'])&&isset($_POST['user_email']) ){
    
       $user_email=$_POST['user_email'];
     $sql3= "DELETE FROM users WHERE email='$user_email'";
     $retour=mysqli_query($conn,$sql3);
    }

//partie UPDATE

    if (isset($_POST['update'])){
        $email=$_POST['email1'];
        $sql20="SELECT * FROM users WHERE email='$email'";
        $res=mysqli_query($conn,$sql20);
        if(mysqli_num_rows($res)==0){
          $er['user']="the user doens't exit !!";
          
       }
       else{
        $password=$_POST['password1'];
        $pn=$_POST['pn1'];
        $city=$_POST['city1'];
        $address=$_POST['address1'];
  
       $sql50="UPDATE users SET password='$password',tel='$pn',ville='$city',adresse='$address' WHERE email='$email'";
       $result=mysqli_query($conn,$sql50);
       }
  }


?>




<h5>ADD CLIENTS<h5>
    <form name="adduser" method="post">
    <table border='1'>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Phone number</th>
                <th>City</th>
                <th>Address</th>
            </tr>
            <tr>

                <td><input name="email" type="email" cols="20" rows="3" placeholder="Email" value="user@gmail.com"></td>
                <td><input name="password" type="password" cols="20" rows="3" placeholder="Password"></td>
                <td><input name="pn" type="text" cols="20" rows="3" placeholder="Phone Number"></td>
                <td><input name="city" type="text" cols="20" rows="3" placeholder="City"></td>
                <td><input name="address" type="text" cols="20" rows="3" placeholder="Address"></td>
            </tr>
        
    </table>

    <p class="error text-red-600 text-xs"><?php echo isset($erreur['fields']) ? $erreur['fields'] : ''; ?></p>
    <p class="error text-red-600 text-xs"><?php echo isset($erreur['mail']) ? $erreur['mail'] : ''; ?></p>
    <button  type="submit" name="add" value="submit">Add Client</button>
</form><br>
<form method="post" name="update">
<table border='1'>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>Phone Number</th>
                <th>City</th>
                <th>Address</th>
            </tr>
            <tr>

                <td><input name="email1" type="text" cols="20" rows="3" placeholder="Email"></td>
                <td><input name="password1" type="text" cols="20" rows="3" placeholder="New Password"></td>
                <td><input name="pn1" type="text" cols="20" rows="3" placeholder="New Phone Number"></td>
                <td><input name="city1" type="text" cols="20" rows="3" placeholder="New City"></td>
                <td><input name="address1" type="text" cols="20" rows="3" placeholder="New Address"></td>
            </tr>
        
    </table>
    <p style="font-size:20px;"><?php echo isset($er['prod']) ? $er['prod'] : ''; ?></p>
    <button  type="submit" name="update" value="update">Update User</button>
 </form>
 <a style="font-size:20px;" href="admin_dashboard.php">Return</a>
</body>
</html>