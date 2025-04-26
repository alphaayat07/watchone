<?php
include 'db.php'; // upar wala connection file

$sql = "SELECT * FROM ctrl_database"; // apne table ka sahi naam do
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>{$row['title']}</h2>";
        echo "<img src='{$row['thumb']}' width='200'><br>";
        echo "<p>{$row['description']}</p>";
        echo $row['iframe'];
    }
} else {
    echo "No data found.";
}
?>
