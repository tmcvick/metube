<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/5/17
 * Time: 00:29
 */
    include_once "include.php";

    $sql = "SELECT * FROM data";
    
    if($result = mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            echo json_encode($row);
        }
    } else {
        echo $conn->error;
    }
?>