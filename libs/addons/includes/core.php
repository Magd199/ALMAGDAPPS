<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/ 
// Add the Meta Boxes
function add_post_metaboxes() {
    add_meta_box( 'wpwp_movie_details', 'App Details', 'ex_themes_apk_details_', 'post', 'normal' );
    add_meta_box( 'datos_downloadlink', 'Default Link Download ',  'callback_download', 'post', 'normal');
    add_meta_box( 'repeatable-fields', 'Download Link Box ', 'download_link_box', 'post', 'normal' );
    //add_meta_box( 'wp_app_mod', 'Mods Info', 'wp_app_mod', 'post', 'normal', 'high');
    //add_meta_box( 'datos_imagenes', 'Screenshoots Poster from Googleplay',  'callback_imagenes', 'post', 'normal');
}
add_action( 'add_meta_boxes', 'add_post_metaboxes', 0 );
 
function ex_themes_apk_details_() {
    global $post;
    $sources = get_post_meta( $post->ID, 'wp_source_url', true );
    if(!$sources) $sources = ' ';
    $plugin_url = WP_PLUGIN_URL . '/'. str_replace( basename( __FILE__ ), "", plugin_basename(__FILE__) );
    $download = get_post_meta( $post->ID, 'wp_downloadlink', true );
    $download2 = get_post_meta( $post->ID, 'wp_downloadlink2', true );
    $download3 = get_post_meta( $post->ID, 'wp_downloadlink3', true );
    if(!$download) $download = ' ';
    $namedownloadlink = get_post_meta( $post->ID, 'wp_namedownloadlink', true );
    $namedownloadlink2 = get_post_meta( $post->ID, 'wp_namedownloadlink2', true );
    if ( $namedownloadlink === FALSE or $namedownloadlink == '' ) $namedownloadlink = $namedownloadlink2;
    $judul= get_post_meta( $post->ID, 'wp_title_GP',  true );
    if(!$judul) $judul = ' ';
    $titleID= get_post_meta( $post->ID, 'wp_GP_ID', true );
    if(!$titleID) $titleID = ' ';
    $titleID2= get_post_meta( $post->ID, 'wp_GP_ID', true );
    if(!$titleID2) $titleID2 = ' ';
    $developer = get_post_meta( $post->ID, 'wp_developers_GP', true );
    $developerX = get_post_meta( $post->ID, 'wp_developers2_GP', true );
    if ( $developer === FALSE or $developer == '' ) $developer = $developerX;
    $version = get_post_meta( $post->ID, 'wp_version_GP', true );
    $versionX = get_post_meta( $post->ID, 'wp_version_GP', true );
    if ( $version === FALSE or $version == '' ) $version = $versionX;
    $installs = get_post_meta( $post->ID, 'wp_installs_GP', true );
    $installsX = get_post_meta( $post->ID, 'wp_installsapgk', true );
    if ( $installs === FALSE or $installs == '' ) $installs = $installsX;
    $requires = get_post_meta( $post->ID, 'wp_requires_GP', true );
    $requiresX = '4.4 and up';
    if ( $requires === FALSE or $requires == '' ) $requires = $requiresX;
    $updates = get_post_meta( $post->ID, 'wp_updates_GP', true );
    $updatesX = get_post_meta( $post->ID, 'wp_updateapgk', true );
    if ( $updates === FALSE or $updates == '' ) $updates = $updatesX;
    $contentrated = get_post_meta( $post->ID, 'wp_contentrated_GP', true );
    $contentratedX = get_post_meta( $post->ID, 'wp_contentratingapgk', true );
    if ( $contentrated === FALSE or $contentrated == '' ) $contentrated = $contentratedX;
    $rated = get_post_meta( $post->ID, 'wp_rated_GP', true );
    $ratedX = get_post_meta( $post->ID, 'wp_ratedapgk', true );
    if ( $rated === FALSE or $rated == '' ) $rated = $ratedX;
    $ratings = get_post_meta( $post->ID, 'wp_ratings_GP', true );
    $ratingsX = get_post_meta( $post->ID, 'wp_ratingsapgk', true );
    if ( $ratings === FALSE or $ratings == '' ) $ratings = $ratingsX;
    $persenapgk = get_post_meta( $post->ID, 'wp_persen_GP', true );
    $persenapgkX = mt_rand(990,1925);
    if ( $persenapgk === FALSE or $persenapgk == '' ) $persenapgk = $persenapgkX;
    $whatnews = get_post_meta( $post->ID, 'wp_whatnews_GP', true );
    if(!$whatnews) $whatnews = ' ';
    $youtube = get_post_meta( $post->ID, 'wp_youtube_GP', true );
    $youtubeX = get_post_meta( $post->ID, 'wp_youtube_GP', true );
	
    if ( $youtube === FALSE or $youtube == '' ) $youtube = $youtubeX;
    $sizes = get_post_meta( $post->ID, 'wp_sizes', true );
    $sizesX = get_post_meta( $post->ID, 'wp_sizes_GP', true );
    if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX;
    $desck = get_post_meta( $post->ID, 'wp_desck_GP', true );
    $desckX = get_post_meta( $post->ID, 'wp_desck_GP', true );
    if ( $desck === FALSE or $desck == '' ) $desck = $desckX;
    $modfeatures = get_post_meta( $post->ID, 'wp_mods', true );
    $modfeatures2 = get_post_meta( $post->ID, 'wp_mods', true );
    $postergp = get_post_meta( $post->ID, 'wp_poster_GP', true );
    $gambarX21 = get_post_meta( $post->ID, 'wp_images_GP', true );
    $gambarX212 = get_post_meta( $post->ID, 'wp_images_GP1', true );
    if ( $gambarX21 === FALSE or $gambarX21 == '' ) $gambarX21 = $gambarX212;

    $modfeatures = get_post_meta( $post->ID, 'wp_mods', true );
    $modfeatures2 = get_post_meta( $post->ID, 'wp_mods2', true );
    $newupdates = get_post_meta( $post->ID, 'wp_newupdates', true );
    $wp_category_app = get_post_meta( $post->ID, 'wp_category_app', true );
	$wp_mods_post = get_post_meta( $post->ID, 'wp_mods_post', true );
    $wp_mods_post2 = get_post_meta( $post->ID, 'wp_mods_post2', true );
    $wp_mods_post3 = get_post_meta( $post->ID, 'wp_mods_post3', true );
    $wp_title_wp_mods = get_post_meta( $post->ID, 'wp_title_wp_mods', true );
    $wp_title_wp_mods_2 = get_post_meta( $post->ID, 'wp_title_wp_mods_2', true );
    $wp_title_wp_mods_3 = get_post_meta( $post->ID, 'wp_title_wp_mods_3', true );
    $downloadapkxapkpremiers = get_post_meta( $post->ID, 'wp_downloadapkxapkpremier', true );
    $downloadapkxapkg = get_post_meta( $post->ID, 'wp_downloadapkxapkg', true );
    if ( $downloadapkxapkpremiers === FALSE or $downloadapkxapkpremiers == '' ) $downloadapkxapkpremiers = $downloadapkxapkg;
	get_template_part( '/libs/addons/assets/css/custom.tooltips' );
    ?>
	<div id='metabox_mdr'>
    <b style="text-transform:lowercase"><strong style="text-transform:lowercase;color: blue;">New</strong> or <strong style="text-transform:lowercase;color: blue;">Updates</strong> </b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content"> Example : type <strong style='color: red;'>New</strong> for New post or type <strong style='color: red;'>Updates</strong> for update post. leave empty if you dont want
	</span>
	</span>	  
    <p><input style="width:98%"  type="text" name="wp_newupdates" value="<?= $newupdates ?>" /></p>
	
    <b style="text-transform:capitalize">Playstore ID</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	 Example : <strong style='color: red;'>com.roblox.client</strong>  
	</span>
	</span>	  
    <p><input style="width:98%"  type="text" name="wp_GP_ID" value="<?= $titleID ?>" /></p>	
	
    <b style="text-transform:capitalize">App Name </b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: red;'>Roblox</strong>
	</span>
	</span>	  
    <p><input style="width:98%"  type="text" name="wp_title_GP" value="<?= $judul ?>" /></p>
	
    <b style="text-transform:capitalize;display:none">App Category </b>
    <p style="display:none"><input style="width:98%"  type="text" name="wp_category_app" value="<?= $wp_category_app ?>" /></p>
    <b style="text-transform:capitalize">apps Google Play</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: red;'>https://play.google.com/store/apps/details?id=com.roblox.client</strong>
	</span>
	</span>	 	
    <p>or copy this : <strong style='color: #2271b1;'>https://play.google.com/store/apps/details?id=<?= $titleID ?></strong>
    <p><input style="width:98%"  type="text" name="wp_GP_ID2" value="https://play.google.com/store/apps/details?id=<?= $titleID ?>" /></p>
	
    <b style="text-transform:capitalize">apps Poster</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: red;'>https://play-lh.googleusercontent.com/xxxxxx</strong>
	<br>
	Or You Can Upload On Featured Image Box
	</span>
	</span>	 	 	 
    <p><input style="width:98%"  type="text" name="wp_poster_GP" value="<?= $postergp ?>" /></p>	
	
    <b style="text-transform:capitalize">apps version</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: red;'>2.522.280</strong> 
	</span>
	</span>	 	 	 
    <p><input style="width:98%"  type="text" name="wp_version_GP" value="<?= $version ?>" /></p>
	
    <b style="text-transform:capitalize;display:none">apps developers</b>
    <p  style="display:none" ><input style="width:98%"  type="text" name="wp_developers_GP" value="<?= $developer ?>" /></p>
    <b style="text-transform:capitalize;display:none">apps installs</b>
    <p style="display:none"><input style="width:98%"  type="text" name="wp_installs_GP" value="<?= $installs ?>" /></p>
    <b style="text-transform:capitalize">OS Required</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: red;'>5.0</strong> 
	</span>
	</span>	 
    <p><input style="width:98%"  type="text" name="wp_requires_GP" value="<?= $requires ?>" /></p>
	
    <b style="text-transform:capitalize">apps updates</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: red;'>April 14, 2022</strong> 
	</span>
	</span>	 
    <p><input style="width:98%"  type="text" name="wp_updates_GP" value="<?= $updates ?>" /></p>
    
    <b style="text-transform:capitalize;">apps rated</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: red;'>4.5</strong>
	</span>
	</span>	 	 
    <p><input style="width:98%"  type="text" name="wp_rated_GP" value="<?= $rated ?>" /></p>
	
	<b style="text-transform:capitalize;">apps ratings</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: red;'>28.536.990</strong>
	</span>
	</span>	 
    <p><input style="width:98%"  type="text" name="wp_ratings_GP" value="<?= $ratings ?>" /></p>
    <b style="text-transform:capitalize;display:none">apps persen</b>
    <p style="display:none"><input style="width:98%"  type="text" name="wp_persen_GP" value="<?= $persenapgk ?>" /></p>
    <b style="text-transform:capitalize;display:none">apps content rated</b>
    <p style="display:none"><input style="width:98%"  type="text" name="wp_contentrated_GP" value="<?= $contentrated ?>" /></p>
    <b style="text-transform:capitalize">apps youtube id</b> 
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: green;'>T_rkoL9vt3g</strong>
	<br>
	Not Format Like This <strong style='color: red;'>https://youtube.com/watch?v=03DXtNlUGGg</strong>
	</span>
	</span>	 	
    <p><input style="width:98%"  type="text" name="wp_youtube_GP" value="<?= $youtube ?>" /></p>
	
    <b style="text-transform:capitalize">apps Size</b>
	<span class="tooltip">
	<span class="tooltip-point"><i class="mce-ico mce-i-wp_help">&nbsp;</i></span>
	<span class="tooltip-content">
	Example : <strong style='color: green;'>250 mb</strong> or <strong style='color: green;'>1 gb</strong>
	<br>
	Not Format Like This <strong style='color: red;'>250</strong> 
	</span>
	</span>	 
    <p><input style="width:98%"  type="text" name="wp_sizes" value="<?= $sizes ?>" /></p>
    <b style="text-transform:capitalize;display:none">Name download link</b>
    <p style="display:none"><input style="width:98%" type="text" name="wp_namedownloadlink" value="<?= $namedownloadlink ?>" /></p>
    <b style="text-transform:capitalize;display:none">download link</b>
    <p style="display:none"><input style="width:98%" type="text" name="wp_downloadlink" value="<?= $download ?>" /></p>
    <b style="text-transform:capitalize;display:none">sources</b>
    <p style="display:none"><input style="width:98%"  type="text" name="wp_source_url" value="<?= $sources ?>" /></p>
   
    <b style="text-transform:capitalize">App Desc</b>
    <p><?php wp_editor(  ($desck), 'wp_desck_GP', array('textarea_name' => 'wp_desck_GP', 'textarea_rows' => 5)); ?></p>
    <b style="text-transform:capitalize;"> App what news </b>
    <p><?php wp_editor(  ($whatnews), 'wp_whatnews_GP', array('textarea_name' => 'wp_whatnews_GP', 'textarea_rows' => 5)); ?></p>
    <b style="text-transform:capitalize">mod features 1</b>
    <p><?php wp_editor(  ($modfeatures), 'wp_mods', array('textarea_name' => 'wp_mods', 'textarea_rows' => 5)); ?></p>
    <b style="text-transform:capitalize">mod features 2</b>
    <p><?php wp_editor(  ($modfeatures2), 'wp_mods2', array('textarea_name' => 'wp_mods2', 'textarea_rows' => 5)); ?></p>
	</div>
    <hr>
	
 

<?php }

