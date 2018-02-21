<?php 
	session_start(); 
	include ('loginlogout.php');
	
	
	
	if(!isset($_SESSION['cart']))
	{
		$_SESSION['cart'] = array("p1"=>array("quantity"=>0, "price"=>3.90),
							  "p2"=>array("quantity"=>0, "price"=>3.00),
							  "p3"=>array("quantity"=>0, "price"=>3.30));
	}

	
	
	if (isset($_POST['add']))
	{
		
		$_SESSION['cart'][$_POST['pid']]['quantity']++;	
	}
	if (isset($_POST['minus']))
	{
		if($_SESSION['cart'][$_POST['pid']]['quantity'] > 0)
			$_SESSION['cart'][$_POST['pid']]['quantity']--;	
	}


	?>


<?php include ('toppage.php');?>

<title>Shopping Cart</title>
<?php include ('middlepage.php');?>
		<div id= "whiteboxC">
		
				<h1 align="center; color:white">Your Shopping Cart</h1>
				<table border="1" cellpadding="2px" padding="6px" align="center">
				<tr>
				<td>Product Name</td>
				<td>Quantity</td>
				<td>Price:$</td>
				<td>Total:$ </td>
				</tr>
		
				
				
				<?php	
						$grandTotal = 0;
						foreach($_SESSION['cart'] as $product=>$productDetails)		
						{
							$subtotal = 0;
							if($product == "p1")
								$productName = "Mini Pavlova";
							else if($product == "p2")
								$productName = "Jam ball donut";
							else if($product == "p3")
								$productName = "Strawberry donut";
							
							?>
								<tr>
									<td><?php echo $productName; ?></td>
									<td><?php echo $productDetails['quantity']; ?></td>
									<td><?php echo $productDetails['price']; ?></td>
									<td><?php echo $subtotal = $productDetails['quantity']*$productDetails['price'];?></td>
									<?php echo $grandTotal += $subtotal;?>
								</tr>
									
									
									 
							
							<?php
						}
				?>
				</table>

				<div style= "color:red; margin-right: 80px;"><h2>Grand Total:$ <?php echo $grandTotal?></h2></div>
	
				</br><input type="button" value="Continue Shopping" onclick="window.location='productspage.php'" /> 
				</br></br><input type="submit" value="Check Out" onclick="window.location='formvalidation.php'" />
			</div>
		

<?php include ('endpage.php');?>