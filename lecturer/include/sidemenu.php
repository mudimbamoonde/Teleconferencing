<section class="sidebar" >
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p ><?php echo "Tina Katongo" ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
            <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Home</span>
                <span class="pull-right-container">

            </span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>User Management</span>
                <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="addUser.php"><i class="fa fa-users"></i>Add User</a></li>
                <li><a href="accountSettings.php"><i class="fa fa-key"></i>Account Settings</a></li>
                <li><a href="privalegeAssign.php"><i class="fa fa-paper-plane"></i> Privilege Assignment</a></li>

            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-weibo"></i>
                <span>Case Management</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">

                <li><a href="addCase.php"><i class="fa fa-paragraph"></i> Add Case</a></li>
                <li><a href="viewCase.php"><i class="fa fa-street-view"></i> View Cases</a></li>

            </ul>
        </li>

        <li class="treeview">

            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Crime Dealing</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>

            <ul class="treeview-menu">
                <li><a href="viewDetectives.php"><i class="fa fa-assistive-listening-systems"></i> Assign Detective to Case</a></li>
                <li><a href="victims.php"><i class="fa fa-caret-down"></i> Victim</a></li>
                <li><a href="proccessCase.php"><i class="fa fa-caret-down"></i> Process Case</a></li>
            </ul>

        </li>

<!--        <li class="treeview">-->
<!--            <a href="#">-->
<!--                <i class="fa fa-database"></i>-->
<!--                <span>Database Settings</span>-->
<!--                <span class="pull-right-container">-->
<!--            <i class="fa fa-angle-left pull-right"></i>-->
<!--            </span>-->
<!--            </a>-->
<!--            <ul class="treeview-menu">-->
<!--                <li><a href="tbl_add.php"><i class="fa fa-table"></i>Add Table</a></li>-->
<!--                <li><a href=""><i class="fa fa-pencil fa-tablet"></i>View Tables</a></li>-->
<!--                <li><a href=""><i class="fa fa-newspaper-o"></i> Normalize Tables </a></li>-->
<!--                <li><a href=""><i class="fa fa-trash"></i>Delete Table</a></li>-->
<!--            </ul>-->
<!--        </li>-->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cog"></i>
                <span>Profile</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-lock"></i>Logout</a></li>
            </ul>
        </li>

    </ul>
</section>