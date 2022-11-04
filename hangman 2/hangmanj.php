<?php

session_start();
print "<h1 style = 'text-align: center; color: grey; text-shadow: 3px 3px black'>You are in Journeyman Mode.</h1>";
print "<h2 style = 'text-align : center; color: grey; text-shadow: 3px 3px black'> Hint: Animals </h2>";
$letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$WON = false;
$guess = "HANGMAN";
$maxLetters = strlen($guess) - 1;
$responses = ["H","G","A"];


$bodyParts = ["nohead","head","body","hand","hands","leg","legs"];


// small array of words to guess from
$words = [
    "ELEPHANT", "RHINOCEROS", "ALLIGATOR", "CROCODILE"
    ];


function getCurrentPicture($part){
    return "./hangman_". $part. ".png";
}


function strtGame(){

}

function restartGame(){
    session_destroy();
    session_start();
}

// retrieves all parts of the hangman
function getParts(){
    global $bodyParts;
    return isset($_SESSION["parts"]) ? $_SESSION["parts"] : $bodyParts;
}

// when the guess is considered wrong, this will add a part to the hangman picture
function addPart(){
    $parts = getParts();
    array_shift($parts);
    $_SESSION["parts"] = $parts;
}

// yields the current body part
function getCurrentPart(){
    $parts = getParts();
    return $parts[0];
}

// retrieves the word
function getCurrentWord(){
    //  return "HANGMAN"; // for now testing
    global $words;
    if(!isset($_SESSION["word"]) && empty($_SESSION["word"])){
        $key = array_rand($words);
        $_SESSION["word"] = $words[$key];
    }
    return $_SESSION["word"];
}


// get user response
function getCurrentResponses(){
    return isset($_SESSION["responses"]) ? $_SESSION["responses"] : [];
}

function addResponse($letter){
    $responses = getCurrentResponses();
    array_push($responses, $letter);
    $_SESSION["responses"] = $responses;
}

// checks to see if the guessed letter that was pressed is correct
function isLetterCorrect($letter){
    $word = getCurrentWord();
    $max = strlen($word) - 1;
    for($i=0; $i<= $max; $i++){
        if($letter == $word[$i]){
            return true;
        }
    }
    return false;
}

// is the word (guess) correct

function isWordCorrect(){
    $guess = getCurrentWord();
    $responses = getCurrentResponses();
    $max = strlen($guess) - 1;
    for($i=0; $i<= $max; $i++){
        if(!in_array($guess[$i],  $responses)){
            return false;
        }
    }
    return true;
}

// check if the body is ready to hang

function isBodyComplete(){
    $parts = getParts();
    // is the current parts less than or equal to one
    if(count($parts) <= 1){
        return true;
    }
    return false;
}


// checks to see if the game is now finished
function gameComplete(){
    return isset($_SESSION["gamecomplete"]) ? $_SESSION["gamecomplete"] :false;
}


// set game to done
function gameIsDone(){
    $_SESSION["gamecomplete"] = true;
}

//This portion will start a new game.
function markGameAsNew(){
    $_SESSION["gamecomplete"] = false;
}



/* Detect when the game is to restart. From the restart button press*/
if(isset($_GET['start'])){
    restartGame();
}


/* Detect when Key is pressed */
if(isset($_GET['kp'])){
    $currentPressedKey = isset($_GET['kp']) ? $_GET['kp'] : null;
    // if the key press is correct
    if($currentPressedKey
        && isLetterCorrect($currentPressedKey)
        && !isBodyComplete()
        && !gameComplete()){

        addResponse($currentPressedKey);
        if(isWordCorrect()){
            $WON = true; // game complete
            gameIsDone();
        }
    }else{
        // start hanging the man :)
        if(!isBodyComplete()){
            addPart();
            if(isBodyComplete()){
                gameIsDone(); // lost condition
            }
        }else{
            gameIsDone(); // lost condition
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hangman The Game</title>
</head>
<body style="background: white">


<div style="margin: 0 auto; background: gainsboro; width:900px; height:900px; padding:5px; border-radius:3px;">
<!-- picture -->
    <div style="display:inline-block; width: 500px; background:#fff;">
        <img style="width:80%; display:inline-block;" src="<?php echo getCurrentPicture(getCurrentPart());?>"/>

        <!-- Indicate game status -->
        <?Php if(gameComplete()):?>
            <h1>GAME COMPLETE</h1>
        <?php endif;?>
        <?php if($WON  && gameComplete()):?>
            <img src = "happyjanggu.png" width="500">
            <p style="color: limegreen; font-size: 50px;">You Won!</p>
        <?php elseif(!$WON  && gameComplete()): ?>
            <img src = "janggusad.jpeg" width="300" height="400">
            <p style="color: red; font-size: 50px;">You Lost</p>
        <?php endif;?>
    </div>

    <div style="float:right; display:inline; vertical-align:top;">
        <h1>Hangman</h1>
        <div style="display:inline-block;">
            <form method="get">
                <?php
                $max = strlen($letters) - 1;
                for($i=0; $i<= $max; $i++){
                    echo "<button type='submit' name='kp' value='". $letters[$i] . "'>".
                        $letters[$i] . "</button>";
                    if ($i % 7 == 0 && $i>0) {
                        echo '<br>';
                    }

                }
                ?>
                <br><br>
                <!-- Restart game button -->
                <button type="submit" name="start">Restart Game</button>
                <button><a href="the_Hang.html"> Go back Home</a></button>
            </form>
        </div>
    </div>

    <div style="margin-top:20px; padding:15px; background: snow; color: black">
        <!-- guesses -->
        <?php
        $guess = getCurrentWord();
        $maxLetters = strlen($guess) - 1;
        for($j=0; $j<= $maxLetters; $j++): $l = getCurrentWord()[$j]; ?>
            <?php if(in_array($l, getCurrentResponses())):?>
                <span style="font-size: 35px; border-bottom: 3px solid #000; margin-right: 5px;"><?php echo $l;?></span>
            <?php else: ?>
                <span style="font-size: 35px; border-bottom: 3px solid #000; margin-right: 5px;">&nbsp;&nbsp;&nbsp;</span>
            <?php endif;?>
        <?php endfor;?>
    </div>

</div>



</body>


</html>