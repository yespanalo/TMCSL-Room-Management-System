<?php
include './includes/db.php';

$sql = "SELECT department_id, department_name FROM departments";
$result = $conn->query($sql);

$departments = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100 flex-column">
        <div class="text-center mb-4">
            <img src="assets/images/TMCSL_LOGO.png" alt="Logo" class="logo" />
        </div>
        <div class="login-container p-4">
            <div class="text-left">
                <h2 class="my-3">Registration</h2>
            </div>
            <form action="pages/register_process.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="clerk">Clerk</option>
                        <option value="housekeeping">Housekeeping</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" id="department" name="department_id" required>
                        <?php foreach ($departments as $department): ?>
                            <option value="<?= $department['department_id'] ?>"><?= $department['department_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="isactive" value="0">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <a href="login.html" class="btn btn-link btn-block">Back to Login</a>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
