<?php session_start(); ?>
<html>
    <head>
    </head>
    <body>
        <?php
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $phoneNo = $_POST["phoneNo"];

            $conn = new mysqli("127.0.0.1", "root", "", "archeryevent") or die("Connection failed : " . $conn->connect_error);

            // ! check EITHER if non-null val is set
            // ? should be short-circut since $name is always set from form
            if(isset($name) || isset($email) || isset($password))
            {
                // check in db for existing name
                $sql = "SELECT * FROM `user`
                        WHERE `name` = '$name';";

                $result = mysqli_query($conn, $sql);

                // if result return more than 0, user found
                // ? proceed to update data
                if ($result->num_rows > 0)
                {
                    // set userID for update
                    $rows = $result->fetch_assoc();
                    $userID = $rows["userID"];

                    // ! check if user did not updated email
                    if ($email == "")
                    {
                        $email = $rows["email"];
                    }
                    if ($phoneNo == "")
                    {
                        $phoneNo = $rows["phoneNo"];
                    }
                    
                    $sql = "UPDATE `user`
                            SET `email` = '$email',
                                `password` = '$password',
                                `phoneNo` = '$phoneNo'
                            WHERE `userID` = '$userID';";

                    mysqli_query($conn, $sql);
                    
                    header('Location: ../home_user.php');
                    die();
                }
                // else if result more than 0, conflict with existing users
                // ? return back to profile_user
                else
                {
                    header('Location: ../profile_user.php');
                    die();
                }
            }
            // ! else one of the value above isnt set
            // ? return back to profile_user
            else
            {
                header('Location: ../profile_user.php');
                die();
            }

            $conn->close();
        ?>
    </body>
</html>