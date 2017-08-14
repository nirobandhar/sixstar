<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Title</title>
	<link rel="stylesheet" href="">
</head>
<body>
<h1>Barcode test</h1>
	<?php //if(isset($content))echo $content;
		

		//exit();
		//generate barcode
		$code = Zend_Barcode::render('code128', 'image', array('text'=>'2324234'), array());
	?>
</body>
</html>