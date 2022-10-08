<?php 
global $wpdb, $post, $wp_query; 
$i = 0;
$downloadlink = get_post_meta(get_the_ID(), 'repeatable_fields', true);
$download3 = get_post_meta(get_the_ID(), 'wp_downloadlink2', true);
$download2 = get_post_meta(get_the_ID(), 'wp_downloadlink', true);
$downloadapkxapkpremier = get_post_meta(get_the_ID(), 'wp_downloadapkxapkpremier', true);
$namedownload2 = get_post_meta(get_the_ID(), 'wp_namedownloadlink', true);
$namedownload3 = get_post_meta(get_the_ID(), 'wp_namedownloadlink2', true);
$size3 = get_post_meta(get_the_ID(), 'wp_sizedownloadlink2', true);
$tipe3 = get_post_meta(get_the_ID(), 'wp_tipedownloadlink2', true);
$download3x1 = get_post_meta(get_the_ID(), 'wp_downloadlink2', true);
$playstorelinkurl = get_post_meta(get_the_ID(), 'wp_GP_ID', true);
$playstorelink = 'https://play.google.com/store/apps/details?id='.$playstorelinkurl;
$sizesr = get_post_meta( $post->ID, 'wp_sizes', true );
$sizesX1 = get_post_meta( $post->ID, 'wp_sizes_GP', true );
$sizesX = '-';
if ( $sizesr === FALSE or $sizesr == '' ) $sizesr = $sizesX;
 
global $opt_themes,$wpdb, $post, $wp_query;
$image_id						= get_post_thumbnail_id(); 
$full							= 'full';
$icons							= '64';
$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
$image_url_default				= $image_url[0];
$thumbnail_images				= $image_url;
$post_id						= get_the_ID();
$url							= wp_get_attachment_url( get_post_thumbnail_id($post->ID), $icons );
$defaults_no_images				= $opt_themes['ex_themes_defaults_no_images_']['url'];
$thumb_id						= get_post_thumbnail_id( $id );
?>			
					
<div class="block b-download">
	<div class="b-nobugs">
		<div class="b-nobugs-icon">
			<figure class="img">
				<?php 
				global $opt_themes, $wpdb, $post, $wp_query; 
				$thumbnails = get_post_meta( $post->ID, 'wp_poster_GP', true ); 
				if(get_post_meta( $post->ID, 'wp_GP_ID', true )) { ?>
				<img src="<?php if($thumbnails) { ?><?php echo $thumbnails; ?><?php } else { ?><?php echo $image_url_default; ?><?php } ?>" alt="<?php the_title(); ?>" loading="auto" width="44" height="44">
				<?php } else { ?>
				<?php if (has_post_thumbnail()) { ?>
				<?php echo px_post_thumbnail(); ?>
				<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" loading="auto" width="44" height="44">
				<?php } ?>
				<?php } ?>
			</figure>
			<i data-fancybox="" data-src="#details-safe" class="c-green"><svg width="24" height="24"><use xlink:href="#i__shield"/></svg></i>		 
			<?php global $opt_themes; if($opt_themes['ex_themes_details_safe']) { ?>
			<div class="details-safe" id="details-safe" style="display: none">
			<?php echo $opt_themes['ex_themes_details_safe']; ?>			 
			</div>
			<?php } ?> 
		</div>
		<div class="b-nobugs-text">
		<span><?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?><?php echo $opt_themes['exthemes_apk_info_Download']; ?><?php } ?>&nbsp;<?php echo get_the_title(); ?>&nbsp;</span>
		</div>
	</div>
	<div class="b-cont">
	<div class="downline-line-list"> 
	<?php ex_themes_adv_single_page_2(); ?>
<?php
global $wpdb, $post, $wp_query;
$wp_mods = get_post_meta( $post->ID, 'wp_mods', true );
$wp_mods1 = get_post_meta( $post->ID, 'wp_mods', true );
$nomods = 'Originals APK';
if ( $wp_mods === FALSE or $wp_mods == '' ) $wp_mods = $wp_mods1= $nomods;
$sizes   = get_post_meta( $post->ID, 'wp_sizes', true );
$sizesX = get_post_meta( $post->ID, 'wp_sizes_GP', true );
$nosize = '';
if ( $sizes === FALSE or $sizes == '' ) $sizes = $sizesX= $nosize;
$downloadlink_gma				= get_post_meta( $post->ID, 'downloadlink_gma', true );
$downloadlink_gma_1				= get_post_meta( $post->ID, 'downloadlink_gma_1', true );
$downloadlink_gma_2				= get_post_meta( $post->ID, 'downloadlink_gma_2', true );
$downloadlink_gma_3				= get_post_meta( $post->ID, 'downloadlink_gma_3', true );
$downloadlink_gma_4				= get_post_meta( $post->ID, 'downloadlink_gma_4', true );
$downloadlink_gma_5				= get_post_meta( $post->ID, 'downloadlink_gma_5', true );
	
