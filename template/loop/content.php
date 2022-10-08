		<?php
		global $wpdb, $post, $wp_query;
		$whatnews_GP = get_post_meta( $post->ID, 'wp_whatnews_GP', true );
		$whatnews_GP1 = get_post_meta( $post->ID, 'wp_whatnews_GP', true );
		if ( $whatnews_GP === FALSE or $whatnews_GP == '' ) $whatnews_GP = $whatnews_GP1;
		?>
	<div class="block b-add-info">
    <div class="b-tabs" role="tablist">
        <a class="tab-item active" href="#app_description"><?php global $opt_themes; if($opt_themes['exthemes_content_Description']) { ?><?php echo $opt_themes['exthemes_content_Description']; ?><?php } ?></a>
		<?php global $wpdb, $post, $wp_query; if (get_post_meta( $post->ID, 'wp_whatnews_GP', true )) { ?>
		<a class="tab-item" href="#whatnews"><?php global $opt_themes; if($opt_themes['exthemes_content_Whats_News']) { ?><?php echo $opt_themes['exthemes_content_Whats_News']; ?><?php } ?></a>
		<?php } ?>
        <?php global $opt_themes; if($opt_themes['ex_themes_help_single_post_active_']) { ?>
		<a class="tab-item" href="#app_faq"><?php global $opt_themes; if($opt_themes['exthemes_content_Help']) { ?><?php echo $opt_themes['exthemes_content_Help']; ?><?php } ?></a>
		<?php } ?>
    </div>
    <div class="b-cont tab-content">
        <div class="tab-pane text" id="app_description" style="display: block;">
		<?php the_content(); ?>
		
		
        </div>
		<?php global $wpdb, $post, $wp_query; if (get_post_meta( $post->ID, 'wp_whatnews_GP', true )) { ?>		
		<div class="tab-pane text" id="whatnews" >
		<?php echo $whatnews_GP ?>
        </div>
		<?php } ?>
		<?php global $opt_themes; if($opt_themes['ex_themes_help_single_post_active_']) { ?>
        <div class="tab-pane" id="app_faq" >
        <?php echo $opt_themes['ex_themes_help_single_post_']; ?>
        </div>
		<?php } ?>
    </div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js" ></script>
<script type="text/javascript">
    $(function () {
        var tabContainers = $('div.tab-content > div.tab-pane');
        $('.b-tabs a').click(function () {
            tabContainers.hide().filter(this.hash).show();
            $('.b-tabs a').parent().removeClass('active');
            $(this).parent().addClass('active');
            return false;
        }).filter(':first').click();
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.b-tabs a').on('click', function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
 