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
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link href="assets/css/userSearch.css" rel="stylesheet" />
        <script>
        function badUser(){
            alert("Name Doesn't Exist!");
            window.location = './home_admin.php';
        }
    </script>
    </head>
    <body>
    <!-- navbar start : for user -->
        <?php
            include("assets/navbar.php");
        ?>
                <header class="masthead text-white" style="margin-bottom: 10vh">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Search User</h1>
                </div>
            </div>
        </header>

    <!-- main cont. start -->
    <?php   
        $name = $_POST["name"];

    include("assets/DB_conn.php");

    $sql = "SELECT * FROM `user` WHERE `name` = '$name';";
    $result = mysqli_query($conn, $sql); 
    $row=mysqli_fetch_array($result,MYSQLI_BOTH);

    if(mysqli_num_rows($result)>1){
        $name == $row['name'];
        $id = $row['userID'];
        $email = $row['email'];
        $password = $row['password'];
        $phoneNo = $row['phoneNo']
    ?>
    <section id="scroll">
        <div class="bodyform">
            <div class="container px-5">
                <div class="containerForm">
                    <div class="title">User Details</div>
                    <form class="loginuser" action="assets/deleteUser.php" method="POST">
                        <div class="user-details">
                        <div class="input-box">
                                <span class="details">User ID:</span>
                                <input type="text" id="name" name="id" value="<?php echo $id ?>"readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">User name:</span>
                                <input type="text" id="name" name="name" value="<?php echo $name ?>"readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Email:</span>
                                <input type="text" id="name" name="email" value="<?php echo $email ?>"readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Password:</span>
                                <input type="text" id="name" name="password" value="<?php echo $password ?>"readonly>
                            </div>
                            <div class="input-box">
                                <span class="details">Phone Number:</span>
                                <input type="text" id="name" name="password" value="<?php echo $phoneNo ?>"readonly>
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
                            <input type="submit" value="Delete">
                        </div>
                        <div class="button red">
                            <input type="button" value="Go back!" onclick="history.back()" style="background-color: red;">
                        </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
</section>

    <?php
    }
    else{
        mysqli_close($conn);
        echo "<script>badUser()</script>";
        die();
    } ?>

    <!-- footer start -->
        <?php
            include("assets/footer.html");
        ?>

        <!-- Bootstrap core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></scrip>
        <!-- Core theme JS -->
        <script src="assets/js/scripts.js"></script>
    </body>
</html>