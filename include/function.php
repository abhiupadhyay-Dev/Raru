<?php

##############

function redirect($pageName)

{

	echo "<script>window.location = '".$pageName."'; </script>";

}

##############

function image_upload($elem_name,$doc_types,$orig_upload_path)

{

	if($doc_types == "images")

	{

		$allowed_filetypes = array('.jpg','.gif','.bmp','.png','.jpeg');

	}

	elseif($doc_types == "documents")

	{

		$allowed_filetypes = array('.txt','.doc','.docx','.xls','.xlsx','.ppt','.pptx','.pdf','.jpg','.gif','.bmp','.png');

	}

	$invalidfiles = "";

	$filename = $_FILES[$elem_name]['name'];

	// Get the name of the file (including file extension).

	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.

	if($_FILES[$elem_name]['tmp_name'] == '')

	{

		return false;

	}

	elseif(!in_array($ext,$allowed_filetypes))

	{

		return false;

	}

	else

	{

		if(file_exists($orig_upload_path."/".$_FILES[$elem_name]['name']))

		{

			$file_new_name = rand(1,10000000000).$_FILES[$elem_name]['name'];//echo "<br>image already exists";

		}

		else

		{

			$file_new_name = $_FILES[$elem_name]['name'];//echo "<br>image does not exists";

		}

		$tmppath = $_FILES[$elem_name]['tmp_name'];

		$image = $orig_upload_path."/".$file_new_name;

		//echo $image; exit;

		if(move_uploaded_file($tmppath,$image))

		{

			//echo "gfgggggg";exit;

			$imagepath = $file_new_name;

			return $imagepath;
		}

		else

		{
			return false;
		}

	}

}

function dashBoardProjectDetails()
{
	global $db;
	$startDate = date('Y-m-01');
	$endDate=date('Y-m-t');
	//echo "SELECT startdate,COUNT(*) as totalnumproject, sum(costInr) as totalpcost FROM project Where startdate >= '".$startDate."' AND startdate <= '".$endDate."'";exit;
	$totalproject=$db->get_results("SELECT task_date,COUNT(*) as totalnumproject, sum(costInr) as totalpcost FROM task Where task_date >= '".$startDate."' AND task_date <= '".$endDate."' AND status !='0'");
	return $totalproject;
}

function DashboardRevenueDetails()
{
	global $db;
	$startDate = date('Y-m-01');
	$endDate=date('Y-m-t');
	$totalrevenue=$db->get_results("SELECT createdDatetime, sum(costInr) as totalrcost FROM projectHistory Where createdDatetime >= '".$startDate."' AND createdDatetime <= '".$endDate."'");
	return $totalrevenue;
}


function DashboardExpenseDetails()
{
	global $db;
	//$month=date('m');
	$startDate = date('Y-m-01');
	$endDate=date('Y-m-t');
    $totalexpense=$db->get_results("SELECT createdDatetime, sum(costInr) as totalecost FROM expenseHirstory Where createdDatetime >= '".$startDate."' AND createdDatetime <= '".$endDate."'");

	return $totalexpense;
}

function updateLogin($date,$adminId)

{

	global $db;

	$result = $db->query("UPDATE `users` SET `lastloginDatetime` = '".$date."' WHERE userId = '".$adminId."'");

	return $result;

}

function getUserData($id)

{

	global $db;

	$result = $db->get_results("SELECT * FROM users WHERE userId = '".$id."'");

	return $result;



}

function getAreaname($araId)

{

	global $db;

	$result = $db->get_results("SELECT * FROM area WHERE areaId = '".$araId."'");

	return $result;

}

function getExtraItemDetail($extraitemId)

{

	global $db;

	$result = $db->get_results("SELECT * FROM productExtraitem WHERE extraitemId = '".$extraitemId."'");

	return $result;

}

function getProductItem($productId)

{

	global $db;

	$result = $db->get_results("SELECT * FROM product WHERE productId = '".$productId."'");

	return $result;

}

function getStoredetails($storeId)

{

	global $db;

	$result = $db->get_results("SELECT * FROM store WHERE storeId = '".$storeId."'");

	return $result;

}

function getAddOnsDetail($addonId)

{

	global $db;

	$result = $db->get_results("SELECT * FROM attributesData WHERE id = '".$addonId."'");

	return $result;

}

function getStoreItem($storeId)

{

	global $db;

	$result = $db->get_results("SELECT * FROM store WHERE storeId = '".$storeId."'");

	return $result;

}

function getuserwalletAmount($userid)

{

	global $db;

	$result = $db->get_results("SELECT * FROM wallet WHERE userId = '".$userid."'");

	return $result;

}

function getwallettransaction($userid){

	global $db;

	$result = $db->get_results("SELECT * FROM walletHistory WHERE userid = '".$userid."' AND status='1' ORDER BY historyId DESC");

	return $result;

}

