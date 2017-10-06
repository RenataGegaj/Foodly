<?php include 'header.php'; ?>

  <?php
  require 'database.php';

  $message = '';
//check if the username, email and password ahave ben posted
  if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])):

  	// Enter the new user in the database
  	$sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
  	$stmt = $conn->prepare($sql);

    $stmt->bindValue(':username', $_POST['username']);
  	$stmt->bindValue(':email', $_POST['email']);
  	$stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));

  	if( $stmt->execute() ):
  		$message = 'Successfully created new user';
  	else:
  		$message = 'Sorry there must have been an issue creating your account';
  	endif;

  endif;

?>
<!DOCTYPE html>
<html>
<header>
   <nav>
   <div class="nav-wrapper #ffab40 orange accent-2">
   <a href="#" class="brand-logo center">Signup</a>
   <a href="index.php"><i class="material-icons"> &nbsp; &nbsp;arrow_back</i></a>

     <li><a href="login.php">Login</a></li>
     <li><a href="signup.php">Signup</a></li>
     </ul>
   </div>
   </nav>
</header>

<main>

<!--FORM-->
  <form action="signup.php" method="POST">
    <body>
    <div class="container">
      <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
      <?php endif; ?>
    </div>

      <div class="container">
          <div class="input-field col s12">
            <input id="username" type="text" class="validate" name="username">
            <label for="username">User Name</label>
          </div>

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

           <button class="waves-effect waves-light btn">Create Account</button>

               <p>Have an account?<span><a href="login.php"> Log in</a></span></p>
      </div>
    </form>
  </main>
    </body>
  </html>
  <?php include 'footer.php';?>
