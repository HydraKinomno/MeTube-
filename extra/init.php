<?php
include 'db/connection.php';
include 'classes/global.php';
$global = new GlobalClass($mysql);
$link = '/'; //URL сайта, обязательно с http:// или https:// и с / в конце!
$revival = 'MyTube';
$slogan = 'Telecast Yourself';
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(0);
setlocale(LC_TIME, "ru_RU.CP1251");
setlocale(LC_TIME, "rus");
if(isset($_COOKIE['MeTubeUID']) && $_COOKIE['MeTubeUID'] != 0){
  $uid = $_COOKIE['MeTubeUID'];
  if(mysqli_num_rows(mysqli_query($mysql, "SELECT * FROM users WHERE userID = $uid")) == 0){
    header("Location: /extra/user/logout");
  }
}
$ad = rand(1, 5);
$adlink = array(
  1 => 'https://gitlab.com/cleanflash/installer/-/releases',
  2 => 'https://www.avast.com/en-us/free-antivirus-download',
  3 => 'https://store.steampowered.com/uiupdate/',
  4 => 'https://www.windows.com/',
  5 => 'https://www.spotify.com/us/download/other/'
);
if(isset($_COOKIE['MeTubeUID']) && $_COOKIE['MeTubeUID'] != 0){
    $userTemp = $global->userData(1, $_COOKIE['MeTubeUID']);
    if(!isset($_COOKIE['MeTubeUPassword'])){
        header("Location: /extra/user/logout");
    }
    if($_COOKIE['MeTubeUPassword'] != $userTemp['password']){
        header("Location: /extra/user/logout");
    }
}
?>