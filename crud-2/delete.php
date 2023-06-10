<?php
session_start();
include_once "dbcon.php";
if (isset($_POST['deleteBtn'])) {
    $id = $_POST['deleteBtn'];
    try {
        $delete = "DELETE FROM studentInfo WHERE id=? LIMIT 1";
        $statement = $conn->prepare($delete);
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $isDelete = $statement->execute();
        if ($isDelete) {
            $_SESSION['message'] = "Delete successfully";
            header("Location: index.php");
            exit(0);
        } else {
            $_SESSION['message'] = "OOps! Something went wrong";
            header("Location: index.php");
            exit(0);
        }

    } catch (PDOException $exception) {
        $message = $exception->getMessage();
        die($message);
    };
}
