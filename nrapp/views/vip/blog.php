<div class="wrap">

    <section class="app-content">
        <div class="row">
            <div class="col-sm-12">
				<div class="widget">
					<header class="widget-header">
						<span style="text-align: left;font-size: 20px;font-weight: bold;">Bloglar</span> <span style="text-align: right;right: 30px;position: absolute;"><a class="btn btn-success" style="padding: 5px 12px;" href="./blogEkle"><i class="fa fa-plus"></i> Blog Ekle</a></span>
					</header>
					<hr class="widget-separator">
						<div class="widget-body row">
							<div class="col-sm-1"></div>
							<div class="col-sm-12">
								<div class="table-responsive">
									<table id="nrtablo" class="table table-striped" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Blog Sayfa</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($blog as $u): ?>
											<tr>
												<td>
													<?=$u;?>
													<input type="hidden" id="blog" value="<?=$u;?>">
												</td>
												<td style="text-align: right;">
													<span style="text-align: right;"><a href="./blogDuzenle/<?=$u;?>">Düzenle</a></span> <a style="color: red" href="" onclick="blogSil();">Sil</a>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="col-sm-1"></div>
						</div>
					</div>
				</div>
			</div>
        </div>

    </section>

</div>