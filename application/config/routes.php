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
|	http://codeigniter.com/user_guide/general/routing.html
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


$route['default_controller']   = 'home';
$route['404_override']         = 'errors/error404';
$route['translate_uri_dashes'] = TRUE;

$route['login']                = 'user/login';
$route['logout']               = 'user/logout';
$route['admin']                = 'admin/dashboard';
$route['admin/flat_type']      = 'admin/flatTypes/index';
$route['admin/flat_type/add']      = 'admin/flatTypes/add';
$route['admin/flat_type/edit/(:num)']      = 'admin/flatTypes/edit/$1';
$route['admin/flat_type/delete/(:num)']      = 'admin/flatTypes/delete/$1';
$route['admin/builders/(:num)'] = 'admin/builders/index';
$route['admin/achievements/(:num)'] = 'admin/achievements/index';
$route['admin/nri/(:num)'] = 'admin/nri/index';
$route['admin/amenities/(:num)'] = 'admin/amenities/index';
$route['admin/blogs/(:num)'] = 'admin/blogs/index';
$route['admin/career/(:num)'] = 'admin/career/index';
$route['admin/cities/(:num)'] = 'admin/cities/index';
$route['admin/flat_type/(:num)'] = 'admin/flatTypes/index';
$route['admin/locations/(:num)'] = 'admin/locations/index';
$route['admin/properties/(:num)'] = 'admin/properties/index';
$route['admin/propert_types/(:num)'] = 'admin/propert_types/index';
$route['admin/sliders/(:num)'] = 'admin/sliders/index';
$route['admin/specification/(:num)'] = 'admin/specification/index';
$route['admin/status/(:num)'] = 'admin/status/index';
$route['admin/testimonials/(:num)'] = 'admin/testimonials/index'; 
$route['city/(:any)'] 		   = "home/city/$1"; 
$route['city/(:any)/(:num)']   = "home/city/$1/$2";
$route['favourites'] 		   = "home/favourites";
$route['searchListing'] 	   = "home/searchListing";
$route['subscribers'] 		   = "home/subscribers";
$route['listing'] 		   	   = "home/listing";
$route['listing/(:any)']       = "home/listing/$1";
$route['home/propertyDetails']				= "home/propertyDetails";
$route['sendmail']				= "home/sendmail";
$route['project_contact']				= "home/project_contact";
/**
 * In home page under top submitted properties, then you have show all properties in that now when clicked on that the url changes to http://fullbasketproperty.com/listing but it should be http://fullbasketproperty.com/allcities .
 * Ref : http://trello.com/c/AB7L96Wn/20-in-home-page-under-top-submitted-properties-then-you-have-show-all-properties-in-that-now-when-clicked-on-that-the-url-changes-t
 */
$route['allcities'] 		   	   = "home/listing";
$route['allcities/(:any)']       = "home/listing/$1";
$route['about']                = "home/about";
$route['property-details']     = "home/property_details";
$route['property/(:any)']     = "home/property/$1";

$route['privacy-policy'] = "home/privacy";
$route['disclaimer'] = "home/disclaimer";
$route['vasthu'] = "home/vasthu";
$route['vastu'] = "home/Vastu";
$route['blog'] = "home/blog";
$route['achievements'] = "home/achievements";
$route['nri'] = 'home/nri';
$route['blog/(:any)'] = "home/blog_view/$1";
$route['contact'] = "home/contact";
$route['careers'] = "home/careers";
$route['testimonials'] = "home/testimonials";

$route['builders'] = 'home/builders';

$route['sitemap\.xml']         = 'sitemap';

$requestURI = explode('/',$_SERVER['REQUEST_URI']);
 
$route['admin/FooterLinks/(:num)'] = 'admin/FooterLinks/index';

/** Porperty Specific route needed only on frontend */
if (!in_array('admin', $requestURI)){
    $route['(:any)/(:any)/(:any)'] = 'home/propertyDetails/$1/$2/$3';
}
//$route['home/listing/get_locations'] = 'home/get_locations/index';
