<div class="wrap">
    <section class="app-content">
       <div class="card card-info center">
          </div>
        <div class="row">
            <div class="col-md-8">
                <div id="profile-tabs" class="nav-tabs-horizontal white m-b-lg">
                    <div id="nrc">
                    <header class="widget-header">
                        <h4 class="widget-title">Kullanıcı Adı ile Takipçi Gönder</h4>
                    </header>
                    <hr class="widget-separator">
                  <div id="profile-stream">
                            <div class="media stream-post">
                                <div class="media-body">
                                    <p><strong>Farklı bir hesaba Taipçi Nasıl Gönderilir?</strong></p>
                                    <p>Aşağıdaki kutuya hangi hesaba takipçi göndermek istiyorsan, o hesabın kullanıcı adını yaz ve Kullanıcıyı bul butonuna tıkla.</p>
                                    <div class=" m-t-md">
                                       <input type="text" style="margin-bottom:20px;" class="form-control" placeholder="instagram kullanıcı adı yazınız örn: nrucel" id="username">
                                    	<button type="button" style="display:block;width:100%;margin-bottom:20px;" class="btn btn-primary begendir" id="gonder" onclick="userFollow()"><i class="fas fa-search-plus"></i>  Kullanıcıyı Bul</button>
                                    </div>
                                    <div id="sonuc"> </div>
                                    
                                </div>
                            </div>
                    </div>
                </div>
                <?php if($this->config->item("reklamAktif") == 1) { 
                                            echo "<p>";
                                            echo $this->config->item("reklamKodu");
                                            echo "</p>";
                                        } ?>
            </div>
            </div>
            <? include('sidebar.php'); ?>
</div>
    </section>
</div>		