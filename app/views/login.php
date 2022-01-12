<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/styleslog.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    
        
</head>
<body>

    <?php if(empty($_SESSION['user_id'])){ ?>
        <div class="BlurRectOval" id="form">
            <p class="FormTopic">Login</p>
            <form method="post" style="margin: 0;">                             
                <input class="input_form" id="fname" type="text" placeholder="Phonenumber or Email" name="uname" required>
                <input class="input_form" id="fname" type="password" placeholder="Password" name="psw" required>
                <label id="rememberMe">
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <a id="passwordReset" href ="#">Forgot Password</a>
                
                <button id="enter" type="submit" name="login">ENTER</button>
              
            </form>         
        </div>   
    <?php }?>    
        
    <img src="<?=ASSETS?>images/mainPages/1asset_3_1.png" id="image">
    <img src="<?=ASSETS?>images/mainPages/random lines.png" id="randomLines">
    

    <!-- Visible only if logged in -->
    <?php if(!empty($_SESSION['user_id'])){
        header("Location:".ROOT."");
    }?>
</body>
</html>