function callback_download($post){
    $downloadlinks = get_post_meta($post->ID, 'wp_downloadlink2', true);
    $sizexx = get_post_meta($post->ID, 'wp_sizes2', true);
    $namedownloadlinks = get_post_meta($post->ID, 'wp_namedownloadlink2', true);	
	$namedownloadlinks = preg_replace('/\s++/', ' ', $namedownloadlinks);
    $downloadlinks = !empty($downloadlinks) ? $downloadlinks : array();
    $c = 3;
    $input_upload = '';
    wp_nonce_field( 'repeatable_meta_box_downloadlinks', 'repeatable_meta_box_downloadlinks' );
    ?>
    <script>jq1 = jQuery.noConflict();
        jq1(function($) {
            var count = <?php echo $c; ?>;
            $(document).on('click', '.remove-row', function(){
                $(this).parents('p').remove();
                count--;
            });
            $(".addImg").on('click', function(){
                $(".ElementImagenes").append('<p><input type="text" name="downloadlinks['+count+']" value="" class="regular-text upload"><?php echo @$input_upload; ?><a href="javascript:void(0)" class="button remove-row">Remove</a></p>');
                count++;
            });
        });
        jpp2 = jQuery.noConflict();
        jpp2(function($) {
            $('.upload_image_button').on( 'click', function() {
                formfield = $(this).prev('input');
                tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');
                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {
                    if($(html).attr('src')) {
                        imgurl = $(html).attr('src');
                    } else if ($(html).attr('href')) {
                        imgurl = $(html).attr('href');
                    }
                    formfield.val(imgurl);
                    tb_remove();
                    window.send_to_editor = oldFunc;
                };
                return false;
            });
        });
    </script>
    <div class="ElementImagenes">
        <div class="download"></div>
        <table id="downloadlinks" width="100%" class="content-table">
            <thead>
            <tr>

            <th width="30%">Url Names <br>APK / ZIP / OBB</th>
            <th width="70%">Url Links <br>APK / ZIP / OBB</th>
            </tr>
            </thead>
            <tbody>
            <center>
                <p><strong style="text-transform:uppercase!important;color:#2271b1">Here for Default Download Links from Sources, you cant add or remove this. <br>but you can copy this link for you insert to download link page</strong></p>
            </center>
            <?php
            $i = 0;
            if(count($downloadlinks)>5){
                foreach($downloadlinks as $elemento) { ?>
                    <tr>
                        <td><input type="text" name="namedownloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($namedownloadlinks[$i])) ? $namedownloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
                        <td><input type="text" name="downloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($downloadlinks[$i])) ? $downloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
                    </tr>
                    </tr>
                    <?php $i++; } ?>
            <?php } else {
                for($i=0;$i<3;$i++): ?>
                    <tr>
                        <td><input type="text" name="namedownloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($namedownloadlinks[$i])) ? $namedownloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
                        <td><input type="text" name="downloadlinks[<?php echo $i; ?>]" value="<?php echo (!empty($downloadlinks[$i])) ? $downloadlinks[$i] : ''; ?>" id="imagenes<?php echo $i; ?>"  class="widefat" ><?php echo $input_upload; ?></td>
                    </tr>
                    </tr>
                <?php endfor; ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
<?php }
function download_link_box() {
    global $post, $wpdb, $gets_data;	
    $downloadlink_gma		= get_post_meta( $post->ID, 'downloadlink_gma', true );
    $downloadlink_gma_1		= get_post_meta( $post->ID, 'downloadlink_gma_1', true );
    $downloadlink_gma_2		= get_post_meta( $post->ID, 'downloadlink_gma_2', true );
    $downloadlink_gma_3		= get_post_meta( $post->ID, 'downloadlink_gma_3', true );
    $downloadlink_gma_4		= get_post_meta( $post->ID, 'downloadlink_gma_4', true );
    $downloadlink_gma_5		= get_post_meta( $post->ID, 'downloadlink_gma_5', true );
	
	$namedownloadlink_gma	= get_post_meta( $post->ID, 'name_downloadlinks_gma', true );
	$namedownloadlink_gma_1 = get_post_meta( $post->ID, 'name_downloadlinks_gma_1', true );
	$namedownloadlink_gma_2 = get_post_meta( $post->ID, 'name_downloadlinks_gma_2', true );
	$namedownloadlink_gma_3 = get_post_meta( $post->ID, 'name_downloadlinks_gma_3', true );
	$namedownloadlink_gma_4 = get_post_meta( $post->ID, 'name_downloadlinks_gma_4', true );
	$namedownloadlink_gma_5 = get_post_meta( $post->ID, 'name_downloadlinks_gma_5', true );
	
	$sizedownloadlink_gma	= get_post_meta( $post->ID, 'size_downloadlinks_gma', true );
	$sizedownloadlink_gma_1 = get_post_meta( $post->ID, 'size_downloadlinks_gma_1', true );
	$sizedownloadlink_gma_2 = get_post_meta( $post->ID, 'size_downloadlinks_gma_2', true );
	$sizedownloadlink_gma_3 = get_post_meta( $post->ID, 'size_downloadlinks_gma_3', true );
	$sizedownloadlink_gma_4 = get_post_meta( $post->ID, 'size_downloadlinks_gma_4', true );
	$sizedownloadlink_gma_5 = get_post_meta( $post->ID, 'size_downloadlinks_gma_5', true );
	
	
    $c = 4;
    $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
    $downloadlinks = get_post_meta($post->ID, 'wp_downloadlink2', true);
    $downloadlinksZ1 = get_post_meta( $post->ID, 'wp_downloadlink', true );
    if ( $downloadlinks === FALSE or $downloadlinks == '' ) $downloadlinks = $downloadlinksZ1;
    $downloadlinks = !empty($downloadlinks) ? $downloadlinks : array();
	$downloadapkxapkpremiers = get_post_meta( $post->ID, 'wp_downloadapkxapkpremier', true );
    $downloadapkxapkg = get_post_meta( $post->ID, 'wp_downloadapkxapkg', true );
    if ( $downloadapkxapkpremiers === FALSE or $downloadapkxapkpremiers == '' ) $downloadapkxapkpremiers = $downloadapkxapkg;
	$download_original_ps = get_post_meta( $post->ID, 'wp_download_original_ps', true );
    wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );
	get_template_part( '/libs/addons/assets/css/custom.table' );
    ?>
	<?php if ($downloadlink_gma) { ?>
	<table class="content-table"> 
	<center>
	<p><strong style="text-transform:capitalize;color:black">Here for Default Download Links from Sources <u style="text-transform:uppercase!important;color:#2271b1">Getmodsapk.com, modcombo.com and apk-store.org</u><br> Please copy this link to download box<br> if you not copy the link.. download link from <u style="text-transform:uppercase!important;color:#2271b1">Getmodsapk.com, modcombo.com and apk-store.org</u> not showing...</strong></p>
	</center>
	<thead>
		<tr> 
		  <th width="5%">Size</th> 
		  <th width="30%">Name</th> 
		  <th width="65%">Link</th>
		</tr>
	</thead>
	<tbody>
	<?php print_r( $gets_data['name_downloadlinks_gma']) ?>
    <tr> 
      <td name="size_downloadlinks_gma"><?php echo $sizedownloadlink_gma; ?></td> 
      <td name="name_downloadlinks_gma"><?php echo $namedownloadlink_gma; ?></td> 
      <td name="downloadlink_gma"><input style="width:100%" type="text" name="downloadlink_gma" value="<?php echo $downloadlink_gma; ?>" /></td>
    </tr>
	<?php if ($downloadlink_gma_1) { ?>
    <tr> 
      <td name="size_downloadlinks_gma_1"><?php echo $sizedownloadlink_gma_1; ?></td> 
      <td name="name_downloadlinks_gma_1"><?php echo $namedownloadlink_gma_1; ?></td> 
      <td name="downloadlink_gma_1"><input style="width:100%" type="text" name="downloadlink_gma_1" value="<?php echo $downloadlink_gma_1; ?>" /> </td>
    </tr> 
	<?php } ?>
	<?php if ($downloadlink_gma_2) { ?>
    <tr> 
      <td name="size_downloadlinks_gma_2"><?php echo $sizedownloadlink_gma_2; ?></td> 
      <td name="name_downloadlinks_gma_2"><?php echo $namedownloadlink_gma_2; ?></td> 
      <td name="downloadlink_gma_2"><input style="width:100%" type="text" name="downloadlink_gma_2" value="<?php echo $downloadlink_gma_2; ?>" /> </td>
    </tr> 
	<?php } ?>
	<?php if ($downloadlink_gma_3) { ?>
    <tr> 
      <td name="size_downloadlinks_gma_3"><?php echo $sizedownloadlink_gma_3; ?></td> 
      <td name="name_downloadlinks_gma_3"><?php echo $namedownloadlink_gma_3; ?></td> 
      <td name="downloadlink_gma_3"><input style="width:100%" type="text" name="downloadlink_gma_3" value="<?php echo $downloadlink_gma_3; ?>" /> </td>
    </tr> 
	<?php } ?>
	<?php if ($downloadlink_gma_4) { ?>
    <tr> 
      <td name="size_downloadlinks_gma_4"><?php echo $sizedownloadlink_gma_4; ?></td> 
      <td name="name_downloadlinks_gma_4"><?php echo $namedownloadlink_gma_4; ?></td> 
      <td name="downloadlink_gma_4"><input style="width:100%" type="text" name="downloadlink_gma_4" value="<?php echo $downloadlink_gma_4; ?>" /> </td>
    </tr> 
	<?php } ?>
	<?php if ($downloadlink_gma_5) { ?>
    <tr> 
      <td name="size_downloadlinks_gma_5"><?php echo $sizedownloadlink_gma_5; ?></td> 
      <td name="name_downloadlinks_gma_5"><?php echo $namedownloadlink_gma_5; ?></td> 
      <td name="downloadlink_gma_5"><input style="width:100%" type="text" name="downloadlink_gma_5" value="<?php echo $downloadlink_gma_5; ?>" /> </td>
    </tr> 
	<?php } ?>
	<?php if ($downloadapkxapkpremiers) { ?>
    <tr class="active-row"> 
      <td name="size_apkxapkpremiers">n/a</td> 
      <td name="name_apkxapkpremiers">Google Apis</td> 
      <td name="wp_downloadapkxapkpremier"><input style="width:100%" type="text" name="wp_downloadapkxapkpremier" value="<?= $downloadapkxapkpremiers ?>" /></td>
    </tr> 
	<?php } ?>
	
  </tbody>
</table>
<?php } ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.metabox_submit').click(function(e) {
                e.preventDefault();
                $('#publish').click();
            });
            $('#add-row').on('click', function() {
                var row = $('.empty-row.screen-reader-text').clone(true);
                row.removeClass('empty-row screen-reader-text');
                row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
                return false;
            });
            $('.remove-row').on('click', function() {
                $(this).parents('tr').remove();
                return false;
            });
            $('#repeatable-fieldset-one tbody').sortable({
                opacity: 0.6,
                revert: true,
                cursor: 'move',
                handle: '.sort'
            });
        });
    </script>
    <table id="repeatable-fieldset-one" width="100%"  class="content-table">
        <thead>
        <tr>
            <th width="15%">Sizes <br>APK / ZIP / OBB</th>
            <th width="30%">Url Names <br>APK / ZIP / OBB</th>
            <th width="40%">Url Links <br>APK / ZIP / OBB</th>
            <th width="5%">Remove </th>
        </tr>
        </thead> 
        <tbody>
        <center>
            <p><strong style="text-transform:uppercase!important;color:#2271b1">Here for Your can Insert Link Download<br>you can add, edit or remove your link</strong></p>
        </center>
        <?php
        if ( $repeatable_fields ) :
            foreach ( $repeatable_fields as $field ) {
                ?>
                <tr>

                    <td><input type="text" class="widefat exthemes_dlbutton_item_size" name="sizes1[]" value="<?php if($field['sizes1'] != '') echo esc_attr( $field['sizes1'] ); ?>" /></td>
                    <td><input type="text" class="widefat exthemes_dlbutton_item_title" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>
                    <td><input type="text" class="widefat exthemes_dlbutton_item_url" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo 'http://'; ?>" /></td>
                    <td><a class="button remove-row" href="#">Remove</a></td>
                </tr>
            <?php }
        else :
            // show a blank one
            ?>
            <tr>

                <td><input type="text" class="widefat exthemes_dlbutton_item_size" name="sizes1[]"  /></td>
                <td><input type="text" class="widefat exthemes_dlbutton_item_title" name="name[]"  /></td>
                <td><input type="text" class="widefat exthemes_dlbutton_item_url" name="url[]" /></td>
                <td><a class="button remove-row" href="#">Remove</a></td>
            </tr>
        <?php endif; ?>
        <!-- empty hidden one for jQuery -->
        <tr class="empty-row screen-reader-text">
            <td><input type="text" class="widefat exthemes_dlbutton_item_size" name="sizes1[]" /></td>
            <td><input type="text" class="widefat exthemes_dlbutton_item_title" name="name[]" /></td>
            <td><input type="text" class="widefat exthemes_dlbutton_item_url" name="url[]"  /></td>
            <td><a class="button remove-row" href="#">Remove</a></td>
        </tr>
        </tbody>
    </table>
    <p><a id="add-row" class="button" href="#">Add New Url Link</a>
        <input type="submit" class="button metabox_submit" value="Save" />
    </p>
