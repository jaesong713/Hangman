<?php
$Username = $_POST["Username"];
$Password = $_POST["Password"];
$points = 0;
if(isset($Username) || isset($Password)) {


$file = fopen("Users.txt","r") or die("unable to open file");
if(strpos(file_get_contents(("Users.txt")), $Username)==false){
    file_put_contents("Users.txt" , "\n" . $Username . " , " . $Password . " , " . $points , FILE_APPEND);
}else{
    echo "Username Exists! Please Log In!";
    header ("Location:hanglogin.php");
    exit();
}
}
?>

<b> Thank You!</b>

<p> Your Hangman account has been created! </p>

<a href="hanglogin.php"> Log in to Play!<a>
