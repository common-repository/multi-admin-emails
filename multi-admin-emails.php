<?php
/*
Author: Feroz Jaffer
Author URI: http://www.bilogic.com
Plugin Name: Multiple Admin Emails 
Plugin URI: http://www.bilogic.com/multi-admin-emails
Description: Add multiple admin emails for notification.
Version: 1.0.1
*/
add_action('admin_menu', 'multi_email_menu',99);
add_action('admin_init', 'multi_email_settings');
add_option('multi_email_ids', 'your email ids', '', 'yes');

function multi_email_menu() {
	add_submenu_page( 'options-general.php', 'Multi Admin Emails', 'Multi Admin Emails', 'manage_options', 'admin-multi-emails', 'multi_form' ); 
}

function multi_email_settings() {
	register_setting( 'multi_email_fields', 'multi_email_ids' );	
}

function multi_form() { 
	include('email-form.php');
}

// code starts here
if ( !function_exists('wp_new_user_notification') ) :

function wp_new_user_notification($user_id, $plaintext_pass = '') {
	$user = get_userdata( $user_id );
	$mycc = get_option('multi_email_ids');
	
	$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

	$message  = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
	$message .= sprintf(__('Username: %s'), $user->user_login) . "\r\n\r\n";
	$message .= sprintf(__('E-mail: %s'), $user->user_email) . "\r\n";

	@wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);
	if (! empty($mycc))
	{
	@wp_mail($mycc, sprintf(__('[%s] New User Registration'), $blogname), $message);
	}

	if ( empty($plaintext_pass) )
		return;

	$message  = sprintf(__('Username: %s'), $user->user_login) . "\r\n";
	$message .= sprintf(__('Password: %s'), $plaintext_pass) . "\r\n";
	$message .= wp_login_url() . "\r\n";

	wp_mail($user->user_email, sprintf(__('[%s] Your username and password'), $blogname), $message);

}
endif;
 ?>