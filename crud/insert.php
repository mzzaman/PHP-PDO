<?php
session_start();
include_once "dbcon.php";

if (isset($_POST['addStudent'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $courses = $_POST['courses'];

    $addStudent = "INSERT INTO studentInfo (name, email, phone, courses) VALUES (:name, :email, :phone, :courses)";
    $query = $conn->prepare($addStudent);
    $addSuccessfull = $query->execute(array(':name' => $name, ':email' => $email, ':phone' => $phone, ':courses' => $courses));

}
if ($addSuccessfull) {
    $_SESSION['message'] = "Inserted successfully";
    header("Location: index.php");
    exit(0);
} else {
    $_SESSION['message'] = "Something went wrong";
    header("Location: index.php");
    exit(0);
}
