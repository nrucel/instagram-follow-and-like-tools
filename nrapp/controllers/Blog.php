<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends NR_Controller {
	function __construct(){
		parent::__construct();
	}

	function index(){

        $head["blogAdi"]      = "Tüm blog Yazıları";
        $head["blogAciklama"] = "sosyal medya blog yazıları, instagram hakkında yazılar";
        $head["blogAnahtar"]  = "instagram takipçi,instagram blog,instagram fenomen";

		$bloglar = json_decode($this->Nrmod->blogGetir(10000));
        $data["blogList"] = $bloglar;

        $this->load->view("blog/header", $head);
        $this->load->view("blog/blogList", $data);
        $this->load->view("blog/footer");

	}

	function blogDetay($blog){

		$path = APPPATH.'views/blog/yazi/'.$blog.'.json';

        if (!file_exists($path))
        {
            show_404();
            exit;
        }
        else
        {
            $oku = file_get_contents($path);
            $oku = json_decode($oku);
        }

        $head["blogAdi"] 	  = $oku->blogAdi;
        $head["blogAciklama"] = $oku->blogAciklama;
        $head["blogAnahtar"]  = $oku->blogAnahtar;

        $data["blogAdi"] 	  = $oku->blogAdi;
        $data["blogDetay"]    = $oku->blogDetay;

        $bloglar = json_decode($this->Nrmod->blogGetir(3));
        $data["bloglar"] = $bloglar;

        $feed = json_decode($this->Nrmod->feedOku(8));
        $data["feeds"] = $feed;

        $bloglar = json_decode($this->Nrmod->tagOku(4));
        $data["tags"] = $bloglar;


        
        $this->load->view("blog/header", $head);
        $this->load->view("blog/blog", $data);
        $this->load->view("blog/footer");

	}

    function user(){

        $blogs = array();
        $blogs = array_merge($blogs, glob(APPPATH.'views/blog/user/*.json', GLOB_BRACE));

        foreach ($blogs as $blog) {

            preg_match('/user\/(.*).json/', $blog, $Ad);

            $data["liste"][] = array(
                'Ad' => $Ad[1]
            );

        }

        $head["blogAdi"]      = "instagram kullanıcılara göre popüler paylaşımlar listesi";
        $head["blogAciklama"] = "instagram kullanıcılara göre popüler paylaşımlar listesi";
        $head["blogAnahtar"]  = "instagram kullanıcıları, instagram popüler paylaşımlar, instagram fenomenler";
        $data["tip"] = "user";

        $bloglar = json_decode($this->Nrmod->blogGetir(3));
        $data["bloglar"] = $bloglar;

        $feed = json_decode($this->Nrmod->feedOku(8));
        $data["feeds"] = $feed;

        $bloglar = json_decode($this->Nrmod->tagOku(4));
        $data["tags"] = $bloglar;

        $this->load->view("blog/header", $head);
        $this->load->view("blog/list", $data);
        $this->load->view("blog/footer");

    }

	function userDetay($user){

		$path = APPPATH.'views/blog/user/'.$user.'.json';

        if (!file_exists($path))
        {
            show_404();
            exit;
        }
        else
        {
            $oku = file_get_contents($path);
            $oku = json_decode($oku);
        }

        $head["blogAdi"] 	  = $oku->username." fotoğraf paylaşımı";
        $head["blogAciklama"] = $this->Nrmod->yaziKisalt($oku->text,100);
        $head["blogAnahtar"]  = $this->Nrmod->yaziKisalt($oku->text,150);

        $data["username"]	= $oku->username;
        $data["text"] 	  	= $oku->text;
        $data["type"] 	  	= $oku->type;
        $data["fullname"] 	= $oku->fullname;
        $data["image"] 	  	= $oku->image;
        $data["like"] 	  	= $oku->like;
        $data["comment"] 	= $oku->comment;
        $data["time"] 	  	= gmdate("d/m/Y",$oku->time);
        $data["code"] 	  	= $oku->code;


		$bloglar = json_decode($this->Nrmod->blogGetir(3));
        $data["bloglar"] = $bloglar;

        $feed = json_decode($this->Nrmod->feedOku(8));
        $data["feeds"] = $feed;

        $bloglar = json_decode($this->Nrmod->tagOku(4));
        $data["tags"] = $bloglar;


        
        $this->load->view("blog/header", $head);
        $this->load->view("blog/user", $data);
        $this->load->view("blog/footer");

	}


    function feed(){

        $blogs = array();
        $blogs = array_merge($blogs, glob(APPPATH.'views/blog/feed/*.json', GLOB_BRACE));

        foreach ($blogs as $blog) {

            preg_match('/feed\/(.*).json/', $blog, $Ad);

            $data["liste"][] = array(
                'Ad' => $Ad[1]
            );

        }

        $head["blogAdi"]      = "instagram tarihlere göre popüler paylaşımlar listesi";
        $head["blogAciklama"] = "instagram tarihlere göre popüler paylaşımlar listesi";
        $head["blogAnahtar"]  = "instagram feed, instagram popüler paylaşımlar, instagram fenomenler";
        $data["tip"] = "feed";

        $bloglar = json_decode($this->Nrmod->blogGetir(3));
        $data["bloglar"] = $bloglar;

        $feed = json_decode($this->Nrmod->feedOku(8));
        $data["feeds"] = $feed;

        $bloglar = json_decode($this->Nrmod->tagOku(4));
        $data["tags"] = $bloglar;

        $this->load->view("blog/header", $head);
        $this->load->view("blog/list", $data);
        $this->load->view("blog/footer");

    }

	function feedDetay($tarih){

		$path = APPPATH.'views/blog/feed/'.$tarih.'.json';

        if (!file_exists($path))
        {
            show_404();
            exit;
        }
        else
        {
            $oku = file_get_contents($path);
            $oku = json_decode($oku);

	        foreach ($oku->items as $feed) 
	        {

		    	if($feed->media_type == 1)
		    	{
		    		$ifeed[] = array(
		    			'username' 	=> $feed->user->username,
		    			'fullname' 	=> $feed->user->full_name,
		    			'image' 	=> $feed->image_versions2->candidates[0]->url,
		    			'code' 		=> $feed->code,
		    		);

		    	} 
		    	elseif($feed->media_type == 8)
		    	{
		    		$ifeed[] = array(
		    			'username' 	=> $feed->user->username,
		    			'fullname' 	=> $feed->user->full_name,
		    			'image' 	=> $feed->carousel_media[0]->image_versions2->candidates[0]->url,
		    			'code' 		=> $feed->code,
		    		);

		    	}
		    }
        }

        $head["blogAdi"] 	  = $tarih." instagram popüler paylaşımlar - feed";
        $head["blogAciklama"] = $tarih." instagram en popüler paylaşımlar. instagram feed";
        $head["blogAnahtar"]  = "instagram feed, instagram palaşımlar, ".$tarih;

        $data["blogAdi"]	= $tarih." instagram popüler paylaşımlar - feed";
        $data["time"] 	  	= $tarih;
        $data["ifeed"] 	  	= $ifeed;


		$bloglar = json_decode($this->Nrmod->blogGetir(3));
        $data["bloglar"] = $bloglar;

        $feed = json_decode($this->Nrmod->feedOku(8));
        $data["feeds"] = $feed;

        $bloglar = json_decode($this->Nrmod->tagOku(4));
        $data["tags"] = $bloglar;


        
        $this->load->view("blog/header", $head);
        $this->load->view("blog/feed", $data);
        $this->load->view("blog/footer");

	}

    function tag(){

        $blogs = array();
        $blogs = array_merge($blogs, glob(APPPATH.'views/blog/tag/*.json', GLOB_BRACE));

        foreach ($blogs as $blog) {

            preg_match('/tag\/(.*).json/', $blog, $Ad);

            $data["liste"][] = array(
                'Ad' => $Ad[1]
            );

        }

        $head["blogAdi"]      = "instagram tarihlere göre tag paylaşımlar listesi";
        $head["blogAciklama"] = "instagram tarihlere göre tag paylaşımlar listesi";
        $head["blogAnahtar"]  = "instagram feed, instagram tag paylaşımlar, instagram fenomenler";
        $data["tip"] = "tag";

        $bloglar = json_decode($this->Nrmod->blogGetir(3));
        $data["bloglar"] = $bloglar;

        $feed = json_decode($this->Nrmod->feedOku(8));
        $data["feeds"] = $feed;

        $bloglar = json_decode($this->Nrmod->tagOku(4));
        $data["tags"] = $bloglar;

        $this->load->view("blog/header", $head);
        $this->load->view("blog/list", $data);
        $this->load->view("blog/footer");

    }

    function tagDetay($tarih){

        $path = APPPATH.'views/blog/tag/'.$tarih.'.json';

        if (!file_exists($path))
        {
            show_404();
            exit;
        }
        else
        {
            $oku = file_get_contents($path);
            $oku = json_decode($oku);

            foreach ($oku->items as $feed) 
            {

                if($feed->media_type == 1)
                {
                    $ifeed[] = array(
                        'username'  => $feed->user->username,
                        'fullname'  => $feed->user->full_name,
                        'image'     => $feed->image_versions2->candidates[0]->url,
                        'code'      => $feed->code,
                    );

                } 
                elseif($feed->media_type == 8)
                {
                    $ifeed[] = array(
                        'username'  => $feed->user->username,
                        'fullname'  => $feed->user->full_name,
                        'image'     => $feed->carousel_media[0]->image_versions2->candidates[0]->url,
                        'code'      => $feed->code,
                    );

                }
            }
        }

        $head["blogAdi"]      = $tarih." instagram popüler paylaşımlar - tag";
        $head["blogAciklama"] = $tarih." instagram en popüler paylaşımlar. instagram tag";
        $head["blogAnahtar"]  = "instagram feed, instagram palaşımlar, ".$tarih;

        $data["blogAdi"]    = $tarih." instagram popüler paylaşımlar - tag";
        $data["time"]       = $tarih;
        $data["ifeed"]      = $ifeed;


        $bloglar = json_decode($this->Nrmod->blogGetir(3));
        $data["bloglar"] = $bloglar;

        $feed = json_decode($this->Nrmod->feedOku(8));
        $data["feeds"] = $feed;

        $bloglar = json_decode($this->Nrmod->tagOku(4));
        $data["tags"] = $bloglar;


        
        $this->load->view("blog/header", $head);
        $this->load->view("blog/feed", $data);
        $this->load->view("blog/footer");

    }


	


}