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

/*$route['default_controller'] = "";
$route['404_override'] = '';*/
$route = array(
				'default_controller'  => "accounts",
				'create-account'      => "accounts/createAccountView",
				'landing-page'        => "accounts/landingPage",
				'login-account'       => "accounts/loginView",
				'member-page'         => "accounts/memberPage",
				'my-ads' 			  => "accounts/myAdsView",
				'my-profile' 		  => "accounts/myProfileView",
				'registerAccount' 	  => "accounts/registerAccount",
				'verifyLogin' 		  => "accounts/clientLogin",
				'logout' 			  => "accounts/logout", 
				'uploadProfile' 	  => "profiles/do_upload",
				'upload-items' 		  => "items/postItem",
				'main-page' 		  => "accounts/mainPage",
				'view-items/(:num)'   => "accounts/viewItem/$1",
				'borrowed-items' 	  => "accounts/borrowedItems",
				'item-request' 		  => "accounts/itemRequest",
				'myrented-items'	  => "accounts/myRentedItems",
				'returned-items'	  => "accounts/returnedItems",
				'search-results'	  => "accounts/searchResults",
				'other-profile'		  => "accounts/otherProfileView",
				'view-details/(:num)' => "items/viewDetails/$1",
				'search-output'		  => "items/searchOutput",
				'search-output-page'  => "items/searchOutputPage",
				'notifications'       => "items/notifications",
				'view-other-profile/(:num)'  => "accounts/viewOtherProfile/$1",
				'rate-itemandclient/(:num)'  => "accounts/rateIfReturn/$1",
				'404_override' 		  => ""
	);


/* End of file routes.php */
/* Location: ./application/config/routes.php */