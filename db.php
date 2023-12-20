<?php

$server="localhost";
$data_base="events_managers";
$user="root";
$password="";


try {
    $connection = new PDO("mysql:host=$server;dbname=$data_base", $user, $password);
} catch (Exception $e) {
    echo $e->getMessage();
}


?>