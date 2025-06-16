<?php
include "db_conn.php";

// Check if meal_num is set in the URL
if (isset($_GET["meal_num"])) {
    $meal_num = intval($_GET["meal_num"]); 

    $sql = "DELETE FROM `nutritract` WHERE meal_num = $meal_num";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Data deleted successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} else {
    echo "No meal number provided to delete.";
}
?>

