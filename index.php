<?php include 'header.php'; ?>

 <body>
      <main>
        <header>
          <link rel="stylesheet" type="text/css"  href="css/style.css">

              <nav>
                <div class="nav-wrapper #ffab40 orange accent-2">
                  <a href="#" class="brand-logo center">Foodly</a>
                   <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="login.php"  style="font-size:19px;">Login</a></li>
                    <li><a href="signup.php" style="font-size:19px;">Signup</a></li>
                  </ul>
                  <ul class="side-nav" id="mobile-demo">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
                    </ul>
                </div>
              </nav>
          </header>


      <!--SLIDER-->
      <div class="slider">
        <ul class="slides">
          <li>
            <img src="img/food.jpg" alt="">
            <div class="caption center-align">
              <h3>Your digital cookbook</h3>
              <h5 class="light grey-text text-lighten-3">Start organizing now</h5>
            </div>
          </li>

          <li>
            <img src="img/food3.jpg" alt="">
            <div class="caption left-align">
              <h3>Enjoy cooking</h3>
              <h5 class="light grey-text text-lighten-3">let foodly memorize</h5>
            </div>
          </li>

          <li>
            <img src="img/food5.jpg" alt="">
            <div class="caption right-align">
              <h3>All your recipes in one place</h3>
            </div>
          </li>
        </ul>
      </div>
      <div class="row"></div>
      <div class="row"></div>


      <!--CARDS-->
      <div class="container">
        <div class="row">

          <div class="col s12 m6">
          <div class="card horizontal">
          <div class="card-stacked">
            <i class="material-icons large center-align" style="color:grey;">restaurant</i>
            <div class="card-content">
              <p style="font-size:16px;">Eliminate stacks of books and piles of paper in the kitchen.
      Create and edit your own recipes.
      Create unlimited categories to organize your recipe library.
      Easily accessible recipes tailored by you!</p>
            </div>
          </div>
        </div>
      </div>


      <div class="col s12 m6">
        <div class="card horizontal">
          <div class="card-stacked">
            <i class="material-icons large center-align" style="color:grey;">devices</i>
            <div class="card-content">
              <p style="font-size:16px;">Plan menus for special events or regular meals.
          Take your device into the kitchen and cook your menu with multiple cooking timers.
          You can peak through your recipes at any time, in any device.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="row">
          <div class="col s12 m6">
              <div class="card horizontal">
                  <div class="card-stacked">
                    <i class="material-icons large center-align" style="color:grey;">assignment</i>
                        <div class="card-content">
                          <p style="font-size:16px;">Organize your week by adding daily meals to your profile.
                      Share your favorite recipes with friends and family, enjoy them together.
                      Scale recipes to make the right amount.</p>
                        </div>
                  </div>
              </div>
          </div>

          <div class="col s12 m6">
              <div class="card horizontal">
                <div class="card-stacked">
                    <i class="material-icons large center-align" style="color:grey;">shopping_cart</i>
                    <div class="card-content">
                      <p style="font-size:16px;">Add recipes, menus and other items to your recipe list.
                  Arrange your shopping list the way you shop in the store.
                  Carry your shopping list with you and add to it in store.</p>
                    </div>
                </div>
              </div>
          </div>
      </div>  
  </div>
      <div class="row"></div>
      <div class="row"></div>
  </main>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.slider').slider();
    });

     $(".button-collapse").sideNav();

</script>

      <?php include 'footer.php';?>

</body>
