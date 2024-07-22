<?php
//session_start(); 
//print_r($_SESSION);exit;
if($_SESSION['userid'] == "")
{	//echo "heyyyy";exit;
	 $URL= $sitepath_admin."/login.php";
			echo ("<script>location.href='$URL'</script>");
}
?>