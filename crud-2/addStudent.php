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
                <h1>Insert</h1>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Students
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="insert.php">
                            <div class="form-group mt-2">
                                <label for="name"> Name</label>
                                <input type="text" class="form-control" name="name" placeholder=" Name">
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group mt-2">
                                <label for="courses">Phone</label>
                                <input type="text" class="form-control" name="courses" placeholder="Courses">
                            </div>
                            <div class="form-group mt-2">
                                <label for="Phone">Course</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary" placeholder="Course" name="addStudent">Add
                                    Students</button>
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
