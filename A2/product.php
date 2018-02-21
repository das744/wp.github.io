<?php
session_start();
include ('loginlogout.php');

if(isset($_GET['pid']))
{
	$productID = $_GET['pid'];
	
	$products = file("products.txt");

	foreach($products as $product)
	{
		$productDetails = explode(',', $product);
		
		if($productID == $productDetails[0])
		{
			$name = $productDetails[1];
			$price = $productDetails[2];
			$imagePath = $productDetails[3];
			$description = $productDetails[4];
		
			break;
		}
	}
}
?>

<?php include ('toppage.php');?>

<title>Aussie Bakery House</title>


<?php include ('middlepage.php');?>

<div class ='div00'>
<table style= "margin-left: 40px;">
<tr>
	</br><td> <?php echo $imagePath; ?></td>
	<td>
		<div style= "vertical-align:center; color:white;margin-left: 60px;"><h1><?php echo $name; ?></h1></div><br/>
		<div id="whiteboxB"><p><?php echo $description; ?> </div><br/>
		<div style= "vertical-align:center; color:white;margin-left: 80px;"><h2>Price: <?php echo  $price; ?></h2></div><br/>
		
		<table style= "margin-left: 40px;">
			<tr >
				<form action="cart.php" method="post">
					<td>
						<input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>" />
						<input type="submit" name="add" value="Add to Cart" />&nbsp
					</td>
				</form>
			
				<form action="cart.php" method="post">
					<td>
						<input type="hidden" name="pid" value="<?php echo $_GET['pid']; ?>" />
						<input type="submit" name="minus" value="Remove from Cart" />
					</td>
				</form>
			</tr>
				<tr > 
					<form action="formvalidation.php" method="post">
					<td ><input type="submit" name="submit" value="Checkout" /></td>
					</form>
				</tr>
			</table>
			</div>
		</div>
	</td>

</tr>
</table>
</div>

<?php include ('endpage.php');?>