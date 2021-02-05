<?php
// Connect to database
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];

function getThreads()
{
	global $conn;
	$query = "SELECT *
		FROM workingforum_thread";
	$products_arr = array();
	$products_arr["status_reponse"] = http_response_code(200);
	$products_arr["reponse"] = array();
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$product_item = array(
			"id" => $id,
			"subforum_id" => $subforum_id,
			"author_id" => $author_id,
			"cdate" => $cdate,
			"nbReplies" => $nbReplies,
			"lastReplyDate" => $lastReplyDate,
			"resolved" => $resolved,
			"locked" => $locked,
			"label" => utf8_encode($label),
			"sublabel" => utf8_encode($sublabel),
			"slug" => utf8_encode($slug),
			"pin" => $pin,
			"lastReplyUser" => $lastReplyUser,
		);

		array_push($products_arr["reponse"], $product_item);
		//$response[] = $row;
	}
	http_response_code(200);
	header('Content-Type: application/json');
	echo json_encode($products_arr, JSON_PRETTY_PRINT);
}

function getThread($id = 0)
{
	global $conn;
	$query = "SELECT *
		FROM workingforum_thread";

	if ($id != 0) {
		$query .= " WHERE workingforum_thread.id=" . $id . "";
	}
	$products_arr = array();
	$products_arr["status_reponse"] = http_response_code(200);
	$products_arr["id_thread"] = $id;
	$products_arr["thread"] = array();
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$product_item = array(
			"subforum_id" => $subforum_id,
			"author_id" => $author_id,
			"cdate" => $cdate,
			"nbReplies" => $nbReplies,
			"lastReplyDate" => $lastReplyDate,
			"resolved" => $resolved,
			"locked" => $locked,
			"label" => utf8_encode($label),
			"sublabel" => utf8_encode($sublabel),
			"slug" => utf8_encode($slug),
			"pin" => $pin,
			"lastReplyUser" => $lastReplyUser,
		);

		array_push($products_arr["thread"], $product_item);
	}
	header('Content-Type: application/json');
	if (empty($products_arr["thread"]) == true) {
		$empty_res = array();
		$empty_res["code"] = http_response_code(200);
		$empty_res["message"] = 'Pas de thread ayant pour id ' . $id;
		echo json_encode($empty_res, JSON_PRETTY_PRINT);
	} else {
		echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
	}
}


function getThreadBySubforumLabel()
{
	$products_arr = array();
	if (isset($_POST["nameSubforum"])) {
		global $conn;
		$query = "SELECT * FROM workingforum_subforum 
        INNER JOIN `workingforum_thread` 
			  ON workingforum_thread.subforum_id = workingforum_subforum.id";
		$nameSubforum = urldecode($_POST['nameSubforum']);
		$products_arr["status_reponse"] = http_response_code(200);
		$products_arr["nameSubforum"] = $nameSubforum;
		$products_arr["subforum_id"] = '';
		$products_arr["thread"] = array();
		$query .= " WHERE workingforum_subforum.name = '" . $nameSubforum . "'";
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_array($result)) {
			extract($row);
			$query2 = "SELECT * FROM workingforum_thread 
				INNER JOIN `workingforum_post` ON workingforum_post.thread_id = workingforum_thread.id";
			$products_arr2 = array();
			$query2 .= " WHERE workingforum_post.thread_id = '" . $id . "'";
			$result2 = mysqli_query($conn, $query2);
			while ($row2 = mysqli_fetch_array($result2)) {
				extract($row2);
				$product_item2 = array(
					"id" => $id,
					"user_id" => $user_id,
					"content" => utf8_encode($content),
					"published" => $published,
					"cdate" => $cdate,
					"ip" => $ip,
					"moderateReason" => $moderateReason,
					"voteUp" => $voteUp
				);

				array_push($products_arr2, $product_item2);
			}
			$products_arr["subforum_id"] = $subforum_id;
			$product_item = array(
				"id" => $id,
				"author_id" => $author_id,
				"cdate" => $cdate,
				"nbReplies" => $nbReplies,
				"lastReplyDate" => $lastReplyDate,
				"resolved" => $resolved,
				"locked" => $locked,
				"label" => utf8_encode($label),
				"sublabel" => utf8_encode($sublabel),
				"slug" => utf8_encode($slug),
				"pin" => $pin,
				"lastReplyUser" => $lastReplyUser,
				"posts" => $products_arr2
			);

			array_push($products_arr["thread"], $product_item);
		}
		header('Content-Type: application/json');
		if (empty($products_arr["thread"]) == true) {
			$empty_res = array();
			$empty_res["code"] = http_response_code(200);
			$empty_res["message"] = 'Pas de subForum ayant pour label ' . $nameSubforum;
			echo json_encode($empty_res, JSON_PRETTY_PRINT);
		} else {
			echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
		}
	} else {
		header('Content-Type: application/json');
		header("HTTP/1.0 400 Bad Request");
		$products_arr3["status_reponse"] = http_response_code(400);
		$products_arr3["reponse"] = 'Il manque le parametre nameSubforum';
		echo json_encode($products_arr3, JSON_PRETTY_PRINT);
	}
}

switch ($request_method) {

	case 'GET':
		// Retrive Products

		if (!empty($_GET["id"])) {
			$id = intval($_GET["id"]);
			getThread($id);
		} else {
			getThreads();
		}

		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
	case 'POST':
		// Ajouter un produit
		getThreadBySubforumLabel();
		break;
}
