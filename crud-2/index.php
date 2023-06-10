<?php
session_start();
include_once "dbcon.php";
$showData = "SELECT * FROM studentInfo";
$statement = $conn->prepare($showData);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

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
        <div class="row ">
            <div class="col-md-12 mt-4 text-center mb-4">
                <h1>PHP PDO using bindPrams() function crud</h1>
            </div>
            <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php else: ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']);endif?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>PHP PDO using bindPrams() function crud
                            <a href="addStudent.php" class="btn btn-primary float-end">Add Student</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Courses</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($results): ?>
                                <?php foreach ($results as $result): ?>
                                <tr>
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><?php echo $result['email'] ?></td>
                                    <td><?php echo $result['courses'] ?></td>
                                    <td><?php echo $result['phone'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $result['id'] ?>"
                                            class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <form action="delete.php" method="post">
                                            <button type="submit" class="btn btn-danger" name="deleteBtn"
                                                value="<?php echo $result['id'] ?>">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                                <?php endforeach;?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                                <?php endif;?>
                            </tbody>
                        </table>
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