<?php
session_start();

if($_SESSION['fotosUp'] == '') {
	$_SESSION['fotosUp'] = array();
}

$output_dir = "uploads/";
if(isset($_FILES["myfile"]))
{
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
 	 	$fileName = $_FILES["myfile"]["name"];
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
		//$_SESSION['fotosUp'] = array();
		$_SESSION['fotosUp'][] = $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($j=0; $j < $fileCount; $j++)
	  {
	  	$fileName = $_FILES["myfile"]["name"][$j];
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$j],$output_dir.$fileName);
	  	$ret[]= $fileName;
		//$_SESSION['fotosUp'] = array();
		$_SESSION['fotosUp'][] = $fileName;
	  }
	
	}
    echo json_encode($ret);
 }
 ?>