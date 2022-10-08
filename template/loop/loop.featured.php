<?php $count++; ?>
<?php if ($count == 1) : ?>
<div class="entry">
	<div class="item recom-post recom-blue">
		<div class="img"> 
			<?php 
					global $opt_themes,$wpdb, $post, $wp_query; 
					$image_id						= get_post_thumbnail_id(); 
					$full							= 'full';
					$icons							= '64';
					$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
					$image_url_default				= $image_url[0];
					$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
					if ( $thumbnails === FALSE or $thumbnails == '' ) $thumbnails = $image_url_default;
					if($opt_themes['ex_themes_thumbnails_gpstore_active_']) { ?>
					<img src="<?php echo $thumbnails; ?>" alt="<?php the_title(); ?>" width="136" height="136" >
					<?php } else { ?>
					<?php if (has_post_thumbnail()) { ?>                                                
					<?php global $opt_themes;						 
										if($opt_themes['ex_themes_full_images_']) { ?>							
					<?php echo px_post_thumbnail_homes_fulls(); ?>
					<?php } else { ?>
					<?php echo px_post_thumbnail_homes(); ?>
					<?php } ?>
					<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" width="136" height="136" >
						<?php } ?>
						<?php } ?>
					</div>
					<h2 class="title">
						<a class="item-link" href="<?php the_permalink() ?>">
							<span class="truncate">
								<?php the_title(); ?>
							</span>
						</a>
					</h2>
					<span class="recom-post-vers">
						<svg width="24" height="24">
							<use xlink:href="#i__android"/>
						</svg>
						<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
<?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
<?php } else { ?>
<?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
<?php } ?>
					</span>
					<i class="recom-post-bg">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 596 300" width="596" height="300" style="min-width: 596px;">
							<circle fill="#37b3e5" cx="120" cy="172" r="120"/>
							<circle fill="#c74425" style="opacity:0.5" cx="324" cy="120" r="120"/>
							<circle fill="#fede4a" style="opacity:0.66" cx="476" cy="180" r="120"/>
						</svg>
					</i>
				</div>
			</div>
			<?php elseif ($count == 2) : ?>
			<div class="entry">
				<div class="item recom-post recom-green">
					<div class="img">
			<?php 
					global $opt_themes,$wpdb, $post, $wp_query; 
					$image_id						= get_post_thumbnail_id(); 
					$full							= 'full';
					$icons							= '64';
					$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
					$image_url_default				= $image_url[0];
					$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
					if ( $thumbnails === FALSE or $thumbnails == '' ) $thumbnails = $image_url_default;
                                        if($opt_themes['ex_themes_thumbnails_gpstore_active_']) { ?>
						<img src="<?php echo $thumbnails; ?>" alt="<?php the_title(); ?>" width="136" height="136" >
								<?php } else { ?>
								<?php if (has_post_thumbnail()) { ?>                                                
								<?php global $opt_themes;						 
										if($opt_themes['ex_themes_full_images_']) { ?>							
								<?php echo px_post_thumbnail_homes_fulls(); ?>
								<?php } else { ?>
								<?php echo px_post_thumbnail_homes(); ?>
								<?php } ?>
								<?php } else { ?>
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" width="136" height="136" >
									<?php } ?>
									<?php } ?>
								</div>
								<h2 class="title">
									<a class="item-link" href="<?php the_permalink() ?>">
										<span class="truncate">
											<?php the_title(); ?>
										</span>
									</a>
								</h2>
								<span class="recom-post-vers">
									<svg width="24" height="24">
										<use xlink:href="#i__android"/>
									</svg>
									<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
