<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include("../include/config.php");



if($_POST['logoutData'] == 'logoutData')
{
	//echo('hiii');

	$date = date('Y-m-d H:i:s');
	$userId = $_SESSION['userid'];
	//echo $userId;exit;
	session_destroy();

	//print_r($_SESSION);

	$msg = 'yes';
	//echo $msg;exit;
} 

if($_POST['imagedelete'] == 'imagedelete')
{
	$user_group_arr = array();
	$id = $_POST['id'];
	$delete_image = $db->query("DELETE FROM `product_image` WHERE id='".$_POST['id']."'");
	if($delete_image)
	{
		array_push($user_group_arr,1);
		//array_push($user_group_arr,'');
	}
	else
	{
		array_push($user_group_arr,0);
		//array_push($user_group_arr,$sitepath);
	}
	echo json_encode($user_group_arr);
}

if($_POST['infraimagedelete'] == 'infraimagedelete')
{
	$user_group_arr = array();
	$id = $_POST['id'];
	$delete_image = $db->query("DELETE FROM `infra_image` WHERE id='".$_POST['id']."'");
	if($delete_image)
	{
		array_push($user_group_arr,1);
		//array_push($user_group_arr,'');
	}
	else
	{
		array_push($user_group_arr,0);
		//array_push($user_group_arr,$sitepath);
	}
	echo json_encode($user_group_arr);
}

if($_POST['getsubcat'] == 'getsubcat')
{
	
   $subcat_details = $db->get_results("SELECT * FROM product_subcategory WHERE cat_id='".$_POST['cat_id']."' AND status='1'");
   echo json_encode($subcat_details);
}

?>