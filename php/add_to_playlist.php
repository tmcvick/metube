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
    if($_POST){
        $title=$_POST['field'];
    }
    $play_sql = "SELECT playlist_id FROM playlist WHERE name = '$title'";
    if ($result = mysqli_query($conn, $play_sql)) {
        $rowData = mysqli_fetch_assoc($result);
        $pl_id = $rowData['playlist_id'];
    }
 //   $pl_id = $_REQUEST['pl_id'];

    $sql = "INSERT INTO playlist_data (data_id,playlist_id) VALUES ('$data_id','$pl_id')";

    if ($result = mysqli_query($conn, $sql)) {
        $playlist_data_id = mysqli_insert_id($conn);
        echo 'Data added to playlist: ' . $playlist_data_id . '<br>';
    } else {
        echo $conn->error;
    }
}
?>