<?php

session_start();

include_once 'database.php';

// Assign foreign key from $_SESSION to $user
$user = $_SESSION['user_id'];

// Retrieve user inputs from $_POST
$origin = $_POST["origin_1"];
$destination = $_POST["destination_1"];
$feedback = $_POST["feedback_1"];

if (empty($origin) || empty($destination) || empty($feedback)) {
    // Handle the case when any input is blank
    echo "Please fill in all fields.";

    header("refresh:5; url=index.php");
    exit;

} else {

// Prepare and execute the query with prepared statements
$query = "INSERT INTO feedbacks (id, origin, destination, feedback)
          VALUES (?, ?, ?, ?)";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("isss", $user, $origin, $destination, $feedback);
$stmt->execute();

header("Location: index.php?feedback_1=success");
exit;
}

/*if(isset($_POST['submit']))
{

    $origin=$_POST["address-one"];
    $destination=$_POST["address-two"];
    $feedback=$_POST["feedback_input"];

}

$sql = "INSERT INTO 'feedbacks' ('origin', 'destination', 'feedback')
		VALUES ('$origin', '$destination', '$feedback')";
$insert = mysqli_query($conn, $sql);
if(!$insert)
{

    echo "there are some problem while inserting data";

} else
{

    echo "Data successfully inserted.";

}*/
