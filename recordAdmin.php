<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin's Record Page</title>
        <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900"
            rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
            rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="./assets/css/styles.css" rel="stylesheet" />
    </head>

    <?php

        // check if sess. var is set ; else return to login
        if (!isset($_SESSION["login"]) && $_SESSION["login"] != "admin") {
            header('Location: ./index.php');
            exit;
        }
        
        include("./assets/DB_conn.php");
    ?>

    <body>
    <!-- navbar start : for admin -->
        <?php
            include("./assets/navbar.php");
        ?>
    <!-- main cont. start -->
    <!-- ! added inline : adjust footer to bottom -->
        <header class="masthead text-center text-white" style="margin-bottom: 8vh">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Record Page</h1>
                </div>
            </div>
        </header>

        <section id="scroll">
            <div class="bodyform">
                <div class="container px-5">
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary" onclick="history.back()" style="background-color: red;">Go Back</button>
                        </div>
                        <br>
                        <table class="table table-light table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">userID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">PhoneNo</th>
                                    <th scope="col">eventID</th>
                                    <th scope="col">categoryID</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM `event` e
                                            RIGHT OUTER JOIN `user` u 
                                            ON e.userID=u.userID
                                            ORDER BY u.userID asc";
                                    $query = mysqli_query($conn, $sql);
                                    while($result = mysqli_fetch_array($query,MYSQLI_BOTH)){
                                        echo "<tr>";
                                            echo "<td>$result[userID]</td>";
                                            echo "<td>$result[name]</td>";
                                            echo "<td>$result[email]</td>";
                                            echo "<td>$result[password]</td>";
                                            echo "<td>$result[phoneNo]</td>";
                                            echo "<td>$result[eventID]</td>";
                                            echo "<td>$result[categoryID]</td>";
                                        echo "</tr>";
                                    }
                                ?>
                                </tbody>
                        </table>
                </div>
            </div>
        </section>
    <!-- footer start -->
        <?php
            include("./assets/footer.html");
        ?>

        <!-- Bootstrap core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS -->
        <script src="./assets/js/scripts.js"></script>
    </body>
</html>