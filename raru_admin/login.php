<?php include('../include/config.php');?>
<?php
    $title_tag = "Login";
    $breadcrumb = "Login";
?>
<?php if(isset($_POST['signin']))
{
	//print_r($_POST);exit;
    $name = $_POST['name'];
    $password = $_POST['password'];
    if($name == '' || $password == '')
    {
        $message =  'Email and password both field required.';
    }
    else
    {
        $users_detail = $db->get_results("SELECT * FROM tbl_admin WHERE a_email='".$name."' AND a_pass='".$password."'");
		//print_r($users_detail);exit;
        if(count($users_detail) >0)         
        {
            session_start();
            $_SESSION['userid'] = $users_detail[0]->a_rank;
            $_SESSION['username'] = $users_detail[0]->a_name;
			$_SESSION['email'] = $users_detail[0]->a_email;
          	$message =  "Login Successfully.";
            $URL = $sitepath_admin."/index.php";
            echo ("<script>location.href='$URL'</script>");
        }
        else
        {
            $message = "Invalid username and password.";
        }
    }
}
?> 
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
        <?php include 'includes/head.php'; ?>
    </head>
    <body>

        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <div class="logo"><img src="../img/logos/footer-logo.png" alt="logo" style="border-radius:15px;margin-bottom:10px"></div>
               
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name ="name" placeholder="Username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                         <p style="color:#fff"><?php if($message){echo $message;}?></p>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" name="signin" type="submit">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2023 <?php echo $sitename;?>
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>
