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
if ( ! defined( 'ABSPATH' ) ) exit; 
if ( ! function_exists( 'play5_setup' ) ) :
    function play5_setup() {
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );     
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 64, 64, true ); 
        add_image_size('miniatura', 75, 75, true);
        add_image_size('medio', 100, 100, true);
        add_image_size( 'thumbs', 64, 64, true );
        add_image_size( 'homes', 100, 100, true );
        add_image_size( 'singlepost', 120, 120, true );
        add_image_size( 'news', 300, 250, true );
         	
}
endif;
add_action( 'after_setup_theme', 'play5_setup' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function wpse_setup_theme() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( '64', 64, 64, true );
    add_image_size( '100', 100, 100, true );
    add_image_size( '120', 120, 120, true );
    add_image_size( '300', 300, 250, true );
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 136, 136, true ); // default Post Thumbnail dimensions (cropped)
    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( '64', 64, 64, true );
    add_image_size( '100', 100, 100, true );
    add_image_size( '120', 120, 120, true );
    add_image_size( '300', 300, 250, true );
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
if (function_exists('add_image_size')){
    add_image_size( '64',64,64, true);
    add_image_size( '120',120,120, true);
    add_image_size( '136',136,136, true);
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
if (function_exists( 'add_image_size') ) {
	add_image_size('miniatura', 75, 75, true);
	add_image_size('medio', 100, 100, true);
	add_image_size( 'thumbs', 64, 64, true );
	add_image_size( 'homes', 100, 100, true );
	add_image_size( 'singlepost', 120, 120, true );
	add_image_size( 'news', 300, 250, true );
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 136, 136, true ); // default Post Thumbnail dimensions (cropped)
	add_image_size( 'thumbs', 64, 64, true );
	add_image_size( 'homes', 100, 100, true );
	add_image_size( 'singlepost', 120, 120, true );
	add_image_size( 'news', 300, 250, true );
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_filter('image_size_names_choose', 'hmuda_image_sizes');
function hmuda_image_sizes($sizes) {
    $addsizes = array(
		"thumbs" => "thumbs",
		"homes" => "homes",
		"singlepost" => "singlepost",
		"news" => "news",
		"minimo" => "Mínimo",
		"medio" =>"Medio"
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_noimage() {
	$noimage = get_template_directory_uri().'/assets/img/lazy.png';
	$color_theme = '';
	$color_theme_principal = '';
	if($color_theme == "oscuro") {
		$noimage = get_template_directory_uri().'/assets/img/lazy.png';
	} 
		return '<img src="'.$noimage.'" width="150" height="150" alt="No image">';
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_post_thumbnail( $size = 'thumbs', $post = NULL ) {
	if( !$post ) {
		global $post;
	}
	$image = px_noimage();
    if( has_post_thumbnail() ) {
        $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        if  ( ! empty( $featured_image_url ) ) {
			$gtpt = get_the_post_thumbnail($post->ID, $size, array('class'=>'image-single'));
       		if  ( ! empty( $gtpt ) ) {
				$image = $gtpt;
			}
        } 
    }
	return $image;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_post_thumbnail_homes( $size = 'homes', $post = NULL ) {
	if( !$post ) {
		global $post;
	}
	$image = px_noimage();
    if( has_post_thumbnail() ) {
        $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        if  ( ! empty( $featured_image_url ) ) {
			$gtpt = get_the_post_thumbnail($post->ID, $size, array('class'=>'image-single'));
       		if  ( ! empty( $gtpt ) ) {
				$image = $gtpt;
			}
        } 
    }
	return $image;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_post_thumbnail_singlepost( $size = 'singlepost', $post = NULL ) {
	if( !$post ) {
		global $post;
	}
	$image = px_noimage();
    if( has_post_thumbnail() ) {
        $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        if  ( ! empty( $featured_image_url ) ) {
			$gtpt = get_the_post_thumbnail($post->ID, $size, array('class'=>'image-single'));
       		if  ( ! empty( $gtpt ) ) {
				$image = $gtpt;
			}
        } 
    }
	return $image;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_post_thumbnail_news( $size = 'news', $post = NULL ) {
	if( !$post ) {
		global $post;
	}
	$image = px_noimage();
    if( has_post_thumbnail() ) {
        $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        if  ( ! empty( $featured_image_url ) ) {
			$gtpt = get_the_post_thumbnail($post->ID, $size, array('class'=>'image-single'));
       		if  ( ! empty( $gtpt ) ) {
				$image = $gtpt;
			}
        } 
    }
	return $image;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_post_thumbnail_fulls( $size = 'thumbs', $post = NULL ) {
	if( !$post ) {
		global $post;
	}
	$image = px_noimage();
    if( has_post_thumbnail() ) {
        $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        if  ( ! empty( $featured_image_url ) ) {
			$gtpt = get_the_post_thumbnail($post->ID, 'full', array('class'=>'image-single'));
       		if  ( ! empty( $gtpt ) ) {
				$image = $gtpt;
			}
        } 
    }
	return $image;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_post_thumbnail_homes_fulls( $size = 'homes', $post = NULL ) {
	if( !$post ) {
		global $post;
	}
	$image = px_noimage();
    if( has_post_thumbnail() ) {
        $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        if  ( ! empty( $featured_image_url ) ) {
			$gtpt = get_the_post_thumbnail($post->ID, 'full', array('class'=>'image-single'));
       		if  ( ! empty( $gtpt ) ) {
				$image = $gtpt;
			}
        } 
    }
	return $image;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_post_thumbnail_singlepost_fulls( $size = 'singlepost', $post = NULL ) {
	if( !$post ) {
		global $post;
	}
	$image = px_noimage();
    if( has_post_thumbnail() ) {
        $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        if  ( ! empty( $featured_image_url ) ) {
			$gtpt = get_the_post_thumbnail($post->ID, 'full', array('class'=>'image-single'));
       		if  ( ! empty( $gtpt ) ) {
				$image = $gtpt;
			}
        } 
    }
	return $image;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function px_post_thumbnail_news_fulls( $size = 'news', $post = NULL ) {
	if( !$post ) {
		global $post;
	}
	$image = px_noimage();
    if( has_post_thumbnail() ) {
        $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        if  ( ! empty( $featured_image_url ) ) {
			$gtpt = get_the_post_thumbnail($post->ID, 'full', array('class'=>'image-single'));
       		if  ( ! empty( $gtpt ) ) {
				$image = $gtpt;
			}
        } 
    }
	return $image;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes'); 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id' => 'recommend-homes',
        'name'=> ''.EX_THEMES_NAMES_.' Recommend Home',
        'description'   => __( 'Widgets in this area will be shown on Recommend Home', 'moddroid' ),
        'before_widget' => '<section class="wrp section section-recom">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="section-title"><i class="s-green c-icon"><svg width="24" height="24"><use xlink:href="#i__hot"></use></svg></i>',
        'after_title' => '</h3>',
));		$c4 = 'define'; 
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id' => 'home-popular',
        'name'=> ''.EX_THEMES_NAMES_.' Home Categories',
		'description'   => __( 'Widgets in this area will be shown only Home Categories', 'moddroid' ),
        'before_widget' => '<section class="wrp section">',
        'after_widget' => '</section>',
        'before_title' => '<div class="section-head"><h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>',
        'after_title' => '</h3></div>',
));		$c4('ex', 'sta');
/* if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id' => 'home-news',
        'name'=> ''.EX_THEMES_NAMES_.' Home News',
		'description'   => __( 'Widgets in this area will be shown only Home News', 'moddroid' ),
        'before_widget' => '<section class="wrp section section-news">',
        'after_widget' => '</section>',
        'before_title' => '<div class="section-head"><h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>',
        'after_title' => '</h3></div>',
));		 */$c4('theme', 'tus');
/* if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id' => 'home-comments',
        'name'=> ''.EX_THEMES_NAMES_.' Home Comments',
		'description'   => __( 'Widgets in this area will be shown only Home Comments', 'moddroid' ),
        'before_widget' => '<section class="wrp section section-comments">',
        'after_widget' => '</section>',
        'before_title' => '<div class="section-head"><h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>',
        'after_title' => '</h3></div>',
));  */
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'id' => 'home-footers',
        'name'=> ''.EX_THEMES_NAMES_.' Home Footers',
		'description'   => __( 'Widgets in this area will be shown only Home Footers', 'moddroid' ),
        'before_widget' => '<section class="wrp section section-news">',
        'after_widget' => '</section>',
        'before_title' => '<div class="section-head"><h3 class="section-title"><i class="s-yellow c-icon"><svg width="24" height="24"><use xlink:href="#i__gamepad"></use></svg></i>',
        'after_title' => '</h3></div>',
)); 
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function remove_footer_admin () { 
	$linkX = get_bloginfo('url'); $parse = parse_url($linkX); $sitex = $parse['host'];
    echo '<p><span id="footer-thankyou" style="font-style:normal;font-size:90%;letter-spacing:1px;"><b style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif);text-transform: uppercase !important;">'.$sitex.'</b> using <b style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif); ">'.EXTHEMES_NAME.' v.'.EXTHEMES_VERSION.' </b> @<script type="text/javascript">var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> - Developed by <a href="'.EXTHEMES_API_URL.'" title="Premium Wordpress Themes" target="_blank"  style="color:crimson;background: url('.EX_THEMES_URI.'/assets/img/sparks.gif);text-transform: uppercase !important;">'.EXTHEMES_AUTHOR.'</a></span></p>';
}
add_filter('admin_footer_text', 'remove_footer_admin');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if(empty($first_img)){ //Defines a default image
        $first_img = EX_THEMES_URI.'/assets/img/lazy.png';
    }
    return $first_img;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function timeago($ptime) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return ' just now';
    $interval = array (
        12 * 30 * 24 * 60 * 60 => ' years ago ('.date('F j, Y', $ptime).')',
        30 * 24 * 60 * 60 => ' months ago ('.date('F j, Y', $ptime).')',
        7 * 24 * 60 * 60 => ' weeks ago ('.date('F j, Y', $ptime).')',
        24 * 60 * 60 => ' days ago',
        60 * 60 => ' hours ago',
        60 => ' minutes ago',
        1 => ' seconds ago' );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    }; 
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_get_post_view_() {
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
    if($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K';
    } else {
        return $count.'';
    }
    //return "$count";
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_set_post_view_() {
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_posts_column_views_( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_posts_custom_column_views_( $column ) {
    if ( $column === 'post_views') {
        echo ex_themes_get_post_view_();
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_filter( 'manage_posts_columns', 'ex_themes_posts_column_views_' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_action( 'admin_enqueue_scripts', 'ex_themes_duplicate_scripts', 2000 ); 
add_action( 'manage_posts_custom_column', 'ex_themes_posts_custom_column_views_' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_getPostViews_($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K Views';
    } else {
        return $count.' Views';
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_wpb_set_post_views_($postID) {
    $count_key = 'ex_themes_wpb_post_views_count_';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K';
    } else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function ex_themes_wpb_track_post_views_ ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    ex_themes_wpb_set_post_views_($post_id);
}
add_action( 'wp_head', 'ex_themes_wpb_track_post_views_');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_wpb_get_post_views_($postID){
    $count_key = 'ex_themes_wpb_post_views_count_';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K Views';
    } else {
        return $count.' Views';
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_duplicate_scripts( $hook ) {
    if( !in_array( $hook, array( 'post.php', 'post-new.php' , 'edit.php'))) return;
    wp_enqueue_script('duptitles',
        wp_enqueue_script('duptitles',EX_THEMES_URI.'/assets/js/psy_duplicate.js',
            array( 'jquery' )), array( 'jquery' )  );
}
add_action( 'admin_enqueue_scripts', 'ex_themes_duplicate_scripts', 2000 );
add_action('wp_ajax_ex_themes_duplicate', 'ex_themes_duplicate_callback');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_duplicate_callback() {
    function ex_themes_results_checks() {
        global $wpdb;
        $title = $_POST['post_title'];
        $post_id = $_POST['post_id'];
        $titles = "SELECT post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_title = '{$title}' AND ID != {$post_id} ";
        $results = $wpdb->get_results($titles);
        if($results) {
            return '<div class="error"><p><span class="dashicons dashicons-warning"></span> '. __( 'This content already exists, we recommend not to publish.' , 'apkiblog' ) .' </p></div>';
        } else {
            return '<div class="notice rebskt updated"><p><span class="dashicons dashicons-thumbs-up"></span> '.__('Excellent! this content is unique.' , 'apkiblog').'</p></div>';
        }
    }
    echo ex_themes_results_checks();
    die();
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function doo_mobile() {
    $mobile = ( wp_is_mobile() == true ) ? '1' : 'false';
    return $mobile;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_rewrite_endpoint( 'download', EP_PERMALINK | EP_PAGES );
function ex_themes_download() {
    add_rewrite_endpoint( 'download', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_download' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_download_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['download'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/download.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_download_template' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_rewrite_endpoint( 'get', EP_PERMALINK | EP_PAGES );
function ex_themes_get() {
    add_rewrite_endpoint( 'get', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_get' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_get_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['get'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/get.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_get_template' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_rewrite_endpoint( 'file', EP_PERMALINK | EP_PAGES );
function ex_themes_files() {
    add_rewrite_endpoint( 'file', EP_PERMALINK | EP_PAGES );
}
add_action( 'init', 'ex_themes_files' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_files_template() {
    global $wp_query;
    // if this is not a request for play or a singular object then bail
    if ( ! isset( $wp_query->query_vars['file'] ) || ! is_singular() )
        return;
    // include custom template
    include get_template_directory().'/template/file.php';
    exit;
}
add_action( 'template_redirect', 'ex_themes_files_template' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_notices_inactivate() {
    if(empty($lis) && ($_GET['page'] != EX_THEMES_SLUGS_) ) {
        printf('<style>.notice-error, div.error {border-left-color:deepskyblue!important;}.landingpress-message {padding: 20px !important;font-size:16px!important;}.landingpress-message-inner {overflow:hidden;}.landingpress-message-icon {float:left;width:35px;height:35px;padding-right:20px;}.landingpress-message-button {float:right;padding:3px 0 0 20px;}</style><div class="error landingpress-message"><div class="landingpress-message-inner"><div class="landingpress-message-icon" style="font-size:16px!important;text-transform:capitalize"><img src="'.get_template_directory_uri().'/assets/img/xthemes.png" width="35" height="35" alt=""/></div><div class="landingpress-message-button"><a href="' . admin_url( 'admin.php?page='.EX_THEMES_SLUGS_.'') . '" class="button button-primary">Enter License Code </a></div><strong style="text-transform:capitalize;  ">Welcome to '.EX_THEMES_NAMES.' WordPress Themes.</strong> <strong style="text-transform:capitalize;font-weight:800;font-size:20px;color:orangered!important; text-shadow:.02em .05em 0 rgba(0,0,0,0.4);">Please Activate '.EX_THEMES_NAMES.' license</strong> <br><i style="text-transform:capitalize; ">to get automatic updates, technical support, and access to '.EX_THEMES_NAMES.' Options Panel</i> .</div></div>');
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_add_img_alt_tag_title($attr, $attachment = null) {
    $img_title = trim(strip_tags($attachment->post_title));
    if (empty($attr['alt'])) {
        $attr['alt'] = $img_title;
        $attr['title'] = $img_title;
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'ex_themes_add_img_alt_tag_title', 10, 2);
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\

function RTL_Nums($number) {
		global $opt_themes;
		$nums_0 = $opt_themes['number_0'];
		$nums_1 = $opt_themes['number_1'];
		$nums_2 = $opt_themes['number_2'];
		$nums_3 = $opt_themes['number_3'];
		$nums_4 = $opt_themes['number_4'];
		$nums_5 = $opt_themes['number_5'];
		$nums_6 = $opt_themes['number_6'];
		$nums_7 = $opt_themes['number_7'];
		$nums_8 = $opt_themes['number_8'];
		$nums_9 = $opt_themes['number_9'];	
        $number = str_replace("1",$nums_1,$number);
        $number = str_replace("2",$nums_2,$number);
        $number = str_replace("3",$nums_3,$number);
        $number = str_replace("4",$nums_4,$number);
        $number = str_replace("5",$nums_5,$number);
        $number = str_replace("6",$nums_6,$number);
        $number = str_replace("7",$nums_7,$number);
        $number = str_replace("8",$nums_8,$number);
        $number = str_replace("9",$nums_9,$number);
        $number = str_replace("0",$nums_0,$number);
        return $number;
}
	
function EnglishNum($number) {
    $number = str_replace("۱","1",$number);
    $number = str_replace("۲","2",$number);
    $number = str_replace("۳","3",$number);
    $number = str_replace("۴","4",$number);
    $number = str_replace("۵","5",$number);
    $number = str_replace("۶","6",$number);
    $number = str_replace("۷","7",$number);
    $number = str_replace("۸","8",$number);
    $number = str_replace("۹","9",$number);
    $number = str_replace("۰","0",$number);
    return $number;
}
function ex_themes_page_navy_($pages = '', $range = 1) {    
global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']){
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages)
    {
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<a  href='".get_pagenum_link($paged - 1)."'>&lsaquo; </a>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+4 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span>".RTL_Nums($i)."</a></span>":"<a href='".get_pagenum_link($i)."'>".RTL_Nums($i)."</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\" > &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'  >&raquo;</a>";
    }
} else {
	
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages)
    {
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<a  href='".get_pagenum_link($paged - 1)."'>&lsaquo; </a>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+4 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span>".$i."</a></span>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\" > &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'  >&raquo;</a>";
    }
}
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
//add_filter('the_generator', '__return_empty_string');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function numToKs($number) {
    if ($number >= 1000) {
        return number_format(($number / 1000), 1) . '&nbsp;k';
    } else {
        return $number;
    }
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
//remove_filter( 'sanitize_title', 'sanitize_title_with_dashes', 10 );
//add_filter( 'sanitize_title', 'wpse231448_sanitize_title_with_dashes', 10, 3 );
function wpse231448_sanitize_title_with_dashes( $title, $raw_title = '', $context = 'display' ) {
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);
    if (seems_utf8($title)) {
        if (function_exists('mb_strtolower')) {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title, 200);
    }
    $title = strtolower($title);
    if ( 'save' == $context ) {
        // Convert nbsp, ndash and mdash to hyphens
        $title = str_replace( array( '%c2%a0', '%e2%80%93', '%e2%80%94' ), '-', $title );
        // Convert nbsp, ndash and mdash HTML entities to hyphens
        $title = str_replace( array( '&nbsp;', '&#160;', '&ndash;', '&#8211;', '&mdash;', '&#8212;' ), '-', $title );
        // Strip these characters entirely
        $title = str_replace( array(
            // iexcl and iquest
            '%c2%a1', '%c2%bf',
            // angle quotes
            '%c2%ab', '%c2%bb', '%e2%80%b9', '%e2%80%ba',
            // curly quotes
            '%e2%80%98', '%e2%80%99', '%e2%80%9c', '%e2%80%9d',
            '%e2%80%9a', '%e2%80%9b', '%e2%80%9e', '%e2%80%9f',
            // copy, reg, deg, hellip and trade
            '%c2%a9', '%c2%ae', '%c2%b0', '%e2%80%a6', '%e2%84%a2',
            // acute accents
            '%c2%b4', '%cb%8a', '%cc%81', '%cd%81',
            // grave accent, macron, caron
            '%cc%80', '%cc%84', '%cc%8c',
        ), '', $title );
        // Convert times to x
        $title = str_replace( '%c3%97', 'x', $title );
    }
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    // WPSE-231448: Commented out this line below to stop dots being replaced by dashes.
    //$title = str_replace('.', '-', $title);
    // WPSE-231448: Add the dot to the list of characters NOT to be stripped.
    $title = preg_replace('/[^%a-z0-9 _\-\.]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');
    return $title;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_clean($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_post_gallery_contents_($content2) {
    global $wpdb, $post, $opt_themes;
    if(is_singular() || is_home()){
		if(get_post_meta( $post->ID, 'wp_GP_ID', true )) {
        $ex_themes_page_titles_ = esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) );
        $ex_themes_datos_imagenes = get_post_meta(get_the_ID(), 'wp_images_GP', true);
        $ex_themes_if_ = get_post_meta( $post->ID, 'wp_images_GP', true );
        $content2 .= "<div id=\"gallery-3\" class=\"gallery galleryid-28459 gallery-columns-3 gallery-size-medium\">";
        if (get_post_meta( $post->ID, 'wp_images_GP', true )) {
            $datos_imagenes = $ex_themes_datos_imagenes;
            $i = 0;
            if(count($datos_imagenes)>3){
                foreach($datos_imagenes as $elemento) {
                    $content2 .= "<dl class=\"gallery-item\">";
                    $content2 .= "<dt class=\"gallery-icon portrait\">";
                    $content2 .= "<img src=\"";
                    $content2 .= $datos_imagenes[$i];
                    $content2 .= "\" data-spai=\"1\" class=\"attachment-medium size-medium\" title=\"";
                    $content2 .= $ex_themes_page_titles_;
                    $content2 .= "screen ";
                    $content2 .= $i;
                    $content2 .= "\" data-spai-upd=\"212\" width=\"226\" height=\"402\">";
                    $content2 .= "</dt>";
                    $content2 .= "</dl>";
                    if (++$i == 3) break; } } }
        $content2 .= "<br style=\"clear: both\">";
        $content2 .= "</div>";
        return $content2;
		} else {
        #### if not a post/page then don't include sharing button
        return $content2;
		}
	}
};
add_filter( 'the_content2', 'ex_themes_post_gallery_contents_');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_post_youtube_contents_($content2) {
    global $wpdb, $post, $opt_themes;
    if(is_singular() || is_home()){
		if(get_post_meta( $post->ID, 'wp_GP_ID', true )) {
        $ex_themes_page_titles_ = esc_html( get_post_meta( $post->ID, 'wp_title_GP', true ) );
        $ex_themes_datos_youtube = get_post_meta(get_the_ID(), 'wp_youtube_GP', true);
        $ex_themes_if_ = get_post_meta( $post->ID, 'wp_youtube_GP', true );
        if (get_post_meta( $post->ID, 'wp_youtube_GP', true )) {
            $content2 .= "<center>";
            $datos_youtube = $ex_themes_datos_youtube;
            $content2 .= "<iframe src=\"https://www.youtube.com/embed/";
            $content2 .= $datos_youtube;
            $content2 .= "\" data-spai=\"1\" class=\"attachment-medium size-medium\" title=\"";
            $content2 .= $ex_themes_page_titles_;
            $content2 .= "screen ";
            $content2 .= $i;
            $content2 .= "\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\" width=\"100%\" height=\"400px\"></iframe>";
            $content2 .= "<br style=\"clear: both\">";
            $content2 .= "</center>";
        }
         return $content2;
		} else {
        #### if not a post/page then don't include sharing button
        return $content2;
		}
	}    
};
add_filter( 'the_content2', 'ex_themes_post_youtube_contents_');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_filter( 'the_content', 'ex_themes_post_youtube_contents_insert_' );
function ex_themes_post_youtube_contents_insert_( $content ) {
    global $opt_themes;
    $activate = $opt_themes['ex_themes_youtube_content_activate_'];
    $numbers = $opt_themes['ex_themes_youtube_content_paragraph_on_'];
    $random = mt_rand(1,8);
    if (($activate == '1'))
        $ex_themes_post_youtube_contents_code_ = ex_themes_post_youtube_contents_($content2);
    if($numbers=='0') {
        return ex_themes_post_youtube_contents_after_paragraph_( $ex_themes_post_youtube_contents_code_, $random, $content );
    } else {
        return ex_themes_post_youtube_contents_after_paragraph_( $ex_themes_post_youtube_contents_code_, $numbers, $content );
    }
    if ( is_single() && ! is_admin() ) {
        return ex_themes_post_youtube_contents_after_paragraph_( $ex_themes_post_youtube_contents_code_, $numbers, $content );
    }
    return $content;
}
function ex_themes_post_youtube_contents_after_paragraph_( $insertion, $paragraph_id, $content ) {
    $closing_p = '</p>';
    $paragraphs = explode( $closing_p, $content );
    foreach ($paragraphs as $index => $paragraph) {
        if ( trim( $paragraph ) ) {
            $paragraphs[$index] .= $closing_p;
        }
        if ( $paragraph_id == $index + 1 ) {
            $paragraphs[$index] .= $insertion;
        }
    }
    return implode( '', $paragraphs );
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_action( 'before_delete_post', 'wps_remove_attachment_with_post', 10 );
function wps_remove_attachment_with_post($post_id)
{
    if(has_post_thumbnail( $post_id ))
    {
        $attachment_id = get_post_thumbnail_id( $post_id );
        wp_delete_attachment($attachment_id, true);
    }
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_post_likes($likepost) {
    // Check if single post
    if(is_singular('post')) {
        ob_start();
        ?>
<div class="likes">
	<a href="<?php echo add_query_arg('post_action', 'like'); ?>">
		<span class="like-plus">
			<svg width="24" height="24">
				<use xlink:href="#i__thumbup"/>
			</svg>+
			<span  class="ignore-select" <?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?> <?php } ?>>
				<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php echo RTL_Nums(exthemes_post_likes_count('likes')); ?><?php } else { ?><?php echo exthemes_post_likes_count('likes'); ?><?php } ?>
			</span>
		</span>
		<span class="sr-only">
			<?php global $opt_themes; if($opt_themes['exthemes_Like']) { ?>
			<?php echo $opt_themes['exthemes_Like']; ?>
			<?php } ?>
		</span>
	</a>
	<a href="<?php echo add_query_arg('post_action', 'dislike'); ?>">
		<span class="like-minus">
			<svg width="24" height="24">
				<use xlink:href="#i__thumbdown"/>
			</svg>-
			<span  class="ignore-select" <?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?> <?php } ?>>
				<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php echo RTL_Nums(exthemes_post_likes_count('dislikes')); ?><?php } else { ?><?php echo exthemes_post_likes_count('dislikes'); ?><?php } ?>
			</span>
			<span class="sr-only">
				<?php global $opt_themes; if($opt_themes['exthemes_Dislike']) { ?>
				<?php echo $opt_themes['exthemes_Dislike']; ?>
				<?php } ?>
			</span>
		</span>
	</a>
</div>
	<?php
        $output = ob_get_clean();
        return $output . $likepost;
    } else {
        return $likepost;
    }
}
add_filter('the_content1', 'exthemes_post_likes');
//---- Get like or dislike count
function exthemes_post_likes_count($type = 'likes') {
    $current_count = get_post_meta(get_the_id(), $type, true);
    return ($current_count ? $current_count : 0);
}
//---- Process like or dislike
function ip_process_like() {
    $processed_like = false;
    $redirect       = false;
    // Check if like or dislike
    if(is_singular('post')) {
        if(isset($_GET['post_action'])) {
            if($_GET['post_action'] == 'like') {
                // Like
                $like_count = get_post_meta(get_the_id(), 'likes', true);
                if($like_count) {
                    $like_count = $like_count + 1;
                }else {
                    $like_count = 1;
                }
                $processed_like = update_post_meta(get_the_id(), 'likes', $like_count);
            }elseif($_GET['post_action'] == 'dislike') {
                // Dislike
                $dislike_count = get_post_meta(get_the_id(), 'dislikes', true);
                if($dislike_count) {
                    $dislike_count = $dislike_count + 1;
                }else {
                    $dislike_count = 1;
                }
                $processed_like = update_post_meta(get_the_id(), 'dislikes', $dislike_count);
            }
            if($processed_like) {
                $redirect = get_the_permalink();
            }
        }
    }
    // Redirect
    if($redirect) {
        wp_redirect($redirect);
        die;
    }
}
add_action('template_redirect', 'ip_process_like');
function exthemes_posts_column_like( $columns ) {
    $columns['likes'] = 'Info';
    return $columns;
}

function exthemes_posts_custom_column_like( $column ) {
    if ( $column === 'likes') {
			 
			$total_likes		= exthemes_post_likes_count('likes');
			$total_dislikes		= exthemes_post_likes_count('dislikes');
			$total_view_post	= ex_themes_get_post_view_();
			 
			echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="Total Likes : '.$total_likes.'"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp;'.$total_likes.'</b>'; 
			echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="Total Dislikes : '.$total_dislikes.'"><i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp;'.$total_dislikes.'</b>';	
			 		
			/* echo '<b style="display: block;height: 2em;background-color: #2271b1;border-radius: 5px;margin-bottom: 10px;" title="Total View Post : '.$total_view_post.'"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;'.$total_view_post.'</b>'; */
    } 
}
add_filter( 'manage_posts_columns', 'exthemes_posts_column_like' );
add_action( 'manage_posts_custom_column', 'exthemes_posts_custom_column_like' );
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_news_likes($content2) {
    // Check if single post
    if(is_singular('news')) {
        ob_start();
        ?>
        <div class="likes">
            <a href="<?php echo add_query_arg('post_action', 'like'); ?>">
			<span class="like-plus"><svg width="24" height="24"><use xlink:href="#i__thumbup"></use></svg>+<span  class="ignore-select"><?php echo exthemes_post_likes_count('likes') ?></span></span>
			<span class="sr-only"><?php global $opt_themes; if($opt_themes['exthemes_Like']) { ?><?php echo $opt_themes['exthemes_Like']; ?><?php } ?></span>
            </a>
            <a href="<?php echo add_query_arg('post_action', 'dislike'); ?>">
			<span class="like-minus"><svg width="24" height="24"><use xlink:href="#i__thumbdown"></use></svg>-<span  class="ignore-select"><?php echo exthemes_post_likes_count('dislikes') ?></span><span class="sr-only"><?php global $opt_themes; if($opt_themes['exthemes_Dislike']) { ?><?php echo $opt_themes['exthemes_Dislike']; ?><?php } ?></span></span>
            </a>
        </div>
        <?php
        $output = ob_get_clean();
        return $output . $content2;
		} else {
        return $content2;
		}
}
add_filter('the_content2', 'exthemes_news_likes');
//---- Get like or dislike count
function exthemes_news_likes_count($type = 'likes') {
    $current_count = get_post_meta(get_the_id(), $type, true);
    return ($current_count ? $current_count : 0);
}
//---- Process like or dislike
function news_process_like() {
    $processed_like = false;
    $redirect       = false;
    // Check if like or dislike
    if(is_singular('news')) {
        if(isset($_GET['post_action'])) {
            if($_GET['post_action'] == 'like') {
                // Like
                $like_count = get_post_meta(get_the_id(), 'likes', true);
                if($like_count) {
                    $like_count = $like_count + 1;
                }else {
                    $like_count = 1;
                }
                $processed_like = update_post_meta(get_the_id(), 'likes', $like_count);
            }elseif($_GET['post_action'] == 'dislike') {
                // Dislike
                $dislike_count = get_post_meta(get_the_id(), 'dislikes', true);
                if($dislike_count) {
                    $dislike_count = $dislike_count + 1;
                }else {
                    $dislike_count = 1;
                }
                $processed_like = update_post_meta(get_the_id(), 'dislikes', $dislike_count);
            }
            if($processed_like) {
                $redirect = get_the_permalink();
            }
        }
    }
    // Redirect
    if($redirect) {
        wp_redirect($redirect);
        die;
    }
}
add_action('template_redirect', 'news_process_like');
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_filter( 'get_comment_author', 'custom_comment_author', 10, 2 );
function custom_comment_author( $author, $commentID ) {
    $comment = get_comment( $commentID );
    $user = get_user_by( 'email', $comment->comment_author_email );
    if( !$user ):
        return $author;
    else:
        $firstname = get_user_meta( $user->ID, 'first_name', true );
        $lastname = get_user_meta( $user->ID, 'last_name', true );
        if( empty( $firstname ) OR empty( $lastname ) ):
            return $author;
        else:
            return $firstname . ' ' . $lastname;
        endif;
    endif;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function _5play_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="comments-tree-item-<?php comment_ID() ?>">
    <div id='comment-id-<?php comment_ID(); ?>'>
        <div class="comment ">
            <div class="comment-head">
                <div class="avatar-status">
                    <i class="avatar fit-cover"><?php echo get_avatar( $comment, 32 ); ?></i>
                </div>
                <span class="name truncate"><a><?php $cID = $comment->comment_ID; printf( __( '%2$s', '5play' ), get_comment_author_url($cID), get_comment_author($cID), get_comment_link($cID), get_comment_date('',$cID) ); ?></a></span>
                <div class="comment-meta">
                    <time class="date c-muted" datetime="<?php printf(  __( '%1$sT%2$s', '5play' ), get_comment_date(), get_comment_time() ); ?>"><?php printf(  __( '%1$s', '5play' ), get_comment_date(), get_comment_time() ); ?> <?php edit_comment_link(__('(Edit)'),'  ','') ?></time>
                </div>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.') ?></em>
                <br />
            <?php endif; ?>
            <div class="comment-text"><div id="comm-id-<?php comment_ID() ?>"><?php comment_text(); ?></div></div>
            <?php if($args['max_depth']!=$depth) { ?>
                <div class="comment-foot">
                    <ul class="comment-tools">
                        <li class="com__reply"> <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>  </li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function get_excerpt($limit, $source = null){
    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'&nbsp;&#8230;';
    return $excerpt;
}
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function bg_recent_comments($no_comments = 3, $comment_len = 100, $avatar_size = 60) {
    global $comment;
    $comments_query = new WP_Comment_Query(); 
    $comments = $comments_query->query( array( 'number' => $no_comments, 'status'=>'approve' ) );
    $comm = '';
    if ( $comments ) : foreach ( $comments as $comment ) :
        $comm .= '<div class="entry entry-coms"><div class="item"><a class="user" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '"><i class="avatar fit-cover">';
        $comm .= get_avatar( $comment->comment_author_email, $avatar_size );
        $comm .= '</i><span class="fw-b truncate">';
        $comm .= get_comment_author( $comment->comment_ID ) . '</span></a>';
        $comm .= '<h2 class="title"><a class="item-link" href="' . esc_url(get_comment_link($comment->comment_ID)) . '"><span class="truncate">' . get_the_title($comment->comment_post_ID) . '</span></a></h2>';
        $comm .= '<div class="description">' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . ' </div> ';
        $comm .=  sprintf(  __( '<time class="date muted" datetime="%1$sT%2$s">%1$sT%2$s</time>', '5play' ), get_comment_date(), get_comment_time() ); ;
        $comm .= '<i class="entry-coms-reply"><svg width="24" height="24"><use xlink:href="#i__reply"></use></svg></i>';
        $comm .= '</div></div>';
    endforeach; else :
        $comm .= 'No comments.';
    endif;
    echo $comm;
}


// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
/*
function exthemes_logout() {
	$linkXhomes = get_bloginfo('url');
    wp_redirect($linkXhomes);
    die;
}
add_action('wp_logout', 'exthemes_logout', PHP_INT_MAX);
function exthemes_login() {
	$linkXhomes = get_bloginfo('url');
    wp_redirect($linkXhomes);
    die;
}
add_action('wp_login', 'exthemes_login', PHP_INT_MAX);
*/
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_download_page__noindex_nofollow() {
	global $wp_query;
	$noindex = "<meta name='robots' content='noindex,follow' />\n";
	$index = "<meta name='robots' content='index,follow' />\n";
	if ( ! isset( $wp_query->query_vars['download'] ) || ! is_singular() ) {
	echo $index;
	} else {
	echo $noindex;
	}
}
add_action( 'wp_head', 'exthemes_download_page__noindex_nofollow',1); 
function exthemes_get_page__noindex_nofollow() {
	global $wp_query;	
	$noindex = "<meta name='robots' content='noindex,follow' />\n";
	$index = "<meta name='robots' content='index,follow' />\n";
	if ( ! isset( $wp_query->query_vars['get'] ) || ! is_singular() ) {
	echo $index;
	} else {
	echo $noindex;
	}
}
//add_action( 'wp_head', 'exthemes_get_page__noindex_nofollow',1); 
function exthemes_get_files__noindex_nofollow() {
	global $wp_query;	
	$noindex = "<meta name='robots' content='noindex,follow' />\n";
	$index = "<meta name='robots' content='index,follow' />\n";
	if ( ! isset( $wp_query->query_vars['file'] ) || ! is_singular() ) {
	echo $index;
	} else {
	echo $noindex;
	}
}
//add_action( 'wp_head', 'exthemes_get_files__noindex_nofollow',1); 
function capitalize($str,$a_char = array("'","-"," ")){   
    //$str contains the complete raw name string
    //$a_char is an array containing the characters we use as separators for capitalization. If you don't pass anything, there are three in there as default.
    $string = strtolower($str);
    foreach ($a_char as $temp){
        $pos = strpos($string,$temp);
        if ($pos){
            //we are in the loop because we found one of the special characters in the array, so lets split it up into chunks and capitalize each one.
            $mend = '';
            $a_split = explode($temp,$string);
            foreach ($a_split as $temp2){
                //capitalize each portion of the string which was separated at a special character
                $mend .= ucfirst($temp2).$temp;
                }
            $string = substr($mend,0,-1);
            }   
        }
    return ucfirst($string);
}