<?php
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('/home/tmcvick/public_html/'));

    foreach($iterator as $item) {
        chmod($item, 0755);
}
	include_once "php/include.php";

	$user = $_REQUEST["user"];
	$pswrd = $_REQUEST["pass"];
	$usrerr = "Invalid username";

	/*SELECT password FROM user_security INNER JOIN user on user_security.security_id on user.security_id WHERE username = '$user'*/
	
	$ver_user = "SELECT security_id FROM user WHERE username = '$user' ";
	$user_result = mysqli_query($conn,$ver_user);
		
	if(empty($user_result)) 
	{
		echo $usrerr; // should empty text field and return 
	}
	else
	{
		$sec_id = mysqli_fetch_object($user_result);
		//echo $sec_id->security_id;

		$ver_pass = "SELECT password FROM user_security WHERE security_id = '$sec_id->security_id' ";
		$pass_result = mysqli_query($conn,$ver_pass);
		$usr_pass = mysqli_fetch_object($pass_result); 
		
			if($usr_pass->password == $pswrd)
			{
				echo 'Success!';
			}
			else{
				echo 'Login failed';
			}
	}

?>