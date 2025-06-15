<?php
require_once 'Database.php';
require_once 'User.php';

$db = (new Database())->connect();
$user = new User($db);

$id = $_GET['id'] ?? null;
$row = $user->getUserById($id);

if (!$row) {
    echo "User not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $course = $_POST['course'] ?? '';

    if ($user->update($id, $name, $email, $course)) {
        header("Location: index.php?msg=Record updated successfully");
        exit;
    } else {
        echo "Error updating record.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="db.css">
</head>
<body>
    <div class="container mt-5">
        <form method="POST">
            <h3>Edit User</h3>
            <p class="text-muted">Update the information</p>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" value="<?= htmlspecialchars($row['course']) ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</body>
</html>