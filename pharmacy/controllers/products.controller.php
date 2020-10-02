<?php

class controllerProducts{

	/*=============================================
	SHOW PRODUCTS
	=============================================*/
	
	static public function ctrShowProducts($item, $value, $order){

		$table = "products";

		$answer = ProductsModel::mdlShowProducts($table, $item, $value, $order);

		return $answer;

	}

	/*=============================================
	CREATE PRODUCTS
	=============================================*/

	static public function ctrCreateProducts(){

		if(isset($_POST["newCategory"])){

			if(preg_match('/^[0-9]+$/', $_POST["newStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["newBuyingPrice"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["newSellingPrice"])){

		   		

				$table = "products";

				$data = array("idCategory" => $_POST["newCategory"],
							   "code" => $_POST["newCode"],
							   "description" => $_POST["newDescription"],
							   "generic_name" => $_POST["newGeneric_name"],
							   "expire_date" => $_POST["newExpire_date"],
							   "display_box" => $_POST["newDisplay_box"],
							   "stock" => $_POST["newStock"],
							   "buyingPrice" => $_POST["newBuyingPrice"],
							   "sellingPrice" => $_POST["newSellingPrice"],
							    "unit" => $_POST["newUnit"],
							   );

				$answer = ProductsModel::mdlAddProduct($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "the product added successfuly",
							  showConfirmButton: true,
							  confirmButtonText: "Close"
							  }).then(function(result){
										if (result.value) {

										window.location = "products";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡The Product cannot be empty or have special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}

		}

	}

	/*=============================================
	EDIT PRODUCT
	=============================================*/

	static public function ctrEditProduct(){

		if(isset($_POST["editDescription"])){

			if(preg_match('/^[0-9]+$/', $_POST["editStock"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editBuyingPrice"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editSellingPrice"])){

		   		

				$table = "products";

				$data = array("idCategory" => $_POST["editCategory"],
							   "code" => $_POST["editCode"],
							   "description" => $_POST["editDescription"],
							   "generic_name" => $_POST["editGeneric_name"],
							   "expire_date" => $_POST["editExpire_date"],
							   "display_box" => $_POST["editDisplay_box"],
							   "stock" => $_POST["editStock"],
							   "buyingPrice" => $_POST["editBuyingPrice"],
							   "sellingPrice" => $_POST["editSellingPrice"],
							    "unit" => $_POST["editUnit"],
							   );

				$answer = ProductsModel::mdlEditProduct($table, $data);

				if($answer == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "The product has been edited",
							  showConfirmButton: true,
							  confirmButtonText: "Close"
							  }).then(function(result){
										if (result.value) {

										window.location = "products";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡The Product cannot be empty or have special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
			}

		}

	}

	/*=============================================
	DELETE PRODUCT
	=============================================*/
	static public function ctrDeleteProduct(){

		if(isset($_GET["idProduct"])){

			$table ="products";
			$datum = $_GET["idProduct"];

			

			$answer = ProductsModel::mdlDeleteProduct($table, $datum);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The Product has been successfully deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "products";

								}
							})

				</script>';

			}		
		
		}

	}
	/*=============================================
	SHOW ADDING OF THE SALES
	=============================================*/

	static public function ctrShowAddingOfTheSales(){

		$table = "products";

		$answer = ProductsModel::mdlShowAddingOfTheSales($table);

		return $answer;

	}

}