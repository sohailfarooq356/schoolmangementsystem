<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>LMS</title
</head>
<body>

<?php AdminController::CreateView("Includes/inc.AdminHeader"); ?>
<div class="container container p-3 my-3 bg-dark text-white">
    <form class="form-horizontal" method="POST" action="">
        <div class="form-group">
            <label class="control-label col-sm-2" for="sclass">Select Class:</label>
            <div class="col-sm-10">
                <select name="sclass" id="sclass" class="form-control" required>
                    <option value="">Select Class</option>
                    <?php
                    $classarray = AdminController::get('classes');
                    foreach ($classarray as $row) {
                        echo '<option value="' . $row['cls_id'] . '">' . $row['cls_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="ssubject">Select subject:</label>
            <div class="col-sm-10">
                <select name="ssubject" id="ssubject" class="form-control" required>
                    <option value="">Select subject</option>
                    <?php
                    $subjectarray = AdminController::get('subjects');
                    foreach ($subjectarray as $row1) {
                        echo '<option value="' . $row1['sub_id'] . '">' . $row1['sub_name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <input type="hidden" name="check" value="unassignsubject">
        <div class="form-group text-center">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success btn-lg">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php AdminController::CreateView("Includes/inc.Footer"); ?>
</body>
</html>