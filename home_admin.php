<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Page</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
            rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
            rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/css/userSearch.css" rel="stylesheet" />
    </head>

    <?php

        // check if sess. var is set ; else return to login
        if (!isset($_SESSION["login"]) && $_SESSION["login"] != "admin") {
            header('Location: index.php');
            exit;
        }
    ?>

    <body>
    <!-- navbar start : for admin -->
        <?php
            include("assets/navbar.php");
        ?>
    <!-- main cont. start -->
    <!-- ! added inline : adjust footer to bottom -->
        <header class="masthead text-white" style="margin-bottom: 28vh">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Home Page</h1>
                    <p class="masthead-subheading mb-0">Welcome back, Admin ID : <?php echo $_SESSION['adminID'] ?>.</p>
                </div>
            </div>
        </header>

       
        <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <div class="containerForm">
                        <div class="title">Search Specific User</div>
                        <form action="searchUser.php" method="POST">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">User Name:</span>
                                    <input type="text" name="name" placeholder="Enter user name">
                                </div>
                            </div>
                            <div class="button">
                                <input type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="containerForm">
                        <div class="title">Search All User</div>
                        <form action="searchAllUser.php" method="POST">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">User Name:</span>
                                    <input type="text" name="name" value="All Members" readonly style="border:transparent">
                                </div>
                            </div>
                            <div class="button">
                                <input type="submit" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer start -->
        <?php
            include("assets/footer.html");
        ?>

        <!-- Bootstrap core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS -->
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/validation.js"></script>
    </body>
</html>