<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- Link css -->
    <link  href="./master.css" rel="stylesheet">
    <!-- Link  Bootstrap-->
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
    <!-- Link css -->
    <link rel="stylesheet" href="./master.css?=<php echo time();?>">
    <title>courses</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['user'])) {
    // echo "welcomme" . "<br>" . $_SESSION['user']->nom;
    // $_SESSION['user']->nom;
}

?>

<!-- Navigation bar -->



    <?php
session_start();
if (isset($_SESSION['user'])) {
    // echo "welcomme" . "<br>" . $_SESSION['user']->nom;
    // $_SESSION['user']->nom;
}

?>

<!-- START Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="height: 80px;">
    <div class="container">
        <img src="image 9.png"/>
        <!-- Search form -->
        <form class="input-group" style="width: 400px; position: relative; right: 79px;">
            <input type="search" class="form-control" placeholder="Type the name of the book" aria-label="Search" />
            <button class="btn btn-outline-primary" type="button" data-mdb-ripple-color="dark" style="padding: .45rem 1.5rem .35rem;">
                Search
            </button>    
        </form>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation"></button>
        
        <div class="" id="navbarSupportedContent" class="container">
            <!-- Left links -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active d-flex flex-column text-center" aria-current="page" href="accueil.php"><span class="small">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column text-center" aria-current="page" href="./courses.php"><span class="small">Courses</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column text-center" aria-current="page" href="contact.php"><span class="small">Contact Us</span></a>
                </li>
                <li class="nav-item dropdown">
                    <div class="btn-group">
                        <div class="d-flex justify-content-start" style="position: relative; left: 18px;">
                            <div class="dropdown">
                                <!-- Dropdown button -->
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="rounded-circle" height="30" alt="" loading="lazy" />
                                    <span><?php echo $_SESSION['user']->nom; ?></span>
                                </button>
                                <!-- Dropdown menu -->
                                <div class="dropdown-menu" style="text-align:center; width: 90px; left: 70px; ">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="./Edit profile.php">Edit profile</a>
                                    <form method="POST">
                                        <p class="dropdown-item" name="Logout">Logout</p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>    
    </div>
</nav>
<!-- END Navigation bar  -->

<!-- SCRIPT PHP -->

<?php 
include('conn.php');
// $_SESSION['user']->id_apprenant;
$result = array(); // Initialize the $result variable

$id_apprenant = $_SESSION['user']->id_apprenant;



    // Get session details
    $query = "SELECT i.id_inscription, i.id_apprenant, i.id_session, p.id_apprenant, s.id_session, s.date_debut, s.date_fin,
                FROM inscriptions i
                JOIN apprenants p ON i.id_apprenant = p.id_apprenant 
                JOIN sessions s ON s.id_session = i.id_session
                WHERE p.id_apprenant = :id";


// $query = "SELECT s.id_session, s.date_debut, s.date_fin, s.etat, s.places, f.id_formation, f.categorie, f.description, f.sujet, f.image, A.id_formateur, A.nom
// FROM sessions s
// JOIN formations f ON s.id_formation = f.id_formation
// JOIN formateurs A ON s.id_formateur = A.id_formateur
// WHERE f.id_formation = :id";

    $stmt = $database->prepare($query);
    $stmt->bindParam(':id', $id_apprenant);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
?>



<div class="row">
        <div class="col-md-4">
            <img class="w-100 h-100" src="<?php echo $result['image']; ?>">
        </div>
        <div class="col-md-8">
            <div class="card-block">
                <!-- <h6 class="card-title"><?php echo $result['sujet']; ?></h6>
                <p class="card-text text-justify"><?php echo $result['description']; ?></p> -->
                <h5>Formateur: <?php echo $result['nom']; ?></h5>
                <h4>Date Debut: <?php echo $result['date_debut']; ?> </h4>
                <h4>Date Fin: <?php echo $result['date_fin']; ?> </h4>
                <h6>Places: <?php echo $result['places']; ?> </h6>
                        <form method="POST">
                            <input type="submit" name="Join" class="btn btn-primary" value="Join">
                        </form>
                        <!-- <p>Maximum number of participants reached. Registration is closed.</p> -->
            </div>
        </div>
    </div>
</div>
</body>
</html>