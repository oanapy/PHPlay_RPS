<!DOCTYPE html>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<!-- Custom styles for this template -->
		<link href="starter-template.css" rel="stylesheet">
		<title>Login Page</title>
	</head>
	<body>
		<div class="container">
			<h1>Please Log In</h1>
			<form method="POST">
				<label for="nam">User Name</label>
				<input type="text" name="name" id="nam"><br/>
				<label for="id_1723">Password</label>
				<input type="password" name="password" id="id_1723"><br/>
				<input type="submit" name="login" value="Log In">
				<input type="submit" name="cancel" value="Cancel">
			</form>
			<?php
            // Required field names
            $required = array('name', 'password');
            // Loop over field names, make sure each one exists and is not empty
            $error = false;
            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $error = true;
                }
            }
            if ($error) {
                echo "All fields are required.";
            }

            // if (isset($_POST['password'])) {
            //     $salt =  "XyZzy12*_";
            //     $salted_pass = $_POST['password'].$salt;
            //     $md5 = hash('md5', $salted_pass);
          
            // }
            //
            $credentials = array($_Post['name'], $_POST['password']);
            
            //after login button is pressed check th below stuff
            if (isset($_POST['login'])) {
                if ($_POST["name"] === "aona" && $_POST["password"] === 'php123') { //to be replaced with $hashed_password in the future. php123 is the pass for now
                    header("Location: game2.php?name=".urlencode($_POST['name']));
                } else {
                    echo "Wrong username or password";
                }
            }


            ?>
            <p>
                <!-- Hint: The password is the three character name of the
                programming language used in this class (all lower case)
                followed by 123. -->
            </p>
        </div>
    </body>