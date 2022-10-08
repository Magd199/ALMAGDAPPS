<div id="debug" >
 
<?php
if ($gets_data) {  
global $opt_themes;  
$urlX							= $url;
$parse							= parse_url($urlX);
$urlX1							= preg_replace("/^([a-zA-Z0-9].*\.)?([a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z.]{2,})$/", '$2', $parse['host']);
$language						= $opt_themes['ex_themes_extractor_apk_language_']; 
$arr['languages']				= $language;	 
?>

<div class="play_menu">
	<h3 style="color:#2cc58d;text-align: center;font-size: x-large!important;">
		Showing Debug "<i style="color: blue;"><?php print_r( $gets_data['title_GP']) ?></i>" from <b style="text-transform:uppercase!important;"><a href='<?php echo $url; ?>' target="_blank"  style="text-transform:uppercase!important;color: blue;"><?php echo $urlX1; ?></a></b>
	</h3>
</div>
<style>
th.has-text-align-left {text-transform: capitalize;}
</style>
<div style="clear:both"></div>   
<?php print_r( $gets_data['mods_alt']) ?>

<br>
 <?php print_r( $gets_data['mods_alt'][0]) ?>
<noscript>
 
<?php print_r( $gets_data['download_links_page']) ?>
<br>
 <?php print_r( $gets_data['downloadlinks_gma']) ?>
<br>
 <?php print_r( $gets_data['namedownloadlink2']) ?>
<br>
 <?php print_r( $gets_data['downloadlinks_gma']) ?>
<br>
 <?php print_r( $gets_data['namedownloadlink']) ?>
<br>
 <?php print_r( $gets_data['sizedownloadlink2']) ?>
<br>
 <?php print_r( $gets_data['typedownloadlink2']) ?>
<br>
 <?php print_r( $gets_data['testtes']) ?>
</noscript>
<figure class="wp-block-table play_menu">
	<table class="has-fixed-layout app-box-info">
		<tbody>
		
			<?php
			if ($gets_data['download_links_page']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					download link page
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['download_links_page']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['title_GP']) ?>
				</td>
			</tr>
			<?php
			if ($gets_data['title']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['title']) ?>
				</td>
			</tr>
			<?php } ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					ID
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<a href="https://play.google.com/store/apps/details?id=<?php print_r( $gets_data['GP_ID']) ?>&hl=<?php echo $language; ?>" rel="noopener" target="_blank">
						<?php print_r( $gets_data['GP_ID']) ?>
					</a>
				</td>
			</tr>
			<?php
			if ($gets_data['youtube_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Youtube id
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<a href='https://www.youtube.com/watch?v=<?php print_r( $gets_data['youtube_GP']) ?>' target='_blank'><?php print_r( $gets_data['youtube_GP']) ?></a>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['mods']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Short Mod
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['mods']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['mods_alt_desc']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Full Mod
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left">
					<?php print_r( $gets_data['mods_alt_desc']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Genre
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['genres_GP']) ?>
				</td>
			</tr>
			<?php
			if ($gets_data['version']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Version
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['version']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Version
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['version_GP']) ?>
				</td>
			</tr>
			<?php
			if ($gets_data['sizes_sources']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['sizes_sources']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['sizes_GP']) ?>
				</td>
			</tr>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Developers
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['developers_GP']) ?>
				</td>
			</tr>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					total Installs
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['installs_GP']) ?>
				</td>
			</tr>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					date Updates
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['updates_GP']) ?>
				</td>
			</tr>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					android Requires
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['requires_GP']) ?>
				</td>
			</tr>
			<?php
			if ($gets_data['contentrated_GP']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Concentrated
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['contentrated_GP']) ?>
				</td>
			</tr>
			<?php } ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Rate
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['rated_GP']) ?>
				</td>
			</tr>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Rating
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['ratings_GP']) ?>
				</td>
			</tr>
			<?php
			if ($gets_data['paid_GP1']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Paid 1
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['paid_GP1']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['paid_GP2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Paid 2
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['paid_GP2']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['downloadlink']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>

			
			<?php
			if ($gets_data['downloadlinks_gma']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link Gma
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlinks_gma']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			 
			<?php
			if ($gets_data['name_downloadlinks_gma']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Link Gma
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['name_downloadlinks_gma']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			 
			<?php
			if ($gets_data['size_downloadlinks_gma']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size Download Link Gma
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['size_downloadlinks_gma']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			
			<?php
			if ($gets_data['downloadlink_gma']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					 Download Link Gma Alt
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink_gma']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			 
			 
			<?php
			if ($gets_data['namedownloadlink']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Link
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['namedownloadlink']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			 

			<?php
			if ($gets_data['namedownloadlink2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Name Download Link Alt
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['namedownloadlink2']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['sizedownloadlink2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Size Download Link Alt
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['sizedownloadlink2']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['typedownloadlink2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Type Download Link Alt
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left truncate">
					<?php print_r( $gets_data['typedownloadlink2']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['downloadlink2']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link Alt
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadlink2']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>

			<?php
			if ($gets_data['downloadapkx1']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Alt
					<span class="name new" style="color:#2cc58d">
						<?php echo $urlX1; ?>
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['downloadapkx1']) ?>
				</td>
			</tr>
			<?php } else { ?> <?php } ?> 
			<?php
			if ($gets_data['downloadapkgk']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link apkgk
				</th>
				<td class="has-text-align-left truncate">
					<a href='<?php print_r( $gets_data['downloadapkgk']) ?>'>
						<?php print_r( $gets_data['downloadapkgk']) ?>
					</a>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['downloadapkxapkpure']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link apkpure
				</th>
				<td class="has-text-align-left truncate">
					<a href='<?php print_r( $gets_data['downloadapkxapkpure']) ?>'>
						<?php print_r( $gets_data['downloadapkxapkpure']) ?>
					</a>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['downloadapkxapkmirror']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link apkmirror
				</th>
				<td class="has-text-align-left truncate">
					<a href='<?php print_r( $gets_data['downloadapkxapkmirror']) ?>'>
						<?php print_r( $gets_data['downloadapkxapkmirror']) ?>
					</a>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['downloadapkxapkleecher']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link apkleecher
				</th>
				<td class="has-text-align-left truncate">
					<a href='<?php print_r( $gets_data['downloadapkxapkleecher']) ?>'>
						<?php print_r( $gets_data['downloadapkxapkleecher']) ?>
					</a>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			<?php
			if ($gets_data['downloadapkxapkpremier']) { ?>
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					Download Link apkpremier
				</th>
				<td class="has-text-align-left truncate">
					<a href='<?php print_r( $gets_data['downloadapkxapkpremier']) ?>'>
						<?php print_r( $gets_data['downloadapkxapkpremier']) ?>
					</a>
				</td>
			</tr>
			<?php } else { ?> <?php } ?>
			
			<tr class="apkextractor" >
				<th class="has-text-align-left has-small-font-size has-cyan-bluish-gray-color">
					short Desc
					<span class="name new" style="color:#2cc58d">
						Play Store
					</span>
				</th>
				<td class="has-text-align-left  ">
					<?php print_r( $gets_data['desck_GP']) ?>
				</td>
			</tr>

		</tbody>
	</table>

</figure>
<div style="clear:both">
</div>
<div class="play_menu" >
	<h3 style="color:#2cc58d;text-align: center;font-size: x-large!important;">
		"
		<i style="color: blue;">
			<?php print_r( $gets_data['title_GP']) ?>
		</i>" Full Description Play Store
	</h3>
</div>
<div class="play_menu" >
	<?php print_r( $gets_data['articlebody_GP']) ?>
</div>
<textarea class="play_menu" style="width:98%;display: none;"  name="play.google.com" class="play_menu" rows="25%" cols="100%">
	<?php print_r( $gets_data['articlebody_GP']) ?>
</textarea>
<?php } ?>
</div>