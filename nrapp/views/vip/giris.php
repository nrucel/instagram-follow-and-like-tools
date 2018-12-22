<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VIP Panel Girişi</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap">
    <link rel="stylesheet" href="<?=$gc?>libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$gc?>libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="<?=$gc?>libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="<?=$gc?>css/bootstrap.css">
    <link rel="stylesheet" href="<?=$gc?>css/core.css">
    <link rel="stylesheet" href="<?=$gc?>css/misc-pages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>

<body class="simple-page">
    <div id="back-to-home"><a href="<?=base_url()?>" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a></div>
    <div class="simple-page-wrap">
        
        <div class="simple-page-form animated flipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Vip Hesabına Giriş Yap</h4>
			<?php if($_GET['hata'] == 1): ?>
			<div class="alert alert-danger alert-custom alert-dismissible"><h4 class="alert-title">GİRİŞ YAPILAMADI</h4><p>Kullanıcı adın ya da şifren hatalı. Lütfen tekrar dene.</p></div>
			<?php endif; ?>
            <form action="<?=base_url("vip/giris/islem")?>" method="POST">
                <div class="form-group">
                    <input id="sign-in-email" type="email" name="email" required="required" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <input id="sign-in-password" type="password" name="sifre" required="required" class="form-control" placeholder="Şifre">
                </div>
                <div class="form-group m-b-xl">
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" id="keep_me_logged_in">
                        <label for="keep_me_logged_in">Beni Hatırla</label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Giriş Yap">
            </form>
        </div>
    </div>
</body>
</html>