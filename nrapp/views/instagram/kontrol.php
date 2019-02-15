<html lang="tr">
<!--<![endif]-->
<head>
<title>Giriş Yap - <?=$siteAdi?></title>
<meta name="description" content="giriş yap,<?=$siteAdi?>">
<meta name="keywords" content="giriş yap,<?=$siteAdi?>">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta id="viewport" name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900&subset=latin,latin-ext" rel="stylesheet">
<style type="text/css">
    html,
body {
  height: 100%;
}

body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
  font-size: 16px;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
  background-color: #FFFFFF;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: 34px;
  padding: 10px;
  font-size: 16px;
  border-radius: 3px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: 5px;
  border: 1px solid #DBDBDB;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border: 1px solid #DBDBDB;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

input[type="radio"] {
    display: none;
}

input[type="radio"]+label {
    font-weight: 400;
    font-size: 14px;
}

input[type="radio"]+label span {
    display: inline-block;
    width: 18px;
    height: 18px;
    margin: -2px 10px 0 0;
    vertical-align: middle;
    cursor: pointer;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 3px solid #ffffff;
}

input[type="radio"]+label span {
    background-color: #efefef;
}

input[type="radio"]:checked+label {
    color: #333;
    font-weight: 700;
}

input[type="radio"]:checked+label span {
    background-color: #3897f0;
    border: 2px solid #efefef;
    box-shadow: 2px 2px 2px rgba(0, 0, 0, .1);
}

input[type="radio"]+label span,
input[type="radio"]:checked+label span {
    -webkit-transition: background-color 0.24s linear;
    -o-transition: background-color 0.24s linear;
    -moz-transition: background-color 0.24s linear;
    transition: background-color 0.24s linear;
}
</style>
</head>
  <body style="font-family: 'Titillium Web', sans-serif;">

<div class="container">
    <div class="form-signin" id=nrucel>
      <div class="text-center">
        <h3>Sen insan mısın ?</h3>
        <p style="font-size:14px;">Aşağıdaki kutuda 
          <b>ben robot değilim</b>i işaretleyin.
        </p>
        <div style="width: 304px;margin: 0 auto;" class="g-recaptcha" data-sitekey="<?php echo GoogleDogrulamaKey; ?>"></div>
        <br />
        <div id="sonuc"></div>
        <button class="btn btn-primary btn-block" id="gonder" onclick="rekey()" style="font-size: 14px; font-weight: bold;"> Devam Et</button>
      </div>
    </div>
</div>
<div id="google_translate_element"></div>
<?=$this->config->item("analitik")?>
<script>

    

    var base_url="<?=base_url()?>";

  </script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

  <script type="text/javascript">
      var base_url = "<?=base_url()?>";

        function rekey(){ 

            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> bekleyin..";

            $.ajax({
                type: 'post',
                url: base_url+'login/reKey',
                dataType: 'json',
                data: "captcha="+grecaptcha.getResponse(),
                success: function(result) {

                    if(result.status == "ok"){

                        $('#sonuc').html('<div style="background:green;color:#fff;margin-top:10px;padding:10px">Başarılı.. Giriş yapılıyor..');
                        window.location.href = base_url+"giriss";
                    } else {   
                        $('#sonuc').html('<p style="color:#ed4956;font-size:14px">'+result.message+'</p>');
                    }

                    $('#tel').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = 'Devam Et';

                }
            });
        }

  </script>
  <link href="<?=$dsc?>yeni/css/nrucel1.css" rel="stylesheet">
  <script type="text/javascript" src="<?=$dsc?>yeni/js/nrucel.js"></script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>