function getOrderDetail($orderId)

{

	global $db;

	$result = $db->get_results("SELECT * FROM orders WHERE orderId = '".$orderId."'");

	return $result;

}



function getKitchenstaffDetails($storeId,$type)

{

	global $db;

	$result = $db->get_results("SELECT * FROM `users` where storeId = '".$storeId."' AND type = '".$type."'");

	return $result;

}

function deliveryboyDetails($id)

{

	global $db;

	//echo "SELECT * FROM `users` where userId = '".$id."'";exit;

	$result = $db->get_results("SELECT * FROM `users` where userId = '".$id."'");

	return $result;

}



function getStoreUsingAreaType($areaid,$zipcode,$storeType,$storeOpen){



	global $db;

	$day = date('w') + 1;

	if($storeOpen !='')

	{

		//echo "SELECT * FROM storeTiming WHERE dayId = '".$day."' AND isOpen='".$storeOpen."'";exit;

		$result_timing =$db->get_results("SELECT * FROM storeTiming WHERE dayId = '".$day."' AND isOpen='".$storeOpen."'");

		if(count($result_timing) > 0)

		{

			foreach($result_timing as $timnig)

			{

				$isOpen[] = $timnig->storeId;

			}

		}

		else

		{

			$isOpen[] = 0;

		}

	}

		//print_r($isOpen) ;exit;

	//echo 'count'.count($isOpen);

	if($areaid !='')

	{

		//echo "SELECT * FROM `store` WHERE status = '1'";exit;

		$data = $db->get_results("SELECT * FROM `store` WHERE status = '1'");

	}

	else

	{

		//echo "SELECT * FROM `store` WHERE zipcode = '".$zipcode."'";exit;

		$data = $db->get_results("SELECT * FROM `store` WHERE zipcode = '".$zipcode."'");

	}

	$j=0;

	//echo count($storeType);

	for($i=0;$i<count($data);$i++)

	{

		$areaids = explode(",",$data[$i]->areaId);

		$types = explode(",",$data[$i]->storeTypeId);

		if(count($storeType) >0)

		{

			if (count(array_intersect($storeType,$types) ) > 0 && in_array($areaid,$areaids))

			{

				if(count($isOpen))

				{

					if($isOpen[0] == 0)

					{

						$store_array[$j] == '';

					}

					else

					{

					  if(in_array($data[$i]->storeId,$isOpen))

					  {

						  $store_array[$j] = $data[$i];

						  $j++;

					  }

					}

				}

				else

				{

					$store_array[$j] = $data[$i];

					$j++;

				}

			}

		}

		else

		{

			if(in_array($areaid,$areaids))

			{

				if(count($isOpen))

				{

					if($isOpen[0] == 0)

					{

						$store_array[$j] == '';

					}

					else

					{

					  if(in_array($data[$i]->storeId,$isOpen))

					  {

						  $store_array[$j] = $data[$i];

						  $j++;

					  }

					}

				}

				else

				{

					$store_array[$j] = $data[$i];

					$j++;

				}

			}

		}

	}

	return $store_array;
}

function getStoreUsingAreaTypeforApp($areaid,$storeType,$storeOpen){

	global $db;

	$day = date('w') + 1;

	if($storeOpen !='')

	{

		$result_timing =$db->get_results("SELECT * FROM storeTiming WHERE dayId = '".$day."' AND isOpen='".$storeOpen."'");

		if(count($result_timing) > 0)

		{

			foreach($result_timing as $timnig)

			{

				$isOpen[] = $timnig->storeId;

			}

		}

	}

	//print_r($isOpen);

	$data = $db->get_results("SELECT * FROM `store` WHERE status = '1'");

	$j=0;

	//echo count($storeType);

	for($i=0;$i<count($data);$i++)

	{

		$areaids = explode(",",$data[$i]->areaId);

		$types = explode(",",$data[$i]->storeTypeId);

		//print_r($types);

		if(count($storeType) >0)

		{

			//echo "hiii";

			if (in_array($storeType,$types) > 0 && in_array($areaid,$areaids))

			{

				if(count($isOpen))

				{

					if(in_array($data[$i]->storeId,$isOpen))

					{

						$store_array[$j] = $data[$i];

						$j++;

					}

				}

				else

				{

					$store_array[$j] = $data[$i];

					$j++;

				}

			}

		}

		else

		{

			//echo "heyyyy";

			if(in_array($areaid,$areaids))

			{

				if(count($isOpen))

				{

					if(in_array($data[$i]->storeId,$isOpen))

					{

						$store_array[$j] = $data[$i];

						$j++;

					}

				}

				else

				{

					$store_array[$j] = $data[$i];

					$j++;

				}

			}

		}

	}

	//echo "<pre>";

	//print_r($store_array);

	return $store_array;
}

?>

