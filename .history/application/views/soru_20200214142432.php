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
			<form action="" id="Formcevap">
				<div class="col-md-12">

					<label class="mr-2">Cevaplayın:</label>
					<br>
					<textarea name="cevapdetay<? echo $sorudetay->id; ?>" cols="56" rows="5" placeholder="Cevabınızı giriniz."></textarea>
					<div id="cevapsonuc"></div>
				</div>
			</form>
		</div>

		<div class="row ml-4 mt-3">
			<button onclick="javascript:xxx();" type="button">Cevapla</button>
		</div>

	</div>
	<script type="text/javascript">


function xxx(){
	$.ajax({
		url: '/kullanici/cevapkaydet/<? echo $sorudetay->id; ?>',
		type: 'POST',
		dataType: 'json',
		refresh: true,
		data: $('#Formcevap').serialize(),
		success: function(gelenveri) {
			if (gelenveri.success) {
				$("#cevapsonuc").html(gelenveri.hataMesaji);
				$("#cevapdetay").val("");


				var tab = $('#tt').tabs('getTab');

				var tab = $('#tt').tabs('getSelected');
var index = $('#tt').tabs('getTabIndex',tab);
alert(index);


/*
				var p = $('#tt').tabs('getTabIndex', 3); // get the first tab panel
				p.panel('refresh');
				*/

			} else {
				$("#cevapsonuc").html(gelenveri.hataMesaji);
			}
		}
	});
}
		$(function() {

			$.cevapkaydet = function() {
				$.ajax({
					url: '/kullanici/cevapkaydet/<? echo $sorudetay->id; ?>',
					type: 'POST',
					dataType: 'json',
					refresh: true,
					data: $('#Formcevap').serialize(),
					success: function(gelenveri) {
						if (gelenveri.success) {
							$("#cevapsonuc").html(gelenveri.hataMesaji);
							$("#cevapdetay").val("");


							var tab = $('#tt').tabs('getTab');


							console.log(tab);

/*
							var p = $('#tt').tabs('getTabIndex', 3); // get the first tab panel
							p.panel('refresh');
							*/

						} else {
							$("#cevapsonuc").html(gelenveri.hataMesaji);
						}
					}
				});
			}


		});
	</script>

	</html>