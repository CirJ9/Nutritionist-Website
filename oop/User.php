<?php
class User {
    private $conn;
    private $table = "student_tb";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($name, $email, $course) {
        $sql = "INSERT INTO " . $this->table . " (name, email, course) VALUES (:name, :email, :course)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':course', $course);

        return $stmt->execute();
    }

    public function update($id, $name, $email, $course) {
        $sql = "UPDATE " . $this->table . " SET name=:name, email=:email, course=:course WHERE id=:id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>