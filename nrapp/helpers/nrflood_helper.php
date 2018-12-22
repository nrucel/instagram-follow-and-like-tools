<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  $crlf=chr(13).chr(10);
  $itime=3;  // toplam tıklama sayılacak saniye
  $imaxvisit=10;  // $itime saniye boyunca kaç kez flood yapabilir
  $ipenalty=3600;  // bekleme süresi saniye cinsinden. 3600 = 1 saat
  $iplogdir=APPPATH.'nrcook/flood/';
  $iplogfile="AttackersIPs.Log";
  $zaman = $ipenalty/60;
  
  // Zaman
  
  $today = date("Y-m-j,G");
  $min = date("i");
  $sec = date("s");
  $r = substr(date("i"),0,1);
  $m =  substr(date("i"),1,1);
  $minute = 0;
  

 
//---------------------- Genel Ayarlar ---------------------------------------  



  

  //     dosya zamanı bulma:
  
  $ipfile=substr(md5($_SERVER["REMOTE_ADDR"]),-3);  // -3 md5 tipi adlandırma
  $oldtime=0;
  if (file_exists($iplogdir.$ipfile)) $oldtime=filemtime($iplogdir.$ipfile);

  //     Zamanı yenileme:
  
  $time=time();
  if ($oldtime<$time) $oldtime=$time;
  $newtime=$oldtime+$itime;

  

  //     insan mı değil mi kontrol:
  
  if ($newtime>=$time+$itime*$imaxvisit)
  {
    
    //     engelleme:
    touch($iplogdir.$ipfile,$time+$itime*($imaxvisit-1)+$ipenalty);
    header("HTTP/1.0 503 Service Temporarily Unavailable");
    header("Connection: close");
    header("Content-Type: text/html");
    echo '<html><meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<head><title>Aşırı yük uyarısı!!!</title></head><body><p align="center"><strong>';
    echo '<font color="red">Tehlike Olarak algılandınız!</font></strong>';
    echo "<br>";
    echo "Sayın ziyaretçi ".$_SERVER["REMOTE_ADDR"]." ip adresiniz bot olarak algılanıp ".$zaman." dakika boyunca engellenmiştir.";
    echo "<br>";
    echo "Bu süreyi beklemek istemiyorsanız aşağıdaki <b>ben robot değilim</b> seceneğini seçin ve </b>onayla</b> butonuna basınız.";
    echo "<br>";

    if(isset($_POST["g-recaptcha-response"])){
    $url     = 'https://www.google.com/recaptcha/api/siteverify';
    $data    = array(
        'secret'   => GoogleDogrulamaSecret,
        'response' => $_POST["g-recaptcha-response"]
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
        echo '<center><b style="color:red">Doğrulama başarısız sayfayı yenileyip tekrar deneyin.</b></center>';
    } else {

        unlink($iplogdir.$ipfile);
        echo '<meta http-equiv="refresh" content="0">';
    }
    }

    echo '</p></body></html>'.$crlf;

    ?>

    <br>
    <center>
    <form action="" method="post" enctype="multipart/form-data">
        <div style="width: 304px;margin: 0 auto;" class="g-recaptcha" data-sitekey="<?=GoogleDogrulamaKey?>"></div>
        <button style="background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;width: 304px;margin-top: 10px;" type="submit" id="send_message">Onayla !</button>
    </form>
    </center>
    <script src='https://www.google.com/recaptcha/api.js'></script>


    <?
    
    
    //     giriş:
    $fp=@fopen($iplogdir.$iplogfile,"a");
    
    if ($fp!==FALSE)
    {
      $useragent='<unknown user agent>';
      if (isset($_SERVER["HTTP_USER_AGENT"])) $useragent=$_SERVER["HTTP_USER_AGENT"];
      @fputs($fp,$_SERVER["REMOTE_ADDR"].' on '.date("D, d M Y, H:i:s").' as '.$useragent.$crlf);
    }
    
    @fclose($fp);
    exit();

  }

    //  Dosya süresini düzenleme:
  touch($iplogdir.$ipfile,$newtime);

/* bitiş */

