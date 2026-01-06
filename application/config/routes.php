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
|	https://codeigniter.com/userguide3/general/routing.html
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
#
$route['cancel_checkin'] = 'pages/cancel_checkin';
$route['unhold_transaction/(:any)'] = 'pages/unhold_transaction/$1';
$route['hold_transaction/(:any)'] = 'pages/hold_transaction/$1';
$route['undo_payment'] = 'pages/undo_payment';
$route['generate_statistic_report'] = 'pages/generate_statistic_report';
$route['save_notes'] = 'pages/save_notes';
$route['search_item'] = 'pages/search_item';
$route['change_category/(:any)'] = 'pages/change_category/$1';
$route['edit_stock_quantity'] = 'pages/edit_stock_quantity';
$route['generate_booking_report'] = 'pages/generate_booking_report';
$route['booking_report'] = 'pages/booking_report';
$route['generate_sales_summary_report'] = 'pages/generate_sales_summary_report';
$route['generate_sales_report'] = 'pages/generate_sales_report';
$route['sales_report'] = 'pages/sales_report';
$route['bill_payment'] = 'pages/bill_payment';
$route['print_bill/(:any)'] = 'pages/print_bill/$1';
$route['proceed_request/(:any)/(:any)/(:any)'] = 'pages/proceed_request/$1/$2/$3';
$route['cancel_room_charges/(:any)/(:any)/(:any)'] = 'pages/cancel_room_charges/$1/$2/$3';
$route['room_charges_save'] = 'pages/room_charges_save';
$route['save_room_charge_qty'] = 'pages/save_room_charge_qty';
$route['remove_room_charge_item/(:any)/(:any)/(:any)/(:any)'] = 'pages/remove_room_charge_item/$1/$2/$3/$4';
$route['view_room_charges/(:any)/(:any)/(:any)'] = 'pages/view_room_charges/$1/$2/$3';
$route['room_charges'] = 'pages/room_charges';
$route['track_invoice_search'] = 'pages/track_invoice_search';
$route['finalize_order/(:any)'] = 'pages/finalize_order/$1';
$route['remove_request_item/(:any)/(:any)'] = 'pages/remove_request_item/$1/$2';
$route['save_room_charges'] = 'pages/save_room_charges';
$route['request_fbs/(:any)'] = 'pages/request_fbs/$1';
$route['print_order_slip/(:any)'] = 'pages/print_order_slip/$1';
$route['track_invoice'] = 'pages/track_invoice';
$route['print_receipt/(:any)'] = 'pages/print_receipt/$1';
$route['save_payment'] = 'pages/save_payment';
$route['remove_all_discount/(:any)'] = 'pages/remove_all_discount/$1';
$route['add_discount'] = 'pages/add_discount';
$route['add_single_discount'] = 'pages/add_single_discount';
$route['remove_order'] = 'pages/remove_order';
$route['change_qty'] = 'pages/change_qty';
$route['add_item/(:any)'] = 'pages/add_item/$1';
$route['cancel_transaction/(:any)'] = 'pages/cancel_transaction/$1';
$route['new_transaction'] = 'pages/new_transaction';
$route['point_of_sale'] = 'pages/point_of_sale';
$route['save_stock_image'] = 'pages/save_stock_image';
$route['add_stock_quantity'] = 'pages/add_stock_quantity';
$route['manage_stock_quantity'] = 'pages/manage_stock_quantity';
$route['delete_stocks/(:any)'] = 'pages/delete_stocks/$1';
$route['save_stocks'] = 'pages/save_stocks';
$route['manage_stocks'] = 'pages/manage_stocks';
$route['delete_charges'] = 'pages/delete_charges';
$route['save_charges'] = 'pages/save_charges';
$route['reservation_details/(:any)'] = 'pages/reservation_details/$1';
$route['check_out/(:any)'] = 'pages/check_out/$1';
$route['check_in'] = 'pages/check_in';
$route['cancel_reservation'] = 'pages/cancel_reservation';
$route['update_reservation_package'] = 'pages/update_reservation_package';
$route['update_reservation'] = 'pages/update_reservation';
$route['change_room_hk_status'] = 'pages/change_room_hk_status';
$route['manage_housekeeping'] = 'pages/manage_housekeeping';
$route['print_voucher/(:any)'] = 'pages/print_voucher/$1';
$route['print_reg_form/(:any)'] = 'pages/print_reg_form/$1';
$route['manage_reservation/(:any)'] = 'pages/manage_reservation/$1';
$route['save_reservation_package'] = 'pages/save_reservation_package';
$route['save_reservation'] = 'pages/save_reservation';
$route['view_available/(:any)'] = 'pages/view_available/$1';
$route['delete_package/(:any)'] = 'pages/delete_package/$1';
$route['save_package'] = 'pages/save_package';
$route['manage_package'] = 'pages/manage_package';
$route['delete_room/(:any)'] = 'pages/delete_room/$1';
$route['save_room_image'] = 'pages/save_room_image';
$route['save_room'] = 'pages/save_room';
$route['manage_room'] = 'pages/manage_room';
$route['save_logo'] = 'pages/save_logo';
$route['save_info'] = 'pages/save_info';
$route['manage_info'] = 'pages/manage_info';
$route['delete_users/(:any)'] = 'pages/delete_users/$1';
$route['save_users'] = 'pages/save_users';
$route['manage_users'] = 'pages/manage_users';
$route['delete_department/(:any)'] = 'pages/delete_department/$1';
$route['save_department'] = 'pages/save_department';
$route['manage_department'] = 'pages/manage_department';
$route['main'] = 'pages/main';
$route['logout'] = 'pages/logout';
$route['authenticate'] = 'pages/authenticate';
$route['default_controller'] = 'pages/index';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
