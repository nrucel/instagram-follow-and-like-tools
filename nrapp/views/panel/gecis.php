<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		.btn-glyphicon {
			padding: 5px;
			background: #ffffff;
			margin-right: 4px;
		}

		.icon-btn {
			padding: 5px 15px 7px 6px;
			border-radius: 50px;
		}
	</style>
	<title>Geçiş Alanı | BEGENAPP</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>

		body {
			padding: 0;
			margin: 0;
		}

		html {
			-webkit-text-size-adjust: none;
			-ms-text-size-adjust: none;
		}

		@media only screen and (max-device-width: 680px), only screen and (max-width: 680px) {
			*[class="table_width_100"] {
				width: 100% !important;
			}

			*[class="border-right_mob"] {
				border-right: 1px solid #ffff;
			}

			*[class="mob_100"] {
				width: 100% !important;
			}

			*[class="mob_center"] {
				text-align: center !important;
			}

			*[class="mob_center_bl"] {
				float: none !important;
				display: block !important;
				margin: 0px auto;
			}

			.iage_footer a {
				text-decoration: none;
				color: #929ca8;
			}

			img.mob_display_none {
				width: 0px !important;
				height: 0px !important;
				display: none !important;
			}

			img.mob_width_50 {
				width: 40% !important;
				height: auto !important;
			}
		}

		.table_width_100 {
			width: 680px;
		}
	</style>
</head>
<body>
<script type="text/javascript">
var saniye = 10;		  
function sureGuncelle(){
		if(saniye > 0) 
		{
			saniye = saniye - 1;
			if( saniye == 0 ){
				$('.sayac').html('<a href="/panel" class="btn icon-btn btn-lg btn-primary"><i class="fas fa-sign-in-alt"></i> Devam et, Sisteme gir.</a>');
			} else {
				$('.sayac').html('<b><font color="red">' + saniye + '<font></b><br><span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">saniye sonra sisteme gireceksiniz..</span>');
			}
		}
		  }
		  if(saniye > 0) {
			  $(document).ready(function(){
					setInterval(sureGuncelle, 1000);
			  });
		  }		  
</script>

<div id="mailsub" class="notification" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#ffffff">


<!--[if gte mso 10]>
<table width="680" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<![endif]-->

<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 740px; min-width: 300px;">
    <tr><td>
	<!-- padding -->
	</td></tr>
	<!--header -->
	<tr><td align="center" bgcolor="#ffffff">
		<!-- padding -->
		<table width="100%" border="0" cellspacing="0" cellpadding="0"><div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
			<tr><td align="center">
						<br><br><div style="line-height: 13px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="green" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 25px; color: green;">
						Başarılı bir şekilde giriş yaptın.
					</span></font>
				</div><br>
				<div style="line-height: 40px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						<div class="sayac"></div>
					</span></font>
				</div>
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						
						<div style="height: 10px; line-height: 60px; font-size: 10px;"></div><b>
<?php if($this->config->item("reklamAktif") == 1) { 

	echo "<center><h5 style='color: red;'> Aşağıdaki Reklama tıkla +250 kredi kazan.</span></h5></center>";
	echo $this->config->item("reklamKodu");
}
?>
</b>
					</span></font>
				</div>
					</td>
					<td align="right">
				<!--[endif]--><!-- 

			</td>
			</tr>
		</table>
		<!-- padding --><div style="height: 10px; line-height: 50px; font-size: 10px;"></div>
	</td></tr>
	<tr>
	<td>
	<center>
<!-- padding --><div style="height: 10px; line-height: 60px; font-size: 10px;"></div>
<?php if($this->config->item("reklamAktif") == 1) { 
	echo $this->config->item("reklamKodu");
}
?>
			</td>
			</tr>


<tr>
									<td class="iage_footer" align="center" bgcolor="#ffffff">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td align="center" style="padding:20px;flaot:left;width:100%; text-align:center;">
													<font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
														<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
															2018 © NRUCEL.
														</span></font>
												</td>
											</tr>
										</table>
									</td>
								</tr>

								<tr>
									<td></td>
								</tr>
							</table>
							<!--[if gte mso 10]></td></tr></table><![endif]-->
						</td>
					</tr>
				</table>
</body>
</html>