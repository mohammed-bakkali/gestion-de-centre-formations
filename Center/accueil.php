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
    <!-- Link css -->
    <!-- <link  href="./master.css" rel="stylesheet"> -->
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
    <title>accueil</title>

    <style>
      nav{
        height: 70px;
      }
      /* body{
        background-image: url(images/meetings-page-bg.jpg);
      } */
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <!-- Container wrapper -->
  <div class="container">
  <img src="image 9.png"/>
    <form class="input-group" style="width: 400px; position: relative; right: 79px;">
      <input type="search" class="form-control" placeholder="Type the name of the book" aria-label="Search" />
      <button class="btn btn-outline-primary" type="button" data-mdb-ripple-color="dark" style="padding: .45rem 1.5rem .35rem;">
        Search
      </button>    
    </form>
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
    </button>
    
    <div class="" id="navbarSupportedContent">
      <!-- Left links -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active d-flex flex-column text-center" aria-current="page" href="accueil.php"><span class="small">Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex flex-column text-center" aria-current="page" href="./courses.php"><span class="small">courses</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex flex-column text-center" aria-current="page" href="contact.php"><span class="small">Contact Us</span></a>
        </li>
        <li class="nav-item dropdown">
        <div class="btn-group">

        <div class="d-flex justify-content-start" style="position: relative; left: 18px;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" >
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg"class="rounded-circle" height="30"loading="lazy"/>
                <span>  <?php echo $_SESSION['user']->nom; ?> </span>
                </button>
              
                <div class="dropdown-menu" style="text-align:center; width: 90px; left: 70px; ">
                    <a class="dropdown-item" href=" accueil.php">Profile</a>
                    <a class="dropdown-item" href="./Edit profile.php">Edit profile</a>
                    <from method="GET">
                    <!-- <a class="dropdown-item" name="Logout">Logout</p> -->
                    <button class="dropdown-item" name="Logout" type="submit">Logout</button>

                    </from>
                  <?php
                        if (isset($_GET['Logout'])) {
                          // session_start();
                          session_unset();
                          session_destroy();
                          header("location: Login.php");
                          # code...
                      }
                    ?> 
                </div>
            </div>
        </div>
          </a>
        </li>
      </ul>
    </div>
    
  </div>
</nav>
      <form method="get" class="filters">
        <div class="form-group flex-container">
          <label for="sujet">Sujet</label>
          <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Entrez un sujet...">
        </div>
        <div class="form-group flex-container">
          <label for="categorie">Catégorie</label>
          <select class="form-control" id="categorie" name="categorie">
            <option value="">Toutes les catégories</option>
            <option value="Informatique">Informatique</option>
            <option value="Langues">Langues</option>
            <option value="Marketing">Marketing</option>
          </select>
        </div>
        <!-- <div class="form-group flex-container">
          <label for="masse_horaire">Masse horaire (heures)</label>
          <input type="number" class="form-control" id="masse_horaire" name="masse_horaire" value="" placeholder="Entrez une masse horaire...">
        </div> -->
        <button type="submit" class="btn btn-primary flex-container" name="filter">Rechercher</button>
      </form>

      <!-- SECTION -->
      <section class="sec1">
      <div class="container">

        <!------------ Script PHP-------------- -->
      <?php 
      include('conn.php');

      if (isset($_GET['filter'])) {
          $query = "SELECT * FROM formations WHERE 1=1";
          # Create an empty array
          $params = array();

          if (isset($_GET['sujet']) && !empty($_GET['sujet'])) {
              $query .= " AND sujet = :sujet";
              $params[':sujet'] = $_GET['sujet'];
          }
        
          if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
              $query .= " AND categorie = :categorie";
              $params[':categorie'] = $_GET['categorie'];
          }
        
          $disply = $database->prepare($query);
          $disply->execute($params);
        
          foreach($disply AS $result){
            echo '
            <div class="card" style="width: 18rem;">
                <img src="'. $result['image'] .'" style="width: 100%;height: 251px;"/>
                <div class="card-body">
                    <h5 class="card-title">'. $result['sujet'] .'</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">'. $result['categorie'] .'</li>
                    <li class="list-group-item">'. $result['description'] .'</li>
                </ul>
                <button type="button" class="btn btn-dark">+</button>
            </div>';
          }
      }
      else{
      # Execute a SQL SELECT statement
                $disply = $database->prepare("SELECT * FROM formations");
                $disply->execute();
                foreach ($disply as $result) { 
                  echo '
                  <div class="card" style="width: 18rem;">
                      <img src="'. $result['image'] .'" style="width: 100%; height: 251px;"/>
                      <div class="card-body">
                          <h5 class="card-title">'. $result['sujet'] .'</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                      </div>
                      <ul class="list-group list-group-flush">
                          <li class="list-group-item">'. $result['categorie'] .'</li>
                          <li class="list-group-item">'. $result['description'] .'</li>
                      </ul>
                      <a href="courses-details.php?id_formation='. $result['id_formation'] .'" class="btn" type="submit">voire plus</a>
                      
                      
                  </div>';
              }        
      }
      ?>
        </div>
      </section>

    <!-- <p>WELCOMME</p> -->
</body>
</html>