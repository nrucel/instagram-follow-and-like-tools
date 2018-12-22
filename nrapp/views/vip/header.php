<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta name="description" content="Facebook Beğeni">
    <link rel="shortcut icon" sizes="196x196" href="<?=$gc?>images/logo.png">
    <title>Nadmin Yönetim</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$gc?>css2/3app.min.css">
    <link rel="stylesheet" href="<?=$gc?>css2/1custom.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900&subset=latin,latin-ext" rel="stylesheet">
    <script src="<?=$gc?>libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>    <script>        Breakpoints();    </script>    


</head>

<body class="menubar-top menubar-light theme-primary vip">

    <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">

        <div class="navbar-header">

            <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger"><span class="sr-only">Menü</span> <span class="hamburger-box"><span class="hamburger-inner"></span></span>

            </button>

            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false"><span class="sr-only">Menü</span> <span class="zmdi zmdi-hc-lg zmdi-more"></span></button>

            <a href="<?=base_url("vip")?>" class="navbar-brand"style="font-size:35px;font-family:Titillium Web;padding: 10px;"><strong>n</strong>admin</a></div>

        <div class="navbar-container container-fluid">

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

               <ul class="nav navbar-nav navbar-right main-navigation">

					<li>
						<a href="<?=base_url("vip")?>" >
							Anasayfa
						</a>
					</li>

					<li>
						<a href="<?=base_url("vip/blog")?>" >
							Blog
						</a>
					</li>

					<?php if($this->vip->yetkili == 1): ?>
					<li>
						<a href="<?=base_url("vip/uye-ekle")?>" >
							Üye Ekle
						</a> 
					</li>

					<li>
						<a href="<?=base_url("vip/uyeler")?>" >
							Üyeler
						</a>
					</li>

					<?php endif; ?>
					<li>
						<a href="<?=base_url("vip/cikis")?>" >
							Çıkış Yap
						</a>
					</li>
				</ul>
            </div>
        </div>
    </nav>

    <main id="app-main" class="app-main">



        