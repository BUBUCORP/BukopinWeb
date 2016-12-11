<?php
/**
 * Justboil.me - a TinyMCE image upload plugin
 * jbimages/config.php
 *
 * Released under Creative Commons Attribution 3.0 Unported License
 *
 * License: http://creativecommons.org/licenses/by/3.0/
 * Plugin info: http://justboil.me/
 * Author: Viktor Kuzhelnyi
 *
 * Version: 2.3 released 23/06/2013
 */
 
 
/*-------------------------------------------------------------------
|
| IMPORTANT NOTE! In case, when TinyMCE’s folder is not protected with HTTP Authorisation,
| you should require is_allowed() function to return 
| `TRUE` if user is authorised,
| `FALSE` - otherwise
| 
|  This is intended to protect upload script, if someone guesses it's url.
| 
-------------------------------------------------------------------*/

function is_allowed()
{
	// global $_COOKIE, $_SERVER;
 
	// $allow_login = "admin";
	// $allow_pass = "admin123";
 
	// $ip = $_SERVER["REMOTE_ADDR"];
 
	// if 
	// (
	// 	isset($_COOKIE["login"], $_COOKIE["passhash"]) and
	// 	$_COOKIE["login"] == $allow_login and
	// 	$_COOKIE["passhash"] == md5(md5($ip).md5($allow_pass))
	// )
	// {
	 	return TRUE;
	// }
 
	// return FALSE;
}

?>