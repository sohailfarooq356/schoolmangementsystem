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

<?php TeacherController::CreateView("Includes/inc.TeacherHeader");?>
<div class="container">
    <h1 class="text-center">List of Classes</h1>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">Class ID</th>
            <th scope="col">Class Name</th>
            <th scope="col">Subject ID</th>
            <th scope="col">Subject Name</th>

            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $fields = ['username' => $_SESSION['username']];
        $result = TeacherController::get('users','*',$fields);
        $userid = $result[0]['user_id'];

        $fields = ['user_id' => $userid];
        $result = TeacherController::get('teachers','*',$fields);
        $teacherid = $result[0]['tea_id'];

        $fields = ['tea_id' => $teacherid];
        $result = TeacherController::get('addto_class','*',$fields);
        foreach ($result as $row) {

            $fields = ['sub_id' => $row['sub_id']];
            $result2 = TeacherController::get('subjects','*',$fields);

            foreach ($result2 as $row2) {
                $fields = ['cls_id' => $row['cls_id']];
                $result1 = TeacherController::get('classes','*',$fields);
                foreach ($result1 as $row1) {
                    echo'<tr>';
                    echo'<th scope="row">' . $row1['cls_id'] . '</th>';
                    echo'<th scope="row">' . $row1['cls_name'] . '</th>';
                    echo'<th scope="row">' . $row2['sub_id'] . '</th>';
                    echo'<th scope="row">' . $row2['sub_name'] . '</th>';
                    echo'<td><a class="btn btn-primary" href="upload?classid=' . $row1['cls_id'] . '&subjectid=' . $row2['sub_id'] . '">Upload Leacture</a></td>';
                    echo'</tr>';
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php TeacherController::CreateView("Includes/inc.Footer");?>
</body>
</html>