<?php
session_start();
require('connect.php');
include('user_header.php');
if (isset($_POST['payment_btn'])){ 

   $name = $_POST['Name'];
   $email = $_POST['Email'];
   $address = $_POST['Address'];
   $city = $_POST['City'];
   $state = $_POST['State'];
   $zip = $_POST['Zip'];
   $name_on_card = $_POST['Name_On_Card'];
   $credit_card_number = $_POST['Credit_Card_Number'];
   $exp_year = $_POST['Exp_Year'];
   $cvv = $_POST['CVV'];
  
   
   $sql = "INSERT INTO payment (Name, Email, Address, City, State, Zip, Name_On_Card, Credit_Card_Number, Exp_Year, CVV) 
   VALUES ('$name','$email','$address','$city','$state','$zip','$name_on_card','$credit_card_number',
   '$exp_year','$cvv')";
  
   $conn->query($sql);
   header("Refresh:0; url = show_resume.php"); 
 }

?>

<?php
require('connect.php');
$result = $conn->query 
        
        ("SELECT * FROM discount ") 
        or die($conn->error);
?>
<?php while ($discount = $result->fetch_assoc()): ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  body {
  margin: 0px;
  background-color: 800000;
}

.row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap; 
  flex-wrap: wrap;
  margin: 0 -16px;

}

.col-25 {
  -ms-flex: 25%; 
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; 
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; 
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 50%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 25%;
  border-radius: 3px;
  margin-left: 300px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
footer{background-color: gray;
                 padding: 10px;
                 width: 100%;
                 text-align: center;}

@media (max-width: 500px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
.price{text-align: right;background-color: rgba(200,200,150,0.5);margin: 0; padding: 10px;}
h2{margin:0px;color: green;}
hr{color: red;}
</style>
</head>
<body>
  <div class="price">
    <h2> Total Bill</h2>
    <h2>Price: $<?= $discount['Price'] ?></h2>
    <h2>Discount:$<?=$discount['Discount']/100*$discount['Price'] ?></h2><hr/>
    <h2>Total: $<?= $discount['Price']-$discount['Discount']/100*$discount['Price'] ?></h2>

  </div>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="payment.php" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="Name"><i class="fa fa-user"></i>  Name</label>
            <input type="text" id="fname" name="Name" placeholder="abu sam">
            <label for="Email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="Email" placeholder="sam@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="Address" placeholder="kota Samarahan">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="City" placeholder="Kuching">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="State" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="Zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="Name_On_Card" placeholder="abu sam">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="Credit_Card_Number" placeholder="1111-2222-3333-4444">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="date" id="expyear" name="Exp_Year" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="CVV" placeholder="352">
              </div>
            </div>
          </div>
        </div>
        <input type="submit" name="payment_btn" value="Confirm">
      </form>
    </div>
  </div>
  <div class="col-25">
    
  </div>
</div>
<footer>Copyright&copy Biography,2018</footer>
</body>
</html>

<?php endwhile; ?>
