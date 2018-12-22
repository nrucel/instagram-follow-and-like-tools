<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

$route['default_controller'] 			= 'Anasayfa';
$route['giriss'] 						= "Anasayfa/giriss";
$route['giris'] 						= "Anasayfa/girisYap";
$route['giris-yap'] 					= "Anasayfa/girisYap";
$route['yonlendiriliyor'] 				= "Anasayfa/yonlendiriliyor"; 
$route['vip/giris'] 					= "Anasayfa/vipGiris";
$route['vip/giris/islem'] 				= "Anasayfa/vipGirisIslem";
$route['satin-al'] 						= "Anasayfa/satinAl";
$route['packages'] 						= "Anasayfa/packages";
$route['kontrol'] 						= "Anasayfa/kontrol";

$route['blog'] 							= "Blog/index";
$route['blog/(:any)'] 					= "Blog/blogDetay/$1";
$route['feed'] 							= "Blog/feed";
$route['feed/(:any)'] 					= "Blog/feedDetay/$1";
$route['user'] 							= "Blog/user";
$route['user/(:any)'] 					= "Blog/userDetay/$1";
$route['tag'] 							= "Blog/tag";
$route['tag/(:any)'] 					= "Blog/tagDetay/$1";

$route['login'] 						= "Login/login";

$route['panel'] 						= "Panel/index"; 
$route['panel/cikis'] 					= "Panel/cikis"; 
$route['gecis'] 						= "Panel/gecis";
$route['tools'] 						= "Panel/tools";
$route['tools/send-follower'] 			= "Panel/tools";
$route['tools/send-like'] 				= "Panel/tools";
$route['araclar'] 						= "Panel/tools";
$route['araclar/begeni-gonder'] 		= "Panel/tools";
$route['araclar/takipci-gonder'] 		= "Panel/tools";

$route['vip'] 							= "Vip/index";
$route['vip/uye-ekle'] 					= "Vip/uyeEkle";
$route['vip/uye-ekle/islem'] 			= "Vip/uyeEkleIslem";
$route['vip/uyeler'] 					= "Vip/uyeler";
$route['vip/uye-duzenle/(:num)'] 		= "Vip/uyeDuzenle/$1";
$route['vip/uye-duzenle/islem/(:num)'] 	= "Vip/uyeDuzenleIslem/$1";
$route['vip/uye-sil/(:num)'] 			= "Vip/uyeSil/$1";
$route['vip/uye-sil/islem/(:num)'] 		= "Vip/uyeSilIslem/$1";
$route['vip/istek/(:num)'] 				= "Vip/istekDetayi/$1";
$route['vip/cikis/'] 					= "Vip/cikis/";

$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
