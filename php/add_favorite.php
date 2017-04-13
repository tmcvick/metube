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

    $user_id = $_SESSION['glbl_user']->user_id;
    $data_id = $_REQUEST['data_id'];

    $sql = "INSERT INTO user_favorite (user_id,data_id) VALUES ('$user_id','$data_id')";

    if ($result = mysqli_query($conn, $sql)) {
        $fav_id = mysqli_insert_id($conn);
        echo 'Favorite added: ' . $fav_id . '<br>';
    } else {
        echo $conn->error;
    }
}
?>