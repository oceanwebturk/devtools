<?php

namespace OceanWT\Devtools;

class Application
{

 public static function run()
 {
  include(ROOTPATH."config/routes.php");
  switch (PHP_SAPI) {
   case 'cli':

   break;

   default:
   \OceanWT\Http\Route::run();
   break;
  }
 }
}
