<?php
include "db_conn.php";

// Get ID from URL
$meal_num = $_GET["meal_num"] ?? null;

if (!$meal_num) {
    die("Invalid meal_num.");
}

// Fetch record to edit
$stmt = $conn->prepare("SELECT * FROM nutritract WHERE meal_num = ? LIMIT 1");
$stmt->bind_param("i", $meal_num);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Record not found.");
}

// Process form submission
if (isset($_POST["submit"])) {
    $meal_name = $_POST['meal_name'];
    $food_name = $_POST['food_name'];
    $kilograms = $_POST['kilograms'];
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $carbohydrates = $_POST['carbohydrates'];

    $update_stmt = $conn->prepare("UPDATE nutritract 
        SET meal_name = ?, food_name = ?, kilograms = ?, calories = ?, protein = ?, carbohydrates = ? 
        WHERE meal_num = ?");
    $update_stmt->bind_param("ssddddi", $meal_name, $food_name, $kilograms, $calories, $protein, $carbohydrates, $meal_num);

    if ($update_stmt->execute()) {
        header("Location: index.php?msg=Data updated successfully");
        exit();
    } else {
        echo "Failed to update data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Meal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="db.css">
</head>
<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    Nutritract
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Meal Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Meal Name:</label>
            <input type="text" class="form-control" name="meal_name" value="<?php echo htmlspecialchars($row['meal_name']); ?>" required>
          </div>

          <div class="col">
            <label class="form-label">Food Name:</label>
            <input type="text" class="form-control" name="food_name" value="<?php echo htmlspecialchars($row['food_name']); ?>" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Kilograms:</label>
          <input type="number" step="0.01" class="form-control" name="kilograms" value="<?php echo htmlspecialchars($row['kilograms']); ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Calories:</label>
          <input type="number" class="form-control" name="calories" value="<?php echo htmlspecialchars($row['calories']); ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Protein:</label>
          <input type="number" class="form-control" name="protein" value="<?php echo htmlspecialchars($row['protein']); ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Carbohydrates:</label>
          <input type="number" class="form-control" name="carbohydrates" value="<?php echo htmlspecialchars($row['carbohydrates']); ?>" required>
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



fix it

