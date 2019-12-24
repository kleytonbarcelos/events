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
$route['default_controller'] = 'home';
$route['boleto/(:any)'] = 'boletos/imprimir/$1';
$route['faturas/pagamento/(:any)/(:any)'] = 'faturas/pagamento/$1/$2';
$route['pagamentos'] = 'pagamentos/index';
$route['404_override'] = 'erros/index';
$route['logoff'] = 'login/logoff';
$route['translate_uri_dashes'] = FALSE;


//$route['/(:any)'] = "home/evento/$1";
//$route['(:any)'] = 'home/evento';


// $controller_dir = opendir(APPPATH."controllers");

// while (($file = readdir($controller_dir)) !== false) {

//     if (substr($file, -4) == ".php" )
//     {

//         $route[substr($file, 0, -4)."(.*)"] = substr($file, 0, -4)."$1";

//     } elseif (substr($file, -5) == ".php/") {

//         $route[substr($file, 0, -5)."(.*)"] = substr($file, 0, -5)."$1";

//     }
// }

// $route['home/(:num)/(:any)'] = 'home/view/$1/$2';
// $route['home/(:num)/(:any)/(:any)/(:any)'] = 'home/view/$1/$2/$3/$4';
// $route['home/(:num)/(:any)/(:any)'] = 'home/view/$1/$2/$3';

// $route['([a-z 0-9 -]+)'] = 'welcome/list1/$1';
// $route['([a-z 0-9 -]+)/([0-9]+)'] = 'welcome/list1/$1/$2';