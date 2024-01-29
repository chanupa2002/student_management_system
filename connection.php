<?php

    $serverName = "localhost";
    $dbUsername = "chanupa";
    $dbPassword = "dLeTFCguC@7KAIqT";
    $dbName = "tution";

    $connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    if(!$connection){
       die("Connection failed : " . mysqli_connect_error()); 
    }
    
?>