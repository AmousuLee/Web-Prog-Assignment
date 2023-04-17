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
                $sql = "SELECT * FROM `user`
                        WHERE `email` = '$email'
                        AND `password` = '$password';";

                $result = mysqli_query($conn, $sql);

                // if result more than 0 , found user
                // ? proceed to set session
                if ($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();
                    
                    $_SESSION["name"] = $row["name"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["phoneNo"] = $row["phoneNo"];
                    $_SESSION["login"] = "user";
                    
                    header('Location: ../home_user.php');
                    die();
                }
                // else if result is 0, did not found user
                // ? return back to login
                else
                {
                    header('Location: ../login.php');
                    die();
                }
            }
            // ! else one of the value above isnt set
            // ? return back to login
            else
            {
                header('Location: ../login.php');
            }

            $conn->close();
        ?>
    </body>
</html>