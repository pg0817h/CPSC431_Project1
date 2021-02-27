<?php

session_start();
$error = "It looks like there's already an account. Choose another username or Email !";

$userError = "Your name is required.";
$emailError = "Your email is required.";
$passwordError = "Your password is required.";
$username=$_POST['username'];
$email= $_POST['email'];
$password = $_POST['password'];

$zero = 0;
$db = mysqli_connect("mariadb","cs431s15","ahShut3I","cs431s15");

if(mysqli_connect_errno()) {

    echo"<p>Error: Could not connect to database.<br/>
    Please try again later.</p>";
    exit;
}



  $uppercase = preg_match('@[A-Z]@',$password);
  $lowercase = preg_match('@[a-z]@',$password);
  $number = preg_match('@[0-9]@',$password);
 
//Check if input is empty
if( trim($_POST['username']) == "" || trim($_POST['email']) == "" ||trim($_POST['password']) == "") {
    
 
    if( trim($_POST['username']) == ""){
        $_SESSION["usererrmsg"] = $userError;
    
    }
    if(trim($_POST['email']) == "" )  {
        $_SESSION["emailerrmsg"] = $emailError;
    
    }   

    if(trim($_POST['password']) == "" ){
        
        $_SESSION["passerrmsg"] = $passwordError;
    
        
    }   
   
   header('location:register.php');
}

// Validate password strength
else if(!$uppercase || !$lowercase || !$number || strlen($password) < 6) {
    $_SESSION['strengthPass'] = 'Password should be at least 6 characters in length and should include at least one upper case letter, one number.';
   header('location:register.php');
}
else {
      
  

    $username = mysqli_real_escape_string($db, $username);
    $email = mysqli_real_escape_string($db, $email);
    $password = mysqli_real_escape_string($db, $password);
    $encryptpasswd = sha1($password);

/* Check if there is duplicated Email or username */

    $query = "SELECT Email,Username FROM user";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($db_userid, $db_email);
   
  
  
    while($stmt->fetch()){
        $duplicated[] = array('Email' => $db_email, 'Username'=>$db_userid);
    }


    foreach($duplicated as $check){
        $db_userid= $check['Email'];
        $db_email = $check['Username'];
        if($db_userid == $username || $db_email == $email){
            $_SESSION["error"] = $error;
        
           header('location:register.php');


        }
    }


    if(empty( $_SESSION["error"]) && empty($_SESSION['strengthPass'])){
    $query = "INSERT INTO user VALUES(?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('isss',$zero,$username,$email,$encryptpasswd);
    $stmt->execute();
            if($stmt->affected_rows > 0){
                echo "<p>Info inserted into the database</p>";
               header('location:../home/home.php');
            }   else {
                echo "<p>An error has occurred.<br/>
                    The item was not added.</p>";
                
            }

    
    }


}
?>