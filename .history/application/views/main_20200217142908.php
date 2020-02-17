<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">



	<link rel="stylesheet" type="text/css" href="/assets/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/assets/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/assets/dropzone.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


	<title>Welcome to CodeIgniter</title>


</head>

<body>

	<div class="container mt-3">



		<div id="p" class="easyui-panel" title="My Panel" style="width:1100px;height:600px;padding:10px;background:#fafafa;" data-options="iconCls:'icon-save',closable:true,
                collapsible:true,minimizable:true,maximizable:true">

			<div id="tt" class="easyui-tabs" style="width:999px;height:499px;">

				<div title="Giriş" style="padding:20px;display:none;">

					<?php

					if (!isset($this->session->kullanici_mail)) { ?>


						<form action="/Kullanici/giris" method="POST">
							<div>
								<label for="name">Email:</label>
								<input class="easyui-textbox" prompt="Mail Adresini gir" name="email" required="required" data-options="validType:'email', required:true " />
							</div>
							<div>
								<label for="email">Şifre:</label>
								<input class="easyui-passwordbox" prompt="Şifreni gir" required="required" name="sifre" data-options=" required:true" />
							</div>
							<button id="btn" type="submit" class="easyui-linkbutton">Giriş</button>

				</div>

				</form>
			<?php 	} else { ?>

				Hoşgeldin sayın <?php echo $this->session->kullanici_mail ?> ...
				<hr>
				Çıkış Yapmak için tıklayın

				<form action="/Kullanici/cikis" method="POST">


					<button id="btncik" type="submit" class="easyui-linkbutton">Çıkış</button>

				</form>



			<?php	} ?>


			</div>

			<div title="Soru Sor" selected ; data-options="closable:true" style="overflow:auto;padding:20px;display:none;">

				<form action="" method="POST" onsubmit="return false;" id="FormID1">
					<div class="col-md-12">
						<label>Soran : </label> <input class="easyui-textbox" readonly style="width:100px" name="soran" value="<?php echo $this->session->kullanici_mail ?>">
					</div>

					<div class="col-md-12">

						<label>Alıcı Seç : </label> <select id="alici" name="alici" class="easyui-combobox" style="width:100px;">
							<option value="0">Kullanıcı Seçiniz</option>
							<? foreach ($kullanicilar as $kullanici) { ?>
								<? if ($kullanici->kullanici_id != $this->session->kullanici_id) { ?>
									<option value="<? echo $kullanici->kullanici_mail; ?>"><? echo $kullanici->kullanici_mail; ?></option>
								<? } ?>
							<? } ?>
						</select>
					</div>

					<div class="row">



						<div class="col-md-6">

							<label>Önem Durumu :</label> <select id="onem" name="onem" class="easyui-combobox" style="width:100px;">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>

							<input class="easyui-datetimebox" name="day" id="day1" data-options="required:true,showSeconds:false" value="" prompt="Ay/Gün/Yıl Saat:Dakika" style="width:150px">

						</div>

					</div>

					<div class="row">
						<div class="col-md-12">

							<label>Konu :</label> <input name="sorukonu" cols="56" rows="5" placeholder="Konu girin"></input>

						</div>
					</div>
					<div class="row">
						<div class="col-md-12">

							<textarea name="sorudetay" cols="56" rows="5" placeholder="Sorunuzu girin"></textarea>

						</div>
					</div>
					<div class="row">
						<button onclick="$.sorukaydet()" type="submit">Gönder</button>
					</div>
					<div id="sonuc"></div>
			</div>
			</form>
			<div title="Dosya Ekle" data-options="closable:true" style="overflow:auto;padding:20px;display:none;">

				<h2 class="text-center" >Dosya Ekleyin</h2>


			</div>
			<div title="Sorular" data-options="closable:true" style="overflow:auto;padding:20px;display:none;">

				<table id="dg"> </table>

			</div>




		</div>

	</div>
</body>
<footer>
<script type="text/javascript" src="/assets/dropzone.js"></script>
	<script type="text/javascript" src="/assets/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/jquery.easyui.min.js"></script>
	<script type="text/javascript">
		$('#dg').datagrid({
			url: '/kullanici/sorugonder',
			width: 800,
			pagination: true,
			rownumbers: true,
			ctrlSelect: true,
			onClickRow(index, row) {
				console.log('row', row);

				$('#tt').tabs('add', {
					id: 'sorutab' + row.id,
					title: "#" + row.id + " - " + row.soru_konu,
					closable: true,
					href: '/kullanici/sorudetay/' + row.id,

				});

			},

			columns: [
				[{
						field: 'soran',
						title: 'Soran Kişi',
						width: 80
					},
					{
						field: 'alici',
						title: 'Kime Sordu',
						width: 100
					},
					{
						field: 'onem',
						title: 'Önemi',
						width: 60,

					},
					{
						field: 'soru_konu',
						title: 'Konu',
						width: 100,

					},
					{
						field: 'soru_zaman',
						title: 'Son Cevap Zamanı',
						width: 130,

					},
					{
						field: 'cevapsayi',
						title: 'Cevaplanma Sayısı',
						width: 130,

					},
					{
						field: 'soncevapzamani',
						title: 'Son Cevaplanma Zamanı',
						width: 170,

					}
				]
			]
		});

	
	</script>

	<script type="text/javascript">
		$(function() {

			$.sorukaydet = function() {
				$.ajax({
					url: '/kullanici/kaydet',
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



			$.cevapkaydet = function(soruId) {
				$.ajax({
					url: '/kullanici/cevapkaydet/' + soruId,
					type: 'POST',
					dataType: 'json',
					refresh: true,
					data: $('#Formcevap' + soruId).serialize(),
					success: function(gelenveri) {
						if (gelenveri.success) {
							$("#cevapsonu" + soruId).html(gelenveri.hataMesaji);
							$("#cevapdetay" + soruId).val("");
							var p = $('#tt').tabs('getTab', $('#tt').tabs('getTabIndex', $('#tt').tabs('getSelected'))); // get the first tab panel
							p.panel('refresh');
						} else {
							$("#cevapsonuc" + soruId).html(gelenveri.hataMesaji);
						}
					}
				});
			}

		});
	</script>

</footer>

</html>