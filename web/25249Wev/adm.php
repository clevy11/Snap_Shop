<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli('localhost', 'root', '', '');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Get form data
$Firstnames = isset($_POST['Fname']) ? $_POST['Fname'] : '';
$lastnames = isset($_POST['Lname']) ? $_POST['Lname'] : '';
$CAddress = isset($_POST['CAddress']) ? $_POST['CAddress'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$Phone = isset($_POST['Phone']) ? $_POST['Phone'] : '';
$Gender = isset($_POST['Gender']) ? $_POST['Gender'] : '';
$District = isset($_POST['district']) ? $_POST['district'] : '';
$DOB = isset($_POST['DOB']) ? $_POST['DOB'] : '';


// Insert data into the database
$sql = "INSERT INTO admission (Firstnames, lastnames, CAddress, email,
 Phone, Gender, District,DOB) 
VALUES ('$Firstnames','$lastnames','$CAddress','$email', '$Phone', '$Gender', '$District', '$DOB')";

if ($conn->query($sql) === TRUE) {
    echo "New record inserted ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
