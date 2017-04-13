<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 09:47
 */
include_once "include.php";
if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
    header("Location: ../login.php"); /* Redirect browser */
    exit();
} else {

    $data_id = $_REQUEST['data_id'];

    $sql = "SELECT * FROM data INNER JOIN playlist_data on playlist_data.data_id = data.data_id WHERE playlist_data.playlist_id IN (SELECT playlist_id FROM playlist_data WHERE playlist_data.data_id='$data_id')";

    if ($resultData = mysqli_query($conn, $sql)) {
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            echo json_encode($rowData);
            $new_data_id = $rowData['data_id'];
            $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$new_data_id' and data_tag.tag_id=tag.tag_id;";
            if ($resultTag = mysqli_query($conn, $sql)) {
                while ($rowTag = mysqli_fetch_assoc($resultTag)) {
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
}