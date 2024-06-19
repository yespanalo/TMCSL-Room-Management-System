<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $isactive = 0; 
    $department_id = $_POST['department_id'];

    $sql = "INSERT INTO users (username, password, role, isactive, department_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $username, $password, $role, $isactive, $department_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "Failed to register user.";
    }
}
?>
