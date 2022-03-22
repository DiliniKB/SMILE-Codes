
<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfundpayment.css">  
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">             
    <script src="<?=ASSETS?>js/fundpayment.js"></script>  
</head>

<body> 

<div class="container" method="post">singlefund
<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1219964">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost//SMILE/SMILE-git/SMILE-Codes/public/singlefund/donate/Medical/8">
    <input type="hidden" name="cancel_url" value="http://localhost//SMILE/SMILE-git/SMILE-Codes/public/singlefund/donate/Medical/8">
    <input type="hidden" name="notify_url" value="http://sample.com/notify">  
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="ItemNo12345">
    <input type="text" name="items" value="Door bell wireless"><br>
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="1000">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="Saman">
    <input type="text" name="last_name" value="Perera"><br>
    <input type="text" name="email" value="samanp@gmail.com">
    <input type="text" name="phone" value="0771234567"><br>
    <input type="text" name="address" value="No.1, Galle Road">
    <input type="text" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" value="Buy Now">   
</form> 

    <div class="calculate2">
        <div class="r1">
            YOUR DONATION
        </div>
        <div class="r2">
            <div>
                Your Donation
            </div>
            <div id="amount-preview">
                <?=$data['amount']?>
            </div>
        </div>
        <div class="r3">
            <div>
                Tip
            </div>
            <div id="tip-preview2">
               <?=$data['tip']?>
            </div>
        </div>
        <div class="r4">
            <div>
                Total Due
            </div>
            <div id="total">
                <?=$data['amount'] + $data['tip']?>
            </div>
        </div>
        <button id="continue" onclick="confirmation()" class="continue">continue</button>
    </div>

</div>
</body>
     