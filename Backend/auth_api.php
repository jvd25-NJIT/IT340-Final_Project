<?php

/* copies and pastes everything from database.php so this code file can access the database */
require_once 'database.php';

/* this makes sure that the user actually sent a POST request*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* this is retrieving and unpackaging what I put into the POST request array from validate.inc.php*/
    $action = $_POST['action'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    /* if the user somehow manages to bypass the HTML filtering and puts empty input, this stops it */
    if (empty($email) || empty($password)){
        die("Error: Email and password are needed.");
    }
 

    /* Option 1: The user clicked "Register" button from Register page*/
    if ($action === "register"){

        /* I need this so that the database stores hashed passwords and not plain text passwords*/
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        /* try and catch block makes sure errors are caught without crashing the program*/
        try {

            /* make a fill in the blank statement to stop SQL injections */
            $stmt = $pdo->prepare("INSERT INTO users (email, password_hash) VALUES (?, ?)");

            $stmt->execute([$email, $hashed_password]);

            echo "Account successfully created for $email. You may now log in.";

        } catch (PDOException $e) {

            /* 23000 is mySQL error code for a duplicate entry, else block catches any other errors*/
            if ($e->getCode() == 23000){
                echo("Error: An account with that email exists already.");
            }
            else{
                /* makes error log and shows user message*/
                error_log("Register Database error: " . $e->getMessage()); 

                echo "Sorry, something went wrong when trying to register your account. Please try again later.";
            }


        }

    }

    /* Option 2: The user clicked "Login" instead*/
    elseif ($action === "login"){

        /* if the user puts the wrong info, the program catches the error instead of crashing*/
        try {

            /* Like register option, it premakes a fill in the blank query to stop SQL injections*/
            $stmt = $pdo->prepare("SELECT password_hash FROM users WHERE email = ?");
            $stmt->execute([$email]);

            /* saves the whole row of data which the database found and turns up empty if user does not exist */
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            /* checks if the user row in the database exists and if the password matches 
            with password_verify*/
            if ($user && password_verify($password, $user['password_hash'])){

                echo "Success: Login authenticated!";

            }
            else{
                echo "Error: Invalid email or password.";
            }

        } catch (PDOException $e) {
            /* makes error log and shows user message*/
            error_log("Login Database error: " . $e->getMessage());

            echo "Sorry, something went wrong when trying to login your account. Please try again later.";
        }

    }

    /* Option 3 (Wildcard): THE USER ISN'T LOGGING IN OR REGISTERING?! WHAT?!
    just in case though*/
    else{
        echo "Error: Invalid action.";
    }
} 

/* this happens if the user puts a GET request or types the username and password into the url*/
else {
    echo "Error: Only POST requests are allowed.";
}


?>