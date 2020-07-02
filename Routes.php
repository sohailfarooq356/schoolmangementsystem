<?php session_start();

Route::set('index.php', function () {
    Index::CreateView('Index');
});


Route::set('register', function () {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $target_directory = 'Views/IMG/';
        $target_file = $target_directory . basename($_FILES["simg"]["name"]);

        $filename = basename($_FILES["simg"]["name"]);
        $ext = explode('.', $filename);
        $filename = rand() . '.' . $ext[1];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
        if ($_POST['password'] == $_POST['cpassword']) {
            if (move_uploaded_file($_FILES["simg"]["tmp_name"], $target_directory . $filename)) {
                $fields = [
                    'name' => $_POST['name'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'user_img' => $target_directory . $filename,
                    'role' => $_POST['roleselect'],
                ];
                $check_field = [
                    'username' => $_POST['username']
                ];
                if (!Auth::get('users', '*', $check_field)) {
                    if (Auth::insert('users', $fields)) {
                        if ($_POST['roleselect'] == 'teacher') {
                            $result = Auth::get('users', 'user_id', $check_field);
                            $fields = array(
                                'tea_name' => $_POST['name'],
                                'user_id' => $result[0]['user_id'],
                                'username' => $_POST['username']
                            );
                            if (Auth::insert('teachers', $fields)) {
                                Auth::success();
                            }
                        } elseif ($_POST['roleselect'] == 'student') {
                            $result = Auth::get('users', 'user_id', $check_field);
                            $field = [
                                'std_name' => $_POST['name'],
                                'user_id' => $result[0]['user_id'],
                                'username' => $_POST['username']
                            ];
                            if (Auth::insert('students', $fields)) {
                                Auth::success();
                            }
                        }
                    }
                } else
                    Auth::error();
            }
            else
                Auth::error();
        }
        else
            Auth::passwordError();
    } else
        Index::CreateView('Register');
});

Route::set('auth', function () {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fields = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];
        $result = Auth::get('users', '*', $fields);
        if (isset($result[0]['user_id'])) {
            $_SESSION['username'] = $result[0]['username'];
            $_SESSION['role'] = $result[0]['role'];
            $_SESSION['user_img'] = $result[0]['user_img'];
            $_SESSION['_name'] = $result[0]['name'];
            switch ($_SESSION['role']) {
                case 'admin':
                    header('Location: admin');
                    break;
                case 'teacher':
                    header('Location: teacher');
                    break;
                case 'student':
                    header('Location: student');
                    break;
            }
        } else {
            Auth::error();
        }
    }
});

Route::set('logout', function () {
    unset($_SESSION['username']);
    unset($_SESSION['_name']);
    unset($_SESSION['user_img']);
    unset($_SESSION['role']);
    session_destroy();
    header('Location: ./');
});


