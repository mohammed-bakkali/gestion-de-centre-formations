<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet" />

    <!-- Link css -->
    <link rel="stylesheet" href="master.css">
    <title>Login</title>
    <style>
        .container{
            border: 1px solid #000;
        }
        .container form{
            padding-top: 64px;
            padding-bottom: 64px;
        }
    </style>
</head>
<body>
    


<div class="container" style="margin-top: 176px; max-width: 779px;">
<form method="POST">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" id="form2Example1" class="form-control" name="email"/>
        <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" id="form2Example2" class="form-control" name="mot_de_passe"/>
        <label class="form-label" for="form2Example2">Password</label>
    </div>

    <!-- 2 column grid layout for inline styling -->
    <div class="row mb-4">
        <div class="col d-flex justify-content-center">
        <!-- Checkbox -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="form2Example34" checked />
            <label class="form-check-label" for="form2Example34"> Remember me </label>
        </div>
        </div>

        <div class="col">
        <!-- Simple link -->
        <a href="#!">Forgot password?</a>
        </div>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" name="login">Sign in</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p>Not a member? <a href="Sign_up.php">Register</a></p>
        <p>or sign up with:</p>
        <button type="button" class="btn btn-secondary btn-floating mx-1">
        <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-secondary btn-floating mx-1">
        <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-secondary btn-floating mx-1">
        <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-secondary btn-floating mx-1">
        <i class="fab fa-github"></i>
        </button>
    </div>
</form>

</div>

<?php
include('conn.php');
if (isset($_POST['login'])){
    $EMAIL = $_POST['email'];
    $mot_de_passe = sha1($_POST['mot_de_passe']);                                           
    $login = $database->prepare("SELECT * FROM apprenants WHERE email = :email AND mot_de_passe = :mot_de_passe ");
    $login->bindParam(":email", $EMAIL);
    $login->bindParam(":mot_de_passe", $mot_de_passe); 
    $login->execute();  


    

    if ($login->rowCount()===1){
        $user = $login->fetchObject(); 

        echo "welcomme" . "<br>" . $user->nom;
        $_SESSION['user'] = $user;
        header("Location: accueil.php"); 
        
        }
        else {
        // Display error message if login fails
        session_start();
        $_SESSION['error'] = "<p id='error'> Not registered or the information is incorrect </p>";
        header("Location: Login.php");
    }
}
?> 


</body>
</html>