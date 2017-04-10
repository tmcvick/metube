<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/10/17
 * Time: 2:26 PM
 */

include_once "include.php";

$data_id = $_REQUEST["data_id"];

$sql = "SELECT * FROM data WHERE data_id = '$data_id' ";

if($resultData = mysqli_query($conn, $sql)) {
    while($rowData = mysqli_fetch_assoc($resultData)) {
        echo json_encode($rowData);
        $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$data_id' and data_tag.tag_id=tag.tag_id;";
        if($resultTag = mysqli_query($conn, $sql)) {
            while($rowTag = mysqli_fetch_assoc($resultTag)) {
                echo '<br>';
                echo json_encode($rowTag);
            }
        } else {
            echo "Error with getting tags <br>";
            echo $conn->error;
        }
        echo '<br>';
    }
} else {
    echo "Error with getting data <br>";
    echo $conn->error;
}
?>