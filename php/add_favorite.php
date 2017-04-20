<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/10/17
 * Time: 8:24 PM
 */

include_once "include.php";

    $user_id = $_SESSION['glbl_user']->user_id;
    $data_id = $_REQUEST['data_id'];

    $sql = "INSERT INTO user_favorite (user_id,data_id) VALUES ('$user_id','$data_id')";

    if ($result = mysqli_query($conn, $sql)) {
        $fav_id = mysqli_insert_id($conn);
    } else {
        echo $conn->error;
}
?>