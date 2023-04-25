<?php session_start(); ?>
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
        <link href="css/userSearch.css" rel="stylesheet" />
    </head>


    <body>
    <!-- navbar start : for user -->
        <?php
            include("navbar.php");

            $name = $_POST["name"];

            include("DB_conn.php");
            $sql = "DELETE FROM `user` WHERE `name` = '$name';";
            $result = mysqli_query($conn, $sql); 

        ?>
                <header class="masthead text-white" style="margin-bottom: 28vh">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Home Page</h1>
                    <?php
                    if($result){
                        echo "<p class=\"masthead-subheading mb-0\">Account Deleted!</p>";

                    }
                    else{
                        echo "<p class=\"masthead-subheading mb-0\">Error in deleting!</p>";
                    }
                    ?>
                </div>
            </div>
        </header>
        <?php
            include("footer.html");
        ?>

        <!-- Bootstrap core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS -->
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/validation.js"></script>
    </body>
</html>