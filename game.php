<!DOCTYPE html>
<html>

<?php

if (empty($_GET["name"])) {
    header('Location: login.php');
    exit;
}

?>
    <head>
        <title>Rock, Paper, Scissors Game</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="starter-template.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>Rock Paper Scissors</h1>
            <p>Welcome: <?php echo $_GET["name"]?> </p>
            <form method="post">
                <select name="human">
                    <option value="Select">Select</option>
                    <option value="Rock">Rock</option>
                    <option value="Paper">Paper</option>
                    <option value="Scissors">Scissors</option>
                    <option value="Test">Test</option>
                </select>
                <input type="submit" name = "play" value="Play">
                <input type="submit" name="logout" value="Logout">
            </form>

            <?php


            $computer_options = array('Rock', 'Paper', 'Scissors');
            $rand_choice = $computer_options[rand(0, 2)];
            $game = array('win', 'loose', 'draw');

            //game options
            $optionWin = ($_POST['human'] == 'Scissors' && $rand_choice == 'Paper') || ($_POST['human'] == 'Paper' && $rand_choice == 'Rock') || ($_POST['human'] == 'Rock' && $rand_choice == 'Scissors');

            $optionLose = ($_POST['human'] == 'Paper' && $rand_choice == 'Scissors') || ($_POST['human'] == 'Rock' && $rand_choice == 'Paper') || ($_POST['human'] == 'Scissors' && $rand_choice == 'Rock');
            $stdprint = "You chose $_POST[human]. Computer chose $rand_choice. ";

            //play if the play button is pushed
            if ($_POST['human'] == 'Test' || $_POST['human'] == 'Select') {
                echo "<pre>Please select a strategy and press Play.</pre>";
            } else {
                if (isset($_POST['play'])) {
                    if ($optionWin) {
                        echo "<pre>".$stdprint. "You ".$game[0]."!"."</pre>";
                    } elseif ($optionLose) {
                        echo "<pre>".$stdprint."You ".$game[1]."!"."</pre>";
                    } else {
                        echo "<pre>".$stdprint.$game[2]."!"."</pre>";
                    }
                }
            }

            //logout and return to index.php
            if (isset($_POST['logout'])) {
                header("Location: index.php");
            }
            ?>

            


        </div>
    </body>
</html>