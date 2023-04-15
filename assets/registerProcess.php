<html>
    <head>
    </head>
    <body>
        <?php
            session_start();

            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phoneNo = $_POST["phoneNo"];

            $conn = new mysqli("127.0.0.1", "root", "", "archeryevent") or die("Connection failed : " . $conn->connect_error);

            // ! check if all non-null val is set
            if(isset($name) && isset($email) && isset($password))
            {
                // check in db for existing name
                $sql = "SELECT `name` FROM `user`
                        WHERE `name` = '$name';";

                $result = mysqli_query($conn, $sql);

                // if result return 0 , no conflict with existing users
                // ? proceed to insert data
                if ($result->num_rows == 0)
                {
                    $sql = "INSERT INTO `user` (`name`, `email`, `password`, `phoneNo`)
                            VALUES ('$name', '$email', '$password', '$phoneNo');";

                    mysqli_query($conn, $sql);
                    
                    //echo "<script>alert(\"Successfully created account! You can log in using this account now.\");</script>";
                    header('Location: ../login.php');
                    die();
                }
                // else if result more than 0, conflict with existing users
                // ? return back to register
                else
                {
                    //echo "<script>alert(\"Account has been created with same name!\");</script>";
                    header('Location: ../register.php');
                    die();
                }
            }
            // ! else one of the value above isnt set
            // ? return back to register
            else
            {
                //echo "<script>alert(\"Error in registering user!\");</script>";
                header('Location: ../register.php');
            }
        ?>
    </body>
</html>