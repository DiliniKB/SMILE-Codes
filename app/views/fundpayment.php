
<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfundpayment.css">  
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">  
 
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="<?=ASSETS?>js/fundpayment.js"></script>  


</head>

<body> 
    <form id="box1" class="container" method="POST">
        <img src="<?=ASSETS?>Images/mainPages/<?=$data['table']?>/<?=$data['fund']->picture?>" class="photo"> 
        <div class="support">
            You are supporting for the fund <?=$data['fund']->title?>
        </div>
        <div class="amount">
            <div class="text">
                Donation Amount
            </div>
            <input type="number" min="100" max="10000000" class="box" id="amount-input" name="donatedamount" onkeyup="amount();calculate();"></input>
        </div>
        <div class="anon" >
            <?php if(isset($_SESSION['user_id'])){?>
                <input type="checkbox" id="anonymous" name="Anonymous" onchange="checkAnonymous()"> Anonymous
            <?php } else{ ?>
                <input type="hidden" id="anonymous" name="Anonymous" value="1" onchange="checkAnonymous()">
            <?php } ?>
            <div class="user-tip">
                <div> Your donation may mention publicly in some places, to avoid mentioning your name in your donation you can make it anonymous here.</div>
            </div>
        </div>
        <div class="tipbox">
            <div class="text2">
                Tip for Smile
            </div>
            <!-- <div class="slidecontainer">
                <input type="range" min="1" max="100" class="slider" id="tip" oninput="tip(this.value);">
                <p id="tip-preview"></p>
            </div> -->
            <div class="range-slider">
                <input id="tipamount" name="tipamount" class="range-slider__range" type="range" value="0" min="0" max="100" step="10" oninput="tip(this.value);calculate();">
                <span id="tip-preview" class="range-slider__value"></span>
            </div>
            <div class="text3">
                 *** Our website is totaly free for anyone to use. Your contribution is much important as we have to cover our expenditures to continue our services. 
            </div>
        </div>
    </form>
    <div class="calculate">
        <div class="r1">
            YOUR DONATION
        </div>
        <div class="r2">
            <div>
                Your Donation
            </div>
            <div id="amount-preview">
                
            </div>
        </div>
        <div class="r3">
            <div>
                Tip
            </div>
            <div id="tip-preview2">
               
            
            </div>
        </div>
        <div class="r4">
            <div>
                Total Due
            </div>
            <div id="total">
            </div>
        </div>
        <button id="continue" onclick="confirmation()" class="continue">continue with card payment</button>
        <?php if ( isset($_SESSION['user_id']) and $_SESSION['user_id']>0){?>
            <button class="continue" onclick="balance_box()">continue with account balance</button>
        <?php } ?>
    </div>

    <div id="balancebox" class="balancebox">
        Your account balance is <?=$data['balance']?></br>
        <button class="continue" onclick="checkbalance(<?=$data['balance']?>)">Donate</button>
        <button class="continue" onclick="balance_box()">Cancel</button>
    </div>


    <form id="donationAmount" method="post">
        <input type="hidden" name="donation">
        <input type="hidden" name="tip">
        <input type="hidden" name="anonymous">
        <input type="hidden" name="balance">
    </form>
    
</body>
     