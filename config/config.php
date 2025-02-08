<?php
try{
    // host
    $HOST = "localhost";
    // dbname
    $DBNAME = "anime";
    // user
    $USER = "root";
    // pass
    $PASS = "";

    $conn = new PDO("mysql:host=".$HOST.";dbname=".$DBNAME."",$USER, $PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERR_NONE);
}catch(PDOException $e){
    echo $e->getMessage();
}