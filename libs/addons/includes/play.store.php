<?php 
global $opt_themes;  
$language						= $opt_themes['ex_themes_extractor_apk_language_']; 
$arr['languages']				= $language;	 

$gp								= "https://play.google.com/store/apps/details?id=" . $titleId . "&hl=".$language."&gl=ID";
$gp_en_usa						= "https://play.google.com/store/apps/details?id=" . $titleId . "&hl=en-US";


$gp1							= $this->geturl("${gp}");
$gp_en_us						= $this->geturl("${gp_en_usa}");
$gp_lang						= "https://play.google.com/store/apps/details?id=" . $titleId . "&hl=id";
$gpindox						= "https://play.google.com/store/apps/details?id=" . $titleId . "&hl=id";
$gp_languages					= $this->geturl("${gp}");
$gpindo							= $this->geturl("${gpindox}");

 
$arr['GP_ID_2']					= $this->match('/<meta property="og:url" content="(.*?)">/ms', $gp1, 1);
$arr['GP_ID']					= $this->match('/<meta name="appstore:bundle_id" content="(.*?)">/ms', $gp1, 1);
if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_ID_2'];
$arr['title_id']				= $this->match('/<meta name="appstore:bundle_id" content="(.*?)">/ms', $gp1, 1);
$arr['title_id']				= str_replace('https://play.google.com/store/apps/details?id=', '', $arr['title_id']);
$arr['GP_ID99']					= $this->match('/<meta name="appstore:bundle_id" content="(.*?)">/ms', $gp1, 1);
$arr['GP_ID99']					= str_replace('https://play.google.com/store/apps/details?id=', '', $arr['GP_ID99']);
 
$arr['title_GP']				= $this->match('/<h1 class="AHFaub".*?>.*?<span.*?>(.*?)<\/span>.*?‏<\/h1>msi', $gp1, 1);
$arr['title2']					= $this->match('/<title id="main-title">(.*?)\-.*?<\/title>/msi', $gp1, 1);
if ( $arr['title_GP'] === FALSE or $arr['title_GP'] == '' ) $arr['title_GP'] = $arr['title2'];
$arr['title_GP3']				= $this->match('/<title id="main-title">(.*?)\-.*?<\/title>/msi', $gp1, 1);
$arr['title_GP3']				= preg_replace('/- Apps on Google Play/is', '',  $arr['title_GP3']);
$arr['title_GP2']				= $this->match('/<h1 class="AHFaub".*?>.*?<span >(.*?)<\/span>.*?<\/h1>/msi', $gp1, 1);
$arr['title_GP2']				= preg_replace('/- Apps on Google Play/is', '',  $arr['title_GP2']);
$arr['title_GP4']				= $this->match('/<title id="main-title">(.*?)\-.*?<\/title>/msi', $gp1, 1);
$arr['title_GP4']				= preg_replace('/- Apps on Google Play/is', '',  $arr['title_GP']);
$arr['title_GP3']				= $this->match('/<title id="main-title">(.*?)\-.*?<\/title>/msi', $gp1, 1);
$arr['title_GP3']				= preg_replace('/- Apps on Google Play/is', '',  $arr['title_GP3']);
$arr['poster_GP']				= $this->match('/<div class="xSyT2c">.*?<img.*?src="(.*?)\=.*?".*?>.*?<\/div>/msi', $gp1, 1);
if(empty($arr['poster_GP']) || !preg_match("/(.*?)/i", $arr['poster_GP'])) {
$arr['error']					= "Title ID Play Store No Found";
return $arr;
}
		 
$arr['poster_GP_2'] = $this->match('/<button class="Q4vdJd".*?data-screenshot-item-index="0">.*?<img src="(.*?)\=.*?" srcset=.*?>.*?<\/button>/msi', $gp1, 1);
if(empty($arr['poster_GP_2']) || !preg_match("/(.*?)/i", $arr['poster_GP_2'])) {
$arr['error']					= "Title ID Play Store No Found";
return $arr;
}

 

$titleIdX1						= $arr['title_id'];

require_once 'download.php';

