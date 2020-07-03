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
    <div class="container container p-3 my-3 bg-dark text-white">
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="sfile">Select File:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="sfile" name="sfile" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="lectopic">Lecture Topic:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lectopic" placeholder="Lecture Topic" name="lectopic" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cls_id">Class Id:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cls_id" value="<?php echo $_GET['classid']; ?>" name="cls_id" readonly>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="sub_id">Subject Id:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sub_id" value="<?php echo $_GET['subjectid']; ?>" name="sub_id" readonly>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php TeacherController::CreateView("Includes/inc.Footer");?>
</body>
</html>