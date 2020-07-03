<?php
Route::set('admin', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        AdminController::CreateView('Admin/AdminIndex');
    } else {
        header('Location: ./');
    }
});

Route::set('admin/teachers', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
                $checkfield = [
                    'username' => $_POST['username']
                ];
                $fields = [
                    'tea_name' => $_POST['tname'],
                    'username' => $_POST['username']
                ];
                if (!AdminController::get('users', '*', $checkfield)) {
                    if (AdminController::update('teachers', $fields, 'tea_id', $_POST['tea_id'])) {
                        $fields = [
                            'name' => $_POST['tname'],
                            'username' => $_POST['username']
                        ];
                        if (AdminController::update('users', $fields, 'user_id', $_POST['user_id'])) {
                            AdminController::success();
                        }
                    }
                } else {
                    $fields = [
                        'tea_name' => $_POST['tname'],
                    ];
                    if (AdminController::update('teachers', $fields, 'tea_id', $_POST['tea_id'])) {
                        $fields = [
                            'name' => $_POST['tname'],
                        ];
                        if (AdminController::update('users', $fields, 'user_id', $_POST['user_id'])) {
                            AdminController::success();
                        }
                    }
                }
            } elseif (isset($_POST['submit']) && $_POST['submit'] == 'Delete') {
                $fields = [
                    'user_id' => $_POST['user_id']
                ];
                if (AdminController::delete('users', $fields)) {
                    if (AdminController::delete('teachers', $fields)) {
                        AdminController::success();
                    } else {
                        AdminController::error();
                    }
                } else {
                    AdminController::error();
                }
            }
        } else {
            AdminController::CreateView('Admin/ViewTeachers');
        }
    } else {
        header('Location: ./');
    }
});

Route::set('admin/students', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
                $checkfield = [
                    'username' => $_POST['username']
                ];
                $fields = [
                    'std_name' => $_POST['sname'],
                    'username' => $_POST['username']
                ];
                if (!AdminController::get('users', '*', $checkfield)) {
                    if (AdminController::update('students', $fields, 'std_id', $_POST['std_id'])) {
                        $fields = [
                            'name' => $_POST['sname'],
                            'username' => $_POST['username']
                        ];
                        if (AdminController::update('users', $fields, 'user_id', $_POST['user_id'])) {
                            AdminController::success();
                        }
                    }
                } else {
                    $fields = [
                        'std_name' => $_POST['sname'],
                    ];
                    if (AdminController::update('students', $fields, 'std_id', $_POST['std_id'])) {
                        $fields = [
                            'name' => $_POST['sname'],
                        ];
                        if (AdminController::update('users', $fields, 'user_id', $_POST['user_id'])) {
                            AdminController::success();
                        }
                    }
                }
            } elseif (isset($_POST['submit']) && $_POST['submit'] == 'Delete') {
                $fields = [
                    'user_id' => $_POST['user_id']
                ];
                if (AdminController::delete('users', $fields)) {
                    if (AdminController::delete('students', $fields)) {
                        AdminController::success();
                    } else {
                        AdminController::error();
                    }
                } else {
                    AdminController::error();
                }
            }
        } else {
            AdminController::CreateView('Admin/ViewStudents');
        }
    } else {
        header('Location: ./');
    }
});

Route::set('admin/classes', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
                $fields = [
                    'cls_name' => $_POST['cname']
                ];
                if (!AdminController::get('classes', '*', $fields)) {
                    if (AdminController::update('classes', $fields, 'cls_id', $_POST['cls_id'])) {
                        AdminController::success();
                    } else {
                        AdminController::error();
                    }
                } else {
                    AdminController::error();
                }
            } elseif (isset($_POST['submit']) && $_POST['submit'] == 'Delete') {
                $fields = [
                    'cls_id' => $_POST['cls_id']
                ];
                if (AdminController::delete('classes', $fields)) {
                    AdminController::success();
                } else {
                    AdminController::error();
                }
            }
        } else {
            AdminController::CreateView('Admin/ViewCLasses');
        }
    } else {
        header('Location: ./');
    }
});

