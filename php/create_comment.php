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

    $comment = $_REQUEST['comment'];
    $user_id = $_SESSION['glbl_user']->user_id;
    $data_id = $_REQUEST['data_id'];

    $sql = "INSERT INTO comment (content,user_id,data_id) VALUES ('$comment','$user_id','$data_id')";

    if ($result = mysqli_query($conn, $sql)) {
        $comment_id = mysqli_insert_id($conn);
        ?>
        <script type="text/javascript">
            alert("Comment created!");
           // window.location.href = "http://webapp.cs.clemson.edu/~tmcvick/html/view_data.php?data_id=" . '$data_id';
        </script>

        <?php
    } else {
dieWithError(16);
    }
}
?>
