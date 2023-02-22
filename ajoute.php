<?php

session_start();
if (isset($_SESSION['id'])) {
  $user_id = $_SESSION['id'];
  echo $user_id;
} else {
  header('Location: profile.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a602b3a089.js" crossorigin="anonymous"></script>
  <title>Gestion immobilier</title>
</head>

<body>
  <header>
  <h1><?php echo $id; ?></h1>
  </header>
  <nav>
    <ul>
    <li><a href="http://localhost/knn/folf1/index.php"><i class="fa-solid fa-house"></a></i></li>
      <li> <a href="http://localhost/knn/folf1/profile.php"><i class="fa-solid fa-user"></i></i></a></li>
      <i class="fa-solid fa-right-from-bracket"></i>
    </ul>
  </nav>
  <section>




  <form method="post"   action="ajoute.php" >
      <div class="mb-3 w-75">
        <label for="" class="form-label">Titre</label>
        <input type="text" class="form-control input" name="" >
        <label for="" class="form-label">Prix</label>
        <input type="text" class="form-control input" name="" >
        <label for="" class="form-label">Adresse</label>
        <input type="text" class="form-control input" name=""  >
        <label for="" class="form-label">Type</label>
        <input type="text" class="form-control input" name="" >
        <label for="" class="form-label">Categorie</label>
        <input type="text" class="form-control input" name=""  >
        <label for="" class="form-label">ville</label>
        <input type="text" class="form-control input" name=""  >
        <label for="" class="form-label">Image principale</label>
        <input type="file" class="form-control input" name=""  >
        <label for="" class="form-label">d'auter images</label>
        <input type="file" class="form-control input" name=""  >
        <label for="" class="form-label">Description</label>
        <label for="" class="form-label"></label>
        <textarea class="form-control input" name="" id="" rows="3"></textarea>
        <input type="submit" class="form-control input my-3" name=""  value="Ajouter">
      </div>
      </form>
  </section>
  <section>
    
  </section>






  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>