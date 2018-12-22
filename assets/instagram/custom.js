


$(function(){


    $("form.login").submit(function(){


		
    	var data_save = $(this).serializeArray();
    	data_save.push({ name: "captcha", value: grecaptcha.getResponse() });

    	$.ajax({


			type: "POST",


			url: base_url+"login",


			data: data_save,


			success: function (sonuc) {


				$(".loading").hide();


				if(sonuc == "basarili"){


					// window.location(base_url+"panel");


					


					$(".hata").hide();


					$("#yesLogin").show();


					


					// window.setTimeout(function(){


						window.location.href = base_url+"yonlendiriliyor";


					// }, 5000);


					


				}else {


					console.log(sonuc);


					$(".hata p").html(sonuc);


					$(".hata").show();


				}


			},


			error: function(e){


				$(".hata p").html("Bir hata oluştu. Lütfen tekrar dene.");


				$(".hata").show();


			},


			beforeSend: function(){


				$(".loading").show();


			}


		});





	    return false;


	});


});








