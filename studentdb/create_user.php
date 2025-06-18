<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];
   $department_id = $_POST['department_id'];

   $sql = "INSERT INTO student_tb (first_name, last_name, email, gender, department_id)
           VALUES ('$first_name', '$last_name', '$email', '$gender', $department_id)";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Add Student</title>
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="db.css">
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
   CvSU Student Information
</nav>

<div class="container">
   <div class="text-center mb-4">
      <h3>Add New Student</h3>
   </div>

   <form method="post" style="width:50vw; min-width:300px;" class="mx-auto">
      <div class="row mb-3">
         <div class="col">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" required>
         </div>
         <div class="col">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" required>
         </div>
      </div>

      <div class="mb-3">
         <label class="form-label">Email</label>
         <input type="email" class="form-control" name="email" required>
      </div>

      <div class="form-group mb-3">
         <label>Gender</label><br>
         <input type="radio" name="gender" value="male" required> Male
         <input type="radio" name="gender" value="female" required> Female
      </div>

      <div class="mb-3">
         <label class="form-label">Department</label>
         <select class="form-select" name="department_id" required>
            <option selected disabled value="">Select department</option>
            <?php
            $dept_sql = "SELECT * FROM department_tb";
            $dept_result = mysqli_query($conn, $dept_sql);
            while ($dept = mysqli_fetch_assoc($dept_result)) {
               echo "<option value='{$dept['department_id']}'>{$dept['department_name']}</option>";
            }
            ?>
         </select>
      </div>

      <button type="submit" name="submit" class="btn btn-success">Save</button>
      <a href="index.php" class="btn btn-danger">Cancel</a>
   </form>
</div>
<!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
