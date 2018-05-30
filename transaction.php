<!-- author: Keith Djouba -->
<!-- December 10, 2017 -->
<?php
// to get data stored in a session, you must let the browser know to start a session
session_start();
$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["user"]);
// Declaring Variables needed
$recipeName = $_POST["recipeName"];
// try and update transaction
$queryString = "update inventaryTable I, recipeTable R  set I.Quantity = I.Quantity - R.Quantity".
               " where I.ingredient = R.ingredient AND  recipeName= \"$recipeName\"";
echo "Transaction completed!";
$status = mysqli_query($conn, $queryString);
if (!$status)
    die("Error performing insertion: " . mysqli_error($conn));
    echo "<a href=MainMenu.html>Main menu</a>";
    // close the connection (to be safe)
mysqli_close($conn);
?>
