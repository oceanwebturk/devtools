<?php 
namespace OWT\DevTools;

use ZipArchive;

class Commands extends Command{
 public function help()
 {
  $list='
  ';
  ksort(App::$commands);
  foreach(App::$commands as$command=>$props){
   $list.=' '.$command.'  '.(isset($props['options']['description']) ? $props['options']['description'] : $props['description']).'
  ';
  }
  $this->write('  '.$list);
 }

 public function new(array $params=[])
 {
  $projectFolder=WORKING_DIRECTORY.'/'.(isset($params[1]) ? $params[1] : "oceanwebturk");
  /*
  
  The openssl extension is required for SSL/TLS protection but is not available. If you can not en
  able the openssl extension, you can disable this error, at your own risk, by setting the 'disabl
  e-tls' option to true.

  if(is_dir($projectFolder) && file_exists($projectFolder.'composer.json')){
   $this->write(PHP_EOL."  Folder exists : ".$projectFolder,"red");die;
  }
  @mkdir($projectFolder,0777,true);
  $this->write(PHP_EOL."   Success created project ".$projectFolder.PHP_EOL,"green");*/
  $this->write(PHP_EOL);
  passthru("composer create-project oceanwebturk/oceanwebturk ".$params[1]);
 }
}