<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends NR_Controller {

	function __construct(){
		parent::__construct();
		$this->uyelikKontrol();
	}

	function index(){
		$header['title'] = "Anasayfa";
		$header['sayfa'] = "anasayfa";

		$this->load->view("panel/header", $header);
		$this->load->view("panel/anasayfa");
		$this->load->view("panel/footer");
	}

    function takipci(){
        $header['title'] = "Takipçi Gönder";
        $header['sayfa'] = "Takipçi Gönder";

        $this->load->view("panel/header", $header);
        $this->load->view("panel/takipci");
        $this->load->view("panel/footer");
    }

	function begeni(){
		$header['title'] = "Beğeni Gönder";
		$header['sayfa'] = "Beğeni Gönder";

		$this->load->view("panel/header", $header);
		$this->load->view("panel/begeni");
		$this->load->view("panel/footer");
	}

	function takipGonder(){

		//gelen istekleri değerlere atıyoruz.
		$userid = $this->input->post("link");
		$kAdi   = $this->input->post("kadi");
		$adet   = intval($this->input->post("adet"));

		//gelen değerler boş ise hata ver.
		if( !$userid  || !$adet )
        {
		$sonuc = array(
            "status"  => "error",
            "message" => "Bilgiler eksik. Kontrol Edin.",
        );

        echo json_encode($sonuc);
        exit;
		}

        //istenilen miktar 0 yada daha küçük ise hata ver.
		if($adet <= 0)
        {
			$sonuc = array(
	            "status"  => "error",
	            "message" => "Girdiğiniz adet hatalı. 0'dan büyük bir rakam olmalı.",
	        );

	        echo json_encode($sonuc);
	        exit;
		}

        //kullanıcının bilgilerini çekiyoruz.
		$uye = $this->Nrmod->tekGetir(array("igID" => $this->uye->igID), "uyeler");

        //kullanıcının kredisi 0 veya daha düşük ise hata ver.
		if($uye->takipKredi <= 0)
        {
			$sonuc = array(
            "status"  => "error",
            "message" => "Takipçi Göndermek için Krediniz kalmadı.",
	        );

	        echo json_encode($sonuc);
			exit;
		}

        //kullanıcı kredisinden fazla girmiş ise miktarı krediye eşitle.
		if($adet > $uye->takipKredi)
        {
			$adet = $uye->takipKredi;
		}

        //daha önce takipçi gönderilmişse session'a karışmıyoruz. Gönderilmemişse 0 olarak ayarlıyoruz.
        if(is_null($this->session->userdata("userFollowArray".$userid)))
        {
            $this->session->set_userdata("userFollowArray".$userid, "0");
        }

        //session'a değer atıyoruz
        $userFollowArray = $this->session->userdata("userFollowArray".$userid);


        //auth sisteme gönderilecek değerleri ekliyoruz.
        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "username"  => $kAdi,
            "userID"    => $userid,
            "userIDs"   => $userFollowArray,
            "miktar"    => $adet
        );

        //değerleri auth sisteme post ediyoruz. 
        $ig = $this->Nrmod->post("follow",$data);

        //gelen veriyi json tipine dönüştürüyoruz.
        $ig = json_decode($ig,true);

        //eğer işlem başarılı ise..
		if($ig["status"] == "ok")
        {

            //başarılı gönderilen takipçi sayısını değere atayalım.
            $basarili = $ig['basarili'];

            //kaç adet takipçi gönderildi ise kullanıcının kredisinden çıkarıyoruz.
            $this->db->query("UPDATE uyeler SET takipKredi=takipKredi-".$basarili." WHERE id=".$this->uye->id);

            //kullanıcının güncel takipçi kredisini kaydediyoruz.
            $yeniKredi = $this->uye->takipKredi-$basarili;

            //takip istediğinde bulunan kullanıcıları bir daha göndermesin diye kaydediyoruz.
            $this->session->set_userdata("userFollowArray".$userid, $ig["userIDs"]);

            //çıktı için değerleri yazıyoruz..
            $sonuc = array(
                "status"    => "ok",
                "basarili"  => $basarili,
                "kredi"     => $yeniKredi,
                "user"      => $this->session->userdata("userFollowArray".$userid),
            );

            //yazdırıyoruz
            print_r(json_encode($sonuc));

        }
        //işlem başarılı olmaz ise
        else
        {
            //dönüşü ekrana yazıyoruz.
            print_r(json_encode($ig));
        }
	

	}

	function begeniGonder(){

		//gelen istekleri değerlere atıyoruz.
		$mediaID = $this->input->post("link");
		$mediaCode   = $this->input->post("code");
		$adet   = intval($this->input->post("adet"));

		//gelen değerler boş ise hata ver.
		if( !$mediaID  || !$mediaCode )
        {
		$sonuc = array(
            "status"  => "error",
            "message" => "Bilgiler eksik. Kontrol Edin.",
        );

        echo json_encode($sonuc);
        exit;
		}

        //istenilen miktar 0 yada daha küçük ise hata ver.
		if($adet <= 0)
        {
			$sonuc = array(
	            "status"  => "error",
	            "message" => "Girdiğiniz adet hatalı. 0'dan büyük bir rakam olmalı.",
	        );

	        echo json_encode($sonuc);
	        exit;
		}

        //kullanıcının bilgilerini çekiyoruz.
		$uye = $this->Nrmod->tekGetir(array("igID" => $this->uye->igID), "uyeler");

        //kullanıcının kredisi 0 veya daha düşük ise hata ver.
		if($uye->begeniKredi <= 0)
        {
			$sonuc = array(
            "status"  => "error",
            "message" => "Takipçi Göndermek için Krediniz kalmadı.",
	        );

	        echo json_encode($sonuc);
			exit;
		}

        //kullanıcı kredisinden fazla girmiş ise miktarı krediye eşitle.
		if($adet > $uye->begeniKredi)
        {
			$adet = $uye->begeniKredi;
		}

        //daha önce takipçi gönderilmişse session'a karışmıyoruz. Gönderilmemişse 0 olarak ayarlıyoruz.
        if(is_null($this->session->userdata("userLikeArray".$mediaID)))
        {
            $this->session->set_userdata("userLikeArray".$mediaID, "0");
        }

        //session'a değer atıyoruz
        $userLikeArray = $this->session->userdata("userLikeArray".$mediaID);


        //auth sisteme gönderilecek değerleri ekliyoruz.
        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "mediaID" 	=> $mediaID,
            "mediaCode" => $mediaCode,
            "userIDs"   => $userLikeArray,
            "miktar"    => $adet
        );

        //değerleri auth sisteme post ediyoruz. 
        $ig = $this->Nrmod->post("like",$data);

        //gelen veriyi json tipine dönüştürüyoruz.
        $ig = json_decode($ig,true);

        //eğer işlem başarılı ise..
		if($ig["status"] == "ok")
        {

            //başarılı gönderilen takipçi sayısını değere atayalım.
            $basarili = $ig['basarili'];

            //kaç adet takipçi gönderildi ise kullanıcının kredisinden çıkarıyoruz.
            $this->db->query("UPDATE uyeler SET begeniKredi=begeniKredi-".$basarili." WHERE id=".$this->uye->id);

            //kullanıcının güncel takipçi kredisini kaydediyoruz.
            $yeniKredi = $this->uye->begeniKredi-$basarili;

            //takip istediğinde bulunan kullanıcıları bir daha göndermesin diye kaydediyoruz.
            $this->session->set_userdata("userLikeArray".$mediaID, $ig["userIDs"]);

            //çıktı için değerleri yazıyoruz..
            $sonuc = array(
                "status"    => "ok",
                "basarili"  => $basarili,
                "kredi"     => $yeniKredi,
                "user"      => $this->session->userdata("userLikeArray".$mediaID),
            );

            //yazdırıyoruz
            print_r(json_encode($sonuc));

        }
        //işlem başarılı olmaz ise
        else
        {
            //dönüşü ekrana yazıyoruz.
            print_r(json_encode($ig));
        }
	

	}

	function uyelikKontrol(){

		$uye = $this->session->userdata("uye");

		if(!$uye){
			redirect(base_url());
		}else {

			$kontrol = $this->Nrmod->tekGetir(array("igID" => $uye['igID']), "uyeler");
			$sessID = $this->session->userdata("sessID");

			if($kontrol->sessID != $sessID){
				$this->cikis();
			}

			if(!$kontrol){	
				$this->cikis();
			}

			$data['uye'] = $kontrol;
			$this->uye = $kontrol;

			$this->load->vars($data);

		}

	}

	function cikis(){

        $this->session->set_userdata("uye", null);
        $this->session->unset_userdata("sessID");
		$this->session->unset_userdata("rekey");
		redirect(base_url());

	}

	function servis(){
		$header['title'] = "Servis Yok";
		$header['sayfa'] = "servis yok";

		$this->load->view("panel/header", $header);
		$this->load->view("panel/servisyok");
		$this->load->view("panel/footer");
	}

	function gecis(){

		$this->load->view("panel/gecis");
	}

	function tools(){

		redirect(base_url("panel"));
	}

}
