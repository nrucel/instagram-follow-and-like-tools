 <!-- Footer Start -->
  <footer class="footer">
    <section class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6 sm-m-15px-tb md-m-30px-b">
            <h4 class="font-alt">Kimiz Biz ?</h4>
            <p class="footer-text">Nrucel Sosyal Medya Hizmetleri adı altında açılmış tüm siteler size hizmet vermek için faaliyettedir. 2013'den beri facebook'tan başlayıp instagram, youtube, twitch, swarm, twitter, tumblr gibi bir çok sosyal medya hizmeti sunmaktayız. Tüm hizmetlerimizi kullanıcılarımıza ücretsiz olarak sunmaktayız.</p><br>

          </div> <!-- col -->

         

          <div class="col-6 col-md-4 col-lg-2 sm-m-15px-tb">
            <h4 class="font-alt">Diğer Uygulamalar</h4>
            <ul class="fot-link">
                <li><a target="_blank" href="https://takipciapp.com">İnstagram Takipci Hilesi</a></li>
                <li><a target="_blank" href="https://igturk.net">İnstagram Takipci Hilesi</a></li>
                <li><a target="_blank" href="https://begen.app">Facebook Beğeni Hilesi</a></li>
                <li><a target="_blank" href="https://aboneapp.com">Youtube Abone Hilesi</a></li>
              </ul>
          </div>

          <div class="col-md-4 col-lg-4 sm-m-15px-tb">
            <h4 class="font-alt">Abone Ol</h4>
            <p>Kredilerin sıfırlanmasından ve siteye gelen yeni özelliklerden anında haberder ol.</p>
            <div class="subscribe-box m-20px-t">
              <input placeholder="Geçerli mail adresiniz ? " class="form-control" type="text" name="demo" disabled>
              <button class="m-btn m-btn-theme"><i class="ti-arrow-right"></i></button>
            </div>
          </div> <!-- col -->

        </div>
        <div class="col-12">
		
		<center style="color:white;"><b><i class="fa fa-google"></i> Tüm genel soru(n) için detay : </b> <a style="color:white;" href="mailto:<?=$varsayilanGonderenMaili?>"><?=$gorunurMail?></a> | <?=$yoneticiTel?></center>
		</div>
        <div class="footer-copy">
          <div class="row">
            <div class="col-12">
              <p>nrucel © Copyright 2013 - 2018 . All Rights Reserved. {elapsed_time} saniyede yüklendi.</p>
            </div><!-- col -->
          </div> <!-- row -->
        </div> <!-- footer-copy -->

      </div> <!-- container -->   
    </section>
  </footer>
  <!-- / -->
    <?=$analitik?> 
  <!-- jQuery -->
  <script src="<?=$dsc?>yeni/js/jquery-3.2.1.min.js"></script>
  <script src="<?=$dsc?>yeni/js/jquery-migrate-3.0.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <!-- Plugins -->
  <script src="<?=$dsc?>yeni/js/popper.min.js"></script>
  <script src="<?=$dsc?>yeni/js/bootstrap.min.js"></script>
  <script src="<?=$dsc?>yeni/js/owl.carousel.min.js"></script>
  <script src="<?=$dsc?>yeni/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=$dsc?>yeni/js/particles.min.js"></script>
  <script src="<?=$dsc?>yeni/js/particles-app.js"></script>

  <!-- custom -->
  <script src="<?=$dsc?>yeni/js/custom.js"></script>
  <script type="text/javascript">
        $(document).ready(function() {
            $('#listele').DataTable({"scrollX": false});
        } );
    </script>
</body>
<!-- Body End -->

</html>