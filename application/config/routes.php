<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//USER
$route['spanduk_indoor'] = 'PesanController/pesanSpandukIndoor';
$route['x-banner'] = 'PesanController/pesanXBanner';
$route['spanduk_outdoor'] = 'PesanController/pesanSpandukOutdoor';


$route['spanduk'] = 'PesanController/pesanSpanduk';
$route['stiker'] = 'PesanController/pesanStiker';
$route['kartu'] = 'PesanController/pesanKartu';
$route['flyer'] = 'PesanController/pesanFlyer';
$route['brosur'] = 'PesanController/pesanBrosur';
$route['kartu_nama'] = 'PesanController/pesanKartuNama';
$route['undangan'] = 'PesanController/pesanKartuUndangan';
$route['kalender_meja'] = 'PesanController/pesanKalenderMeja';
$route['sertifikat'] = 'PesanController/pesanSertifikat';



$route['hapus/spanduk/(:any)'] = 'PesanController/hapusSpanduk/$1';
$route['hapus/xbanner/(:any)'] = 'PesanController/hapusXbanner/$1';
$route['hapus/spanduk_outdoor/(:any)'] = 'PesanController/hapusSpandukOutdoor/$1';
$route['hapus/brosur/(:any)'] = 'PesanController/hapusBrosur/$1';
$route['hapus/kalender/(:any)'] = 'PesanController/hapusKalender/$1';
$route['hapus/kartunama/(:any)'] = 'PesanController/hapusKartuNama/$1';
$route['hapus/undangan/(:any)'] = 'PesanController/hapusUndangan/$1';
$route['hapus/sertifikat/(:any)'] = 'PesanController/hapusSertifikat/$1';
$route['hapus/flyer/(:any)'] = 'PesanController/hapusFlyer/$1';


$route['keranjang'] = 'BayarController/keranjang';
$route['bayar/(:any)'] = 'BayarController/bayar/$1';
$route['selesai/(:any)/(:any)'] = 'BayarController/selesai/$1/$2';
$route['konfirmasi/(:any)'] = 'BayarController/konfirmasi/$1';

$route['profil'] = 'ProfilController/index';
$route['pesanan'] = 'ProfilController/pesanan';
$route['desain/(:any)'] = 'ProfilController/desain/$1';
$route['detail-desain/(:any)'] = 'ProfilController/detailDesain/$1';
$route['detail-pesanan/(:any)'] = 'ProfilController/detailPesanan/$1';
$route['edit_profil'] = 'ProfilController/profil';


//ADMIN
$route['admin/dashboard'] = 'admin/dashboard_admin';

$route['admin/produk'] = 'admin/data_produk';
$route['admin/bahan'] = 'admin/data_produk/lihat_bahan';
$route['admin/finishing'] = 'admin/data_produk/lihat_finishing';
$route['admin/laminasi'] = 'admin/data_produk/lihat_laminasi';

$route['admin/edit_bahan'] = 'admin/data_produk/edit_bahan';

$route['admin/harga_bahan'] = 'admin/harga/harga_bahan';
$route['admin/edit_harga_bahan'] = 'admin/harga/edit_harga_bahan';
$route['admin/harga_laminasi'] = 'admin/harga/harga_laminasi';

$route['admin/rekening'] = 'admin/rekening/index';
$route['admin/edit_rekening'] = 'admin/rekening/edit_rekening';
$route['admin/hapus_rekening'] = 'admin/rekening/hapus_rekening';


$route['admin/pelanggan'] = 'admin/PelangganController';
$route['admin/transaksi'] = 'admin/TransaksiController';
$route['admin/transaksi/lihat/(:any)'] = 'admin/TransaksiController/lihat/$1';
$route['admin/transaksi/konfirmasi/(:any)'] = 'admin/TransaksiController/konfirmasi/$1';
$route['admin/transaksi/konfirmasi_tdk_sesuai/(:any)'] = 'admin/TransaksiController/konfirmasi_tdk_sesuai/$1';

$route['admin/transaksi/email/(:any)'] = 'admin/TransaksiController/email/$1';

$route['admin/pesanan'] = 'admin/PesananController';
$route['admin/pesanan/lihat/(:any)'] = 'admin/PesananController/lihat/$1';
$route['admin/pesanan/foto/(:any)'] = 'admin/PesananController/foto/$1';
$route['admin/pesanan/desain/(:any)'] = 'admin/PesananController/desain/$1';
$route['admin/pesanan/selesai/(:any)'] = 'admin/PesananController/selesai/$1';

$route['admin/antrian_satu'] = 'admin/TransaksiController/antrian_satu';
$route['admin/antrian_dua'] = 'admin/TransaksiController/antrian_dua';

$route['admin/user'] = 'admin/dashboard_admin/user';


//OPERATOR
$route['operator/dashboard'] = 'operator/OperatorController';

$route['operator/pesanan'] = 'operator/PesananController';
$route['operator/pesanan/lihat/(:any)'] = 'operator/PesananController/lihat/$1';
$route['operator/pesanan/edit_status/(:any)'] = 'operator/PesananController/edit_status/$1';
$route['operator/pesanan/hapus/(:any)'] = 'operator/PesananController/hapus/$1';

$route['operator/pesanan/foto/(:any)'] = 'operator/PesananController/foto/$1';
$route['operator/pesanan/desain/(:any)'] = 'operator/PesananController/desain/$1';
$route['operator/pesanan/selesai/(:any)'] = 'operator/PesananController/selesai/$1';

$route['operator/pesanan_cetak'] = 'operator/PesananCetak';
$route['operator/pesanan/edit_status_cetak/(:any)'] = 'operator/PesananCetak/edit_status/$1';

$route['operator/pesanan_selesai'] = 'operator/PesananSelesaiController';
