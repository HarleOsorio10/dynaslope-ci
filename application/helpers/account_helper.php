<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Revised session checker and redirection
 *
 * @author John Louie Nepomuceno
 **/
function is_logged_in($is_logged_in) {
	if(!isset($is_logged_in) || ($is_logged_in !== TRUE)) {
		$lastURL = current_url();
		redirect('session_expired');
	}
}
?>