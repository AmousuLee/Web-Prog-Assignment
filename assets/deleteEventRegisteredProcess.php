
<html>
    <head>
        <script>
            function success(){
                alert("Registration Successfully Removed!");
                window.location = '../profile_user.php';
            }
            function fail(){
                alert("Remove Failed!");
                window.location = '../profile_user.php';
            }
        </script>
    </head>


    <?php
        include("navbar.php");

        $event = $_GET["event"];

        include("DB_conn.php");
        $sql = "DELETE FROM `event` WHERE `eventID` = '$event';";
        $result = mysqli_query($conn, $sql); 
        if($result){
            mysqli_close($conn);
            echo"<script>success()</script>";
        }else{
            mysqli_close($conn);
            echo"<script>fail()</script>";
        }
    ?>

      
    </body>
</html>