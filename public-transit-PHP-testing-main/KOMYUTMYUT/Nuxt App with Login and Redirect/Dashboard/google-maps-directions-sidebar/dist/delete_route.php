<?php
session_start();

include_once 'database.php';

// Assign foreign key from $_SESSION to $user
$user = $_SESSION['user_id'];

// Construct the save_index value
$save_index = $user . "_1";

// Prepare and execute the query with prepared statements
$query = "DELETE FROM save_route WHERE id = ? AND save_index = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("is", $user, $save_index);
$stmt->execute();
$stmt->close();

// Redirect the user back to the index page after deleting the row
header("Location: index.php?save_route_1=deleted");
exit;
?>
