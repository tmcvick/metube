<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 09:31
 */
include_once "include.php";

if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
    header("Location: ../login.php"); /* Redirect browser */
    exit();
} else {

    $query = $_SERVER['QUERY_STRING'];

    $sql = "SELECT * FROM data WHERE $query";
    if ($resultData = mysqli_query($conn, $sql)) {
        //echo json_encode($resultData);
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            echo json_encode($rowData);
            $data_id = $rowData['data_id'];
            $sql = "SELECT data_id, keyword FROM tag INNER JOIN data_tag on data_tag.data_id ='$data_id' and data_tag.tag_id=tag.tag_id;";
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