
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
    <div id="box1" class="container">
        <img src="<?=ASSETS?>Images/mainPages/<?=$data['table']?>/<?=$data['fund']->picture?>" class="photo"> 
        <div class="support">
            You are supporting for the fund <?=$data['fund']->title?>
        </div>
        <div class="amount">

            <div class="text">
                Donation Amount
            </div>
            <input type="number" min="100" max="10000000" class="box" id="amount-input" name="amount" onkeyup="amount();calculate();">
        </div>
        <div class="anon" >
            <input type="checkbox" name="Anonymous" > Anonymous
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
                <input id="tip" class="range-slider__range" type="range" value="0" min="0" max="100" step="10" oninput="tip(this.value);calculate();">
                <span id="tip-preview" class="range-slider__value"></span>
            </div>
            <div class="text3">
                 *** Our website is totaly free for anyone to use. Your contribution is much important as we have to cover our expenditures to continue our services. 
            </div>
        </div>
    </div>
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
        <p id="continue" onclick="confirmation()" class="continue">continue</p>
        <!-- <a id="move" href="<?=ROOT?>singlefund/payment/<?=$data['category']?>/<?=$data['id']?>" ></a> -->
    </div>

    <form id="box2" class="payment" method="post">
        <p class="topic">Card Details</p>
        <input type="number" placeholder="Card Number" name="card" id="card" class="in">
        <div class="name">
            <input type="text" placeholder="First Name" name="first_name" id="first_name" class="in">
            <input type="text" placeholder="Last Name" name="last_name" id="last_name" class="in">
        </div>
        <input type="date" placeholder="Expire at" name="exp_date" id="exp_date" class="in">
        <input type="number" placeholder="CVV" name="CVV" id="CVV" class="in">
        <button class="card" type="submit">Next</button>
    </form>
    
</body>
     