<?php 
namespace OWT\DevTools;
class Command{
 public static $colors=[
  'red' => '31m',
  'green' =>'32m',
  'yellow' => '33m',
  'blue' => '34m',
  'purple' => '35m',
  'skyblue' => '36m',
  'white' => '37m',
 ];
 public function write(string $text, string $color = "white") {
  $left = "\x1b[".self::$colors[$color];
  $output=isset($_SERVER['COMSPEC']) ? $left.$text."\x1b[0m" : $text;
  echo PHP_EOL." ".$output.PHP_EOL;
 }
}