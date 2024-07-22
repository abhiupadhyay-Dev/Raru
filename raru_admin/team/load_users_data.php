<?php
//error_reporting(0);
$page = $_POST['page'];

//$category_id = $_POST['category_id'];

$cur_page = $page;

$page -= 1;

$per_page = 25;

$previous_btn = true;

$next_btn = true;

$first_btn = true;

$last_btn = true;

$start = $page * $per_page;

include('../include/config.php');

include('../Class/Users.php');

$obj_users = new Users();

$content ='';

$content.='<form action="">

				<table id="myTable" class="table table-bordered table-hover dataTable">

					<thead>

						<tr role="row">

							<th style="width:5%">#</th>

							<th style="width:15%">Name</th>

							<th style="width:15%">Company Name</th>

							<th style="width:15%">Email</th>

                           <th style="width:15%">City</th>

                           <th style="width:15%">Contact No</th>

                           <th style="width:15%"></th>

                           

						</tr>

					</thead>

					<tbody>';

$query = "";

if($_POST['name'] != '')

{

	$query .= " AND  name LIKE '%".$_POST['name']."%'";

}

if($_POST['company_name'] != '')

{

	$query .= " AND  company_name LIKE '%".$_POST['company_name']."%'";

}

if($_POST['email_id'] != '')

{

	$query .= " AND  email_id LIKE '%".$_POST['email_id']."%'";

}

if($_POST['city'] != '')

{

	$query .= " AND  city LIKE '%".$_POST['city']."%'";

}

if($_POST['cno'] != '')

{

	$query .= " AND  cno LIKE '%".$_POST['cno']."%'";

}

$users_detail = $obj_users->getRows($query,$arr=array("start"=>$start,"per_page"=>$per_page));

	$j = $start;

	$total_records = count($users_detail);

	 if($total_records > 0)

	{
		
		 for($i=0;$i<$total_records;$i++)

		{

			$j = $j + 1;

			$content.='<tr>

			<td align="center">'.$j.'</td>

			<td align="center">'.$users_detail[$i]->name.' </td>

			<td align="center">'.$users_detail[$i]->company_name.'</td>

			<td align="center">'.$users_detail[$i]->email_id.'</td>

			<td align="center">'.$users_detail[$i]->city.'</td>

			<td align="center">'.$users_detail[$i]->cno.'</td>

		 	<td align="center">';
			
			if($_POST['user_type'] == '2')
			{
				//echo "hiii";exit;
				$content.='<a href="edit-users.php?uid='.$users_detail[$i]->user_id.'"><img src="images/pencil.gif" width="16" height="16" alt="edit" /></a>
				<a href="show_users.php?action=delete&uid='.$users_detail[$i]->user_id.'"><img src="images/delete.gif" width="16" height="16" title="delete"  /></a>
				 
				';
				 
				}
			
			 $content.='</td></tr>';

		}

	}

	else

	{

		$content.='<tr>

		<td align="center" colspan="5">No results Found</td>

		</td>

		</tr>'; 

	}

$content.="</table>";	

$msg = "<div class='data'>" . $content . "</div>"; // Content for Data

$no_count = $obj_users->getRows($where);

$count =count($no_count);

$no_of_paginations = ceil($count / $per_page);

//echo $no_of_paginations;exit;

include("pagination.php");

echo $msg;exit;

?>
