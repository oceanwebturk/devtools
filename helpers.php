<?php 
$GLOBALS['_OCEANWEBTURK']['DEVTOOLS']['repos']=[
 'skeleton'=>'https://api.github.com/repos/oceanwebturk/oceanwebturk/zipball',
 'core' => 'https://api.github.com/repos/oceanwebturk/framework/zipball'
];
if(!function_exists("is_cli")){
 /**
  * @return boolean
  */
 function is_cli(): bool
 {
  if(in_array(PHP_SAPI,['cli','php-cli'])){
   return true;
  }
  return false;
 }	
}

if(!function_exists("download")){
  function download($file_source, $file_target) {
      $rh = fopen($file_source, 'rb');
      $wh = fopen($file_target, 'w+b');
      if (!$rh || !$wh) {
          return false;
      }
  
      while (!feof($rh)) {
          if (fwrite($wh, fread($rh, 4096)) === FALSE) {
              return false;
          }
          echo ' ';
          flush();
      }
  
      fclose($rh);
      fclose($wh);
  
      return true;
  }
}