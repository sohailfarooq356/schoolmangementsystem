<?php
Route::set('student', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'student') {
        StudentController::CreateView('Student/StudentIndex');
    } else {
        header('Location: ./');
    }
});