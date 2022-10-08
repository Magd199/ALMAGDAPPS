<?php
/* 
Template Name: Template - Changelogs
*/ 
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
    <style>
        #px-changelog .last-changelog{border-top:2px dashed #CCC;border-bottom:2px dashed #CCC}#px-changelog .alert{display:inline-block;padding:0 5px;border-radius:3px;font-size:11px;border:1px solid;margin:4px 10px 4px 0;min-width:85px;text-align:center}#px-changelog ul{margin:0;padding:0;margin-top:20px}#px-changelog ul li{width:auto;margin-bottom:9px;list-style:none;padding-left:130px;position:relative;text-transform:capitalize}#px-changelog .chl-release,#px-changelog .chl-error-fixed,#px-changelog .chl-fixed,#px-changelog .chl-remove,#px-changelog .chl-add{display:inline-block;border-radius:2px;-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;padding:0 9px;margin-right:10px;color:#FFF;font-size:12px;min-width:100px;text-align:center;height:22px;position:absolute;left:0;border:1px solid;font-weight:bold}#px-changelog .chl-add{border-color:#59b859;color:#59b859}#px-changelog .chl-fixed{border-color:steelblue;color:blue}#px-changelog .chl-remove{border-color:crimson;color:crimson}#px-changelog .chl-release{color:#3a87ad;background-color:#d9edf7;border-color:#bce8f1}
    </style>
    <div class="wrp-min speedbar">
        <div class="speedbar-panel">
            <?php if (function_exists('breadcrumbsX')) breadcrumbsX(); ?>
        </div>
    </div>
    <div id="dle-content">
        <div class="wrp-min block-list">
            <div class="block static-page">
                <div class="b-cont">
                    <h1 class="title"><?php the_title(); ?></h1>
                    <div class="text">
                       <div id="px-changelog">
    <h1> <?php the_title(); ?> - Theme 5play</h1>
    <div class="last-changelog">
    <h2 style="color: red;background-color: ghostwhite;">Infos</h2>
	<p style="color: crimson;background-color: ghostwhite;"> Please back up your theme when you are done customizing your theme, as errors in your themes are not the responsibility of the developers</strong>. if you got errors, Please ReDownload <?php echo THEMES_NAMES; ?> themes and upload for manual on <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank">member area</a> For Manual Upload</p>	
	 
	
	<h2>Upgrade</h2>
	NOTE: If you have directly made changes to the files, the update will overwrite these changes. So, we recommend that you DO NOT make changes in this way. Alternatively you can use plugins that allow adding CSS, however we do not guarantee that the 'classes' or 'id' will change in future updates.
	
	<h2>Manual update</h2>
	Before updating anything, make sure you have backups.<br>
	<ol>
		<li>Download the theme by logging into your account <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank" rel="noopener">login</a> and <a href="<?php echo EXTHEMES_HOW_TO; ?>" target="_blank" rel="noopener">see my license key</a></li>
		<li>Unzip the <strong>'<?php echo THEMES_NAMES; ?>'</strong> theme file.</li>
		<li>From your FTP account, replace all files within the <strong>'<?php echo THEMES_NAMES; ?>'</strong> folder found in the 'wp-content' directory. </li>
	</ol>
	
	<h2>Whats is Changes</h2>
	
	<h3>v3.4 &#8211; 6/05/2022</h3>
	<ul> 	  
		<li><span class="chl-remove">remove</span> "news" slug from news post </li>   
	</ul>
	
	
	<h3>v3.3 &#8211; 4/05/2022</h3>
	<ul> 	  
		<li><span class="chl-fixed">fixed</span> apk extractor sources apkdown </li>  		 	  	 
		<li><span class="chl-add">adding</span> new apk extractor sources from apk-store and modcombo</li>	 
 		<li><span class="chl-add">adding</span> new colors options for svg </li>  
		<li><span class="chl-fixed">fixed</span> small issues </li>  
	</ul>
	
	
	<h3>v3.2 &#8211; 27/04/2022</h3>
	<ul> 
 		<li><span class="chl-add">adding</span> on off setting for app names titles </li>  
 		<li><span class="chl-add">adding</span> on off setting for showing latest post on homes </li>  
 		<li><span class="chl-add">adding</span> setting for popular pages by popular range daily, weekly, Mountly, and Yearly </li>	 
 		<li><span class="chl-fixed">fixed</span> issues css styles and rtl styles</li>  
	</ul>
	
	<h3>v3.1 &#8211; 21/04/2022</h3>
	<ul> 
 		<li><span class="chl-fixed">fixed</span> apk extractor for sources getmodsapk.com </li>  
	</ul>
	
	<h3>v3.0 &#8211; 10/04/2022</h3>
	<ul> 
 		<li><span class="chl-fixed">fixed</span> featured image not showing </li>  
	</ul>
	
	<h3>v2.9 &#8211; 2/04/2022</h3>
	<ul>
 		<li><span class="chl-remove">remove</span> getmodsapk sources from apk extractor </li>  
 		<li><span class="chl-fixed">fixed</span> css style and small issue </li> 
 		<li><span class="chl-add">add</span> box background images post </li> 
 		<li><span class="chl-add">add</span> new color options themes </li> 

	</ul>
	
	<h3>v2.8 &#8211; 13/03/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> apk extractor </li>  

	</ul>
	
	<h3>v2.7 &#8211; 10/02/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> apk extractor sources getmodsapk.com</li> 
 		<li><span class="chl-fixed">fixed</span> showing list comments for only approve on widget comments. </li> 

	</ul>
	
	<h3>v2.6 &#8211; 27/01/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> date updates apk info extractor</li> 

	</ul>
	
	<h3>v2.5 &#8211; 27/01/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> styles for rtl mode</li>  
 		<li><span class="chl-add">add</span> your own number for rtl modes</li>  
 		<li><span class="chl-fixed">fixed</span> apk extractor apkdownload.cc</li>  
 		<li><span class="chl-add">add</span> new sources apk extractor getmodsapk.com</li>  

	</ul>
	
	
		<h3>v2.4 &#8211; 12/01/2022</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> small bugs</li>  
 		<li><span class="chl-fixed">fixed</span> sitemap erros</li>  
 		<li><span class="chl-fixed">fixed</span> apk extractor sources happymod</li>  

	</ul>
	
	<h3>v2.3 &#8211; 09/12/2021</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> small bugs</li>  
 		<li><span class="chl-add">add</span> hidden download link, (no link show on mouse hover) </li>  

	</ul>
		<h3>v2.2 &#8211; 08/11/2021</h3>
	<ul>
 		<li><span class="chl-fixed">fixed</span> widget popular home not showing</li>  

	</ul>
		<h3>v2.1 &#8211; 28/10/2021</h3>
	<ul>
 		<li><span class="chl-remove">remove</span> virus warning</li>  

	</ul>
		<h3>v2.0 &#8211; 25/10/2021</h3>
	<ul>
		<li><span class="chl-add">add</span> Support php version 8, now apk extractor version is 8.0</li> 
		<li><span class="chl-fixed">fixed</span> small warning in php 8</li> 
		<li><span class="chl-add">add</span> most post by developers</li>  

	</ul>
        <h3>v1.9 &#8211; 30/09/2021</h3>
        <ul>          
        <li><span class="chl-fixed">fixing</span> apk extractor </li>
        </ul>
        <h3>v1.8 &#8211; 28/07/2021</h3>
        <ul>          
        <li><span class="chl-fixed">fixing</span> apk extractor </li>
        <li><span class="chl-add">adding</span> sources apk extractor rajaapk </li> 
        </ul>
        
        <h3>v1.7 &#8211; 28/06/2021</h3>
        <ul> 
            <li><span class="chl-add">adding</span> Languages for apk extractor </li> 
        </ul>

        <h3>v1.6 &#8211; 25/06/2021</h3>
        <ul> 
            <li><span class="chl-fixed">fixed</span> schemes MobileApplication rating using kk stars rating plugins</li> 
        </ul>

        
        <h3>v1.5 &#8211; 15/06/2021</h3>
        <ul>
          
            <li><span class="chl-fixed">fixed</span> download link box</li>
            <li><span class="chl-fixed">fixed</span> schemes MobileApplication rating </li>
            <li><span class="chl-add">adding</span> enable on off schemes seo </li>
            <li><span class="chl-add">adding</span> changes languange options </li>
        </ul>

        
        <h3>v1.4 &#8211; 29/05/2021</h3>
        <ul>
          
            <li><span class="chl-add">adding</span> RTL Supports</li>
        </ul>

        <h3>v1.3 &#8211; 26/05/2021</h3>
        <ul>
            <li><span class="chl-fixed">Fixed</span> no image extractor apk source from apkdownload.cc</li>
            <li><span class="chl-fixed">Fixed</span> button report</li>
            <li><span class="chl-add">adding</span> new extractor to post editor</li>
        </ul>

        <h3>v1.2 &#8211; 08/05/2021</h3>
        <ul>
            <li><span class="chl-remove">Remove</span> Masking Link</li>
            <li><span class="chl-add">adding</span> for report system</li>
            <li><span class="chl-fixed">Fixed</span> for bugs</li>
        </ul>

        <h3>v1.1 &#8211; 28/04/2021</h3>
        <ul>
            <li><span class="chl-fixed">Fixed</span> turn on off for Thumbnails for original size</li>
            <li><span class="chl-fixed">Fixed</span> for bugs</li>
        </ul>

        <h3>v1.0 &#8211; 28/04/2021</h3>
        <ul> 
            <li><span class="chl-release">Release</span> First Release</li>
        </ul>

        <p>More information: <a href="https://exthem.es/item/5play-themes-premium/" target="_blank" rel="noopener">https://exthem.es/item/5play-themes-premium/</a></p>

    </div>

   
</div>
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php get_footer(); 