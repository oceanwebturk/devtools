<?php

define("ROOTPATH",__DIR__."/");
if(file_exists(ROOTPATH."../../autoload.php")){
 include(ROOTPATH."../../autoload.php");
}if(file_exists(ROOTPATH."vendor/autoload.php")){
 include(ROOTPATH."vendor/autoload.php");
}
$app=new OceanWT\Devtools\Application(__DIR__.'/');

$commands=[
 OceanWT\Devtools\Commands\DevBuild::class
];
