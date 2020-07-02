<?php
Route::set('admin', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        AdminController::CreateView('Admin/AdminIndex');
    } else {
        header('Location: ./');
    }
});

Route::set('admin/teachers', function () {
    AdminController::CreateView('Admin/ViewTeachers');
});

Route::set('admin/students', function () {
    AdminController::CreateView('Admin/ViewStudents');
});

Route::set('admin/classes', function () {
    AdminController::CreateView('Admin/ViewCLasses');
});

Route::set('admin/subjects', function () {
    AdminController::CreateView('Admin/ViewSubjects');
});

Route::set('admin/add/teacher', function () {
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
        if ($_POST['pwd'] == $_POST['cpwd']) {
            if (move_uploaded_file($_FILES["simg"]["tmp_name"], $target_directory . $filename)) {
                $fields = [
                    'name' => $_POST['tname'],
                    'username' => $_POST['username'],
                    'password' => $_POST['pwd'],
                    'user_img' => $target_directory . $filename,
                    'role' => 'teacher',
                ];
                $check_field = [
                    'username' => $_POST['username']
                ];
                if (!AdminController::get('users', '*', $check_field)) {
                    if (AdminController::insert('users', $fields)) {
                        $result = AdminController::get('users', 'user_id', $check_field);
                        $fields = [
                            'tea_name' => $_POST['tname'],
                            'user_id' => $result[0]['user_id'],
                            'username' => $_POST['username']
                        ];
                        if (AdminController::insert('teachers', $fields)) {
                            AdminController::success();
                        }
                    }
                } else
                    AdminController::error();
            } else
                AdminController::error();
        } else
            AdminController::passwordError();
    } else {
        AdminController::CreateView('Admin/AddTeacher');
    }
});

Route::set('admin/add/student', function () {
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
        if ($_POST['pwd'] == $_POST['cpwd']) {
            if (move_uploaded_file($_FILES["simg"]["tmp_name"], $target_directory . $filename)) {
                $fields = [
                    'name' => $_POST['sname'],
                    'username' => $_POST['username'],
                    'password' => $_POST['pwd'],
                    'user_img' => $target_directory . $filename,
                    'role' => 'student',
                ];
                $check_field = [
                    'username' => $_POST['username']
                ];
                if (!AdminController::get('users', '*', $check_field)) {
                    if (AdminController::insert('users', $fields)) {
                        $result = AdminController::get('users', 'user_id', $check_field);
                        $fields = [
                            'std_name' => $_POST['sname'],
                            'user_id' => $result[0]['user_id'],
                            'username' => $_POST['username']
                        ];
                        if (AdminController::insert('students', $fields)) {
                            AdminController::success();
                        }
                    } else
                        AdminController::error();
                } else
                    AdminController::error();
            }
        } else
            AdminController::passwordError();
    } else {
        AdminController::CreateView('Admin/AddStudent');
    }
});

Route::set('admin/add/class', function () {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fields = array(
            'cls_name' => $_POST['cname']
        );
        if (!AdminController::get('classes', '*', $fields)) {
            if (AdminController::insert('classes', $fields)) {
                AdminController::success();
            } else {
                AdminController::error();
            }
        } else {
            AdminController::error();
        }
    } else {
        AdminController::CreateView('Admin/AddClass');
    }
});

Route::set('admin/add/subject', function () {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fields = array(
            'sub_name' => $_POST['sname']
        );
        if (!AdminController::get('subjects', '*', $fields)) {
            if (AdminController::insert('subjects', $fields)) {
                AdminController::success();
            } else {
                AdminController::error();
            }
        } else {
            AdminController::error();
        }
    } else {
        AdminController::CreateView('Admin/AddSubject');
    }
});