<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $time_joined = $_POST['time_joined'];
   $role = $_POST['role'];

   $sql = "INSERT INTO users_data (name, email, password, time_joined, role)
           VALUES ('$name', '$email', '$password', '$time_joined', '$role')";

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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="db.css">

   <title>CvSU Student Information</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      Nutritionist
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label class="form-label">Name:</label>
               <input type="text" class="form-control" name="name" placeholder="Juan Dela Cruz" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:</label>
               <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Password:</label>
               <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Time Joined:</label>
               <input type="datetime-local" class="form-control" name="time_joined" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Role:</label>
               <select class="form-select" name="role" required>
                  <option value="" disabled selected>Select role</option>
                  <option value="User">User</option>
                  <option value="Admin">Admin</option>
               </select>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

