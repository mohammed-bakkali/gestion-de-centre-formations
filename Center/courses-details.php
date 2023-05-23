<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link Css -->
    <link rel="stylesheet" href="./master.css">
    <!-- Link Bootstrap-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
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

    <link rel="stylesheet" href="./master.css?=<php echo time();?>">
    <title>Document</title>
    <style>

        h1{
            margin-top: 128px;
        }

        h1, h2{
            text-align: center;
            font-size: 22px;
        }
        .card {
            width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        nav{
        height: 70px;
        }
</style>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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

<!-- TABLE -->

<h1>Get all details</h1>
<h2>CENTRE TEACHING AND LEARNING TOOLS</h2>

<!------------ Script PHP-------------- -->
<?php

include('conn.php');
// $_SESSION['user']->id_apprenant;
$result = array(); // Initialize the $result variable

if (isset($_GET['id_formation'])) {
    $ID = $_GET['id_formation'];

    // Get session details
    $query = "SELECT s.id_session, s.date_debut, s.date_fin, s.etat, s.places, f.id_formation, f.categorie, f.description, f.sujet, f.image, A.id_formateur, A.nom # / Check how many places are available Specify each column from which table to fetch
                FROM sessions s                                      
                JOIN formations f ON s.id_formation = f.id_formation  
                JOIN formateurs A ON s.id_formateur = A.id_formateur
                WHERE f.id_formation = :id";

                                                

    $stmt = $database->prepare($query);
    $stmt->bindParam(':id', $ID);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Check if already registered in a session for the same formation

$id_apprenant = $_SESSION['user']->id_apprenant;


//check if already inscrire in a session in the same formation
$query1 = "SELECT COUNT(*) AS count   # COUNT(*) The number of table lines
FROM inscriptions i
INNER JOIN sessions s ON i.id_session = s.id_session
WHERE i.id_apprenant = :id_apprenant
AND s.id_formation = :id_formation";
$stmt = $database->prepare($query1);
$stmt->bindParam(':id_apprenant', $id_apprenant);
$stmt->bindParam(':id_formation', $result['id_formation']);
$stmt->execute();
$row2 = $stmt->fetch(PDO::FETCH_ASSOC);



// Check if there are already 2 sessions
// max 2 sessions in year
$query2 = "SELECT COUNT(*) AS count
            FROM inscriptions i
            INNER JOIN sessions s ON i.id_session = s.id_session
            WHERE i.id_apprenant = :id_apprenant
            AND (s.etat = 'en cours' OR s.etat = 'en cours d''inscription')
            AND YEAR(s.date_debut) = YEAR(CURRENT_DATE())"; // Same as the current year

$stmt = $database->prepare($query2);
$stmt->bindParam(':id_apprenant', $id_apprenant);
$stmt->execute();
$row3 = $stmt->fetch(PDO::FETCH_ASSOC);


// //check if 2 session in the same date
$query3 = "SELECT COUNT(*) AS count
            FROM inscriptions i
            INNER JOIN sessions s ON i.id_session = s.id_session
            WHERE i.id_apprenant = :id_apprenant
            AND s.date_debut < :date_fin
            AND s.date_fin > :date_debut
            AND (s.etat = 'en cours d''inscription' OR s.etat = 'en cours')
            AND YEAR(s.date_debut) = YEAR(CURRENT_DATE())";

$stmt = $database->prepare($query3);
$stmt->bindParam(':id_apprenant', $id_apprenant);
$stmt->bindParam(':date_debut', $result['date_debut']);
$stmt->bindParam(':date_fin', $result['date_fin']);
$stmt->execute();
$row4 = $stmt->fetch(PDO::FETCH_ASSOC);

// ...

// Check the number of available places
$sqlSS = "SELECT COUNT(*) AS count FROM inscriptions WHERE id_session = :id_session";
$stmt = $database->prepare($sqlSS);
$stmt->bindParam(':id_session', $result['id_session']);
$stmt->execute();
$row5 = $stmt->fetch(PDO::FETCH_ASSOC);

$sqlSSS = "SELECT places FROM sessions WHERE id_session = :id_session";
$stmt = $database->prepare($sqlSSS);
$stmt->bindParam(':id_session', $result['id_session']);
$stmt->execute();
$row6 = $stmt->fetch(PDO::FETCH_ASSOC);

// Proceed with the registration process
if (isset($_POST['Join'])) {
    if (!isset($id_apprenant)) {
        echo "<div class='alert alert-danger' role='alert'>
            Tu dois te connecter pour t'inscrire à une session.
        </div>";
    } elseif ($row2['count'] > 0) {
        echo "<div class='alert alert-danger' role='alert'>
            vous avez deja ainscrire sur cette session
        </div>";
    } elseif ($row3['count'] >= 2) {
        echo "<div class='alert alert-danger' role='alert'>
            vous avez déjà inscrit sur 2 sessions au maximum.
        </div>";
    } elseif ($row4['count'] > 0) {
        echo "<div class='alert alert-danger' role='alert'>
            vous êtes déjà inscrit à une session qui se chevauche avec cette session.
        </div>";
    } elseif ($row5['count'] >= $row6['places']) {
        echo "<div class='alert alert-danger' role='alert'>
            Il n'y a plus de place disponible pour cette session.
        </div>";
    } else {
        $sql5 = "INSERT INTO inscriptions (id_apprenant, id_session) 
                VALUES (:id_apprenant, :id_session)";
        $stmt = $database->prepare($sql5);
        $stmt->bindParam(':id_apprenant', $id_apprenant);
        $stmt->bindParam(':id_session', $result['id_session']);
        $stmt->execute();
        echo "<div class='alert alert-success' role='alert'>Votre inscription a été complétée avec succès.</div>";
    }
}
?>
<!-- Display session details and registration form -->
<div class="card col-md-12 p-3">
    <div class="row">
        <div class="col-md-4">
            <img class="w-100 h-100" src="<?php echo $result['image']; ?>">
        </div>
        <div class="col-md-8">
            <div class="card-block">
                <h6 class="card-title"><?php echo $result['sujet']; ?></h6>
                <p class="card-text text-justify"><?php echo $result['description']; ?></p>
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






















































<!-- قاعدة عامة

لجلب الأسطر التي تحتوي قيم مشتركة نضع بين الجداول الكلمة INNER JOIN
و التي يمكنك اختصارها بالكلمة JOIN
فقط.
لتحديد ما هو الحقل المشترك بين الجداول و الذي يربطهم مع بعض, نستخدم الكلمة ON -->