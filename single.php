<?php get_header(); ?>
    <div class="wrp-min speedbar">
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div> 
    <div id="dle-content total-post-view-<?php ex_themes_set_post_view_(); ?><?= ex_themes_get_post_view_(); ?> post-id-<?php the_ID(); ?>">
        <article class="view-app" <?php global $opt_themes; if($opt_themes['ex_themes_scheme_seo_activate_']) { ?>itemscope="" itemtype="http://schema.org/MobileApplication"<?php } ?>>
            <div class="view-app-head dark-head dark-section">
                <div class="wrp-min">
                    <h1 <?php global $opt_themes; if($opt_themes['ex_themes_scheme_seo_activate_']) { ?>itemprop="name"<?php } ?> class="title"><?php echo get_the_title(); ?> </h1> 
                    <div class="view-app-main ignore-select">
                        <?php get_template_part('template/loop/images'); ?>
                        <?php get_template_part('template/loop/apk_info'); ?>
                    </div>
                    <?php ex_themes_adv_single_page_(); ?>	
					<?php global $opt_themes; if($opt_themes['aktif_ex_themes_gallery_images_gpstore_']) { ?> 
						<?php ex_themes_gallery_images_gpstore_(); ?>
					<?php } ?>
                </div>
                <?php get_template_part('template/loop/background'); ?>
            </div>
            <div class="wrp-min block-list">
                <?php get_template_part('template/loop/content'); ?>
                <div class="anchor-line"><span id="download-block"></span></div>
                <?php get_template_part('template/loop/download'); ?>
                <?php comments_template(); ?>
            </div>
        </article>
        <?php ex_themes_related_posts_(); ?>
    </div>
	
<?php 
if($opt_themes['ex_themes_nolink_activate_']) { ?>
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
<?php }
get_footer(); 