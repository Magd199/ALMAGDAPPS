<?php
if ( ! defined( 'ABSPATH' ) ) exit;
@ini_set('WP_MEMORY_LIMIT', '256M');
@ini_set('WP_MAX_MEMORY_LIMIT', '256M');
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');
define('ex_themes_name_extractor_','Extractor APK');
define('ex_themes_version_extractor_','1.0');
define('spacescore','v');
define('BY', EXTHEMES_AUTHOR);
define('FB', EXTHEMES_FACEBOOK_URL);
define('TW', EXTHEMES_TWITTER_URL);
define('IG', EXTHEMES_INSTAGRAM_URL);
define('YT', EXTHEMES_YOUTUBE_URL);
define('webs', EXTHEMES_API_URL);
define('setting_opt','_options&tab=1');
define('options_setting','_options&tab=1');
define('addscriptx', 'libs/addons/libs/addscript');
define('footerx', 'libs/addons/libs/footer');
define('postnow','Posting Now');
define('postnow2','Get data info Now');
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function wp_apk_admin_menu() {
    add_menu_page(
        __( ''.ex_themes_name_extractor_.' ', 'ex_themes_' ),
        ''.ex_themes_name_extractor_.' ',
        'manage_options',
        'wp_apk_mod_menu',
        'wp_docs',
        'dashicons-share-alt',
        //plugins_url( '/img/imdb.png' ),
        100
    );
    add_submenu_page( 'wp_apk_mod_menu', 'play.google.com', 'PLAYSTORE', 'manage_options', 'wp_apk_googleplay', 'wp_googleplay' );
    add_submenu_page( 'wp_apk_mod_menu', 'apkmod.cc', 'APKMOD', 'manage_options', 'wp_apk_apkdownload', 'wp_apkdownload' );
 
    add_submenu_page( 'wp_apk_mod_menu', 'apk-store.ORG', 'APK-STORE', 'manage_options', 'wp_apk_apkstore', 'wp_apkstore' ); 
 
    add_submenu_page( 'wp_apk_mod_menu', 'modcombo.COM', 'MODCOMBO', 'manage_options', 'wp_apk_modcombo', 'wp_modcombo' );
    add_submenu_page( 'wp_apk_mod_menu', 'happymod.com', 'HAPPYMOD', 'manage_options', 'wp_apk_happymod', 'wp_happymod' );
    add_submenu_page( 'wp_apk_mod_menu', 'getmodsapk.com', 'GETMODSAPK', 'manage_options', 'wp_apk_getmodsapk', 'wp_getmodsapk' );
	/* add_submenu_page( 'wp_apk_mod_menu', 'rajaapk.com', 'RAJAAPK', 'manage_options', 'wp_apk_rajaapk', 'wp_rajaapk' ); */
    //add_submenu_page( 'wp_apk_mod_menu', 'rexdl.com', 'REXDL', 'manage_options', 'wp_apk_rexdl', 'wp_rexdl' );
    add_submenu_page( 'wp_apk_mod_menu', 'setting', 'SETTING', 'manage_options', setting_opt, 'wpwm_settings' );
}
add_action('admin_menu', 'wp_apk_admin_menu');
require_once 'includes/modcombo.php';
require_once 'includes/apkstore.php';
require_once 'includes/rexdl.php';
require_once 'includes/rajaapk.php';
require_once 'includes/getmodsapk.php';
require_once 'includes/apkdownload.php';
require_once 'includes/happymod.php';
require_once 'includes/googleplay.php';
require_once 'includes/core.php';
require_once 'includes/docs.php';
require_once 'includes/dom.php';
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
 