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
        <p class="FormTopic">Your account is created successfully.</p>
        <form method="post" style="margin: 0;" enctype="multipart/form-data">
            Please check your email inbox, spam folder <br />and follow the instructions.
            <br />
            <br />
            <a href="resendemail">Resend</a>
        </form>         
    </div> 
                   
    <img src="<?=ASSETS?>images/mainPages/1asset_3_1.png" id="image">
    <img src="<?=ASSETS?>images/mainPages/random lines.png" id="randomLines">
    
</body>
</html>