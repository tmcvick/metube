<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/10/17
 * Time: 8:24 PM
 */

include_once "include.php";

$data_id  = $_REQUEST['data_id'];


$sql = "DELETE FROM playlist_data WHERE data_id = '$data_id'";

if($result = mysqli_query($conn, $sql)) {
    echo 'Data unlinked: ' . '<br>';
} else {
    echo $conn->error;
}
?>