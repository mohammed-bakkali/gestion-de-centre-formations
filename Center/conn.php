
<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'gestion_de_centre';
$database = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);

    // if ($database) {
    //     echo 'Yes';
    //     # code...
    // }


?>