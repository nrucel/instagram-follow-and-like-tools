<div class="wrap">
    <section class="app-content">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">Üye Sil</h4>
                    </header>
                    <hr class="widget-separator">
                    <div class="widget-body row">
						<div class="col-sm-1"></div>
						<div class="col-sm-10">
							<div class="panel panel-danger">
								<div class="panel-heading"><h4 class="panel-title"><?=$uye->adSoyad?></h4></div><div class="panel-body" style="text-align:center;">
									<p style="font-size:20px;margin-bottom:30px;">
										<?=$uye->adSoyad?> isimli VIP üye silinecektir. Onaylıyor musun ?
									</p>
									<p><a href="<?=base_url("vip/uye-sil/islem/".$uye->id)?>" class="btn rounded mw-md btn-primary">Evet canım, sil lütfen.</a></p>
								</div></div>
						</div>
						<div class="col-sm-1"></div>
					</div>
                    
                </div>
            </div>
        </div>
    </section>
</div>