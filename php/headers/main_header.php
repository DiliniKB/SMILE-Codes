<?php

session_start();



$login["link"] = "login.php";
$login["text"] = "Login";

$signup["link"] = "signup.php";
$signup["text"] = "Signup";

if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
    $login["link"] = "dashboard.php";
    $login["text"] = "Dashboard";

    $signup["link"] = "logout.php";
    $signup["text"] = "Logout";
}

?>

<div class="bg1" id="background">
    <div class="MainOval"></div>
    <div class="Oval3"></div>
</div>
                    
<div class=header>
    <a href="index.html">
        <img src="assets/images/logo2.png" id="Logo">
    </a>

    <div class=dropdown>
        <div class="txt" id="Event">Event
            <img src="assets/images/CaretDownCaretDown.png" class="menuicon" >
            <div class="dropdown-content" id="menu">
                <a href="#">Environmental</a>
                <a href="#">Medical</a>
                <a href="#">Helping Hands</a>
                <a href="#">Other</a>
            </div>
        </div>
    </div>

    <div class=dropdown>
        <div class="txt" id="Donation">Donation
        <img src="assets/images/CaretDownCaretDown.png" class="menuicon" >
            <div class="dropdown-content" id="menu">
                <a href="#">Medical</a>
                <a href="#">Emergency</a>
                <a href="#">Education</a>
                <a href="#">Animal Care</a>
                <a href="#">Children</a>
                <a href="#">Senior Care</a>
            </div>
        </div>
    </div>  


    <a class="btn " id="login" href="<?=$login["link"]?>"><?=$login["text"]?></a>
    <a class="btn" id="signup" href="<?=$signup["link"]?>"><?=$signup["text"]?></a>
    
</div>