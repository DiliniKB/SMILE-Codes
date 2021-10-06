<?php
    session_start();
?>
<!DOCTYPE html lang="en">
    <head>
        <meta charset="utf-8">
          
        <title>Welcome Page</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Delius&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=?????&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="CSS/stylesBigheader.css">
        
            
    </head>
   
        <?php 
            $IPATH= "";
            include($IPATH."assets/PHP/header1.php")
        ?>

        <div class="BlurRectOval" id="quote">If you have something today...</br>That's what you gave yesterday. </br> We </br>Sri lankans </br> rich with humanity.<br>Let's hold hands together.</div>
                   
        <img src="<?php echo $IPATH?>images/mainPages/1asset_3_1.png" id="image">
        <img src="<?php echo $IPATH?>images/mainPages/random lines.png" id="randomLines">
        
        <div class=footer>
            <div class="btn" id="DonateUs">Donate Us</div>
            <img src="<?php echo $IPATH?>images/mainPages/Phonephone.png" id="phone">
            <div class="txt" id="tpnum">011-7826492</div>
        </div>
    </body>
</html>
