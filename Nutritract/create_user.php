<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   // Collect form inputs
   $meal_name = $_POST['meal_name'];
   $food_name = $_POST['food_name'];
   $kilograms = $_POST['kilograms'];
   $calories = $_POST['calories'];
   $protien = $_POST['protein'];
   $carbohydrates = $_POST['carbohydrates'];

   // Insert into database
   $sql = "INSERT INTO `nutritract` (`meal_name`, `food_name`, `kilograms`, `calories`,`protein`,`carbohydrates`) 
           VALUES ('$meal_name', '$food_name', '$kilograms', '$calories','$protein','$carbohydrates')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
      exit();
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

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="db.css">

   <title>CvSU Student Information</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      NUTRITRACT
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Nutritract Form</h3>
         <p class="text-muted">Add new nutritract build</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Meal Name:</label>
                  <input type="text" class="form-control" name="meal_name" placeholder="Meal Name" required>
               </div>

               <div class="col">
                  <label class="form-label">Food Name:</label>
                  <input type="text" class="form-control" name="food_name" placeholder="Food Name" required>
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Kilograms:</label>
               <input type="number" step="0.01" class="form-control" name="kilograms" placeholder="Kilograms" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Calories:</label>
               <input type="number" class="form-control" name="calories" placeholder="Calories" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Protein:</label>
               <input type="number" class="form-control" name="calories" placeholder="Protein" required>
            </div>

            <div class="mb-3">
               <label class="form-label">Carbohydrates:</label>
               <input type="number" class="form-control" name="Carbohydrates" placeholder="Carbohydrates" required>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>
