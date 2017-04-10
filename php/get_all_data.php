<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/5/17
 * Time: 00:29
 */
    include_once "include.php";

    $sql = "SELECT data.data_id, type, filename, description, title, user_id, keyword FROM data INNER JOIN data_tag INNER JOIN tag on data_tag.data_id=data.data_id and data_tag.tag_id=tag.tag_id";
    
    if($result = mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            echo json_encode($row);
        }
    } else {
        echo $conn->error;
    }
?>