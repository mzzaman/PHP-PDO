<?php
session_start();
include_once "dbcon.php";
if (isset($_POST['updateStudent'])) {
    $update_id = $_POST['student_id'];
    $update_name = $_POST['name'];
    $update_email = $_POST['email'];
    $update_phone = $_POST['phone'];
    $update_courses = $_POST['courses'];
    try {
        $update = "UPDATE studentInfo SET name= :name, email=:email, phone=:phone, courses=:courses WHERE id= :id LIMIT 1";
        $statement = $conn->prepare($update);
        $isUpdate = $statement->execute(array(
            ':id' => $update_id,
            ':name' => $update_name,
            ':email' => $update_email,
            ':phone' => $update_phone,
            ':courses' => $update_courses,
        ));
        if ($isUpdate) {
            $_SESSION['message'] = "Update successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "OPPS! Something went wrong";
            header("Location: index.php");
            exit(0);
        }

    } catch (Exception $exception) {
        $message = $exception->getMessage();
        die("Error With $message");
    }
}
