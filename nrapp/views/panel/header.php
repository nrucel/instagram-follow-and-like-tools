<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta name="description" content="Instagram takipçi">
    <link rel="shortcut icon" sizes="196x196" href="https://begenapp.net/yenitasarim/ico/ico2.png">
    <title><?=$title?> - <?=$siteAdi?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=$gc?>css2/3app.min.css">
    <link rel="stylesheet" href="<?=$gc?>css2/1custom.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900&subset=latin,latin-ext" rel="stylesheet">
    <script src="<?=$gc?>libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>    <script>        Breakpoints();    </script>    
    
</head>
<body class="menubar-top menubar-light theme-primary" style="font-family: 'Titillium Web', sans-serif;">
    <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
        <div class="navbar-header">
            <button type="button" id="menubar-toggle-btn" class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger"><span class="sr-only">Menü</span> <span class="hamburger-box"><span class="hamburger-inner"></span></span>
            </button>
            <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false"><span class="sr-only">Menü</span> <i class="fas fa-ellipsis-h"></i></span></button>
            
            <a href="<?=base_url("panel")?>" class="navbar-brand"style="font-size:35px;padding: 10px;">takip<strong>app</strong></a></div>
        <div class="navbar-container container-fluid">
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
               <ul class="nav navbar-nav navbar-right main-navigation">
                    <?php  foreach($this->config->item("disMenuler") as $m): ?>
                        <?php if(!isset($m['altMenu'])): ?>
                            <li><a href="<?=$m['link']?>" <?php echo $m['yeniSekme'] ? "target='_blank'" : ""; ?>><?=$m['menu']?></a></li>
                        <?php else: ?>
                            <li class="dropdown">
                            
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?=$m['menu']?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php foreach($m['altMenu'] as $a): ?>
                                        <li>
                                            <a href="<?=$a['link']?>" <?php echo $a['yeniSekme'] ? "target='_blank'" : ""; ?>><?=$a['menu']?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
    <aside id="menubar" class="menubar light">
        
        <div class="menubar-scroll">
            <div class="menubar-scroll-inner">
                <ul class="app-menu">
                    
                    <li>
                        <a href="<?=base_url("panel/takipci")?>">
                            
                            <span class="menu-text"><i class="fas fa-user-plus fa-lg"></i>  Takipçi Gönder</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url("panel/begeni")?>">
                            
                            <span class="menu-text"><i class="fab fa-gratipay fa-lg"></i>  Beğeni Gönder</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url("panel/servis")?>">
                            <span class="menu-text"><i class="fas fa-comments fa-lg"></i>  Yorum Gönder</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url("panel/servis")?>">
                            <span class="menu-text"><i class="fas fa-video fa-lg"></i>  Story Araçları</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=base_url("panel/cikis")?>">
                            <span class="menu-text"><i class="fas fa-sign-out-alt fa-lg"></i>  Çıkış Yap</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <main id="app-main" class="app-main">

<div class="card card-info center">
    <div class="widget" style="padding: 10px; background: #47a9f5; color: white;">
                              
                    <img src="<?=$uye->igFoto;?>" style="height: 30px;"/>  @<?=$uye->kullaniciAdi;?>   Takipçi: <?=$uye->takipciSayisi;?>  | Takip Edilen: <?=$uye->takipEdilenSayisi;?> | Takip Kredi: <?=$uye->takipKredi?> | Beğeni Kredi: <?=$uye->begeniKredi?>
                                
            </div>
            <div class="alert alert-dismissible alert-info">
            <p>Merhaba <b><?=$uye->kullaniciAdi;?></b>, Sistemimiz <strong>her saat</strong> kredileri yenilemektedir. Sistem şuan beta aşamasındadır. Herhangi bir sorun yada destek talebi için <strong><a href="mailto:<?=$this->config->item("varsayilanGonderenMaili")?>"><?=$this->config->item("gorunurMail")?></a></strong> adresine mail atabilirsiniz. <? if($this->config->item("yoneticiTel") !== "") { ?> İletişim numaramız: <strong><? echo $this->config->item("yoneticiTel"); } ?></strong> yada <strong><a href="https://begenapp.net/soru" target="_blank">Soru/Cevap</a> </strong> alanımızda daha hızlı çözüme ulaşabilirsiniz.</p>
            </div>
            <p>

                <?php if($this->config->item("reklamAktif") == 1) { 
                    echo "<center><h3 style='color: red;'> Aşağıdaki Reklama tıkla +250 kredi kazan.</span></h3></center><br>";
                    echo $this->config->item("reklamKodu");
                } ?>
            </p>
          </div>