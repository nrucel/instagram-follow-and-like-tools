<main>

    <!-- Home Banner Start -->
    <section class="page-title-section" style="background: #1576c2">
      <div class="container text-center">
          <h1 style="margin: 0 0 20px;font-size: 32px;font-weight: 500;color: #fff;"><?=$blogAdi;?></h1>
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
                <h4 class="bh3 font-alt"><a href="https://instagram.com/nrucel49" target="_blank"><small><mark>@nrucel49 feed</mark></small></a></h4>
                <p><?=$time;?> tarihli en popüler paylaşımlar listesi. best popular instagram feed</p>
                <p><a href="<?=base_url()?>feed">Tüm Listeyi Görüntüle</a></p>
              </div>
              </div>
          </div>
      </div>

    <? foreach ($ifeed as $f) { ?> 
        
          <div class="col-md-6 col-lg-3 m-15px-tb">
            <div class="our-team">
              <div class="img theme-before" style="background-image: url(<?=$f["image"];?>);">
              </div>
              <div class="info">
                <h6><a href="<?=base_url()?>user/<?=$f["username"];?>-<?=$f["code"];?>" target="_blank"><?=$f["fullname"];?></a></h6>
                <label>@<?=$f["username"];?></label>
              </div>
              
            </div>
          </div> <!-- col -->

         <!-- row -->
    <? } ?>
</div>

      </div> <!-- container -->
    </section>
    <!-- / -->

  </main>
 <? include 'slider.php';?>