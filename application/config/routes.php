<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['searches/index'] = 'searches/index';
$route['searches'] = 'searches/index';
$route['bids/create/(:any)'] = 'bids/create_bid/$1';
$route['comments/create/(:any)/(:any)'] = 'comments/create_comment/$1/$2';
$route['comments/create/(:any)'] = 'comments/create_comment/$1';
$route['guitars/index/(:any)'] = 'guitars/index/$1';
$route['guitars/index'] = 'guitars/index';
$route['guitars/create'] = 'guitars/create';
$route['guitars/update'] = 'guitars/update';
$route['guitars/(:any)/(:any)'] = 'guitars/view/$1/$2';
$route['guitars'] = 'guitars/index';
$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'pages/view';
$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/guitars/(:any)'] = 'categories/guitars/$1';
$route['categories/posts/(:any)'] = 'categories/posts/$1';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;