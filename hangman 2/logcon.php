<?php

    $sername="localhost";
    $Username="root";
    $Password="";
    $database="test";
    
    $conn= mysqli_connect($sername,$Username,$Password,$database);
        if(!$conn){
        echo("Error!");
        die;
    }
    ?>