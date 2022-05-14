<!--site base para cores: https://materializecss.com/-->
<?php 
	if (!isset($_SESSION['carrinho'])) {
		die("Você não tem lanches no carrinho");
	}

?>
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
			<h2>Seu carrinho <i class="fa fa-car"></i></h2>	
			<a href="<?= INCLUDE_PATH?>home">Voltar home</a>
			<div class="clear"></div>
		</div><!--container-->
	</section>

<div class="container">
	<table width="100%">
		<tr>
			<td>#</td>
			<td>Preço</td>
		</tr>
		<?php 
			$carrinhoItems = deliveryModel::getItemsCart();

			foreach ($carrinhoItems as $key => $value) {
				$item = deliveryModel::getItem($value);
				
			
		?>
			<tr>
				<td>
					<img src="<?php echo INCLUDE_PATH.'images/'.$item[0]; ?>">
				</td>
				<td>
					<p>R$ <?php echo $item[1]; ?></p>
				</td>

			</tr>

		<?php
			}
		?>
	</table>
	<br/>

	<p>O total do seu pedido foi: R$<?php echo number_format(deliveryModel::getTotalPedido(),2,',',' '); ?></p>
	<br/>
	<br/>

	<form method="post">
		<p>Escolha seu método de pagamento:</p>
		<select name="opcao_pagamento">
			<option value="cartao_credito">Cartão de Crédito</option>
			<option value="cartao_debito">Cartão de Débito</option>
			<option value="dinheiro">Dinheiro</option>
		</select>

		<div style="display:none;"class="troco">
		<p>Troco para quanto?</p>
		<input type="text" name="troco">
		</div>
		<input type="submit" name="acao" value="Fechar Pedido!">

	</form>
</div>
	<br/>
	<br/>

	<?php 
		if (isset($_POST['acao'])) {
			if (!isset($_SESSION['carrinho'])) {
				die("Você não tem items no carrinho!");
			}

			$metodoPagamento = $_POST['opcao_pagamento'];
			$_SESSION['tipo_pagamento'] = $metodoPagamento;
			$_SESSION['total'] = deliveryModel::getTotalPedido();
			if ($metodoPagamento == 'dinheiro') {
				if ($_POST['troco'] != '') {
					$valorTroco = $_POST['troco'] - deliveryModel::getTotalPedido();

					if ($valorTroco >= 0) {
						$_SESSION['valor_troco'] = $valorTroco;
					}else{
						die('Você não especificou um valor correto para o troco');
					}

					
				
				}else{
					die('Você escolheu dinheiro como pagamento, portanto precisa especificar o troco!');
				}
			}

			echo '<script>alert("Seu pedido foi efetuado com sucesso")</script>';
			echo '<script>location.href="'.INCLUDE_PATH.'historico"</script>';
		}


	?>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$('select').change(function(){
			if ($(this).val() == 'dinheiro') {
				$('.troco').show();
			}else{
				$('.troco').hide();
			}
		})
	</script>
	
</body>
</html>