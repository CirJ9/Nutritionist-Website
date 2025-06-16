<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $meal_name = $_POST['meal_name'];
   $food_name = $_POST['food_name'];
   $kilograms = $_POST['kilograms'];
   $calories = $_POST['calories'];
   $protein = $_POST['protein'];
   $carbohydrates = $_POST['carbohydrates'];
   $time = $_POST['time'];
   $date = $_POST['date'];

   $sql = "INSERT INTO `nutritract` (`meal_name`, `food_name`, `kilograms`, `calories`, `protein`, `carbohydrates`, `time`, `date`) 
           VALUES ('$meal_name', '$food_name', '$kilograms', '$calories', '$protein', '$carbohydrates', '$time', '$date')";

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
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CvSU Student Information</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="db.css">
</head>
<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #2FDD92 ;">
      NUTRITRACT
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Nutritract Form</h3>
         <p class="text-muted">Add new nutritract entry</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">Meal Name:</label>
                  <input type="text" class="form-control" name="meal_name" required>
               </div>
               <div class="col">
                  <label class="form-label">Food Name:</label>
                  <input type="text" class="form-control" name="food_name" required>
               </div>
            </div>

            <div class="row mb-3">
               <div class="col-sm-6 col-md-4">
                  <label class="form-label">Kilograms:</label>
                  <input type="number" step="0.01" class="form-control small-input" name="kilograms" required>
               </div>
               <div class="col-sm-6 col-md-4">
                  <label class="form-label">Calories:</label>
                  <input type="number" class="form-control small-input" name="calories" required>
               </div>
            </div>

            <div class="row mb-3">
               <div class="col-sm-6 col-md-4">
                  <label class="form-label">Protein:</label>
                  <input type="number" class="form-control small-input" name="protein" required>
               </div>
               <div class="col-sm-6 col-md-4">
                  <label class="form-label">Carbohydrates:</label>
                  <input type="number" class="form-control small-input" name="carbohydrates" required>
               </div>
            </div>

            <div class="row mb-3">
               <div class="col-sm-6 col-md-4">
                  <label class="form-label">Time:</label>
                  <input type="time" class="form-control small-input" name="time" required>
               </div>
               <div class="col-sm-6 col-md-4">
                  <label class="form-label">Date:</label>
                  <input type="date" class="form-control small-input" name="date" required>
               </div>
            </div>

            <div class="mb-3">
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


