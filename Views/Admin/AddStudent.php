<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
          rel="stylesheet" type="text/css"/>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

    <title>LMS</title>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(90);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</head>
<body>

<?php AdminController::CreateView("Includes/inc.AdminHeader");?>
<div class="container container p-3 my-3 bg-dark text-white">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
        <div class="form-group">
            <label class="control-label col-sm-2" for="simg">Select Image:</label>
            <div class="col-sm-10">
                <img id="blah" src="https://www.ibts.org/wp-content/uploads/2017/08/iStock-476085198.jpg" height="90"
                     width="90" alt="your image"/>
                <input type="file" name="simg" class="form-control" onchange="readURL(this);"
                       accept="image/gif, image/jpeg, image/png" required/>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="sname">Student Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sname" name="sname" placeholder="Enter student name"
                           required autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">student Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username"
                           placeholder="Enter student USername" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="cpwd">Confirm Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="cpwd" name="cpwd" placeholder="Confirm password"
                           required>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
            </div>
    </form>
</div>
<?php AdminController::CreateView("Includes/inc.Footer");?>
</body>
</html>