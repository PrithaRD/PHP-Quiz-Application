<?php
//Connection to database
$db_host = "localhost";
$db_name = "quizzer";
$db_user = "root";
$db_pass = "";

//Create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Error handler
if($mysqli->connect_error){
printf("Connection failed: %s\n", $mysqli->connect_error);
exit();	
}

/* $link = mysqli_connect("localhost", "root", "", "quizzer");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The quizzer database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link); */
?>