<?php
    session_start();

    include "../assets/PHP/dbconfig.php";
    include "../assets/PHP/loginB.php";
?>
<head>
    <meta charset="utf-8">
      
    <title>Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Actor&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../CSS/stylessignup.css">
    <link rel="stylesheet" href="../CSS/styleslog.css">
    <link rel="stylesheet" href="../CSS/stylesBigheader.css">
    
        
</head>
<body>
    
    <div class="bg1" id="background">
        <div class="MainOval"></div>
        <div class="Oval1"></div>
        <div class="Oval2"></div>
        <div class="Oval3"></div>
    </div>

    <?php 
        $IPATH= "../";
        include($IPATH."assets/PHP/header0.php")
    ?>

        
    </div>

    <?php if(empty($_SESSION['username'])){ ?>
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
        
    <img src="<?php echo $IPATH?>images/mainPages/1asset_3_1.png" id="image">
    <img src="<?php echo $IPATH?>images/mainPages/random lines.png" id="randomLines">
    
    <div class=footer>
        <div class="btn" id="DonateUs">Donate Us</div>
        <img src="<?php echo $IPATH?>images/mainPages/Phonephone.png" id="phone">
        <div class="txt" id="tpnum">011-7826492</div>
    </div>

    <!-- Visible only if logged in -->
    <?php if(!empty($_SESSION['username'])){?>
        <h1 class="head1">Hello <?php echo $_SESSION['username'];?></h1>

        <form method="POST" class="BlurRectOval">
            <button name="logout">Logout</button>
        </form>
    <?php }?>
</body>
</html>