<?php include 'header.php'; ?>
<?php require 'database.php'; ?>

<?php
$query = $conn->prepare('SELECT recipe_id,title,description,ingredients,instructions,image FROM recipes WHERE recipe_id= :recipe_id');
$query->execute(array(':recipe_id' => $_GET['id']));
$result = $query;
$result = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <header>
      <nav>
        <div class="nav-wrapper #ffab40 orange accent-2">
          <a href="#" class="brand-logo center"><?= ucwords($result['title']); ?></a>
          <a href="userRecipe.php"><i class="material-icons"> &nbsp; &nbsp;arrow_back</i></a>
        </div>
      </nav>
  </header>

<body>
    <main>
      <div class="container">
        <ul class="collection with-header center-align">
            <li class="collection-header">
                <?php
                $img = $result['image'];
                  echo "<div id='img_div'>";?>
                    <div class=" container align-center">
                  <img class="materialboxed z-depth-4" width="600" height="500" src="uploads/<?= $img; ?>"/>
                </div>
                  <?= "</div>" ?>
              </li>
              <li class="collection-header"><h4>Description</h4>
                <?= $result['description']; ?></li>

              <li class="collection-header"><h4>Ingredients</h4>
                <?= $result['ingredients']; ?></li>

              <li class="collection-header"><h4>Instructions</h4>
                <?= $result['instructions']; ?></li>
            </ul>
      </div>

      </main>
   <?php include 'footer.php';?>
   </body>
 </html>
