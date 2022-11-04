<?php
   
    $servername = "localhost"; 
    $Username = "root"; 
    $Score = "";
    $database = "practice";
   
    $conn = mysqli_connect($servername, $Username, $Score, $database);

     if (!$conn){
            echo("Error");
            die;
    } 
?>