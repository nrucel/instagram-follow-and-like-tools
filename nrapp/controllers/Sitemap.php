<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends NR_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){

		$this->output->set_content_type('application/xml');

		$blogs = array();
        $blogs = array_merge($blogs, glob(APPPATH.'views/blog/yazi/*.json', GLOB_BRACE));

        foreach ($blogs as $blog) {

            preg_match('/yazi\/(.*).json/', $blog, $Ad);

            $data["blogs"][] = array(
                'Ad' => $Ad[1]
            );
        }

		$feeds = array();
        $feeds = array_merge($feeds, glob(APPPATH.'views/blog/feed/*.json', GLOB_BRACE));

        foreach ($feeds as $feed) {

            preg_match('/feed\/(.*).json/', $feed, $Ad);

            $data["feeds"][] = array(
                'Ad' => $Ad[1]
            );
        }

        $tags = array();
        $tags = array_merge($tags, glob(APPPATH.'views/blog/tag/*.json', GLOB_BRACE));

        foreach ($tags as $tag) {

            preg_match('/tag\/(.*).json/', $tag, $Ad);

            $data["tags"][] = array(
                'Ad' => $Ad[1]
            );
        }

		$users = array();
        $users = array_merge($users, glob(APPPATH.'views/blog/user/*.json', GLOB_BRACE));

        foreach ($users as $user) {

            preg_match('/user\/(.*).json/', $user, $Ad);

            $data["users"][] = array(
                'Ad' => $Ad[1]
            );
        }

		$this->load->view("sitemap", $data);
	}

}