<?php
session_start();
include_once "dbcon.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $update = "SELECT * FROM studentInfo WHERE id = ? LIMIT 1";
    $statement = $conn->prepare($update);
    $statement->bindParam(1, $id, PDO::PARAM_INT);
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_ASSOC);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4 text-center">
                <h1>Edit</h1>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit and Update
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="update.php">
                            <div class="form-group mt-2">
                                <input type="hidden" class="form-control" name="id" placeholder="id"
                                    value="<?php echo $data['id']; ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                    value="<?php echo $data['name']; ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email"
                                    value="<?php echo $data['email']; ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="courses">Courses</label>
                                <input type="text" class="form-control" name="courses" placeholder="Courses"
                                    value="<?php echo $data['courses']; ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone"
                                    value="<?php echo $data['phone']; ?>">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary" placeholder="Course" name="update">
                                    Update</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>