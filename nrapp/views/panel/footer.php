	<div class="wrap p-t-0">

        <footer class="app-footer">

            <div class="clearfix">

                <ul class="footer-menu pull-right">

                    <li>nrucel</li>

                </ul>

                <div class="copyright pull-left">Copyright 2018 &copy; <?=$this->config->item("siteAdresi")?></div>

            </div>

        </footer>

    </div>

	</main>
    <div id="google_translate_element"></div>
    <?=$this->config->item("analitik")?>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script type="text/javascript">
      var base_url = "<?=base_url()?>";

        function userFollow(){

            $('#username').attr('readonly', 'readonly');
            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> Kullanıcı Aranıyor..";

            var username = document.getElementById("username").value;

            if(username == ""){
                $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px">Lütfen boş alan bırakma !</div>');
                $('#username').removeAttr('readonly');
                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Kullanıcıyı Bul';
                return;
            }

            

            $.post( base_url+"panel/jsonCek", { link: username, tur: "takip" }, function( data ) {
                data = JSON.parse(data);
                var data = data.data;

                if(data){

                    if(data.is_private == true){
                        $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+data.username+' profili gizli hesaptır. Lütfen hesabınız herkese açık yapınız.</div>');
                        $('#username').removeAttr('readonly');
                        $('#gonder').prop("disabled", false);
                        document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Kullanıcıyı Bul';

                    } else {

                        var nrc = document.getElementById("nrc");

                        nrc.innerHTML = '<header class="widget-header" style="background: #188ae2; color: white;"><img src="'+data.profile_pic_url+'" style="height: 30px;"/>  @'+data.username+'   Takipçi: '+data.edge_followed_by.count+'  | Takip Ettiği: '+data.edge_follow.count+' | Kredi: <?=$uye->takipKredi?></header><hr class="widget-separator"><div id="profile-stream"><div class="media stream-post"><div class="media-body"><p><strong>'+data.full_name+' ('+data.username+') </strong></p><p>kaç takipçi göndermek istiyorsan aşağıdaki kutuya yaz ve gönder butonuna tıkla. Unutma! kredin kadar takipçi gönderebilirsin..</p><div class=" m-t-md"><input type="hidden" id="link" value="'+data.id+'"><input type="hidden" id="kAdi" value="'+data.username+'"><input type="text" style="margin-bottom:20px;" class="form-control" placeholder="Kaç takipçi göndermek istiyorsun?" id="adet"><button type="button" style="display:block;width:100%;margin-bottom:20px;" class="btn btn-primary begendir" id="gonder" onclick="takipci()"><i class="fas fa-plus"></i>  Takipçi Gönder</button></div><div id="sonuc"> </div></div></div></div>';

                            document.getElementById("adet").addEventListener("keyup", function(event) {
                            event.preventDefault();
                            if (event.keyCode === 13) {
                                document.getElementById("gonder").click();
                            }
                            });

                       }

                } else{

                    $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> hatalı kullanıcı adı girdiniz kontrol edip tekrar deneyin.</div>');
                    $('#username').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Kullanıcıyı Bul';
                }
                
            })
            .fail(function(jqXHR, textStatus, errorThrown) {

                    $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Sistemsel bir hata oluştu. Bir kaç saniye sonra tekrar deneyin..</div>');

                    $('#username').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Kullanıcıyı Bul';
              })


        }


        document.getElementById("username").addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("gonder").click();
        }
        });


        function takipci() {

            var link = $('#link').val();
            var kAdi = $('#kAdi').val();
            var adet = $('#adet').val();
            $('#adet').attr('readonly', 'readonly');
            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> Gönderiliyor..";
            $.ajax({
                type: 'post',
                url: base_url+'panel/takipGonder',
                dataType: 'json',
                data: "link="+link+"&kadi="+kAdi+"&adet="+adet,
                success: function(result) {
                    console.log(result);
                    if(result.status == "ok") {

                        $('#sonuc').html('<div class="panel-body" style="background:green;color:#fff;"><i class="fas fa-check" style="font-weight=bold; font-size:15px;"></i> Başarılı.. '+result.basarili+' takipçi gönderildi. Kalan Kredi: '+result.kredi+'</div>');
                    } else {

                        $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+result.message+'</div>');
                    }

                    $('#adet').removeAttr('readonly');
                    $('#username').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Takipçi Gönder';

                    }
            });
 
        }

        function userLike(){

            $('#link').attr('readonly', 'readonly');
            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> Kullanıcı Aranıyor..";

            var link = document.getElementById("link").value;

            if(link == ""){
                $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px">Lütfen boş alan bırakma !</div>');

                $('#link').removeAttr('readonly');
                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Fotoğrafı Bul';
                return;
            }

            $.post( base_url+"panel/jsonCek", { link: link, tur: "begen" }, function( data ) {
                data = JSON.parse(data);
                var data = data.data;

                if(data){

                        var nrc = document.getElementById("nrc");

                        nrc.innerHTML = '<header class="widget-header" style="background: #188ae2; color: white;"><img src="'+data.owner.profile_pic_url+'" style="height: 30px;"/>  @'+data.owner.username+'   Beğeni: '+data.edge_media_preview_like.count+'  | Yorum: '+data.edge_media_to_comment.count+' | Kredi: <?=$uye->begeniKredi?></header><hr class="widget-separator"><div id="profile-stream"><div class="media stream-post"><div class="media-body"><p><img src="'+data.display_url+'" style="height: 100px"></p><p>kaç beğeni göndermek istiyorsan aşağıdaki kutuya yaz ve gönder butonuna tıkla. Unutma! kredin kadar beğeni gönderebilirsin..</p><div class=" m-t-md"><input type="hidden" id="link" value="'+data.id+'"><input type="hidden" id="code" value="'+data.shortcode+'"><input type="text" style="margin-bottom:20px;" class="form-control" placeholder="Kaç beğeni göndermek istiyorsun?" id="adet"><button type="button" style="display:block;width:100%;margin-bottom:20px;" class="btn btn-primary begendir" id="gonder" onclick="begeni()"><i class="fas fa-plus"></i>  Beğeni Gönder</button></div><div id="sonuc"></div></div></div></div>';

                            document.getElementById("adet").addEventListener("keyup", function(event) {
                            event.preventDefault();
                            if (event.keyCode === 13) {
                                document.getElementById("gonder").click();
                            }
                            });

                } else{

                    $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> istediğin fotoğrafı bulamadık. Linki kontrol et. Not: Gizli hesapların fotoğrafları görünmez.</div>');
                    $('#link').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Fotoğrafı Bul';
                }
                
            })
            .fail(function(jqXHR, textStatus, errorThrown) {

                    $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Sistemsel bir hata oluştu. Bir kaç saniye sonra tekrar deneyin..</div>');
                    $('#link').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Fotoğrafı Bul';
                
              })


        }


        document.getElementById("username").addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode === 13) {
            document.getElementById("gonder").click();
        }
        });

        function begeni() {

            var link = $('#link').val();
            var code = $('#code').val();
            var adet = $('#adet').val();
            $('#adet').attr('readonly', 'readonly');
            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> Gönderiliyor..";
            $.ajax({
                type: 'post',
                url: base_url+'panel/begeniGonder',
                dataType: 'json',
                data: "link="+link+"&code="+code+"&adet="+adet,
                success: function(result) {
                    console.log(result);
                    if(result.status == "ok") {

                        $('#sonuc').html('<div class="panel-body" style="background:green;color:#fff;"><i class="fas fa-check" style="font-weight=bold; font-size:15px;"></i> Başarılı.. '+result.basarili+' takipçi gönderildi. Kalan Kredi: '+result.kredi+'</div>');
                    } else {

                        $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+result.message+'</div>');
                    }

                    $('#adet').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Beğeni Gönder';

                    }
            });
 
        }




    </script>
    <script src="<?=$gc?>js2/core.min.js"></script>
    <script src="<?=$gc?>js2/app.min.js"></script>
    <link href="<?=$dsc?>yeni/css/nrucel1.css" rel="stylesheet">
    <script type="text/javascript" src="<?=$dsc?>yeni/js/nrucel.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
</html>