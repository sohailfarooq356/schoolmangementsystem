<?php
Route::set('admin', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        AdminController::CreateView('Admin/AdminIndex');
    } else {
        header('Location: ./');
    }
});

Route::set('admin/teachers', function () {
    echo 'Okay';
});