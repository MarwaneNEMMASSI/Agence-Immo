<?php
    session_start();
    $id_session = session_id();
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

    <?php echo $id_session;?>
    <?php if(!isset($_SESSION["Logged_User_ID"])): ?>
    <header>
        <h1>
            My Home
        </h1>

    </header>

    <?php else: ?>
    <header>
        <h1>
            My Home
        </h1>
            <span> <?php echo $_SESSION["Logged_User_email"]?></span>         
    </header>
    <?php endif ?>

    <nav>
        <ul>
            <li><a href="index.php"><i class="fa-solid fa-house"></a></i></li>
            <li>
                <a href="profile.php"><i class="fa-solid fa-user"></i></i></a>
            </li>
            <li>
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
            <li><a href="ajoute.php"><i class="fa-solid fa-plus"></i></a></li>

        </ul>
    </nav>


    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestionnaire";
            // Créez une connexion
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Vérifiez la connexion
            if (!$conn) {
                die("Connexion échouée : " . mysqli_connect_error());
            }


            $sql = "SELECT * FROM clients WHERE `id_client`=1 ";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

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
                                        <input type="text" class="form-control input" value="'.$row['nom'].'" name="">
            
                                    </div>
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                        <label for="" class="form-label">Prenom</label>
                                        <input type="text" class="form-control input" value="'.$row['prenom'].'" name="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-5 col-lg-6">
                                        <label for="" class="form-label">Email
                                        </label>
                                        <input type="text" class="form-control value="'.$row['email'].'" input" name="">
            
                                    </div>
                                    <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                                        <label for="" class="form-label">Téléphone</label>
                                        <input type="text" value="'.$row['telephone'].'" class="form-control input" name="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5 col-md-6">
                                        <label for="" class="form-label">Mot de passe</label>
                                        <input type="password" value="'.$row['password'].'" class="form-control input" name="">
            
                                    </div>
                                    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                        <label for="" class="form-label">Confirmer le mot de passe</label>
                                        <input type="password" value="'.$row['password'].'" class="form-control input" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex  justify-content-center align-content-center ">
                                <div>
                                    <input type="submit" class="form-control inpu my-5" name="" value="Update">
                                </div>
            
            
                            </div>
                        </div>
                    </form>

            ';
                }
            } else {
                echo "0 résultats";
            }






            ?>
    




    </section>
    <section>
        <h1>Mes annonce</h1>
        <div id="cards">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gestionnaire";
            // Créez une connexion
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Vérifiez la connexion
            if (!$conn) {
                die("Connexion échouée : " . mysqli_connect_error());
            }


            $sql = "SELECT * FROM annonce WHERE `id_client`=1 ";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                    echo '
                     
                <form action=" http://localhost/knn/folf1/info.php" method="post" >
                <div class="card" style="width: 15rem;" >
                <img src="img5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">' . $row['titre'] . '</h5>
                  <p class="card-text">' . $row['prix'] . '</p>
                  <p class="card-text">' . $row['adresse'] . '</p>
                  <input type="hidden" name="id"  value="' . $row["id_annonce"] . '">
                  <input type="submit" class="btn btn-primary" name="modal"  value="more">

                </div>
              </div>
              </form>
              

            ';
                }
            } else {
                echo "0 résultats";
            }






            ?>
        </div>
    </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>