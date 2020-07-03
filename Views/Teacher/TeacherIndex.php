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
    <h1 class="h1 text-center">Hello, <?php echo $_SESSION['_name']; ?></h1>
</div>
<?php TeacherController::CreateView("Includes/inc.Footer");?>
</body>
</html>