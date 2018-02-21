<?php 
	session_start(); 
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
	print_r($_SESSION['cart']);	
	
	
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<title>Shopping Cart</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="stylesheet.css" type="text/css"/>

<script language="javascript">

	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
	
	

</script>
</head>

<body>
<div id="outline">
<div id= "background">

	<div id="masthead">
	  <h1><img src="logoimage.jpg" height="60px" width="60px" alt="logoimage"/>Aussie Bakery House</h1>
	</div>

<div id ="navigation">
<div id="navigationbar">
<a href="index.php">Home</a>  |
<a href="productspage.php">Products</a>   |
<a href="cart.php">Cart</a>   |
<a href="billing.php">Billing Info</a>   |
<a href="privacy.php">Privacy</a>  |
</div>
</div>

	<div id= "shadowbox">
		
		<div style="margin:0px auto; width:600px;" >
			<div style="padding-bottom:10px">
				<h1 align="center; color:white">Your Shopping Cart</h1>
				<table>
				<tr>
				<td>Product Name</td>
				<td>Quantity</td>
				<td>Price</td>
				</tr>
				
				<?php	
						foreach($_SESSION['cart'] as $product=>$productDetails)
						if($productID == $productDetails[0])
								{
									$name = $productDetails[1];
									$price = $productDetails[2];
							
									break;
								}
						
						
							
							?>
							<table>
								<tr>
								<td><?php echo $name; ?></td>
								<td><?php echo $productDetails['quantity'] = 1; ?></td>
								<td><?php echo $productDetails['quantity']*$price; ?></td>
								</tr>
							<?php
						}
				?>
				</table>
	
				<input type="button" value="Continue Shopping" onclick="window.location='productspage.php'" />
			</div>
		</div>
	</div>
	<div id='footer'>
	  <p>Copyright &copy; 2014 Aussie Bakery House |
	    
	    <a href="https://coreteaching01.csit.rmit.edu.au/~s3414689/WP/A1.html">Website Design By Ajanta Das</a> |
	    	  
	    <a href="http://validator.w3.org/check?uri=referer">
		  <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a> |
	    <a href="http://jigsaw.w3.org/css-validator/check/referer">
		  <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!" /></a>		  
	  </p>	 
	</div>

</div>
</body>
</html>
