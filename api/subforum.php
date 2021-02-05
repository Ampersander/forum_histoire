<?php
// Connect to database
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];


function getSubforums()
{
	global $conn;
	$query = "SELECT *
		FROM workingforum_subforum";
	$products_arr = array();
	$products_arr["status_reponse"] = http_response_code(200);
	$products_arr["reponse"] = array();
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$product_item = array(
			"id" => $id,
			"forum_id" => $forum_id,
			"description" => utf8_encode($description),
			"name" => utf8_encode($name),
			"slug" => utf8_encode($slug),
			"nb_post" => $nb_post,
			"last_reply_date" => $last_reply_date,
			"allowed_roles" => $allowed_roles,
			"lastReplyUser" => $lastReplyUser,
		);

		array_push($products_arr["reponse"], $product_item);
		//$response[] = $row;
	}
	http_response_code(200);
	header('Content-Type: application/json');
	echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
}

function getSubforum($id = 0)
{
	global $conn;
	$query = "SELECT *
		FROM workingforum_subforum";

	if ($id != 0) {
		$query .= " WHERE workingforum_subforum.id=" . $id . "";
	}
	$products_arr = array();
	$products_arr["status_reponse"] = http_response_code(200);
	$products_arr["id_subforum"] = $id;
	$products_arr["subforum"] = array();
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {
		extract($row);
		$product_item = array(
			"forum_id" => $forum_id,
			"description" => utf8_encode($description),
			"name" => utf8_encode($name),
			"slug" => utf8_encode($slug),
			"nb_post" => $nb_post,
			"last_reply_date" => $last_reply_date,
			"allowed_roles" => $allowed_roles,
			"lastReplyUser" => $lastReplyUser,
		);

		array_push($products_arr["subforum"], $product_item);
	}
	header('Content-Type: application/json');
	if (empty($products_arr["subforum"]) == true) {
		$empty_res = array();
		$empty_res["code"] = http_response_code(200);
		$empty_res["message"] = 'Pas de subforum ayant pour id ' . $id;
		echo json_encode($empty_res, JSON_PRETTY_PRINT);
	} else {
		echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
	}
}

function getSubforumByLabelForum()
{
	$products_arr3 = array();
	if (isset($_POST["nameForum"])) {
		global $conn;
		$query3 = "SELECT * FROM workingforum_forum 
		INNER JOIN `workingforum_subforum` ON workingforum_forum.id = workingforum_subforum.forum_id";
		$nameForum = urldecode($_POST['nameForum']);
		$products_arr["status_reponse"] = http_response_code(200);
		$products_arr3["nameForum"] = $nameForum;
		$products_arr3["forum_id"] = '';
		$products_arr3["subforum"] = array();
		$query3 .= " WHERE workingforum_forum.name = '" . $nameForum . "'";
		$result3 = mysqli_query($conn, $query3);
		while ($row3 = mysqli_fetch_array($result3)) {
			extract($row3);
			$query = "SELECT * FROM workingforum_subforum 
			INNER JOIN `workingforum_thread` 
				ON workingforum_thread.subforum_id = workingforum_subforum.id";
			$products_arr = array();
			$query .= " WHERE workingforum_thread.subforum_id = '" . $id . "'";
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
					"posts" => $products_arr2
				);

				array_push($products_arr, $product_item);
			}
			$product_item3 = array(
				"forum_id" => $forum_id,
				"description" => utf8_encode($description),
				"name" => utf8_encode($name),
				"slug" => utf8_encode($slug),
				"nb_post" => $nb_post,
				"last_reply_date" => $last_reply_date,
				"allowed_roles" => $allowed_roles,
				"lastReplyUser" => $lastReplyUser,
				"thread" => $products_arr
			);
			array_push($products_arr3["subforum"], $product_item3);
		}
		$products_arr3["forum_id"] = $forum_id;
		header('Content-Type: application/json');
		if (empty($products_arr["subforum"]) == true) {
			$empty_res = array();
			$empty_res["code"] = http_response_code(200);
			$empty_res["message"] = 'Pas de subforum ayant pour variable ' . $nameForum;
			echo json_encode($empty_res, JSON_PRETTY_PRINT);
		} else {
			echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR);
		}
	} else {
		header('Content-Type: application/json');
		header("HTTP/1.0 400 Bad Request");
		$products_arr3["status_reponse"] = http_response_code(400);
		$products_arr3["reponse"] = 'Il manque le parametre nameForum';
		echo json_encode($products_arr3, JSON_PRETTY_PRINT);
	}
}


switch ($request_method) {

	case 'GET':
		// Retrive Products

		if (!empty($_GET["id"])) {
			$id = intval($_GET["id"]);
			getSubforum($id);
		} else {
			getSubforums();
		}

		break;
	default:
		// Invalid Request Method
		header("HTTP/1.0 405 Method Not Allowed");
		break;
	case 'POST':
		// Ajouter un produit
		getSubforumByLabelForum();
		break;
}
