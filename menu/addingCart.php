<?php
session_start();
$UserId = $_SESSION["UserId"];
@$db = new mysqli("mariadb","cs431s15","ahShut3I","cs431s15");
if(mysqli_connect_errno()){
    
    echo "<Error: Could not connect to database.<br/>
    Please try again later.</p>";
    exit;
}
$title = $_POST['cartTitle'];
$price = $_POST['cartPrice'];
$img = $_POST['cartImg'];
$description = $_POST['cartDes'];
echo $UserId;
echo $title;
echo $price;
echo $img;
echo $description;


$query = "INSERT INTO cart VALUES(?,?,?,?,?)";
$stmt = $db->prepare($query);
$stmt->bind_param('issss',$UserId,$title,$price,$img,$description);
$stmt->execute();
header('location:menu.php');
?>