<?php

include '../config/db_connection.php';

// define variables and set to empty values
$email = $first_name = $last_name = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST["email"]);
    $first_name = test_input($_POST["first_name"]);
    $last_name = test_input($_POST["last_name"]);
    $password = test_input($_POST["password"]);
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

print_r($email);
print_r( $first_name);
print_r( $last_name);
print_r($password);  

//salt and hash the password
$password = password_hash($password, PASSWORD_DEFAULT);


// Prepare the SQL statement with placeholders
$sql = "INSERT INTO users (email, first_name, last_name, password) VALUES (?, ?, ?, ?)";

// Create a prepared statement
$stmt = $conn->prepare($sql);

// Bind parameters to the statement
$stmt->bind_param("ssss", $email, $first_name, $last_name, $password);

// Execute the statement
if ($stmt->execute()) {
echo "New record created successfully";
redirect('login.php');
} else {
echo "Error: " . $stmt->error;
}


// Close the statement and connection
$stmt->close();
$conn->close();

?>