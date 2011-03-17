<?php
/*
 * Filename: security.inc.php
 * @author: J. "Giga" Murphy <giga1699@gmail.com>
 * Purpose: Provide security support
 * @version: 0.0.1
 * File created: 17MAR11
 * File updated: 17MAR11
 * @package GCTools
 * @subpackage Security
 * 
 * Change log:
 * 
 */

//namespace GCTools/Security;

define("SE_AUTH_TYPE_BASIC", 0);

class Security {
	//Variables for Security class
	private $htpassfile; //Defines where the .htpasswd file is located
	
	/*
	 * createHTPassUser($user,$pass) function
	 * 
	 * This function creates the new line needed to add a user to an
	 * Apache .htpasswd file.
	 * 
	 * Returns the new string on success, and FALSE on failure.
	 */
	public function createHTPassUser($user, $pass) {
		//Precondition: A username, and password, are given
		//Postcondition: The Apache .htpasswd line is returned, or NULL on error.
		
		if (is_null($user) || is_null($pass))
			return FALSE;
		
		$fileString = $user . ":";
		$fileString .= crypt($pass, base64_encode($pass));
		
		return $fileString;
	}
}
?>
