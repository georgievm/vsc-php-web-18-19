<?php
$title = "Read";
include 'includes/header.php';

$read_query = "SELECT p.product_id, m.name AS manufacturer, pd.name AS product_name, cd.name AS category, p.quantity, p.price FROM ";
$read_query .= "product p JOIN product_description pd ON p.product_id=pd.product_id ";
$read_query .= "JOIN manufacturer m ON p.manufacturer_id=m.manufacturer_id";
$read_query .= " JOIN product_to_category ptc ON p.product_id = ptc.product_id";
$read_query .= " JOIN category_description cd ON cd.category_id = ptc.category_id";

if (isset($_GET['submit_sort'])) {
	if ($_GET['sort'] == 'name_asc') {
		$column = "pd.name";
		$type = "ASC";
	} elseif ($_GET['sort'] == 'name_desc') {
		$column = "pd.name";
		$type = "DESC";
	} elseif ($_GET['sort'] == 'price_asc') {
		$column = "p.price";
		$type = "ASC";
	} elseif ($_GET['sort'] == 'price_desc') {
		$column = "p.price";
		$type = "DESC";
	} elseif ($_GET['sort'] == 'quantity_asc') {
		$column = "p.quantity";
		$type = "ASC";
	} elseif ($_GET['sort'] == 'quantity_desc') {
		$column = "p.quantity";
		$type = "DESC";
	}

	$limit = $_GET['limit'];

	$read_query .= " ORDER BY ({$column}) {$type} LIMIT {$limit}";
}

if (isset($_GET['submit_manufacturer'])) {
	$manufacturer_id = $_GET['manufacturer_id'];
	$read_query .= " WHERE m.manufacturer_id = {$manufacturer_id}";
}

if (isset($_GET['submit_category'])) {
	$category_id = $_GET['category_id'];
	$read_query .= " WHERE cd.category_id = {$category_id}";
}

if (isset($_GET['clear_filters'])) {
	$read_query = "SELECT p.product_id, m.name AS manufacturer, pd.name AS product_name, cd.name AS category, p.quantity, p.price FROM ";
	$read_query .= "product p JOIN product_description pd ON p.product_id=pd.product_id ";
	$read_query .= "JOIN manufacturer m ON p.manufacturer_id=m.manufacturer_id";
	$read_query .= " JOIN product_to_category ptc ON p.product_id = ptc.product_id";
	$read_query .= " JOIN category_description cd ON cd.category_id = ptc.category_id ORDER BY p.product_id ASC";
}

$result = mysqli_query($conn, $read_query);
?>
<form action="" method="get">
	<input class="btn btn-link" type="submit" name="clear_filters" value="Clear filters">
</form>
<div class="filter_panel">
	<div class="filter_heading">Filters</div>
	<form action="" method="get">
		<div class="filter_div_row">
			<span class="filter_label">Sort:</span>
			<select style="margin-bottom: 0;" class="form-control-sm" name="sort">
				<option value="name_asc">by name A-Z</option>
				<option value="name_desc">by name Z-A</option>
				<option value="price_asc">by price 0-9</option>
				<option value="price_desc">by price 9-0</option>
				<option value="quantity_asc">by quantity 0-9</option>
				<option value="quantity_desc">by quantity 9-0</option>
			</select>
		</div>
		<hr>
		<div style="margin-top: 4%;" class="filter_div_row">
			<span class="filter_label">Show results:</span>
			<select class="form-control-sm" name="limit">
				<option value="2">2</option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option selected="true" value="1000000">All</option>
			</select>
		</div>
		<input class="btn btn-primary btn-sm" type="submit" name="submit_sort" value="Sort">
		<hr>
		<div class="filter_div_row">
			<span class="filter_label">Manufacturer:</span>
			<?php
			$read_manufacturer = "SELECT manufacturer_id, name FROM manufacturer WHERE 1";
			$manufacturer_result = mysqli_query($conn, $read_manufacturer);
			?>
			<select class="form-control-sm" name="manufacturer_id">
				<?php
				while ($row = mysqli_fetch_assoc($manufacturer_result)) {
					?>
					<option value="<?=$row['manufacturer_id']?>"><?=$row['name']?></option>
					<?php
				}
				?>
			</select>	
		</div>
		<input class="btn btn-primary btn-sm" type="submit" name="submit_manufacturer" value="Apply">
		<hr>
		<div class="filter_div_row">
			<span class="filter_label">Category:</span>
			<?php
			$read_category = "SELECT category_id, name FROM category_description WHERE 1";
			$category_result = mysqli_query($conn, $read_category);
			?>
			<select class="form-control-sm" name="category_id">
				<?php
				while ($row = mysqli_fetch_assoc($category_result)) {
					?>
					<option value="<?=$row['category_id']?>"><?=$row['name']?></option>
					<?php
				}
				?>
			</select>	
		</div>
		<input class="btn btn-primary btn-sm" type="submit" name="submit_category" value="Apply">
	</form>
</div>

<?php	
	if (mysqli_num_rows($result) > 0) {
		echo '<table style="width: 65%; border: none;" class="table table-bordered">';
	$keys = array_keys(mysqli_fetch_assoc(mysqli_query($conn, $read_query)));

	echo '<thead><tr>';
	for ($i = 0; $i < count($keys); $i++) {
		echo '<th style="padding: 4px; text-align: center;" class="bg-primary">'.$keys[$i].'</th>';
	}
	echo '</tr></thead>';

	echo '<tbody>';
	while ($row = mysqli_fetch_assoc($result)) {
		echo '<tr>';
		foreach ($row as $value) {
			echo '<td style="padding: 6px; text-align: center;">'.$value.'</td>';
		}
		echo '</tr>';
	}
	echo '</tbody>';

	echo '</table>';

	} else {
		echo '<div class="no_result">'.'No results!'.'</div>';
	}
?>
<?php
include 'includes/footer.php';
?>