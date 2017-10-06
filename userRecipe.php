<?php include 'header.php'; ?>
<?php require 'database.php';?>
<?php

  if(isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id,username,email,password FROM users WHERE id= :id');
    $records->bindParam('id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = NULL;

    if(count($results)>0){
      $user=$results;
    }
  }
?>
<!--NAVBAR-->
 <body>
   <main>
     <header>
        <nav>
          <div class="nav-wrapper #ffab40 orange accent-2">
            <a href="#home" class="brand-logo center">Foodly</a>
            <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" href="addRecipe.php">
              <i class="material-icons">add</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down"></ul>
            &nbsp; &nbsp;
            <?php if( !empty($user) ): ?>
          Hi <?= ucwords($user['username']); ?>
          |<a href="logout.php"> Logout</a>
          <?php endif; ?>

          </div>
        </nav>
    </header>


<!--CARD-->
<?php if(isset($_SESSION['user_id'])) :?>
<?php $query = $conn->prepare('SELECT recipe_id,username,title,description,ingredients,instructions, image FROM users,recipes WHERE id= :id AND id=user_fk');
 $query->bindParam('id', $_SESSION['user_id']);
 $query->execute();
 $result = $query; ?>


<div class="container">
    <?php  foreach($result as $row): ?>
      <div class="row"></div>
        <div class="row"></div>
          <div class="row"></div>
            <div class="container">
            <div class="col s12 m6 l4">
              <div class="card hoverable">
                <div class="card-image">
                    <img src="uploads/<?= $row['image']; ?>"/>
                    <span class="card-title"><?= ucwords($row['title']); ?></span>
                </div>
                  <div class="card-action">
                    <?php
                  echo '<a href="recipes.php?id='.$row['recipe_id'].'">Read more</a>';
                  ?>
                </div>
              </div>
            </div>
          </div>
      <?php endforeach; ?>
</div>
<?php endif;?>

</main>
    <?php include 'footer.php';?>
  </body>
