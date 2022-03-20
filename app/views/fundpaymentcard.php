
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

<div class="container" method="post">
    <form id="box2" method="post">
    
        <input type="hidden" name="merchant_id" value="1219964">    <!-- Replace your Merchant ID -->

        <!-- URL to redirect users when success -->
        <input type="hidden" name="return_url" value="http://localhost//SMILE/SMILE-git/SMILE-Codes/public/singlefund/<?=$data['category']?>/<?=$data['id']?>">
        
        <!-- URL to redirect users when cancelled -->
        <input type="hidden" name="cancel_url" value="http://sample.com/cancel">

        <!-- URL to callback the status of the payment (Needs to be a URL accessible on a public IP/domain) -->
        <input type="hidden" name="notify_url" value="http://sample.com/notify">  
        <p class="topic">Card Details</p>
        <input type="number" placeholder="Card Number" name="card" id="card" class="in">
        <div class="name">
            <input type="text" placeholder="First Name" name="first_name" id="first_name" class="in">
            <input type="text" placeholder="Last Name" name="last_name" id="last_name" class="in">
        </div>
        <input type="text" onfocus="(this.type='date')" placeholder="Expire at" name="exp_date" id="exp_date" class="in">
        <input type="number" placeholder="CVV" name="CVV" id="CVV" class="in">
        <input type="number" hidden></input>
        <button class="card" onclick="Submit1();">Next</button>
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
     