<?php

ini_set('display_errors', 'On');
try {
    $DB = new PDO('mysql:host=localhost;dbname=crescendo', 'root', 'root');
    $DB->exec("SET NAMES 'utf8'");
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
    echo 'Sorry, there seems to be a problem connecting to the database.';
    echo $e->getMessage();
    die();
}
