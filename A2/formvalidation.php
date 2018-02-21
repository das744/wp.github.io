<?php
session_start(); 
include ('loginlogout.php');

?>
<?php include ('toppage.php');?>
<title>Shopping Cart</title>
<script type="text/javascript">
function checkForm()
{
	validForm = false;
	firstname = document.getElementById('firstname').value;
	lastname = document.getElementById('lastname').value;
	address = document.getElementById('address').value;
	email = document.getElementById('email').value;
	phone = document.getElementById('phone').value;
	cardnumber = document.getElementById('cardnumber').value;
	
	if(firstname == "")
		return validForm;
	if(lastname == "")
		return validForm;
	if(address == "")
		return validForm;
	if(email == "")
		return validForm;
	if(phone == "")
		return validForm;
	if(cardnumber == "")
		return validForm;
	return true;

}
</script>
<?php include ('middlepage.php');?>
<div id ="scroll">

<?php  
			// define variables and set to empty values
					
			if(isset($_POST['submit']))
			{
				//checking first name
				  if (empty($_POST["firstname"])){
							$firstnameErr = "First Name is required";
						} else {
							$firstname = ($_POST["firstname"]);
							// check if first name only contains letters and whitespace
					  if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
							$firstnameErr = "Only letters and white space allowed"; 
						}
				  }
				  //checking last name
				  if (empty($_POST["lastname"])){
							$lastnameErr = "last Name is required";
						} else {
							$lastname = ($_POST["lastname"]);
							// check if last name only contains letters and whitespace
					  if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
							$lastnameErr = "Only letters and white space are allowed"; 
						}
				  }
				  //checking address
				  if (empty($_POST["address"])){
							$lastnameErr = "Address is required";
						} else {
							$address = ($_POST["address"]);
							// check if last name only contains letters and whitespace
					  if (!preg_match("/^[0-9a-zA-Z_]*$/",$address)) {
							$lastnameErr = "Only number and letters are allowed"; 
						}
				  }
				  
				  
				  //checking email
				  if (empty($_POST["email"])) {
						 $emailErr = "Email is required";
						} else {
						$email = ($_POST["email"]);
						// check if e-mail address syntax is valid
						if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
						$emailErr = "Invalid email format"; 
						}
					}
					
					//checking phone number
					if(empty($_POST["phone"])){
						$phoneErr = "Phone is required";
						} else {
						 $phone = ($_POST["phone"]);
						 //checking id phone no is valid
						 if(!preg_match("/^[0-9]{1,}$/", $phone)){
							$phoneErr = "Invalid phone number";
						 }
					}
					
					// checking credit card number
					if(empty($_POST["cardnumber"])){
						$creditnoErr = "Credit card number is required";
						} else {
						 $cardnumber = ($_POST["cardnumber"]) ;
						 if (!preg_match ("/^[0-9_]{15-18}*$/", $cardnumber)){
						 $cardErr = "Invalid Credit Card number";
							}
					}
					
					//if($_POST['year'] <= date('Y'))
					//{
						//if($_POST['month'] < date('m'))
						//{
							//if(empty($_POST["month"])){
							//$creditnoErr = "Input Valid Month ";
							//} 
					
						//}
					//
					$_SESSION['form'] = $_POST;
					header("Location:billing.php");
				}
?>
	 
	 
	<h1 style="text-align:center; color:white;"> CheckOut Page</h1>			
    <div id='d3'>
        <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>" onsubmit="return checkForm()">					
			<div id='label2'>
			  <div class="div0"></div>
			  <div class="div1"><span class="label">FIRST NAME: </span></div>
			  <div class="div2"><span class="label">LAST NAME: </span></div>
			  <div class="div3"><span class="label">ADDRESS: </span></div>
			  <div class="div4"><span class="label">EMAIL: </span></div>
			  <div class="div5"><span class="label">PHONE: </span></div>
			  <div class="div6"><span class="label">DELIVERT METHOD: </span></div>
			  <div class="div7"><span class="label">CREDIT CARD NUMBER: </span></div>
			  <div class="div8"><span class="label">EXPIRY DATE: </span><br /></DIV>
			  <div class="div8A"><span class="label">DISCLOSURE: </span><br />
			    "Please sign me up for the newsletter."
              </div>
              <div class="div9"></div>  					  
			</div>
			<div id='box2'>
			  <div class="div0"></div>
			  <div class="div1"><input type="text" name="firstname" value ="<?php if (isset($firstname)) {echo $firstname;}?>" id='firstname' /> <span class = "error"> <?php if(isset($firstnameErr)){echo $firstnameErr;} ?> </span></div>
			  
			  <div class="div2"><input type="text" name="lastname" value="<?php if (isset($lastname)) {echo $lastname;}?>" id='lastname' /> <span class = "error"> <?php  if(isset($firstnameErr)){echo $firstnameErr;}?> </span></div>
			  
			  <div class="div3"><input type="text" name="address" value="<?php if (isset($address)) {echo $address;}?>" size="50" maxlength="70" id='address' /> <span class = "error"> <?php  if(isset( $addressErr)){echo $addressErr;} ?> </span></div>
			  
			  <div class="div4"><input type="text" name="email" value="<?php if (isset($email)) {echo $email;}?>" id='email' /> <span class = "error"> <?php  if(isset($emailErr)){echo $emailErr;}?> </span></div>
			  <div class="div5"><input type="text" name="phone" value="<?php if (isset($phone)) {echo $phone;};?>" id='phone' /> <span class = "error"> <?php if(isset( $phoneErr)){echo $phoneErr;}?> </span></div>
			  <div class="div6">
				  <table>
					  <tr>
						  <td>  <input type="radio" name="delivery"<?php if(isset($delivery)&&  $delivery =="regular delivery")echo "checked";?> value="regular post" /> Regular Post </td> 
						  <td>  <input type="radio" name="delivery" <?php if(isset($delivery)&&  $delivery =="courier")echo "checked";?>value="courier" />Courier </td> 
						  <td>	<input type="radio" name="delivery" <?php if(isset($delivery)&&  $delivery =="express courier")echo "checked";?>value="express courier" />Express Courier</td>
					  </tr>
				  </table>  
			  </div>
			  <div class="div7"><input type="text" name="cardnumber" value="" size="18" maxlength="18" id='cardnumber'/></div>
			  <div class="div8">
			  <table>
				  <tr>
					  <td>
						  <select name ="month">
						  <option value = "01"> January</option>
						  <option value = "02"> February</option>
						  <option value = "o3"> March</option>
						  <option value = "04"> April</option>
						  <option value = "05"> May</option>
						  <option value = "06"> June</option>
						  <option value = "07"> July</option>
						  <option value = "08"> August</option>
						  <option value = "09"> September</option>
						  <option value = "10"> October</option>
						  <option value = "11"> November</option>
						  <option value = "12"> December</option>
					  </td>
					  <td> 
						  <select name ="year">
						  <option value = "2014">2014</option>
						  <option value = "2015">2015</option>
						  <option value = "2016">2016</option>
						  <option value = "2017">2017</option>
						  <option value = "2018">2018</option>
						  <option value = "2019">2019</option>
					  </td>
				  </tr>
			  </table>
			  </br><div class="div8A"><input type="checkbox" name="disclosure" value="check" id='disclosure' /></div>
			  <div class="div9"><input type="submit" name="submit" value="SUBMIT" /></div>					  
            </div>
			</div>
	    </form>
		</div>


<?php include ('endpage.php');?>	  
	
