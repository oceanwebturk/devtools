<?php 
define("WORKING_DIRECTORY", getcwd());
define('OWTDEVTOOLS_VERSION','1.0');
$vendorAutoload=[
__DIR__ . '/../../../autoload.php',
__DIR__ . '/../../autoload.php',
__DIR__ . '/../vendor/autoload.php',
__DIR__ . '/vendor/autoload.php',
WORKING_DIRECTORY.'/autoload.php',
WORKING_DIRECTORY.'/vendor/autoload.php',
WORKING_DIRECTORY.'/.oceanwebturk/autoload.php',
];
if(file_exists(WORKING_DIRECTORY.'/composer.json')){
 $composerJson=json_decode(file_get_contents(WORKING_DIRECTORY.'/composer.json'),true);
 if(isset($composerJson['config']['vendor-dir'])){
  $vendorAutoload=array_merge($vendorAutoload,[WORKING_DIRECTORY.'/'.str_replace(["./"],[""],$composerJson['config']['vendor-dir']).'/autoload.php']);
 }
}
foreach ($vendorAutoload as$file){
 if(file_exists($file)){
  include($file);
 }
}
$app=new OWT\DevTools\App();