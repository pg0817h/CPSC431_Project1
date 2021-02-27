
<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../menu/menu.css">
    <link rel="stylesheet" type="text/css" href="../nav/nav.css">
    <title>CPSC431 Project1</title>
    
     
  </head>
  <body>
<style>
.modalStyle{
    display:block;
}
</style>
   <?php 
   $menu = array();
/*  Getting menu details from menuWeb.php*/
   $menu['image'] = array();
   $menu['title'] = array();
   $menu['des'] = array();
   $menu['price'] = array();
    $menu['image'] =  $_SESSION["content"]['image'];
    $menu['title'] =  $_SESSION["content"]['title'];
    $menu['des'] =  $_SESSION["content"]['des'];
    $menu['price'] =  $_SESSION["content"]['price'];

  
    ?>
        
       
        <div class="container-fluid px-0" id ="img-con">
            <section>
                <header class="inner-page">
                    <div class ="row" style="height:80px;">
                        <!-- Navigation -->
                            <div class = "col-md-4" style="padding-left:0px;">
                                <div id="mySidepanel" class="sidepanel">
                                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                    <a href="../home/home.php">Home</a>
                                    <a href="../menu/menu.php">Menu</a>
                                    <?php if(isset($_SESSION["loggedin"] )){ ?> 
                                    <a href="../home/logout.php">Sign Out</a>
                                    <?php };?> 

                                </div>
                                <button class="openbtn" onclick="openNav()">
                                    <div></div>
                                    <div class ="openbtn2"></div>
                                    <div></div>
                                </button>



                                
                            </div>
                            <div class="col-md-4 col-sm-6"><img id ="logo" src="../image/logo.png"></div>
                           <div class ="col-md-4 col-xs-12 pull-right right-button" style="height:80px; padding-left:10%;">
                               
                                    <!-- <a type="button" href="cart.php" class="btn btn-outline-light btn-lg btn-block" style=" height:45px; margin-top:16px; width:180px; ">CART</a> -->
                                    <a type="button" href="cart.php" id ="cartBtn"style="border: 2px solid #fff; letter-spacing:2px; transition:0.3s; text-transform:uppercase; float:right; padding: 5px 40px 3px; margin-top:20px;">CART</a>
                                 </div>

                           
                    </div>
                        
                </header>
            </section>
            <section class ="panel" style="height: 600px;">
                <div class="row" style="height:600px;">
                     <div class="col-sm-6 col-xs-12" style = "background:url('../image/menuburger.jpg') no-repeat center top; background-size:cover;"id ="menu-bac">
                    
        
                   
                      
                    
                    
                    </div>
                
                    <div class=" col-sm-6 col-xs-12 left-content verticalcenter" id ="menu2">
                
                        <h2 class ="main-text"> MENU</h2>
                        <p>The mission is simple: serve delicious,</p>
                        <p> affordable food that guests will want to return to week after week</p>
                    </div>
                   

                </div>
             </section>

              <!-- Menu Selection Tab -->
            <ul class="nav nav-tabs" id = "menu-tabs" role="tablist" tabindex="-1" >
               <form method="post" action="menuWeb.php" id ='formId'>
                   <input type="hidden" id="myField" name="foo" value="" />
                </form>
                
           
                    <li class="nav-item col-md-2 col-sm-12 col-xs-12">
                        <a data-toggle = "tab" class="nav-link" id ="menuTab" >Appetizers </a>
                    </li>
                    <li class="nav-item col-md-2 col-sm-12 col-xs-12">
                        <a data-toggle = "tab" class="nav-link" id = "menuTab">Big Mouth Burgers</a>
                    </li>
                   
                    <li class="nav-item col-md-2 col-sm-12 col-xs-12">
                        <a data-toggle = "tab" class="nav-link" id = "menuTab"  >RibS&Steaks</a>
                    </li>
                    <li class="nav-item col-md-2 col-sm-12 col-xs-12">
                        <a data-toggle = "tab" class="nav-link" id = "menuTab" >Fajitas</a>
                    </li>
                    <li class="nav-item col-md-2 col-sm-12 col-xs-12">
                        <a data-toggle = "tab" class="nav-link" id = "menuTab" style ="letter-spacing: 0.05em; word-wrap: break-word;" >Salads,Soups&Chili</a>
                    </li>
                  
                    <li class="nav-item col-md-2 col-sm-12 col-xs-12">
                        <a data-toggle = "tab" class="nav-link" id ='menuTab' >Desserts</a>
                    </li>
                
                </ul>


        

