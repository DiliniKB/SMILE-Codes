<div class="bg1" id="background">
    <div class="MainOval"></div>
    <div class="Oval1"></div>
    <div class="Oval2"></div>
    <div class="Oval3"></div>
</div>

<?php 
    $PATH= "images/header";
?>


<div class=header>
    <a href="index.php">
        
        <img src="<?php echo $PATH?>/logo2.png" id="Logo">
    </a>
    <div class="txt" id="about">
        <a href="Pages/about.php">About</a>
    </div>
    
    <div class=dropdown>
        <div class="txt" id="Event">Event
            <img src="<?php echo $PATH?>/CaretDownCaretDown.png" class="menuicon" >
            <div class="dropdown-content" id="menu1">
                <a href="createevent.html">Environmental</a>
                <a href="viewevent.php">Medical</a>
                <a href="#">Helping Hands</a>
                <a href="#">Other</a>
            </div>
        </div>
    </div>

    <div class=dropdown>
        <div class="txt" id="Donation">Donation
        <img src="<?php echo $PATH?>/CaretDownCaretDown.png" class="menuicon" >
            <div class="dropdown-content" id="menu2">
                <a href="Pages/FundWall.php?cat='Medical'">Medical</a>
                <a href="Pages/FundWall.php?cat='Education'">Education</a>
                <a href="Pages/FundWall.php?cat='Animal Care'">Animal Care</a>
                <a href="Pages/FundWall.php?cat='Children'">Children</a>
                <a href="Pages/FundWall.php?cat='Senior care'">Senior Care</a>
                <a href="Pages/FundWall.php?cat='Other'">Other</a>
            </div>
        </div>
    </div>  


    <a class="btn " id="login" href="Pages/login.php">Login</a>
    <a class="btn" id="signup" href="Pages/signup.php">Sign Up</a>
    
</div>