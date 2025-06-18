<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Student Records</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="index.css">
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
   CvSU Student Information
</nav>

<div class="container">
   <?php if (isset($_GET['msg'])): ?>
      <div class="alert alert-success" role="alert">
         <?= $_GET['msg']; ?>
      </div>
   <?php endif; ?>

   <a href="create_user.php" class="btn btn-success mb-3">Add New Student</a>

   <table class="table table-bordered text-center">
      <thead class="table-success">
         <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $sql = "SELECT student_tb.id, first_name, last_name, email, gender, department_name 
                 FROM student_tb 
                 LEFT JOIN department_tb ON student_tb.department_id = department_tb.department_id";
         $result = mysqli_query($conn, $sql);

         while ($row = mysqli_fetch_assoc($result)) {
         ?>
            <tr>
               <td><?= $row['id'] ?></td>
               <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
               <td><?= $row['email'] ?></td>
               <td><?= ucfirst($row['gender']) ?></td>
               <td><?= $row['department_name'] ?></td>
               <td>
                  <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                  <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
</div>
<!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>


