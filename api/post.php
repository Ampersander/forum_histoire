<?php
// Connect to database
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];

function getPosts()
{
	global $conn;
	$query = "SELECT *
		FROM workingforum_thread INNER JOIN `workingforum_post` 
			  ON workingforum_post.thread_id = workingforum_thread.id";
	$products_arr = array();
	$products_arr["status_reponse"] = http_response_code(200);
	$products_arr["post"] = array();
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$product_item = array(
			"user_id" => $user_id,
			"thread_id" => $thread_id,
			"content" => utf8_encode($content),
			"published" => $published,
			"ip" => $ip,
			"moderateReason" => $moderateReason,
			"voteUp" => $voteUp

		);

		array_push($products_arr["post"], $product_item);
	}
	header('Content-Type: application/json');
	echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
}

function getPost($id = 0)
{
	global $conn;
	$query = "SELECT *
		FROM workingforum_thread INNER JOIN `workingforum_post` 
			  ON workingforum_post.thread_id = workingforum_thread.id";

	if ($id != 0) {
		$query .= " WHERE workingforum_post.thread_id=" . $id . "";
	}
	$products_arr = array();
	$products_arr["status_reponse"] = http_response_code(200);
	$products_arr["id_thread"] = $id;
	$products_arr["posts"] = array();
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$product_item = array(
			"user_id" => $user_id,
			"content" => utf8_encode($content),
			"published" => $published,
			"ip" => $ip,
			"moderateReason" => $moderateReason,
			"voteUp" => $voteUp

		);

		array_push($products_arr["posts"], $product_item);
	}
	header('Content-Type: application/json');
	if (empty($products_arr["posts"]) == true) {
		$empty_res = array();
		$empty_res["code"] = http_response_code(200);
		$empty_res["message"] = 'Pas de post_id ayant pour variable ' . $id;
		echo json_encode($empty_res, JSON_PRETTY_PRINT);
	} else {
		echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
	}
}

function getPostByLabelThread()
{
	$products_arr = array();
	if (isset($_POST["labelThread"])) {
		global $conn;
		$query = "SELECT * FROM workingforum_thread 
        INNER JOIN `workingforum_post` ON workingforum_post.thread_id = workingforum_thread.id";
		$labelThread = urldecode($_POST['labelThread']);
		$products_arr["status_reponse"] = http_response_code(200);
		$products_arr["labelThread"] = $labelThread;
		$products_arr["thread_id"] = '';

		$products_arr["posts"] = array();
		$query .= " WHERE workingforum_thread.label = '" . $labelThread . "'";
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_array($result)) {
			extract($row);
			$products_arr["thread_id"] = $thread_id;

			$product_item = array(
				"user_id" => $user_id,
				"content" => $content,
				"published" => $published,
				"cdate" => $cdate,
				"ip" => $ip,
				"moderateReason" => $moderateReason,
				"voteUp" => $voteUp
			);

			array_push($products_arr["posts"], $product_item);
		}

		header('Content-Type: application/json');
		if (empty($products_arr["posts"]) == true) {
			$empty_res = array();
			$empty_res["code"] = http_response_code(200);
			$empty_res["message"] = 'Pas de label de thread ayant pour variable ' . $labelThread;
			echo json_encode($empty_res, JSON_PRETTY_PRINT);
		} else {
			echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
		}
	} else {
		header('Content-Type: application/json');
		header("HTTP/1.0 400 Bad Request");
		$products_arr["status_reponse"] = http_response_code(400);
		$products_arr["reponse"] = 'Il manque le parametre labelThread';
		echo json_encode($products_arr, JSON_PRETTY_PRINT);
	}
}
switch ($request_method) {

	case 'GET':
		// Retrive Products

		if (!empty($_GET["id"])) {
			$id = intval($_GET["id"]);
			getPost($id);
		} else {
			getPosts();
		}

		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
	case 'POST':
		// Ajouter un produit
		getPostByLabelThread();
		break;
}
