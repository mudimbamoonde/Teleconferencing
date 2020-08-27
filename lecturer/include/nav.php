<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="home.php" class="navbar-brand"><b>Teleconferencing:</b>MIS</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">

                    <li><a href="index.php">Home Page <span class="sr-only">(current)</span></a></li>

                    <li><a href="studymaterial.php">Study Material</a></li>

                    <li >
                        <a href="courseQuiz.php">Quiz</a>
                    
                    </li>


                    <li><a href="logout.php" >Logout</a></li>
                    <li><a href='' class="btn btn-danger" ><?php echo $_SESSION["name"] ?></a ></li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->

            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>