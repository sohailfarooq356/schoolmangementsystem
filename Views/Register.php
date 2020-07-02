<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/login.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <meta charset=utf-8 />
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        article, aside, figure, footer, header, hgroup,
        menu, nav, section { display: block; }
    </style>

    <title>SMS</title>
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

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="index.php">SMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./">Login</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form action="" enctype="multipart/form-data" method="POST">

                            <div class="form-group row">
                            <label for="simg" class="col-md-4 col-form-label text-md-right">Select Your Image</label>
                            <div class="col-md-6">
                            <img id="blah" src="https://www.ibts.org/wp-content/uploads/2017/08/iStock-476085198.jpg" height="90" width="90" alt="your image" />
                            <input type="file" name="simg" class="form-control" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png" required/>
                            </div>
                            </div>

                            <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Your Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name"  autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" name="username" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cpassword" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="cpassword" class="form-control" name="cpassword" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="roleselect" class="col-md-4 col-form-label text-md-right">Your Role</label>
                                    <div class="col-md-6">
                                        <select name="roleselect" id="roleselect" class="form-control" >
                                            <option value="">Select your role</option>
                                            <option value="teacher">I am a Teacher</option>
                                            <option value="student">I am a Student</option>
                                        </select>
                                    </div>

                                    </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>

</body>
</html>