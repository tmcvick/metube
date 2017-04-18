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

    $data_id = $_REQUEST['data_id'];   //todo this should be current data
    $user = $_SESSION['glbl_user']->user_id;

    $sql = "DELETE FROM user_favorite WHERE data_id = '$data_id' AND user_id = '$user'";

    if ($result = mysqli_query($conn, $sql)) {
        header("Location: ../html/browse_favorites.php");
        exit();
    } else {
        echo $conn->error;
    }
}
?>