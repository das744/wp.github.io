
<?php 

session_start();  

echo $_SESSION['email'];

?>
<?php include ('toppage.php');?>

<title>Aussie Bakery House</title>
<script language="javascript">
	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>
<?php include ('middlepage.php');?>

</br><h1 style="text-align:center; color:white;"> Product Page</h1></br>
	
<table border="1" cellpadding="2px" padding="6px" align="center">


     <tr style= "vertical-align:center;">
     <td style= "color: white; font:40px;"><b> Name </b></td>
	 <td style= "color: white; font:40px;"><b> Price </b></td>
	 <td style= "color: white; font:40px;"><b> Image </b></td>
	 <td style= "color: white; font:40px;"><b> Description </b> </td>
	 
	 
  </tr>
  <form name="form1">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>

<?php
$file = fopen("product1.txt", "r");

while (!feof($file) ) {
$line_of_text = fgets($file);
$cells = explode(',', $line_of_text);

?>
<tr >
  <td style= "color: white; text-font:40px;"><?php echo $cells['1'];?> </td>
  <td style= "color: white; text-font:40px;"><?php echo $cells['2']; ?> </td>
  <td><a href="product.php?pid=<?php echo $cells['0']; ?>"><?php echo $cells['3']; ?></a></td>
  <td style= "color: white; text-font:40px;"><?php echo $cells['4']; ?></td>
  
  
</tr>
<?php

}
fclose($file);

?>


</table>
</div>

<?php include ('endpage.php');?>
  
  