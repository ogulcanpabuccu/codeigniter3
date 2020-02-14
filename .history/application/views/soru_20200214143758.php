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

		<?php

		foreach ($cevaplar as $cevap) { ?>


			<div class="row">
				<div class="col-md-2 my-2">
					<?php echo $cevap->kullanici_adsoyad ?>
				</div>
				<div class="col-md-2  my-2">
					<?php echo $cevap->cevaplama_zamanı ?>
				</div>
				<div class="col-md-8">
					<?php echo $cevap->cevap_detay ?>
				</div>
			</div>

			<hr>





		<?php }	?>


		<div class="row">
			<form action="" id="Formcevap<? echo $sorudetay->id; ?>">
				<div class="col-md-12">

					<label class="mr-2">Cevaplayın:</label>
					<br>
					<textarea name="cevapdetay" id="cevapdetay<? echo $sorudetay->id; ?>" cols="56" rows="5" placeholder="Cevabınızı giriniz."></textarea>
					<div id="cevapsonuc<? echo $sorudetay->id; ?>"></div>
				</div>
			</form>
		</div>

		<div class="row ml-4 mt-3">
			<button onclick="$.cevapkaydet(<? echo $sorudetay->id; ?>);" type="button">Cevapla</button>
		</div>

	</div>
	<script type="text/javascript">
		$(function() {

			$.cevapkaydet< = function(soruId) {
				$.ajax({
					url: '/kullanici/cevapkaydet/'+soruId,
					type: 'POST',
					dataType: 'json',
					refresh: true,
					data: $('#Formcevap'+soruId).serialize(),
					success: function(gelenveri) {
						if (gelenveri.success) {
							$("#cevapsonu"+soruId).html(gelenveri.hataMesaji);
							$("#cevapdetay"+soruId).val("");



							var tab<? echo $sorudetay->id; ?> = $('#tt').tabs('getSelected');
							var index<? echo $sorudetay->id; ?> = $('#tt').tabs('getTabIndex', tab<? echo $sorudetay->id; ?>);
							alert(index<? echo $sorudetay->id; ?>);


							var p<? echo $sorudetay->id; ?> = $('#tt').tabs('getTab', index<? echo $sorudetay->id; ?>); // get the first tab panel
							p<? echo $sorudetay->id; ?>.panel('refresh');
						} else {
							$("#cevapsonuc").html(gelenveri.hataMesaji);
						}
					}
				});
			}


		});
	</script>

	</html>