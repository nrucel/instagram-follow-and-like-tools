<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
  
  <!-- Page Title -->
	 <title><?=$blogAdi;?></title>
	<meta name="description" content="<?=$blogAciklama;?>"/>
	<meta name="keywords" content="<?=$blogAnahtar;?>"/>
  <meta name="google-site-verification" content="<?=$googleVerify?>"/>
  <!-- / -->

  
  <!---Font Icon-->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?=$dsc?>yeni/css/themify-icons.css" rel="stylesheet">
  <!-- / -->

  <!-- Plugin CSS -->
  <link href="<?=$dsc?>yeni/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link href="<?=$dsc?>yeni/css/owl.carousel.min.css" rel="stylesheet">
  <link href="<?=$dsc?>yeni/css/magnific-popup.css" rel="stylesheet">

  <!-- / -->

  <!-- Theme Style -->
  <link href="<?=$dsc?>yeni/css/styles.css" rel="stylesheet">
  <link href="<?=$dsc?>yeni/css/default.css" rel="stylesheet" id="color_theme">
  <!-- / -->

  <!-- / -->
</head>

<!-- Body Start -->
<body data-spy="scroll" data-target="#navbar" data-offset="98">

  

  <!-- Header -->
  <header>
    <nav class="navbar header-nav fixed-top navbar-expand-lg" >
      <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href=""><?=$siteAdi?></a>
        <!-- / -->

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <!-- / -->

        <!-- Top Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbar">
          <ul class="navbar-nav ml-auto">

            <?php  foreach($disMenuler as $m): ?>
            <?php if(!isset($m['altMenu'])): ?>
              <li><a class="nav-link" href="<?=$m['link']?>" <?php echo $m['yeniSekme'] ? "target='_blank'" : ""; ?>><?=$m['menu']?></a></li>
            <?php else: ?>
              <li class="nav-item dropdown">
              
                <a class="nav-link dropdown-toggle" href="#" id="sub_menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$m['menu']?></a>
                <div class="dropdown-menu" aria-labelledby="sub_menu">
                  <?php foreach($m['altMenu'] as $a): ?>
                      <a class="dropdown-item" href="<?=$a['link']?>" <?php echo $a['yeniSekme'] ? "target='_blank'" : ""; ?>><?=$a['menu']?></a>
                  <?php endforeach; ?>
                </div>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>

            <li><a class="nav-link nav-link-btn theme-bg" href="giriss"><i class="fa fa-instagram"></i> Giriş</a></li>
          </ul>
        </div>
        <!-- / -->

      </div><!-- Container -->
    </nav> <!-- Navbar -->
  </header>