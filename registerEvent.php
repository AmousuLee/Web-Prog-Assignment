<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Event Registration</title>
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

<body id="page-top">

    <!-- Navbar -->
    <?php
        include ("assets/navbar.php");
        include("assets/DB_conn.php");
    ?>

    <!-- Header -->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Event Registration</h1>
            </div>
        </div>
    </header>
    <!--Event Detail-->
    <section>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">

                    <div class="p-5">
                        <h2 class="display-4">Tournament Detail</h2>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Range</th>
                                <th scope="col">Target Size</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Capacity</th>
                                <th scope="col">Register</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT * FROM category";
                                $query = mysqli_query($conn,$sql);
                                $i = 0;
                                while($result = mysqli_fetch_array($query,MYSQLI_NUM)){
                                    $sql2 = "SELECT * FROM event WHERE categoryID = $result[0]";
                                    $left_result = mysqli_query($conn,$sql2);
                                    $left = $result[5]-mysqli_num_rows($left_result);
                                    echo "<tr>";
                                        echo "<th scope='row'>".++$i."</th>";
                                        echo "<td>$result[1] meter</td>";
                                        echo "<td>$result[2] centimeter</td>";
                                        echo "<td>$result[3]</td>";
                                        echo "<td>$result[4]</td>";
                                        echo "<td>"."$left/$result[5]"."</td>";
                                        if($left<=0){
                                            echo "<td><a class='btn btn-primary btn-sm disabled' href='#' role='button'>Full</a></td>";
                                        }else{
                                            echo "<td><a class='btn btn-primary btn-sm' href='assets/registerEventProcess.php?id=".$result[0]."' role='button'>Register</a></td>";
                                        }
                                    echo "</tr>";
                                }
                            ?>
                            </tbody>
                          </table>
                    </div>

            </div>
        </div>
    </section>
    <!-- Event registration form -->
    <!-- //! input validation is done on input pattern-title -->
   

    <!-- Footer -->
    <?php
        include("assets/footer.html");
    ?>
    
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="assets/js/scripts.js"></script>

</body>

</html>