<?php }
add_action('save_post', 'repeatable_meta_box_save');
function repeatable_meta_box_save($post_id) {
    if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
        ! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
        return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;
    if (!current_user_can('edit_post', $post_id))
        return;
    $old = get_post_meta($post_id, 'repeatable_fields', true);
    $new = array();
    $tipes = $_POST['tipes'];
    $sizes1 = $_POST['sizes1'];
    $names = $_POST['name'];
    $urls = $_POST['url'];
    $count = count( $names );
    for ( $i = 0; $i < $count; $i++ ) {
        if ( $names[$i] != '' ) :
            $new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
            if ( $tipes[$i] != '' )
                $new[$i]['tipes'] = stripslashes( strip_tags( $tipes[$i] ) );
            if ( $sizes1[$i] != '' )
                $new[$i]['sizes1'] = stripslashes( strip_tags( $sizes1[$i] ) );
            if ( $urls[$i] == 'https://' )
                $new[$i]['url'] = '';
            else
                $new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'repeatable_fields', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'repeatable_fields', $old );
}
#################################### <a class="button remove-row" href="#">Remove</a>
function callback_imagenes($post){
    $gambarX21 = get_post_meta( $post->ID, 'wp_images_GP', true );
    $gambarX212 = get_post_meta( $post->ID, 'wp_images_GP1', true );
    //$datos_imagenes = ''.$gambarX21.''.$gambarX212.'';
    //$datos_imagenes = get_post_meta($post->ID, 'wp_images_GP', true);
    $datos_imagenes = $gambarX21;
    if ( $datos_imagenes === FALSE or $datos_imagenes == '' ) $datos_imagenes = $gambarX212;


    $datos_imagenes = !empty($datos_imagenes) ? $datos_imagenes : array();
    $i = 2;
    $input_upload = '<input class="gambarbaru upload_image_button button" type="button" value="Upload">';
    ?>
    <script>jq1 = jQuery.noConflict();
        jq1(function($) {
            var count = <?php echo $i; ?>;
            $(document).on('click', '.hapusgambar', function(){
                $(this).parents('p').remove();
                count--;
            });
            $(".tambahgambar").on('click', function(){
                $(".kolomgambar").append('<p><input type="text" name="datos_imagenes['+count+']" value="" class="regular-text upload"><?php echo @$input_upload; ?><a href="javascript:void(0)" class="button hapusgambar">Remove</a></p>');
                count++;
            });
        });
        jpp2 = jQuery.noConflict();
        jpp2(function($) {
            $('.gambarbaru').on( 'click', function() {
                formfield = $(this).prev('input');
                tb_show('', 'media-upload.php?type=file&amp;TB_iframe=true');
                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {
                    if($(html).attr('src')) {
                        imgurl = $(html).attr('src');
                    } else if ($(html).attr('href')) {
                        imgurl = $(html).attr('href');
                    }
                    formfield.val(imgurl);
                    tb_remove();
                    window.send_to_editor = oldFunc;
                };
                return false;
            });
        });
    </script>
    <div class="kolomgambar"  >
        <div class="download"></div>
        <center>
            <p><strong style="text-transform:uppercase!important;color:#2271b1">Here for Default Screenshoots Poster from Googleplay, you cant add or remove this</strong></p>
        </center>
        <table style="width:100%;">
            <thead>
            <tr style="text-align:left;">
                <th style="width:100%;">Link Source Images Poster from Googleplay</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $limiteds = 4;
            $i = 0;
            foreach ($datos_imagenes as $elemento) {
                $i++;
                if ( $i <= $limiteds ) { ?>
                    <tr>
                        <td><input type="text" name="datos_imagenes[<?php echo $i; ?>]" value="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" id="imagenes<?php echo $i; ?>" class="regular-text upload"><?php echo $input_upload; ?><a href="#" class="button hapusgambar">Remove</a></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td><input type="text" name="datos_imagenes[<?php echo $i; ?>]" value="<?php echo (!empty($datos_imagenes[$i])) ? $datos_imagenes[$i] : ''; ?>" id="imagenes<?php echo $i; ?>" class="regular-text upload"><?php echo $input_upload; ?><a href="#" class="button hapusgambar">Remove</a></td>
                    </tr>
                <?php } } ?>


            </tbody>
        </table>
    </div>
    <p class="tambahgambar button" ><b>+ Add Images</b></p>
<?php }
add_action( 'save_post', 'cd_quote_meta_save' );
function cd_quote_meta_save( $id ) {
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if(!wp_verify_nonce( @$_POST['dynamicMeta_noncename'], plugin_basename( __FILE__ ))){
        return;
    }
    if( !current_user_can( 'edit_post', $id ) ) return;
    $allowed = array(
        'p'	=> array()
    );
    if($_POST['datos_informacion'])
        update_post_meta($id, "datos_informacion", $_POST['datos_informacion']);
    if($_POST['datos_video'])
        update_post_meta($id, "datos_video", $_POST['datos_video']);
    if($_POST['datos_imagenes'])
        update_post_meta($id, "datos_imagenes", $_POST['datos_imagenes']);
    if($_POST['datos_download'])
        update_post_meta($id, "datos_download", $_POST['datos_download']);
    if(isset($_POST['custom_boxes']))
        update_post_meta($id, "custom_boxes", $_POST['custom_boxes']);
    if( isset($_POST['new_rating_users'])  || isset($_POST['new_rating_average']) ) {
        update_post_meta($id, "new_rating_users", $_POST['new_rating_users']);
        update_post_meta($id, "new_rating_average", $_POST['new_rating_average']);
        update_post_meta($id, "new_rating_count", ceil($_POST['new_rating_users'] * $_POST['new_rating_average']));
    }
}

