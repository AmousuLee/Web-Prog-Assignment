<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Change Password</title>
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
        <link href="assets/css/loginReg.css" rel="stylesheet" />
    </head>

    <?php

        // check if sess. var is set ; else return to login
        if (!isset($_SESSION["login"])) {
            header('Location: index.php');
            exit;
        }
        // if user logged in, proceed to gather detail from db
        else
        {
            $email = $_SESSION['email'];
            include("./assets/DB_conn.php");

            $sql = "SELECT * FROM `user` WHERE `email` = '$email';";
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
        }
    ?>

    <body>
    <!-- navbar start : for user -->
        <?php
            include("assets/navbar.php");
        ?>
    <!-- main cont. start -->
        <header class="masthead text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Reset Password</h1>
                </div>
            </div>
        </header>

        <section id="scroll">
            <div class="bodyform">
                <div class="container px-5">
                    <div class="containerForm">
                        <div class="titleProfile">Reset Password</div>
                        <form class="registerUser" action="assets/updateProfileProcess.php" method="POST" onsubmit="return passwordValidation()">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Password</span>
                                    <input type="password" name="password" id="P" placeholder="Enter your old password"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                    required>
                                </div>
                                <div class="input-box">
                                    <span class="details">Confirm Password</span>
                                    <input type="password" name="CP" id="CP" placeholder="Confirm your new password" 
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
                                    required>
                                </div>
                            </div>
                               
                            <div class="button">
                                <input type="submit" value="Update">
                            </div>
                        </form>
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
