<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Anasayfa extends NR_Controller
	{
		public function __construct() {
			parent::__construct();
		}
		
		public function index() {

			$bloglar = json_decode($this->Nrmod->blogGetir(3));
	        $data["bloglar"] = $bloglar;

	        $feed = json_decode($this->Nrmod->feedOku(8));
	        $data["feeds"] = $feed;

	        $bloglar = json_decode($this->Nrmod->tagOku(4));
	        $data["tags"] = $bloglar;
			
			$this->load->view("disSayfa2", $data);
		}
		
		function giriss() {
			
			$this->load->view("instagram/giris2.php");
		}

		function kontrol() {

			if($this->session->userdata("rekey"))
        	{
			
				$this->load->view("instagram/kontrol.php");
			}
			else
			{
				redirect(base_url("giriss"));
			}

		}
		
		function yonlendiriliyor() {
			
			if($this->config->item("reklamAktif") == 1) {
				redirect(base_url("gecis"));
			} else {
				redirect(base_url("panel"));
			}
		}

		function satinAl() {

			$this->load->view("satinAl");
		}

		function girisYap() {
			
			redirect(base_url("giriss"));
		}

		function packages() {
			
			redirect(base_url("satin-al"));
		}
		
		function vipGiris() {
			if($this->session->userdata("vip")) {
				redirect("vip");
			}
			$this->load->view("vip/giris");
		}
		
		function vipGirisIslem() {
			
			$kontrol = $this->Nrmod->tekGetir([
				"email" => $this->input->post("email"),
				"sifre" => $this->input->post("sifre"),
			], "vipler");
			
			if($kontrol) {
				$rand = rand(1, 9999999999999);
				
				$sessIDler = $kontrol->sessID;
				
				$yeniSessIDler = $this->rastgeleSessIDler($sessIDler, $rand);
				
				$this->Nrmod->duzenle(["id" => $kontrol->id], "vipler", ["sessID" => $yeniSessIDler]);
				$this->session->set_userdata("vip", $kontrol);
				$this->session->set_userdata("sessID", $rand);
				
				redirect("vip");
			}
			
			redirect("vip/giris?hata=1");
		}
		
		function rastgeleSessIDler($sessIDler, $rand) {
			$sessIDler = (array) json_decode($sessIDler);
			if(! is_array($sessIDler)) {
				$sessIDler = [];
			}
			
			$sessIDler[time()] = $rand;
			
			$sinir = $this->config->item("vipAyniAndaKacSekme");
			
			krsort($sessIDler);
			$yeniIDler = [];
			$i = 1;
			
			foreach($sessIDler as $s => $r) {
				if($i <= $sinir) {
					$yeniIDler[$s] = $r;
				}
				$i++;
			}
			
			return json_encode($yeniIDler);
		}
	}

