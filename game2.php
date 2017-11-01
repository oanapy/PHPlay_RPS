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

            $options = array('Rock', 'Paper', 'Scissors');
            $computer = $options[rand(0, 2)];
            
            //game options

            if ($_POST['human'] == 'Select') {
                    echo "<pre>Please select a strategy and press Play.</pre>";
            } elseif ($_POST['human'] == 'Test') {
                for ($c = 0; $c < 3; $c++) {
                    for ($h = 0; $h < 3; $h++) {
                        $r = check($options[$c], $options[$h]);
                        echo $r;
                    }
                }
            }


            if (isset($_POST['play'])) {
                    echo check($computer, $_POST['human']);
            }
                        
            function check($computer, $human)
            {
                $optionWin = ($human == 'Scissors' && $computer == 'Paper') || ($human == 'Paper' && $computer == 'Rock') || ($human == 'Rock' && $computer == 'Scissors');

                $optionLose = ($human == 'Paper' && $computer == 'Scissors') || ($human == 'Rock' && $computer == 'Paper') || ($human == 'Scissors' && $computer == 'Rock');

                $stdprint = "You chose $human. Computer chose $computer. ";
                $game = array('win', 'loose', 'tie');

                if ($computer === $human) {
                    return "<pre>".$stdprint.$game[2]."!"."</pre>"; //tie
                } elseif ($optionWin) {
                    return "<pre>".$stdprint. "You ".$game[0]."!"."</pre>"; //win
                } elseif ($optionLose) {
                    return "<pre>".$stdprint."You ".$game[1]."!"."</pre>"; //lose
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