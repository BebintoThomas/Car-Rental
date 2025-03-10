<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carren";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phoneno = $_POST["phoneno"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>
                alert('Passwords do not match!');
                window.location.href='signup.php';
              </script>";
        exit();
    }

    // Insert data into the database
    $sql = "INSERT INTO registration (username, phoneno, email, password, confirm_password) 
            VALUES ('$name', '$phoneno', '$email', '$password', '$confirm_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Registration successful!');
                window.location.href='microsign.php'; // Redirect to login page
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.location.href='signup.php';
              </script>";
    }
}

$conn->close();
?>
