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
        var zaman        = document.getElementById("zaman").value;
        var blogDetay    = theEditor.getData();

        if(blogAdi == "" || blogAciklama == "" || blogAnahtar == "" || blogUrl == "" || blogDetay == ""){
            $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> Lütfen boş alan bırakma !</div>');

            $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = 'Blog Düzenle';
                return;
        }





        $.ajax({
            type: 'post',
            url: window.location.href,
            dataType: 'json',
            data: "blogAdi="+blogAdi+"&blogAciklama="+blogAciklama+"&blogAnahtar="+blogAnahtar+"&blogUrl="+blogUrl+"&blogResim="+blogResim+"&blogDetay="+blogDetay+"&zaman="+zaman,
            success: function(result) {
                console.log(result);
                if(result.status == "ok") {

                    $('#sonuc').html('<div class="panel-body" style="background:green;color:#fff;"><i class="fas fa-check" style="font-weight=bold; font-size:15px;"></i> Başarılı.. '+result.message+'</div>');
                } else {

                    $('#sonuc').html('<div class="panel-body" style="background:#c50f0f;color:#fff;"><i class="fas fa-exclamation" style="font-weight=bold; font-size:15px;"></i> '+result.message+'</div>');
                }

                $('#gonder').prop("disabled", false);
                document.getElementById('gonder').innerHTML = 'blog Düzenle';

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