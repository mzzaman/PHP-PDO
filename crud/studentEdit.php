<?php
session_start();
include_once "dbcon.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM studentInfo WHERE id = :student_id LIMIT 1";
    $statement = $conn->prepare($query);
    $statement->execute([':student_id' => $id]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
} else {
    echo "<div class='alert alert-warning'> Data is not available for this student </div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit and Update data into database using PHP PDO
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="updateStudent.php" method="post">
                            <div class="form-group mb-3">
                                <input type="hidden" name="student_id" value="<?php echo $result['id'] ?>">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="<?php echo $result['name'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email"
                                    value="<?php echo $result['email'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone"
                                    value="<?php echo $result['phone'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label>Courses</label>
                                <input type="text" class="form-control" name="courses"
                                    value="<?php echo $result['courses'] ?>">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="updateStudent" class="btn btn-primary mb-3"> Update
                                    Student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>