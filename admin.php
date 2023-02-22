<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=pdf;charset=utf8;','root','');
if(isset($_POST['envoi'])){
    if(!empty($_POST['name']) AND !empty($_POST['mdp'])){
        $name = htmlspecialchars($_POST['name']);
        $mdp = ($_POST['mdp']);

        $recupUser = $bdd->prepare('SELECT * FROM login WHERE name = ? AND mdp = ?');
        $recupUser->execute(array($name, $mdp));

        if($recupUser->rowCount() > 0){
            $_SESSION['name'] = $name;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('LOCATION: insert.php');

        }else{
            echo "Votre mot de passe ou nom est incorrect";
        }
    }else{
        echo "veuillez compléter tous les champs...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="boxicons-master/css/boxicons.css">

    <title>CONNEXION</title>

</head>
<body>
    <form method="POST" action="">
        <div class="box">
            <div class="container">

                <div class="top">
                    <span></span>
                    <header>Connecter vous</header>
                </div>

                <div class="input-field">
                    <input type="text" name="name" class="input" placeholder="Nom" id="" autocomplete="off">
                    <i class='bx bx-user' ></i>
                </div>

                <div class="input-field">
                    <input type="password" name="mdp" class="input" placeholder="Mot de passe" id=""  autocomplete="off">
                    <i class='bx bx-lock-alt'></i>
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" name="envoi" id="">
                </div>

                <div class="two-col">
                    <div class="one">
                    
                    <label for="check"></label>
                    </div>
                    <div class="two">
                        <label><a href="#"></a></label>
                    </div>
                </div>
            </div>
        </div>
    </form>  
</body>
</html>