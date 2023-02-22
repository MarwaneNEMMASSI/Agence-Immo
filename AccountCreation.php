<?php 
// Connection a la base de données
include 'DBconnection.php';

// Definition des variables 

$FamilynameErr = $NameErr = $PhoneErr = $EmailErr = $PasswordErr = $PasswordConfirmationErr = "" ;
$FamilyName = $Name = $Phone = $Email = $Password = $PasswordConfirmation = "" ;

// Validation du formulaire 
if(isset($_POST["submit"]))
    {
        if(empty($_POST["nom"]))
            {
                $FamilynameErr = "Le nom de famille est requis";
            }
            else
                {
                    $FamilyName = $_POST["nom"] ;

                    if(!preg_match("/^[a-zA-Z]*$/", $FamilyName))
                        {
                            $FamilynameErr = "Format invalide";
                        }
                }
        
        if(empty($_POST["prenom"]))
            {
                $NameErr = "Le prénom est requis";
            }
            else
                {
                    $Name = $_POST["prenom"];

                    if(!preg_match("/^[a-zA-Z- ]*$/", $Name))
                        {
                            $NameErr = "Format invalide";
                        }
                }

        if(empty($_POST["email"]))
            {
                $EmailErr = "Votre adresse mail est requise";
            }
            else
                {
                    $Email = $_POST["email"];

                    if (!filter_var($Email, FILTER_VALIDATE_EMAIL))
                        {
                            $EmailErr = "Format invalide";
                        }
                }

        if(empty($_POST["telephone"]))
            {
                $PhoneErr = "Votre numéro de téléphone est requis";
            }
            else
                {
                    $Phone = $_POST["telephone"];

                    if (!preg_match("/^(06|07|08|05)+[0-9]{8}$/", $Phone))
                        {
                            $PhoneErr = "Format invalide";
                        }
                }

        if(empty($_POST["MotDePasse"]))
            {
                $PasswordErr = "Un mot de passe est requis";
            }
            else
                {
                    $Password = $_POST["MotDePasse"];

                    if(!preg_match("/[\w!@£?]/", $Password))
                        {
                            $PasswordErr = "Format invalide";
                        }
                    
                }

        if(empty($_POST["ConfirmationMotDePasse"]))
            {
                $PasswordConfirmationErr = "Confirmer votre mot de passe";
            }
            else
                {
                    $PasswordConfirmation = $_POST["ConfirmationMotDePasse"];

                    if($PasswordConfirmation != $Password)
                        {
                            $PasswordConfirmationErr = "Les mots de passe ne sont pas identiques";
                        }
                    $hash = password_hash($Password, PASSWORD_BCRYPT);
                }
                
        if( ($FamilynameErr == "" And $NameErr == "" And $PhoneErr == "" And $EmailErr == "" And $PasswordErr == "" And $PasswordConfirmationErr == "") And (!empty($_POST["nom"]) And !empty($_POST["prenom"]) And !empty($_POST["email"]) And !empty($_POST["telephone"]) And !empty($_POST["MotDePasse"]) And !empty($_POST["ConfirmationMotDePasse"])) )
            {
                $Ajouter = $conn->prepare("INSERT INTO `client` (`nom`, `prenom`, `email`, `mot de passe`, `téléphone`) VALUES ('$FamilyName', '$Name', '$Email', '$hash', '$Phone')");
                $Ajouter->execute();
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
            <img src="icone.svg" alt="">
        </div>

        <div>
            <form action="AccountCreation.php" method="post">
                <div class="formulaire">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $FamilyName?>">
                    <span> <?php echo $FamilynameErr;?> </span> 

                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $Name?>">
                    <span> <?php echo $NameErr;?> </span> 


                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" value="<?php echo $Email?>">
                    <span> <?php echo $EmailErr;?> </span> 


                    <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" value="<?php echo $Phone?>">
                    <span> <?php echo $PhoneErr;?> </span> 


                    <label for="MotDePasse">Mot de passe</label>
                    <input type="text" name="MotDePasse" id="MotDePasse">
                    <span> <?php echo $PasswordErr;?> </span> 


                    <label for="ConfirmationMotDePasse">Confirmer le mot de passe</label>
                    <input type="text" name="ConfirmationMotDePasse" id="ConfirmationMotDePasse">
                    <span> <?php echo $PasswordConfirmationErr;?> </span> 


                    <input type="submit" value="Créer un compte" name="submit">
                </div>
            </form>
        </div>
        
    </div>
</body>
</html>