<?php 
namespace OWT\DevTools;

class Commands extends Command{
 public function new(array $params=[]){
  $projectFolder=WORKING_DIRECTORY.'/'.(isset($params[1]) ? $params[1] : null);
  if(is_dir($projectFolder)){
   $this->write("Folder exists : ".$projectFolder,"red");
   die;
  }
  //@mkdir($projectFolder,0777,true);
  $this->write("Success created project ".$projectFolder,"green");
 }
}