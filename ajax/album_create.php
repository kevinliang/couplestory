<?php
require('../includes/connect.php');
session_start();
ob_start();



if(isset($_GET['album_id'])) {
	$album_id = $mysqli->real_escape_string($_GET['album_id']);
}
else {
	$query = "SELECT id FROM albums ORDER BY id DESC LIMIT 1";
	if($result = $mysqli->query($query)) {
		if($result->num_rows == 1) {
			$row = $result->fetch_row();
			
			$album_id = $row[0];
		}
	}
}

$return = "";

foreach ($_FILES["media"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $name = $_FILES["media"]["name"][$key];
        $ext = pathinfo($name, PATHINFO_EXTENSION);
        
        $query = "INSERT INTO media (album_id, uid, ext, size) VALUES('$album_id', '".$_SESSION['uid']."', '$ext', '$size')";
        $mysqli->query($query);
        
        $query = "SELECT id FROM media ORDER BY id DESC LIMIT 1";
				$next_id;
				
				if($result2 = $mysqli->query($query)) {
					if($result2->num_rows == 1) {
						$row2 = $result2->fetch_row();
						
						$next_id = $row2[0];
					}
				}
				
        move_uploaded_file($_FILES["media"]["tmp_name"][$key], HOME_PATH."img/".$next_id.".".$ext);
        
        
        $size = filesize(HOME_PATH."img/".$next_id.".".$ext);

        if(isset($_GET['album_id'])) {
        	$return = "<div class='left-col-box'><div class='image_settings'>Hi</div><div class='album_image'><div class='image_settings'><button class='delete_button' id='$next_id'>Delete</button></div><img src='/includes/thumber.php?file=../img/$next_id.$ext&width=218&height=218' /></div></div>".$return;
        }
    }   
}

echo $return;

  

?>