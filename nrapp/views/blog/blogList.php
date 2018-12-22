  <main>

    <!-- Home Banner Start -->
    <section class="page-title-section" style="background: #1576c2">
      <div class="container text-center">
          <h1 style="margin: 0 0 20px;font-size: 32px;font-weight: 500;color: #fff;">Tüm Blog Yazılarımız</h1>
      </div>
    </section>
    <!-- / -->

   <style type="text/css">
    .blg{
    border: 1px solid #eee;
    margin: 17px 10px 30px 10px;
    padding: 10px;
    position: relative;
    background: #fff;
    border-radius: 10px;
    }

    .ico{
        display: inline-block;
        vertical-align: top;
        font-size: 60px;
    }

    .feature-box h4{
        font-size: 20px;
        font-weight: 600;
    }

    .feature-box h4 a{
        color: #3B566E;
        text-decoration: none;
    }
</style>
    
<section id="blog" class="section gray-bg border-bottom">
    <div class="container">
        <div class="row justify-content-center m-45px-b md-m-25px-b">
          <div class="col-md-10 col-lg-8 col-xl-7">
            <div class="section-title">
              <h2 class="theme-after-bg">Diğer <span class="theme-color">Blog</span> Yazıları</h2>
            </div>
          </div>
        </div>

      <? foreach ($blogList as $blog) { ?> 
        <div class="col-md-12 m-10px-b">
            <div class="feature-box">
                <div class="row">
                    <div class="col-10 text-left">
                        <h4 class="bh3 font-alt"><i class="ti-rss-alt theme-color"></i> <a href="<?=base_url()?>blog/<?=$blog->blogUrl;?>"><?=$blog->blogAdi;?></a> <small><mark><?=$blog->blogZaman;?></mark></h4>
                  <p><?=$blog->blogDetay;?> <a href="<?=base_url()?>blog/<?=$blog->blogUrl;?>">devamını oku..</a></p>
                    </div>
                </div>
            </div>
        </div>
        <? } ?>

    </div>
    </section>
    </script>

  </main>
  