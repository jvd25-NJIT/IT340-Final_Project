<?php
session_start(); /* Creates a session, allows user data to be remembered and temporarily stored in memmory */

/* if statement makes sure that the user clicked the button (through a "post request") and not a 
get request like putting a URL into the search bar*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* takes whatever input the user put in the email address section of the form and stores it 
    in a variable*/
    $email = $_POST['email_address'];
    /* takes whatever input the user put in the password section of the form and stores it 
    in a variable, doesn't differentiate between register and login forms yet*/
    $password = $_POST['password'];

    /* creates a variable to differentiate between register and login forms. isset checks 
    if the variable name 'register' is true, will choose "register" or "login" depending on the
    variable name given in the submit button*/
    $action_type = isset($_POST['register']) ? "register" : "login";

    /* putting all of the data collected through post request into an array to be delivered to the backend 
    instead of sending three separate messages */
    $post_data = array(
        'action' => $action_type,
        'email' => $email,
        'password'=> $password
    );

    /* specifiying the location of the backend where the data is to be sent: static IP of Backend (VM2) 
    in the host-only VLAN*/
    $backend_url = "http://192.168.112.20/auth_api.php";
    
    /* starts up the curl tool, specifies the backend url that is to be connected, and saves the
    active connection in the variable*/
    $curl = curl_init($backend_url);

    


    /* curl set opt is set option, this line basically specifies that data will be sent to the URL
    through a post request */
    curl_setopt($curl, CURLOPT_POST, true);

    /* translates raw php array in a text string that http can understand, CURLOPT_POSTFIELDS puts the
    string into the outgoing POST request */
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));

    /* this command makes sure that the backend's reply doesn't automatically display on the user's webpage,
    it recieves it silently as a string and can be saved into a variable*/
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    



    /* enough formatting the post request through curl, this command actually executes and 
    sends the request, which saves the response into a variable*/
    $response = curl_exec($curl);

    /* checks whether the value/data type false was received, which indicates that connecting to the
    backend failed, stops the rest of the code from running and shows the error message */
    if ($response === false) {
        die("Error connecting to backend: " . curl_error($curl));
    }

    /* close the curl connection to free up memory*/
    curl_close($curl);

    /* for now, this is show what auth_api.php responded with. will be replaced once I code auth_api.php*/
    echo "Backend responded with: " . $response;
}


?>