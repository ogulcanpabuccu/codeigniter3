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


	<title>Hoşgeldiniz</title>


</head>

<body>

	<div style="margin-left: 350px;" class="container mt-3">



		<div id="p" class="easyui-panel" title="Panel" style="width:1300px;height:800px;padding:10px;background:#fafafa;" data-options="iconCls:'icon-save',closable:true,
                collapsible:true,minimizable:true,maximizable:true">

			<div id="tt" class="easyui-tabs" style="width:1250px;height:740px;">

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

				Hoşgeldin <?php echo $this->session->kullanici_adsoyad ?> 
				<hr>
				Çıkış Yapmak için tıklayın

				<form action="/Kullanici/cikis" method="POST">


					<button id="btncik" type="submit" class="easyui-linkbutton">Çıkış</button>

				</form>



			<?php	} ?>


			</div>

			<div title="Soru Sor" selected ; data-options="closable:true" style="overflow:auto;padding:20px;display:none;">

				<form action="" method="POST" onsubmit="return false;" enctype="multipart/form-data" id="FormID1">
					<div class="row">


						<div class="col-md-6">
							<label>Soran : </label> <input class="easyui-textbox" readonly style="width:150px" name="soran" value="<?php echo $this->session->kullanici_adsoyad ?>">
						</div>




						<div id="dosyalar"></div>


					</div>
					<div class="row">


						<div class="col-md-6" style="margin-top:10px;">

							<label>Alıcı Seç : </label> <select id="alici" name="alici" class="easyui-combobox" style="width:100px;">
								<option value="0">Kullanıcı Seçiniz</option>
								<? foreach ($kullanicilar as $kullanici) { ?>

									<? if ($kullanici->kullanici_id != $this->session->kullanici_id) { ?>
										<option value="<? echo $kullanici->kullanici_adsoyad; ?>"><? echo $kullanici->kullanici_adsoyad; ?></option>
									<? } ?>

								<? } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6" style="margin-top: 10px;">

							<label>Önem Durumu :</label> <select id="onem" name="onem" class="easyui-combobox" style="width:100px;">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>
							<input class="easyui-datetimebox" name="day" id="day1" data-options="required:true,showSeconds:false" value="" prompt="Ay/Gün/Yıl Saat:Dakika" style="width:150px">

						</div>

					</div>

					<div class="row">
						<div class="col-md-6" style="margin-top: 10px;">

							<label>Konu :</label> <input name="sorukonu" cols="56" rows="5" placeholder="Konu girin"></input>

						</div>
					</div>
					<div class="row">
						<div class="col-md-6" style="margin-top: 10px;">

							<textarea name="sorudetay" cols="56" rows="5" placeholder="Sorunuzu girin"></textarea>

						</div>
					</div>
					<div class="row" style="margin-top:10px;">


						<div id="some-dropzone" style="margin-left: 14px;" class="dropzone"></div>
					</div>
					<div class="row">
						<button onclick="$.sorukaydet()" class="btn btn-success ml-3 mt-3" type="submit">Gönder</button>
					</div>
					
					<div id="sonuc"></div>
			</div>
			</form>

			<div title="Sorular" data-options="closable:true" style="overflow:auto;padding:20px;display:none;">

				<table id="dg"> </table>

			</div>


		</div>

	</div>
	<footer>

		<script type="text/javascript" src="/assets/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/jquery.easyui.min.js"></script>
		<script type="text/javascript" src="/assets/dropzone.js"></script>
		<script type="text/javascript">
			Dropzone.options.someDropzone = {
				url: "/file/upload",
				success: function(data, gelenData) {
					console.log(gelenData);
					if (gelenData) {
						$("#dosyalar").append('<input type="hidden" name="dosyalar[]" value="' + gelenData.resim_yol + '" />');
					}
				}
			};
		</script>

		<script type="text/javascript">
			$(function(sorudetay) {
				$('#dg').datagrid({
					url: '/kullanici/sorugonder',
					width: 1050,
					pagination: false,
					pageNumber: 1,
					pageSize: 10,
					pageList: [10, 20, 30, 40, 50],
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
								width: 120,
							},
							{
								field: 'alici',
								title: 'Kime Sordu',
								width: 100,
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
								title: 'İş Tamamlama Zamanı',
								width: 150,

							},
							{
								field: 'cevapsayi',
								title: 'Cevaplanma Sayısı',
								width: 130,

							},
							{
								field: 'cevaplayan',
								title: 'Cevapladın mı ?',
								width: 110,
								formatter: function(value) {
									if (value > 0) {

										return 'Evet (' + value + ')';

									} else {
										return 'Hayır';
									}
								}
							},
							{
								field: 'dosyasayi',
								title: 'Dosya Sayısı',
								width: 100,

							},
							{
								field: 'soncevapzamani',
								title: 'Son Cevaplanma Zamanı',
								width: 190,

							}
						]
					]
				});
			});
		</script>

		<script type="text/javascript">
			$(function() {
				//<a href="/kullanici/sorudetay/' + gelenveri.soruId + '">soruya git</a>
				$.sorukaydet = function() {
					$.ajax({
						url: '/kullanici/kaydet',
						type: 'POST',
						dataType: 'json',
						data: $('#FormID1').serialize(),
						success: function(gelenveri) {
							if (gelenveri.success) {
								$("#sonuc").html('Soru Başarıyla eklendi.');
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
								$("#cevapsonuc" + soruId).html(gelenveri.hataMesaji);
								$("#cevapdetay" + soruId).val("");
								var p = $('#tt').tabs('getTab', $('#tt').tabs('getTabIndex', $('#tt').tabs('getSelected')));
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
</body>

</html>