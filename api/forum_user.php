<?php
	// Connect to database
	include("db_connect.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	
	function getForumUsers()
	{
		global $conn;
		$query = "SELECT * FROM forum_user INNER JOIN user
        WHERE user.user_forum_id = forum_user.id";
		$products_arr=array();
		$products_arr["status_reponse"]=http_response_code(200);
   		$products_arr["forum_user"]=array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			extract($row);
			$product_item=array(
				"id" => $id,
				"lastReplyDate" => $lastReplyDate,
				"avatar_url" => utf8_encode($avatar_url),
				"nb_post" => $nb_post,
				"banned" => $banned,
                "email_address" => utf8_encode($email_address),
                "user_forum_id" => $user_forum_id,
				"username" => utf8_encode($username),
				"username_canonical" => utf8_encode($username_canonical),
				"email" => utf8_encode($email),
				"email_canonical" => utf8_encode($email_canonical),
                "enabled" => $enabled,
                "salt" => $salt,
				"password" => utf8_encode($password),
				"last_login" => $last_login,
				"confirmation_token" => $confirmation_token,
				"password_requested_at" => $password_requested_at,
                "roles" => $roles,
                "nb_visite" => $nb_visite,
				"dateInscrip" => $dateInscrip,
				"role" => $role,
				"Status" => $Status,
				"image_name" => $image_name,
                "image_size" => $image_size,
                "updated_at" => $updated_at,
				"liste_visiteur" => $liste_visiteur,
			);
	  
			array_push($products_arr["forum_user"], $product_item);
			//$response[] = $row;
		}
		
		http_response_code(200);
		header('Content-Type: application/json');
		echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR );
			
	}
	
	function getForumUser($id=0)
	{
		global $conn;
		$query = "SELECT * FROM forum_user INNER JOIN user
        ON user.user_forum_id = forum_user.id";
		
		if($id != 0)
		{
			$query .= " WHERE forum_user.id=".$id."";
		}
		$products_arr=array();
		$products_arr["status_reponse"]=http_response_code(200);
        $products_arr["id_forum_user"]=$id;
   		$products_arr["forum_user"]=array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			extract($row);
			$product_item=array(
				"id" => $id,
				"lastReplyDate" => $lastReplyDate,
				"avatar_url" => utf8_encode($avatar_url),
				"nb_post" => $nb_post,
				"banned" => $banned,
                "email_address" => utf8_encode($email_address),
                "user_forum_id" => $user_forum_id,
				"username" => utf8_encode($username),
				"username_canonical" => utf8_encode($username_canonical),
				"email" => utf8_encode($email),
				"email_canonical" => utf8_encode($email_canonical),
                "enabled" => $enabled,
                "salt" => $salt,
				"password" => utf8_encode($password),
				"last_login" => $last_login,
				"confirmation_token" => $confirmation_token,
				"password_requested_at" => $password_requested_at,
                "roles" => $roles,
                "nb_visite" => $nb_visite,
				"dateInscrip" => $dateInscrip,
				"role" => $role,
				"Status" => $Status,
				"image_name" => $image_name,
                "image_size" => $image_size,
                "updated_at" => $updated_at,
				"liste_visiteur" => $liste_visiteur,
			);
	  
			array_push($products_arr["forum_user"], $product_item);
		}
		header('Content-Type: application/json');
		if( empty($products_arr["forum_user"]) == true ){
            $empty_res=array();
            $empty_res["code"]=http_response_code(200);
            $empty_res["message"]='Pas de forum_user ayant pour id '.$id;
			echo json_encode($empty_res, JSON_PRETTY_PRINT);}
		else{
			echo json_encode($products_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR );
			}
	}


/*
	function addForum_user()
	{
		global $conn;
		$lastReplyDate = $_POST["lastReplyDate"];
		$avatar_url = $_POST["avatar_url"];
		$nb_post = $_POST["nb_post"];
		$banned = $_POST["banned"];
		$email_address = $_POST["email_address"];
		$user_forum_id = $_POST["user_forum_id"];
		$username = $_POST["username"];
		$username_canonical = $_POST["username_canonical"];
		$email = $_POST["email"];
		$email_canonical = $_POST["email_canonical"];
		$enabled = $_POST["enabled"];
		$salt = $_POST["salt"];
		$password = $_POST["password"];
		$last_login = $_POST["last_login"];
		$confirmation_token = $_POST["confirmation_token"];
		$password_requested_at = $_POST["password_requested_at"];
		$roles = $_POST["roles"];
		$nb_visite = $_POST["nb_visite"];
		$dateInscrip = date('Y-m-d H:i:s');
		$role = $_POST["role"];
		$Status = $_POST["Status"];
		$image_name = $_POST["image_name"];
		$image_size = $_POST["image_size"];
		$updated_at = $_POST["updated_at"];
		$liste_visiteur = $_POST["liste_visiteur"];
	//	echo $query="INSERT INTO user(name, description, price, category_id, created, modified) VALUES('".$name."', '".$description."', '".$price."', '".$category."', '".$created."', '".$modified."')";

/*
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit ajout� avec succ�s.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	function updateForum_user($id)
	{
		global $conn;
		$_PUT = array();
		parse_str(file_get_contents('php://input'), $_PUT);
		$name = $_PUT["name"];
		$description = $_PUT["description"];
		$price = $_PUT["price"];
		$category = $_PUT["category"];
		$created = 'NULL';
		$modified = date('Y-m-d H:i:s');
		$query="UPDATE produit SET name='".$name."', description='".$description."', price='".$price."', category_id='".$category."', modified='".$modified."' WHERE id=".$id;
		
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit mis a jour avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Echec de la mise a jour de produit. '. mysqli_error($conn)
			);
			
		}
		
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	*/
	function deleteForumUser($id)
	{
		global $conn;
		
		$query = "DELETE FROM user WHERE id=".$id;
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 200,
				'status_message' =>'User supprime avec succes.'
			);
		}
		else
		{
			$response=array(
				'status' => 200,
				'status_message' =>'La suppression du User a echoue. '. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	switch($request_method)
	{
		
		case 'GET':
			// Retrive Products		
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				getForumUser($id);
			}
			else
			{
				getForumUsers();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			// Ajouter un produit
			//addForum_user();
			break;
			
		case 'PUT':
			// Modifier un produit
			$id = intval($_GET["id"]);
			//updateForum_user($id);
			break;
			
		case 'DELETE':
			// Supprimer un produit
			$id = intval($_GET["id"]);
			deleteForumUser($id);
			break;

	}
