<?php session_start();
$UserId = $_SESSION["UserId"];
$db = mysqli_connect("mariadb","cs431s15","ahShut3I","cs431s15");
if(mysqli_connect_errno()){
    
    echo "<Error: Could not connect to database.<br/>
    Please try again later.</p>";
    exit;
}

$q = "SELECT title, price, img FROM cart WHERE UserId = '$UserId'";
$stmt = $db->prepare($q);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($title, $price, $img); // Add bind_result

while($stmt->fetch()){
  $cartValue[] = array('title' => $title, 'price' => $price, 'img'=>$img); //ex) echo $cartValue[0]['title'];
}
//print_r($cartValue); //print multidimensional array

echo "</br>";
$q2 = "SELECT price FROM cart WHERE UserId = '$UserId'";
$stmt = $db->prepare($q2);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($price); // Add bind_result


$stmt->free_result();
$db->close();

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

<div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>

	<p><?php foreach($cartValue as $value){
	echo $value['title']."	---------------------------------------------------Price: ". $value['price']. "</br>";
	
}?></span>
<!--<span class="price"><?php 
$sum=0;
foreach($cartValue as $price){	
echo $price['price']. "</br>";
$price['price'] = substr($price['price'], 1); 
$sum += $price['price'];

}

?></span>-->
</p>
      <hr>
      <p>Total <span class="price" style="color:black">$ <?php echo $sum; ?></span></p>
    </div>
  </div>
  <form  action ="menu.php"method="post" enctype="multipart/form-data">
                                         
                                         <button type="submit" class= "btn btn-primary" name="submit">Continue Shopping</button>  
                                    </form>
	<form  action ="checkout.php"method="post" enctype="multipart/form-data">
                                         
                                         <button type="submit" class= "btn btn-primary" name="submit">Checkout</button>  
                                    </form>
  </body>