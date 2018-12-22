<?php 
	class Nrmod extends CI_Model {
   
        public function __construct()
        {
                parent::__construct();
        }

        function tumunuGetir($tablo){
			$veriler = $this->db->get($tablo)->result();
			return $veriler;
		}

		function cokluGetir($where, $tablo, $ayarlar = array()){
			extract($ayarlar);
			if(!isset($order)){ 
				$order = "id asc"; 
			}
			
			$this->db->order_by($order)->where($where);
			if(isset($limit)){
				
				if(!isset($offset)){
					$offset = 0;
				}
				
				$this->db->limit($limit,$offset);
				
			}
			
			if(isset($like)){
				$this->db->like($like);
			}

			if(isset($group_by)){
				$this->db->group_by($group_by);
			}
			if(isset($result) and $result == "array"){
				$veriler = $this->db->get($tablo);
				if($veriler){
					$sonuc = $veriler->result_array();
				}else {
					$sonuc = array();
				}
			}else {
				$veriler = $this->db->get($tablo);

				if($veriler){
					$sonuc = $veriler->result();
				}else {
					$sonuc = new stdClass();
				}
			}
			return $sonuc;
		}

		function tekGetir($where, $tablo, $ayarlar = array()){
			extract($ayarlar);
			
			if(!isset($order)){ 
				$order = "id asc"; 
			}
			
			$this->db->order_by($order)->where($where)->limit(1);
			$this->db->from($tablo);
			
			if(isset($result) and $result == "array"){
				$sonuc = $this->db->get();

				if($sonuc){
					$veri = $sonuc->row_array();
				}else {
					$veri = null;
				}
			}else {
				$sonuc = $this->db->get();
				if($sonuc){
					$veri = $sonuc->row();
				}else {
					$veri = null;
				}
			}
			
			return $veri;
		}

		function ekle($tablo, $veriler, $idDonsunMu = FALSE){
			if($idDonsunMu === FALSE){
				$this->db->insert($tablo, $veriler);
				return ($this->db->affected_rows() > 0);
			}else {
				$this->db->insert($tablo, $veriler);
				return $this->db->insert_id();
			}
		}

		function duzenle($where, $tablo, $veriler){
			$result = $this->db->where($where)->update($tablo, $veriler);
			return $result;
			return ($this->db->affected_rows() > 0);
		}

		function sil($where,$tablo){
			$this->db->where($where)->delete($tablo);
			return ($this->db->affected_rows() > 0);
		}

		function satirSayisi($where, $tablo){
			return $this->db->where($where)->from($tablo)->count_all_results();
		}

		function duzenleKontrol($id, $tablo, $link){
			$icerik = $this->islemler_model->tekGetir(array("id" => $id), $tablo);

			if(!$icerik){
				$this->session->set_flashdata("hata", "Böyle bir kayıt bulunamadı.");
				redirect($link);
				exit;
			}

			return $icerik;
		}

		function hataVer($hata, $link){
			$this->session->set_flashdata("hata", $hata);
			redirect($link);
		}

		function successVer($mesaj, $link){
			$this->session->set_flashdata("success", $mesaj);
			redirect($link);
		}


		function feedOku($adet = 8){

		$path = APPPATH.'views/blog/feed/'.date("Y-m-d").'.json';

	    $feeds = file_get_contents($path);
	    $feeds = json_decode($feeds);

	    foreach ($feeds->items as $feed) {

	    	if($feed->media_type == 1)
	    	{
	    		$data[] = array(
	    			'username' 	=> $feed->user->username,
	    			'fullname' 	=> $feed->user->full_name ? $feed->user->full_name : $feed->user->username,
	    			'image' 	=> $feed->image_versions2->candidates[0]->url,
	    			'code' 		=> $feed->code,
	    		);

	    	} 
	    	elseif($feed->media_type == 8)
	    	{
	    		$data[] = array(
	    			'username' 	=> $feed->user->username,
	    			'fullname' 	=> $feed->user->full_name ? $feed->user->full_name : $feed->user->username,
	    			'image' 	=> $feed->carousel_media[0]->image_versions2->candidates[0]->url,
	    			'code' 		=> $feed->code,
	    		);

	    	}
	    }

	    shuffle($data);
        $data = array_slice($data, 0, $adet);



	    return json_encode($data);

	}

	function tagOku($adet = 4){

		foreach ($this->config->item("tags") as $tag)
		{

			$path = APPPATH.'views/blog/tag/'.$tag.'-'.date("Y-m-d").'.json';

		    $feeds = file_get_contents($path);
		    $feeds = json_decode($feeds);

		    foreach ($feeds->items as $feed) {

		    	if($feed->media_type == 1)
		    	{
		    		$data[] = array(
		    			'username' 	=> $feed->user->username,
		    			'fullname' 	=> $feed->user->full_name ? $feed->user->full_name : $feed->user->username,
		    			'image' 	=> $feed->image_versions2->candidates[0]->url,
		    			'code' 		=> $feed->code,
		    		);

		    	} 
		    	elseif($feed->media_type == 8)
		    	{
		    		$data[] = array(
		    			'username' 	=> $feed->user->username,
		    			'fullname' 	=> $feed->user->full_name ? $feed->user->full_name : $feed->user->username,
		    			'image' 	=> $feed->carousel_media[0]->image_versions2->candidates[0]->url,
		    			'code' 		=> $feed->code,
		    		);

		    	}
		    }

		    shuffle($data);
		    $tags[] = array(
		    	"tag"  => $tag,
		    	"data" => array_slice($data, 0, $adet)
		    );
	        unset($data);
    	}



	    return json_encode($tags);

	}

	function yaziKisalt($blog,$limit = 160) {
			$icerik     = strip_tags($blog);
			$icerik     = str_replace(array(
				                          "\t",
				                          "\r",
				                          "\n"
			                          ),' ',$icerik);
			$icerik_bol = explode(' ',$icerik);
			$icerik     = '';
			for($i = 0;$i < count($icerik_bol);$i++) {
				if($icerik_bol[ $i ] != '') {
					$icerik .= trim($icerik_bol[ $i ]).' ';
				}
			}
			if(preg_match('/(.*?)\s/i',substr($icerik,$limit),$dizi)) {
				$icerik = trim(substr($icerik,0,$limit+strlen($dizi[0])));
			}

			return $icerik;
	}

	function blogGetir($adet = 3){

        $blogs = array();
        $blogs = array_merge($blogs, glob(APPPATH.'views/blog/yazi/*.json', GLOB_BRACE));
        shuffle($blogs);
        $blogs = array_slice($blogs, 0, $adet);

        foreach ($blogs as $blog) {

            $oku = file_get_contents($blog);
            $oku = json_decode($oku);

            $data[] = array(
                'blogUrl'   => $oku->blogUrl,
                'blogAdi'   => $oku->blogAdi,
                'blogZaman' => $oku->zaman,
                'blogDetay' => $this->yaziKisalt($oku->blogDetay,160),
            );

        }

        return json_encode($data);

    }

    function post($url,$post){

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://auth.nrucel.me/ig/".$url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => http_build_query($post),
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/x-www-form-urlencoded",
		    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.110 Safari/537.36",
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
		  return $response;
		}
    }
		
}
?>