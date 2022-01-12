<!DOCTYPE html>
<html lang="en-US">

<head>
    <title><?=$data['page_title'] . " | " . WEBSITE_TITLE?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Delius&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bg1" id="background">

    </div>

    <div class=header>
        <a href="<?=ROOT?>/home">
            <img src="<?=ASSETS?>images/header/logo2.png" alt="logo" id="Logo">
        </a>
        
        <div class=dropdowns>
            <!-- <div class="txt" id="SmileMakers">
                <i class="gg-crown"></i>
                <a class="smileys" href="Pages/smilemakers.php">Smileys</a>
            </div> -->
            <div class=dropdown>
                <div class="txt" id="Event">Sharing Materials
                    <p class="menuicon"><ion-icon name="chevron-down-outline" ></ion-icon></p>
                    <div class="dropdown-content" id="menu1">
                        <a href="<?=ROOT?>posts/Medical">Medical</a>
                        <a href="<?=ROOT?>posts/Education">Education</a>
                        <a href="<?=ROOT?>posts/AnimalCare">Animal Care</a>
                        <a href="<?=ROOT?>posts/Children">Children</a>
                        <a href="<?=ROOT?>posts/SeniorCare">Senior Care</a>
                        <a href="<?=ROOT?>posts/Other">Other</a>
                    </div>
                </div>
            </div>

            <div class=dropdown>
                <div class="txt" id="Donation">Fundraising
                    <p class="menuicon"><ion-icon name="chevron-down-outline"></ion-icon></p>
                    <div class="dropdown-content" id="menu2">
                        <a href="<?=ROOT?>funds/Medical">Medical</a>
                        <a href="<?=ROOT?>funds/Education">Education</a>
                        <a href="<?=ROOT?>funds/AnimalCare">Animal Care</a>
                        <a href="<?=ROOT?>funds/Children">Children</a>
                        <a href="<?=ROOT?>funds/SeniorCare">Senior Care</a>
                        <a href="<?=ROOT?>funds/Other">Other</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="user">
        <?php 
        if(!empty($_SESSION['user_id'])){
            if($_SESSION['user_status']){?>        
                <div class=dropdown>
                    <p class="profile"><ion-icon name="person-outline"></ion-icon></p>
                    <div class="txt" id="Account">Hello, <?= $_SESSION['user_fname']; ?>
                        <p class="menuicon"><ion-icon name="chevron-down-outline"></ion-icon></p>
                        <div class="dropdown-content" id="menu3">
                            <a href="<?=ROOT?>home/dashboard">Dashboard</a>
                            <a href="<?=ROOT?>account/search">Search Accounts</a>
                            <a href="<?=ROOT?>home/settings">Settings</a>
                            <a id="logout" href="<?=ROOT?>home/logout">Logout</a>
                        </div>
                    </div>
                </div>
            <?php }
            else{?>
                <div class=dropdown>
                    <p class="profile"><ion-icon name="person-outline"></ion-icon></p>
                    <div class="txt" id="Account">Hello, <?= $_SESSION['user_fname']; ?>
                        <p class="menuicon"><ion-icon name="chevron-down-outline"></ion-icon></p>
                        <div class="dropdown-content" id="menu3">
                            <a href="<?=ROOT?>home/dashboard">Dashboard</a>
                            <a href="<?=ROOT?>home/settings">Settings</a>
                            <a id="logout" href="<?=ROOT?>home/logout">Logout</a>
                            <!-- <form method="POST">
                                <button  id="logout" name="logout" href="<?=ROOT?>/home/logout">Logout</button>
                            </form> -->
                        </div>
                    </div>
                </div>
            <?php }
        }?>    
        <?php if(empty($_SESSION['user_id'])){?>
            <a class="btn " id="login" href="<?=ROOT?>home/login">Login</a>
            <a class="btn" id="signup" href="<?=ROOT?>home/signup">Sign Up</a>
        <?php }?>
    </div>

        <?php $this->view("footers/footerfiles");?>
    </div> 