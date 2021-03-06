<?php
// Setup File:
error_reporting(0);

# Database Connetion:
include('config/connection.php');

# Constants:
DEFINE('D_TEMPLATE', 'template');


# Functions:
include('functions/data.php');
include('functions/template.php');
include('functions/sandbox.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$path = get_path();

$site_title = 'AtomCMS 2.0';

if(!isset($path['call_parts'][0]) || $path['call_parts'][0] == '') {
	
	//$path['call_parts'][0] = 'home'; // Set $pageid to equal the value given in the url
	header('Location: home');
	
}

#Page Setup
$page = data_page($dbc, $path['call_parts'][0]);

?>