<?php 
    include('includes/function.php');
    $myfunction=new functions; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="vendor/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="vendor/css/grid.css" />
    <link rel="stylesheet" type="text/css" href="vendor/css/ionicons.min.css" />
    <link rel="stylesheet" type="text/css" href="vendor/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/customer.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/queries.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Fine Dine | Customers</title>
</head>

<body>
    <header id="home">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-fixed" >
          <a href="#home">
            <img src="resources/img/logo.png" alt="logo" class="logo-black">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 main-nav js--main-nav">
                    <li class="nav-item active">
                        <a href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a href="#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a href="#branches">Our Branches</a>
                    </li>
                </ul>

            </div>
        </nav>
        <div class="hero-text-box">
            <img src="resources/img/logo-white.png" alt="logo" class="logo">
            <h1 class="text-white">FINE-DINE RESTAURANT <br> FINE FOOD — DINE GOOD</h1><br>
            <h4 class="text-white">The restaurant at your reach</h4><br> <br>
            <a class="btn btn-full" href="#menu">I'm hungry</a>
            <a class="btn btn-ghost" href="#branches">Show me more</a>
        </div>
    </header>

    <section class="section-features js--section-features container" id="features">
        <div class="align-items-center">
        <i class="ion-happy-outline icon-big"></i>
            <h2 class=""> FINE FOOD &mdash;DINE GOOD </h2>
            <p class="long-copy text-center">
                Hello, welcome to FINE-DINE, the premium restaurant at your reach.
                <br />Feeling hungry, and in a hurry? — Great choice! <br /> We got your tummy, with the healthy and mouth-watery foods we offer.
            </p>
        </div>
