<?php
    session_start();
    $userError = "Your name is required.";
$emailError = "Your email is required.";
$passwordError = "Your password is required.";
?>
<!DOCTYPE html>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <html>
        <head>
            

        </head>

        <body style="background-image: url('../image/blueBackground.jpg')">
            <form action="signup.php" method="post" enctype="multipart/form-data" >
            <div class="container" style="padding-top:10%;">
            <div class="jumbotron" style="background-color:white;">
             <h2 style="text-align:center;"> Register </h2>
             <?php
             if(isset($_SESSION["error"])){
                                  $error = $_SESSION["error"];
                                  echo "<small id='red' class='form-text text-muted'>".$error."</small>";
                               
                              }
                ?>
                    <div class="form-group ">
                        <label for="username">User name</label>
                        <input type="username" name ="username" class="form-control" id="inputEmail4">
                        
                        <?php
                               if(isset($_SESSION["usererrmsg"])){
                                 
                                    echo "<small id='red' class='form-text text-muted'>Your name is required.</small>";
                                   
                               }
                            
                        ?>
                    </div>
                    <div class="form-group ">
                        <label for="email">Email Address </label>
                        <input type="email" name="email" class="form-control" id="inputAddress">
                        <?php
                                   if(isset($_SESSION["emailerrmsg"] )){
                                   
                                    echo "<small id='red' class='form-text text-muted'>Your email is required.</small>";
                                   }
                        ?>
                    </div>
  
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                    <?php
                              if(isset($_SESSION["passerrmsg"])){
                                  
                                    echo "<small id='red' class='form-text text-muted'>Your password is required.</small>";
                                 
                                }
                                if(isset( $_SESSION['strengthPass'])){
                                    echo  "<small id='red' class='form-text text-muted'>".$_SESSION['strengthPass']."</small>";
                                }

                            
                        ?>

                   
                </div>
             
              
            <button type="submit" class="btn btn-primary">Submit</button>
            
                </div>   
                <div style ="color:white; padding-top: 10%; padding: 10px 0 0 45%;">Already have an account? <a href="../home/home.php">  Sign In</a></div>
            </div> 
        </form>

        </body>

        <style>
            h1{
                text-align: center;
                padding-top:20px;
                padding-bottom: 50px;
            }
            h2{
                padding-bottom: 20px;
            }
        </style>
    </html>

    <?php
    unset( $_SESSION["usererrmsg"]);
    unset( $_SESSION["emailerrmsg"]);
    unset( $_SESSION["passerrmsg"]);
    unset( $_SESSION["error"]);
    unset( $_SESSION['strengthPass']);

    ?>