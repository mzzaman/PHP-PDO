<?php
session_start();
require_once "dbcon.php";
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['courses'];
    $phone = $_POST['phone'];
    try {
        $update = "UPDATE studentInfo SET name = :name, email = :email, courses = :courses, phone = :phone WHERE id = :id LIMIT 1";
        $statement = $conn->prepare($update);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':courses', $course);
        $statement->bindParam(':phone', $phone);
        $statement->bindParam(':id', $id);
        $isUpdate = $statement->execute();
        if ($isUpdate) {
            $_SESSION['message'] = "Update successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "OOps! Something went wrong";
            header("Location: index.php");
            exit(0);
        }

    } catch (PDOException $exception) {
        $message = $exception->getMessage();
        die("Error " . $message);
    }
}
