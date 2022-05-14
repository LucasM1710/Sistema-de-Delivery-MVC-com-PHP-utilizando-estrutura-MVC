<!--site base para cores: https://materializecss.com/-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= INCLUDE_PATH ?>views/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Delivery</title>
</head>
<body>
	<section class="descricao-home">
		<div class="container">
			<h2>Faça seu pedido conosco! <i class="fa fa-car"></i></h2>	
			<a href="<?= INCLUDE_PATH?>fechar-pedido">Fechar Pedido!</a>
			<div class="clear"></div>
		</div><!--container-->
	</section>

	<section class="lista-produtos">
		<div class="container">
			<?php  
				$lanche = deliveryModel::listarItems();

				foreach ($lanche as $key => $value) {
				
				


			?>



			<div class="box-single-food">
				<img src="<?php echo INCLUDE_PATH?>images/<?= $value['0'] ?>"/>
				<p><?= $value['1']  ?></p>
				<a href="<?= INCLUDE_PATH?>?addCart=<?= $key ?>">Adicionar ao carrinho</a>
			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>

	</section>

	
</body>
</html>