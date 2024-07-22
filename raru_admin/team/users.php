<?php include_once("../include/config.php"); ?>
<?php
    $title_tag = "Users";
    $breadcrumb = "Users";
?>
<?php include('../Class/Users.php');
$obj_users = new Users();?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'includes/head.php'; ?>
</head>
<?php if($_REQUEST['action'] == 'delete')
{
	global $db;
	$query = $db->query('DELETE FROM users WHERE userId="'.$_REQUEST['userId'].'"');
	if($query)
	{
		$msg = 'Record successfully deleted.';
	}
}

if($_POST['addUser'] == 'addUser')
{
	$obj_users->fname = $_POST['fname'];
	$obj_users->lname = $_POST['lname'];
	$obj_users->email = $_POST['email'];
	$obj_users->password = $_POST['password'];
	$obj_users->address = $_POST['address'];
	$obj_users->phone = $_POST['phone'];
	$obj_users->gender = $_POST['gender'];
	$obj_users->type = $_POST['type'];
	$obj_users->storeId = $_REQUEST['storeId'];
	$obj_users->dob = $_POST['dob'];
	$obj_users->isverified = '1';
	$obj_users->status = '1';
	$check = $obj_users->verifyemail();
	if($check == 0)
	{
	  if($obj_users->insert())
	  {
		  if($_REQUEST['storeId'] == '')
		  {
			  $page = "users.php";
		  }
		  else
		  {
			  $page = "users.php?storeId=".$_REQUEST['storeId'];
		  }
		  redirect($page);
	  }
	  else
	  {
		  $message = 'There is some problem';
	  }
	}
	else
	{
		echo '<script>alert("This email is allready registerd");</script>';
	}
} 
?>
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
          <div class="panel panel-default tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#users" role="tab" data-toggle="tab">Users</a></li>
             <?php if($_SESSION['type'] =='Admin' && $_REQUEST['storeId'] == ''){?>  
              <li><a href="#add-user" role="tab" data-toggle="tab">Add User</a></li>
              <?php } ?>
            </ul>
            <div class="panel-body tab-content">
            <div class="panel-title-box panel-title-custom clearfix">
				<?php if($type =='Admin' && $_REQUEST['storeId'] == '') { ?>
					<h3>Users</h3>
				<?php } else {?>
					<h3></h3>
				<?php }?>
			</div>
            <?php if($msg){echo $msg;} ?>
              <div class="tab-pane active" id="users">
                <div class="table-responsive">
                  <input type="hidden" name="user_type" id="user_type" value="<?php echo $_SESSION['type'];?>" />
                  <input type="hidden" name="storeId" id="storeId" value="<?php echo $_REQUEST['storeId'];?>" />
                  <table id="userdata" class="table table-hover ajax-datatable">
                    <thead>
                      <tr>
                        <th width="10%">#</th>
                        <th width="10%">UserId</th>
                        <th width="15%">Name</th>
                        <th width="15%">Email</th>
                        <th width="15%">Phone No</th>
                        <th width="10%">Type</th>
                        <th width="10%">Is verified</th>
                        <th width="15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="spinner">
                        <td colspan="8"><i class="fa fa-spinner fa-spin"></i></td>
                      </tr>
                    </tbody>
                  </table>
                  <span id="loading"></span> </div>
              </div>
              <div class="tab-pane" id="add-user">
                <form class="form-horizontal" name="adduser" id="adduser" method="post">
                <input type="hidden" name="addUser" id="addUser" value="addUser">
                <?php if($message){echo $message;} ?>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">First Name</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" class="validate[required] form-control"  name="fname" id="fname"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" class="validate[required] form-control" name="lname" id="lname"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Email</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" class="validate[required] form-control" name="email" id="email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Password</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="password" class="validate[required] form-control" name="password" id="password"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Address</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" class="validate[required] form-control" name="address" id="address"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Phone</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" class="validate[required] form-control" name="phone" id="phone"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Gender</label>
                    <div class="col-md-6 col-xs-12">
                      <select name="gender" id="gender" class="form-control select">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">DOB</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" class="form-control" name="dob" id="dob"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Type</label>
                    <div class="col-md-6 col-xs-12">
                     <?php if($_SESSION['type'] != "jradmin") {?>
                     <?php if($_REQUEST['storeId'] != '')
					 {?>
                      <select name="type" id="type" class="form-control select">
                        <option value="">---User Type----</option>
                        <option value="Kitchen Staff">Kitchen Staff</option>
                        <option value="Store Admin">Store Admin</option>
                      </select>
                      <?php }
					  else
					  { ?>
                       <select name="type" id="type" class="form-control select">
                        <option value="">---User Type----</option>
                        <option value="Front user">Front user</option>
                      </select>
                      <?php }?>
                      <?php } else {?>
                     <!-- <select name="type" id="type" class="form-control select">
                        <option value="">---User Type----</option>
                        <option value="Front User">Front User</option>
                      </select>-->
                      <?php } ?>
                    </div>
                  </div>
                  <div class="form-group padding-10 padding-bottom-0">
                  <button class="btn btn-primary pull-right btn-cancel" data-url="users.php">Cancel <span class="fa fa-times fa-right"></span></button>
                    <button class="btn btn-primary pull-right">Add User <span class="fa fa-floppy-o fa-right"></span></button>
                  </div>
                </form>
              </div>
              <div class="tab-pane" id="set-feature-restaurants"></div>
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
<link rel="stylesheet" media="all" type="text/css" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> 
<script>
$(document).ready(function(){
	
	$("#adduser").validationEngine();
});
$('#dob').datepicker({
			changeMonth: true,
            changeYear: true,
			yearRange: "-100:+0",

	});

</script>
<!-- END FOOTER SCRIPTS & AUDIO PRELOAD -->
</body>
</html>
