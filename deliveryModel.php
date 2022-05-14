<?php  
	
	class deliveryModel
	{




		public static $items = array(array('lanche1.jpg','45.00','bacon'),array('lanche2.jpg','46.50','eggs'),array('lanche3.jpg','45.00','tudo'));

		public static function listarItems(){
			return self::$items;
		}

		public static function addCart($idProduto){
			if (!isset($_SESSION['carrinho'])) {
				$_SESSION['carrinho'] = array();
			}
			$_SESSION['carrinho'][] = $idProduto;


		}

		public static function getItemsCart(){
			return $_SESSION['carrinho'];
		}

		public static function getItem($id){
			return self::$items[$id];
		}

		public static function getTotalPedido(){
			$valor = 0;
			foreach ($_SESSION['carrinho'] as $key => $value) {
				$itemPreco = self::getItem($value)[1];
				$valor+=$itemPreco;
			}
			return $valor;
		}
	}
?>