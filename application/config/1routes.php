<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['MaruAdmin'] = 'login';
$route['Me'] = 'UserInfo';
$route['Me/rewandHistory'] = 'UserInfo/rewandHistory';
$route['Me/myReward'] = 'UserInfo/myReward';
$route['default_controller'] = 'home';
$route['personality/(:any)'] = 'personality/index/$1';
$route['personality/(:any)/(:any)'] = 'personality/index/$1/$2';
$route['backend/personality/personality_list'] = 'backend/personality/personality_list';
$route['backend/personality/add'] = 'backend/personality/add';
$route['backend/personality/save_seo_data'] = 'backend/personality/save_seo_data';
$route['backend/personality/save'] = 'backend/personality/save';
$route['backend/personality/update'] = 'backend/personality/update';
$route['backend/personality/edit'] = 'backend/personality/edit';
$route['backend/personality/status'] = 'backend/personality/status';
$route['backend/personality/delete'] = 'backend/personality/delete';
$route['backend/personality/personality_autosuggetion'] = 'backend/personality/personality_autosuggetion';
$route['backend/personality/(:any)'] = 'backend/personality/index/$1';
$route['404_override'] = 'My404';
require_once("application/cache/routes.php");

$route['translate_uri_dashes'] = FALSE;

