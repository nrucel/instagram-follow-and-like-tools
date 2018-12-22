<div class="wrap">
    <section class="app-content">
       <div class="card card-info center">
          </div>
        <div class="row">
            <div class="col-md-8">
                <div id="profile-tabs" class="nav-tabs-horizontal white m-b-lg">
                  <div id="profile-stream">
                            <div class="media stream-post" style="background: #f2dede; color: #a94442;">
                                <div class="media-body">
                                    <p><strong>Aradığın Servisi bulamadık :(</strong></p>
                                    <p>Kullanmak istediğin hile bu site için devre dışıdır. <strong><a href="https://takipapp.com/giris-yap" target="_blank">takipapp.com</a></strong> sitesine giriş yaparak istediğin hileyi kullanabilirsin..</p>
                                    <div class=" m-t-md">
                                    	<button type="button" style="display:block;width:100%;margin-bottom:20px;" class="btn btn-primary begendir" id="gonder" onclick="yonlendirgeri()"><i class="fas fa-search-plus"></i>  Takipçi Gönder</button>
                                    </div>
                                    <div id="sonuc"> </div>
                                    <?php if($this->config->item("reklamAktif") == 1) { 
                                            echo "<p>";
                                            echo $this->config->item("reklamKodu");
                                            echo "</p>";
                                        } ?>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <? include('sidebar.php'); ?>
</div>
    </section>
</div>		