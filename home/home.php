

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="../nav/nav.css">
    <title>CPSC431 Project1</title>
    
     
  </head>
  <body>
   <!-- Pop up Sign In -->
   <?php 
    session_start();
    if(isset($_SESSION["loggedin"] )){
        
    ?>
    <style> 
    .modal{
        display: none;
    }
    .main-text{
        display:block;
        
    }

    </style>
    <?php };?>
        <div id="id01" class="modal">   
            <div class="jumbotron col-sm-6 col-xs-12">     
                <form action ="check.php" method="post" enctype="multipart/form-data">
                    <div class="container">
                        <div id="sign">Sign in</div><br/>
                        <div class="form-group">
                                   
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email"    class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                        </div>
                        <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        
                        </div>
                        <?php
                                if(isset($_SESSION["error"])){
                                    $error = $_SESSION["error"];
                                    echo "<small id='passwordHelp' class='form-text text-muted'>".$error."</small><br/>";
                                }

                            ?>
                        <button type="submit" class="btn btn-primary">Submit</button>
                       
                    </div><br/><br/>
                    <div>Don't have an account yet? <a href="../signup/register.php">Sign up here</a></div>
                </form>
            </div>
        </div>


    
        <section class="container-fluid px-0 h-50" id ="img-con"> 
            <div class="row">
                <!-- Navigation -->
                <div id="mySidepanel" class="sidepanel">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="home.php">Home</a>
                    <a href="../menu/menuWeb.php">Menu</a>
                <?php if(isset($_SESSION["loggedin"] )){ ?> 
                <a href="logout.php">Sign Out</a>
                <?php };?> 

                </div>
 
                <button class="openbtn" onclick="openNav()">
                    <div></div>
                    <div class ="openbtn2"></div>
                    <div></div>
                </button>
                <img class ="img-fluid" src="../image/dan-gold-E6HjQaB7UEA-unsplash copy.jpg" >
                <div class ="main-text"> Foodies</div>

            </div>

            <div class ="row" >
                <div class="col-sm-6 p-0 col-xs-12" id ="menu-text">
                    <h4>Menu</h4>
                    <p>
                    As we continue to implement safe social distancing practices, and as local restrictions change, we're offering beer and wine products where available. Certain locations may also have Chili's Presidente® and Patron® Margaritas available for to-go purchases.

Purchases must be made with a food order. Must be 21 or older to purchase. Don’t drink and drive. Available at participating locations only. Additional restrictions may apply. While supplies last (and they're going fast!).
                    </p>
                    <form action="../menu/menuWeb.php" id ="menu-button">
                    <button type="submit" class="btn btn-outline-dark custom" id ="buttonMenu">VIEW MENU</button>
                     </form>
                </div>
                <div class="col-sm-6 p-0 col-xs-12" id="menu-img">
                   
                   <img class="img-fluid"  src="../image/menu.jpg" style="background-size: cover;">
    
                </div>
    
    
            </div>
        </section>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../nav/nav.js"></script>

</body>
</html>


<?php
    unset($_SESSION['error']);


?>