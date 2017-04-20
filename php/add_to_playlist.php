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
    $play_sql = "SELECT playlist_id FROM playlist WHERE name = '$title'";
    if ($result = mysqli_query($conn, $sql)) {
        $rowData = mysqli_fetch_assoc($result);
        $pl_id = $rowData['playlist_id'];
    }
 //   $pl_id = $_REQUEST['pl_id'];

    $sql = "INSERT INTO playlist_data (data_id,playlist_id) VALUES ('$data_id','$pl_id')";

    if ($result = mysqli_query($conn, $sql)) {
        $playlist_data_id = mysqli_insert_id($conn);
            ?>
        <script type="text/javascript">
            alert("Data added to playlist");
            window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/list_playlists.php";
        </script>
    <?php
    } else {
dieWithError(15) ;
    }
}
?>