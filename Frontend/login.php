<?php require_once 'main.inc.php'; ?> <!-- pulls up info from this file to link nav bar and css styling -->

<h2>Login to Vocality</h2> <!-- prints a message that prompts users to login to their account -->

<form name = "login" action = "login.php" method = "post"> <!-- uses form tag to create input fields, 
labels it "login",  sends info to login.php, "post" specifies it as a web request -->
    <label>Email: </label>
    <input type="text" name="email_address" size="20" required> <!-- specifies input as text, names it
    "email_address", and gives it parameters -->

    <label>Password: </label>
    <input type="password" name="password" size="20" required> <!-- same as email section but asking for 
    password and doesn't show in plain text-->

    <input type = "submit" value = "Login"> <!-- makes a submit button -->

    <br>
    <br>

    <p>Don't have an account? <a href = "register.php">Register here</a></p> <!-- brings user to register page -->
</form>

</body>
</html> <!-- closes the html and body header made in main.inc.php just so it doesn't break or cause an error-->
