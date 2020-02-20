	<div class="container">



		<div class="row mt-3">
			<div class="col-md-6">

				<label class="ml-2 mr-2"> Soran Kişi </label><input class="easyui-textbox" readonly style="width:120px" value="<?php echo $sorudetay->soran ?>">
				<label class="ml-2 mr-2"> Kime Soruyor </label><input class="easyui-textbox" readonly style="width:120px" value="<?php echo $sorudetay->alici ?>">
				<hr>
			</div>

			<div class="col-md-6">
				<?php
				$i = 0;
				foreach ($dosyalar as $dosya) {
					$i++; ?>


					<a id="btn" href="<?php echo $dosya->dosya_url ?>" class="easyui-linkbutton" target="_blank" data-options="iconCls:'icon-search'">Belge <?php echo  $i; ?></a>



				<?php 	} ?>
			</div>

		</div>

		<div class="row mt-3">
			<div class="col-md-8">
				<label class="ml-2 mr-2">Sorulduğu Zaman</label><input class="easyui-textbox" readonly style="width:150px" value="<?php echo $sorudetay->soruldugu_zaman ?>">
				<label class="ml-2 mr-2">Soru Bitiş Zamanı</label><input class="easyui-textbox" readonly style="width:150px" value="<?php echo $sorudetay->soru_zaman ?>">
				<hr>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-6">
				<label class="ml-2 mr-2"> Önem Derecesi </label><input class="easyui-textbox" readonly style="width:100px" value="<?php echo $sorudetay->onem ?>">
				<label class="ml-2 mr-2">Konu</label><input class="easyui-textbox" readonly style="width:100px" value="<?php echo $sorudetay->soru_konu ?>">
				<hr>
			</div>
		</div>
		<div class="row mt-3">
			<label class="ml-4 mr-2">Soru Detay</label><?php echo $sorudetay->soru_detay ?>
		</div>

		<hr>


		<?php



		foreach ($cevaplar as $cevap) { ?>


			<div class="row">
				<div class="col-md-2 my-2 ml-1">
					<?php echo $cevap->kullanici_adsoyad ?>
				</div>

				<div class="col-md-8 ml-2">
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
			<button class="btn btn-success" onclick="$.cevapkaydet(<? echo $sorudetay->id; ?>);" type="button">Cevapla</button>
		</div>

	</div>


	</html>