<?php
include "db_conn.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM student_tb WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $exec = mysqli_stmt_execute($stmt);

        if ($exec) {
            header("Location: index.php?msg=Data deleted successfully");
            exit();
        } else {
            echo "Failed to delete: " . mysqli_stmt_error($stmt);
        }
    } else {
        echo "Failed to prepare statement: " . mysqli_error($conn);
    }
} else {
    echo "Invalid ID parameter.";
}
?>
