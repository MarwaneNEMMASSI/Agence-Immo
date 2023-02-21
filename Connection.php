<?php
session_start();
include 'DBconnection.php';

$EmailErr = "";
$PasswordErr = "";
$Error = "";



if(isset($_POST["submit"]))
    {
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];

        if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
            {
                $EmailErr = "Format invalide";
            }
            else if (empty($Email))
                {
                    $EmailErr = "Un e-mail est requis";
                }

        if (empty($Password))
            {
                $PasswordErr = "Un mot de passe est requis";
            }

        if ($PasswordErr == "" && $EmailErr == "")
            {
                $Ajouter = $conn->prepare("SELECT `email`, `mot de passe`, `ID_Client` FROM `client` WHERE `email` = '$Email'");
                
                $Ajouter->execute();
                $Response = $Ajouter->fetchAll();

                if($Response == [])
                    {
                        $Error = "L'email ou l'identifiant ne sont pas correct";
                    }
                    elseif(password_verify($Password, $Response[0]["mot de passe"]))
                        {
                            echo 'You have been connected succesfully';
                            $_SESSION["Logged_User_email"] = $Response[0]["email"];
                            $_SESSION["Logged_User_ID"] = $Response[0]["ID_Client"];
                            echo $_SESSION["Logged_User_ID"];
                        }
            }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AccountCreation.css">
    <title>Document</title>
</head>
<body>
    
    <div class="body">

        <div class="sidebar">

        </div>

        <div>
            <img src="IconeConnexion.svg" alt="">
        </div>

        <div>
            <form action="Connection.php" method="POST">
                <div class="formulaire">
                    <label for="Email">Email</label>
                    <input type="text" name="Email" id="Email">
                    <?php echo $EmailErr;?>

                    <label for="MotDePasse">Mot de passe</label>
                    <input type="" name="Password" id="MotDePasse">
                    <?php echo $PasswordErr;?>
                    <?php echo $Error ; ?> 

                    <input type="submit" name = "submit" value="Se connecter">
                </div>
            </form>
        </div>
    </div>

</body>
</html>