<?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
<?php } else { ?>
<?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
<?php } ?>
								</span>
								<i class="recom-post-bg">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 688 316" width="688" height="316" style="min-width: 688px;">
										<circle fill="#4ccb70" cx="320" cy="172" r="120"/>
										<circle fill="#fede4a" style="opacity:0.66" cx="136" cy="148" r="136"/>
										<circle fill="#4afec0" style="opacity:0.66" cx="530" cy="158" r="158"/>
									</svg>
								</i>
							</div>
						</div>
						<?php elseif ($count == 3) : ?>
						<div class="entry">
							<div class="item recom-post recom-purple">
								<div class="img">
			<?php 
					global $opt_themes,$wpdb, $post, $wp_query; 
					$image_id						= get_post_thumbnail_id(); 
					$full							= 'full';
					$icons							= '64';
					$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
					$image_url_default				= $image_url[0];
					$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
					if ( $thumbnails === FALSE or $thumbnails == '' ) $thumbnails = $image_url_default;
                                        if($opt_themes['ex_themes_thumbnails_gpstore_active_']) { ?>
									<img src="<?php echo $thumbnails; ?>" alt="<?php the_title(); ?>" width="136" height="136" >
											<?php } else { ?>
											<?php if (has_post_thumbnail()) { ?>
											<?php echo px_post_thumbnail_homes(); ?>
											<?php } else { ?>
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" width="136" height="136" >
												<?php } ?>
												<?php } ?>
											</div>
											<h2 class="title">
												<a class="item-link" href="<?php the_permalink() ?>">
													<span class="truncate">
														<?php the_title(); ?>
													</span>
												</a>
											</h2>
											<span class="recom-post-vers">
												<svg width="24" height="24">
													<use xlink:href="#i__android"/>
												</svg>
												<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
<?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
<?php } else { ?>
<?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
<?php } ?>
											</span>
											<i class="recom-post-bg">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 680 333" width="680" height="333" style="min-width: 680px;">
													<circle fill="#784ccb" cx="312" cy="142.63" r="142.63"/>
													<circle fill="#f7c76f" style="opacity:0.62" cx="111.36" cy="285.26" r="41.65"/>
													<circle fill="#fe814a" style="opacity:0.66;" cx="136" cy="149.26" r="136"/>
													<circle fill="#d693aa" style="opacity:0.66;" cx="522" cy="175" r="158"/>
												</svg>
											</i>
										</div>
									</div>
									<?php elseif ($count == 4) : ?>
									<div class="entry">
										<div class="item recom-post recom-yellow">
											<div class="img">
			<?php 
					global $opt_themes,$wpdb, $post, $wp_query; 
					$image_id						= get_post_thumbnail_id(); 
					$full							= 'full';
					$icons							= '64';
					$image_url						= wp_get_attachment_image_src($image_id, $full, true); 
					$image_url_default				= $image_url[0];
					$thumbnails						= get_post_meta( $post->ID, 'wp_poster_GP', true ); 
					if ( $thumbnails === FALSE or $thumbnails == '' ) $thumbnails = $image_url_default;
                                        if($opt_themes['ex_themes_thumbnails_gpstore_active_']) { ?>
												<img src="<?php echo $thumbnails; ?>" alt="<?php the_title(); ?>" width="136" height="136" >
														<?php } else { ?>
														<?php if (has_post_thumbnail()) { ?>
														<?php echo px_post_thumbnail_homes(); ?>
														<?php } else { ?>
														<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" width="136" height="136" >
															<?php } ?>
															<?php } ?>
														</div>
														<h2 class="title">
															<a class="item-link" href="<?php the_permalink() ?>">
																<span class="truncate">
																	<?php the_title(); ?>
																</span>
															</a>
														</h2>
														<span class="recom-post-vers">
															<svg width="24" height="24">
																<use xlink:href="#i__android"/>
															</svg>
															<?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?>
<?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
<?php } else { ?>
<?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?>
<?php } ?>
														</span>
														<i class="recom-post-bg">
															<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 688 364" width="688" height="364" style="min-width: 688px;">
																<circle fill="#fede4a" cx="356" cy="200" r="140"/>
																<circle fill="#cc6040" style="opacity:0.66;" cx="136" cy="228" r="136"/>
																<circle fill="#ffb100" style="opacity:0.66;" cx="530" cy="158" r="158"/>
															</svg>
														</i>
													</div>
												</div>
												<?php else : ?>
												<?php endif; ?>
												