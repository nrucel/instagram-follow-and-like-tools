<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NR_Controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		$this->degiskenAktar();
	}

	function degiskenAktar(){
		$data['dsc'] 					  = $this->config->item("disSayfaConfig");
		$data['gc']  					  = $this->config->item("genelConfig");
		$data['siteAdi']  				  = $this->config->item("siteAdi");
		$data['siteAdresi']  			  = $this->config->item("siteAdresi");
		$data['disMenuler']  			  = $this->config->item("disMenuler");
		$data['varsayilanGonderenMaili']  = $this->config->item("varsayilanGonderenMaili");
		$data['gorunurMail']  			  = $this->config->item("gorunurMail");
		$data['yoneticiTel']  			  = $this->config->item("yoneticiTel");
		$data['analitik']  				  = $this->config->item("analitik");
		$data['googleVerify']  			  = $this->config->item("googleVerify");

		$this->load->vars($data);
	}


	function uyariVer($ayarlar){
		extract($ayarlar);
		
		if(!isset($title)) $title = "Hata !!";
		if(!isset($tur)) $tur = "hata";
		
		$uyari = array(
			"title" => $title,
			"icerik" => $icerik,
			"tur" => $tur
		);
		
		if(isset($otoKapat)){
			$uyari["otoKapat"] = $otoKapat; 
		}
		
		$this->session->set_flashdata("uyari", $uyari);
		redirect($link);
	}

	
}