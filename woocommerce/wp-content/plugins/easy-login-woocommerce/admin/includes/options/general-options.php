<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$option_name = 'xoo-el-general-options';

$settings = array(
	
	array(
		'type' 			=> 'section',
		'callback' 		=> 'section',
		'id' 			=> 'main-section',
		'title' 		=> 'Main',
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'checkbox',
		'section' 		=> 'main-section',
		'option_name' 	=> $option_name,
		'id' 			=> 'm-en-reg',
		'title' 		=> 'Enable Registration',
		'default' 		=> 'yes'
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'text',
		'section' 		=> 'main-section',
		'option_name' 	=> $option_name,
		'id' 			=> 'm-login-url',
		'title' 		=> 'Login Redirect',
		'desc' 			=> 'Leave empty to redirect on the same page'
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'text',
		'section' 		=> 'main-section',
		'option_name' 	=> $option_name,
		'id' 			=> 'm-register-url',
		'title' 		=> 'Register Redirect',
		'desc' 			=> 'Leave empty to redirect on the same page'
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'text',
		'section' 		=> 'main-section',
		'option_name' 	=> $option_name,
		'id' 			=> 'm-logout-url',
		'title' 		=> 'Logout Redirect',
		'desc' 			=> 'Leave empty to redirect on the same page'
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'text',
		'section' 		=> 'main-section',
		'option_name' 	=> $option_name,
		'id' 			=> 'm-terms-url',
		'title' 		=> 'Terms and Conditions URL',
	),


	array(
		'type' 			=> 'section',
		'callback' 		=> 'section',
		'id' 			=> 'style-section',
		'title' 		=> 'Style',
	),


	array(
		'type' 			=> 'setting',	
		'callback' 		=> 'color',
		'section' 		=> 'style-section',
		'option_name' 	=> $option_name,
		'id'			=> 'm-btn-bgcolor',
		'title' 		=> 'Button Background Color',
		'default' 		=> '#333'
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'color',
		'section' 		=> 'style-section',
		'option_name' 	=> $option_name,
		'id'			=> 'm-btn-txtcolor',
		'title' 		=> 'Button Text Color',
		'default' 		=> '#fff'
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'number',
		'section' 		=> 'style-section',
		'option_name' 	=> $option_name,
		'id'			=> 'm-popup-width',
		'title' 		=> 'Pop Up Width',
		'default' 		=> '800',
		'desc'			=> 'Size in px'
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'number',
		'section' 		=> 'style-section',
		'option_name' 	=> $option_name,
		'id'			=> 'm-popup-height',
		'title' 		=> 'Pop Up Height',
		'default' 		=> '600',
		'desc'			=> 'Size in px'
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'upload',
		'section' 		=> 'style-section',
		'option_name' 	=> $option_name,
		'id'			=> 's-sidebar-img',
		'title' 		=> 'Sidebar Image',
		'default' 		=> XOO_EL_URL.'/assets/images/popup-sidebar.png',
		'desc'			=> 'Supported format: JPEG,PNG',
		'extra'			=> array(
			'upload_type' => 'image'
		)
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'select',
		'section' 		=> 'style-section',
		'option_name' 	=> $option_name,
		'id'			=> 's-sidebar-pos',
		'title' 		=> 'Sidebar Position',
		'default' 		=> 'left',
		'extra'			=> array(
			'options' => array('left','right')	
		)
	),

	array(
		'type' 			=> 'setting',
		'callback' 		=> 'number',
		'section' 		=> 'style-section',
		'option_name' 	=> $option_name,
		'id'			=> 's-sidebar-width',
		'title' 		=> 'Sidebar Width',
		'default' 		=> '48',
		'desc'			=> 'Width in percentage'
	),

);

return $settings;

?>