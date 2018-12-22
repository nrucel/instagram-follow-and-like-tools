<div class="wrap">
	<section class="app-content">
		<div class="row">
			<div class="widget">
					<header class="widget-header">
						<h4 class="widget-title">Bilgilendirme</h4>
					</header>
					<hr class="widget-separator">
					<div class="widget-body row">
						<div class="col-sm-1"></div>
						<div class="col-sm-10">

						<p><strong>AYAR DOSYASI:</strong> nrapp/config/nrsetting.php</p>
						<hr>
						<p><strong>1)</strong> yukarıdaki dosyası a&ccedil; <strong>&Ouml;NEMLİ AYARLAR</strong> kısmını kesinlikle yap (Satır 10-18)</p>
						<hr>
						<p><strong>2) </strong>ayar dosyasında<strong> Sistem Genel Ayarları&nbsp;</strong>kendine g&ouml;re ayarla (satır 31-56)</p>
						<hr>
						<p><strong>3)</strong> ayar dosyasında&nbsp;<strong>KREDİ VE GİRİŞ AYARLARI</strong> altında kullanıcı giriş ayarı ve kredilerle alakalı ayarları yapabilirsin (satır 64-108)</p>
						<hr>
						<p><strong>4)</strong> ayar dosyasında&nbsp;<strong>REKLAM AYARLARI</strong> kısmını kendine g&ouml;re yap. yazan a&ccedil;ıklamyı dikkatli oku. (satır 122-125)</p>
						<hr>
						<p><strong>5)</strong> ayar dosyasında&nbsp;<strong>INSTAGRAM PAYLAŞIM &Ccedil;EKME AYARI</strong> altında pop&uuml;ler paylaşımlar ve etiketleri &ccedil;ekmek i&ccedil;in kullanıcı bilgilerini gir. &ccedil;ekmek istediğin etiketleri array i&ccedil;inde yaz (satır 139-144)</p>
						<hr>
						<p><strong>6)</strong> ayar dosyasında&nbsp;<strong>MENU AYARLARI</strong> altında men&uuml;leri d&uuml;zelte bilirsin. şablona g&ouml;re ekle a&ccedil;ıklamayı oku (satır 174-260)</p>
						<hr>
						<p><strong>--- CRON AYARLARI --</strong></p>
						<p>SSH (putty vb.) a&ccedil;.&nbsp;<br />nano /var/spool/cron/root [ENTER]<br />klas&ouml;r&uuml;n en altına aşağıdakileri komple yapıştır.(ssh'da mouse sağ tık yaparak yapıştırır.)</p>
						<p>#<?=$siteAdresi?> Cron<br />
						0 * * * * curl -I -k -s -m 300 https://<?=$siteAdresi?>/cron/krediVer/<?=$this->config->item(cronKey)?><br />
						0 */4 * * * curl -I -k -s -m 300 https://<?=$siteAdresi?>/cron/feed/<?=$this->config->item(cronKey)?><br />
						0 0 * * * curl -I -k -s -m 300 https://<?=$siteAdresi?>/cron/tag/<?=$this->config->item(cronKey)?></p>


					</div>
					</div>
				</div>

         
			</div>
		</section>
	</div>
