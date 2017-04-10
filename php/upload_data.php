<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/7/17
 * Time: 7:40 PM
 */


include_once "include.php";
$flname = $_REQUEST['flname'];
$dtype = $_REQUEST['dtype'];
$desc = $_REQUEST['desc'];
$title = $_REQUEST['title'];
$taglist = $_REQUEST['taglist'];
$u_id  = $_SESSION['glbl_user']->user_id;




$sql = "INSERT INTO data (type,filename,description,title,user_id) VALUES ('$flname','$dtype','$desc','$title','$u_id')";

if($result = mysqli_query($conn, $sql)) {
    $lastdtID = mysqli_insert_id($conn);
    echo 'Data id created: ' . $lastdtID . '<br>';

    $tag_array = explode(',', $taglist);
    foreach($tag_array as $tag)
    {

        $sql = "SELECT tag_id FROM tag WHERE keyword = '$tag'";
        echo $tag;
        $result = mysqli_query($conn,$sql);
        if($result->num_rows == 0)
        {
            $sql = "INSERT INTO tag (keyword) VALUES ('$tag')";
            if($result = mysqli_query($conn, $sql))
            {
                $lastID = mysqli_insert_id($conn);
                echo 'New tag created: ' . $lastID . '<br>';
                $sql = "SELECT '$lastID' FROM tag";
                $result = mysqli_query($conn,$sql);
            }
        }
        else
        {
            echo $conn->error;
        }
        $tgint = (int)$result;
        $sql = "INSERT INTO data_tag (data_id,tag_id) VALUES ('$lastdtID','$tgint')";
        if($result = mysqli_query($conn, $sql))
        {
            $lastID = mysqli_insert_id($conn);
            echo 'New tag linked: ' . $lastID . '<br>';
        }
    }

} else {
    echo $conn->error;
}


?>