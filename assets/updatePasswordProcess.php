<?php
    echo "<script src='../assets/js/alertmsg.js'></script>";
    session_start();
    $name =  $_SESSION["name"];
    $password = $_POST["password"];

    include("DB_conn.php");

    // ! check EITHER if non-null val is set
    // ? should be short-circut since $name is always set from form
    if(isset($name) || isset($password))
    {
        // check in db for existing name
        $sql = "SELECT * FROM `user`
                WHERE `name` = '$name'";

        $result = mysqli_query($conn, $sql);

        // if result return more than 0, user found
        // ? proceed to update data
        if ($result->num_rows > 0)
        {
            // set userID for update
            $rows = $result->fetch_assoc();
            $userID = $rows["userID"];
            
            $sql = "UPDATE `user`
                    SET `password` = '$password'
                    WHERE `userID` = '$userID';";

            mysqli_query($conn, $sql);
            $conn->close();
            echo "<script>successPasswordReset()</script>";
            die();
        }
        // else if result 0, no user found
        // ? return back to profile_user
        else
        {
            $conn->close();
            echo "<script>failUserNotFound()</script>";
            die();
        }
    }
    // ! else one of the value above isnt set
    // ? return back to profile_user
    else
    {
        $conn->close();
        echo "<script>failFormIncomplete()</script>";
        die();
    }

?>