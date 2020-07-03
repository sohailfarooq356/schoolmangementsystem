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
