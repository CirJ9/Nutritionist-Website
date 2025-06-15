<?php
require_once 'Database.php';
require_once 'User.php';

$db = (new Database())->connect();
$user = new User($db);

$stmt = $db->query("SELECT * FROM student_tb ORDER BY id DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
$msg = $_GET['msg'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link rel="stylesheet" href="db.css">
    <style>
        .container { padding: 40px; }
        table { width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 9px 30px rgba(0, 0, 0, 0.09); border-radius: 12px; overflow: hidden; }
        th, td { padding: 14px 20px; text-align: left; border-bottom: 1px solid #ccc; }
        th { background-color: #26a69a; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Student List</h3>
        <?php if ($msg): ?>
            <p class="text-muted"><?= htmlspecialchars($msg) ?></p>
        <?php endif; ?>
        <a href="create_user.php" class="btn btn-success">Add New</a><br><br>
        <table>
            <thead>
                <tr>
                    <th>#</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($users): foreach ($users as $index => $row): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['course']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-success">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="5">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>