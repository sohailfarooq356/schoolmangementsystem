<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">Learning Management System</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../teacher/uploadleacture">Upload Leactures</a>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Students
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../teacher/students">View Students</a>
                <a class="dropdown-item" href="../teacher/add/student">Add New Student</a>
            </div>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <span class="navbar-text">
            Welcome, <?php echo $_SESSION['_name']; ?> |
        </span>
        <li class="nav-item">
            <img src="../<?php echo $_SESSION['user_img'] ?>" alt="Avatar" height="50" height="50" class="avatar">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../logout">Logout</a>
        </li>
    </ul>
</nav>