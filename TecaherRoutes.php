<?php
Route::set('teacher', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
        TeacherController::CreateView('Teacher/TeacherIndex');
    } else {
        header('Location: ./');
    }
});

Route::set('teacher/students', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
        TeacherController::CreateView('Teacher/ViewStudents');
    } else {
        header('Location: ./');
    }
});

Route::set('teacher/add/student', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
        TeacherController::CreateView('Teacher/AddStudent');
    } else {
        header('Location: ./');
    }
});

Route::set('teacher/uploadleacture', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
        TeacherController::CreateView('Teacher/UploadLeactures');
    } else {
        header('Location: ./');
    }
});

Route::set('teacher/upload', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $targetdirectory = "Views/Uploads/";
            $target_file = $targetdirectory . basename($_FILES["sfile"]["name"]);
            $filename = basename($_FILES["sfile"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $ext = explode('.', $filename);

            if (file_exists($target_file)) {
                if ($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "ppt" && $imageFileType != "mp4" && $imageFileType != "pdf") {
                    echo 'Only document file allowed';
                    die();
                } else {
                    if (move_uploaded_file($_FILES["sfile"]["tmp_name"], $targetdirectory . $filename)) {
                        $fields = [
                            'lec_topic' => $_POST['lectopic'],
                            'cls_id' => $_POST['cls_id'],
                            'sub_id' => $_POST['sub_id'],
                            'file_name' => $filename
                        ];
                        if (TeacherController::insert('leactures', $fields)) {
                            TeacherController::success();
                        }
                    }
                }
            } else {
                if ($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "ppt" && $imageFileType != "mp4" && $imageFileType != "pdf") {
                    echo 'Only document file allowed';
                    die();
                } else {
                    if (move_uploaded_file($_FILES["sfile"]["tmp_name"], $target_file)) {
                        $field = array(
                            'lec_topic' => $_POST['lectopic'],
                            'cls_id' => $_POST['cls_id'],
                            'sub_id' => $_POST['sub_id'],
                            'file_name' => $filename
                        );
                        if (TeacherController::insert('leactures', $field)) {
                            TeacherController::success();
                        } else {
                            TeacherController::error();
                        }
                    } else {
                        TeacherController::error();
                    }
                }
            }
        } else {
            TeacherController::CreateView('Teacher/Upload');
        }
    } else {
        header('Location: ./');
    }
});
