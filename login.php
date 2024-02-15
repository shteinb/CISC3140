<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection parameters
    $servername = "localhost"; // Change to your MySQL server name
    $username_db = "root"; // Change to your MySQL username
    $password_db = ""; // Change to your MySQL password
    $dbname = "userauth"; // Change to your database name

    // Create a connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute a SQL query to check login credentials
    $sql = "SELECT id, username, password FROM Users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            echo "Login successful!"; // You can redirect the user here
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Username not found";
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>
