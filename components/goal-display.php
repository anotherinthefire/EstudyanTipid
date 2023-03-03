<?php
// Establish a database connection
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "estudyantipid"; // Change this to the name of your database

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select all data from the goal table
$sql = "SELECT * FROM goal";
$result = mysqli_query($conn, $sql);

// Check if any data is returned
if (mysqli_num_rows($result) > 0) {
    // Output the data in a table
    echo "<table>";
    echo "<tr><th>GID</th><th>Goal Title</th><th>Goal Target Amount</th><th>Balance</th><th>Goal Deadline Date</th><th>Status</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
    <td>" . $row["gid"] ."
    </td>
    <td>" . $row["gtitle"] . "
    </td>
    <td>" . $row["gtamount"] . "</td><td>" . $row["balance"] . "</td><td>" . $row["gddate"] . "</td><td>" . $row["status"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

// Close the database connection
mysqli_close($conn);
?>