<?php
include 'includes/connect.php';

if(isset($_POST['test_id']))
 {
	$test_id= $_POST['test_id'];
	
	$select_item = "SELECT cost FROM `main_test`  WHERE id='$test_id'";
	$run_item = mysqli_query($connection,$select_item);
	$row=mysqli_fetch_array($run_item);
		
		$sale_price = $row['cost'];

		$data = ["price" => $sale_price];
	
	echo json_encode($data);
}
?>






