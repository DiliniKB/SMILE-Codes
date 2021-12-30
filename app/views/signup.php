
<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylessignup.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
          
        
</head>
<body>

   

    <div class="BlurRectOval" id="form">
        <p class="FormTopic">Signup</p>
        <form method="post" style="margin:0;">
        
            <input class="input_form" type="text" value="<?=$fname?>" placeholder="FirstName" name="fname" required>
            <input class="input_form" id="name" value="<?=$lname?>" type="text" placeholder="LastName" name="lname" required>
            <input class="input_form" type="text" value="<?=$nic?>" placeholder="NIC" name="NIC" required>
            <input class="input_form" type="date" value="<?=$dob?>" placeholder="Date of Birth" name="dob" required>
            <input class="input_form" type="email" value="<?=$email?>" placeholder="Email" name="email" required>
            <input class="input_form" type="text" value="<?=$tpnum?>" placeholder="Contact Number" name="tpnum" required>
            <input class="input_form" type="password" placeholder="Password" name="password" required>
            <input class="input_form" type="password" placeholder="Confirm Password" name="password_confirm" required>
            <input id="enter" type="submit" name="signup" value="ENTER"/>
                    
        </form>         
    </div>       
    
    
    <img src="<?=ASSETS?>images/mainPages/1asset_3_1.png" id="image">
    <img src="<?=ASSETS?>images/mainPages/random lines.png" id="randomLines">
    
    <?php if($sys_error == 1){?>
    <div id="message-box" class="<?php echo $sys_error_type;?>">
        <span><?php echo $sys_error_msg;?></span>
    </div>
    <?php } ?>

    

</body>
</html>