<!-- card container -->
                <div id = 'container' class="row">
                <div class="col-6 col-sm-12 col-xs-12" id="card">
                <div class="card h-100"  >
                    <div class="row no-gutters">
                        <div class="col-md-4 ">
                            <img src="" class="card-img" style="height:100%; " id ="img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body" id ="content">
                                <h5 class="card-title" id = "title"></h5>
                                    <p class="card-text" id = "text" ></p>
                                    <p class="card-text" id = "price"></p>
                                    
                 
                                    <!-- <form  action ="#"method="post" enctype="multipart/form-data"> -->
                                         <input type ="hidden" id="custId" name="custId" >
                                         <button type="submit" class= "btn btn-primary" id ="detailButton"name="submit">Submit</button>  
                                    <!-- </form> -->
                                        <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                            </div>
                        </div>
                    </div>
                </div>
      
                </div>
                </div>
   
        
                </div>

                <div class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <img src="" id="modalImg" style="width:100%"/>
                          
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           <strong> <div id="modal-title" style="font-size:23px;"></div></strong>
                           <div id="modal-price"></div>
                            <p id ="modal-des"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id ="addCart" type ="submit">Add to cart</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id = "closeButton">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="addingCart.php" id ='formCart'>
                   <input type="hidden" id="cartTitle" name="cartTitle" value="" />
                   <input type="hidden" id="cartDes" name="cartDes" value="" />
                   <input type="hidden" id="cartPrice" name="cartPrice" value="" />
                   <input type="hidden" id="cartImg" name="cartImg" value="" />

                  
                </form>


        <script>  
                
                var mulArray =  <?php echo json_encode($menu, JSON_PRETTY_PRINT)?>;
               


                var element = document.getElementById("card");
            
              
               
            for(var i =0; i < mulArray.title.length; i++){
                var all = document.querySelectorAll("[id='card']");
                var clone = element.cloneNode(true);
                // get the size of the inner array
                var innerArrayLength = Object.keys(mulArray).length;

                 // loop the inner array
                    
                    var imgValue = mulArray.image[i];
                    var titleValue = mulArray.title[i];
                    var textValue = mulArray.des[i];
                    var priceValue = mulArray.price[i];
                    all[i].querySelector('#img').src = imgValue;
                    all[i].querySelector('#title').innerHTML =titleValue ;
                    all[i].querySelector('#text').innerHTML = textValue;
                    all[i].querySelector('#price').innerHTML = priceValue;

        

          
                    if(i+1 !== mulArray.title.length){
                     document.querySelector('#container').appendChild(clone);
                    }
            }
            //Menu detail window
            let detailPrice;
            let detailTitle;
            let detailDescription;
            let detailImg;


            var all = document.querySelectorAll("[id='card']");
                var allButton = document.querySelectorAll("[id='detailButton']");
            
            for(let i =0; i <mulArray.title.length; i++){
               
     
                allButton[i].addEventListener("click",function(){
                    document.querySelector('.modal').classList.toggle("modalStyle");
                    
                   let detailPrice = all[i].querySelector('#price').innerText;
                   let detailTitle = all[i].querySelector('#title').innerText;
                   let detailDescription = all[i].querySelector('#text').innerText;
                   let detailImg = all[i].querySelector('#img').src;
                   
                   document.querySelector('#modalImg').src = detailImg;
                   document.querySelector('#modal-title').innerHTML = detailTitle;
                   document.querySelector('#modal-des').innerHTML = detailDescription;
                   document.querySelector('#modal-price').innerHTML = detailPrice;

                   document.querySelector('#addCart').addEventListener("click",function(){
                        

                    document.querySelector('#cartTitle').value= detailTitle;
                    document.querySelector('#cartPrice').value= detailPrice;
                    document.querySelector('#cartDes').value= detailDescription;
                    document.querySelector('#cartImg').value= detailImg;
                    document.getElementById('formCart').submit();
                    })
                })
              
            }


            document.querySelector('#closeButton').addEventListener("click",function(){
                document.querySelector('.modal').classList.toggle("modalStyle");
            })
         


            var inputLink = document.getElementById('custId');
           
            console.log("custId" + inputLink);


            var nameField = document.querySelectorAll("a#menuTab.nav-link");
          
         
           
            var fields = document.getElementById('myField');
            var tabToggle = document.getElementById('menuTab');
            for(var i =0; i < nameField.length; i++){
                
                nameField[i].addEventListener('click',function(i) {
   
            
                 tabToggle.classList.toggle('active');
                    var titleLink = nameField[i].innerText.toLowerCase();
                    titleLink = titleLink.replace(/(&)|(,)|( )/g,'-');
                    titleLink = titleLink.slice(0,titleLink.length);
                    fields.value = titleLink;
                    
                    console.log(titleLink);
                    document.getElementById('formId').submit();
                   
                }.bind(this,i));
            }
           
        </script>
           
        
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../nav/nav.js"></script>

</body>
</html>

