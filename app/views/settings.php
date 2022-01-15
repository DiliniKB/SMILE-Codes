<?php $this->view("header",$data);?>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylessettings.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">

        
</head>
<body> 
    
    <div class="Cat">Settings</div>

    <div class="column" id="c1">
        <div class="options">

            <div class="option" id="op1">Change profile picture</div>
            <div class="form-popup" id="SForm1">
                <form class="form-container" id="f1" method="POST" enctype="multipart/form-data">
                    <input type="file" class="custom-file-input" name="profile_pic" accept="image/*" onchange="preview_image(event)">
                    <div class="uploadBox">
                        <img id="output_image" src="<?=ASSETS?>images/profile/<?=$data['profpic']?>"/>
                    </div>
                    <button type="submit" name="submit_picture" class="enter">Done</button>
                </form>
            </div>

            <div class="option" id="op2">Change email address</div>
            <div class="form-popup" id="SForm2">
                <form class="form-container" id="f2" method="POST">
                    <label for="password">Enter password</label>
                    <input type="password" name="password" class="inputF">
                    <label for="location">New email</label>
                    <input type="email" name="email" class="inputF" value="<?=$data['email']?>">
                    <div><button type="submit" class="enter" name="submit_email">Done</button></div>
                </form>
            </div>
            
            <div class="option" id="op3">Change mobile number</div>
            <div class="form-popup" id="SForm3">
                <form class="form-container" id="f3" method="POST">
                    <label for="mobile number">New mobile number</label>
                    <input type="text" name="tpnum" class="inputF" value="<?=$data['mobile']?>">
                    <button type="submit" name="submit_mobile" class="enter">Change</button>
                </form>
            </div>

            <div class="option" id="op4">Change password</div>
            <div class="form-popup" id="SForm4">
                <form class="form-container" id="f4" method="POST">
                    <label for="location">Enter new password</label>
                    <input type="password" name="password" class="inputF">
                    <label for="keyword">Confirm password</label>
                    <input type="password" name="password_confirm" class="inputF">
                    <button type="submit" class="enter" name="submit_password">Done</button>
                </form>
            </div>

            <div class="option" id="op5">Link / Remove bank account</div>
            <div class="form-popup" id="SForm5">
                <form class="form-container" id="f5" method="POST">
                    <label for="location">Name of the bank</label>
                    <input type="text" name="bank_name" class="inputF" value="<?=$data['bank_name']?>">
                    <label for="keyword">Name of the branch</label>
                    <input type="text" name="branch" class="inputF" value="<?=$data['bank_branch']?>">
                    <label for="location">Account number</label>
                    <input type="text" name="acc_number" class="inputF" value="<?=$data['bank_account']?>">
                    <button type="submit" class="enter" name="submit_bank">Done</button>
                    <button type="submit" class="enter" name="submit_bank_remove">Remove Account</button>
                </form>
        </div>
    </div>

    <?php if($data['sys_error'] == 1){?>
    <div id="message-box" class="<?php echo $data['sys_error_type'];?>">
        <span><?php echo $data['sys_error_msg'];?></span>
    </div>
    <?php } ?>

    <script type="text/javascript" src="<?=ASSETS?>js/settings.js"></script>

</body>   
</html>
