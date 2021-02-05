<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getForums()
	{
		global $conn;
		$query = "SELECT *
		FROM workingforum_forum";
		$products_arr=array();
		$products_arr["status_reponse"]=http_response_code(200);
   		$products_arr["forum"]=array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			extract($row);
			$product_item=array(
				"id" => utf8_encode($id),
				"name" => utf8_encode($name),
			    "slug" => utf8_encode($slug)
				
			);		
			array_push($products_arr["forum"], $product_item);
		}
		header('Content-Type: application/json');
	
		echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
	
    }

	function getForum($id=0)
	{
		global $conn;
		$query = "SELECT *
		FROM workingforum_forum";
		
		if($id != 0)
		{
			$query .= " WHERE workingforum_forum.id=".$id."";
		}
		$products_arr=array();
		$products_arr["status_reponse"]=http_response_code(200);
        $products_arr["id_forum"]=$id;
   		$products_arr["forum"]=array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			extract($row);
			$product_item=array(
				"name" => utf8_encode($name),
			    "slug" =>utf8_encode($slug)
			);
	  
			array_push($products_arr["forum"], $product_item);
		}
		header('Content-Type: application/json');
		if( empty($products_arr["forum"]) == true ){
            $empty_res=array();
            $empty_res["code"]=http_response_code(200);
            $empty_res["message"]='Pas de forum_id ayant pour variable'.$id;
			echo json_encode($empty_res, JSON_PRETTY_PRINT);}
		else{
			echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
			}
		}
	
	switch($request_method)
	{
		
		case 'GET':
			// Retrive Products
		
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				getForum($id);
			}
			else
			{
				getForums();
			}
			
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;

	}
