<?php
//set up the connection to the database using your credetials
// mine are save on a different php file.
// include the document here
include 'connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//we will create a preparatory comand to prepare the SQL
$sql = "INSERT INTO `subscribercount` (ID, fnamle, email, channel, phone, pword, `hash`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// bind the parameters to the variables
$param1 = "";
$param2 = "Edgardo Angeles";
$param3 = "angelesedgardo17@gmail.com";
$param4 = "ytuniversity";
$param5 = "09494055685";
$param6 = "1111";
$param7 = "0000";
// i= integer
// S= string
$stmt->bind_param("issssss", $param1, $param2, $param3, $param4, $param5, $param6, $param7);
//try to excecute the statement and catch the errors if any.
//use try and catch method
try {
    $stmt->execute();
    echo "New record created successfully";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();

}
//close the statement and the connection
$stmt->close();
$conn->close();
?>