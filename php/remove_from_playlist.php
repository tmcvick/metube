<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/10/17
 * Time: 8:24 PM
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


    $sql = "DELETE FROM playlist_data WHERE data_id = '$data_id'";

    if ($result = mysqli_query($conn, $sql)) {
        echo 'Data unlinked: ' . '<br>';
    } else {
        echo $conn->error;
    }
}
?>