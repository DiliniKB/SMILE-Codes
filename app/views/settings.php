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
                <form class="form-container" id="f1">
                    <input type="file" class="custom-file-input" accept="image/*" onchange="preview_image(event)">
                    <div class="uploadBox">
                        <img id="output_image"/>
                    </div>
                    <button type="submit" class="enter">Done</button>
                </form>
            </div>

            <div class="option" id="op2">Change email address</div>
            <div class="form-popup" id="SForm2">
                <form class="form-container" id="f2">
                    <label for="password">Enter password</label>
                    <input type="password" name="password" class="inputF">
                    <label for="location">New email</label>
                    <input type="email" name="email" class="inputF">
                    <div><button type="submit" class="enter">Done</button></div>
                </form>
            </div>
            
            <div class="option" id="op3">Change mobile number</div>
            <div class="form-popup" id="SForm3">
                <form class="form-container" id="f3">
                    <label for="mobile number">New mobile number</label>
                    <input type="text" name="mobile" class="inputF">
                    <button type="submit" class="enter">Send OTP</button>
                    <label for="OTP">OTP</label>
                    <input type="value" name="OTP" class="inputF">
                    <button type="submit" class="enter">Done</button>
                </form>
            </div>

            <div class="option" id="op4">Change password</div>
            <div class="form-popup" id="SForm4">
                <form class="form-container" id="f4">
                    <label for="location">Enter new password</label>
                    <input type="password" name="password" class="inputF">
                    <label for="keyword">Confirm password</label>
                    <input type="password" name="password" class="inputF">
                    <button type="submit" class="enter">Done</button>
                </form>
            </div>

            <div class="option" id="op5">Link / Remove bank account</div>
            <div class="form-popup" id="SForm5">
                <form class="form-container" id="f5">
                    <label for="location">Name of the bank</label>
                    <input type="text" name="bank name" class="inputF">
                    <label for="keyword">Name of the branch</label>
                    <input type="text" name="branch" class="inputF">
                    <label for="location">Account number</label>
                    <input type="text" name="acc_number" class="inputF">
                    <button type="submit" class="enter">Done</button>
                    <button type="submit" class="enter">Remove Account</button>
                </form>
        </div>
    </div>

    <script type="text/javascript" src="<?=ASSETS?>js/settings.js"></script>

</body>   
</html>
