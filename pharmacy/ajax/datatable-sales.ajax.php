<?php

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/customers.controller.php";
require_once "../models/customers.model.php";


class productsTableSales{

	/*=============================================
 	 SHOW PRODUCTS TABLE
  	=============================================*/ 
	public function showProductsTableSales(){

		$item = null;
		$value = null;
		$order = "id";

		$products = ControllerProducts::ctrShowProducts($item, $value, $order);

		if(count($products) == 0){

			$jsonData = '{"data":[]}';

			echo $jsonData;

			return;
		}

		$jsonData = '{
			"data":[';

				for($i=0; $i < count($products); $i++){


					/*=============================================
					Stock
					=============================================*/
				  	
				  	if($products[$i]["stock"] <= 10){

		  				$stock = "<button class='btn btn-danger'>".$products[$i]["stock"]."</button>";

		  			}else if($products[$i]["stock"] > 11 && $products[$i]["stock"] <= 15){

		  				$stock = "<button class='btn btn-warning'>".$products[$i]["stock"]."</button>";

		  			}else{

		  				$stock = "<button class='btn btn-success'>".$products[$i]["stock"]."</button>";

		  			}

					//expire date warninig
		  			$exp_date = $products[$i]["expire_date"];
		  			$today_date = date('Y/m/d');

		  			$exp = strtotime($exp_date);
		  			$td = strtotime($today_date);

		  			if($td >= $exp){

		  				$exp = "<button class='btn btn-danger'>".$products[$i]["expire_date"]."</button>";
		  			}
		  			elseif($td<$exp){
		  				$dif = $td-$exp;
		  				$x = abs(floor($dif/(60*60*24)));
		  				if($x >= 30){
		  					$exp = "<button class='btn btn-success'>".$products[$i]["expire_date"]."</button>";	
		  				}
		  				elseif($x<30){
		  					$exp = "<button class='btn btn-warning'>".$products[$i]["expire_date"]."</button>";
		  				}
		  			}

		  			/*=============================================
		 	 		ACTION BUTTONS
		  			=============================================*/ 

		  			$buttons =  "<div class='btn-group'><button class='btn btn-primary addProductSale recoverButton' idProduct='".$products[$i]["id"]."'>Add</button></div>";



					$jsonData .='[
						"'.($i+1).'",
						"'.$products[$i]["code"].'",
						"'.$exp.'",
						"'.$products[$i]["description"].'",
                                                "'.$products[$i]["generic_name"].'",
						"'.$products[$i]["unit"].'",
						"'.$stock.'",
						"'.$buttons.'"
					],';
				}

				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 

			}';

		echo $jsonData;
	}
}


/*=============================================
ACTIVATE PRODUCTS TABLE
=============================================*/ 
$activateProductsSales = new productsTableSales();
$activateProductsSales -> showProductsTableSales();