$arr['articlebody_GP']			= $this->match('/<span.*?jsslot.*?>.*?<div.*?jsname="Igi1ac".*?>(.*?)<\/div>.*?<\/span>/msi', $gp1, 1);
$arr['articlebody_GP']			= preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP']);
$arr['articlebody_GP_alt']		= $this->match('/<span.*?jsslot.*?>.*?<div.*?jsname="sngebd".*?>(.*?)<\/div>.*?<\/span>/msi', $gp1, 1);
$arr['articlebody_GP_alt']		= preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP_alt']);
if ( $arr['articlebody_GP'] === FALSE or $arr['articlebody_GP'] == '' ) $arr['articlebody_GP'] = $arr['articlebody_GP_alt'];


$arr['articlebody_GP_language'] = $this->match('/<span jsslot.*?>.*?<div jsname="Igi1ac" style="display:none;">(.*?)<\/div>.*?<\/span>/msi', $gp1, 1);
$arr['articlebody_GP_language'] = preg_replace('/<a.*?">(.*?)<\/a>/is', '$1',  $arr['articlebody_GP_language']);
$arr['desck_GP_language']		= trim(strip_tags($this->match('/<span jsslot>.*?<div jsname="Igi1ac" style="display:none;">(.*?)\..*?<\/div>.*?<\/span>/msi', $gp1, 1)));
if ( $arr['desck_GP'] === FALSE or $arr['desck_GP'] == '' ) $arr['desck_GP'] = $arr['desck_GP2'];

$arr['desck_GP']				= substr(trim(strip_tags($this->match('/<meta.*?itemprop="description".*?content="(.*?)">/msi', $gp1, 1))),0,160);
$arr['desck_GP2']				= substr(trim(strip_tags($this->match('/<div jsname="sngebd">(.*?)\..*?/msi', $gp1, 1))),0,160);
if ( $arr['desck_GP'] === FALSE or $arr['desck_GP'] == '' ) $arr['desck_GP'] = $arr['desck_GP2'];

if ($arr['articlebody_GP_language'] === FALSE or $arr['articlebody_GP_language'] == '') $arr['articlebody_GP_language'] = $arr['articlebody_GP'];
if ($arr['desck_GP_language'] === FALSE or $arr['desck_GP_language'] == '') $arr['desck_GP_language'] = $arr['desck_GP'];


$arr['rated_GP']				= trim(strip_tags($this->match('/<div class="BHMmbe" aria-label=".*?">(.*?)<\/div>/msi', $gp_en_us, 1)));

$arr['ratings_GP']				= trim(strip_tags($this->match('/<span class="EymY4b"><span class="O3QoBc hzfjkd"><\/span><span class="" aria-label=".*?">(.*?)<\/span> total<\/span>/msi', $gp_en_us, 1)));

$arr['genres_GP']				= $this->match('/<div class="qQKdcc">.*?<span class="T32cc UAO9ie"><a itemprop="genre".*?>(.*?)<\/a><\/span>.*?<\/div>/msi', $gp1, 1);

$arr['youtube_GP']				= $this->match('/<div class="TdqJUe">.*?<button.*?data-trailer-url=".*?\/embed\/(.*?)\?.*?".*?><\/button>.*?<\/div>/msi', $gp1, 1);

