<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/w3css.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
    
    
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
    
</head>

<body class="home">
    
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand"  style="color:white;" href="index.php"> Online Food Ordering System</a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php" style="color:white;">Home <span class="sr-only">(current)</span></a> </li>                            
                           
							<?php
						if(empty($_SESSION["user_id"])) // if user is not login
							{
								echo '<li class="nav-item"><a href="login.php"  style="color:white;" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php"  style="color:white;" class="nav-link active">Register</a> </li>';
							}
						else
							{

									
									echo  '<li class="nav-item"><a href="your_orders.php"  style="color:white;" class="nav-link active">My Orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php"  style="color:white;" class="nav-link active">Logout</a> </li>';
							}

						?>
							 
                        </ul>
						 
                    </div>
                </div>
            </nav>

        </header>

        <section class="hero bg-image" data-image-src="images/kit.jpeg">
            <div class="hero-inner">
                <div class="container text-center hero-text font-black">
                    <h1 style="color:lime;">Order Food and Get it Delievered</h1>
                    
                    <div class="banner-form">
                        <form class="form-inline">
                          
                        </form>
                    </div>
             <!--here-->
             
                </div>
            </div>
      
        </section>
      
      
	  
	
     
        <section class="popular">
            <div class="container ">
                <div class="title text-xs-center m-b-30">
                <form>
                    <input type="search" size="50" placeholder="search a dish" style="border-radius:12px;border:1px solid gray;padding-left:12px;font-size:15px;" onkeyup="showResult(this.value)">
                    <div id="livesearch" style="border:none;" ></div>
                </form>
                    <h2><b>Available Dishes</b></h2>
                </div>
                <div class="row">
						<?php 					
						$query_res= mysqli_query($db,"select * from dishes LIMIT 8"); 
                                while($r=mysqli_fetch_array($query_res))
                                {
                                        
                                    echo '  <div style="margin:12px;width:31%;border-radius:25px;" class="col-xs-12 col-sm-6 w3-card-4 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                                <div style="border-radius:12px;" class="figure-wrap w3-card-4 bg-image" data-image-src="admin/Res_img/dishes/'.$r['img'].'"></div>
                                                <div class="content">
                                                    <h5><a href="dishes.php?res_id='.$r['rs_id'].'">'.$r['title'].'</a></h5>
                                                    <div class="product-name">'.$r['slogan'].'</div>
                                                    <div class="price-btn-block"> <span class="price">Ksh '.$r['price'].'</span> <a href="dishes.php?res_id='.$r['rs_id'].'" style="background-color:blue;color:white" class="btn w3-card-4 pull-right">+</a> </div>
                                                </div>
                                                
                                            </div>
                                    </div>';                                      
                                }	
						?>
                </div>
            </div>
        </section>       
      
        <footer class="footer">
            <div class="container">
                
          
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Payment Options</h5>
                            <ul> 
                                <li>
                                    <a href="#"> <img src="images/mpesa.png" style="width:35px;height:25px;" alt="M-pesa"> </a>
                                </li>
                                
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Address</h5>
                                    <p>Technical University of Mombasa, Mombasa</p>
                                    <h5>Phone: 0700000000</a></h5> </div>
                                    <p>Thank you for choosing to order with us</p>
                    </div>
                </div>
          
            </div>
        </footer>
    
    

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>