<?php
require_once 'Database.php';
require_once 'User.php';

$db = (new Database())->connect();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';

    if ($user->create($name, $email, $course)) {
        header("Location: index.php?msg=New record created successfully");
        exit;
    } else {
        echo "Error creating record.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="db.css">
</head>
<body>
    <div class="container mt-5">
        <form method="POST">
            <h3>Create New User</h3>
            <p class="text-muted">Fill in the details below</p>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>