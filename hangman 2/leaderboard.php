<?php
session_start();
    $user = $_POST['Username'];
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>LeaderBoard</title>
    </head>
  
    <body>
        <h2><?php echo "Thank you for Playing Hangman $user";
        ?>
        </h2>
        <table>
            <tr>
                <td>Ranking</td>
                <td>UserName</td>
                <td>Score</td>
            </tr>
</table>
</body>
</html>