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
//todo we need to check to ensure a user is logged in... lets do this last. session shit sucks
$u_id  = $_SESSION['glbl_user']->user_id;

/* Insert data */
$sql = "INSERT INTO data (type,filename,description,title,user_id) VALUES ('$dtype', '$flname''$desc','$title','$u_id')";

if($result = mysqli_query($conn, $sql)) {
    $lastdtID = mysqli_insert_id($conn);
    echo 'Data id created: ' . $lastdtID . '<br>';

    //Link each tag thats in the taglist (will be separated by commas)
    //todo make sure the front end validates that each tag in taglist is different or this will become a clusterfuck
    $tag_array = explode(',', $taglist);
    foreach($tag_array as $tag) {
        $sql = "SELECT tag_id FROM tag WHERE keyword = '$tag'";
        echo $tag;
        $tgint = null;
        if($result = mysqli_query($conn,$sql)) {

            //If tag does not exist insert it
            if ($result->num_rows == 0) {
                $sql = "INSERT INTO tag (keyword) VALUES ('$tag')";
                if ($result = mysqli_query($conn, $sql)) {
                    $lastID = mysqli_insert_id($conn);
                    echo 'New tag created: ' . $lastID . '<br>';
                    $tgint = $lastID;
                }
            }
            //the tag already exists
            else {
                $tgint = mysqli_fetch_object($result)->tag_id;
            }
        }
        else {
            echo $conn->error;
        }

        //insert a link between the tag and the data
        $sql = "INSERT INTO data_tag (data_id, tag_id) VALUES ('$lastdtID','$tgint')";
        if($result = mysqli_query($conn, $sql)) {
            $lastID = mysqli_insert_id($conn);
            echo 'New tag linked: ' . $lastID . '<br>';
        }
        else {
            echo $conn->error;
        }
    }

} else {
    echo $conn->error;
}


?>