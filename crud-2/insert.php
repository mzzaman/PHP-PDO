<?php
session_start();
include_once "dbcon.php";
if (isset($_POST['addStudent'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['courses'];
    $phone = $_POST['phone'];

    try {
        $insertStudent = "INSERT INTO studentInfo (name,email,courses,phone) VALUES (?,?,?,?)";
        $statement = $conn->prepare($insertStudent);
        $statement->bindParam(1, $name);
        $statement->bindParam(2, $email);
        $statement->bindParam(3, $course);
        $statement->bindParam(4, $phone);

        $isAddSuccess = $statement->execute();
        if ($isAddSuccess) {
            $_SESSION['message'] = "Student added successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "OOps! Something went wrong";
            header("Location: index.php");
            exit(0);
        }

    } catch (PDOException $exception) {
        die("Error: " . $exception->getMessage());
    }
}
