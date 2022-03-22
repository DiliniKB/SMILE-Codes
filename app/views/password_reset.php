<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/styleslog.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    
        
</head>
<body>

        <div class="BlurRectOval" id="form">
            <p class="FormTopic">Reset password</p>
            <form method="post" style="margin: 0;">
                Enter email address of your account <br />
                <input class="input_form" id="email" type="text" placeholder="Email" name="email" required>
                <button id="enter" type="submit" name="reset_submit">Reset</button>
            </form>         
        </div> 
        
    <img src="<?=ASSETS?>images/mainPages/1asset_3_1.png" id="image">
    <img src="<?=ASSETS?>images/mainPages/random lines.png" id="randomLines">
    
    

    <!-- Visible only if logged in -->
    <!-- <?php if(!empty($_SESSION['user_id'])){
        header("Location:".ROOT."");
    }?> -->
</body>
</html>