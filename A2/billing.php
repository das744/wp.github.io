<?php
session_start();
include ('loginlogout.php'); 
?>

<?php include ('toppage.php');?>
<title>Shopping Cart</title>

<?php include ('middlepage.php');?>
<script language="javascript">
	function validate(){
		var f=document.form1;
		if(f.name.value==''){
			alert('Your name is required');
			f.name.focus();
			return false;
		}
		f.command.value='update';
		f.submit();
	}
</script>

<?php

if(isset($_SESSION['form']))
	{
		$file = fopen("order.txt","w");
		
		$output = '';
		$output .= $_SESSION['form']['firstname'] . "\n";
		$output .= $_SESSION['form']['lastname'] . "\n";
		$output .= $_SESSION['form']['address'] . "\n";
		$output .= $_SESSION['form']['phone'] . "\n";
		
		foreach($_SESSION['cart'] as $pid => $array)
		{
			$output .= "Product ID: $pid, Quantity: {$array['quantity']} \n";
		}
		
		fwrite($file,  $output);
		fclose($file);
	}

?>


<div id="whiteboxC">
<form name="form1" method="post">
    <input type="hidden" name="command" />
	<div align="center">
        <table border="0" cellpadding="2px">
		<h3 align="center">Order Info</h3>
        	 <tr><td>Your Name:</td><td><?php echo $_SESSION['form']['firstname']; ?> <?php echo $_SESSION['form']['lastname']; ?></td></tr>
			<tr><td>Address:</td><td><?php echo $_SESSION['form']['address']; ?></td></tr>
			<tr><td>Phone:</td><td><?php echo $_SESSION['form']['phone']; ?></td></tr>
        </table>
		<table border="0" cellpadding="2px" padding="6px" align="center"color= "white">
				<tr>
					<td>Product Name</td>
					<td>Quantity</td>
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
									<td><?php echo $subtotal = $productDetails['quantity']*$productDetails['price'];?></td>
									<?php echo $grandTotal += $subtotal;?>
								</tr>
									
				<?php
						}
				?>
				
			</table>
				<div style= "color:red; margin-right: 80px;"><h3>Grand Total:$ <?php echo $grandTotal?></h3></div>
		</div>
		</form>
		</div>


<?php include ('endpage.php');?>

<pre>
<?php print_r($_SESSION); ?>
</pre>
