<?php 

namespace OWT\DevTools;

class App{
 
 /**
  * @var string
  */
 public static $context;

 public static function setContext(string $context): App
 {
  self::$context=$context;
  return new self();
 }

 public function run(){
  $params=array_slice($_SERVER['argv'],1);
  $command=isset($params[0]) ? $params[0] : '';
  if($this->commandControl($command)){
   $command=$this->commandControl($params[0])['action'];
  }
  if(is_cli()){
   echo $this->showHeader();
   $commands=new Commands();
   if(method_exists($commands,$command)){
    echo call_user_func_array([$commands,$command],[$params]).PHP_EOL;
   }
  }
 }
 
 private function showHeader(){
  return PHP_EOL." OceanWebTurk ".(defined("OCEANWT_VERSION") ? "v".OCEANWT_VERSION." | " : "")."DevTools v".OWTDEVTOOLS_VERSION.PHP_EOL;
 }

 private function commandControl(string $command){
  if(class_exists(\OceanWT\Console::class)){
   if(isset(\OceanWT\Console::$commands[$command])){
    return \OceanWT\Console::$commands[$command];
   }else{
    return false;
   }
  }else{
   return false;
  }
 }
}