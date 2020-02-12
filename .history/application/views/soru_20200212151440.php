<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<link rel="stylesheet" href="style.css">
	<title>Soru Detayı</title>
</head>

<body>



<div class="row">
	

	<label> Soran Kişi </label><input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px" value="<?php echo $sorudetay->soran ?>">
	<label> Kime Soruyor </label><input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px" value="<?php echo $sorudetay->alici ?>">
	</div>
	<label> Önem Derecesi </label><input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px" value="<?php echo $sorudetay->onem ?>">
	<label>Sorulduğu Zaman</label><input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px" value="<?php echo $sorudetay->soruldugu_zaman ?>">
	<label>Soru Bitiş Zamanı</label><input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px" value="<?php echo $sorudetay->soru_zaman ?>">
	<label>Konu</label><input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px" value="<?php echo $sorudetay->soru_konu ?>">
	<label>Soru Detay</label><input class="easyui-textbox" data-options="iconCls:'icon-search'" style="width:300px" value="<?php echo $sorudetay->soru_detay ?>">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>