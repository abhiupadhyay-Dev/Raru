<?php include_once("../include/config.php");
include('verify_login.php'); 
//print_r($_SESSION); ?>
<?php
	$title_tag = "Change Password";
    $breadcrumb = "Change Password";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/head.php'; ?>
<?php
if(isset($_POST['submit']))
{ 
//echo "hiiii";exit;
//print_r($_POST);
//print_r($_SESSION);exit;
	$old_password = $_POST['oldpd'];
	$newPass = $_POST['newPass'];
	$varifyNewPass = $_POST['varifyNewPass'];
	if($_POST['oldpd'] !== '' || $_POST['newPass'] !== '' || $_POST['varifyNewPass'] !== '')
	{
		
		$queryResult = $db->get_results("SELECT * FROM tbl_admin WHERE a_rank='".$_SESSION['userid']."'");
		//print_r($queryResult);exit;
		if($old_password == $queryResult[0]->a_pass)
		{
			//echo "if";exit;
			global $db;
			//echo "UPDATE users SET `password` = '".$newPass."' WHERE userId = '".$_SESSION['userId']."'";exit;
			$query = $db->query("UPDATE tbl_admin SET `a_pass` = '".$newPass."' WHERE a_rank = '".$_SESSION['userid']."'");
			if($query)
			{
				//echo "hiii";exit;
				$message = "<font style='color:#0f77d0'>Password change successfully.</font>";
			}
			else
			{
				$message = "<font style='color:red'>There is some problem.</font>";
			}
		}
		else
		{
			//echo "else";exit;
			$message = "<font style='color:red'>Old Password is wrong.</font>";
		}
	}
	else
	{
		$message = "<font style='color:red'>All Fields are required</font>";
	}
}

?>
</head>
<body>
<!-- START PAGE CONTAINER -->
<div class="page-container"> 
  
  <!-- START PAGE SIDEBAR -->
  <?php include 'includes/navigation.php'; ?>
  <!-- END PAGE SIDEBAR --> 
  
  <!-- PAGE CONTENT -->
  <div class="page-content"> 
    
    <!-- START X-NAVIGATION VERTICAL -->
    <?php include 'includes/nav-horizontal.php'; ?>
    <!-- END X-NAVIGATION VERTICAL --> 
    
    <!-- START BREADCRUMB -->
    <?php include 'includes/breadcrumb.php'; ?>
    <!-- END BREADCRUMB --> 
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
      <div class="row">
        <div class="col-md-12"> 
          
          <!-- START PROJECTS BLOCK -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title-box">
                <h3>Change Password</h3>
                <!--span>Orders activity</span--> 
              </div>
              <ul class="panel-controls">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
              </ul>
            </div>
            <div class="panel-body">
            <?php  if($message){ echo $message;}?>
              <form name="changePassForm" id="changePassForm" method="post" action="" class="form-horizontal">
               <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Old Password</label>
                  <div class="col-md-6 col-xs-12">
                    
                     <input class="validate[required] form-control" type="password" name="oldpd"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">New Password</label>
                  <div class="col-md-6 col-xs-12">
                    <input class="validate[required] form-control" type="password" name="newPass" id="newPass"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 col-xs-12 control-label">Confirm Password</label>
                  <div class="col-md-6 col-xs-12">
                    <input type="password" class="validate[required,equals[newPass]] form-control" name="varifyNewPass" />
                  </div>
                </div>
                <div class="form-group padding-10 padding-bottom-0">
                  <button class="btn btn-primary pull-right btn-cancel" data-url="<?php echo $sitepath_admin;?>/index.php">Cancel <span class="fa fa-times fa-right"></span></button>
                  <button class="btn btn-primary pull-right" id="submit" name="submit">Save <span class="fa fa-floppy-o fa-right"></span></button>
                </div>
              </form>
            </div>
          </div>
          <!-- END PROJECTS BLOCK --> 
          
        </div>
      </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER --> 
  </div>
  <!-- END PAGE CONTENT --> 
</div>
<!-- END PAGE CONTAINER --> 

<!-- MESSAGE BOX-->
<?php include 'includes/logout.php'; ?>
<!-- END MESSAGE BOX--> 

<!-- FOOTER SCRIPTS & AUDIO PRELOAD -->
<?php include 'includes/footer-scripts.php'; ?>
<script>
$(document).ready(function(){
	$("#changePassForm").validationEngine();
	});
</script>
<!-- END FOOTER SCRIPTS & AUDIO PRELOAD -->
</body>
</html>
