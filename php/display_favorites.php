<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 18:24
 */
include_once "include.php";

if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    echo '</script>';
} else {
    $user = $_SESSION['glbl_user']->user_id;
    $sql = "SELECT data_id, user.username FROM user_favorite INNER JOIN user on user_favorite.user_id = user.user_id WHERE user_favorite.user_id='$user';";

    if ($resultData = mysqli_query($conn, $sql)) {
        while ($rowData = mysqli_fetch_assoc($resultData)) {
            echo json_encode($rowData);
            echo '<br>';
        }
    } else {
        echo "Error with getting favorites <br>";
        echo $conn->error;
    }
}