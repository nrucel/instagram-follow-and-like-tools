    <section class="page-title-section" style="background: #1576c2">
      <div class="container text-center">
          <h1 style="margin: 0 0 20px;font-size: 32px;font-weight: 500;color: #fff;"><?=$blogAdi;?></h1>
      </div>
    </section>

        <section id="about" class="section gray-bg border-bottom">
      <div class="container">
      	<div class="row h-100 justify-content-center align-items-center">
          <div class="col-md-8">
								<div class="table-responsive text-center">
									<table id="listele" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Feed Tarih Listesi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($liste as $l): ?>
											<tr>
												<td>
													<a target="_blank" href="<?=base_url().$tip?>/<?=$l["Ad"]?>"><?=$l["Ad"]?></a>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
        </div>
      </div> 
  </section>