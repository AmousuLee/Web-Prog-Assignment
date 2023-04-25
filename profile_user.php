<?php session_start(); ?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Profile</title>
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
                    <h1 class="masthead-heading mb-0">User Profile</h1>
                </div>
            </div>
        </header>

        <section id="scroll">
            <div class="bodyform">
                <div class="container px-5">
                    <div class="containerForm">
                        <div class="titleProfile">Update your profile here!</div>
                        <form class="registerUser" action="assets/updateProfileProcess.php" method="POST" onsubmit="return passwordValidation()">
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" readonly style="border:transparent" name="name" value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <input type="email" name="email" value="<?php echo $row['email']; ?>"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        title="Must contain standard format : johndoe@mail.com"
                                    >
                                </div>
                                <div class="input-box">
                                    <span class="details">Phone number <span>*(not necessary)</span></span>
                                    <input type="text" name="phoneNo" value="<?php if($row['phoneNo'] != ''){ echo $row['phoneNo'];}?>" placeholder="Enter your phone no."
                                        pattern="\d{10,11}"
                                        title="Must contain 10/11 characters (Do not include +60)" 
                                    >
                                </div>
                                <div class="input-box">
                                    <span class="details">Password</span>
                                    <a class='btn btn-primary' href='#' role='button'>Reset Password</a>
                                </div>
                            </div>
                            <div>
                            <span class="details">Event Registeraed:</span>
                            <table class="table table-info table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Range</th>
                                <th scope="col">Target Size</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = "SELECT TargetRg,TargetSz,Date,Time FROM event e JOIN category c ON e.categoryID=c.categoryID WHERE userID ='$id'";
                                $query = mysqli_query($conn,$sql);
                                if((mysqli_num_rows($query))==0){
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "<p>No Event Registered!</p>";
                                }else{
                                    while($row = mysqli_fetch_array($query,MYSQLI_BOTH)){
                                        echo "<tr>";
                                            echo "<td>$row[TargetRg] meter</td>";
                                            echo "<td>$row[TargetSz] centimeter</td>";
                                            echo "<td>$row[Date]</td>";
                                            echo "<td>$row[Time]</td>";
                                        echo "</tr>";
                                    }
                                }
                                
                                mysqli_close($conn);
                            ?>
                            </tbody>
                            </table>
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
    </body>
</html>
