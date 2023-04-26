<?php
    session_start();
    echo "<script src='../assets/js/alertmsg.js'></script>";

    if (!isset($_SESSION["login"]) && $_SESSION["login"] != "user") {
        echo "<script>notLogin()</script>";
        exit;
    }

    $category = $_GET["category"];
    $name = $_SESSION["name"];
    

    include("DB_conn.php");

    // ! check if all non-null val is set
    if(isset($category))
    {
        // check in db for existing name
        $sql = "SELECT * FROM `user`
                WHERE `name` = '$name';";

        $result = mysqli_query($conn, $sql);

        // if result more than 0 , found user
        // ? proceed to insert data
        if ($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            $userID = $row["userID"];

            $sql = "SELECT eventID FROM `event`
                    WHERE `userID`='$userID'";
            $result = mysqli_query($conn, $sql);

            //if user havent register the category
            if($result->num_rows < 1){
                $sql = "INSERT INTO `event` (`userID`, `categoryID`)
                        VALUES ('$userID', '$category');";
                mysqli_query($conn, $sql);
                $conn->close();
                echo "<script>successUserRegisterEvent()</script>";
                die();
            }else{
                $conn->close();
                echo "<script>failUserAlreadyReg()</script>";
                die();
            }            
        }
        // else if result is 0, did not found user
        // ? return back to registerEvent
        else
        {
            $conn->close();
            echo "<script>badUserEventUsername()</script>";
            die();
        }
    }
    // ! else one of the value above isnt set
    // ? return back to registerEvent
    else
    {
        $conn->close();
        echo "<script>noCategory()</script>";
        die();
    }
?>
