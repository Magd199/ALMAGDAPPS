<?php
class getslinks {
    public function get_web_info($title) {
        $getLinkID = $this->get_web_id_from_search(trim($title));
        if($getLinkID === NULL){
            $arr = array();
            $arr['error'] = "No Title found in Search Results!";
            return $arr;
        }
        return $this->get_webs_info_by_id($getLinkID);
    }
    public function get_webs_info_by_id($getLinkID)	{
        $arr = array();
        $sources = "https://www.happymod.com/" . trim($getLinkID) . "/";
        return $this->scrape_web_info($sources);
    }
    public function scrape_web_info($sources) {
        $arr = array();
        $links = $this->geturl("${sources}");
		/* 
		<div class="pdt-download " style="padding-bottom: 0; ">
						<a href="/3dtuning-mod/air.com.A3dtuning.Tuning3D/download.html" class="download-btn" title="3DTuning Mod Apk 3.7.90 ">
							<i></i>
							<span>Download APK (88.97 MB)</span>
						</a>
					</div>
		<h3 class="new-pdt-h3">Download Link.*?<\/h3>.*?<div class="new-pdt-glass-box">.*?<p>.*?<a href=".*?\?id=(.*?)\&source.*?" target="_blank" rel="noopener">Google Play Link<\/a>.*?<\/p>.*?<\/div>
	
	
		 */
        $arr['title_id'] = $this->match('/<h3 class="new-pdt-h3">Download Link.*?<\/h3>.*?<div class="new-pdt-glass-box">.*?<p>.*?<a href=".*?\?id=(.*?)\&source.*?" target="_blank" rel="noopener">Google Play Link<\/a>.*?<\/p>.*?<\/div>/ms', $links, 1);
        $arr['title_id_alt'] = $this->match('/<div class="pdt-download ".*?>.*?<a href="\/.*?\/(.*?)\/download.*?" class="download-btn".*?>.*?<i><\/i>.*?<span>Download APK.*?<\/span>.*?<\/a>.*?<\/div>/ms', $links, 1);
		
		if ($arr['title_id'] === FALSE or $arr['title_id'] == '') $arr['title_id'] = $arr['title_id_alt'];	
		
		
        $arr['GP_ID'] = $this->match('/<h3 class="new-pdt-h3">Download Link.*?<\/h3>.*?<div class="new-pdt-glass-box">.*?<p>.*?<a href=".*?\?id=(.*?)\&source.*?" target="_blank" rel="noopener">Google Play Link<\/a>.*?<\/p>.*?<\/div>/ms', $links, 1);
        $arr['GP_ID'] = str_replace('&hl=ru', '', $arr['GP_ID']);
        $arr['GP_ID'] = str_replace('#', '', $arr['GP_ID']);
        $arr['GP_IDX'] = $this->match('/<h3 class="new-pdt-h3">Download Link.*?<\/h3>.*?<div class="new-pdt-glass-box">.*?<p>.*?<a href=".*?\?id=(.*?)\&source.*?" target="_blank" rel="noopener">Google Play Link<\/a>.*?<\/p>.*?<\/div>/ms', $links, 1);
        if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_IDX'] = $arr['GP_IDX1'];
        $title_id = $this->match('/<h3 class="new-pdt-h3">Download Link.*?<\/h3>.*?<div class="new-pdt-glass-box">.*?<p>.*?<a href=".*?\?id=(.*?)\&source.*?" target="_blank" rel="noopener">Google Play Link<\/a>.*?<\/p>.*?<\/div>/ms', $links, 1);
        if(empty($title_id) || !preg_match("/(.*?)/i", $title_id)) {
            $arr['error'] = "No Title found";
            return $arr;
        }
        $arr['title_id'] = $title_id;
        $titleId = $arr['GP_ID'];
        $arr['title2'] = str_replace(array('GAME4N', 'for Android', '-', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
        $arr['title'] = trim(strip_tags($this->match('/<h1 class="new-pdt-app-title">(.*?)\<.*?<\/h1>/ms', $links, 1)));
        if ($arr['title'] === FALSE or $arr['title'] == '') $arr['title'] = $arr['title3'];
        $arr['title'] = str_replace('[', '(', $arr['title']);
        $arr['title'] = str_replace(']', ')', $arr['title']);
        $arr['title'] = str_replace('download', '', $arr['title']);
        $arr['title2'] = str_replace('(', ',', $arr['title2']);
        $arr['title2'] = str_replace(')', ',', $arr['title2']);
        $arr['title2'] = str_replace('/', ',', $arr['title2']);
        $arr['title3'] = str_replace('(', ',', $arr['title3']);
        $arr['title3'] = str_replace(')', ',', $arr['title3']);
        $arr['title3'] = str_replace('[', ',', $arr['title3']);
        $arr['title3'] = str_replace(']', ',', $arr['title3']);
        $arr['mods'] = $this->match('/<h3.*?>Mod Info:.*?<\/h3>.*?<div class="new-pdt-info".*?>.*?<pre.*?>(.*?)<\/pre>.*?<\/div>/ms', $links, 1);			
		$arr['mods1'] = $this->match('/<h3.*?>Mod Info:.*?<\/h3>.*?<div class="new-pdt-info".*?>.*?<pre.*?>(.*?)<\/pre>.*?<\/div>/ms', $links, 1); 
		$arr['mods2'] = str_replace(array('APK Home', 'Android', '-', 'Download'), '', $this->match('/<h1 class="new-pdt-app-title">.*?\[(.*?)]<\/h1>/ms', $links, 1));
		if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];	
        $arr['version'] = $this->match('/<li>.*?Version:(.*?)<\/li>/ms', $links, 1);
        $arr['sizes'] = $this->match('/<li>.*?Size:(.*?)<\/li>/ms', $links, 1);
        $arr['downloadlink'] = "" . $sources . "downloading.html";
        $arr['namedownloadlink'] = $this->match('/<div class="pdt-download ".*?>.*?<a.*?title="(.*?)".*?>.*?<i>.*?<\/i>.*?<\/a>.*?<\/div>/ms', $links, 1);
        $arr['downloadlink2'] = $this->match_all('/<a href="(.*?)">.*?<\/a>/ms', $this->match('/<div class="vc_tta-panel-body">(.*?)<\/ul>/ms', $links, 1), 1);
        $arr['namedownloadlink2'] = $this->match_all('/<a.*?>(.*?)<\/a>/ms', $this->match('/<div class="vc_tta-panel-body">(.*?)<\/ul>/ms', $links, 1), 1);
        require_once 'play.store.php';
        return $arr;
    }
    //************************[ Extra Functions ]******************************
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
        $url = "http://www.${engine}.com/search?q=happymod.com+" . rawurlencode($title);
        $ids = $this->match_all('/<a.*?href="https:\/\/www.happymod.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
        if (!isset($ids[0]) || empty($ids[0])) //if search failed
            return $this->get_web_id_from_search($title, $nextEngine); //move to next search engine
        else
            return $ids[0]; //return first IMDb result
    }
    private function decode($string, $action = 'e') {
        $secret_key = 'drivekey';
        $secret_iv = 'google';
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }
        return $output;
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