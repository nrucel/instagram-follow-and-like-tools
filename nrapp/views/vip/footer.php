	<div class="wrap p-t-0">
        <footer class="app-footer">
            <div class="clearfix">
                <div class="copyright pull-left">Copyright 2019 &copy; <?=$this->config->item("siteAdresi")?></div>
            </div>
        </footer>
    </div>
	</main>

<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

    <script>
        var base_url = "<?=base_url()?>";

        function userFollow(){

            $('#link').attr('readonly', 'readonly');
            $('#adet').attr('readonly', 'readonly');
            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> işlem yapılıyor..";

            var userName = document.getElementById("link").value;
            var adet = document.getElementById("adet").value;

            if(userName == "" || adet == ""){
                $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Lütfen boş alan bırakma !</div>');

                $('#adet').removeAttr('readonly');
                $('#link').removeAttr('readonly');
                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Takipçi Gönder';
                return;
            }

            

            $.get( "https://www.instagram.com/"+userName, function( data ) {
                data = JSON.parse(data.split("window._sharedData = ")[1].split(";<\/script>")[0]).entry_data.ProfilePage[0].graphql;
                console.log(data.user);

                if(data.user){

                    if(data.user.is_private == false){

                        $.ajax({
                            type: 'post',
                            url: base_url+'vip/takipciGonder',
                            dataType: 'json',
                            data: "link="+data.user.username+"&igid="+data.user.id+"&adet="+adet,
                            success: function(result) {
                                console.log(result);
                                if(result.status == "ok") {

                                    $('#sonuc').html('<div class="panel-body" style="background:green;color:#fff;"><i class="fas fa-check" style="font-weight=bold; font-size:15px;"></i> Başarılı.. '+result.basarili+' takipçi gönderildi.</div>');
                                } else {

                                    $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+result.message+'</div>');
                                }

                                $('#adet').removeAttr('readonly');
                                $('#link').removeAttr('readonly');
                                $('#gonder').prop("disabled", false);
                                document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Takipçi Gönder';

                                }
                        });

                    } else {

                        $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Hesap gizli. Lütfen hesabınızı herkese açık yapınız.</div>');
                        $('#adet').removeAttr('readonly');
                        $('#link').removeAttr('readonly');
                        $('#gonder').prop("disabled", false);
                        document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Takipçi Gönder';

                }

                } else{

                    $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> hatalı kullanıcı adı girdiniz kontrol edip tekrar deneyin.</div>');
                    $('#adet').removeAttr('readonly');
                    $('#link').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Takipçi Gönder';
                }
                
            })
            .fail(function(jqXHR, textStatus, errorThrown) {

                if(jqXHR.status == 404) {
                    $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> hatalı kullanıcı adı girdiniz kontrol edip tekrar deneyin.</div>');
                    $('#link').removeAttr('readonly');
                    $('#adet').removeAttr('readonly');
                    $('#gonder').prop("disabled", false);
                    document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Kullanıcıyı Bul';
                } else {
                    $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> hatalı kullanıcı adı girdiniz kontrol edip tekrar deneyin</div>');

                $('#adet').removeAttr('readonly');
                $('#link').removeAttr('readonly');
                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = '<i class="fas fa-search-plus"></i>  Kullanıcıyı Bul';
                }
              })

        }


        function apiEkle(){

            $('#link').attr('readonly', 'readonly');
            $('#adet').attr('readonly', 'readonly');
            $('#service').attr('readonly', 'readonly');
            $('#gonder').attr('disabled', 'disabled');
            document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> işlem yapılıyor..";

            var userName = document.getElementById("link").value;
            var adet = document.getElementById("adet").value;
            var service = document.getElementById("service").value;

            if(userName == "" || adet == "" || service == ""){
                $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Lütfen boş alan bırakma !</div>');

                $('#adet').removeAttr('readonly');
                $('#link').removeAttr('readonly');
                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Sipariş Ekle';
                return;
            }


                        $.ajax({
                            type: 'post',
                            url: base_url+"/api",
                            dataType: 'json',
                            data: "link="+userName+"&quantity="+adet+"&service="+service+"&action=add&key=<?=$this->config->item("apiKey");?>",
                            success: function(result) {
                                console.log(result);
                                if(result.order) {

                                    $('#sonuc').html('<div class="panel-body" style="background:green;color:#fff;"><i class="fas fa-check" style="font-weight=bold; font-size:15px;"></i> <b>#ID '+result.order+'</b> sipariş eklendi.</div>');
                                } else {

                                    $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+result.error+'</div>');
                                }

                                $('#adet').removeAttr('readonly');
                                $('#link').removeAttr('readonly');
                                $('#service').removeAttr('readonly');
                                $('#gonder').prop("disabled", false);
                                document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Sipariş Ekle';

                                }
                
            })
            .fail(function(jqXHR, textStatus, errorThrown) {

                $('#sonuc').html('<div style="background:#c50f0f;color:#fff;margin-top:10px;padding:10px"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> hatalı kullanıcı adı girdiniz kontrol edip tekrar deneyin</div>');

                $('#adet').removeAttr('readonly');
                $('#link').removeAttr('readonly');
                $('#service').removeAttr('readonly');
                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = '<i class="fas fa-plus"></i>  Sipariş Ekle';
              })

        }



        function userLike(){

            var link = document.getElementById("link").value;
            var adet = document.getElementById("adet").value;
            if(link == "" || adet == ""){
                $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Lütfen boş alan bırakma !</div>');
                return;
            }

            $.get( link, function( data ) {
                data = JSON.parse(data.split("window._sharedData = ")[1].split(";<\/script>")[0]).entry_data.PostPage[0].graphql;
                console.log(data.shortcode_media);

                if(data )
                if(data.media_id !== ""){
                    $('#sonuc').html('<div class="panel-body" style="background:green;color:#fff;">'+data.media_id+'</div>');
                } else{

                    $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> hatalı link girdiniz kontrol edip tekrar deneyin. Unutmayın profil gizli ise resim çekilemez. !</div>');
                }
                
            })
            .fail(function() {
                $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> hatalı link girdiniz kontrol edip tekrar deneyin. Unutmayın profil gizli ise resim çekilemez. !</div>');
              })
        }


    function blogEkle(){

        $('#gonder').attr('disabled', 'disabled');
        document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> işlem yapılıyor..";

        var blogAdi      = document.getElementById("blogAdi").value;
        var blogAciklama = document.getElementById("blogAciklama").value;
        var blogAnahtar  = document.getElementById("blogAnahtar").value;
        var blogUrl      = document.getElementById("blogUrl").value;
        var blogResim    = document.getElementById("blogResim").value;
        var blogDetay    = theEditor.getData();

        if(blogAdi == "" || blogAciklama == "" || blogAnahtar == "" || blogUrl == "" || blogDetay == ""){
            $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Lütfen boş alan bırakma !</div>');

            $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = 'Blog Ekle';
                return;
        }





        $.ajax({
            type: 'post',
            url: base_url+'vip/blogEkle',
            dataType: 'json',
            data: "blogAdi="+blogAdi+"&blogAciklama="+blogAciklama+"&blogAnahtar="+blogAnahtar+"&blogUrl="+blogUrl+"&blogResim="+blogResim+"&blogDetay="+blogDetay,
            success: function(result) {
                console.log(result);
                if(result.status == "ok") {

                    $('#sonuc').html('<div class="panel-body" style="background:green;color:#fff;"><i class="fas fa-check" style="font-weight=bold; font-size:15px;"></i> Başarılı.. '+result.message+'</div>');
                } else {

                    $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+result.message+'</div>');
                }

                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = 'blog Ekle';

                }
        });
    }

    function blogDuzenle(){

        $('#gonder').attr('disabled', 'disabled');
        document.getElementById('gonder').innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> işlem yapılıyor..";


        var blogAdi      = document.getElementById("blogAdi").value;
        var blogAciklama = document.getElementById("blogAciklama").value;
        var blogAnahtar  = document.getElementById("blogAnahtar").value;
        var blogUrl      = document.getElementById("blogUrl").value;
        var blogResim    = document.getElementById("blogResim").value;
        var blogDetay    = theEditor.getData();

        if(blogAdi == "" || blogAciklama == "" || blogAnahtar == "" || blogUrl == "" || blogDetay == ""){
            $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Lütfen boş alan bırakma !</div>');

            $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = 'Blog Ekle';
                return;
        }





        $.ajax({
            type: 'post',
            url: window.location.href,
            dataType: 'json',
            data: "blogAdi="+blogAdi+"&blogAciklama="+blogAciklama+"&blogAnahtar="+blogAnahtar+"&blogUrl="+blogUrl+"&blogResim="+blogResim+"&blogDetay="+blogDetay,
            success: function(result) {
                console.log(result);
                if(result.status == "ok") {

                    $('#sonuc').html('<div class="panel-body" style="background:green;color:#fff;"><i class="fas fa-check" style="font-weight=bold; font-size:15px;"></i> Başarılı.. '+result.message+'</div>');
                } else {

                    $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+result.message+'</div>');
                }

                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = 'blog Ekle';

                }
        });
    }

    function blogSil(){

        if (confirm("Silmek istediğine emin misin?") == true) {

            var blog = document.getElementById("blog").value;

            $.ajax({
                type: 'post',
                url: base_url+'vip/blogSil',
                dataType: 'json',
                data: "blog="+blog,
                success: function(result) {
                    if(result.status == "ok") {
                        alert("silindi");
                    } else {
                        alert("hata");
                    }

                }
            });
        }

        
    }

    </script>

    <script src="<?=$gc?>js2/core.min.js"></script>
    <script src="<?=$gc?>js2/app.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#nrtablo').DataTable( {
                "order": [[ 6, "desc" ]]
            } );
            $('#nrtablo2').DataTable( {
                "order": [[ 4, "desc" ]]
            } );
        } );
    </script>

</body>
</html>