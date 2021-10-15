<?php include("php/login.php");?>
<head>
    <meta charset="utf-8">
      
    <title>Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Actor&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Delius&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=?????&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/stylessignup.css">
    <link rel="stylesheet" href="assets/css/styleslog.css">
    <link rel="stylesheet" href="assets/css/new/login.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>  
</head>
<body>
    
    <?php include("php/headers/main_header.php") ?>

        <form class="BlurRectOval" method="POST" id="form">
            <p class="FormTopic">Login</p>
                <input class="input_form" type="text" placeholder="Email" name="email" autocomplete="on" required>
                <input class="input_form" type="password" placeholder="Password" name="password" autocomplete="on" required>
                <label id="rememberMe">
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                <a id="passwordReset" href ="#">Forgot Password</a>
                
                <input id="enter" class="form-btn" type="submit" value="ENTER" name="login_done"/>   
        </form>       
        
        <img src="assets/images/1asset_3_1.png" id="image">
        <img src="assets/images/random lines.png" id="randomLines">
        
        <div class="btn" id="DonateUs">Donate Us</div>

        <img src="assets/images/Phonephone.png" id="phone">
        <div class="txt" id="tpnum">011-7826492</div>

        <?php include("php/headers/messages.php") ?>
    </body>
</html>
