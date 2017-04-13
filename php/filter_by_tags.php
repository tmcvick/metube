<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 09:37
 */
include_once "include.php";

if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
    header("Location: ../login.php"); /* Redirect browser */
    exit();
} else {

    $query = $_REQUEST['keyword'];

    $sql = "SELECT data.* FROM data INNER JOIN data_tag on data_tag.data_id = data.data_id INNER JOIN tag on data_tag.tag_id = tag.tag_id WHERE tag.keyword='$query'";

    if ($resultData = mysqli_query($conn, $sql)) {
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            echo json_encode($rowData);
        }
    } else {
        echo "Error with getting data <br>";
        echo $conn->error;
    }
}