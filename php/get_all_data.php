<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/5/17
 * Time: 00:29
 */
    include_once "include.php";

    //Gender: 1 for male, 2 for female, 3 for other
    $sql = "SELECT * FROM data";
    
    if($result = mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            json_encode($row);
        }
    } else {
        echo $conn->error;
    }
?>