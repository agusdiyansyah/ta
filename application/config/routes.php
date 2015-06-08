<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "dashboard";
$route['404_override'] = '404';
// $route['desain'] = '404';
$route['berita/(:any)'] = 'news/detil/$1';
