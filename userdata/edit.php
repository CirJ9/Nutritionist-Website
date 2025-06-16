<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $time_joined = $_POST['time_joined'];
  $role = $_POST['role'];

  $sql = "UPDATE `users_data` SET 
            `name`='$name', 
            `email`='$email', 
            `password`='$password', 
            `time_joined`='$time_joined', 
            `role`='$role' 
          WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="db.css">

  <title>CvSU Student Information</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    CvSU Student Information
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `users_data` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="mb-3">
          <label class="form-label">Full Name:</label>
          <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Password:</label>
          <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Time Joined:</label>
          <input type="datetime-local" class="form-control" name="time_joined" 
            value="<?php echo date('Y-m-d\TH:i', strtotime($row['time_joined'])); ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Role:</label>
          <select class="form-select" name="role">
            <option value="user" <?php echo ($row['role'] == 'user') ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?php echo ($row['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
