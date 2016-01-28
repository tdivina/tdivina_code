<?php

function data_setting_value($dbc, $id) {
	
	$query = "SELECT * FROM settings WHERE id = '$id'";
	$result = mysqli_query($dbc, $query);
	
	$data = mysqli_fetch_assoc($result);
	
	return $data['value'];
	
}

function data_page($dbc, $id) {
	
	if(is_numeric($id)) {
			
		$cond = "WHERE id = $id";
		
	} else {
		
		$cond = "WHERE slug = '$id'";
	
	}
	
	$query = "SELECT * FROM pages $cond";
	$result = mysqli_query($dbc, $query);
	
	$data = mysqli_fetch_assoc($result);
	
	$data['body_nohtml'] = strip_tags($data['body']);
	
	if($data['body'] == $data['body_nohtml']) {
		
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';
		
	} else {
		
		$data['body_formatted'] = $data['body'];
		
	}
	
	return $data;
	
}


?>