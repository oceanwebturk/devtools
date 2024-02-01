<?php 

namespace OWT\DevTools;

class App{
 
 /**
  * @var string
  */
 public static $context;
 
 /**
  * @var object
  */
 public $oceanwebturk;

 /**
  * @var array
  */
 public static $commands=[];

 public static function setContext(string $context): App
 {
  self::$context=$context;
  return new self();
 }

 private function init()
 {
  if(class_exists(\OceanWT\OceanWT::class)){
   $this->oceanwebturk=new \OceanWT\OceanWT();
   $this->oceanwebturk->init();
   \OceanWT\OceanWT::providerLists();
  }
 }

 public function run()
 {
  $this->init();
  $params=array_slice($_SERVER['argv'],1);
  $command=isset($params[0]) ? $params[0] : 'help';
  $this->setCommands();
  if(class_exists(\OceanWT\Console::class)){
   self::$commands=array_merge(self::$commands,\OceanWT\Console::$commands);
  }
  self::$commands=array_merge(self::$commands,[
    'help'=>['action'=>[Commands::class,'help'],'description'=>'Help & List Commands'],
  ]);
  if(is_cli()){
   echo $this->showHeader();
   $this->cliApp($command,$params);
  }
 }
 
 private function showHeader()
 {
  return PHP_EOL."   OceanWebTurk ".(defined("OCEANWT_VERSION") ? "v".OCEANWT_VERSION." | " : "")."DevTools v".OWTDEVTOOLS_VERSION;
 }

 private function cliApp($command,array $params=[])
 {
  $cmd=self::$commands[$command];
  if(isset($cmd)){
   $action=$cmd['action'];
   if(is_string($action)){
    $class=new $action();
    $method='run';
   }elseif(is_array($action)){
    $class=new $action[0];
    $method=$action[1];
   }
   echo call_user_func_array([$class,$method],[$params]);
  }
 }

 private function setCommands()
 {
  self::$commands=[
   'new'=>['action'=>[Commands::class,'new'],'description'=>'Create a new application'],
  ];
 }
}