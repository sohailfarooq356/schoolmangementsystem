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
    <h1 class="text-center">List of Lectures</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Lecture ID</th>
            <th scope="col">Lecture Topic</th>
            <th scope="col">Subject ID</th>
            <th scope="col">Class Name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_GET['classid']) && isset($_GET['subjectid'])) {
            $classid = $_GET['classid'];
            $subjectid = $_GET['subjectid'];
            $fields = array(
                'cls_id' => $classid,
                'sub_id' => $subjectid,
            );
            $result = StudentController::get('leactures', '*', $fields);
            if (isset($result[0]['lec_id'])) {
                foreach ($result as $row) {
                    echo '<tr>';
                    echo '<th scope="row">' . $row['lec_id'] . '</th>';
                    echo '<th scope="row">' . $row['lec_topic'] . '</th>';
                    echo '<th scope="row">' . $row['sub_id'] . '</th>';
                    echo '<td><a href="../Views/Uploads/' . $row['file_name'] . '">View Leacture<a></td>';
                    echo '</tr>';
                }
            } else {
                echo 'No Leacture Yet';
            }
        }
        else{
            echo 'No Leacture Found.';
        }
        ?>
        </tbody>
    </table>
</div>
<?php TeacherController::CreateView("Includes/inc.Footer");?>
</body>
</html>