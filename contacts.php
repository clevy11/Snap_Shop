<?php
require 'contact.html';

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone_number"];
        $message = $_POST["message"];

        if (!empty($name) && !empty($email) && !empty($message)) {
            $host = "localhost";
            $user = "root";
            $database = "contact";

            $conn = new mysqli($host, $user, "", $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Thank you for contacting us! We will reach out to you soon.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        } else {
            echo "Please fill out all the required fields.";
        }
    } else {
        echo "Invalid request method.";
    }
}
?>
