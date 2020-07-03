<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>LMS</title>
</head>
<body>

<?php AdminController::CreateView("Includes/inc.AdminHeader");?>
<div class="container">
    <h1 class="text-center">List of Subject</h1>
    <h3>Want to add new Subject? <a href="addsubject.php" class="btn btn-secondary btn-lg">Click Here</a></h3>
    <?php
    if (isset($error)) {
        echo '<p class="lead text-danger text-center">' . $error . '</p>';
    }
    ?>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Subject ID</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $result = Auth::get('subjects');
        foreach ($result as $row) {
            echo'<form action="" method="POST">';
            echo'<tr>';
            echo'<th scope="row">' . $row['sub_id'] . '</th>';
            echo'<td><input type="text" class="form-control" name="sname" value="' . $row['sub_name'] . '"/></td>';
            echo'<td><input type="hidden" name="sub_id" value="' . $row['sub_id'] . '"/><input type="submit" name="submit" class="btn btn-primary" value="Update" /><input type="submit" name="submit" class="btn btn-danger" value="Delete" /></form></td>';
            echo'</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
<?php AdminController::CreateView("Includes/inc.Footer");?>
</body>
</html>