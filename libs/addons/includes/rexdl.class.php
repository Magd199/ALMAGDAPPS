<?php
class getslinks
{
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
        $sources = "https://rexdl.com/" . trim($getLinkID) . "/";
        return $this->scrape_web_info($sources);
    }
    public function scrape_web_info($sources)
    {
        $arr = array();
        $links = $this->geturl("${sources}");
        /*
        <ul class=dl-list>.*?<a class=g-play href="https:\/\/play.google.com\/store\/apps\/details?id=(.*?)" rel=bookmark target=_blank title="Google Play Link" target=_blank rel=nofollow>.*?<\/a>.*?<\/ul>

        <ul class=dl-list>.*?<a.*?href="https:\/\/play.google.com\/store\/apps\/details?id=(.*?)".*?title="Google Play.*?">.*?<\/a>.*?<\/ul>
        */
        $arr['title_id'] = $this->match('/<ul class=dl-list>.*?<a class=g-play href=".*?\?id=(.*?)\.*?".*?title="Google Play Link".*?>.*?<\/a>.*?<\/ul>', $links, 1);
        $arr['GP_ID'] = $this->match('/<ul class=dl-list>.*?<a class=g-play href=".*?\?id=(.*?)\.*?".*?title="Google Play Link".*?>.*?<\/a>.*?<\/ul>/ms', $links, 1);
        $arr['GP_IDX'] = $this->match('/<ul class=dl-list>.*?<a class=g-play href=".*?\?id=(.*?)\.*?".*?title="Google Play Link".*?>.*?<\/a>.*?<\/ul>/ms', $links, 1);
        if ($arr['GP_ID'] === FALSE or $arr['GP_ID'] == '') $arr['GP_ID'] = $arr['GP_IDX'] = $arr['GP_IDX1'];
        $title_id = $this->match('/<ul class=dl-list>.*?<a class=g-play href=".*?\?id=(.*?)\.*?".*?title="Google Play Link".*?>.*?<\/a>.*?<\/ul>/ms', $links, 1);
        if(empty($title_id) || !preg_match("/(.*?)/i", $title_id)) {
            $arr['error'] = "Title ID Play Store No Found";
            return $arr;
        }
        $arr['title_id'] = $title_id;
        $titleId = $arr['GP_ID'];
        $arr['title'] = str_replace(array('for', 'Android', '-', 'Download'), '', $this->match('/<title>(.*?)<\/title>/ms', $links, 1));
        $arr['title2'] = trim(strip_tags($this->match('/<div class="p1">.*?<h1>(.*?)<\/h1>.*?<\/div>/ms', $links, 1)));
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
        $arr['mods2'] = trim(strip_tags($this->match('/<span style="color: #99cc00;">.*?Mod.*?(<span style="color: #ff00ff;">(.*?)<\/span>).*?<\/span>/ms', $links, 1)));
        $arr['mods'] = $this->match('/<h1.*?>.*?\((.*?)\).*?<\/h1>/ms', $links, 1);

        $arr['mods3'] = str_replace(array('APK', 'Apk', 'Mod', 'Mod Apk', '(', ')', '.', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'Android', '-', 'Download'), '', $this->match('/<h1 class="post-title">.*?\Mod \\(?(.*?)\\) <\/h1>/ms', $links, 1));
        if ($arr['mods'] === FALSE or $arr['mods'] == '') $arr['mods'] = $arr['mods2'];
        /*		
                (.*?)\?.*? ===> hapus semua dibelakang tanda (?)
                (.*?)\=.*? ===> hapus semua dibelakang tanda (=)
                \\(?(.*?)\\)?\).*? ---> hapus tanda kurung  (contoh)
                (.*?)\&.*? ===> hapus semua dibelakang tanda (&)
                .*?\?id=(.*?) ===> hapus semua dibelakang tanda (id=)
                .*?\?id=(.*?)\&.*? ===> hapus semua dibelakang sebelum tanda (id=) den tanda (&) 
                .*?\?id=(.*?)\<br>.*? ===> hapus semua dibelakang sebelum tanda (id=) den tanda (&) 
                .*?\embed\/(.*?)\?.*? ===> hapus semua dibelakang sebelum tanda (id=) den tanda (&) 	
        
        */

		$arr['version'] = $this->match('/<li class=dl-version>.*?<span>.*?: (.*?)<\/span>.*?<\/li>/ms', $links, 1);	
		$arr['sizes'] = $this->match('/.*?Size:.*?<\/th>.*?<td>(.*?)<\/td>/ms', $links, 1);
 
		$arr['iddwnpage'] = $this->match('/<span class="readdownload a">.*?<a.*?href=".*?\?id=(.*?)\.*?".*?>.*?<\/a>.*?<\/span>/ms', $links, 1);
		$iddwnpages = $arr['iddwnpage'];		
		$downloadpage2 = "https://rexdlbox.com/index.php?id=" . $iddwnpages . ""; 
		$arr['downloadpages0'] = "https://rexdlfile.com/index.php?id=" . $iddwnpages . ""; 
		$arr['downloadpages1'] = "https://rexdlbox.com/index.php?id=" . $iddwnpages . ""; 
		if ($arr['downloadpages0'] === FALSE or $arr['downloadpages0'] == '') $arr['downloadpages0'] = $arr['downloadpages1'];
		$downloadpage = $arr['downloadpages1']; 
		
		$downloadpages = $this->geturl("${downloadpage}"); 
		$arr['downloadlink2'] = $this->match_all('/<a href="(.*?)">.*?<li.*?>.*?<\/li>.*?<\/a>/ms', $this->match('/<h4>Download Link.*?:.*?<\/h4>.*?<ul.*?>(.*?)<\/ul>/ms', $downloadpages, 1), 1);
		$arr['namedownloadlink2'] = $this->match_all('/<a.*?>.*?<li.*?>.*?<span>(.*?)<\/span><\/li>.*?<\/a>/ms', $this->match('/<h4>Download Link.*?:.*?<\/h4>.*?<ul.*?>(.*?)<\/ul>/ms', $downloadpages, 1), 1);
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
        $url = "http://www.${engine}.com/search?q=rexdl.com+" . rawurlencode($title);
        $ids = $this->match_all('/<a.*?href="https:\/\/rexdl.com\/.*?".*?>.*?<\/a>/ms', $this->geturl($url), 1);
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