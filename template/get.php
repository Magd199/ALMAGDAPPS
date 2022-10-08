<?php
function my_simple_crypt( $string, $action = 'e' ) {
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

$file_path= $_GET['urls'];
$file_name= $_GET['names'];
$host = ''.$_SERVER['HTTP_HOST'].'';
$urls = $_GET['urls'];
$names = $_GET['names'];
$size = $_GET['size'];
$url = $_GET['url'];
$file_path1 = my_simple_crypt($file_path); 
$file_path2 = my_simple_crypt($file_path, 'd');
 
header('Content-Type: application/vnd.android.package-archive');
header("Content-length: " . filesize($file_path2));
header('Content-Disposition: attachment; filename="'.$host.'-'.$file_name.'" ');
ob_end_flush();
readfile($file_path2);
return true;