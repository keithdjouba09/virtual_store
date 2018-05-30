<!-- author: Keith Djouba -->
<!-- December 10, 2017 -->
<?php
// to get data stored in a session, you must let the browser know to start a session
session_start();
$conn = mysqli_connect($_SESSION["host"], $_SESSION["user"], $_SESSION["passw"], $_SESSION["user"]);
$recipeName = $_POST["recipeName"];
// assum the table exists (might not be a good idea, depending on context
// find all matching author data
$queryString = "select recipeName, ingredient, Quantity from recipeTable".
               " where recipeName=\"$recipeName\"";
$status = mysqli_query($conn, $queryString);
if (!$status)
    die("Error running query: " . mysqli_error($conn));
// create table column
echo "<table border=1>";
echo "<tr> <th>Recipe</th> <th>Ingredient Title</th> <th>Quantity</th> </tr>";
// testing
/*for ($row = mysqli_fetch_assoc($status);
     $row !=0;
     $row = mysqli_fetch_assoc($status)) */
// inserting rows to the table
while($row = mysqli_fetch_assoc($status))
    {
        echo "<tr> <td>".$row["recipeName"]."</td>".
                  "<td>".$row["ingredient"]."</td>".
                  "<td>".$row["Quantity"]."</td> </tr>";
    }
//close the table
echo "</table>";
// close the connection (to be safe)
mysqli_close($conn);
?>
