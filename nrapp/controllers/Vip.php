<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Vip extends NR_Controller {
	function __construct(){

		parent::__construct();
		$this->vipKontrol();
	}

	function index(){

		$this->load->view("vip/header");
        $this->load->view("vip/bilgi");
        $this->load->view("vip/footer");

	}

	function vipKontrol(){



		$vip = $this->session->userdata("vip");

		

		

		if(!$vip){

			redirect(base_url("vip/giris"));

		}else {

			$kontrol = $this->Nrmod->tekGetir(array("id" => $vip->id), "vipler");

			$sessID = $this->session->userdata("sessID");

			

			$sessIDler = (array)json_decode($kontrol->sessID);

			

			if(!in_array($sessID, $sessIDler)){

				$this->cikis();

			}



			if(!$kontrol){

				$this->cikis();

			}

			$data['vip'] = $kontrol;

			$this->vip = $kontrol;

			$this->load->vars($data);

		}

	}

	

	function cikis($redirect = true){

		$this->session->set_userdata("vip", null);

		if($redirect){

			redirect(base_url("vip/giris"));

		}

	}

	

	function uyeEkle(){

		$this->yetkiGerekli();

		$this->load->view("vip/header");

		$this->load->view("vip/uyeEkle");

		$this->load->view("vip/footer");

		

	}

	

	function uyeEkleIslem() {

		$this->yetkiGerekli();

		$adSoyad = $this->input->post("adSoyad");

		$email = $this->input->post("email");

		$sifre = $this->input->post("sifre");

		$vipeNot = $this->input->post("vipeNot");

		

		if(!$adSoyad || !$email || !$sifre){

			$this->session->set_flashdata('hata', 'Bilgiler eksik');

			redirect("vip/uye-ekle");

		}

		

		$emailKontrol = $this->Nrmod->tekGetir(array("email" => $email), "vipler");

		if($emailKontrol){

			$this->session->set_flashdata('hata', 'Bu email sistemde kayıtlı.');

			redirect("vip/uye-ekle");

		}

		$ekle = $this->Nrmod->ekle(
			"vipler",
			array(
				"adSoyad" => $adSoyad,
				"sifre"   => $sifre,
				"email"   => $email,
				"yetkili" => 0,
				"vipeNot" => $vipeNot,
			)

		);

		

		if($ekle){

			$this->session->set_flashdata('basarili', 'Vip başarıyla eklendi.');

			redirect("vip/uye-ekle");

		}else {

			$this->session->set_flashdata('hata', 'Vip eklenemedi. Lütfen tekrar dene.');

			redirect("vip/uye-ekle");

		}		

	}

	

	function uyeler(){

		$this->yetkiGerekli();

		$data['uyeler'] = $this->Nrmod->cokluGetir(array(), "vipler");

		

		$this->load->view("vip/header");

		$this->load->view("vip/uyeler", $data);

		$this->load->view("vip/footer");

		

	}

	

	function uyeDuzenle($id){

		$this->yetkiGerekli();

		$data['uye'] = $this->Nrmod->tekGetir(array("id" => $id), "vipler");

		$this->load->view("vip/header");

		$this->load->view("vip/uyeDuzenle", $data);

		$this->load->view("vip/footer");

	}

	

	function uyeDuzenleIslem($id){

		$this->yetkiGerekli();

		$adSoyad = $this->input->post("adSoyad");
		$email   = $this->input->post("email");
		$sifre   = $this->input->post("sifre");
		$vipeNot = $this->input->post("vipeNot");

		if(!$adSoyad || !$email || !$sifre){

			$this->session->set_flashdata('hata', 'Bilgiler eksik');
			redirect("vip/uye-duzenle/".$id);
		}

		$duzenle = $this->Nrmod->duzenle(

			array("id" => $id),

			"vipler",

			array(

				"adSoyad" => $adSoyad,
				"sifre" => $sifre,
				"email" => $email,
				"vipeNot" => $vipeNot

			)

		);

		

		if($duzenle){

			$this->session->set_flashdata('basarili', 'Vip başarıyla güncellendi.');

			redirect("vip/uye-duzenle/".$id);

		}else {

			$this->session->set_flashdata('hata', 'Vip güncellenemedi. Lütfen tekrar dene.');

			redirect("vip/uye-duzenle/".$id);

		}		

	}

	

	function uyeSil($id){

		$this->yetkiGerekli();

		

		$data['uye'] = $this->Nrmod->tekGetir(array("id" => $id), "vipler");

		

		$this->load->view("vip/header");

		$this->load->view("vip/uyeSil", $data);

		$this->load->view("vip/footer");

	}

	

	function uyeSilIslem($id){

		$this->yetkiGerekli();

		

		$sil = $this->Nrmod->sil(array("id" => $id), "vipler");

		

		if($sil){

			$this->session->set_flashdata('basarili', 'Vip başarıyla silindi.');

			redirect("vip/uyeler");

		}else {

			$this->session->set_flashdata('hata', 'Vip silinemedi. Lütfen tekrar dene.');

			redirect("vip/uyeler");

		}	

		

	}

	

	function yetkiGerekli(){

		if($this->vip->yetkili != 1){

			redirect("vip");

		}

	}


    function blog(){

        $blogs = array();
        $blogs = array_merge($blogs, glob(APPPATH.'views/blog/yazi/*.json', GLOB_BRACE));
        foreach ($blogs as $blog) {
            preg_match('/\yazi\/(.*).json/', $blog, $sonuc);
            $data["blog"][] = $sonuc[1];
        }

        $this->load->view("vip/header");
        $this->load->view("vip/blog", $data);
        $this->load->view("vip/footer");

    }

    function blogEkle(){
        
        $this->load->view("vip/header");
        $this->load->view("vip/blogEkle");
        $this->load->view("vip/footer");

        if($this->input->post("blogUrl"))
        {

            $blogAdi      = $this->input->post("blogAdi");
            $blogAciklama = $this->input->post("blogAciklama");
            $blogAnahtar  = $this->input->post("blogAnahtar");
            $blogUrl      = $this->input->post("blogUrl");
            $blogResim    = $this->input->post("blogResim");
            $blogDetay    = $this->input->post("blogDetay");



            if(!$blogAdi || !$blogAciklama || !$blogAnahtar || !$blogUrl || !$blogDetay)
            {
                $sonuc = array(
                    'status'  => "error", 
                    'message' => "Lütfen boş alan bırakma." 
                );

                print_r(json_encode($sonuc));
                exit;
            }

            $path = APPPATH.'views/blog/yazi/'.$blogUrl.'.json';

            if (file_exists($path))
            {
                $sonuc = array(
                    'status'  => "error", 
                    'message' => $blogUrl." adında link zaten var."
                );
                print_r(json_encode($sonuc));
                exit;

            }

            touch($path);

            $yazi = array(
                    'blogUrl'       => $blogUrl,
                    'blogAdi'       => $blogAdi,
                    'zaman'         => date("d-m-Y"),
                    'blogAciklama'  => $blogAciklama,
                    'blogAnahtar'   => $blogAnahtar,
                    'blogResim'     => $blogResim,
                    'blogDetay'     => $blogDetay
            );

            $yazi = json_encode($yazi);
            
            if(file_put_contents($path, $yazi))
            {
                $sonuc = array(
                    'status'  => "ok", 
                    'message' => "Blog oluşturuldu."
                );
                print_r(json_encode($sonuc));
                exit;
            }
            else
            {   
                unlink($path);
                $sonuc = array(
                    'status'  => "error", 
                    'message' => "Blog oluşturulamadı."
                );
                print_r(json_encode($sonuc));
                exit;

            }
        }



    }

    function blogDuzenle($blog){

        $path = APPPATH.'views/blog/yazi/'.$blog.'.json';

        if (!file_exists($path))
        {
            $data["blog"] = "error";
        }
        else
        {
            $oku = file_get_contents($path);
            $data["blog"] = json_decode($oku);
        }
        
        $this->load->view("vip/header");
        $this->load->view("vip/blogDuzenle",$data);
        $this->load->view("vip/footer");

        if($this->input->post("blogUrl"))
        {

            $blogAdi      = $this->input->post("blogAdi");
            $blogAciklama = $this->input->post("blogAciklama");
            $blogAnahtar  = $this->input->post("blogAnahtar");
            $blogUrl      = $this->input->post("blogUrl");
            $blogResim    = $this->input->post("blogResim");
            $blogDetay    = $this->input->post("blogDetay");
            $zaman        = $this->input->post("zaman");



            if(!$blogAdi || !$blogAciklama || !$blogAnahtar || !$blogUrl || !$blogDetay)
            {
                $sonuc = array(
                    'status'  => "error", 
                    'message' => "Lütfen boş alan bırakma." 
                );

                print_r(json_encode($sonuc));
                exit;
            }

            $path = APPPATH.'views/blog/yazi/'.$blog.'.json';

            if (!file_exists($path))
            {
                $sonuc = array(
                    'status'  => "error", 
                    'message' => "böyle bir blog yok"
                );
                print_r(json_encode($sonuc));
                exit;

            }

            if(!$zaman){
                $zaman = date("d-m-Y");
            }

            $yazi = array(
                    'blogUrl'       => $blogUrl,
                    'blogAdi'       => $blogAdi,
                    'zaman'         => $zaman,
                    'blogAciklama'  => $blogAciklama,
                    'blogAnahtar'   => $blogAnahtar,
                    'blogResim'     => $blogResim,
                    'blogDetay'     => $blogDetay
            );

            $yazi = json_encode($yazi);
            
            if(file_put_contents($path, $yazi))
            {
                $yeni = APPPATH.'views/blog/yazi/'.$blogUrl.'.json';
                rename($path,$yeni);
                $sonuc = array(
                    'status'  => "ok", 
                    'message' => "Blog Düzenlendi."
                );
                print_r(json_encode($sonuc));
                exit;
            }
            else
            {   
                $sonuc = array(
                    'status'  => "error", 
                    'message' => "Blog Düzenlenemedi."
                );
                print_r(json_encode($sonuc));
                exit;

            }
        }



    }


    function blogSil(){

        if($this->input->post("blog"))
        {

            $blog = $this->input->post("blog");

            $path = APPPATH.'views/blog/yazi/'.$blog.'.json';

            if (!file_exists($path))
            {
                $sonuc = array(
                    'status'  => "error", 
                    'message' => "böyle bir blog yok"
                );
                print_r(json_encode($sonuc));
                exit;

            }

            unlink($path);

            $sonuc = array(
                'status'  => "ok", 
                'message' => "silindi"
            );
            print_r(json_encode($sonuc));
            exit;

        }   
    }

}