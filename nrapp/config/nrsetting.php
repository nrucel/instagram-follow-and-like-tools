<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
|ÖNEMLİ AYARLAR DÜZENLEYİN
|--------------------------------------------------------------------------
*/

//AuthKey
$config['AuthKey'] = "bced49e4a04cacb38ff54f0e0db999";

//Google recaptcha key ve secret
define('GoogleDogrulamaKey', '6LdhJQ0UAAAGZ5I9YmT9YJEBBX43hjP436rmiJ');
define('GoogleDogrulamaSecret', '6LdhJQ0UAAAAAP-d-8RDq__HhjIr5hpdPJX9Er');

//cron çalıştırırken kullanılacak key
$config['cronKey'] = "nrc49cron";

/*
|--------------------------------------------------------------------------
| Sistem Genel Ayarları
|--------------------------------------------------------------------------
|
| Aşağıda sistemin çalışabilmesi için tüm ayarlar eklenmiştir.
| ayarların açıklamaları üstlerinde detaylı şekilde yazmaktadır.
| Gerekli düzeltmeleri yapabilirsiniz..
|
*/

//sitenizin başlığı
$config['siteAdi'] = "nettakipci";

//sitenizin adresi. adresi otomatik alır.
$config['siteAdresi'] = $_SERVER['SERVER_NAME'];

//Yönetici Mail Adresi
$config['varsayilanGonderenMaili'] = "nurullahcelik@yandex.com";
$config['varsayilanGonderenIsmi'] = $config['siteAdresi'];
$config['bildirimEmailleri'] = array("nurullahcelik@yandex.com");

//görünürde olan mail @ yerine [at] yazınız
$config['gorunurMail'] = "nurullahcelik[at]yandex.com";


//iletişim telefon numarası
$config['yoneticiTel'] = "+90 850 304 16 49";

//whos.amung - google vb. izleme kodlarını ekleyebilirsin.
$config['analitik'] = '<div id="counter" style="display:none;"><img src="https://whos.amung.us/widget/nrucel.png"></div>';

//bir hesabın aynı anda kaç tarayıcıda yada sekmede açılsın. öneri: 1
$config['vipAyniAndaKacSekme'] = 1;

//Google Console'da siteniz için doğrulama kodunu yaz
$config['googleVerify'] = "";

/*
|--------------------------------------------------------------------------
|KREDİ VE GİRİŞ AYARLARI
|--------------------------------------------------------------------------
*/

//Resimsiz üyelerin giriş yapmasını istemiyorsan 1 yap
$config['resimsizUye'] = 0;

//ilk Kez giriş yapan birine verilecek takipçi kredisi
$config['yeniUyeTakipKredi'] = 30;
//tekrar giriş yapan birine verilecek takipçi kredisi
$config['tekrarUyeTakipKredi'] = 30;

//ilk Kez giriş yapan birine verilecek beğeni kredisi
$config['yeniUyeBegeniKredi'] = 30;
//tekrar giriş yapan birine verilecek beğeni kredisi
$config['tekrarUyeBegeniKredi'] = 30;

//ilk Kez giriş yapan birine verilecek yorum kredisi
$config['yeniUyeYorumKredi'] = 30;
//tekrar giriş yapan birine verilecek yorum kredisi
$config['tekrarUyeYorumKredi'] = 30;

//ilk Kez giriş yapan birine verilecek story kredisi
$config['yeniUyeStoryKredi'] = 30;
//tekrar giriş yapan birine verilecek story kredisi
$config['tekrarUyeStoryKredi'] = 30;

//ilk Kez giriş yapan birine verilecek video izlenme kredisi
$config['yeniUyeVideoKredi'] = 30;
//tekrar giriş yapan birine verilecek video izlenme kredisi
$config['tekrarUyeVideoKredi'] = 30;

//ilk Kez giriş yapan birine verilecek save kredisi
$config['yeniUyeSaveKredi'] = 30;
//tekrar giriş yapan birine verilecek save kredisi
$config['tekrarUyeSaveKredi'] = 30;

//ilk Kez giriş yapan birine verilecek yorum beğeni kredisi
$config['yeniUyeYorumBegeniKredi'] = 30;
//tekrar giriş yapan birine verilecek yorum beğeni kredisi
$config['tekrarUyeYorumBegeniKredi'] = 30;

//ilk Kez giriş yapan birine verilecek canlı yayın kredisi
$config['yeniUyeCanliYayinKredi'] = 30;
//tekrar giriş yapan birine verilecek canlı yayın kredisi
$config['tekrarUyeCanliYayinKredi'] = 30;

