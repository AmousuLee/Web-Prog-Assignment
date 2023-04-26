<?php
    echo "<script src='../assets/js/alertmsg.js'></script>";

    $name = $_POST["name"];

    include("DB_conn.php");
    $sql = "DELETE FROM `user` WHERE `name` = '$name';";
    $result = mysqli_query($conn, $sql); 
    if($result){
        mysqli_close($conn);
        echo"<script>adminDeleteUserSuccess()</script>";
    }else{
        mysqli_close($conn);
        echo"<script>adminDeleteUserFail()</script>";
    }
?>
