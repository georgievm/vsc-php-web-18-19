<?php 
$title = 'Create';
include "includes/header.php";

$manufacturers_query = "SELECT * FROM manufacturer";
$manufacturers_result = mysqli_query($conn, $manufacturers_query);

$lcd_query = "SELECT * FROM length_class_description";
$lcd_result = mysqli_query($conn, $lcd_query);
?>
<div class="container">
	<div class="row justify-content-md-center">
		<h2 class="heading">Add new product / CREATE</h2>
	</div>
	<div class="row justify-content-md-center">			
		<div class="col-sm-10">			
			<form method="post" action="">
				<div class="form-group">
					<label for="manufacturer">Manufacturer</label>
					<select class="form-control" id="manufacturer" name="manufacturer_id">
						<?php if(mysqli_num_rows($manufacturers_result) > 0){ ?>
							
							<?php while($row = mysqli_fetch_assoc($manufacturers_result)){ ?>

								<option value="<?= $row['manufacturer_id'] ?>"><?= $row['name'] ?></option>

							<?php } ?>

						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="product_name">Product name</label>
					<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product name here ...">
				</div>
				<div class="form-group">
					<label for="product_length">Product length</label>
					<input type="text" class="form-control" id="product_length" name="product_length" placeholder="Product length here ...">
				</div>
				<div class="form-group">
					<label for="unit">Unit</label>
					<select class="form-control" id="unit" name="length_class_id">
						<?php if(mysqli_num_rows($lcd_result) > 0){ ?>
							
							<?php while($row = mysqli_fetch_assoc($lcd_result)){ ?>

								<option value="<?= $row['length_class_id'] ?>"><?= $row['unit'] ?></option>

							<?php } ?>

						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="submit" class="btn btn-success">SAVE product</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['submit'])){
		$manufacturer_id 		= $_POST['manufacturer_id'];
		$product_name 			= $_POST['product_name'];
		$product_length 		= $_POST['product_length'];
		$length_class_id 		= $_POST['length_class_id'];

		$product_create_query = "INSERT INTO product (manufacturer_id, length, length_class_id)";

		$product_create_query .= " VALUES (" . (int)$manufacturer_id . ", " . (float)$product_length . ", " . (int)$length_class_id . ")";
		// var_dump($product_create_query);
		$result = mysqli_query($conn, $product_create_query);

		$last_product_id = mysqli_insert_id($conn);
		
		$product_description_create_query = "INSERT INTO product_description (product_id, name)";
		$product_description_create_query .= " VALUES (" . $last_product_id . ", '" . $product_name . "')";
		// var_dump($product_description_create_query);
		$result = mysqli_query($conn, $product_description_create_query);
		
		if($result){
			header('Location: read.php');
		} else {
			echo mysqli_error($conn);
		}
	}
include 'includes/footer.php';
?>