<br>
        <div class="row ">
            <div class="col-sm-6 col-md-3 span-1-of-4 box">
                <i class="ion-ios-clock-outline icon-big"></i>
                <h3>Operation Hours</h3>
                <p>
                   We are happy to serve you from 6am to 9pm. 
                </p>
            </div>
            <div class="col-sm-6 col-md-3 span-1-of-4 box">
                <i class="ion-ios-bell-outline icon-big"></i>
                <h3>Ready in 10 minutes</h3>
                <p>
                    You're only 10 minutes away from your delicious and super healthy meals. We work with the best chefs in each town to ensure that you're 100% FINE DINING with us.
                </p>
            </div>
            <div class="col-sm-6 col-md-3 span-1-of-4 box">
                <i class="ion-ios-nutrition-outline icon-big"></i>
                <h3>100% Healthy</h3>
                <p>
                    All our vegetables are fresh, organic and local. Animals are raised without added hormones or antibiotics. Good for your health, the environment, and it also tastes better!
                </p>
            </div>
            <div class="col-sm-6 col-md-3 span-1-of-4 box">
                <i class="ion-ios-cart-outline icon-big"></i>
                <h3>Give Suggestions</h3>
                <p>
                   Craving for another menu? feel free to give us new suggestions to help us improve our service and add more menu. <br> FINE TO SERVE YOU!
                </p>
            </div>
        </div>
    </section>

    <section class="section-meals">
        <ul class="meals-showcase clearfix">
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/1.jpg" alt="Korean bibimbap with egg and vegetables" />
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/2.jpg" alt="Simple italian pizza with cherry tomatoes" />
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/3.jpg" alt="Chicken breast steak with vegetables" />
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/4.jpg" alt="Autumn pumpkin soup" />
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/5.jpg" alt="Paleo beef steak with vegetables" />
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/6.jpg" alt="Healthy baguette with egg and vegetables" />
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/7.jpg" alt="Burger with cheddar and bacon" />
                </figure>
            </li>
            <li>
                <figure class="meal-photo">
                    <img src="resources/img/8.jpg" alt="Granola with cherries and strawberries" />
                </figure>
            </li>
        </ul>
    </section>

    <section class="section-steps js--section-steps" id="menu">
      <div class="container">
        <div class="text-center">
            <h2>Today's Available Menu &mdash; DINE WITH US</h2>
        </div>
        <br><br>
        <div class="container justify-content-center">
          <div class="row">
       
              <?php 
                $connection = $myfunction->openConnection();
                $statement = $connection->prepare("SELECT * FROM product_table ORDER BY category_name ASC");
                $statement->execute();
                $product = $statement->fetchAll();
                $productCount = $statement->rowCount();
                foreach($product as $newProduct) {
              ?>
 <div class=" col-lg-3 col-md-3 col-sm-5">
              <form method="POST">
                <div class="card border border-transparent mb-2">	
                  <img class="card-img-top" style="height:8rem;" src="<?php echo $newProduct['product_image'] ?>" alt="Card image cap">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <h5 style="font-size:0.95rem;" class="card-title prod_name text-uppercase font-weight-bold text-primary" name="menu"><?php echo $newProduct['product_name'] ?></h5>
                        <input type="hidden" name="menu"value="<?php echo $newProduct['product_name'] ?>">
                      </div>
                      <div class="col-4">
                        <span class="prod_price float-right text-danger" name="price">
                        ₱<?php echo $newProduct['product_price'] ?>
                          <input type="hidden" name="price"value="<?php echo $newProduct['product_price'] ?>">
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
               
              </form>
              </div>
              <?php
                }
              ?>
              
            </div>
        </div>
      </div>
    </section>
    <section class="section-cities container" id="branches">
        <div class="">
            <h2 class="text-center">Stop by in one of our branches near you</h2>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-3 col-sm-6 span-1-of-4 box">
                <img src="https://www.travelingcebu.com/images/colon1.jpg" style="height:12rem;" alt="Lisbon" class="city" />
                <h3>COLON STRT, CEBU CITY</h3>
                <div class="city-feature">
                    <i class="ion-android-person icon-small"></i> 1600+ happy eaters
                </div>
                <div class="city-feature">
                    <i class="ion-android-restaurant icon-small"></i> 20+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="#">@fine-dine_cc</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 span-1-of-4 box">
                <img style="height:12rem;"  src="https://img.theculturetrip.com/wp-content/uploads/2018/11/gerardas.jpg" alt="Berlin" class="city" />
                <h3>TAGBILARAN, BOHOL</h3>
                <div class="city-feature">
                    <i class="ion-android-person icon-small"></i> 2300+ happy eaters
                </div>
                <div class="city-feature">
                    <i class="ion-android-restaurant icon-small"></i> 20+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="#">@fine-dine_tb</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 span-1-of-4 box">
                <img style="height:12rem;"  src="https://media-cdn.tripadvisor.com/media/photo-s/17/15/73/5e/cosmic.jpg" alt="san-francisco" class="city" />
                <h3>MAKATI CITY MANILA</h3>
                <div class="city-feature">
                    <i class="ion-android-person icon-small"></i> 3700+ happy eaters
                </div>
                <div class="city-feature">
                    <i class="ion-android-restaurant icon-small"></i> 60+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="#">@fine-dine_mc</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 span-1-of-4 box">
                <img style="height:12rem;" src="https://cf.bstatic.com/images/hotel/max1024x768/176/176318109.jpg" alt="London" class="city" />
                <h3>METRO MANILA</h3>
                <div class="city-feature">
                    <i class="ion-android-person icon-small"></i> 1200+ happy eaters
                </div>
                <div class="city-feature">
                    <i class="ion-android-restaurant icon-small"></i> 50+ top chefs
                </div>
                <div class="city-feature">
                    <i class="ion-social-twitter icon-small"></i>
                    <a href="#">@fine-dine_mm</a>
                </div>
            </div>
        </div>
    </section>
    <footer>
      <div class="row">
        <div class="col span-1-of-2">
          <ul class="footer-nav">
            <li><a href="#">About us</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Press</a></li>
            <li><a href="#">IOS App</a></li>
            <li><a href="#">Android App</a></li>
          </ul>
        </div>
        <div class="col span-1-of-2">
          <ul class="social-links">
            <li>
              <a href="#"><i class="ion-social-facebook"></i></a>
            </li>
            <li>
              <a href="#"><i class="ion-social-twitter"></i></a>
            </li>
            <li>
              <a href="#"><i class="ion-social-googleplus"></i></a>
            </li>
            <li>
              <a href="#"><i class="ion-social-instagram"></i></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="row">
        <p>Copyright &copy; 2019 by Omnifood. All rights reserved</p>
      </div>
    </footer>

    <script src="resources/js/script.js"></script>
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
  </body>
</html>
