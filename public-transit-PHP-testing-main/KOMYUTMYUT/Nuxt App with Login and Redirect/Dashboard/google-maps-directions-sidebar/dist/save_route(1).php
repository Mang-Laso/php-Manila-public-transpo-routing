<?php
session_start();

include_once 'database.php';

// Assign foreign key from $_SESSION to $user
$user = $_SESSION['user_id'];

// Retrieve user inputs from $_POST
$origin = $_POST["origin_2"];
$destination = $_POST["destination_2"];
$save_index = $user . "_2"; // Concatenate user ID with the desired constant value

// Check if the save_index is already occupied for the user
$existingQuery = "SELECT COUNT(*) FROM save_route WHERE save_index = ? AND id = ?";
$stmtExisting = $mysqli->prepare($existingQuery);
$stmtExisting->bind_param("si", $save_index, $user);
$stmtExisting->execute();
$stmtExisting->bind_result($count);
$stmtExisting->fetch();
$stmtExisting->close(); // Close the result set

if ($count > 0) {
    // Handle the case when the save_index is already occupied for the user
    echo "Save index is already occupied for the user.";

    header("refresh:5; url=index.php");
    exit;
} else {
    // Prepare and execute the query with prepared statements
    $query = "INSERT INTO save_route (id, origin, destination, save_index)
              VALUES (?, ?, ?, ?)";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("isss", $user, $origin, $destination, $save_index);
    $stmt->execute();
    $stmt->close(); // Close the statement

    header("Location: index.php?save_route_2=success");
    exit;
}
?>