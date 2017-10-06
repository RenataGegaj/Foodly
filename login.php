 <?php include 'header.php'; ?>

<?php

require 'database.php';
  if(!empty($_POST['email']) && !empty($_POST['password'])):
    //store records that we get from the database
    $records = $conn->prepare('SELECT id,email,password FROM users WHERE email= :email');
    //bind it with the email address that the user submited
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    //store the records
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
      //create a session so that when the user moves from page to page we can tell if the user is still loged in
      $_SESSION['user_id'] = $results['id'];
      //rederect the user to the home page
      header ("Location: userRecipe.php");
    }else {
      $message = 'Sorry, credentials do not match';
    }
endif;
?>

<!DOCTYPE html>
<html>
    <header>
       <nav>
       <div class="nav-wrapper #ffab40 orange accent-2">
       <a href="#" class="brand-logo center">Login</a>

        <a href="index.php"><i class="material-icons"> &nbsp; &nbsp;arrow_back</i></a>

         <li><a href="login.php">Login</a></li>
         <li><a href="signup.php">Signup</a></li>
         </ul>
       </div>
       </nav>
    </header>

<main>
<?php if(!empty($message)): ?>
  <p><?= $message ?></p>
<?php endif; ?>

 <form  method="post" action="login.php">

<body>
    <div class="well">
    <div class="container">
      <div class="container">
        <div class="row"></div>
          <div class="row"></div>

          <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" class="validate" name="email">
            <label for="email">Email</label>
          </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
              <input id="password" type="password" class="validate" name="password">
              <label for="password">Password</label>
            </div>
        </div>

           <button class="waves-effect waves-light btn" type="submit">Log in</button>

           <div class="row"></div>
           <div class="row"></div>
           <div class="row">
             <p>Don't have an account?<span><a href="signup.php"> Sign up</a></span></p>
           </div>

      </div>
    </div>
  </form>
  </div>
</main>
    <?php include 'footer.php';?>
    </body>
  </html>
