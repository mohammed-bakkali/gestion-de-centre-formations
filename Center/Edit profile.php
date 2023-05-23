<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://unpkg.com/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-P6UZth6UZeu6U33daXUJydu7VzHcGqqAT++VzubvI2K7VZBfAYGm7LR9E1nFAd/7"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    integrity="sha384-ysB35xtOxPJ0/hyfZeUIyML0+0aFb4rc4GZlJ5ZtWodcQ9ff1tS5F8StYfOMdMwM" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-lQwByOxLaSISLqt/iY0Zj3F3tXa4vF+Ms7OTuOydk8VgB0viyLrkVfJYjYI8WcqE" 
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Edit profile</title>
</head>
<style>
    .btn{
        display: block;
        margin-bottom: 19px;
        margin-left: 14px;
    }
    a{
        text-decoration: none;
        margin-left: 11px;
    }
</style>
<body>
<?php
    session_start();
    if (isset($_SESSION['user'])) {
        
        // $_SESSION['user']->nom;        
    }
    ?>
<div class="container bootstrap snippets bootdey">
        <h1 class="text-primary">Edit Profile</h1>
        <hr>
        <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
            <h6>Upload a different photo...</h6>
            
            <input type="file" class="form-control">
            </div>
        </div>
        
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a> 
            <i class="fa fa-coffee"></i>
            This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div>
            <h3>Personal info</h3>
            
            <form class="form-horizontal" role="form" method="POST">
            <div class="form-group">
                <label class="col-lg-3 control-label">First name:</label>
                <div class="col-lg-8">
                <input class="form-control" type="text" name="nom" value="<?php echo $_SESSION['user']->nom; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Last name:</label>
                <div class="col-lg-8">
                <input class="form-control" type="text" name="prenom" value="<?php echo $_SESSION['user']->prenom; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                <input class="form-control" type="text" name="email" value="<?php echo $_SESSION['user']->email; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">password:</label>
                <div class="col-lg-8">
                <input class="form-control" type="password" name="mot_de_passe" value="">

                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="update" value="<?php echo $_SESSION['user']->id_apprenant;?>">update</button>


            
            <a href="./accueil.php">Go to the home page</a>
            </form>
        </div>
    </div>
</div>
<hr>
<?php
include('conn.php');

if (isset($_POST['update'])) {

    $updateUserData = $database->prepare("UPDATE apprenants SET 
        nom = :nom, prenom = :prenom, email = :email, mot_de_passe = :mot_de_passe WHERE id_apprenant = :id");

    $NOM = $_POST['nom'];
    $PRENOM = $_POST['prenom'];
    $EMAIL = $_POST['email'];
    $mot_de_passe= sha1($_POST['mot_de_passe']); 
    $ID = $_POST['update'];

    $updateUserData->bindParam(":nom", $NOM);
    $updateUserData->bindParam(":prenom", $PRENOM);
    $updateUserData->bindParam(":email", $EMAIL);
    $updateUserData->bindParam(":mot_de_passe", $mot_de_passe);
    $updateUserData->bindParam(":id", $ID);

    if ($updateUserData->execute()) {
        // echo "YES";
        $user = $database->prepare('SELECT * FROM apprenants WHERE id_apprenant = :id');

        $ID = $_POST['update'];

        $user->bindParam(":id", $ID);
        $user->execute();

        $_SESSION['user'] = $user->fetchObject();
        header("refresh:2;");
        exit; // Add exit to stop script execution after the redirect

    }else{
        echo "NO";
    }

}




?>
</body>
</html>