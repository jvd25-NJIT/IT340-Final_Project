Developer Notes:
- login.php: handles login information of user and prompts for email and password
- register.php: similar to login.php but will actually create an account instead of validating it
- home.php: shows the home page with placeholders for now in Milestone 1
- main.inc.php: creates the nav bar at the top, links all of the pages together, and connects css styling
- styles.css: dictates the style of the webpage, changes default fonts and colors
- validate.inc.php: takes the input from the login/register form and packages it as a POST request for auth_api.php
- UserStatements.sql: creates the actual Vocality database and user table
- database.php: serves as the connection with the database
- auth_api.php: takes the POST request from validate.inc.php and talks through the database through the connection to authenticate users