add_action("manage_posts_custom_column",  "wpwm_custom_columns");
add_filter("manage_edit-post_columns", "wpwm_edit_columns");
function wpwm_edit_columns($columns){
    $columns = array_merge(array("poster" => "Poster"), $columns);
    return $columns;
}
function wpwm_custom_columns($column){
    global $post;
    switch ($column) {
        case "poster":
            echo get_the_post_thumbnail( $post->ID, array(50, 80) );
            break;
    }
}
/* When the post is saved, saves our custom data */
function wpwm_save_postdata( $post_id ) {
    // First we need to check if the current user is authorised to do this action.
    if ( 'page' == @$_REQUEST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;
    }
    $wpwm_meta = array('wp_version_GP', 'wp_download_original_ps', 'wp_downloadapkxapkpremier_link', 'wp_category_app', 'wp_downloadapkxapkg','wp_downloadapkxapkpremier','wp_title_wp_mods_3', 'wp_title_wp_mods_2', 'wp_title_wp_mods', 'wp_mods2', 'wp_newupdates', 'wp_mods2', 'wp_namedownloadlink', 'wp_size_GP', 'wp_GP_ID', 'wp_sizes', 'wp_source_url', 'wp_downloadlink', 'wp_title', 'wp_GP_ID2', 'wp_title_id', 'wp_title_id2', 'wp_developers', 'wp_developers2', 'wp_contentrated', 'wp_installs','wp_requires', 'wp_updates', 'wp_ratings', 'wp_rated', 'wp_whatnews', 'wp_gambar1', 'wp_gambar2', 'wp_gambar3', 'wp_gambar4', 'wp_gambar5', 'wp_gambar6', 'wp_youtube', 'wp_desck', 'wp_desckapgk', 'wp_desckapgk', 'wp_contentratingapgk', 'wp_updateapgk', 'wp_requiresapgk', 'wp_installsapgk', 'wp_developersapgk', 'wp_versionapgk', 'wp_judulapgk', 'wp_persenapgk', 'wp_modfeatures', 'wp_modfeatures3','wp_images_GP',  'wp_mods', 'wp_desck_GP',  'wp_youtube_GP', 'wp_whatnews_GP', 'wp_persen_GP', 'wp_ratings_GP', 'wp_rated_GP', 'wp_contentrated_GP', 'wp_updates_GP', 'wp_requires_GP', 'wp_installs_GP', 'wp_version_GP', 'wp_developers2_GP', 'wp_developers_GP', 'wp_title_GP', 'wp_GP_ID', 'wp_poster_GP',  );
    //if saving in a custom table, get post_ID
    $post_ID = @$_POST['post_ID'];
    foreach ($wpwm_meta as $meta_key) {
        if(isset($_POST[$meta_key])) update_post_meta($post_ID, $meta_key, $_POST[$meta_key]);
    }
}
add_action( 'save_post', 'wpwm_save_postdata' );