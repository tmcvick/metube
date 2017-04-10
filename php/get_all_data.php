<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/5/17
 * Time: 00:29
 */
    include_once "include.php";

    $sql = "SELECT * FROM data;";
    
    if($resultData = mysqli_query($conn, $sql)) {
        while($rowData = mysqli_fetch_assoc($resultData)) {
            echo json_encode($rowData);
            $data_id = $rowData['data_id'];
            $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$data_id' and data_tag.tag_id=tag.tag_id;";
            if($resultTag = mysqli_query($conn, $sql)) {
                while($rowTag = mysqli_fetch_assoc($resultTag)) {
                    echo json_encode($rowTag);
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