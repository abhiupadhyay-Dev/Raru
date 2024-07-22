<?php include('../include/config.php'); ?> 
<?php 
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
	$userId = $_SESSION['user_id'];
	 redirect('home.php');
} 
else{
	redirect('login.php');
}
 ?>