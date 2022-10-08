<?php
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
<div class="view-app-img ">
    <figure class="img">
		<?php global $opt_themes,$wpdb, $post, $wp_query;
		$thumbnails = get_post_meta( $post->ID, 'wp_poster_GP', true ); 
		if(get_post_meta( $post->ID, 'wp_GP_ID', true )) { ?>
		<img src="<?php if($thumbnails) { ?><?php echo $thumbnails; ?><?php } else { ?><?php echo $image_url_default; ?><?php } ?>" alt="<?php the_title(); ?>" width="240" height="240">
		<?php } else { ?>
		<?php if (has_post_thumbnail()) { ?>
		<?php global $opt_themes;						 
		if($opt_themes['ex_themes_full_images_']) { ?>							
		<?php echo px_post_thumbnail_singlepost_fulls(); ?>
		<?php } else { ?>
		<?php echo px_post_thumbnail_singlepost(); ?>
		<?php } ?>
		<?php } else { ?>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" width="240" height="240">
		<?php } ?>
		<?php } ?>
    </figure> 
</div> 