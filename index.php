<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.css">
        <title>iNote</title>
        <style>
            body {
                margin: 0%;
                font-family: Arial, sans-serif;
                background-color: rgb(36, 36, 36);
                color: #333;
                padding: 00px;
                color: #fff;
            }

            h2 {
                color: rgb(255, 255, 255);
            }

            p {
                font-size: 1.2em;
            }

            .nav {
                width: 100%;

                box-shadow: 0px 5px 10px white;
            }

            .navbar {
                background: #1a1818ff;
            }

            .navbar:hover {
                box-shadow: 1px 1.5px 2px #676565ff,
                    1px 1.5px 2px #a19e9eff,
                    1px 1.5px 2px #9a9898ff;
            }

            form.d-flex .form-control::placeholder {
                color: #fff;
            }

            form .form-control {
                color: #fff;
                background: transparent;
            }

            .container #example {
                background: #2b2b2bff;
                border-bottom: 2px solid #ffffff;
            }
            .container #example tr th{
                font-weight: bolder;
                font-style: normal;
                color: #b4b4b4ff;
                background-color: transparent;
                border-top: 0px solid #b4b4b4ff;
                border-bottom: 2px solid #b4b4b4ff;
            }
            .container #example tr td{
                color: #fff;
                background-color: transparent;
                border-bottom: 2px solid #8686869c;
            }
        </style>
    </head>
    <body>

        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'notes';

            $connect = mysqli_connect($servername, $username, $password, $database);
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $description = $_POST['description'];

                $query = "INSERT INTO `note` (`title`, `description`) VALUES ('$title', '$description')";
                $add_note = mysqli_query($connect, $query);
            }
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-body-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i>php</i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                CURD
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Create</a></li>
                                <li><a class="dropdown-item" href="#">Read</a></li>
                                <li><a class="dropdown-item" href="#">Update</a></li>
                                <li><a class="dropdown-item" href="#">Delete<a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Contact us</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        
        <?php
            if ($add_note) {
                    echo '<center><div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfull!</strong> note is inserted fields below.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div></center>';
                }
            else {
                    echo '<center><div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> add new iNote...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div></center>';
            }
        ?>

        <br><br>
        <div class="container">
            <h2>Add a Note</h2>
            <form action="/CURD/index.php" method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Note Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Note Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Add Note</button><br><br>
            </form>
        </div>
        
        <?php
            $sql = "SELECT * FROM note";
            $result = mysqli_query($connect, $sql);
        ?>

        <div class="container my-5">
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <?php
                    // display the table using loop
                    $sno = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sno++;
                        echo "  <tr>
                                    <td scope='row'>" . $sno . "</td>
                                    <td>" . $row['title'] . "</td>
                                    <td>" . $row['description'] . "</td>
                                    <td>Action</td>
                                </tr> "; 
                    }
                ?>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap5.js"></script>
        <script>
            new DataTable('#example');
        </script>
    </body>
</html>