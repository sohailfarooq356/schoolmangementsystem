<?php
Route::set('teacher', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'teacher') {
        TeacherController::CreateView('Teacher/TeacherIndex');
    } else {
        header('Location: ./');
    }
});
