<?php
$serverName = "LAPTOP-RGO8G4BC";
$connectionOptions = [
    "Database" => "WEBAPP",
    "Uid" => "",
    "PWD" => ""
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $verifyPassword = $_POST["verifyPassword"];

    // Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Please enter a valid email address.";
    } elseif ($password != $verifyPassword) {
        echo "Error: Passwords do not match. Please try again.";
    } else {
        // Passwords match, proceed with registration
        // In a real-world scenario, you should use password_hash() to securely store passwords

        // Insert user data into the database
        $query = "INSERT INTO ACCOUNTS (USERNAME, PASSWORD) VALUES (?, ?)";
        $params = array($email, $password);

        $stmt = sqlsrv_query($conn, $query, $params);

        if ($stmt === false) {
            // Handle query error
            die(print_r(sqlsrv_errors(), true));
        }

        // Redirect to success.html
        header("Location: success.html");
        exit(); // Ensure that script execution stops after the redirect
    }

    sqlsrv_close($conn);
}
?>
