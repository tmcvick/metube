<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/10/17
 * Time: 2:26 PM
 */

include_once "include.php";

$data_id = $_REQUEST["data_id"]; //todo set to current data

$sql = "SELECT comment.content, user.username FROM comment INNER JOIN user on comment.user_id = user.user_id WHERE comment.data_id = '$data_id';";

if($resultData = mysqli_query($conn, $sql)) {
    while($rowData = mysqli_fetch_assoc($resultData)) {
        echo json_encode($rowData);
        echo '<br>';
    }
} else {
    echo "Error with getting comments <br>";
    echo $conn->error;
}
?>