<?php

class getslinks {	
	public function get_web_info($title)
	{
		$getLinkID = $this->get_web_id_from_search(trim($title));
		if($getLinkID === NULL){
			$arr = array();	 	 	 
				
			$arr['error'] = "No Title found in Search Results!";
			 
			return $arr;
		}
		return $this->get_webs_info_by_id($getLinkID);
	}
	public function get_webs_info_by_id($getLinkID)
	{
		$arr = array();	
		if(isset($_POST['wp_sb'])) {		
		$sources					= $_POST['wp_url'];
		} else { 		 
		$sources = "https://apk-store.org/" . trim($getLinkID) . ".html";
		} 
		return $this->scrape_web_info($sources);
	}
	
	
	public function scrape_web_info($sources) {				
		require_once 'ssl.php';			
		$linksX						= $_POST['wp_url'];
		@ini_set('user_agent', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)'); 
		$links						=  file_get_contents($linksX, false, stream_context_create($ssl)); 
		
		$arr						= array();
		$linksX1					= $this->geturl("${sources}");	
		/*
		<a.*?class="g-play".*?href=".*?\?id=(.*?)\.*?".*?\/a> 
		*/
		$arr['title_id'] = $this->match('/<a.*?class="g-play".*?href=".*?\?id=(.*?)\.*?".*?\/a>/ms', $links, 1);	
		
		$arr['GP_ID'] = $this->match('/<a.*?class="g-play".*?href=".*?\?id=(.*?)\.*?".*?\/a>/ms', $links, 1); 
		
		$arr['GP_IDX'] = $this->match('/<a.*?class="g-play".*?href=".*?\?id=(.*?)\.*?".*?\/a>/ms', $links, 1);	
		
		if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_IDX'] = $arr['GP_IDX1'];	
		$title_id = $this->match('/<a.*?class="g-play".*?href=".*?\?id=(.*?)\.*?".*?\/a>/ms', $links, 1);		
		
		if(empty($title_id) || !preg_match("/(.*?)/i", $title_id)) {
			$arr['error'] = "Title ID Play Store No Found";
			return $arr;
		}
		$arr['title_id'] = $title_id;
		$titleId = $arr['GP_ID'];		
		/*
		<title>Shadow of Death 2 mod apk (Unlimited Money) for Android</title>
		<h1 class="full_article_title" itemprop="name">.*?\((.*?)\).*?<\/h1>
		*/
		$arr['title'] = str_replace(array('apk-store', 'mod apk', 'mod', 'apk', '-', 'for Android', '+', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
		
		$arr['title2'] = trim(strip_tags($this->match('/<h1 class="full_article_title" itemprop="name">(.*?)<\/h1>/ms', $links, 1)));
		if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title2'];	

        $arr['mods'] = str_replace(array('apk-store', 'mod apk', 'mod', 'apk', '-', 'for Android', '+', 'Download'), '', $this->match('/<h1 class="full_article_title" itemprop="name">.*?\((.*?)\).*?<\/h1>/ms', $links, 1));
		
		
        $arr['mods2'] = $this->match('/<title>.*?\((.*?)\).*?<\/title>/ms', $links, 1);
		$arr['mods2'] = preg_replace('/<a.*?>(.*?)<\/a>/is', '',  $arr['mods2']);
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];	
		 
		$arr['mods_alt_title'] = trim(strip_tags($this->match('/<div class="su-accordion su-u-trim">.*?<div class="su-spoiler-title".*?>.*?<span class="su-spoiler-icon">.*?<\/span>(.*?)<\/div>.*?<div class="su-spoiler-content su-u-clearfix su-u-trim">.*?<\/div>.*?<\/div>.*?<\/div>/ms', $links, 1)));


		$arr['mods_alt_desc'] = $this->match('/<div class="faq-description hidden.*?>(.*?)<\/div>/ms', $links, 1);	
		$arr['mods_alt_desc'] = str_replace('&nbsp;', '', $arr['mods_alt_desc']);
		  
		$arr['version'] = $this->match('/<span class="title">Version:<\/span>.*?<span itemprop="softwareVersion">(.*?)<\/span>/ms', $links, 1);
		
		$arr['sizes_apkdownload'] = $this->match('/<\/svg>.*?Size.*?<\/th>.*?<td.*?>(.*?)<\/td>/ms', $links, 1);	
		$arr['sizes_sources'] = $this->match('/<\/svg>.*?Size.*?<\/th>.*?<td.*?>(.*?)<\/td>/ms', $links, 1);
		 
		/*
		<span class="title">Version:<\/span>.*?<span itemprop="softwareVersion">(.*?)<\/span> 
		
		
<a rel="nofollow" href="/download-file?id=38643&file=0" class="poledow big" title="Download Shadow of Death 2 v1.86.0.1 Mod (Unlimited Money)">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M0 0h24v24H0z" fill="none" /><path d="M19.35 10.04A7.49 7.49 0 0012 4C9.11 4 6.6 5.64 5.35 8.04A5.994 5.994 0 000 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z" /></svg>
<span class="btn_left">Download Shadow of Death 2 v1.86.0.1 Mod (Unlimited Money)</span>
<span class="btn_right">(198 MB)</span>
</a>


<a.*?href="(.*?)".*?<\/a>

https://apk-store.orgArray?id=38643&file=0
https://apk-store.orgdownload-fileArray?id=38643&file=0
https://apk-store.orghttps://apk-store.orgArray?id=38643&file=0

https://apk-store.org/download-file?id=38643&file=0
/download-file?id=38643&file=0

https://apk-store.org/download-file?id=38643&file=0
\/download-file?id=38643&file=0
<article.*?>.*?<a download href="(.*?)".*?>.*?<\/a>.*?<\/article>

<a rel="nofollow" href="/download-file?id=38643&file=0" class="poledow big" title="Download Shadow of Death 2 v1.86.0.1 Mod (Unlimited Money)">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="M0 0h24v24H0z" fill="none" /><path d="M19.35 10.04A7.49 7.49 0 0012 4C9.11 4 6.6 5.64 5.35 8.04A5.994 5.994 0 000 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z" /></svg>
<span class="btn_left">Download Shadow of Death 2 v1.86.0.1 Mod (Unlimited Money)</span>
<span class="btn_right">(198 MB)</span>
</a>

<a.*?">.*?<span class="btn_right">.*?\((.*?)\).*?<\/span>.*?<\/a>


		*/	
		
		$sumbers					= 'https://apk-store.org';
		$arr['download_link_2']		= $this->match_all('/<a.*?href="(.*?)".*?<\/a>/ms', $this->match('/<div.*?id="download_app">(.*?)<div class="article-author">/ms', $links, 1), 1);		
		$arr['download_link_2'] = preg_replace('/\/download-file/ms', $sumbers.'/download-file', $arr['download_link_2']);		
		
		$arr['download_links_page'] = $arr['download_link_2']; 
		
		$arr['name_downloadlinks_gma']	= $this->match_all('/<a.*?">.*?<span class="btn_left">(.*?)<\/span>.*?<\/a>/ms', $this->match('/<div.*?id="download_app">(.*?)<div class="article-author">/ms', $links, 1), 1);		
		$arr['name_downloadlinks_gma'] = str_replace('Download ', '', $arr['name_downloadlinks_gma']);
		 
		$arr['size_downloadlinks_gma'] = $this->match_all('/<a.*?">.*?<span class="btn_right">.*?\((.*?)\).*?<\/span>.*?<\/a>/ms', $this->match('/<div.*?id="download_app">(.*?)<div class="article-author">/ms', $links, 1), 1);	

		
		$download_links_pages_html = $arr['download_links_page'];		
		$download_links_pages = $this->geturl("${download_links_pages_html}");		 
 
		$arr['downloadlinks_gma'] = $this->match_all('/<a.*?href="(.*?)".*?<\/a>/ms', $this->match('/<article.*?>(.*?)<\/article>/ms', $download_links_pages, 1), 1);		 
		
		$download_links_pages_html_alts = $arr['download_links_page'][0];		  	 		
		  		
		if ($arr['download_links_page'][1]) {
		$download_links_pages_html_alts_1 = $arr['download_links_page'][1]; 
		}	 		
		if ($arr['download_links_page'][2]) {
		$download_links_pages_html_alts_2 = $arr['download_links_page'][2]; 
		}	 		
		if ($arr['download_links_page'][3]) {
		$download_links_pages_html_alts_3 = $arr['download_links_page'][3]; 
		}	 		
		if ($arr['download_links_page'][4]) {
		$download_links_pages_html_alts_4 = $arr['download_links_page'][4]; 
		}			
		if ($arr['download_links_page'][5]) {
		$download_links_pages_html_alts_5 = $arr['download_links_page'][5]; 
		}		 
		 
		$download_links_pages_alt = $this->geturl("${download_links_pages_html_alts}");
		
		if ($download_links_pages_html_alts_1) { 
		$download_links_pages_alt_1 = $this->geturl("${download_links_pages_html_alts_1}");
		}
		
		if ($download_links_pages_html_alts_2) { 
		$download_links_pages_alt_2 = $this->geturl("${download_links_pages_html_alts_2}");
		}
		
		if ($download_links_pages_html_alts_3) { 
		$download_links_pages_alt_3 = $this->geturl("${download_links_pages_html_alts_3}");
		}
		
		if ($download_links_pages_html_alts_4) { 
		$download_links_pages_alt_4 = $this->geturl("${download_links_pages_html_alts_4}");
		}
		
		if ($download_links_pages_html_alts_5) { 
		$download_links_pages_alt_5 = $this->geturl("${download_links_pages_html_alts_5}");
		}
		
		$arr['downloadlink_gma'] = $this->match('/<a download href="(.*?)".*?>.*?<\/a>/ms', $download_links_pages_alt, 1);
		
		$arr['downloadlink_gma_1'] = $this->match('/<a download href="(.*?)".*?>.*?<\/a>/ms', $download_links_pages_alt_1, 1);
		
		$arr['downloadlink_gma_2'] = $this->match('/<a download href="(.*?)".*?>.*?<\/a>/ms', $download_links_pages_alt_2, 1);
		
		$arr['downloadlink_gma_3'] = $this->match('/<a download href="(.*?)".*?>.*?<\/a>/ms', $download_links_pages_alt_3, 1);
		
		$arr['downloadlink_gma_4'] = $this->match('/<a download href="(.*?)".*?>.*?<\/a>/ms', $download_links_pages_alt_4, 1);
		
		$arr['downloadlink_gma_5'] = $this->match('/<a download href="(.*?)".*?>.*?<\/a>/ms', $download_links_pages_alt_5, 1);
		 
		 
		/* 	 
		https://cdn1.apk-store.org/nextcloud/index.php/s/r36yk3ezybFDNAG/download
		https://cdn1.apk-store.org/nextcloud/index.php/s/r36yk3ezybFDNAG/download
		<a download href="(.*?)" class="btn green big download_block__btn">.*?<\/a>
		<a download href="https://cdn1.apk-store.org/nextcloud/index.php/s/r36yk3ezybFDNAG/download" class="btn green big download_block__btn">Download 198 MB</a>
		*/
		require_once 'play.store.php';	
		return $arr;
		}
		
		private function get_web_id_from_search($title, $engine = "yahoo"){
				switch ($engine) {
					//case "google":  $nextEngine = "bing";  break;  
					//case "bing":    $nextEngine = "ask";   break;
					case "google":  $nextEngine = "bing";  break;			
					case "bing":    $nextEngine = "ask";   break;
					case "ask":    $nextEngine = "yandex";   break;
					case "yandex":    $nextEngine = "duckduckgo";   break;
					case "duckduckgo":     $nextEngine = FALSE;   break;
					case FALSE:     return NULL;
					default:        return NULL;
		}
		$url = "http://www.${engine}.com/search?q=apk-store.org+" . rawurlencode($title);
		$ids = $this->match_all('/<a.*?href="https:\/\/apk-store.org\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
		if (!isset($ids[0]) || empty($ids[0])) //if search failedhttps://an1.com/
			return $this->get_web_id_from_search($title, $nextEngine); 
		else
			return $ids[0];
		} 
		private function geturl($url){
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
				$ip=rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255);
				//$ip=172.69.70.6;
				curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
				//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/".rand(3,5).".".rand(0,3)." (Windows NT ".rand(3,5).".".rand(0,2)."; rv:2.0.1) Gecko/20100101 Firefox/".rand(3,5).".0.1");
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:56.0) Gecko/20100101 Firefox/56.0");
				curl_setopt($ch, CURLOPT_REFERER, "http://www.google.com");
				curl_setopt($ch, CURLOPT_AUTOREFERER, true);
				$html = curl_exec($ch);
				curl_close($ch);
				return $html;
		}
		private function match_all_key_value($regex, $str, $keyIndex = 1, $valueIndex = 2){
				$arr = array();
				preg_match_all($regex, $str, $matches, PREG_SET_ORDER);
				foreach($matches as $m){
					$arr[$m[$keyIndex]] = $m[$valueIndex];
				}
				return $arr;
		}
		private function match_all($regex, $str, $i = 0){
				if(preg_match_all($regex, $str, $matches) === false)
					return false;
				else
					return $matches[$i];
		}
		private function match($regex, $str, $i = 0){
				if(preg_match($regex, $str, $match) == 1)
					return $match[$i];
				else
					return false;
		}
}