<?php session_start(); ?>
<html>
    <head>
    </head>
    <body>
        <?php
            $email = $_POST["email"];
            $password = $_POST["password"];

            include("DB_conn.php");

            // ! check if all non-null val is set
            if(isset($email) && isset($password))
            {
                // check in db for existing user
                $sql = "SELECT * FROM `admin`
                        WHERE `email` = '$email'
                        AND `password` = '$password';";

                $result = mysqli_query($conn, $sql);

                // if result return 1 , found user in db
                // ? proceed to set session
                if ($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    
                    $_SESSION["adminID"] = $row["adminID"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["login"] = "admin";
                    
                    header('Location: ../home_admin.php');
                    die();
                }
                // else if result more than 0, conflict with existing users
                // ? return back to login
                else
                {
                    header('Location: ../loginAdmin.php');
                    die();
                }
            }
            // ! else one of the value above isnt set
            // ? return back to login
            else
            {
                header('Location: ../loginAdmin.php');
                die();
            }

            $conn->close();
        ?>
    </body>
</html>