<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/10/17
 * Time: 7:58 PM
 */

include_once "include.php";


$u_id  = $_SESSION['glbl_user']->user_id;
$pl_name = $_REQUEST['pl_name'];

$sql = "INSERT INTO playlist (name,created_by) VALUES ('$pl_name','$u_id')";

if($result = mysqli_query($conn, $sql)) {
    $playlist_id = mysqli_insert_id($conn);
    echo 'Playlist created: ' . $playlist_id . '<br>';
    $sql = "INSERT INTO user_playlist (user_id, playlist_id) VALUES ('$u_id','$playlist_id')";
    if($result = mysqli_query($conn, $sql)) {
        echo 'Playlist added to creator: ' . mysqli_insert_id($conn) . '<br>';
    } else {
        echo $conn->error;
    }
} else {
    echo $conn->error;
}
?>
