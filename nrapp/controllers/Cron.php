<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends NR_Controller {

	public function __construct(){
		parent::__construct();
		$this->cronKey  = $this->config->item("cronKey");
	}

	function krediVer($key){

		if($key != $this->cronKey){
			echo "error key";
			exit;
		}

		$this->db
		->set("takipKredi", $this->config->item("tekrarUyeTakipKredi"))
		->where("takipKredi <", $this->config->item("tekrarUyeTakipKredi"))
		->update("uyeler");
	}

	function feed($key){

		if($key != $this->cronKey){
			echo "error key";
			exit;
		}

		$path = APPPATH.'views/blog/feed/'.date("Y-m-d").'.json';

		if (!file_exists($path))
        {
            touch($path);

        }

	    $data = array(
            "AuthKey"   => $this->config->item("AuthKey"),
            "username"  => $this->config->item("feedUsername"),
            "password"  => $this->config->item("feedPassword")
        );

        $ig = $this->Nrmod->post("feed",$data);

        $feeds = json_decode($ig,true);

	    if($feeds["status"] == "ok")
	    {

		    foreach ($feeds["data"]["items"] as $feed) 
		    {
		    	if(($feed["media_type"] == 1) || ($feed["media_type"] == 8))
		    	{

			    	if($feed["media_type"] == 1)
			    	{
			    		$data[$feed["user"]["username"]] = array(
			    			'type' 		=> $feed["media_type"],
			    			'username' 	=> $feed["user"]["username"],
			    			'fullname' 	=> $feed["user"]["full_name"],
			    			'image' 	=> $feed["image_versions2"]["candidates"][0]["url"],
			    			'like' 		=> $feed["like_count"],
			    			'comment' 	=> $feed["comment_count"],
			    			'text' 		=> $feed["caption"]["text"],
			    			'time' 		=> $feed["taken_at"],
			    			'code' 		=> $feed["code"],
			    		);
			    	} 
			    	elseif($feed["media_type"] == 8)
			    	{
			    		foreach ($feed["carousel_media"] as $re) {
			    			$resim[$feed["user"]["username"]][] = $re["image_versions2"]["candidates"][0]["url"];
			    		}

			    		$data[$feed["user"]["username"]] = array(
			    			'type' 		=> $feed["media_type"],
			    			'username' 	=> $feed["user"]["username"],
			    			'fullname' 	=> $feed["user"]["full_name"],
			    			'image' 	=> $resim[$feed["user"]["username"]],
			    			'like' 		=> $feed["like_count"],
			    			'comment' 	=> $feed["comment_count"],
			    			'text' 		=> $feed["caption"]["text"],
			    			'time' 		=> $feed["taken_at"],
			    			'code' 		=> $feed["code"],
			    		);

			    	}

			    	$path1 = APPPATH.'views/blog/user/'.$feed["user"]["username"].'-'.$feed["code"].'.json';

					if (!file_exists($path1))
			        {
			            touch($path1);
			            file_put_contents($path1, json_encode($data[$feed["user"]["username"]]));
			        }
		    	
		    	}

			}

		    file_put_contents($path, json_encode($feeds["data"]));
		    print_r(json_encode(array(
            	"status"  => "ok",
            	"message" => "işlem başarılı."
            )));
		}
		else
		{
			print_r(json_encode($feeds));
		}

	}

	function tag($key){

		if($key != $this->cronKey){
			echo "error key";
			exit;
		}


		foreach ($this->config->item("tags") as $tag) 
		{

			$path = APPPATH.'views/blog/tag/'.$tag.'-'.date("Y-m-d").'.json';

			if (!file_exists($path))
	        {
	            touch($path);

	        }

		    $data = array(
	            "AuthKey"   => $this->config->item("AuthKey"),
	            "username"  => $this->config->item("feedUsername"),
	            "password"  => $this->config->item("feedPassword"),
	            "tag"  		=> $tag
	        );

	        $ig = $this->Nrmod->post("tag",$data);

	        $feeds = json_decode($ig,true);

		    if($feeds["status"] == "ok")
		    {

			    foreach ($feeds["data"]["items"] as $feed) 
			    {
			    	if(($feed["media_type"] == 1) || ($feed["media_type"] == 8))
			    	{

				    	if($feed["media_type"] == 1)
				    	{
				    		$data[$feed["user"]["username"]] = array(
				    			'type' 		=> $feed["media_type"],
				    			'username' 	=> $feed["user"]["username"],
				    			'fullname' 	=> $feed["user"]["full_name"],
				    			'image' 	=> $feed["image_versions2"]["candidates"][0]["url"],
				    			'like' 		=> $feed["like_count"],
				    			'comment' 	=> $feed["comment_count"],
				    			'text' 		=> $feed["caption"]["text"],
				    			'time' 		=> $feed["taken_at"],
				    			'code' 		=> $feed["code"],
				    		);
				    	} 
				    	elseif($feed["media_type"] == 8)
				    	{
				    		foreach ($feed["carousel_media"] as $re) {
				    			$resim[$feed["user"]["username"]][] = $re["image_versions2"]["candidates"][0]["url"];
				    		}

				    		$data[$feed["user"]["username"]] = array(
				    			'type' 		=> $feed["media_type"],
				    			'username' 	=> $feed["user"]["username"],
				    			'fullname' 	=> $feed["user"]["full_name"],
				    			'image' 	=> $resim[$feed["user"]["username"]],
				    			'like' 		=> $feed["like_count"],
				    			'comment' 	=> $feed["comment_count"],
				    			'text' 		=> $feed["caption"]["text"],
				    			'time' 		=> $feed["taken_at"],
				    			'code' 		=> $feed["code"],
				    		);

				    	}

				    	$path1 = APPPATH.'views/blog/user/'.$feed["user"]["username"].'-'.$feed["code"].'.json';

						if (!file_exists($path1))
				        {
				            touch($path1);
				            file_put_contents($path1, json_encode($data[$feed["user"]["username"]]));
				        }
			    	
			    	}

				}

			    file_put_contents($path, json_encode($feeds["data"]));
			    print_r(json_encode(array(
	            	"status"  => "ok",
	            	"message" => "işlem başarılı."
	            )));
			}
		}


		print_r(json_encode(array(
        	"status"  => "ok"
        )));

	}


}