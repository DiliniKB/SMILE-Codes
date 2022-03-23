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
        <p class="FormTopic">Identity information is submitted.</p>
        <form method="post" style="margin: 0;" enctype="multipart/form-data">
            Once one of administrators approved <br /> your account, you can enjoy the <br />full features of the platform.
            <br />
            <br />
            <a href="dashboard">Continue</a>
        </form>         
    </div> 
                   
    <img src="<?=ASSETS?>images/mainPages/1asset_3_1.png" id="image">
    <img src="<?=ASSETS?>images/mainPages/random lines.png" id="randomLines">
    
</body>
</html>