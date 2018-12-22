<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends NR_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function login(){

        $kAdi = $this->input->post("username");
        $sifre = $this->input->post("password");


        if(empty($kAdi) || empty($sifre)) {
                print_r(json_encode(array("status" => "error","message" => "Lütfen tüm bilgileri doldur.")));
                exit;
        }

        if(!preg_match('/^[a-zA-Z0-9._]+$/', $kAdi)) {

            print_r(json_encode(array("status" => "error","message" => "Giriş yapılamadı. Kullanıcı adı ve şifreni dikkatlice kontrol et lütfen.")));
            exit;

        }

        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "username"  => $kAdi,
            "password"  => $sifre
        );

        $ig = $this->Nrmod->post("login",$data);

        if(json_decode($ig)->status == "ok")
        {
            $user = json_decode($ig)->data;

            if($this->config->item("resimsizUye") == 1 && !stristr($user->igFoto, "s150x150"))
            {

               print_r(json_encode(array("status" => "error","message" => "Profil fotoğrafı olmayan hesaplar sisteme giriş yapamaz.!")));
               exit;

            }

            $banned = array();

            if($this->config->item("uyeBanla") != "")
            {

                $banned = explode(",", $this->config->item("uyeBanla"));

                if(in_array($user->igID, $banned))
                {

                    print_r(json_encode(array("status" => "error","message" => "hesabınız bu siteye girişi engellenmiştir. Yönetici ile iletişime geçiniz.")));
                    exit;

                }

            }

            $veriler = [
                "igID"              => $user->igID,
                "adSoyad"           => $user->adSoyad,
                "kullaniciAdi"      => $user->kullaniciAdi,
                "takipciSayisi"     => $user->takipciSayisi,
                "takipEdilenSayisi" => $user->takipEdilenSayisi,
                "igFoto"            => $user->igFoto,
                "ipAdres"           => $this->input->ip_address(),
            ];

            $kontrol = $this->Nrmod->tekGetir(["igID" => $user->igID, ], "uyeler");

            if($kontrol)
            {

                $kaydet = $this->Nrmod->duzenle(["igID" => $user->igID], "uyeler", $veriler);

            }
            else
            {

                    $veriler['takipKredi']        = $this->config->item("yeniUyeTakipKredi");
                    $veriler['begeniKredi']       = $this->config->item("yeniUyeBegeniKredi");
                    $veriler['yorumKredi']        = $this->config->item("yeniUyeYorumKredi");
                    $veriler['storyKredi']        = $this->config->item("yeniUyeStoryKredi");
                    $veriler['izlenmeKredi']      = $this->config->item("yeniUyeVideoKredi");
                    $veriler['saveKredi']         = $this->config->item("yeniUyeSaveKredi");
                    $veriler['yorumBegeniKredi']  = $this->config->item("yeniUyeYorumBegeniKredi");
                    $veriler['canliYayinKredi']   = $this->config->item("yeniUyeCanliYayinKredi");

                $kaydet = $this->Nrmod->ekle("uyeler", $veriler);

            }

            if($kaydet)
            {

                $this->session->set_userdata("rekey", $user->igID);
                
                $this->session->set_userdata("uye", $veriler);
                print_r(json_encode(array("status" => "ok","message" => "Başarılı. Giriş yapıyorsunuz..")));
            }
            else
            {
                print_r(json_encode(array("status" => "error","message" => "Bir hata oluştu")));
            }

        }
        else
        {
            print_r($ig);
        }
        
    }

    function telOnay(){

        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "tel"       => $this->input->post("tel"),
            "username"  => $this->input->post("username"),
            "password"  => $this->input->post("password"),
            "user_id"   => $this->input->post("user_id"),
            "yol"       => $this->input->post("yol"),
            "igID"      => $this->input->post("igID"),
        );

        $ig = $this->Nrmod->post("telOnay",$data);
        print_r($ig);

    }

    function Dogrulama(){

        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "choice"    => $this->input->post("choice"),
            "username"  => $this->input->post("username"),
            "password"  => $this->input->post("password"),
            "user_id"   => $this->input->post("user_id"),
            "yol"       => $this->input->post("yol"),
            "igID"      => $this->input->post("igID")
        );

        $ig = $this->Nrmod->post("dogrulama",$data);
        print_r($ig);

    }

    function telKodOnay(){

        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "username"  => $this->input->post("username"),
            "password"  => $this->input->post("password"),
            "user_id"   => $this->input->post("user_id"),
            "yol"       => $this->input->post("yol"),
            "igID"      => $this->input->post("igID"),
            "number"    => $this->input->post("number"),
        );

        $ig = $this->Nrmod->post("telKodOnay",$data);
        print_r($ig);

    }

    function onayCikis(){
        
        $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "username"  => $this->input->post("username"),
            "user_id"   => $this->input->post("user_id")
        );

        $ig = $this->Nrmod->post("onayCikis",$data);
        print_r($ig);

    }


    function reKey(){


        if($this->session->userdata("rekey"))
        {
            
            $url     = 'https://www.google.com/recaptcha/api/siteverify';
            $data    = array(
                'secret'   => GoogleDogrulamaSecret,
                'response' => $this->input->post("captcha")
            );

            $options = array(
                'http' => array(
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context = stream_context_create($options);
            @$verify = file_get_contents($url, FALSE, $context);
            $captcha_success = json_decode($verify);
            if($captcha_success->success == FALSE) {
                print_r(json_encode(array("status" => "error","message" => "Güvenlik doğrulamasını geçmen gerekiyor. Yukarıda ben robot değilim'i işaretle.")));
                exit;
            } else {

                $rand = rand(1, 9999999999);
                $user_id = $this->session->userdata("rekey");
                $this->Nrmod->duzenle(["igID" => $user_id], "uyeler", ["sessID" => $rand]);
                $this->session->set_userdata("sessID", $rand);
                $this->session->unset_userdata("rekey");
                
                print_r(json_encode(array("status" => "ok","message" => "Başarılı. Yönlendiriliyorsun..")));
                exit;

            }

        } else {
            print_r(json_encode(array("status" => "error","message" => "hata oluştu. Sayfayı yenileyip tekrar giriş yapın.")));
            exit;
        }


    }

}