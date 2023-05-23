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
    <style>
        .container{
            border: 1px solid #000;
        }
        .container form{
            padding-top: 64px;
            padding-bottom: 64px;
            
        }
    </style>


    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-top: 176px; max-width: 779px; ">
    <form method="POST">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
        <div class="form-outline">
            <input type="text" id="form3Example1" class="form-control" name="nom" />
            <label class="form-label" for="form3Example1">nom</label>
        </div>
        </div>
        <div class="col">
        <div class="form-outline">
            <input type="text" id="form3Example2" class="form-control" name="prenom"/>
            <label class="form-label" for="form3Example2">prenom</label>
        </div>
        </div>
    </div>

    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" id="form3Example3" class="form-control" name="email"/>
        <label class="form-label" for="form3Example3">email</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" id="form3Example4" class="form-control" name="mot_de_passe"/>
        <label class="form-label" for="form3Example4">mot de passe</label>
    </div>

    <!-- Checkbox -->
    <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
        <label class="form-check-label" for="form2Example33">
        Subscribe to our newsletter
        </label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" name="add">Sign up</button>

    <!-- Register buttons -->
    <div class="text-center">
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


    <!-- Add personal information supervisor to the database -->
<?php
include('conn.php');
if (isset($_POST['add'])) {
    $EMAIL = $_POST['email'];
    $checkEmail = $database->prepare("SELECT * FROM apprenants WHERE email = :email");
    $checkEmail->bindParam(":email", $EMAIL);
    $checkEmail->execute();
    if ($checkEmail->rowCount() > 0) {
        header("Location: Sign_up.php");
    } else {
        $NOM = $_POST['nom'];
        $PRENOM = $_POST['prenom'];
        $EMAIL = $_POST['email'];
        $mot_de_passe= sha1($_POST['mot_de_passe']); 
        $addData = $database->prepare("INSERT INTO apprenants (nom, prenom, email, mot_de_passe) 
        VALUES (:nom, :prenom, :email, :mot_de_passe)");
        $addData->bindParam(":nom", $NOM);
        $addData->bindParam(":prenom", $PRENOM);
        $addData->bindParam(":email", $EMAIL);
        $addData->bindParam(":mot_de_passe", $mot_de_passe);
        $addData->execute();
        header("Location: Login.php");
    }
}
?>
</body>

</html>