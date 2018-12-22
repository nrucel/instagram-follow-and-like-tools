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

    .nborder{
      background-color: #fff;padding: 10px;margin-top: 30px;border-width: 1px;border-left-width:5px;border-color: #5580ff;border-style: dotted dotted dotted solid;
    }

    .saguzak{
    	margin-right: 5px;
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

      <? foreach ($bloglar as $blog) { ?>  
        <div class="col-md-12 m-10px-b">
            <div class="feature-box">
                <div class="row">

                    <div class="col-10 text-left">
                        <h4 class="bh3 font-alt"><i class="ti-rss-alt theme-color saguzak"></i> <a href="<?=base_url()?>blog/<?=$blog->blogUrl;?>"><?=$blog->blogAdi;?></a> <small><mark><?=$blog->blogZaman;?></mark></h4>
                  <p><?=$blog->blogDetay;?> <a href="<?=base_url()?>blog/<?=$blog->blogUrl;?>">devamını oku..</a></p>
                    </div>
                </div>
            </div>
        </div>
        <? } ?>

    </div>
    </section>


  <section id="feed" class="section gray-bg border-bottom">
      <div class="container">
        <div class="row justify-content-center m-45px-b md-m-25px-b">
          <div class="col-md-10 col-lg-8 col-xl-7">
            <div class="section-title">
              <h2 class="theme-after-bg">En <span class="theme-color">Popüler</span> Paylaşımlar</h2>
            </div>
          </div>
        </div>
        <div>
          <h5>
      <div class="nborder">
    <span class="theme-color">
        @<?=$this->config->item("feedUsername")?> <small><mark>feed</mark></small>
    </span>
    <span class="pull-right" style="font-size:15px;">
        <a href="<?=base_url()?>feed/<?=date("Y-m-d")?>">Tümünü göster</a>
    </span>
</div></h5>
<div class="row">
    <? foreach ($feeds as $feed) { ?> 
        
          <div class="col-md-6 col-lg-3 m-15px-tb">
            <div class="our-team">
              <div class="img theme-before" style="background-image: url(<?=$feed->image;?>);" alt="<?=$feed->username;?> instagram">
              </div>
              <div class="info">
                <h6><a href="<?=base_url()?>user/<?=$feed->username;?>-<?=$feed->code;?>" target="_blank"><?=$feed->fullname;?></a></h6>
                <label>@<?=$feed->username;?></label>
              </div>
              
            </div>
          </div> <!-- col -->

         <!-- row -->
    <? } ?>
</div>



    <? foreach ($tags as $tag) { ?> 

      <h5>
        <div class="nborder">
          <span class="theme-color">
            #<?=$tag->tag?> <small><mark>tag</mark></small>
          </span>
          <span class="pull-right" style="font-size:15px;">
            <a href="<?=base_url()?>tag/<?=$tag->tag."-".date("Y-m-d")?>">Tümünü göster</a>
          </span>
        </div>
      </h5>
        
        <div class="row">
        <? foreach ($tag->data as $t) { ?> 
          <div class="col-md-6 col-lg-3 m-15px-tb">
            <div class="our-team">
              <div class="img theme-before" style="background-image: url(<?=$t->image;?>);" alt="<?=$t->username;?> instagram">
              </div>
              <div class="info">
                <h6><a href="<?=base_url()?>user/<?=$t->username;?>-<?=$t->code;?>" target="_blank"><?=$t->fullname;?></a></h6>
                <label>@<?=$t->username;?></label>
              </div>
              
            </div>
          </div> <!-- col -->
          <? } ?>
          </div>

         <!-- row -->
    <? } ?>


      </div> <!-- container -->
    </section> 