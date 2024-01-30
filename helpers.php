<?php 
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