<?php
include "db_conn.php";
$id = $_GET["id"];

// Handle form submission
if (isset($_POST["submit"])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $department_id = $_POST['department_id'];

  $sql = "UPDATE student_tb SET 
            first_name = '$first_name',
            last_name = '$last_name',
            email = '$email',
            gender = '$gender',
            department_id = $department_id 
          WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

// Fetch current student data
$sql = "SELECT * FROM student_tb WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="db.css">
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
   Edit Student Record
</nav>

<div class="container">
  <form method="post" style="width:50vw; min-width:300px;" class="mx-auto">
    <div class="row mb-3">
      <div class="col">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name" value="<?= $row['first_name'] ?>" required>
      </div>
      <div class="col">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="<?= $row['last_name'] ?>" required>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" required>
    </div>

    <div class="form-group mb-3">
      <label>Gender</label><br>
      <input type="radio" name="gender" value="male" <?= $row['gender'] == 'male' ? 'checked' : '' ?>> Male
      <input type="radio" name="gender" value="female" <?= $row['gender'] == 'female' ? 'checked' : '' ?>> Female
    </div>

    <div class="mb-3">
      <label class="form-label">Department</label>
      <select class="form-select" name="department_id" required>
        <option disabled>Select department</option>
        <?php
        $dept_sql = "SELECT * FROM department_tb";
        $dept_result = mysqli_query($conn, $dept_sql);
        while ($dept = mysqli_fetch_assoc($dept_result)) {
          $selected = $dept['department_id'] == $row['department_id'] ? 'selected' : '';
          echo "<option value='{$dept['department_id']}' $selected>{$dept['department_name']}</option>";
        }
        ?>
      </select>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