$arr['requires_GP']				= $this->match('/<div class="hAyfc">.*?<div class="BgcNfc">Requires Android<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">.*?(\d.\d).*?<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp_en_us, 1);

$arr['requires_GP']				= str_replace('Varies with device', '4.4 and up',  $arr['requires_GP']);


$arr['sizes_GP']				= trim(strip_tags($this->match('/<div class="hAyfc">.*?<div class="BgcNfc">.*?<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">(\d+).*?\.*?M<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp1, 1)));

$arr['sizes_GP_2']				= trim(strip_tags($this->match('/<div class="hAyfc">.*?<div class="BgcNfc">.*?<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">(\d+).*?\.*?M<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp1, 1)));
if ($arr['sizes_GP'] === FALSE or $arr['sizes_GP'] == '') $arr['sizes_GP'] = $arr['sizes_GP_2'];	 
	 

$arr['version_GP']				= $this->match('/<div class="hAyfc">.*?<div class="BgcNfc">.*?Current Version<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">(.*?)<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp_en_us, 1);
$arr['version_GP1']				= $this->match('/<div class="hAyfc">.*?<div class="BgcNfc">.*?Current Version<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">.*?(\d.+).*?<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp_en_us, 1);
if ($arr['version_GP'] === FALSE or $arr['version_GP'] == '') $arr['version_GP'] = $arr['version_GP1'];	 


$arr['developers_GP']			= $this->match('/<span class="T32cc UAO9ie">.*?<a.*?>(.*?)<\/a>.*?<\/span>/msi', $gp1, 1);
$arr['developers2_GP']			= trim(strip_tags($this->match('/<div class="hAyfc"><div class="BgcNfc">Offered By<\/div><span class="htlgb"><div class="IQ1z0d"><span class="htlgb">(.*?)<\/span><\/div><\/span><\/div>/msi', $gp1, 1)));
      
$arr['installs_GP']				= trim(strip_tags($this->match('/<div class="hAyfc">.*?<div class="BgcNfc">Installs<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">\+(.*?)<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp_en_us, 1)));
$arr['installs_GP2']			= trim(strip_tags($this->match('/<div class="hAyfc">.*?<div class="BgcNfc">Installs<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">(.*?)\+<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp_en_us, 1)));
if ($arr['installs_GP'] === FALSE or $arr['installs_GP'] == '') $arr['installs_GP'] = $arr['installs_GP2'];


$arr['updates_GP']				= trim(strip_tags($this->match('/<div class="hAyfc">.*?<div class="BgcNfc">Updated<\/div>.*?<span class="htlgb">.*?<div class="IQ1z0d">.*?<span class="htlgb">(.*?)<\/span>.*?<\/div>.*?<\/span>.*?<\/div>/msi', $gp_en_us, 1)));
$arr['updates_GP1']				= trim(strip_tags($this->match('/<label>Update :<\/label>.*?<\/div>.*?<div class="col-xs-7 item">.*?<time.*?>(.*?)<\/time>.*?<\/div>.*?<\/div>/msi', $apkgk1, 1)));
$arr['whatnews_GP']				= $this->match('/<div class="W4P4ne.*?">.*?<h2 class="Rm6Gwb">.*?<\/h2>.*?<div jsname="bN97Pc".*?itemprop="description".*?>.*?<span.*?>(.*?)<\/span>.*?<div.*?class="n1EcZc uhqVLe".*?jsname="xBmnf".*?jsaction="JIbuQc:ornU0b">.*?/msi', $gp1, 1);

$arr['whatnews_GP1']			= $this->match_all('/<div jsname="bN97Pc" class="DWPxHb" itemprop="description">(.*?)<\/div>/ms', $this->match('/<div class="W4P4ne ">.*?<div class="wSaTQd">.*?<h2 class="Rm6Gwb">What&#39;s New<\/h2>.*?<\/div>.*?<div jscontroller="IsfMIf" jsaction="rcuQ6b:npT2md" class="PHBdkd" data-content-height="144" jsshadow>(.*?)<div class="n1EcZc uhqVLe" jsname="xBmnf" jsaction="JIbuQc:ornU0b">/ms', $gp1, 1), 1);


$arr['images_GP']				= $this->match_all('/<img.*?srcset="(.*?)\=.*?".*?>/ms', $this->match('/<div jsname="CmYpTb" class="JiLaSd u3EI9e">(.*?)<div class="awJjId.*?/ms', $gp1, 1), 1);
$arr['images_GP2']				= $this->match_all('/<img.*?data-src="(.*?)\=.*?".*?>/ms', $this->match('/<div jsname="CmYpTb" class="JiLaSd u3EI9e">(.*?)<div class="awJjId.*?/ms', $gp1, 1), 1);
$arr['images_GP3']				= $this->match_all('/<img.*?data-srcset="(.*?)\=.*?".*?>/ms', $this->match('/<div jsname="CmYpTb" class="JiLaSd u3EI9e">(.*?)<div class="awJjId.*?/ms', $gp1, 1), 1);

$arr['paid_GP']					= $this->match('/<span class="oocvOe">.*?<button aria-label=".*?Buy".*?">.*?d+\(.*?)<\/button>.*?<\/span>/msi', $gp1, 1);

$arr['paid_GP1']				= $this->match('/<button aria-label=".*?Buy".*?">(.*?)<\/button>/msi', $gp1, 1);
$arr['paid_GP2']				= $this->match('/<button aria-label=".*?Buy".*?">(.*?)<\/button>/msi', $gp1, 1);
$arr['paid_GP2']				= preg_replace('/.*?Buy/is', 'Paid',  $arr['paid_GP2']);
$arr['paid_GP3']				= $this->match('/<span class="oocvOe">.*?<button aria-label=".*?Buy".*?">(.*?)<\/button>.*?<\/span>/msi', $gp1, 1);


require_once 'images.php';