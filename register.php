<!-- register.php is very similar to login.php-->

<?php require_once 'main.inc.php'; ?> <!-- pulls up info from this file to link nav bar and css styling -->

<h2>Register to Vocality</h2> <!-- prints a message that prompts users to register and make an account -->

<form name = "register" action = "register.php" method = "post"> <!-- uses form tag to create input fields, 
labels it "register",  sends info to register.php, "post" specifies it as a web request -->
    <label>Email: </label>
    <input type="text" name="email_address" size="20" required> <!-- specifies input as text, names it
    "email_address", and gives it parameters -->

    <label>Password: </label>
    <input type="password" name="password" size="20" required> <!-- same as email section but asking for 
    password and doesn't show in plain text-->

    <input type = "submit" value = "Register"> <!-- makes a submit button -->

    <br>
    <br>

    <p>Have an account already? <a href = "login.php">Login here</a></p> <!-- brings user back to login page -->
</form>

</body>
</html> <!-- closes the html and body header made in main.inc.php just so it doesn't break or cause an error-->
