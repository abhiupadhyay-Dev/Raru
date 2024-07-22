<?php include('../include/config.php'); 
include('verify_login.php');?>
<?php
  $title_tag = "Edit Blog Category";
  $breadcrumb = "Edit Blog Category";
?>
<?php $category_details = $db->get_results("SELECT * FROM product_category WHERE id='".$_REQUEST['id']."'");?>



<!DOCTYPE html>



<html lang="en">

<head>

<?php include 'includes/head.php'; ?>

</head>
<body>
<?php if(isset($_POST['Submitpages']))
{
  $slug = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($_POST['name'])));
  $query = $db->get_results("SELECT * FROM product_category  WHERE  slug LIKE '$slug%'" );
  $numHits = count($query);
  if($numHits <= 0)
  {
   $slug_final = $slug;
  }
  else
  {
    
     $slug_final = $slug.'-'.$numHits;
  }
  
  $update_product = $db->query("UPDATE product_category SET name='".addslashes($_POST['name'])."',slug='".$slug_final."' WHERE id='".$_REQUEST['id']."'");
  if($update_product)
  {
    $message = "Product Category Updated Successfully.";
    $page = "blog_category.php";
    redirect($page); 
  }
}?>

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

                <h3>Edit Category</h3>

                

                <!--span>Orders activity</span--> 

                

              </div>

              <ul class="panel-controls">

                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>

                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>

              </ul>

            </div>

            <div class="panel-body">

              <form class="form-horizontal" id="addPages" method="post" action=""  enctype="multipart/form-data">
                 <?php if($message){ echo $message;}?>
                  <div class="form-group">

                    <label class="col-md-3 col-xs-12 control-label">Category Name</label>

                    <div class="col-md-6 col-xs-12">

                      <input type="text" id="name" name="name" class="validate[required] form-control" value="<?php echo $category_details[0]->name;?>" />

                    </div>

                  </div>
                  <div class="form-group padding-10 padding-bottom-0">

                    <button class="btn btn-primary pull-right btn-cancel" data-url="blog_category.php">Back <span class="fa fa-undo fa-right"></span></button>

                    <button class="btn btn-primary pull-right" name="Submitpages" id="Submitpages">Submit<span class="fa fa-floppy-o fa-right"></span></button>

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

<script src="ckeditor/ckeditor.js"></script> 

<script src="ckeditor/adapters/jquery.js"></script> 

<script>

$(document).ready(function(){

  $("#addPages").validationEngine();

});



</script> 

</body>

</html>

