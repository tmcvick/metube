<?php
/**
 * Created by IntelliJ IDEA.
 * User: timmcvicker
 * Date: 4/13/17
 * Time: 10:12
 */
include_once "include.php";
if (isset($_SESSION['glbl_user'])) {
    echo "user set: " . print_r($_SESSION, TRUE);

} else {
    echo 'User not set';
}
echo '
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Media Upload</title>
</head>

<body>

<form method="post" action="" enctype="multipart/form-data" >

    <p style="margin:0; padding:0">
        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
        Add a Media: <label style="color:#663399"><em> (Each file limit 10M)</em></label><br/>
        <input  name="file" type="file" size="50" />

        <input value="Upload" name="submit" type="submit" />
    </p>


</form>

</body>
</html>
';
