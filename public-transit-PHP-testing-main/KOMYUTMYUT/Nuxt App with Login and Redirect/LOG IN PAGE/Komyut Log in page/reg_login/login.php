<?php

if($_SERVER["REQUEST_METHOD"] === "POST")
{

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM users
                    WHERE username = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));

    $result = $mysqli->query($sql);

    $users = $result->fetch_assoc();

    if($users)
    {

        if(password_verify($_POST["password"], $users["password_hash"]))
        {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $users["id"];

            echo("Successfully logged in!");
            header("refresh:5; url=../../../Dashboard/google-maps-directions-sidebar/dist/index.php");
            exit;

        } else
        {

            echo("Invalid credentials!");
            header("refresh:5; url=login_register.html");

        }

    }

    //Testing
    //var_dump($users);
    //exit;

}
