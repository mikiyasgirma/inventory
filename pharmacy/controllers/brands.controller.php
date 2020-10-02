<?php

 class ControllerBrands{

 	/*=============================================
	CREATE Brand
	=============================================*/
	
	static public function ctrCreateBrand(){

		if(isset($_POST['newBrnad'])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newBrand"])){

				$table = 'brands';

				$data = $_POST['newBrand'];

				$answer = BrandsModel::mdlAddBrands($table, $data);
				// var_dump($answer);

				if($answer == 'ok'){

					echo '<script>
						
						swal({
							type: "success",
							title: "Brand has been successfully saved ",
							showConfirmButton: true,
							confirmButtonText: "Close"

							}).then(function(result){
								if (result.value) {

									window.location = "brands";

								}
							});
						
					</script>';
				}
				

			}else{

				echo '<script>
						
						swal({
							type: "error",
							title: "No especial characters or blank fields",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result.value) {
									window.location = "brands";
								}
							});
						
				</script>';
				
			}
		}
	}

	/*=============================================
	SHOW Brands
	=============================================*/

	static public function ctrShowBrands($item, $value){

		$table = "brands";

		$answer = BrandsModel::mdlShowBrands($table, $item, $value);

		return $answer;
	}

	/*=============================================
	EDIT Brand
	=============================================*/

	static public function ctrEditBrand(){

		if(isset($_POST["editBrand"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCategory"])){

				$table = "brands";

				$data = array("Brand"=>$_POST["editBrand"],
							   "id"=>$_POST["idBrand"]);

				$answer = CategoriesModel::mdlEditCategory($table, $data);
				// var_dump($answer);

				if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "Brand has been successfully saved ",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "brands";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "No especial characters or blank fields",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "brands";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	DELETE Brands
	=============================================*/

	static public function ctrDeleteBrand(){

		if(isset($_GET["Brand_id"])){

			$table ="brands";
			$data = $_GET["idBrand"];

			$answer = BrandsModel::mdlDeleteBrand($table, $data);
			// var_dump($answer);

			if($answer == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "The brand has been successfully deleted",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "brands";

									}
								})

					</script>';
			}
		
		}
		
	}

}