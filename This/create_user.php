<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $user_id = $_POST['user_id'];
   $meal_name = $_POST['meal_name'];
   $meal_type = $_POST['meal_type'];
   $food_name = $_POST['food_name'];
   $calories = $_POST['calories'];
   $protein = $_POST['protein'];
   $fat = $_POST['fat'];
   $carbohydrates = $_POST['carbohydrates'];
   $meal_Date = $_POST['meal_Date'];
   $meal_Time = $_POST['meal_Time'];
   $user_Notes = $_POST['user_Notes'];

   $stmt = $conn->prepare("INSERT INTO user_meals 
      (user_id, meal_name, meal_type, food_name, calories, protein, fat, carbohydrates, meal_Date, meal_Time, user_Notes) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("isssddddsss", $user_id, $meal_name, $meal_type, $food_name, $calories, $protein, $fat, $carbohydrates, $meal_Date, $meal_Time, $user_Notes);

   if ($stmt->execute()) {
      header("Location: index.php?msg=Meal added successfully");
      exit();
   } else {
      echo "Error: " . $stmt->error;
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Nutritract Entry Form</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #2FDD92;">
      NUTRITRACT - Add Meal
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Nutritract Form</h3>
         <p class="text-muted">Add new meal record</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
               <label>User ID:</label>
               <input type="number" class="form-control" name="user_id" required>
            </div>
            <div class="mb-3">
               <label>Meal Name:</label>
               <input type="text" class="form-control" name="meal_name" required>
            </div>
            <div class="mb-3">
               <label>Meal Type:</label>
               <select class="form-control" name="meal_type" required>
                  <option value="Breakfast">Breakfast</option>
                  <option value="Lunch">Lunch</option>
                  <option value="Dinner">Dinner</option>
                  <option value="Snack">Snack</option>
               </select>
            </div>
            <div class="mb-3">
               <label>Food Name:</label>
               <input type="text" class="form-control" name="food_name" required>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label>Calories:</label>
                  <input type="number" step="0.01" class="form-control" name="calories" required>
               </div>
               <div class="col">
                  <label>Protein:</label>
                  <input type="number" step="0.01" class="form-control" name="protein" required>
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label>Fat:</label>
                  <input type="number" step="0.01" class="form-control" name="fat" required>
               </div>
               <div class="col">
                  <label>Carbohydrates:</label>
                  <input type="number" step="0.01" class="form-control" name="carbohydrates" required>
               </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                  <label>Date:</label>
                  <input type="date" class="form-control" name="meal_Date" required>
               </div>
               <div class="col">
                  <label>Time:</label>
                  <input type="time" class="form-control" name="meal_Time" required>
               </div>
            </div>
            <div class="mb-3">
               <label>Notes:</label>
               <textarea class="form-control" name="user_Notes" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Save</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
         </form>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>







