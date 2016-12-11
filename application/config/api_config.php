<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Bukopin Setting
| -------------------------------------------------------------------------
| This file lets you define "config" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/config.html
|
*/

//$api_url  = 'http://dev3.bubuwork.com/danuri/bkp/';
$api_url  = 'http://localhost/bukopin/api/';
$config['api_url'] 			= $api_url;
$config['api_home']			= $api_url.'gethome/';
$config['api_setting'] 		= $api_url.'getsetting/';
$config['api_page'] 		= $api_url.'getpage/';
$config['api_menu'] 		= $api_url.'getmenu/';
$config['api_menu_mobile']	= $api_url.'api/display_menu_mobile/?menu_id=';
$config['api_sidemenu']		= $api_url.'api/get_side_menu/?menu_id=';
$config['api_menu_item']	= $api_url.'api/get_side_menu/?menu_id=';
$config['api_sidebar'] 		= $api_url.'api/widgets/get_sidebar/?sidebar_id=';
$config['api_category']		= $api_url.'api/get_category_posts/?cat=';
$config['api_network'] 		= $api_url.'api/network/';
$config['api_album'] 		= $api_url.'api/album/get_albums/?id=';

$config['mailfrom']			= "bukopin@dgwhost.com";
$config['mailbcc']			= "noverda@gmail.com";

$config['configmail']['useragent'] 		= "CodeIgniter";
$config['configmail']['protocol'] 		= "smtp"; //mail, sendmail, or smtp
$config['configmail']['mailpath'] 		= "usr/sbin/sendmail";
$config['configmail']['smtp_host'] 		= "mail.exclusivehosting.net";
$config['configmail']['smtp_user'] 		= "bukopin@dgwhost.com";
$config['configmail']['smtp_pass'] 		= "Bukopin!@#";
$config['configmail']['smtp_port'] 		= "25";
$config['configmail']['smtp_timeout'] 	= "5";
$config['configmail']['smtp_keepalive']	= "FALSE"; //TRUE or FALSE 
//$config['configmail']['smtp_crypto']	= ""; //tls or ssl
//$config['configmail']['wordwrap'] 		= "TRUE"; //TRUE or FALSE 
//$config['configmail']['wrapchars'] 		= "76";
$config['configmail']['mailtype'] 		= "html";
