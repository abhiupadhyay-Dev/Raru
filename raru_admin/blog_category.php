<?php include('../include/config.php');
include('verify_login.php');
?>
<?php

    $title_tag = "Blog Category";

    $breadcrumb = "Blog Category";

?>

<!DOCTYPE html>

<html lang="en">
<head>
<?php include 'includes/head.php'; ?>
</head>

<body>
<?php 
if(isset($_POST['Submitpages']))
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

  $product_category = $db->query("INSERT INTO `product_category`(`name`,`slug`,`status`) VALUES ('".addslashes($_POST['name'])."','".$slug_final."','1')");

  if($product_category)
  {
    $message = "Blog Category Create Successfully.";
    $page = "blog_category.php";
    redirect($page); 
  }

}

if($_REQUEST['action'] =='delete')
{
  global $db;
  $sqlnew   = "DELETE FROM `product_category` WHERE id='".$_REQUEST['id']."'";
  $querynew = $db->query($sqlnew);
  if($querynew)
  {
    $message = "Blog Category delete successfully";
    $page = "blog_category.php";
    redirect($page); 
  }
}

?>

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
              <li class="active"><a href="#category" role="tab" data-toggle="tab">All Blog Category</a></li>
              <li><a href="#add-category" role="tab" data-toggle="tab">Add Blog Category</a></li>
            </ul>
            <div class="panel-body tab-content">
              <div class="tab-pane active" id="category">
                <table class="table table-hover datatable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Blog Category Name</th>
                      <th width="20%">Add Blog</th>
                      <th width="10%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $product_category = $db->get_results("SELECT * FROM product_category WHERE status='1' ORDER BY id DESC");
                     if(count($product_category)>0)
                     {
                      $i=0;
                      foreach($product_category as $cat_dtls)
                        {?>
                          <tr>
                            <td><?php echo $i= $i+1;?></td>
                            <td><?php echo $cat_dtls->name;?></td>
                             <td><a href="blog.php?cat_id=<?php echo $cat_dtls->id;?>">Add</a></td>
                            <td class="center"><a href="edit_category.php?id=<?php echo $cat_dtls->id;?>" title="Edit"><span class="fa fa-pencil"></span></a>
                              <a href="#" class="mb-control" data-box="#item-delete" data-item="id" data-item-number="<?php echo $cat_dtls->id;?>" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash-o"></span></a>
                            </td>
                          </tr>
                    <?php }

				            }?>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane" id="add-category">
                <form class="form-horizontal" id="addPage" method="post" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-md-3 col-xs-12 control-label">Blog Category Name</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" id="name" name="name" class="validate[required] form-control" value="" />
                    </div>
                  </div>
                 <div class="form-group padding-10 padding-bottom-0">
                    <button class="btn btn-primary pull-right btn-cancel" data-url="blog_category.php">Back <span class="fa fa-undo fa-right"></span></button>
                    <button class="btn btn-primary pull-right" name="Submitpages" id="Submitpages">Submit<span class="fa fa-floppy-o fa-right"></span></button>
                  </div>
                </form>
              </div>
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

	$("#addPage").validationEngine();

});


</script> 

<!-- END FOOTER SCRIPTS & AUDIO PRELOAD -->

</body>
</html>
