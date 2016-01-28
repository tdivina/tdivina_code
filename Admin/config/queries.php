<?php

	switch ($page) {
		
		case 'dashboard':
		
		break;
		
		case 'pages':
			
			if(isset($_POST['submitted']) == 1) {
				
				$title = mysqli_real_escape_string($dbc, $_POST['title']);
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$header = mysqli_real_escape_string($dbc, $_POST['header']);
				$body = mysqli_real_escape_string($dbc, $_POST['body']);
				
				if(isset($_POST['id']) != '') {
					$action = 'updated';
					$q = "UPDATE pages SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
				} else {
					$action = 'added';							
					$q = "INSERT INTO pages (user, slug, title, label, header, body) VALUES ($_POST[user], '$_POST[slug]', '$title', '$label', '$header', '$body')";
				}
				
				
				$r = mysqli_query($dbc, $q);
				
				if($r){
					
					$message = '<p class="alert alert-success">Page was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Page could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
			
			if(isset($_GET['id'])) { $opened = data_post($dbc, $_GET['id']); }
			
		break;
		
		case 'users':
			
			if(isset($_POST['submitted']) == 1) {
				
				$first_name = mysqli_real_escape_string($dbc, $_POST['first_name']);
				$last_name = mysqli_real_escape_string($dbc, $_POST['last_name']);
				
				if($_POST['password'] != '') {
					
					if($_POST['password'] == $_POST['passwordv']) {
						
						$password = " password = SHA1('$_POST[password]'),";
						$verify = true;
						
					} else {
						
						$verify = false;
						
					}					
					
				} else {
						
					$verify = false;	
					
				}
				
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$q = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$_POST[email]', $password status = $_POST[status] WHERE id = $_GET[id]";
					$r = mysqli_query($dbc, $q);
					
				} else {
					
					$action = 'added';
					
					$q = "INSERT INTO users (first_name, last_name, email, password, status) VALUES ('$first_name', '$last_name', '$_POST[email]', SHA1('$_POST[password]'), '$_POST[status]')";
					
					if($verify == true) {
						$r = mysqli_query($dbc, $q);
					}
				}
				
				if($r){
					
					$message = '<p class="alert alert-success">User was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">User could not be '.$action.' because: '.mysqli_error($dbc);
					if($verify == false) {
						$message .= '<p class="alert alert-danger">Password fields empty and/or do not match.</p>';
					}
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
			
			if(isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }
			
		break;
			
		case 'navigation':
		
			if(isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$url = mysqli_real_escape_string($dbc, $_POST['url']);
				
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$q = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$url', position = $_POST[position], status = $_POST[status] WHERE id = '$_POST[openedid]'";
					$r = mysqli_query($dbc, $q);
					
				} 
				
				
				if($r){
					
					$message = '<p class="alert alert-success">Navigation Item was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Navigation Item could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
	
		break;
		
		case 'settings':
		
			if(isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$value = mysqli_real_escape_string($dbc, $_POST['value']);
				
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$q = "UPDATE settings SET id = '$_POST[id]', label = '$label', value = '$value' WHERE id = '$_POST[openedid]'";
					$r = mysqli_query($dbc, $q);
					
				} 
				
				if($r){
					
					$message = '<p class="alert alert-success">Setting was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Setting could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
		
		break;		
		
		default:
			
		break;
	}



/*if(isset($_POST['submitted']) == 1) {
							
	$title = mysqli_real_escape_string($dbc, $_POST['title']);
	$label = mysqli_real_escape_string($dbc, $_POST['label']);
	$header = mysqli_real_escape_string($dbc, $_POST['header']);
	$body = mysqli_real_escape_string($dbc, $_POST['body']);
	
	if(isset($_POST['id']) != '') {
		$action = 'updated';								
		$query = "UPDATE posts SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
	} else {
		$action = 'added';
		$query = "INSERT INTO pages (user, slug, title, label, header, body) VALUES ($_POST[user], '$_POST[slug]', '$title', '$label', '$header', '$body')";	
	}
	
	$result = mysqli_query($dbc, $query);
	
	if($result) {
		
		$message = '<p>Page was '.$action.'!</p>';
		
	} else {
		
		$message = '<p>Page could not be '.$action.' because: '.mysqli_error($dbc);
		$message .= '<p>'.$query.'</p>';
		
	}
	
}*/

/*	switch ($page) {
		
		case 'dashboard':
			
		break;
		
		case 'pages':
		
			if(isset($_POST['submitted']) == 1) {
	
				$title = mysqli_real_escape_string($dbc, $_POST['title']);
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$header = mysqli_real_escape_string($dbc, $_POST['header']);
				$body = mysqli_real_escape_string($dbc, $_POST['body']);
			
				if(isset($_POST['id']) != '') {
					$action = 'updated';
					$q = "UPDATE pages SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
				} else {
					$action = 'added';							
					$q = "INSERT INTO pages (type, user, slug, title, label, header, body) VALUES (1, $_POST[user], '$_POST[slug]', '$title', '$label', '$header', '$body')";
				}
			
			
				$r = mysqli_query($dbc, $q);
			
				if($r){
					
					$message = '<p class="alert alert-success">Page was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Page could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
						
				}
							
			}

			if(isset($_GET['id'])) { $opened = data_page($dbc, $_GET['id']); }
			
		break;
		
		case 'users':
			
			if(isset($_POST['submitted']) == 1) {
	
				$first_name = mysqli_real_escape_string($dbc, $_POST['first_name']);
				$last_name = mysqli_real_escape_string($dbc, $_POST['last_name']);
				
				if($_POST['password'] != '') {
					
					if($_POST['password'] == $_POST['passwordv']) {
							
						$password = "password = SHA1('$_POST[password]')";
						$verify = true;
						
					} else {
						
						$verify = false;
						
					} 

				} else {
						
						$verify = false;
						
				}
				
				if(isset($_POST['id']) != '') {
						
					$action = 'updated';
					$q = "UPDATE users SET first_name = 'first_name', last_name = 'last_name', $password, status = $_POST[status] WHERE id = $_GET[id]";
					
				} else {
					
					$action = 'added';
					if($verify == true) {
						$q = "INSERT INTO users (first_name, last_name, password, status) VALUES ('$first_name', '$last_name', SHA1('$_POST[password]'), '$_POST[status]')";
					}

				}
			
				$r = mysqli_query($dbc, $q);
			
				if($r){
					
					$message = '<p class="alert alert-success">User was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">User could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
						
				}
							
			}
			
			if(isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }
			
		break;
		
		case 'settings':
			
		break;
		
		default:
			
		break;
	}*/

?>