<!DOCTYPE html>
<head>
    <title>Komyunity feedback</title>
    <style type="text/css">
        table
        {
            border-collapse: collapse;
            width: 100%;
            color: #588c7e;
            font-family: monospace;
            font-size: 18px;
            text-align: left;
        }
        th
        {
            background-color: #588c7e;
            color: white;
        }
        tr:nth-child(even) {background-color: #f2f2f2}
    </style>
</head>
<body>
<table>
    <tr>
        <!-- <th width = 5%>Feedback #</th> -->
        <th width = 15%>Date</th>
        <th width = 20%>Origin</th>
        <th width = 20%>Destination</th>
        <th width = 40%>Feedback</th>
<?php
$conn = mysqli_connect("localhost", "root", "", "login_db");
if ($conn -> connect_error)
{

    die("Connection failed:" . $conn-> connect_error);

}

$sql = "SELECT feedback_id, date_today, origin, destination, feedback from feedbacks ORDER BY date_today DESC;";
$result = $conn-> query($sql);
if($result-> num_rows > 0)
{

    while ($row = $result-> fetch_assoc())
    {

        echo "<tr><td>". $row["date_today"] . "</td><td>" . $row["origin"] ."</td><td>". 
        $row["destination"] . "</td><td>". $row["feedback"] ."</td></tr>";

    }
    echo "</table>";

} else
{

    echo "No results.";

}
?>

</table>
</body>
</html>