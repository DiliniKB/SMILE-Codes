<?php include("php/signup.php");?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
      
    <title>Signup</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Delius&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=?????&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/stylessignup.css">   
    <link rel="stylesheet" href="assets/css/new/signup.css">    
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>


    <?php include("php/headers/main_header.php") ?>

    
    <div class="BlurRectOval" id="form" >
        <p class="FormTopic">Signup</p>
        <form method="POST" id="first_page">
            <input class="input_form" type="text" placeholder="FirstName" name="first_name" autocomplete="on" required>
            <input class="input_form" type="text" placeholder="LastName" name="last_name" autocomplete="on" required>
            <input class="input_form" type="email" placeholder="Email" name="email" autocomplete="on" required>
            <input class="input_form" type="text" placeholder="NIC" name="nic" autocomplete="on" required>
            <input class="input_form" type="password" placeholder="Password" name="password" required>
            <input class="input_form" type="password" placeholder="Confirm Password" name="password_confirm" required>
            <input class="input_form" type="text" placeholder="Contact Number" name="tp_num" autocomplete="on" required>
            <span class="text-normal">Date of Birth:</span><input class="input_form" type="date" placeholder="Date of Birth" name="dob" autocomplete="on" required>
            <input type="submit" class="form-btn" name="signup_done" value="Sign up"/>
            <p class="text-normal">by signing up you agree to our <a href="#">terms</a> and <a href="#">privacy policy</a></p>
        </form>
    </div>    
    
    <img src="assets/images/1asset_3_1.png" id="image">
    <img src="assets/images/random lines.png" id="randomLines">
    
    <div class="btn" id="DonateUs">Donate Us</div>

    <img src="assets/images/Phonephone.png" id="phone">
    <div class="txt" id="tpnum">011-7826492</div>

    <?php include("php/headers/messages.php") ?>
    </body>
</html>
