<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/5/17
 * Time: 00:29
 */
    include_once "include.php";

    $sql = "SELECT * FROM data;";
    
    if($result = mysqli_query($conn, $sql)) {
        while($row = mysqli_fetch_assoc($result)) {
            echo json_encode($row);
            $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$row->data_id' and data_tag.tag_id=tag.tag_id;";
            if($result = mysqli_query($conn, $sql)) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo json_encode($row);
                }
            } else {
                echo "Error with getting tags <br>";
                echo $conn->error;
            }
        }
    } else {
        echo "Error with getting data <br>";
        echo $conn->error;
    }
?>