$namedownloadlink_gma			= get_post_meta( $post->ID, 'name_downloadlinks_gma', true );
$namedownloadlink_gma_1 		= get_post_meta( $post->ID, 'name_downloadlinks_gma_1', true );
$namedownloadlink_gma_2			= get_post_meta( $post->ID, 'name_downloadlinks_gma_2', true );
$namedownloadlink_gma_3 		= get_post_meta( $post->ID, 'name_downloadlinks_gma_3', true );
$namedownloadlink_gma_4			= get_post_meta( $post->ID, 'name_downloadlinks_gma_4', true );
$namedownloadlink_gma_5			= get_post_meta( $post->ID, 'name_downloadlinks_gma_5', true );
	
$sizedownloadlink_gma			= get_post_meta( $post->ID, 'size_downloadlinks_gma', true );
$sizedownloadlink_gma_1			= get_post_meta( $post->ID, 'size_downloadlinks_gma_1', true );
$sizedownloadlink_gma_2			= get_post_meta( $post->ID, 'size_downloadlinks_gma_2', true );
$sizedownloadlink_gma_3			= get_post_meta( $post->ID, 'size_downloadlinks_gma_3', true );
$sizedownloadlink_gma_4			= get_post_meta( $post->ID, 'size_downloadlinks_gma_4', true );
$sizedownloadlink_gma_5			= get_post_meta( $post->ID, 'size_downloadlinks_gma_5', true ); 
?>
<?php
if ($wp_mods){ ?>
<?php echo $wp_mods; ?> 
	<?php
	global $wpdb, $post, $wp_query;
	$wp_mods = get_post_meta( $post->ID, 'wp_mods', true );
	$wp_mods2 = get_post_meta( $post->ID, 'wp_mods2', true );
	$nomods =  'Originals APK';
	if ( $wp_mods2 === FALSE or $wp_mods2 == '' ) $wp_mods2 = $wp_mods;
	?>
	<?php if ($wp_mods2) { ?>
	<div class="spoiler"> 
	<div class="title_spoiler">
	<a href="javascript:ShowOrHide('sp_info')">
	<img id="image-sp_info" src="<?php echo get_template_directory_uri(); ?>/assets/img/spoiler-plus.png" alt="" width="24" height="24">
	<span class="sr-only">Show/Hide</span>
	</a>
	<?php global $opt_themes; if($opt_themes['exthemes_content_Mod_info']) { ?>
	<?php echo $opt_themes['exthemes_content_Mod_info']; ?>
	<?php } ?>
	</div>
	<div id="sp_info" class="text_spoiler" >
	<?php echo $wp_mods2 ?>
	</div>
	</div>
	<?php } else { ?>
	<?php } ?> 
	
	<?php } ?> 
	<?php if($downloadlink){ ?>
	<?php
	
	if ($downloadlink) {
	foreach ($downloadlink as $getlinks => $dw) {
	?>	
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo (!empty($dw['url'])) ? $dw['url'] : ''; ?><?php if($dw['name']){ ?>&names=<?php echo $dw['name']; ?><?php } ?><?php if($dw['sizes1']){ ?>&sizes=<?php echo $dw['sizes1']; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($dw['name'])) ? $dw['name'] : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } ?> <?php echo (!empty($dw['sizes1'])) ? $dw['sizes1'] : ''; ?>
	</span>
	</a>
	<?php $i++; } }  ?>
	<?php } elseif ($download3) { ?>
	<?php
	$download3 = get_post_meta(get_the_ID(), 'wp_downloadlink2', true);
	$download2 = get_post_meta(get_the_ID(), 'wp_downloadlink', true);
	$namedownload2 = get_post_meta(get_the_ID(), 'wp_namedownloadlink', true);
	$namedownload3 = get_post_meta(get_the_ID(), 'wp_namedownloadlink2', true);
	$sizesr = get_post_meta( $post->ID, 'wp_sizes', true );
	$sizesX1 = get_post_meta( $post->ID, 'wp_sizes_GP', true );
	$sizesX = '-';
	if ( $sizesr === FALSE or $sizesr == '' ) $sizesr = $sizesX;
	$i = 0;
	foreach($download3 as $elemento) {
	$download3x1 = $download3[$i];
	$download31 = $download3[$i];
	$download32 = $download3[$i];
	?>	
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo (!empty($download31)) ? $download31 : ''; ?><?php if($namedownload3[$i]){ ?>&names=<?php echo $namedownload3[$i]; ?><?php } ?><?php if($size3){ ?>&sizes=<?php echo $size3; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownload3[$i])) ? $namedownload3[$i] : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if (get_post_meta( $post->ID, 'wp_sizes', true )) { ?> - <?php echo $sizes; } ?>
	</span>
	</a>
	<!-- end download link from apkdown -->
	<?php $i++; } ?>	
	<?php } elseif ($downloadlink_gma) { 
	if ($downloadlink_gma) { ?>	
	<!-- download link from getmodsapk -->
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma; ?><?php if($namedownloadlink_gma){ ?>&names=<?php echo $namedownloadlink_gma; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma)) ? $namedownloadlink_gma : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma) { ?> - <?php echo $sizedownloadlink_gma; } ?>
	</span>
	</a>


	<?php } if ($downloadlink_gma_1) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_1; ?><?php if($namedownloadlink_gma_1){ ?>&names=<?php echo $namedownloadlink_gma_1; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_1)) ? $namedownloadlink_gma_1 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_1) { ?> - <?php echo $sizedownloadlink_gma_1; } ?>
	</span>
	</a>
	<?php } if ($downloadlink_gma_2) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_2; ?><?php if($namedownloadlink_gma_2){ ?>&names=<?php echo $namedownloadlink_gma_2; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_2)) ? $namedownloadlink_gma_2 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_2) { ?> - <?php echo $sizedownloadlink_gma_2; } ?>
	</span>
	</a>
	<?php } if ($downloadlink_gma_3) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_3; ?><?php if($namedownloadlink_gma_3){ ?>&names=<?php echo $namedownloadlink_gma_3; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_3)) ? $namedownloadlink_gma_3 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_3) { ?> - <?php echo $sizedownloadlink_gma_3; } ?>
	</span>
	</a>
	<?php } if ($downloadlink_gma_4) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_4; ?><?php if($namedownloadlink_gma_4){ ?>&names=<?php echo $namedownloadlink_gma_4; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_4)) ? $namedownloadlink_gma_4 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_4) { ?> - <?php echo $sizedownloadlink_gma_4; } ?>
	</span>
	</a>
	<?php } if ($downloadlink_gma_5) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo $downloadlink_gma_5; ?><?php if($namedownloadlink_gma_5){ ?>&names=<?php echo $namedownloadlink_gma_5; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownloadlink_gma_5)) ? $namedownloadlink_gma_5 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if ($sizedownloadlink_gma_5) { ?> - <?php echo $sizedownloadlink_gma_5; } ?>
	</span>
	</a>
	<!-- end download link from getmodsapk -->
	<?php } } elseif ($download2) { ?>
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo (!empty($download2)) ? $download2 : ''; ?><?php if($namedownload2){ ?>&names=<?php echo $namedownload2; ?><?php } ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo (!empty($namedownload2)) ? $namedownload2 : ''; ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if (get_post_meta( $post->ID, 'wp_sizes', true )) { ?> - <?php echo $sizes; } ?>
	</span>
	</a>
	<!-- end download link from happymood -->
	<?php } else { 
	global $opt_themes; 
	if($opt_themes['google_play_store_links']) { ?>
	<!--download link from apkpremier-->
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo get_post_meta(get_the_ID(), 'wp_downloadapkxapkpremier', true); ?>&names=<?php echo get_the_title(); ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo get_the_title(); ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if (get_post_meta( $post->ID, 'wp_sizes', true )) { ?> - <?php echo $sizes; } ?>
	</span>
	</a>	
	<?php } if (get_post_meta( $post->ID, 'wp_download_original_ps', true )) { ?>
	<!--download link from apkpremier-->
	<a id="no-link" href="<?php the_permalink() ?>/file/?urls=<?php echo get_post_meta(get_the_ID(), 'wp_download_original_ps', true); ?>&names=<?php echo get_the_title(); ?>" class="download-line s-button" target="_blank">
	<div class="download-line-title">
	<i><svg width="24" height="24"><use xlink:href="#i__getapp"/></svg></i>
	<span><?php echo get_the_title(); ?></span>
	</div>
	<span class="download-line-size">
	<?php global $opt_themes; if($opt_themes['exthemes_apk_info_Download']) { ?>
	<?php echo $opt_themes['exthemes_apk_info_Download']; ?>
	<?php } if (get_post_meta( $post->ID, 'wp_sizes', true )) { ?> - <?php echo $sizes; } ?>
	</span>
	</a>
	<?php } }  ?>
	</div>
	
	</div>
</div>

<script>
$(document).ready(function () {
          setTimeout(function () {
               
                $('a[href]#no-link').each(function () {
                    var href = this.href;
    
                    $(this).removeAttr('href').css('cursor', 'pointer').click(function () {
                        if (href.toLowerCase().indexOf("#") >= 0) {
    
                        } else {
                         	window.open(href, '_blank');
                          	//window.location.href = href; 
                        }
                    });
                });
    
          }, 500);
});
</script>