//banlamak istediğin üyelerin instagram ID'lerini yaz. Birden çok ID ekleyeceksen aralarında virgül olsun
$config['uyeBanla'] = "";


/*
|--------------------------------------------------------------------------
|REKLAM AYARLARI
|--------------------------------------------------------------------------
|
| Aşağıdaki reklam kodu responsivedir. düzgün çalışmaktadır
| kendi reklam kodunuz için sadece sayıları değiştirin
| data-ad-client="" ve data-ad-slot="" değiştirmeniz yeterli
|
*/

//Reklamları aktif etmek için 1 , pasif yapmak için 0 yazın
$config['reklamAktif'] = 0;
$config['reklamKodu'] = '<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><ins class="adsbygoogle"	style="display:block"	data-ad-client="ca-pub-87734405190388"	data-ad-slot="95767699"	data-ad-format="auto"></ins><script>(adsbygoogle = window.adsbygoogle || []).push({});</script></center>';



/*
|--------------------------------------------------------------------------
|INSTAGRAM PAYLAŞIM ÇEKME AYARI
|--------------------------------------------------------------------------
|
|feed ve tag çekmek için çalışan hesap bilgilerini yaz.
|Popüler paylaşımlar hesabın takip ettiği kişilere göre belirlenir.
|Sağlıklı feed için sıfır hesap ve sadece fenomen kişileri takip edin. 
|
*/

//kullanıcı giriş bilgileri
$config['feedUsername'] = "username";
$config['feedPassword'] = "password";

//çekilmesini istediğiniz tag'ler
$config['tags'] = array("turkey","tbt");

/*
|--------------------------------------------------------------------------
|TASARIM KLASÖRLERİ
|--------------------------------------------------------------------------
|
|$_SERVER['SERVER_NAME'] Sitenin adresini otomatik alır
|
*/

//Anasayfa için css,jss kodlarının olduğu klasor
$config['disSayfaConfig'] = "https://".$_SERVER['SERVER_NAME']."/assets/dis/";

//genel css js dosyalarının barındığı klasor
$config['genelConfig'] = "https://".$_SERVER['SERVER_NAME']."/assets/";

/*
|--------------------------------------------------------------------------
|MENU AYARLARI
|--------------------------------------------------------------------------
|
|array şeklinde çalışır
|menu = menünün adı
|link = menünün yönlendirelecği adres
|yeniSekme = yeni sekmede açılmasını istiyorsanız 1 yapın
|altMenu = açılır menu olduğunu belirtir içine eklenecek menüler aynı sistem array olmalı
|
*/

$config['disMenuler'] = array(
	array(
		"menu" => "Satın Al",
		"link" => "https://".$_SERVER['SERVER_NAME']."/satin-al",
		"yeniSekme" => 0
	),
	array(
		"menu" => "Blog",
		"link" => "https://".$_SERVER['SERVER_NAME']."/blog",
		"yeniSekme" => 0
	),
	array(
		"menu" => "Facebook Hile",
		"altMenu" => array(
			array(
				"menu" => "Facebook Beğeni",
				"link" => "https://begen.app",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Emoji Beğeni",
				"link" => "https://begen.app/reaction",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Sayfa Beğeni",
				"link" => "https://begen.app/sayfabegeni",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Takipçi Arttırma",
				"link" => "https://begen.app/takipci",
				"yeniSekme" => 1
			),
		)
	),
	array(
		"menu" => "instagram Hile",
		"altMenu" => array(
			array(
				"menu" => "Instagram Takipçi",
				"link" => "https://takipapp.com",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Instagram Takipçi 2",
				"link" => "https://igturk.net",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Instagram Takipçi 3",
				"link" => "https://begenapp.io",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Instagram Takipçi 4",
				"link" => "https://takipciapp.net",
				"yeniSekme" => 1
			),
		)
	),
	array(
		"menu" => "Youtube Hile",
		"altMenu" => array(
			array(
				"menu" => "Youtube Abone 1",
				"link" => "https://aboneapp.com",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Youtube Beğeni",
				"link" => "https://aboneapp.com",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Youtube Yorum",
				"link" => "https://aboneapp.com",
				"yeniSekme" => 1
			),
			array(
				"menu" => "Youtube Abone 2",
				"link" => "https://aboneapp.net",
				"yeniSekme" => 1
			),
		)
	),
);