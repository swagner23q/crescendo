<?php

    ini_set('display_errors', 'On');
    try {
        $DB = new PDO('mysql:host=us-cdbr-iron-east-03.cleardb.net;dbname=heroku_1863bd39e0fcae4','b9bb85a1e07f3e', 'a56e6e99');
        $DB->exec("SET NAMES 'utf8'");
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(Exception $e){
        echo 'Sorry, there seems to be a problem connecting to the database. Error message: ';
        echo $e->getMessage();
        die();
    }
