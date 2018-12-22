<main>

    <!-- Home Banner Start -->
    <section class="page-title-section" style="background: #1576c2">
      <div class="container text-center">
          <h1 style="margin: 0 0 20px;font-size: 32px;font-weight: 500;color: #fff;">@<?=$username;?> instagram paylaşımı</h1>
      </div>
    </section>
    <!-- / -->

    <!-- Featre -->
    <section id="info" class="section gray-bg border-bottom">
      <div class="container">
<div class="row">

  <div class="col-md-12 m-10px-b">
          <div class="feature-box">
            <div class="row">

              <div class="col-12 text-left">
                <h4 class="bh3 font-alt"><a href="https://instagram.com/<?=$username;?>" target="_blank"><?=$username;?> <small><mark>@<?=$username;?></mark></small></a></h4>
                <p><?=$text;?></p><br>
                <p><strong>
                  <span style="margin-right: 10px;"><i class="ti-heart theme-color" style="font-weight: bold"></i> <?=$like;?></span> 
                  <span style="margin-right: 10px;"><i class="ti-comment theme-color" style="font-weight: bold"></i> <?=$comment;?></span>
                  <span style="margin-right: 10px;"><i class="ti-time theme-color" style="font-weight: bold"></i> <?=$time;?></span>
                  <span style="margin-right: 10px;"><i class="ti-link theme-color" style="font-weight: bold"></i> <a href="https://instagram.com/p/<?=$code;?>/" target="_blank">Instagram'da gör</a></span>
                </strong> <span class="pull-right"><a href="<?=base_url()?>user">Tüm Listeyi Görüntüle</a></span></p>
              </div>
              </div>
          </div>
      </div>

<? if($type == 8){
    foreach ($image as $i) { ?> 
          <div class="col-md-6 col-lg-3 m-15px-tb">
            <div class="our-team">
              <div class="img theme-before" style="background-image: url(<?=$i;?>);">
              </div>
            </div>
          </div> 
    <? }
    } else { ?>

<div class="col-md-6 col-lg-3 m-15px-tb">
            <div class="our-team">
              <div class="img theme-before" style="background-image: url(<?=$image;?>);">
              </div>
              
            </div>
          </div> 

    <? } ?>
</div>

      </div> <!-- container -->
    </section>
    <!-- / -->

  </main>
<? include 'slider.php';?>

  