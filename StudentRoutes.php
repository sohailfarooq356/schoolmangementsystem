<?php
Route::set('student', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {
        StudentController::CreateView('Student/StudentIndex');
    } else {
        header('Location: ./');
    }
});

Route::set('student/leactures', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {
        StudentController::CreateView('Student/Leactures');
    } else {
        header('Location: ./');
    }
});

Route::set('student/viewleacture', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {
        StudentController::CreateView('Student/ViewLeacture');
    } else {
        header('Location: ./');
    }
});