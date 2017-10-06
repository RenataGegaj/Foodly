
<?php include 'header.php'; ?>
<?php require 'database.php'; ?>

  <body>
      <header>
          <nav>
            <div class="nav-wrapper c#ffab40 orange accent-2">
              <a href="#" class="brand-logo center">Add recipe</a>
                <ul id="nav-mobile" class="right"></ul>
                 <a class="btn-floating btn-large halfway-fab waves-effect waves-light red" href="userRecipe.php">
                <i class="material-icons">menu</i></a>
            </div>
          </nav>
      </header>
  <main>

  <div class="container">
    <form  method="POST"  enctype="multipart/form-data">

      <div class="container">
        <?php if (!empty($message)): ?>
          <p><?= $message ?></p>
        <?php endif; ?>
        <div class="row input-field col s12">
          <input id="title" type="text" name="title" class="validate">
          <label for="title">Title</label>
        </div>

        <div class="row input-field col s12">
            <textarea id="description" class="materialize-textarea" name="description"></textarea>
            <label for="textarea1">Description</label>
        </div>

        <div class="row input-field col s12 ">
            <input id="ingredients" type="text" name="ingredients" class="validate">
            <label for="ingredients">Ingredients</label>
        </div>

        <div class="row input-field col s12">
            <textarea id="instructions" class="materialize-textarea" name="instructions"></textarea>
            <label for="textarea1">Instructions</label>
        </div>

        <input type="file" name="image">

        <div class="row"></div>

        <div class="container center-align">
           <button class="waves-effect waves-light btn red" type="submit" value="submit" name="submit">Save</button>
        </div>

        <div class="row"></div>

      </div>
    </form>
    <?php

       	$message = '';

       	if ( !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['ingredients']) && !empty($_POST['instructions'])  && isset($_POST['submit'])):

       			$target = "uploads/".basename($_FILES['image']['name']);

       			$image = $_FILES['image']['name'];

       			move_uploaded_file($_FILES['image']['tmp_name'], $target);
       				$sql = "INSERT INTO recipes (title, description, ingredients, instructions, image, user_fk) VALUES (:title, :description, :ingredients, :instructions,:image, :user_fk)";

       					$stmt = $conn->prepare($sql);
       					$stmt->bindParam(':user_fk', $_SESSION['user_id']);
       					$stmt->bindParam(':title', $_POST['title']);
       					$stmt->bindParam(':description', $_POST['description']);
       					$stmt->bindParam(':ingredients', $_POST['ingredients']);
       					$stmt->bindParam(':instructions', $_POST['instructions']);
       					$stmt->bindParam(':image',$_FILES['image']['name']);

       					 if ($stmt->execute()){
       							$message = 'Successfully added recipe';
       						}
                  else{
       							$message = 'Sorry there must have been an issue adding your recipes';
       						     }
       	endif;
    ?>

  </main>
</body>

<?php include 'footer.php';?>
