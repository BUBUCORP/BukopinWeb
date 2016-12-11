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

//jbimageupload tinymce plugin
$route['upload/english'] = 'uploader/upload';

$route['default_controller'] = 'page';
$route['404_override'] = 'page/error';
$route['page/siaran-pers'] = 'page/siaranpers';
$route['page/siaran-pers/(:num)'] = 'page/siaranpers/$1';

$route['page/laporan-tahunan'] = 'page/laporantahunan';
$route['page/laporan-tahunan/(:num)'] = 'page/laporantahunan/$1';

$route['page/laporan-keuangan-tahunan'] = 'page/laporankeutahun';
$route['page/laporan-keuangan-tahunan/(:num)'] = 'page/laporankeutahun/$1';

$route['page/laporan-keuangan-bulanan'] = 'page/laporankeubulanan';
$route['page/laporan-keuangan-bulanan/(:num)'] = 'page/laporankeubulanan/$1';

$route['page/laporan-keuangan-triwulan'] = 'page/laporankeutriwulan';
$route['page/laporan-keuangan-triwulan/(:num)'] = 'page/laporankeutriwulan/$1';

$route['page/laporan-keuangan-triwulan-likuiditas'] = 'page/laporankeutriwulanlikuiditas';
$route['page/laporan-keuangan-triwulan-likuiditas/(:num)'] = 'page/laporankeutriwulanlikuiditas/$1';

$route['page/laporan-keuangan-triwulan-konsolidasi'] = 'page/laporankeutriwulankonsolidasi';
$route['page/laporan-keuangan-triwulan-konsolidasi/(:num)'] = 'page/laporankeutriwulankonsolidasi/$1';


$route['page/berita'] = 'page/berita';
$route['page/berita/(:num)'] = 'page/berita/$1';
$route['page/lowongan-pekerjaan'] = 'page/lowonganpekerjaan';
$route['page/katalog-belanja'] = 'page/katalogbelanja';
$route['page/promo'] = 'page/promo';


/* PAGE PRODUK DANA */ 
$route['produk-dana/pembukaan-rekening-online'] = 'page/pembukaanrekeningonline'; 
$route['tentang-bukopin/bank-koresponden'] = 'page/bankkoresponden';  
$route['tentang-bukopin/tanggung-jawab-sosial'] = 'page/tanggungjawab'; 
$route['tentang-bukopin/tanggung-jawab-sosial/(:num)'] = 'page/tanggungjawab/$1';  
$route['hubungi-kami'] = 'page/hubungikami'; 
//CreditCard
$route['produk-kredit/creditcard'] = 'page/creditcard'; 

$route['read/(:any)-(:any)'] = "page/read/$1/$2";
$route['pages/(:any)-(:any)'] = "page/pages/$1";
 

$route['translate_uri_dashes'] = FALSE;
