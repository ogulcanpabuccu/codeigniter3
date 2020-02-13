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
			<div class="col-md-12">

				<label class="mr-2">Cevaplayın:</label>
				<br>
				<textarea name="cevapdetay" cols="56" rows="5" placeholder="Cevabınızı giriniz."></textarea>

			</div>
		</div>
		
			<div class="row ml-4 mt-3">
				<button onclick="$.cevapkaydet()" type="submit">Cevapla</button>
			</div>
		
			<?php $this->session->kullanici_id ?>
	</div>

</body>
<footer>

<script type="text/javascript">
		$(function() {

			$.cevapkaydet = function() {
				$.ajax({
					url: '/kullanici/cevapkaydet/ '+$this->session->kullanici_id+,
					type: 'POST',
					dataType: 'json',
					data: $('#FormID1').serialize(),
					success: function(gelenveri) {
						if (gelenveri.success) {
							$("#sonuc").html('<a href="/soru/detay/' + gelenveri.soruId + '">soruya git</a>');
						} else {
							$("#sonuc").html(gelenveri.hataMesaji);
						}
					}
				});
			}


		});
	</script>

</footer>
</html>