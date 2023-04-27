<?php
    echo "<script src='./js/alertmsg.js'></script>";

    $id = $_POST["id"];


    include("DB_conn.php");
    $sql = "SELECT eventID FROM `event` WHERE `userID` = '$id';";
    $query=mysqli_query($conn, $sql); 

    if($query){
        $row = mysqli_fetch_array($query,MYSQLI_BOTH);
        $eventID = $row['eventID'];

        $sql = "DELETE FROM `event` WHERE `eventID` = '$eventID';";
        $query=mysqli_query($conn, $sql); 
    }

    $sql = "DELETE FROM `user` WHERE `userID` = '$id';";
    $result = mysqli_query($conn, $sql); 
    if($result){
        mysqli_close($conn);
        echo"<script>adminDeleteUserSuccess()</script>";
    }else{
        mysqli_close($conn);
        echo"<script>adminDeleteUserFail()</script>";
    }
?>
