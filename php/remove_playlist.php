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
    exit();
} else {

    $pl_id = $_REQUEST['pl_id'];   //todo this should be current data
    $user = $_SESSION['glbl_user']->user_id;

    $sql = "DELETE FROM playlist_data WHERE playlist_id = '$pl_id';";

    if ($result = mysqli_query($conn, $sql)) {
        $sql = "DELETE FROM playlist WHERE playlist_id = '$pl_id';";
        if ($result = mysqli_query($conn, $sql)) {
            header("Location: ../html/list_playlists.php");
            exit();
        } else {
            echo $conn->error;
        }
    } else {
        echo $conn->error;
    }
}
