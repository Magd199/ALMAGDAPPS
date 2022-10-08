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
add_action('admin_head', '_5play_custom_styles');
function _5play_custom_styles() { ?>
<style>    
.redux-container .form-table th, .redux-container .form-table td {
  padding: 40px !important;
}
td.likes.column-likes { 
  display: block;
  min-width: 25px;
  height: 2em; 
  color: #fff;
  font-size: 11px;
  line-height: 1.90909090;
  text-align: center;
  margin-top: 5px;
}
td.dislikes.column-dislikes {
 
	
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php }
add_filter('admin_menu', 'admin_menu_filter',500);
function admin_menu_filter()
{
	if (current_user_can('editor')) {
		//administrator
		remove_submenu_page( 'themes.php', 'themes.php?page=exthemes' );
		remove_submenu_page( 'themes.php', 'exthemes' );
		remove_submenu_page( 'themes.php', 'widgets.php' );//widget
		remove_submenu_page( 'themes.php', 'theme-editor.php'); //editor
		remove_submenu_page( 'themes.php', 'theme_options' ); //theme-option
		remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwordpress%2Fwp-admin%2Fnav-menus.php' ); // hide the customize submenu
		$customizer_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
		remove_submenu_page( 'themes.php', $customizer_url );
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'themes.php' );                 //Appearance
		remove_menu_page( 'plugins.php' );                //Plugins
		remove_menu_page( 'users.php' );                  //Users
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'options-general.php' );        //Settings
		remove_menu_page( 'index.php' );                  //Dashboard
		remove_menu_page( 'upload.php' );
		remove_submenu_page( 'admin.php', 'admin.php?page=_options&tab=10' ); //admin.php?page=_options&tab=10
		remove_submenu_page( 'admin.php', '?page=_options&tab=10' ); //admin.php?page=_options&tab=10
		remove_submenu_page( 'admin.php', '_options&tab=10' ); //admin.php?page=_options&tab=10
		remove_submenu_page( 'admin.php', 'page=_options&tab=10' ); //admin.php?page=_options&tab=10
?>
<style>
	.redux-container .redux-action_bar {
		display: none;
	}
.redux-container .redux_field_th {
    padding-top:  5px !important;
    padding-bottom: 5px !important;
}
</style>
<?php }
}
/*-----------------------------------------------------------------------------------*/ 

// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets()
{
	global $wp_meta_boxes;
	unset(
	$wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
	$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
	$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
	);
	wp_add_dashboard_widget( 'dashboard_custom_feed', 'Latest Blog' , 'dashboard_custom_feed_output' );
}
function dashboard_custom_feed_output()
{
	echo '<div class="rss-widget">';
	wp_widget_rss_output(array(
	'url' => 'https://exthem.es/blog/feed/',
	'title' => 'Latest Blog',
	'items' => 5,
	'show_summary' => 1,
	'show_author' => 1,
	'show_date' => 1
	));
	echo '</div>';
}

// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_wp_dashboard_setup()
{
	// Add custom dashbboard widget.
	add_meta_box(
	'dashboard_widget_exthemes',
	__( 'Exthem.es - Best Product Themes for You', THEMES_NAMES ),
	'exthemes_render_dashboard_widget',
	'dashboard',
	'normal',  // $context: 'advanced', 'normal', 'side', 'column3', 'column4'
	'high'  // $priority: 'high', 'core', 'default', 'low'
	);
}
add_action( 'wp_dashboard_setup', 'exthemes_wp_dashboard_setup' );
if ( ! function_exists( 'exthemes_get_banner_widget' ) )
	:
