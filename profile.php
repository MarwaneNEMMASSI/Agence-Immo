<?php

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // ... display user dashboard ...
    echo $user_id;
} else {
    header('Location: Connection.php');
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
        <h1>
            My Home
        </h1>
    </header>
    <nav>
        <ul>
            <li><a href="http://localhost/knn/folf1/inde.php"><i class="fa-solid fa-house"></a></i></li>
            <li>
                <a href="http://localhost/knn/folf1/profile.php"><i class="fa-solid fa-user"></i></i></a>
            </li>
            <li>

                <a href="http://localhost/knn/folf1/exit.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </li>

            <li><a href="http://localhost/knn/folf1/ajoute.php"><i class="fa-solid fa-plus"></i></a></li>

        </ul>
    </nav>


    <?php


    $dsn = 'mysql:host=localhost;dbname=gestionnaire';
    $username = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    try {
        $db = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    // Query the database for the first 5 records
    $stmt = $db->prepare('SELECT * FROM clients WHERE id_client = :id LIMIT 5');
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $records = $stmt->fetchAll();

    // Display the records on the page
    foreach ($records as $record) {











        echo '
                     
                    <section class="m-0 mt-5">
                    <div class="d-flex  justify-content-center align-content-center ">
                        <div>
                            <img src="img5.jpg" class="rounded-circle" alt="" width="250px" height="250px">
                        </div>
            
            
                    </div>
            
                    <form method="post" action="profile.php" class="d-flex  justify-content-center align-content-center ">
            
                        <div class="mb-3 w-75">
            
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-sm-5 col-md-6">
                                        <label for="" class="form-label">Nome</label>
                                        <input type="text" class="form-control input" value="' . $record['nom'] . '" name="nom">
            
                                    </div>
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                        <label for="" class="form-label">Prenom</label>
                                        <input type="text" class="form-control input" value="' . $record['prenom'] . '" name="prenom">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-6">
                                        <label for="" class="form-label">Email
                                        </label>
                                        <input type="text" class="form-control input" value="' . $record['email'] . '" name="email">
            
                                    </div>
                                    <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                        <label for="" class="form-label">Téléphone</label>
                                        <input type="text" value="' . $record['telephone'] . '" class="form-control input" name="telephone">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5 col-md-6">
                                        <label for="" class="form-label">Mot de passe</label>
                                        <input type="password" value="' . $record['password'] . '" class="form-control input" name="password">
            
                                    </div>
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                        <label for="" class="form-label">Confirmer le mot de passe</label>
                                        <input type="password" value="' . $record['password'] . '" class="form-control input" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex  justify-content-center align-content-center ">
                                <div>
                                    <input type="submit" class="form-control inpu my-5" name="Update" value="Update">
                                </div>
            
            
                            </div>
                        </div>
                    </form>

            ';
    }






    ?>





    </section>
    <section>
        <h1>Mes annonce</h1>
        <div id="cards">
            <?php
            $stmt = $db->prepare('SELECT * FROM annonce WHERE id_client = :id ');
            $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $records = $stmt->fetchAll();

            // Display the records on the page
            foreach ($records as $record) {
                echo '
            <div style="display: flex; flex-direction:column;">

            <div >
                <form action=" http://localhost/knn/folf1/info.php" method="post" >
                <div class="card" style="width: 15rem;" >
                <img src="img5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">' . $record['titre'] . '</h5>
                  <p class="card-text">' . $record['prix'] . '</p>
                  <p class="card-text">' . $record['adresse'] . '</p>
                  <input type="hidden" name="id"  value="' . $record["id_annonce"] . '">
                  <input type="submit" class="btn btn-outline-primary more" name="modal"  value="more">

                </div>
                    </form>
                    
                    <div style="display: flex; ">
                    <!-- Button trigger modal -->
                    <button type="button" class="p-3 mb-2 btn btn-outline-danger ms-3 me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Supprimer
                    </button>
                    <form action=" http://localhost/knn/folf1/modif.php" method="post" >
                        <input type="hidden" name="id"  value="' . $record["id_annonce"] . '">
                        <input type="submit" class="p-3 mb-2 btn btn-outline-success" name="modifier"  value="Modifier">
                    </form>
                    </div>
                
              </div>
              
              
            </div>
            </div>
                    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Etes-vous sur de vouloir supprimer cette annonce ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="p-3 mb-2 btn btn-outline-secondary" data-bs-dismiss="modal">Non</button>
                <form action=" http://localhost/knn/folf1/suprimer.php" method="post">
                    <input type="hidden" name="id"   value="' . $record["id_annonce"] . '">
                    <input type="submit" class="p-3 mb-2 btn btn-outline-danger ms-3 me-2" name="suprimer"  value="Oui">
                </form>
            </div>
            </div>
        </div>
        </div>
                     
              

            ';
            }
            // Update the client's information
            if (isset($_POST['Update'])) {
                $value1 = $_POST['nom'];
                $value2 = $_POST['prenom'];
                $value3 = $_POST['email'];
                $value4 = $_POST['password'];
                $value5 = $_POST['telephone'];
                $value6 = $user_id;

                try {
                    $stmt = $db->prepare("UPDATE clients SET nom = :value1, prenom = :value2, email = :value3, password = :value4, telephone = :value5 WHERE id_client = :value6");

                    $stmt->bindParam(':value1', $value1);
                    $stmt->bindParam(':value2', $value2);
                    $stmt->bindParam(':value3', $value3);
                    $stmt->bindParam(':value4', $value4);
                    $stmt->bindParam(':value5', $value5);
                    $stmt->bindParam(':value6', $value6);

                    $stmt->execute();
                    header('Location: profile.php');
                    exit;
                } catch (PDOException $e) {
                    echo "Error updating data: " . $e->getMessage();
                }
            }
            // Close connection
            $conn = null;
            ?>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>