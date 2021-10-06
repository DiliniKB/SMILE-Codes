<?php 

    require "../assets/PHP/dbconfig.php";

    $cat= trim($_GET['cat'],"'");
    $id = trim($_GET['id'],"'");

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
      
    <title>VF</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../CSS/stylesSmallheader.css">
    <link rel="stylesheet" href="../CSS/stylesviewfund.css">
    
    <script>
        var rangeSlider = document.getElementById("rs-range-line");
        var rangeBullet = document.getElementById("rs-bullet");

        rangeSlider.addEventListener("input", showSliderValue, false);

        function showSliderValue() {
        rangeBullet.innerHTML = rangeSlider.value;
        var bulletPosition = (rangeSlider.value /rangeSlider.max);
        rangeBullet.style.left = (bulletPosition * 578) + "px";
        }

    </script>
</head>

<body>
    <script>
        function openForm() {
            document.getElementById("SForm").style.display = "block";
        }
        
        function closeForm() {
            document.getElementById("SForm").style.display = "none";
        }
       
    </script>
    
    <div class="bg2" onclick="closeForm()" >
    </div>
                      
    <?php 
        $IPATH= "../";
        include($IPATH."assets/PHP/header0.php")
    ?>

    <div class="container">
        <div class="c1" onclick="closeForm()">
            <img src="<?php echo $IPATH?>/Images/mainPages/image1.png" class="photo">
            <div class="detail">
                <div class="r1">
                    <div class="duration">
                        Created 3 days ago
                    </div>
                    <div class="keywords">
                        Cancer Treatment <br>
                        Children <br>
                        Lucamia
                    </div>
                </div>
                <div class="r2">
                    <div class="h">
                        Little Shenaya needs your help
                    </div>
                    <div class="description">
                        Shenaya, an 8 year old girl from rural area who needs immediate treatments for Lucamia. So we are group of doctors at cancer hospital who are gladly welcome any of your kind help.   
                    </div>
                </div>
                <div class="r3">
                    <div class="user">
                        <img src="<?php echo $IPATH?>/Images/mainPages/User.png" class="userImg">
                        <div class="userName">Dileep Fernando</div>
                    </div>
                    <div class="user">
                        <img src="<?php echo $IPATH?>/Images/mainPages/User.png" class="userImg">
                        <div class="userName">Kumara Siriwardane</div>
                    </div>
                    <div class="user">
                        <img src="<?php echo $IPATH?>/Images/mainPages/User.png" class="userImg">
                        <div class="userName">Dileepa Jayakody</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="c2">
            <div class="r4">
                <progress value="10000" max="32000"></progress>               
                <div class="Raised">
                    Rs.10000 raised of Rs.32000
                </div>
            </div>
            <div class="r5">
                <div class="c3">
                    <div class="count">
                        350<br>
                        Donations 
                    </div>
                    <a class="button1" href="fundpayment.php">
                        Donate <br>
                        Now
                    </a>
                </div>
                <div class="c4">
                    <div class="count">41<br>Shares </div>
                    <div class="button1">Share</div> 
                </div>
            </div>
            <div class="r6">
                <div class="today">
                    <img src="<?php echo $IPATH?>/Images/mainPages/ChartLineUp.png" class="photo3">
                    <div class="tdonation">
                        92 people donated today
                    </div>
                </div>
                <div class="top">
                    <div class="circle"></div>
                    <div>
                        <div style=" text-align: center;">
                            Anoj De Silva
                        </div>
                        <div class="amount">
                            <div> Rs.10000</div>
                            <div>Top Donation</div>
                        </div> 
                    </div>
                </div>
                <div class="recent">
                    <div class="circle"></div>
                    <div>
                        <div style=" text-align: center;">
                            Anonymous
                        </div>
                        <div class="amount">
                            <div> Rs.10000</div>
                            <div>Recent Donation</div>
                        </div> 
                    </div>
                </div>
                <div class="report" onclick="openForm()">
                    Report this fund
                </div>
            </div>
        </div>
    </div>

    <div class="form-popup" id="SForm">
        <form action="/action_page.php" class="form-container">
            <div class="text1">
                Do you think that this fund contains fake or misleading information? Tell us more about it.
            </div>
            <input type="text" class="reportin">
            <button type="submit" class="enter" onclick="closeForm()">ENTER</button>
        </form>
    </div>
    
</body>
    
    