<?php
session_start();
$error = "username or password incorrect!";
$email = $_POST['email'];
$password= $_POST['password'];
@$db = new mysqli("mariadb","cs431s15","ahShut3I","cs431s15");
$loggedin ="true";
if(mysqli_connect_errno()){
    
    echo "<Error: Could not connect to database.<br/>
    Please try again later.</p>";
    exit;
}
$encryptpasswd = sha1($password);
$query = "SELECT * FROM user WHERE Email='".$email ." ' and Password = '".$encryptpasswd. "'";

$result = mysqli_query($db,$query);

$row = mysqli_num_rows($result);
$Returnvalue = mysqli_fetch_assoc($result);
if($row==0){
    $_SESSION["error"] = $error;
    header('location:home.php');
   

}else{
    $_SESSION["loggedin"] = $loggedin;
    $_SESSION["UserId"] = $Returnvalue["UserId"];
    header('location:home.php');
    
}
$db->close();
?>