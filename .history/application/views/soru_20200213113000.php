<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Soru Detayı</title>
</head>

<body>

	<div class="container">



		<div class="row mt-3">


			<label> Soran Kişi </label><input class="easyui-textbox" readonly style="width:300px" value="<?php echo $sorudetay->soran ?>">
			<label> Kime Soruyor </label><input class="easyui-textbox" readonly style="width:300px" value="<?php echo $sorudetay->alici ?>">
		</div>
		<div class="row mt-3">

			<label>Sorulduğu Zaman</label><input class="easyui-textbox" readonly style="width:300px" value="<?php echo $sorudetay->soruldugu_zaman ?>">
			<label>Soru Bitiş Zamanı</label><input class="easyui-textbox" readonly style="width:300px" value="<?php echo $sorudetay->soru_zaman ?>">
		</div>
		<div class="row mt-3">
			<label> Önem Derecesi </label><input class="easyui-textbox" readonly style="width:300px" value="<?php echo $sorudetay->onem ?>">
			<label>Konu</label><input class="easyui-textbox" readonly style="width:300px" value="<?php echo $sorudetay->soru_konu ?>">
		</div>
		<div class="row mt-3">
			<label class="mr-2">Soru Detay:</label><?php echo $sorudetay->soru_detay ?>
		</div>
	

		<hr>
		<div class="row">
			<form action="" onsubmit="return false;" id="Formcevap" >
			<div class="col-md-12">

				<label class="mr-2">Cevaplayın:</label>
				<br>
				<textarea name="cevapdetay" cols="56" rows="5" placeholder="Cevabınızı giriniz."></textarea>

				<input type="hidden" name="cevaplayanid" value="<?php echo $this->session->kullanici_id ?>" >
				<div id="cevapsonuc"></div>
			</div>
			</form>
		</div>
		
			<div class="row ml-4 mt-3">
				<button onclick="$.cevapkaydet()" type="submit">Cevapla</button>
			</div>
		
	</div>

</body>
<footer>
<script type="text/javascript">
		$(function() {

			$.cevapkaydet = function() {
				$.ajax({
					url: '/Kullanici/cevapkaydet',
					type: 'POST',
					dataType: 'json',
					data: $('#Formcevap').serialize(),
					/*success: function(gelenveri) {
						if (gelenveri.success) {
							$("#cevapsonuc").html('Cevabınız başarıyla eklendi');
						} else {
							$("#cevapsonuc").html(gelenveri.hataMesaji);
						}
					}*/
				});
			}


		});
	</script>


</footer>
</html>