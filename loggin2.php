<!-- author: Keith Djouba -->
<!-- December 10, 2017 -->
<?php
// to get data stored in a session, you must let the browser know to start a session
session_start();
// then take data values and stor them into a session variable ...
$_SESSION["host"] = $_POST["host"];
$_SESSION["user"] = $_POST["user"];
$_SESSION["passw"] = $_POST["password"];
$send = $_SESSION["host"];
$host = $_POST["host"];
$user = $_POST["user"];
$pass = $_POST["password"];
//remember, for our purposes the DB is the same as the username ...
$dbName = $user;
// build the connection ...
echo "Attempting to connect to DB server: $send ...";
$conn = mysqli_connect($host, $user, $pass, $dbName);
if (!$conn)
	// die is a php function that terminates execution.
	//   the . means string concatenation in php.
	die("Could not connect:".mysqli_connect_error());
else
	echo " connected!<br>";
// try and create the table (if it does not exist) ...
$queryString = "create table if not exists inventaryTable".
               " (ingredient char(100), Quantity integer,".
               " primary key (ingredient))";
 $status = mysqli_query($conn, $queryString);
 // if wrong Query
  if (!$status)
    die("Error creating table: " . mysqli_error($conn));
// try and create the table (if it does not exist) ...
$queryString = "create table if not exists recipeTable".
               " (recipeName char(200), ingredient char(100), Quantity integer,".
               " primary key (recipeName, ingredient))";
$status = mysqli_query($conn, $queryString);
// if wrong Query
if (!$status)
    die("Error creating table: " . mysqli_error($conn));
echo "<a href=MainMenu.html>Go here</a>, and see how to get at the session variables in a different php file ...</a>";
// close the connection (to be safe)
mysqli_close($conn);
?>
