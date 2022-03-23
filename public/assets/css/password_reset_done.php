<?php $this->view("footers/footerMain",$data);?>
<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/styleslog.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <script type="text/javascript" src="<?=ASSETS?>js/index.js"></script>
</head>
<body>

    <div class="BlurRectOval" id="form">
        <p class="FormTopic">Password reset</p>
        <form method="post" style="margin: 0;" enctype="multipart/form-data">
            Password of the account associated with the email (if there is any) is reset. Please check your email for the new password.
            <br />
            <br />
            <a href="login">Login</a>
        </form>         
    </div> 
                   
    <img src="<?=ASSETS?>images/mainPages/1asset_3_1.png" id="image">
    <img src="<?=ASSETS?>images/mainPages/random lines.png" id="randomLines">
    
</body>
</html>