<?php

/* setting up login credentials for database: who to ping, what database to access, which user in the 
database to connect to + password */
$host = '192.168.112.30';
$dbname = 'vocality';
$username = 'jester_admin';
$password = 'V0c@l1ty!J3st3r#99';

/* try and catch block basically ensures that if establishing a connection with the database doesn't
work, it gives us an error message rather that it crashing */
try {

    /* PDO means php data object, this sets up the connection with the database 
    using the credentials from before */
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    /* this command throws an error message if a query fails */
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e){
    /* gives the error message and logs it (through Apache logging directory in this case) */
    error_log("Database Connection Failed: " . $e->getMessage());

    die("Sorry, we are having technical difficulties right now. Please try again later.");
}

?>