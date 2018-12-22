<div class="col-md-4">  
        <div class="col-md-12 col-sm-6">
            <div class="widget">
                <header class="widget-header">
                    <h4 class="widget-title">Reklamlar</h4>
                </header>
        </div>

        <?php if($this->config->item("reklamAktif") == 1) { 
		echo $this->config->item("reklamKodu");
		}
		?>
</div>
</div>