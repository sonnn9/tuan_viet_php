<?php
class posts {
    public $conn;

    function __construct()
    {
      
		$conn = new mysqli('localhost', 'root', '', 'myadmin');
		if ($conn->connect_error) {
			die("Connection failed: . $conn->connect_error");
		}
        $this->conn = $conn;
    }

    function add_postS($post,$file)
     {
        	// username
            $errors =[];
		$title = $post['title'];
		$description = $post['description'];
		$date_created = $post['date_created'];
		$created = $_POST['created'];

		$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/tuan_viet_php/upload/avatar/";
		$target_file = $target_dir . basename($file["avatar"]["name"]);
		$avartar = "/upload/avatar/" . $file["avatar"]["name"];
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		$check = getimagesize($file["avatar"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}

		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		// Check file size
		if ($file["avatar"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if (
			$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif"
		) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		var_dump($target_file);
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($file["avatar"]["tmp_name"], $target_file)) {
				echo "The file " . htmlspecialchars(basename($file["avatar"]["name"]));
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}


		if (strlen($title) <= 3) {
			$errors['title'] = 1;
		}

		// description
		if (strlen($description) < 20) {
			$errors['description'] = 1;
		}

		// date created
		if (strlen($date_created) < 6) {
			$errors['date_created'] =  1;
		}

		if ($created === 0) {
			$errors['created'] =  1;
		}

		// Create connection
		$conn = new mysqli('localhost', 'root', '', 'myadmin');
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if ($errors == []) {
			$sql = "INSERT INTO posts (title,description,date_created,created_by,image )
		 VALUES ('" . $title . "','" . $description . "','" . $date_created . "','" . $created . "','" . $avartar . "')";


			if ($this->conn->query($sql) === TRUE) {
				return ['success' => 1,'data'=>$post];
			} else {
                return ['error' => 'connec_err'];

			}
		} else {
            return ['error' => $errors,'data'=>$post];
        }

    }

    function edit_id_posts($id) {
	
	$sql = "SELECT * FROM posts where post_id = " .$id ;
	$detail = $this->conn->query($sql);
	$detail = $detail->fetch_array();
	return $detail;
	}
	function edit_posts($id,$post) {
	$errors =[];
	$title= $post['title'];
	$description = $post['description'];
	$date_created = $post['date_created'];
	$created = $post['created'];
	$image = $post['image'];

	if (strlen($title) <= 3) {
		$errors['title'] = 1;
	}
	
	// description
	if (strlen($description) < 20) {
		$errors['description'] = 1;
	}
	
	// date created
	if (strlen( $date_created ) < 6) {
		$errors['date_created'] =  1;
	}
	
	if ($created =='') {
		$errors['created'] =  1;
	
	}
	if (strlen($image) < 6 ) {
		$errors['image'] = 1;
	}
	if ($errors == []) {
        $sql_update = "update posts set title = '".$title."',description='".$description."',date_created='".$date_created."',created_by='".$created."',image='".$image."' where post_id = " .$id ;
		$result_update = $this->conn->query($sql_update);
        if ($result_update == true) {
			return ['success' => 1,'data'=>$post];
		} else {
			return ['error' => 'connec_err'];

		}
	} else {
		return ['error' => $errors,'data'=>$post];
	}
}


    function deleta_post($GET_id) {
        $id = $GET_id['id'];
        $sql_del = "DELETE FROM posts where post_id = " .$id ;
        $result_del = $this->conn->query($sql_del);
        return $result_del;
    }
    

    function list_posts() {
    
		$sql = "SELECT * FROM posts";
		$result = $this->conn->query($sql)->fetch_all();
        return $result;
    }
}