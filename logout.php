
<?php
include("db.php");

session_start();
session_destroy();
header("Location:./events/index.php");
$logged = $_SESSION['logued'] ;

?> 
