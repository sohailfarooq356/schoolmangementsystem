<?php session_start();

Route::set('index.php', function () {
    Index::CreateView('Index');
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
        }
        else{
            Auth::error();
        }
    }
});

Route::set('admin', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        AdminController::CreateView('Admin/AdminIndex');
    }
    else{
        header('Location: ./');
    }
});

Route::set('teacher', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
        TeacherController::CreateView('Teacher/TeacherIndex');
    }
    else{
        header('Location: ./');
    }
});

Route::set('student', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {
        StudentController::CreateView('Student/StudentIndex');
    }
    else{
        header('Location: ./');
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


