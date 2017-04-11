<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/10/17
 * Time: 8:24 PM
 */

include_once "include.php";

$comment = $_REQUEST['comment'];
$user_id  = $_SESSION['glbl_user']->user_id;
$data_id = $_REQUEST['data_id']; //todo change this to current data


$sql = "INSERT INTO comment (content,user_id,data_id) VALUES ('$comment','$user_id','$data_id')";

if($result = mysqli_query($conn, $sql)) {
    $comment_id = mysqli_insert_id($conn);
    echo 'Comment created: ' . $comment_id . '<br>';
} else {
    echo $conn->error;
}
?>
