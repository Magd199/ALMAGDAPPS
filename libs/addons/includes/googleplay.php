<?php
if ( ! defined( 'ABSPATH' ) ) exit;
ini_set('display_errors','off');
include_once 'dom.php';
function wp_googleplay() {
    ?>
    <div class="play_menu" style="text-transform:uppercase">
        <b><?php echo esc_html__( 'Add sources from Google Play Store', 'apkmody' ); ?></b>
    </div>
    <?php
    if(isset($_POST['wp_sb'])) {
        if(isset($_POST['wp_url'])) {
            $url = trim(strip_tags($_POST['wp_url']));
            if(stristr($url, 'play.google.com')) {
                require_once 'googleplay.class.php';
                $getslinks = new getslinks;
                $gets_data = $getslinks->scrape_web_info($url, false);
                $title = $gets_data['title_GP'];
                $title = str_replace('Games for Free', '',  $title);
                $title = str_replace('', '',  $title);
                $title = str_replace(':', '',  $title);
                $title2 = sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                $title22 = sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP']));
                $judul = $gets_data['title_GP'];
                $title_id = $gets_data['title_id'];
                $title_GP_ID = $gets_data['GP_ID'];
                $version_GP_ID = $gets_data['version_GP'];
                $linkX = get_bloginfo('url'); $parse = parse_url($linkX); $watermark1 = $parse['host'];
                $intro1 = $gets_data['intro'];
                $intro2 = ''.$title.' is the most famous version in the <b><i>'.$gets_data['title'].'</i></b> series of publisher '.$gets_data['developers_GP'].'. What you would expect in a '.$gets_data['genres_GP'].' is available in this. In this mod, <span style="color: #FF0000;text-transform: capitalize!important;">'.trim(strip_tags($gets_data['mods'])).'</span>. With this mod, this '.$judul.' will be easy for you. Enjoy playing the <i>'.$gets_data['title'].'</i> <b><u><i>Download '.$judul.' Hack Apk Mod</i></u></b> now on <a href="'.$linkX.'">'.$watermark1.'</a>';
                $post_status = get_option('wp_post_status', 'draft');
                global $opt_themes;
                $post_statusX = $opt_themes['ex_themes_extractor_apk_status_post_'];
                $post_titlee = $opt_themes['ex_themes_extractor_apk_title_'];
                $permalink_titlee = $opt_themes['ex_themes_extractor_apk_permalink_'];
                if(count($gets_data) AND !isset($gets_data['error'])) {
                    $idX = $post->ID;
                    global $opt_themes;
                    ##########   Create post object
                    $my_post = array(
                        'post_title'    => ''.$gets_data['title_GP'].'',
                        'post_name' => ''.sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP'])).'',
                        /*'post_content'  => ''.$intro1.'<br><br>'.$gets_data['articlebody_GP'].'',*/
                        'post_content'  => ''.$gets_data['articlebody_GP'].'',
                        'post_status'   => $post_statusX, /* publish or draft */
                        /* 'post_author'   => 1, */
                        'post_category' => array($new_cat_ID),
                        'post_type' 	  => 'post'
                    );
                    ##########   Insert the post into the databxase
                    $post_id = wp_insert_post( $my_post );
                    ##########   Create genres
                    /**/
                    $genresapkgk = $gets_data['genres_GP'];
                    $terms = array();
                    foreach($genresapkgk as $term):
                        $t_exists = term_exists( $term, 'category' );
                        if( !$t_exists ):
                            $t = wp_insert_term( $term, 'category' );
                            $terms[] = $t['term_id'];
                        else:
                            $terms[] = $t_exists['term_id'];
                        endif;
                    endforeach;
                    //wp_set_post_terms( $post_id, $terms, 'genre' );
                    wp_set_post_terms( $post_id, $terms, 'category' );
                    ##########   add wp_GP_ID
                    $title_id = $gets_data['GP_ID'];
                    $language = $gets_data['languages'];
                    add_post_meta( $post_id, 'wp_GP_ID', $title_id );
                    add_post_meta( $post_id, 'DLPRO_playstoreID', $title_id );
                    ##########   add wp_GP_ID
                    $GP_ID = $gets_data['GP_ID'];
                    add_post_meta( $post_id, 'wp_GP_ID', $GP_ID );
                    ##########   add wp_title_GP
                    $name = $gets_data['title_GP'];
                    add_post_meta( $post_id, 'wp_title_GP', $name );
                    add_post_meta( $post_id, 'DLPRO_AppName', $name );
                    ##########   add images
                    $gambarX21 = $gets_data['images_GP'];
                    add_post_meta( $post_id, 'wp_images_GP', $gambarX21 );
                    ##########   add images
                    $postergp = $gets_data['poster_GP'];
                    add_post_meta( $post_id, 'wp_poster_GP', $postergp );
                    add_post_meta( $post_id, 'DLPRO_Posters', $postergp );
                    $postergp2 = $gets_data['poster_GP_2'];
                    add_post_meta( $post_id, 'wp_poster_GP_2', $postergp2 );
                    ##########   add youtube gambarX21
                    $youtube = $gets_data['youtube_GP'];
                    add_post_meta( $post_id, 'wp_youtube_GP', $youtube );
                    add_post_meta( $post_id, 'DLPRO_youtubes_ID', $youtube );
                    ##########   add categorie1
                    $categorie = $gets_data['genres_GP'];
                    add_post_meta( $post_id, 'wp_genres_GP', $categorie );
                    add_post_meta( $post_id, 'DLPRO_genres', $categorie );
                    /*
                    $categorie = $gets_data['kategori1'];
                    add_post_meta( $post_id, 'wp_categorie', $categorie );
                    wp_set_object_terms( $post_id, $categorie, 'category', true );
                    */
                    ##########   add genres
                    $genres = $gets_data['genres_GP'];
                    $paid1 = $gets_data['paid_GP2'];
                    add_post_meta( $post_id, 'wp_genres_GP', $genres );
                    wp_set_object_terms( $post_id, $genres, 'category', true );
                    wp_set_object_terms( $post_id, $paid1, 'category', true );
                    ##########   add wp_source_url
                    add_post_meta( $post_id, 'wp_source_url', $url );
                    ##########   add wp_title
                    $download = $gets_data['downloadlink'];
                    add_post_meta( $post_id, 'wp_downloadlink', $download );
                    ##########   add wp_title
                    $namedownload = $gets_data['namedownloadlink'];
                    add_post_meta( $post_id, 'wp_namedownloadlink', $namedownload );
                    ##########   add wp_title
                    $download2 = $gets_data['downloadlink2'];
                    add_post_meta( $post_id, 'wp_downloadlink2', $download2 );
                    ##########   add wp_title
                    $namedownload2 = $gets_data['namedownloadlink2'];
                    add_post_meta( $post_id, 'wp_namedownloadlink2', $namedownload2 );
                    ##########   add wp_title
                    $judul = $gets_data['title_GP'];
                    add_post_meta( $post_id, 'wp_title_GP', $judul );
                    ##########   add wp_title datos_informacion[version]
                    $version = $gets_data['version_GP'];
                    add_post_meta( $post_id, 'wp_version_GP', $version );
                    add_post_meta( $post_id, 'DLPRO_Version', $version );
                    wp_set_object_terms( $post_id, $version, 'wp_version_GP', true );
                    ##########   add wp_title datos_informacion[version]
                    $sizes = $gets_data['sizes'];
                    add_post_meta( $post_id, 'wp_sizes', $sizes );
                    add_post_meta( $post_id, 'DLPRO_Filesize', $sizes );
                    //wp_set_object_terms( $post_id, $sizes, 'wp_sizes', true );
                    ##########   add wp_title datos_informacion[version]
                    $sizes_GP = $gets_data['sizes_GP'];
                    add_post_meta( $post_id, 'wp_sizes_GP', $sizes_GP );
                    add_post_meta( $post_id, 'DLPRO_Filesize', $sizes_GP );
                    //add_post_meta( $post_id, 'wp_poster_GP_2', $postergp2 );

                    //wp_set_object_terms( $post_id, $sizes_GP, 'wp_sizes_GP', true );
                    #########   add whatnews
                    $whatnews = $gets_data['whatnews_GP'];
                    add_post_meta( $post_id, 'wp_whatnews_GP', $whatnews );
                    add_post_meta( $post_id, 'DLPRO_Whatsnews', $whatnews );
                    ##########   add developers
                    $developers = $gets_data['developers_GP'];
                    add_post_meta( $post_id, 'wp_developers_GP', $developers );
                    add_post_meta( $post_id, 'DLPRO_Developer', $developers );
                    wp_set_post_terms( $post_id, $developers, 'developer' );
                    wp_set_object_terms( $post_id, $developers, 'developer', true );
                    ##########   add developers
                    $developers2 = $gets_data['developers2_GP'];
                    add_post_meta( $post_id, 'wp_developers2_GP', $developers2, true );
                    ##########   add installs
                    $installs = $gets_data['installs_GP'];
                    add_post_meta( $post_id, 'wp_installs_GP', $installs );
                    add_post_meta( $post_id, 'DLPRO_totalinstalls', $installs );
                    ##########   add requires
                    $requires = $gets_data['requires_GP'];
                    add_post_meta( $post_id, 'wp_requires_GP', $requires );
                    add_post_meta( $post_id, 'DLPRO_Requires', $requires );
                    ##########   add updates
                    $updates = $gets_data['updates_GP'];
                    add_post_meta( $post_id, 'wp_updates_GP', $updates );
                    add_post_meta( $post_id, 'DLPRO_Updated', $updates );
                    ##########   add ratings
                    $ratings = $gets_data['ratings_GP'];
                    add_post_meta( $post_id, 'wp_ratings_GP', $ratings );
                    add_post_meta( $post_id, 'DLPRO_totalrating', $ratings );
                    ##########   add rated
                    $rated = $gets_data['rated_GP'];
                    add_post_meta( $post_id, 'wp_rated_GP', $rated );
                    add_post_meta( $post_id, 'DLPRO_voted', $rated );
                    ##########   add contentrated
                    $contentrated = $gets_data['contentrated_GP'];
                    add_post_meta( $post_id, 'wp_contentrated_GP', $contentrated );
                    add_post_meta( $post_id, 'DLPRO_contentrated', $contentrated );
                    ##########   add desck
                    $desck = $gets_data['desck_GP'];
                    add_post_meta( $post_id, 'wp_desck_GP', $desck );
                    add_post_meta( $post_id, 'DLPRO_deskbeforepost', $desck );
                    ##########   add comments
                    $comments = $gets_data['comments1'];
                    add_post_meta( $post_id, 'wp_comments1', $comments );
                    ##########   add articlebody
                    $articlebody = $gets_data['articlebody_GP'];
                    add_post_meta( $post_id, 'wp_articlebody_GP', $articlebody );
                    ##########   add modfeatures2
                    $modfeatures2 = $gets_data['mods'];
                    add_post_meta( $post_id, 'wp_mods', $modfeatures2 );
                    
                    ##########   add poster
                    $poster1 = $gets_data['poster3'];
                    $poster2 = $gets_data['posterx1'];
                    $poster3 = $gets_data['poster3'];
                    $poster = $poster1;
                    add_post_meta( $post_id, 'wp_poster', $poster );
                    add_post_meta( $post_id, 'wp_poster3', $poster3 );
                    add_post_meta( $post_id, 'wp_posterx1', $poster2 );
					
					
					$opt_themes; if($opt_themes['ex_themes_save_apk_']) {  					
					//$urlapk = $gets_data['downloadlink2'][0];
					$urlapk1 = $gets_data['downloadapkx3'];
                    $urlapk = array();
                    foreach($urlapk1 as $term):
                        $urlapk_exists = $gets_data['downloadapkx3'];                         
                    endforeach;

					$nameapk = $gets_data['namedownloadapkx3'][0];
					$nameapks = sanitize_title_with_dashes(ex_themes_clean($gets_data['namedownloadapk3']));
					$uploaddirapk = wp_upload_dir();
                    $full = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					$domen = str_replace(['https://','http://'],'',home_url());
					$domen = explode('/',$domen)[0];
					$domen2 = str_replace(['https://','http://'],'',get_the_permalink($post->ID)); 
					$filenameapk = $domen.'_'.$nameapks.'_'.$nameapk.'';
 					$uploadfileapk = $uploaddirapk['path'] . '/' . $filenameapk;
					if( !file_exists($uploadfileapk) ) {
						$contentsapk= file_get_contents($urlapk);
						$savefileapk = fopen($uploadfileapk, 'w');
						fwrite($savefileapk, $contentsapk);
						fclose($savefileapk);
					}
					$wp_filetypeapk = wp_check_filetype(basename($filenameapk), null );
					$attachmentapk = array(
						'post_mime_type' => $wp_filetypeapk['type'],
						'post_title' => $filenameapk,
						'post_content' => '',
						'post_status' => 'inherit'
					);
					wp_insert_attachment( $attachmentapk, $uploadfileapk, $post_id );
					$wp_downloadlink = get_post_meta( $post_id, 'wp_downloadlink2', true );
					$wp_downloadlink2 = $uploaddirapk['url']."/".$filenameapk;
                    /*
					$datos_download = get_post_meta( $post_id, 'datos_download', true );
					$datos_download = ( !empty($datos_download) ) ? $datos_download : array(); 
					$datos_download['option'] = 'direct-download';
					$datos_download['direct-download'] = $uploaddirapk['url']."/".$filenameapk;
					*/
					$datos_downloadX = $uploaddirapk['url']."/".$filenameapk;
					add_post_meta( $post_id, 'wp_downloadlink2', $wp_downloadlink2 );
					update_post_meta( $post_id, 'wp_downloadlink2', $wp_downloadlink2 ); 
					}
					
					
					
                    ##########   Upload poster
                    $image_url = $gets_data['poster_GP'];
                    $image = $gets_data['poster_GP'];
                    $image_url2 = $gets_data['poster_GP_2'];
                    $image2 = $gets_data['poster_GP_2'];
					$title_PS = sanitize_title_with_dashes(ex_themes_clean($gets_data['title_GP']));
                    $title_Sources = sanitize_title_with_dashes(ex_themes_clean($gets_data['title']));
                    $uploaddir = wp_upload_dir();
                    $filename = "download-{$title_PS}.png";
                    $uploadfile = $uploaddir['path'] . '/' . $filename;
                    $contents= file_get_contents($image);
                    $savefile = fopen($uploadfile, 'w');
                    fwrite($savefile, $contents);
                    fclose($savefile);
                    $wp_filetype = wp_check_filetype(basename($filename), null );
                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title' => $filename,
                        'post_content' => '',
                        'post_status' => 'inherit'
                    );
                    $attach_id = wp_insert_attachment( $attachment, $uploadfile );
                    require_once(ABSPATH . 'wp-admin/includes/image.php');
                    $attach_data = wp_generate_attachment_metadata( $attach_id, $uploadfile );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                    set_post_thumbnail( $post_id, $attach_id );
                     
                    ##########   add tag  $gets_data['version_GP']
                    $tags = array(''.$gets_data['title_GP'].' '.$gets_data['version_GP'].',');
                    wp_set_object_terms( $post_id, $gets_data['genres_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['title_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $gets_data['developers_GP'], 'post_tag', true );
                    wp_set_object_terms( $post_id, $modsX, 'post_tag', true );
                    wp_set_object_terms( $post_id, $mods, 'post_tag', true );
                    wp_set_object_terms( $post_id, $tags, 'post_tag', true );
                    if ($post_id)
											$urlX = get_post_permalink( $post_id, $leavename, $sample );
										require_once 'result.php';
										require_once 'debug.php';
                }
            }else{
                echo '<div class="play_menu" style="text-transform:uppercase!important;color:#00a0d2"><h3 style="color:#00a0d2">Please check your link.. your link is <b style="color:red">'.$url.'</b></h3></div>';
            }
        }
    }
    ?>
    
    <?php get_template_part(addscriptx); ?>
    <div class="wrap">
        <div class="play_fixedx play_menu" id="play_fixed" style="margin-bottom: 10px;">
            <div class="play_search">
                &nbsp;  &nbsp;
                &nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;
            </div>
            <ul class="play_menus" style="text-transform:capitalize">
                <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-home"></i> Home</a></li>
                <li><a data-toggle="tab" href="#menu1"><i class="fa fa-rss"></i> Latest Post Games</a></li>
                <li><a data-toggle="tab" href="#menu2"><i class="fa fa-rss"></i> Latest Post Apps</a></li>
                <li><a data-toggle="tab" href="#menu3"><i class="fa fa-rss"></i> Top Charts</a></li>
                <li><a data-toggle="tab" href="#menu4"><i class="fa fa-rss"></i> Recommended for you</a></li>
                <li><a data-toggle="tab" href="#menu5"><i class="fa fa-rss"></i> add Manual</a></li>
                <li><a href='admin.php?page=<?php echo options_setting; ?>'><i class="fa fa-cogs"></i> Setting</a></li>
               
            </ul>
            <div style="clear:both"></div>
        </div>
    </div>
    <div class="containerX">
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <ul class="play_menu" >
				 <li> <?php global $opt_themes; 
						$post_statusX = $opt_themes['ex_themes_extractor_apk_status_post_']; ?>
                        Your Status Post is <?php global $opt_themes; $wp_post_status12 = $opt_themes['ex_themes_extractor_apk_status_post_']; if($wp_post_status12 != 'draft') { ?>
                            <blink><strong class="blink blink-one" style="color:green"><?php echo $wp_post_status12; ?></strong></blink> You ready to Make auto posting now
                        <?php } else { ?><blink><strong class="blink blink-one" style="color:red"><?php echo $wp_post_status12; ?></strong></blink>. Please Change to <blink><strong class="blink" style="color:green">publish</strong></blink>
                            to make Auto Posting,  you can go to Setting Page <?php } ?>
                    </li>   
                </ul>
            </div>
			
            <div id="menu1" class="tab-pane fade">
               <div class="play_menu" style="text-transform:uppercase">
				<b>Latest Post Game</b>
				</div>
             
                    <?php
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');                        
                    $host = ''.$_SERVER['HTTP_HOST'].'';
                    $host2 = $host;
                    $host3 = $host;
                    $grab = 'https://play.google.com/store/apps/collection/cluster?clp=SjAKKgokcHJvbW90aW9uXzMwMDA3OTFfbmV3X3JlbGVhc2VzX2dhbWVzEEoYAzoCCAE%3D:S:ANO1ljIvgTM&gsr=CjJKMAoqCiRwcm9tb3Rpb25fMzAwMDc5MV9uZXdfcmVsZWFzZXNfZ2FtZXMQShgDOgIIAQ%3D%3D:S:ANO1ljJBvBg'; 
                    $target1 = 'https://play.google.com';
                    $target2 = 'play.google.com';

                    $gps =  file_get_contents($grab, false, stream_context_create($ssl)); 
                    $idgps =  file_get_contents($grab, false, stream_context_create($ssl)); 

                    $gps =  str_ireplace('/store/apps/', $target1.'/store/apps/', $gps);  

                    $gps =  preg_replace('#<script.*?>(.*?)</script>#si', ' ', $gps); 
                    $gps =  preg_replace('#<div id="ZCHFDb" class="y089Ob">(.*?)</body>#si', ' ', $gps); 

                    $gps =  preg_replace('#<meta.*?>#si', ' ', $gps); 
                    $gps =  preg_replace('#<link.*?>#si', ' ', $gps); 
                    $gps =  preg_replace('#<base.*?>#si', ' ', $gps); 
                    $gps =  preg_replace('#<div.+?jsaction="rcuQ6b:Rayp9d;">(.*?)<div aria-labelledby="main-title" class="id-body-content-beginning" tabindex="-1"></div>#si', ' ', $gps);
                    $gps = preg_replace('/<div class="Z3lOXb"><div class="xwY9Zc">.+?<\/h2><\/div><\/div>/i', '', $gps); 
                    $gps =  str_ireplace('data-src=', 'src=', $gps); 
                    $gps =  preg_replace('#<div class="wXUyZd">(.*?)</div>#si', '<div class="wXUyZd"></div>', $gps); 
                    $gps =  str_ireplace('WpDbMd', 'contents', $gps); 
                    $gps =  str_ireplace('ZmHEEd  fLyRuc', 'contents', $gps); 
                    $gps =  str_ireplace('<div class="kCSSQe">', '<div class="kCSSQe" style="text-align: center;">', $gps); 
                    $gps =  str_ireplace('kCSSQe', 'kCSSQe style="text-align: center;"', $gps); 
                    $gps =  str_ireplace('N4FjMb ', 'tables168', $gps); 


                    $gps =  preg_replace('#<div class="b8cIId ReQCgd KoLSrc">.*?<div class="KoLSrc">.*?</div></a><div class="cqtbn"></div></div>#si', '', $gps);   

                    $gps =  preg_replace('#<div class="b8cIId ReQCgd Q9MA7b"><a href="(.*?)"><div class="WsMG1c nnK0zc".*?>(.*?)</div></a><div class="cqtbn"></div></div>#si', '<div class="b8cIId ReQCgd Q9MA7b"><a href="$1" title="$2"><div class="WsMG1c nnK0zc".*?>$2</div></a><div class="cqtbn"></div></div><form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="$1"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="Post Now" /></form>', $gps);   
                      

                    echo '<center>'; 
                    echo $gps;
                    echo '</center>'; 
                    ?>
               
            </div>
			
            <div id="menu2" class="tab-pane fade">
                <div class="play_menu" style="text-transform:uppercase">
				<b>Latest Post Apps</b>
				</div>            
                
                    <?php
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');                        
                    $host = ''.$_SERVER['HTTP_HOST'].'';
                    $host2 = $host;
                    $host3 = $host;
                    $source = 'https://play.google.com/store/apps/collection/cluster?clp=0g4nCiUKH3RvcHNlbGxpbmdfbmV3X2ZyZWVfQVBQTElDQVRJT04QBxgD:S:ANO1ljL46gk&gsr=CirSDicKJQofdG9wc2VsbGluZ19uZXdfZnJlZV9BUFBMSUNBVElPThAHGAM=:S:ANO1ljLDC_Y'; 
                    $target1 = 'https://play.google.com';
                    $target2 = 'play.google.com';

                    $gps_apps =  file_get_contents($source, false, stream_context_create($ssl)); 
                    $gps_apps =  str_ireplace('/store/apps/', $target1.'/store/apps/', $gps_apps);  

                    $gps_apps =  preg_replace('#<script.*?>(.*?)</script>#si', ' ', $gps_apps); 
                    $gps_apps =  preg_replace('#<div id="ZCHFDb" class="y089Ob">(.*?)</body>#si', ' ', $gps_apps); 

                    $gps_apps =  preg_replace('#<meta.*?>#si', ' ', $gps_apps); 
                    $gps_apps =  preg_replace('#<link.*?>#si', ' ', $gps_apps); 
                    $gps_apps =  preg_replace('#<base.*?>#si', ' ', $gps_apps); 
                    $gps_apps =  preg_replace('#<div.+?jsaction="rcuQ6b:Rayp9d;">(.*?)<div aria-labelledby="main-title" class="id-body-content-beginning" tabindex="-1"></div>#si', ' ', $gps_apps);
                    $gps_apps = preg_replace('/<div class="Z3lOXb"><div class="xwY9Zc">.+?<\/h2><\/div><\/div>/i', '', $gps_apps); 
                    $gps_apps =  str_ireplace('data-src=', 'src=', $gps_apps); 
                    $gps_apps =  preg_replace('#<div class="wXUyZd">(.*?)</div>#si', '<div class="wXUyZd"></div>', $gps_apps); 
                    $gps_apps =  str_ireplace('WpDbMd', 'contents', $gps_apps); 
                    $gps_apps =  str_ireplace('ZmHEEd  fLyRuc', 'contents', $gps_apps); 
                    $gps_apps =  str_ireplace('<div class="kCSSQe">', '<div class="kCSSQe" style="text-align: center;">', $gps_apps); 
                    $gps_apps =  str_ireplace('kCSSQe', 'kCSSQe style="text-align: center;"', $gps_apps); 
                    $gps_apps =  str_ireplace('N4FjMb ', 'tables168', $gps_apps); 


                    $gps_apps =  preg_replace('#<div class="b8cIId ReQCgd KoLSrc">.*?<div class="KoLSrc">.*?</div></a><div class="cqtbn"></div></div>#si', '', $gps_apps);   

                    $gps_apps =  preg_replace('#<div class="b8cIId ReQCgd Q9MA7b"><a href="(.*?)"><div class="WsMG1c nnK0zc".*?>(.*?)</div></a><div class="cqtbn"></div></div>#si', '<div class="b8cIId ReQCgd Q9MA7b"><a href="$1" title="$2"><div class="WsMG1c nnK0zc".*?>$2</div></a><div class="cqtbn"></div></div><form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="$1"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="Post Now" /></form>', $gps_apps);   
                      

                    echo '<center>'; 
                    echo $gps_apps;
                    echo '</center>'; 
                    ?>
					
					
            </div>
			
            <div id="menu3" class="tab-pane fade">
               <div class="play_menu" style="text-transform:uppercase">
				<b>Top Charts</b>
				</div>
             
             
                
                    <?php
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');                        
                    $host = ''.$_SERVER['HTTP_HOST'].'';
                    $host2 = $host;
                    $host3 = $host;
                    $source = 'https://play.google.com/store/apps/top'; 
                    $target1 = 'https://play.google.com';
                    $target2 = 'play.google.com';

                    $gps_tops =  file_get_contents($source, false, stream_context_create($ssl)); 
                    $gps_tops =  str_ireplace('/store/apps/', $target1.'/store/apps/', $gps_tops);  

                    $gps_tops =  preg_replace('#<script.*?>(.*?)</script>#si', ' ', $gps_tops); 
                    $gps_tops =  preg_replace('#<div id="ZCHFDb" class="y089Ob">(.*?)</body>#si', ' ', $gps_tops); 

                    $gps_tops =  preg_replace('#<meta.*?>#si', ' ', $gps_tops); 
                    $gps_tops =  preg_replace('#<link.*?>#si', ' ', $gps_tops); 
                    $gps_tops =  preg_replace('#<base.*?>#si', ' ', $gps_tops); 
                    $gps_tops =  preg_replace('#<div.+?jsaction="rcuQ6b:Rayp9d;">(.*?)<div aria-labelledby="main-title" class="id-body-content-beginning" tabindex="-1"></div>#si', ' ', $gps_tops);
                    $gps_tops = preg_replace('/<div class="Z3lOXb"><div class="xwY9Zc">.+?<\/h2><\/div><\/div>/i', '', $gps_tops); 
                    $gps_tops =  str_ireplace('data-src=', 'src=', $gps_tops); 
                    $gps_tops =  preg_replace('#<div class="wXUyZd">(.*?)</div>#si', '<div class="wXUyZd"></div>', $gps_tops); 
                    $gps_tops =  str_ireplace('WpDbMd', 'contents', $gps_tops); 
                    $gps_tops =  str_ireplace('ZmHEEd  fLyRuc', 'contents', $gps_tops); 
                    $gps_tops =  str_ireplace('<div class="kCSSQe">', '<div class="kCSSQe" style="text-align: center;">', $gps_tops); 
                    $gps_tops =  str_ireplace('kCSSQe', 'kCSSQe style="text-align: center;"', $gps_tops); 
                    $gps_tops =  str_ireplace('N4FjMb ', 'tables168', $gps_tops); 


                    $gps_tops =  preg_replace('#<div class="b8cIId ReQCgd KoLSrc">.*?<div class="KoLSrc">.*?</div></a><div class="cqtbn"></div></div>#si', '', $gps_tops);   

                    $gps_tops =  preg_replace('#<div class="b8cIId ReQCgd Q9MA7b"><a href="(.*?)"><div class="WsMG1c nnK0zc".*?>(.*?)</div></a><div class="cqtbn"></div></div>#si', '<div class="b8cIId ReQCgd Q9MA7b"><a href="$1" title="$2"><div class="WsMG1c nnK0zc".*?>$2</div></a><div class="cqtbn"></div></div><form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="$1"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="Post Now" /></form>', $gps_tops);   
                      

                    echo '<center>'; 
                    echo $gps_tops;
                    echo '</center>'; 
                    ?>
					
					
            </div>
            <div id="menu4" class="tab-pane fade">
               <div class="play_menu" style="text-transform:uppercase">
				<b>Recommended for you</b>
				</div>
             
            
                
                    <?php
					require_once 'ssl.php';
                    @ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)');                        
                    $host = ''.$_SERVER['HTTP_HOST'].'';
                    $host2 = $host;
                    $host3 = $host;
                    $source = 'https://play.google.com/store/apps/collection/cluster?clp=ogoQCAESBEdBTUUqAggCUgIIAQ%3D%3D:S:ANO1ljJlEdM&gsr=ChOiChAIARIER0FNRSoCCAJSAggB:S:ANO1ljJdubc'; 
                    $target1 = 'https://play.google.com';
                    $target2 = 'play.google.com';

                    $gps_rekoms =  file_get_contents($source, false, stream_context_create($ssl)); 
                    $gps_rekoms =  str_ireplace('/store/apps/', $target1.'/store/apps/', $gps_rekoms);  

                    $gps_rekoms =  preg_replace('#<script.*?>(.*?)</script>#si', ' ', $gps_rekoms); 
                    $gps_rekoms =  preg_replace('#<div id="ZCHFDb" class="y089Ob">(.*?)</body>#si', ' ', $gps_rekoms); 

                    $gps_rekoms =  preg_replace('#<meta.*?>#si', ' ', $gps_rekoms); 
                    $gps_rekoms =  preg_replace('#<link.*?>#si', ' ', $gps_rekoms); 
                    $gps_rekoms =  preg_replace('#<base.*?>#si', ' ', $gps_rekoms); 
                    $gps_rekoms =  preg_replace('#<div.+?jsaction="rcuQ6b:Rayp9d;">(.*?)<div aria-labelledby="main-title" class="id-body-content-beginning" tabindex="-1"></div>#si', ' ', $gps_rekoms);
                    $gps_rekoms = preg_replace('/<div class="Z3lOXb"><div class="xwY9Zc">.+?<\/h2><\/div><\/div>/i', '', $gps_rekoms); 
                    $gps_rekoms =  str_ireplace('data-src=', 'src=', $gps_rekoms); 
                    $gps_rekoms =  preg_replace('#<div class="wXUyZd">(.*?)</div>#si', '<div class="wXUyZd"></div>', $gps_rekoms); 
                    $gps_rekoms =  str_ireplace('WpDbMd', 'contents', $gps_rekoms); 
                    $gps_rekoms =  str_ireplace('ZmHEEd  fLyRuc', 'contents', $gps_rekoms); 
                    $gps_rekoms =  str_ireplace('<div class="kCSSQe">', '<div class="kCSSQe" style="text-align: center;">', $gps_rekoms); 
                    $gps_rekoms =  str_ireplace('kCSSQe', 'kCSSQe style="text-align: center;"', $gps_rekoms); 
                    $gps_rekoms =  str_ireplace('N4FjMb ', 'tables168', $gps_rekoms); 


                    $gps_rekoms =  preg_replace('#<div class="b8cIId ReQCgd KoLSrc">.*?<div class="KoLSrc">.*?</div></a><div class="cqtbn"></div></div>#si', '', $gps_rekoms);   

                    $gps_rekoms =  preg_replace('#<div class="b8cIId ReQCgd Q9MA7b"><a href="(.*?)"><div class="WsMG1c nnK0zc".*?>(.*?)</div></a><div class="cqtbn"></div></div>#si', '<div class="b8cIId ReQCgd Q9MA7b"><a href="$1" title="$2"><div class="WsMG1c nnK0zc".*?>$2</div></a><div class="cqtbn"></div></div><form name="myForm" id="myForm" method="POST"><input style="display:none" type="text" name="wp_url" value="$1"  /><input type="submit" id="Submit" name="wp_sb" class="button-primary abe2" value="Post Now" /></form>', $gps_rekoms);   
                      

                    echo '<center>'; 
                    echo $gps_rekoms;
                    echo '</center>'; 
                    ?>
					
					
            </div>
			
			<div id="menu5" class="tab-pane fade">
               <div class="play_menu" style="text-transform:uppercase">
				<b>Add manual</b>
				</div>
				<div class="play_menu" style="text-transform:uppercase">
                <ol style="paddiing-right: 20px !important;margin: 20px;">
                    <li>Open website <a style="color:#1e73be" href="https://play.google.com/store/apps/collection/cluster?clp=SjAKKgokcHJvbW90aW9uXzMwMDA3OTFfbmV3X3JlbGVhc2VzX2dhbWVzEEoYAzoCCAE%3D:S:ANO1ljIvgTM&gsr=CjJKMAoqCiRwcm9tb3Rpb25fMzAwMDc5MV9uZXdfcmVsZWFzZXNfZ2FtZXMQShgDOgIIAQ%3D%3D:S:ANO1ljJBvBg" target="_blank">New Games</a></li>
                    <li>Open website <a style="color:#1e73be" href="https://play.google.com/store/apps/collection/cluster?clp=0g4nCiUKH3RvcHNlbGxpbmdfbmV3X2ZyZWVfQVBQTElDQVRJT04QBxgD:S:ANO1ljL46gk&gsr=CirSDicKJQofdG9wc2VsbGluZ19uZXdfZnJlZV9BUFBMSUNBVElPThAHGAM=:S:ANO1ljLDC_Y" target="_blank">New Apps </a></li>
                    <li>Copy link post and paste to form</li>
                    <li>use the url into this format:  <strong style="color:#1e73be;text-transform:lowercase!important">https://play.google.com/store/apps/details?id=com.emoji.maker.faces.keyboard.emoticons</strong> </li>
                </ol>				
				</div>
				<div class="play_menu" >
				<b>Paste your link post here</b>
				</div>
           <div class="play_menu" >
        <form name="myForm" id="myForm" method="POST">
            <input class="apkextractor" type="text" name="wp_url" placeholder="example : https://play.google.com/store/apps/details?id=com.emoji.maker.faces.keyboard.emoticons" onkeypress="this.style.width =((this.value.length + 1) * 8) + 'px';" >
            <input type="submit" id="Submit" name="wp_sb" class="button-primary" value="<?php echo postnow2 ?>" />
        </form>
   </div>
		 
			</div>
        </div>
    </div>
    <div style="clear:both"></div>
 

<?php get_template_part(footerx); ?>
<?php } 