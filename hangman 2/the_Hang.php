<?php
session_start();
    $user = $_POST['Username'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel = "stylesheet" href = "hangmanstyle.css">
  <meta charset="UTF-8">
  <title>Hangman</title>
</head>
<body>
<h1 class = "headerhang">
  Hangman Game
</h1>
<h2 class = "header2hang">
  <?php
  echo "Welcome $user!";
  ?>
</h2>
<!-- commenting out the form -->
<!-- <form action = "the_Hangman.php" method = "post"> -->

  <h2 class = "half1">
    <p>How the game works</p>
  </h2>
  <p class = "half2">
    The user (you) will be choosing a difficulty level to the likings of Novice, Apprentice, Journeyman and Master.
    Then, you are able to start picking and choosing to your liking.
    You have 7 lives. Choose wisely. There is also a start button at the end of the page if you feel that you need
    to start over. Good luck and have fun!
  </p>

  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!-- <caption class = "justCenter">Choose a difficulty level</caption> -->
  <div class = "letterstyle">
    Choose a difficulty level
  </div>
  <br>
  <div class = "letterstyle">
    <button name = "rare"> <a href = 'hangmannovice.php'>Novice</a></button>
    <button name = "medium_Rare"> <a href = 'hangmanapprentice.php'>Apprentice</a></button>
    <button name = "medium"><a href = 'hangmanj.php'>Journeyman</a></button>
    <button name = "medium_Well"><a href = 'hangmaster.php'>Master</a></button>
  </div>
<!--
  <div>
    <img src = "./hangmanpics/hangman1.png" alt = "Hangman Pics">
  </div>
-->

<!--
  <div class = "letterstyle">
    <button name = "a">a</button>
    <button name = "b">b</button>
    <button name = "c">c</button>
    <button name = "d">d</button>
    <button name = "e">e</button>
    <button name = "f">f</button>
    <button name = "g">g</button>
    <button name = "h">h</button>
    <button name = "i">i</button>
    <button name = "j">j</button>
    <button name = "k">k</button>
    <button name = "l">l</button>
    <button name = "m">m</button>
    <button name = "n">n</button>
    <button name = "o">o</button>
    <button name = "p">p</button>
    <button name = "q">q</button>
    <button name = "r">r</button>
    <button name = "s">s</button>
    <button name = "t">t</button>
    <button name = "u">u</button>
    <button name = "v">v</button>
    <button name = "w">w</button>
    <button name = "x">x</button>
    <button name = "y">y</button>
    <button name = "z">z</button>
  </div>
-->

  <br>
  <div class = "letterstyle">
    <button name = "startover" type = "reset">
      Start Over
    </button>
    <form action="hanglogin.php">
    <button type="submit">Log Out </button>
</form>
  </div>
<!-- commenting out the form -->
<!-- </form> -->
</body>
</html>