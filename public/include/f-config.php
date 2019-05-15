<?php
session_start();
require_once './vendor1/autoload.php';


$fb = new Facebook\Facebook([
  'app_id' => '2180070738736125',
  'app_secret' => 'ddf2b9adbec1fc7ca4b475cb334fa1d0',
  'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();

?>


