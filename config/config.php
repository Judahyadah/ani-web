<?php
try{
// host
define("HOST", "localhost");
// dbname
define("DBNAME", "anime");
// user
define("USER", "root");
// pass
define("PASS", "");

$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."",USER, PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERR_NONE);
}catch(PDOException $e){
    echo $e->getMessage();
}