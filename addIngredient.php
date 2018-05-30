<!-- author: Keith Djouba -->
<!-- December 10, 2017 -->
<?php
// to get data stored in a session, you must let the browser know to start a session
session_start();
$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["user"]);
// Declaring Variables needed
$ingredient = $_POST["ingredient"];
$Quantity = $_POST["Quantity"];
// assum the table exists (might not be a good idea, depending on context)
// try and insert request
$queryString = "insert into inventaryTable".
               " values (\"$ingredient\", $Quantity)";
echo "Ingredient Added!";
$status = mysqli_query($conn, $queryString);
// if inserting wrong Queries
if (!$status)
    die("Error performing insertion: " . mysqli_error($conn));
echo "<a href=MainMenu.html>Main menu</a>";
// close the connection (to be safe)
mysqli_close($conn);

?>
