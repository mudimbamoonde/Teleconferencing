<nav class="sidebar sidebar-offcanvas" id="sidebar" >
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="text-wrapper">
                        <p class="profile-name">Tina Katongo</p>
                        <div>
                            <small class="designation text-muted">System Engineer</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <li class="nav-item" >
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-content-copy"></i>
                <span class="menu-title" >Program Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="addSchool.php">Add School</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addProgram.php">Add Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addCourse.php">Add Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="assignCourseProgram.php">Assign Course to program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bulk_assign_p.php">Bulk Course Assign</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="mag_prog.php">Manage Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manage Course</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#semester" aria-expanded="false" aria-controls="semester">
                <i class="menu-icon mdi mdi-decimal-decrease"></i>
                <span class="menu-title">Semester Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="semester">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="addSemester.php">Add Semester</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/ui-features/buttons.html">Manage Semester</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#m_student" aria-expanded="false" aria-controls="m_student">
                <i class="menu-icon mdi mdi-ubuntu"></i>
                <span class="menu-title">Student Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="m_student">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="add_student.php">Add Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="app_pending.php">Pending Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search_student.php">Search Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_student.php">Manage Student</a>
                    </li>
                </ul>
            </div>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#m_lecuturer" aria-expanded="false" aria-controls="m_lecuturer">
                <i class="menu-icon mdi mdi-book"></i>
                <span class="menu-title">Lecturer Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="m_lecuturer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="add_user.php">Add Lecturer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lecturer.php">Lecturer</a>
                    </li>
                
                </ul>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#m_user" aria-expanded="false" aria-controls="m_user">
                <i class="menu-icon mdi mdi-account"></i>
                <span class="menu-title">System users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="m_user">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="add_user.php">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_user.php">Manage User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="activate_student.php">Student User</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>