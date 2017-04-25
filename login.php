<?php
error_reporting(E_ERROR);
 session_start();
 require_once 'config.php';

	$user_email = trim($_POST['user_email']);
	$user_password = trim($_POST['user_password']);

	$password = md5($user_password);
  
  $sql="SELECT * FROM users WHERE email='".$user_email."' AND password='".$password."'";

  $result=mysqli_query($db,$sql); 

	if($row=mysqli_fetch_assoc($result)){
		$_SESSION['userSession'] = $row['user_id'];
    echo "success";
   } 
   else 
   {
    echo "fail"; // wrong details 
   }
    

?>