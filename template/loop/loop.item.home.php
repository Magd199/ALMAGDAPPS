<?php
global $wpdb, $post, $opt_themes;
$appname_on						= $opt_themes['title_app_name_active_'];  
$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
$title_alt						= get_the_title();
?>
			<div class="entry entry-app">
                        <div class="item">
						<?php if (get_post_meta( $post->ID, 'wp_newupdates', true )) { ?>
                            <span class="label label-<?php echo strtolower(esc_html( get_post_meta( $post->ID, 'wp_newupdates', true ) )); ?>"  ><?php echo esc_html( get_post_meta( $post->ID, 'wp_newupdates', true ) ); ?></span><?php } else { ?><?php } ?>
                            <figure class="img">
							<?php 
							global $opt_themes,$wpdb, $post, $wp_query; 
							$image_id						= get_post_thumbnail_id(); 
							$full							= 'full';
							$icons							= '64';
							$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
							$image_url_default				= $image_url[0];
							$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
							if ( $thumbnails === FALSE or $thumbnails == '' ) $thumbnails = $image_url_default;
							if(get_post_meta( $post->ID, 'wp_GP_ID', true )) { ?>
							<img src="<?php echo $thumbnails; ?>" alt="<?php the_title(); ?>" width="112" height="112" loading="lazy">
							<?php } else { ?>
							<?php if (has_post_thumbnail()) { ?>
							
							<?php global $opt_themes;						 
							if($opt_themes['ex_themes_full_images_']) { ?>							
							<?php echo px_post_thumbnail_homes_fulls(); ?>
							<?php } else { ?>
							<?php echo px_post_thumbnail_homes(); ?>
							<?php } ?>
							

							<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" width="112" height="112" loading="lazy">
							<?php } ?>
							<?php } ?>
							<?php if (get_post_meta( $post->ID, 'wp_mods', true )) { ?><span class="post__modpaid"><?php global $opt_themes; if($opt_themes['exthemes_mods_info']) { ?><?php echo $opt_themes['exthemes_mods_info']; ?><?php } ?></span>  <?php } else { ?><?php } ?>
							                             

                            </figure>
                            <h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span>
							<?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
                            <?php
                            $i = 0;
                            foreach((get_the_category()) as $cat) {
                                echo '<span class="genre truncate">' . $cat->cat_name . '</span>';
                                if (++$i == 1) break;
                            }
                            ?>
                            <?php
                            $requires = get_post_meta($post->ID, "wp_requires_GP", true);
                            $requiresX = str_replace('and up', '', $requires);
                            ?>
                            <ul class="entry-app-info">
                                <li><svg width="24" height="24"><use xlink:href="#i__android"></use></svg>
                                    <span class="truncate"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if ($requires) { ?><?php echo RTL_Nums($requires); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if ($requires) { ?><?php echo $requires; ?><?php } else { ?>4.5<?php } ?><?php } ?></span></li>
                                <li><svg width="24" height="24"><use xlink:href="#i__vers"></use></svg>
                                    <span class="truncate"><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_version_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_version_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_version_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_version_GP', true ) ); ?><?php } else { ?>n/a<?php } ?><?php } ?></span></li>
                            </ul>
                        </div>
                    </div>