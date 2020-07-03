<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php">Learning Management System</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbardrop" data-toggle="dropdown">
                Teachers
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../admin/teachers">View Teachers</a>
                <a class="dropdown-item" href="../admin/add/teacher">Add new Teacher</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Students
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../admin/students">View Students</a>
                <a class="dropdown-item" href="../admin/add/student">Add new Student</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Classes
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../admin/classes">View Classes</a>
                <a class="dropdown-item" href="../admin/add/class">Add new Class</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Subjects
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../admin/subjects">View Subjects</a>
                <a class="dropdown-item" href="../admin/add/subject">Add new Subject</a>
            </div>
        </li>

        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Assignments
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="../admin/assignclasstostudent">Assign Class to Student</a>
                <a class="dropdown-item" href="../admin/assignsubjecttoclass">Assign Subject to a Class</a>
                <a class="dropdown-item" href="../admin/assignteachertostudent">Assign Teacher to a Student</a>
                <a class="dropdown-item" href="../admin/assignteachertoclass">Assign Teacher to a Class</a>
                <a class="dropdown-item" href="../admin/unassignsubject">Unassign Subject to a Class</a>
            </div>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">

        <span class="navbar-text">
            Welcome, <?php echo $_SESSION['_name']; ?> |
        </span>
        <li class="nav-item">
            <img src="/<?php echo 'schoolmangementsystem/'.$_SESSION['user_img'] ?>" alt="Avatar" height="50" height="50" class="avatar">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../logout">Logout</a>
        </li>


    </ul>
</nav>