Route::set('admin/subjects', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit']) && $_POST['submit'] == 'Update') {
                $fields = [
                    'sub_name' => $_POST['sname']
                ];
                if (!AdminController::get('subjects', '*', $fields)) {
                    if (AdminController::update('subjects', $fields, 'sub_id', $_POST['sub_id'])) {
                        AdminController::success();
                    } else {
                        AdminController::error();
                    }
                } else {
                    AdminController::error();
                }
            } elseif (isset($_POST['submit']) && $_POST['submit'] == 'Delete') {
                $fields = [
                    'sub_id' => $_POST['sub_id']
                ];
                if (AdminController::delete('subjects', $fields)) {
                    AdminController::success();
                } else {
                    AdminController::error();
                }
            }
        } else {
            AdminController::CreateView('Admin/ViewSubjects');
        }
    } else {
        header('Location: ./');
    }
});

Route::set('admin/add/teacher', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
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
    } else {
        header('Location: ./');
    }
});

Route::set('admin/add/student', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
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
    } else {
        header('Location: ./');
    }
});

Route::set('admin/add/class', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
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
    } else {
        header('Location: ./');
    }
});

Route::set('admin/add/subject', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
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
    } else {
        header('Location: ./');
    }
});

Route::set('admin/assignclasstostudent', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fields = [
                'cls_id' => $_POST['sclass'],
                'sub_id' => 0,
                'std_id' => $_POST['sstudent'],
                'tea_id' => 0
            ];
            if (!AdminController::get('addto_class', '*', $fields)) {
                if (AdminController::insert('addto_class', $fields)) {
                    AdminController::success();
                } else {
                    AdminController::error();
                }
            } else {
                AdminController::error();
            }
        } else {
            AdminController::CreateView('Admin/AssignClassToStudent');
        }
    } else {
        header('Location: ./');
    }
});

Route::set('admin/assignsubjecttoclass', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fields = [
                'cls_id' => $_POST['sclass'],
                'sub_id' => $_POST['ssubject'],
            ];
            if (!AdminController::get('addto_class', '*', $fields)) {
                $fields = [
                    'sub_id' => $_POST['ssubject'],
                ];
                if (AdminController::update('addto_class', $fields, 'cls_id', $_POST['sclass'])) {
                    AdminController::success();
                } else {
                    AdminController::error();
                }
            } else {
                AdminController::error();
            }
        } else {
            AdminController::CreateView('Admin/AssignSubjectToClass');
        }
    } else {
        header('Location: ./');
    }
});

Route::set('admin/assignteachertostudent', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fields = [
                'tea_id' => $_POST['steacher'],
                'std_id' => $_POST['sstudent'],
            ];
            if (!AdminController::get('addto_class', '*', $fields)) {
                $fields = [
                    'tea_id' => $_POST['steacher'],
                ];
                if (AdminController::update('addto_class', $fields, 'std_id', $_POST['sstudent'])) {
                    AdminController::success();
                } else {
                    AdminController::error();
                }
            } else {
                AdminController::error();
            }
        } else {
            AdminController::CreateView('Admin/AssignTeacherToStudent');
        }
    } else {
        header('Location: ./');
    }
});

Route::set('admin/assignteachertoclass', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fields = [
                'cls_id' => $_POST['sclass'],
                'tea_id' => $_POST['steacher'],
            ];
            if (!AdminController::get('addto_class', '*', $fields)) {
                $fields = array(
                    'tea_id' => $_POST['steacher'],
                );
                if (AdminController::update('addto_class', $fields, 'cls_id', $_POST['sclass'])) {
                    AdminController::success();
                } else {
                    AdminController::error();
                }
            } else {
                AdminController::error();
            }
        } else {
            AdminController::CreateView('Admin/AssignTeacherToClass');
        }
    } else {
        header('Location: ./');
    }
});

Route::set('admin/unassignsubject', function () {
    if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fields = [
                'sub_id' => 0,
            ];
            if (AdminController::update('addto_class', $fields, 'cls_id', $_POST['sclass'])) {
                AdminController::success();
            } else {
                AdminController::error();
            }
        } else {
            AdminController::CreateView('Admin/UnassignSubject');
        }
    } else {
        header('Location: ./');
    }
});