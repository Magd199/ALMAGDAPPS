<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES																	 
/*  PREMIUM WORDRESS THEMES
/*   
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS	
/*                             
/*  As Errors In Your Themes  
/*  Are Not The Responsibility 
/*  Of The DEVELOPERS      
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/
//add jquery_cloudflare on the frontend
function fancybox_js() {
wp_enqueue_script( THEMES_NAMES.'-fancybox-js', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js', true ); 
}
add_action( 'wp_enqueue_scripts', 'fancybox_js', 99999 );

//add css on the frontend
function fancybox_css() {
	wp_enqueue_style( THEMES_NAMES.'-fancybox-css', '//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css', true ); 
}
add_action( 'wp_enqueue_scripts', 'fancybox_css', 0 ); 

function hide_link_download() {  
	$js_dir = get_stylesheet_directory_uri() . '/assets/js';	 
	wp_enqueue_script( THEMES_NAMES.'-hide-link-download', $js_dir . '/nolink.js', [], '', true ); 
}
//add_action( 'wp_enqueue_scripts', 'hide_link_download', 99999 );
