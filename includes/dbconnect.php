<?php
//declare variables
$host = 'localhost';
 $user = 'webdfrav_thomas';
 $pass = 'beeratingsadmin';
 $db = 'webdfrav_beeratings';

//database connection 
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
            die('Database connection error: ' . $conn->connect_error);
    } 
