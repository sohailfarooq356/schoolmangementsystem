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

<?php TeacherController::CreateView("Includes/inc.StudentHeader");?>
<div class="container">
    <h1 class="text-center">List of Classes</h1>
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
        $field = array('username' => $_SESSION['username']);
        $result = StudentController::get('users', '*', $field);
        $user_id = $result[0]['user_id'];

        $field = array('user_id' => $user_id);
        $result = StudentController::get('teachers', '*', $field);
        $std_id = $result[0]['std_id'];

        $field = array('std_id' => $std_id);
        $result = StudentController::get('addto_class', '*', $field);
        foreach ($result as $row) {
            $field = array('sub_id' => $row['sub_id']);
            $result2 = StudentController::get('subjects', '*', $field);
            foreach ($result2 as $row2) {
                echo'<tr>';
                echo'<th scope="row">' . $row2['sub_id'] . '</th>';
                echo'<th scope="row">' . $row2['sub_name'] . '</th>';
                echo'<td><a class="btn btn-primary" href="viewleacture?subjectid=' . $row2['sub_id'] . '&classid=' . $row['cls_id'] . '">View Leactures</a></td>';
                echo'</tr>';
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php TeacherController::CreateView("Includes/inc.Footer");?>
</body>
</html>