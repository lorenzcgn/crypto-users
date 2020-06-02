<?php

// usa require_once "db.php"; in tutti i file


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'lorenzcr_crypto');
define('DB_PASSWORD', 'passwordprova');
define('DB_NAME', 'lorenzcr_crypto');
 
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// controllo
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>