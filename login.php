<?php
$serverName = "LAPTOP-RGO8G4BC";
$connectionOptions = [
    "Database" => "WEBAPP",
    "Uid" => "",
    "PWD" => ""
];

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["Username"];
    $password = $_POST["Password"];

    // Check if the user exists
    $query = "SELECT * FROM ACCOUNTS WHERE USERNAME = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        // Handle query error
        die(print_r(sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($row) {
        // User exists, check the password
        if ($password == $row["PASSWORD"]) { // Note: You should use password_hash() and password_verify() for secure password handling
            // Successful login
            echo "Successful login";
        } else {
            // Invalid password
            echo "Invalid login";
        }
    } else {
        // User does not exist
        echo "Invalid login";
    }

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
?>