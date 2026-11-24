<?php 
/* connects user to session memory so that the website knows if the user is logged in */
session_start();

/* if the session does not have a logged in user, send him or her to login.php*/
if (!isset($_SESSION['user'])){

    header("Location: login.php");

    exit();

}

/* granted the user is logged in, take his email so that we can show them their name in dashboard */
$email_name = $_SESSION['user'];




require_once 'main.inc.php'; ?> <!-- pulls up info from main to link nav bar and css styling -->

<h2>Welcome to your Dashboard, <?php echo htmlspecialchars($email_name) ?></h2> <!-- shows a message that welcomes the user -->
<br>

<h3>My Binders: </h3> <!-- naming convention for stored folders of notes -->

<ul> <!-- uses an unordered list for place holders -->
    <li>IT 340</li>
    <li>IT 330</li>
    <li>IT 331</li>
</ul>

<p>Finished writing notes? <a href = "logout.php">Logout</a></p>

</body>
</html> <!-- closes the html and body header made in main.inc.php just so it doesn't break or cause an error-->

