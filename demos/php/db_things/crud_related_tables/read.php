<?php 
$title = 'Read';
include "includes/header.php";
$read_query = "SELECT p.product_id, m.name AS manufacturer_name, pd.name AS product_name, p.length, lcd.unit FROM product p ";
$read_query .= "JOIN product_description pd ON p.product_id = pd.product_id ";
$read_query .= "JOIN length_class_description lcd ON p.length_class_id = lcd.length_class_id ";
$read_query .= "JOIN manufacturer m ON p.manufacturer_id = m.manufacturer_id WHERE 1";

$read_result = mysqli_query($conn, $read_query);
?>
<div class="container">
	<div class="row justify-content-md-center">
		<h2 class="heading">Read</h2>
	</div>
	<div class="row justify-content-md-center">			
		<div class="col-sm-10">
			<?php if(mysqli_num_rows($read_result) > 0){ ?>
				<table class="table table-hover table-dark table-bordered">
					<thead>
						<tr>
							<th>Manufacturer name</th>
							<th>Product name</th>
							<th>Length</th>
							<th>Unit</th>
							<th>***</th>
							<th>***</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = mysqli_fetch_assoc($read_result)){ ?>
							<tr>
								<td><?= $row['manufacturer_name']?></td>
								<td><?= $row['product_name'] ?></td>
								<td><?= $row['length'] ?></td>
								<td><?= $row['unit'] ?></td>
								<td class="text-center">
									<a href="update.php?product=<?= $row['product_id'] ?>" class="btn btn-warning">Update</a>
								</td>
								<td class="text-center">
									<a href="delete.php?product=<?= $row['product_id'] ?>" class="btn btn-danger">DELETE</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php } ?>
			<div class="row justify-content-md-center">
				<a href="create.php" class="btn btn-secondary">Add new product</a>
			</div>
		</div>
	</div>
</div>
<?php 
include 'includes/footer.php';
?>