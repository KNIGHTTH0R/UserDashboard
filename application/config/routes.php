<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "main";
$route['signin'] = "main/signin";
$route['login_check'] = "main/login_check";
$route['register'] = "main/register";
$route['process_registration'] = "main/process_registration";
$route['logoff'] = "main/logoff";

$route['leave_message/(:any)'] = "messages/leave_message/$1";
$route['leave_comment/(:any)'] = "messages/leave_comment/$1";

$route['admin'] = "users/admin";
$route['dashboard/add_new_user'] = "dashboard/add_new_user";
$route['users/show/(:any)'] = "users/show/$1";
$route['users/edit/(:any)'] = "users/edit/$1";
$route['users/remove/(:any)'] = "users/remove/$1";
$route['users/process_user_changes/(:any)'] = "users/process_user_changes/$1";
$route['users/change_password/(:any)'] = "users/change_password/$1";
$route['users/new'] = "users/new";

$route['dashboard'] = "dashboard";
$route['dashboard/admin'] = "dashboard/admin";
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
