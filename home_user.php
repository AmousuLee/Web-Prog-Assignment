<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Page</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
            rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
            rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <?php
        session_start();
        $_SESSION["username"] = "nigga";

        // check if sess. var is set ; else return to login
        if (!isset($_SESSION["username"])) {
            header('Location: index.php');
            exit;
        }
    ?>

    <body>
    <!-- navbar start : for user -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">   
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Archery Tournament</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <?php
                            if(isset($_SESSION['username'])){
                                // ! might remove this ; moved to inside header
                                //echo '<li class="nav-item"><a class="nav-link" href="#!">Welcome '; echo $_SESSION['username']; echo '</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="#!">Register</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="#!">Profile</a></li>';
                                echo '<li class="nav-item"><a class="nav-link" href="#!">Logout</a></li>';
                            }
                            //else{
                            //    echo '<li class="nav-item"><a class="nav-link" href="#!">Sign Up</a></li>';
                            //    echo '<li class="nav-item"><a class="nav-link" href="#!">Log In</a></li>';
                            //}
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- main cont. start -->
    <!-- ! added inline : adjust footer to bottom -->
        <header class="masthead text-white" style="margin-bottom: 28vh">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Home Page</h1>
                    <p class="masthead-subheading mb-0">Welcome back, <?php echo $_SESSION['username'] ?>.</p>
                </div>
            </div>
        </header>
    <!-- footer start -->
        <?php
            include("footer.html");
        ?>
    </body>
</html>