/**
* Get json data banner
*
* @since 1.0.0
* @param int $cache Cache.
* @return array
*/
function exthemes_get_banner_widget( $cache = 168 )
{
	if ( false === ( $result = get_transient( 'exthemes_cache_json_banner_' . $cache ) ) ) {
		$response = wp_remote_get(
		''.EXTHEMES_API_URL.'/idasboard.json',
		array(
		'timeout'   => 120,
		'sslverify' => false,
		)
		);
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			if ( is_wp_error( $response ) ) {
				$result = false;
			} else {
				$result = false;
			}
		} else {
			$data = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( ! empty( $data ) && is_array( $data ) ) {
				$result = $data;
			} else {
				$result = false;
			}
		}
		set_transient( 'exthemes_cache_json_banner_' . $cache, $result, $cache * HOUR_IN_SECONDS );
	}
	return $result;
}
endif;
/**
* Render widget.
*/
function exthemes_render_dashboard_widget()
{
	$cache = 168;
	$data_array = exthemes_get_banner_widget( $cache );
	if ( false !== $data_array && ! empty( $data_array ) && is_array( $data_array ) ) {
		$imagebanner    = $data_array['bannerimage'];
		$imagebannerurl = $data_array['urlbannerimage'];
		if ( ! empty( $imagebanner ) && isset( $imagebanner ) && ! empty( $imagebannerurl ) && isset( $imagebannerurl ) ) {
			echo '<div style="margin: -13px -13px 15px;">';
			echo '<a href="' . esc_url( $imagebannerurl ) . '?source='.DOMAINSITES.'" rel="nofollow" target="_blank"><img src="' . esc_url( $imagebanner ) . '" style="display:block;width:100%;" loading="lazy" /></a>';
			echo '</div>';
		}
		$themeterbaru = $data_array['newtheme'];
		if ( is_array( $themeterbaru ) ) {
			echo '<div id="published-posts">';
			echo '<h3>Best Product Themes for You</h3>';
			echo '<ul>';
			foreach ( $themeterbaru as $value ) {
				if ( ! empty( $value['url'] ) && isset( $value['url'] ) && ! empty( $value['title'] ) && isset( $value['title'] ) ) {
					echo '<li><a href="' . esc_url( $value['url'] ) . '?source='.DOMAINSITES.'" rel="nofollow" target="_blank">' . esc_attr( $value['title'] ) . '</a></li>';
				}
			}
			echo '</ul></div>';
		}
	} else {
		echo '<p>No News</p>';
		delete_transient( 'exthemes_cache_json_banner_' . $cache );
	}
	
	echo '<p class="community-events-footer" style="margin: 0 -12px -12px !important;background-color: #efefef;">';
	echo '<a href="'.EXTHEMES_MEMBER_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-admin-site"></span> Member Area <span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_FACEBOOK_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-facebook"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span> </a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_YOUTUBE_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-youtube"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_INSTAGRAM_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-instagram"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_TWITTER_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-twitter"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo '</p>';  
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function rgb($hex, $asString = true) {
// strip off any leading #
if (0 === strpos($hex, '#')) {
$hex = substr($hex, 1);
} else if (0 === strpos($hex, '&H')) {
$hex = substr($hex, 2);
}      

// break into hex 3-tuple
$cutpoint = ceil(strlen($hex) / 2)-1;
$rgb = explode(':', wordwrap($hex, $cutpoint, ':', $cutpoint), 3);

// convert each tuple to decimal
$rgb[0] = (isset($rgb[0]) ? hexdec($rgb[0]) : 0);
$rgb[1] = (isset($rgb[1]) ? hexdec($rgb[1]) : 0);
$rgb[2] = (isset($rgb[2]) ? hexdec($rgb[2]) : 0);

return ($asString ? "rgba({$rgb[0]},{$rgb[1]},{$rgb[2]}, .7)" : $rgb);
/* rgba(0,128,128, 0.1) */
}
/*-----------------------------------------------------------------------------------*/ 

add_action( 'wp_dashboard_setup', 'supports_cs_setup_function' );
function supports_cs_setup_function() {
    add_meta_box( 'my_dashboard_widget', 'Exthemes Support '.THEMES_NAMES.' Themes', 'supports_cs_widget_function', 'dashboard', 'side', 'high' );
}
function supports_cs_widget_function() { ?>
<style>
.scrollable-supports {
    height: 350px;
    width: 100%;
    overflow: hidden;
    overflow-x: hidden;
} 
 
a:link,a:visited{ text-decoration:none;transition:all .4s ease-in-out}

.credit{background:#fff;position:relative;display:inline-block;padding:10px 20px;border:1px solid #ddd;border-radius:20px}

/* CSS Multiple Whatsapp Chat by Maks Miliyan*/
#whatsapp-chat{background:#fff;width:100%;border-radius:10px;box-shadow:0 1px 15px rgba(32,33,36,.28);bottom:90px;right:30px;overflow:hidden;z-index:99;animation-name:showchat;animation-duration:1s;transform:scale(1)}
a.blantershow-chat{background:linear-gradient(to right top,#075e54,#075e54);color:#fff;position:fixed;z-index:98;bottom:25px;right:30px;font-size:15px;padding:10px 20px;border-radius:30px;box-shadow:0 1px 15px rgba(32,33,36,.28)}
a.blantershow-chat i{transform:scale(1.2);margin:0 10px 0 0}.header-chat{background:linear-gradient(to right top,#075e54,#075e54);color:#fff;padding:20px}
.header-chat h3{margin:0 0 10px}.header-chat p{font-size:14px;line-height:1.7;margin:0}
.info-avatar{position:relative}.info-avatar img{border-radius:100%;width:50px;float:left;margin:0 10px 0 0}
.info-avatar:before{content:'\f232';z-index:1;font-family:"Font Awesome 5 Brands";background:#075e54;color:#fff;padding:4px 5px;border-radius:100%;position:absolute;top:30px;left:30px}
a.informasi{padding:20px;display:block;overflow:hidden;animation-name:showhide;animation-duration:2.5s}
a.informasi:hover{background:#f1f1f1}.info-chat span{display:block}#get-label,span.chat-label{font-size:12px;color:#888}
#get-nama,span.chat-nama{margin:5px 0 0;font-size:15px;font-weight:700;color:#222}#get-label,#get-nama{color:#fff}span.my-number{display:none}
.blanter-msg{color:#444;padding:20px;font-size:12.5px;text-align:center;border-top:1px solid #ddd}
textarea#chat-input{border:none;font-family:'Arial',sans-serif;width:100%;height:20px;outline:none;resize:none}
a#send-it{color:#555;width:40px;margin:-5px 0 0 5px;font-weight:700;padding:8px;background:#eee;border-radius:10px}
.first-msg{background:#f5f5f5;padding:30px;text-align:center}
.first-msg span{background:#e2e2e2;color:#333;font-size:14.2px;line-height:1.7;border-radius:10px;padding:15px 20px;display:inline-block}
.start-chat .blanter-msg{display:flex}#get-number{display:none}a.close-chat{position:absolute;top:5px;right:15px;color:#fff;font-size:30px}
@keyframes showhide{from{transform:scale(.5);opacity:0}}@keyframes showchat{from{transform:scale(0);opacity:0}}
@media screen and (max-width:480px){#whatsapp-chat{width:auto;left:5%;right:5%;font-size:80%}}
.hide{display:none;animation-name:showhide;animation-duration:1.5s;transform:scale(1);opacity:1}
.show{display:block;animation-name:showhide;animation-duration:1.5s;transform:scale(1);opacity:1}

</style>

<h3 style="text-align: center;font-size: large;"></h3> 
 

<link href='https://use.fontawesome.com/releases/v5.8.2/css/all.css' rel='stylesheet' type='text/css'/>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<div id='whatsapp-chat' >
<div class='header-chat'>
<div class='head-home'>
<h3> </h3>
<p style="text-align: center;font-size: large;">Exthemes Support for Only Buyers for <?php echo THEMES_NAMES; ?> Themes</p>
<p style="text-align: center; ">You have Issue and need Supports.. Chats me if you buyers</p></div>
<div class='get-new show'><div id='get-label'></div><div id='get-nama'></div></div></div>
<div class='home-chat'>
<!-- Info Contact Start -->
<a class='informasi' href='javascript:void' title='Chat Whatsapp'>
<div class='info-avatar'><img src='https://2.bp.blogspot.com/-y6xNA_8TpFo/XXWzkdYk0MI/AAAAAAAAA5s/RCzTBJ_FbMwVt5AEZKekwQqiDNqdNQJjgCLcBGAs/s70/supportmale.png'/></div>
<div class='info-chat'>
<span class='chat-label'>Support</span>
<span class='chat-nama'>Agent </span>
</div>
<span class='my-number'>6285259598501</span>
</a>
<!-- Info Contact End -->
<!-- Info Contact Start -->
<a class='informasi' href='javascript:void' title='Chat Whatsapp'>
<div class='info-avatar'><img src='https://4.bp.blogspot.com/-X1Xs2iRKabY/XXWzkqQ-iDI/AAAAAAAAA5w/HSyhR0gIXvUzlAx5XgaZzmlrCJkTgrOFQCLcBGAs/s70/supportfemale.png'/></div>
<div class='info-chat'>
<span class='chat-label'>Sales</span>
<span class='chat-nama'>Agent</span>
</div>
<span class='my-number'>6285259598501</span>
</a>
<!-- Info Contact End -->
<div class='blanter-msg' style="text-align: center;font-size: large;">Only <b>buyer</b> get supports from agent </div>
</div>
<div class='start-chat hide'>
<div class='first-msg'><span>Hallo, can i help you?</span></div>
<div class='blanter-msg'><textarea id='chat-input' placeholder='your message' maxlength='120' row='1'></textarea>
<a href='javascript:void;' id='send-it'>send</a></div>
</div>
<div id='get-number'></div>
<a style='display:none' class='close-chat' href='javascript:void'>×</a>
</div>

<a style='display:none' class='blantershow-chat' href='javascript:void' title='Show Chat'><i class='fab fa-whatsapp'></i>Hallo, can i help you?</a>
 
<script type='text/javascript'>
//<![CDATA[ 
$(document).on("click","#send-it",function(){var a=document.getElementById("chat-input");if(""!=a.value){var b=$("#get-number").text(),c=document.getElementById("chat-input").value,d="https://web.whatsapp.com/send",e=b,f="&text="+c;if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))var d="whatsapp://send";var g=d+"?phone="+e+f;window.open(g, '_blank')}}),$(document).on("click",".informasi",function(){document.getElementById("get-number").innerHTML=$(this).children(".my-number").text(),$(".start-chat,.get-new").addClass("show").removeClass("hide"),$(".home-chat,.head-home").addClass("show").removeClass("hide"),document.getElementById("get-nama").innerHTML=$(this).children(".info-chat").children(".chat-nama").text(),document.getElementById("get-label").innerHTML=$(this).children(".info-chat").children(".chat-label").text()}),$(document).on("click",".close-chat",function(){$("#whatsapp-chat").addClass("show").removeClass("hide")}),$(document).on("click",".blantershow-chat",function(){$("#whatsapp-chat").addClass("hide").removeClass("show")});
//]]>
</script>
 
 
<?php 
}

add_action( 'wp_dashboard_setup', 'changelogs_themes' );
function changelogs_themes() {
    add_meta_box( 'changelogs_themes_dashboard_widget', 'Changelogs for '.THEMES_NAMES.' Themes', 'changelogs_themes_function', 'dashboard', 'side', 'high' );
}
function changelogs_themes_function() {  

?>
<style>
	 #px-changelog .last-changelog {border-bottom: 2px dashed #CCC;border-bottom: 2px dashed #CCC;}#px-changelog .alert {display: inline-block;padding: 0px 5px;border-radius: 3px;font-size: 11px;border: 1px solid;margin: 4px 10px 4px 0;min-width: 85px;text-align: center;}#px-changelog ul {margin: 0;padding: 0;margin-top: 20px;margin-bottom: 20px;}#px-changelog ul li {width: auto;margin-bottom: 9px;list-style: none;padding-left: 130px;position: relative;text-transform: capitalize;}#px-changelog .chl-release, #px-changelog .chl-error-fixed, #px-changelog .chl-fixed, #px-changelog .chl-remove, #px-changelog .chl-add {display: inline-block;border-radius: 2px;-webkit-border-radius: 2px;-moz-border-radius: 2px;-ms-border-radius: 2px;-o-border-radius: 2px;padding: 0px 9px;margin-right: 10px;color: #FFF; min-width: 100px;text-align: center;height: 22px;position: absolute;left: 0;border: 1px solid;font-weight: bold;}#px-changelog .chl-add {border-color: #59b859;color: #59b859;}#px-changelog .chl-fixed {border-color: steelblue;color: blue;}#px-changelog .chl-remove {border-color: crimson;color: crimson;}#px-changelog .chl-release {color: #3a87ad;background-color: #d9edf7;border-color: #bce8f1;}#px-changelog h1, #px-changelog h2, #px-changelog h3, #px-changelog h4{
  margin-top: 10px;
  margin-bottom: 10px;
}
#px-changelog h3 {font-weight: bold;}
#px-changelog ul li {text-transform: uppercase}
#px-changelog a {color: #3a87ad; text-transform: uppercase;font-weight: bold;}
.scrollable-changelog {
    height: 200px;
    width: 100%;
    overflow: scroll;
    overflow-x: hidden;
}
.scrollable-changelog ul li {
    display: block;
    margin-bottom: 5px;     
    text-overflow: clip;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>

<div id="px-changelog">	 
	<div class="last-changelog">	
	<h2 style="color: red;">Infos</h2>
	<p style="color: firebrick;text-transform: uppercase;"> Please back up your theme when you are done customizing your theme, as errors in your themes are not the responsibility of the developers</strong>. if you got errors, Please ReDownload <?php echo THEMES_NAMES; ?> themes and upload for manual on <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank">member area</a> For Manual Upload</p>
	<h2>Whats is Changes</h2>
	<div class="scrollable-changelog"> 	
	<noscript>	
	<i style="font-size: x-small;color: dimgrey;"><?php echo round(((( time() - strtotime("2022-04-11 00:00:00") )/60)/60)/24).' day(s) ago'; ?></i>
	</noscript>
	
	<h3>v3.3 &#8211; 4/05/2022</h3>
	<ul> 	  
		<li><span class="chl-fixed">fixed</span> apk extractor sources apkdown </li>  		 	  	 
		<li><span class="chl-add">adding</span> new apk extractor sources from apk-store and modcombo</li>	 
		<li><span class="chl-fixed">fixed</span> small issues </li>  
	</ul>
	
	
	<h3>v3.2 &#8211; 27/04/2022</h3>
	<ul> 
 		<li><span class="chl-add">adding</span> on off setting for app names titles </li>  
 		<li><span class="chl-add">adding</span> on off setting for showing latest post on homes </li>  
 		<li><span class="chl-add">adding</span> setting for popular pages by popular range daily, weekly, Mountly, and Yearly </li>	 
 		<li><span class="chl-fixed">fixed</span> issues css styles and rtl styles</li>  
	</ul>
	
	
	<h3>v3.1 &#8211; 21/04/2022</h3>
	<ul> 
 		<li><span class="chl-fixed">fixed</span> apk extractor for sources getmodsapk.com </li>  
	</ul>
	
	<h3>v3.0 &#8211; 10/04/2022</h3>
	<ul> 
 		<li><span class="chl-fixed">fixed</span> featured image not showing </li>  
	</ul>
	
	<h3>v2.9 &#8211; 2/04/2022</h3>
	<ul>
 		<li><span class="chl-remove">remove</span> getmodsapk sources from apk extractor </li>  
 		<li><span class="chl-fixed">fixed</span> css style and small issue </li> 
 		<li><span class="chl-add">add</span> box background images post </li> 
 		<li><span class="chl-add">add</span> new color options themes </li> 

	</ul>
	
	<h3>v2.8 &#8211; 13/03/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> apk extractor </li>  

	</ul>
	
	<h3>v2.7 &#8211; 10/02/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> apk extractor sources getmodsapk.com</li> 
 		<li><span class="chl-fixed">fixed</span> showing list comments for only approve on widget comments. </li> 

	</ul>
	
	<h3>v2.6 &#8211; 27/01/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> date updates apk info extractor</li> 

	</ul>
	
	<h3>v2.5 &#8211; 27/01/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> styles for rtl mode</li>  
 		<li><span class="chl-add">add</span> your own number for rtl modes</li>  
 		<li><span class="chl-fixed">fixed</span> apk extractor apkdownload.cc</li>  
 		<li><span class="chl-add">add</span> new sources apk extractor getmodsapk.com</li>  

	</ul>
	
	
		<h3>v2.4 &#8211; 12/01/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> small bugs</li>  
 		<li><span class="chl-fixed">fixed</span> sitemap erros</li>  
 		<li><span class="chl-fixed">fixed</span> apk extractor sources happymod</li>  

	</ul>
	
	<h3>v2.3 &#8211; 09/12/2021</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> small bugs</li>  
 		<li><span class="chl-add">add</span> hidden download link, (no link show on mouse hover) </li>  

	</ul>
		<h3>v2.2 &#8211; 08/11/2021</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> widget popular home not showing</li>  

	</ul>
		<h3>v2.1 &#8211; 28/10/2021</h3>
	<ul>
 		<li><span class="chl-remove">remove</span> virus warning</li>  

	</ul>
		<h3>v2.0 &#8211; 25/10/2021</h3>
	<ul>
		<li><span class="chl-add">add</span> Support php version 8, now apk extractor version is 8.0</li> 
		<li><span class="chl-fixed">fixed</span> small warning in php 8</li> 
		<li><span class="chl-add">add</span> most post by developers</li>  

	</ul>
        <h3>v1.9 &#8211; 30/09/2021</h3>
        <ul>          
        <li><span class="chl-fixed">fixing</span> apk extractor </li>
        </ul>
        <h3>v1.8 &#8211; 28/07/2021</h3>
        <ul>          
        <li><span class="chl-fixed">fixing</span> apk extractor </li>
        <li><span class="chl-add">adding</span> sources apk extractor rajaapk </li> 
        </ul>
        
        <h3>v1.7 &#8211; 28/06/2021</h3>
        <ul> 
            <li><span class="chl-add">adding</span> Languages for apk extractor </li> 
        </ul>

        <h3>v1.6 &#8211; 25/06/2021</h3>
        <ul> 
            <li><span class="chl-fixed">fixed</span> schemes MobileApplication rating using kk stars rating plugins</li> 
        </ul>

        
        <h3>v1.5 &#8211; 15/06/2021</h3>
        <ul>
          
            <li><span class="chl-fixed">fixed</span> download link box</li>
            <li><span class="chl-fixed">fixed</span> schemes MobileApplication rating </li>
            <li><span class="chl-add">adding</span> enable on off schemes seo </li>
            <li><span class="chl-add">adding</span> changes languange options </li>
        </ul>

        
        <h3>v1.4 &#8211; 29/05/2021</h3>
        <ul>
          
            <li><span class="chl-add">adding</span> RTL Supports</li>
        </ul>

        <h3>v1.3 &#8211; 26/05/2021</h3>
        <ul>
            <li><span class="chl-fixed">Fixed</span> no image extractor apk source from apkdownload.cc</li>
            <li><span class="chl-fixed">Fixed</span> button report</li>
            <li><span class="chl-add">adding</span> new extractor to post editor</li>
        </ul>

        <h3>v1.2 &#8211; 08/05/2021</h3>
        <ul>
            <li><span class="chl-remove">Remove</span> Masking Link</li>
            <li><span class="chl-add">adding</span> for report system</li>
            <li><span class="chl-fixed">Fixed</span> for bugs</li>
        </ul>

        <h3>v1.1 &#8211; 28/04/2021</h3>
        <ul>
            <li><span class="chl-fixed">Fixed</span> turn on off for Thumbnails for original size</li>
            <li><span class="chl-fixed">Fixed</span> for bugs</li>
        </ul>

        <h3>v1.0 &#8211; 28/04/2021</h3>
        <ul> 
            <li><span class="chl-release">Release</span> First Release</li>
        </ul>
	<p><strong>Please back up your theme when you are done customizing your theme, as errors in your themes are not the responsibility of the developers</strong>. if you got errors, Please Download on <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank">member area</a> For Manual Upload</p>
	
	<h2>Upgrade</h2>
	NOTE: If you have directly made changes to the files, the update will overwrite these changes. So, we recommend that you DO NOT make changes in this way. Alternatively you can use plugins that allow adding CSS, however we do not guarantee that the 'classes' or 'id' will change in future updates.
	
	
	<h2>Manual update</h2>
	Before updating anything, make sure you have backups.<br>
	<ol>
		<li>Download the theme by logging into your account <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank" rel="noopener">login</a> and <a href="<?php echo EXTHEMES_HOW_TO; ?>" target="_blank" rel="noopener">see my license key</a></li>
		<li>Unzip the <strong>'<?php echo THEMES_NAMES; ?>'</strong> theme file.</li>
		<li>From your FTP account, replace all files within the <strong>'<?php echo THEMES_NAMES; ?>'</strong> folder found in the 'wp-content' directory. </li>
	</ol>
	<p>More information: <a href="<?php echo EXTHEMES_ITEMS_URL; ?>" target="_blank" rel="noopener"><?php echo EXTHEMES_ITEMS_URL; ?></a></p>
	<h2>PHP extension </h2>
	<?php 
	echo 'Memory Limit: '.ini_get('memory_limit');
	echo '<br>PHP version: ' . phpversion();
	echo '<br>';
	echo php_uname();
	echo '<br>';
	echo PHP_OS;
	echo '<br>';
	
	print_r(get_loaded_extensions()); ?>
	</div>
	</div>
<?php 
	echo '<h2>Memory & PHP Infos</h2>';
	echo 'Memory Limit: '.ini_get('memory_limit');
	echo '<br>';
	echo 'PHP version: ' . phpversion();
	echo '<br>';
	echo 'OS : ' . php_uname(); 
	echo ' and ' . PHP_OS; 
?>
</div>
<?php  } 