
    <?php
        echo '<script type="text/JavaScript" src="../assets/js/alertmsg.js"></script>';
        $event = $_GET["event"];

        include("DB_conn.php");
        $sql = "DELETE FROM `event` WHERE `eventID` = '$event';";
        $result = mysqli_query($conn, $sql); 
        if($result){
            mysqli_close($conn);
            echo"<script>successRemovedRegisteredEvent()</script>";
        }else{
            mysqli_close($conn);
            echo"<script>failRemovedRegisteredEvent()</script>";
        }
    ?>
