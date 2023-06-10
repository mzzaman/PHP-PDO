<?php
session_start();
require_once "dbcon.php";
if (isset($_POST['deleteStudent'])) {
    $delStudent = $_POST['deleteStudent'];
    try {
        $deleteStudent = "DELETE FROM studentInfo WHERE id = :studentId";
        $stmt = $conn->prepare($deleteStudent);
        $delete = $stmt->execute(array(':studentId' => $delStudent));
        if ($delete) {
            $_SESSION['message'] = "Delete successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "OPPS! Something went wrong";
            header("Location: index.php");
            exit(0);
        }
    } catch (PDOException $exception) {
        $message = $exception->getMessage();
        die($message);
    }
}
