<?php

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//set charset to utf-8
$conn->set_charset("utf8");

$sql = "SELECT type, COUNT(*) as organization_count FROM organization GROUP BY type ORDER BY type";

$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
  // Loop through the data and display it in the table
  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['organization_count'] . "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='2'>No data available</td></tr>";
}


$conn->close();
?>