<div class="wrap">
    <section class="app-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="widget">


                    <header class="widget-header">


                        <h4 class="widget-title">Blog Ekle</h4>


                    </header>


                    <hr class="widget-separator">


                    <div class="widget-body row">



						<div class="form-horizontal col-md-10">


							<div class="form-group">

								<label for="blogAdi" class="col-sm-3 control-label">Blog Adı:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="blogAdi" id="blogAdi" placeholder="Blog Adı - Başlık(title)" required="required" >
								</div>

							</div>

							<div class="form-group">

								<label for="blogAciklama" class="col-sm-3 control-label">Blog Açıklama:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="blogAciklama" id="blogAciklama" placeholder="Blog Açıklama - description" required="required" >
								</div>

							</div>

							<div class="form-group">

								<label for="blogAnahtar" class="col-sm-3 control-label">Blog Anahtar Kelimeler:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="blogAnahtar" id="blogAnahtar" placeholder="Blog Anahtar Kelimeler - keywords" required="required" >
								</div>

							</div>

							<div class="form-group">

								<label for="blogUrl" class="col-sm-3 control-label">SEO Url:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="blogUrl" id="blogUrl" placeholder="Blog seo url - begeni-hilesi-2018" required="required" >
								</div>

							</div>

							<div class="form-group">

								<label for="blogResim" class="col-sm-3 control-label">Blog Resim Url:</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="blogResim" id="blogResim" placeholder="Blog resim url - https://resimyukle..." required="required" >
								</div>
							</div>

							<div class="form-group">
								<label for="blogDetay" class="col-sm-3 control-label">İçerik:</label>
								<div class="col-sm-9">
									<textarea name="blogDetay" id="blogDetay" class="form-control"></textarea>
								</div>
							</div>



							<div class="row">


								<div class="col-sm-9 col-sm-offset-3">


									<button type="button" class="btn btn-success" id="gonder" onclick="blogEkle()">Blog Ekle</button>
									<p></p>
									<div id="sonuc"></div>


								</div>


							</div>


						</div>


					</div>


                    


                </div>


            </div>


        </div>


    </section>


</div>
<script src="https://cdn.ckeditor.com/ckeditor5/11.1.1/classic/ckeditor.js"></script>
<script>
	let theEditor;
	ClassicEditor
		.create( document.querySelector( '#blogDetay' ) )
		.then( editor => {
			theEditor = editor;
			console.log( editor );
		} )
		.catch( error => {
			console.error( error );
		} );
</script>
