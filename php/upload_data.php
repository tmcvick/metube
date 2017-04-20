<?php
/**
 * Created by IntelliJ IDEA.
 * User: BrendanGiberson
 * Date: 4/7/17
 * Time: 7:40 PM
 */

include_once "include.php";
if (!isset($_SESSION['glbl_user']) || empty($_SESSION['glbl_user'])) {
    echo '<script language="javascript">';
    echo 'alert("User not logged in!")';
    exit();
} else {

    $dtype = $_REQUEST['dtype'];
    $desc = $_REQUEST['desc'];
    $title = $_REQUEST['title'];
    $taglist = $_REQUEST['taglist'];
    $u_id = $_SESSION['glbl_user']->user_id;

    $dirname = "/home/tmcvick/public_html/uploads/";
    chmod( $dirname,0755);
    
    $filename = basename($_FILES["flname"]["name"]);
    $target_file = $dirname . $filename;
    echo '<script>
    alert("' . json_encode($_FILES).'");
        window.location.href="../html/upload.php";
        </script>';
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    if (file_exists($target_file)) {
        echo '<script>
        alert("File already exists, exiting upload");
        window.location.href="../html/my_channel.php";
        </script>';
    }

    // Check file size
    if ($_FILES["flname"]["size"] > 50000000) {
        echo '<script>
        alert("File is too big, exiting upload");
        window.location.href="../html/my_channel.php";
        </script>';
    }

    if (move_uploaded_file($_FILES["flname"]["tmp_name"], $target_file)) {
        chmod($target_file, 0644);

        /* Insert data */
        $sql = "INSERT INTO data (type,filename,description,title,user_id) VALUES ('$dtype', '$filename', '$desc','$title','$u_id')";

        if ($result = mysqli_query($conn, $sql)) {
            $lastdtID = mysqli_insert_id($conn);
            echo 'Data id created: ' . $lastdtID . '<br>';

            //Link each tag thats in the taglist (will be separated by commas)
            //todo make sure the front end validates that each tag in taglist is different or this will become a clusterfuck
            $tag_array = explode(',', $taglist);
            foreach ($tag_array as $tag) {
                $sql = "SELECT tag_id FROM tag WHERE keyword = '$tag'";
                echo $tag . '<br>';
                $tgint = null;
                if ($result = mysqli_query($conn, $sql)) {

                    //If tag does not exist insert it
                    if ($result->num_rows == 0) {
                        $sql = "INSERT INTO tag (keyword) VALUES ('$tag')";
                        if ($result = mysqli_query($conn, $sql)) {
                            $lastID = mysqli_insert_id($conn);
                            echo 'New tag created: ' . $lastID . '<br>';
                            $tgint = $lastID;
                        }
                    } //the tag already exists
                    else {
                        $tgint = mysqli_fetch_object($result)->tag_id;
                    }
                } else {
                    echo "Error with selecting from tag <br>";
                    echo $conn->error;
                }

                //insert a link between the tag and the data
                $sql = "INSERT INTO data_tag (data_id, tag_id) VALUES ('$lastdtID','$tgint')";
                if ($result = mysqli_query($conn, $sql)) {
                    $lastID = mysqli_insert_id($conn);
                    echo 'New tag linked: ' . $lastID . '<br>';
                } else {
                    echo "Error with inserting into data_tag table <br>";
                    echo $conn->error;
                }
            }
            echo '<script>
alert("Upload successful!");
window.location.href="../html/my_channel.php";
</script>';

        } else {
            echo "Error inserting into data table <br>";
            echo $conn->error;
        }
    } else {
        echo '<script>
        alert("Error uploading file!'. $_FILES['flname']['error'] . '");
        window.location.href="../html/my_channel.php";
        </script>';
    }
}
?>