<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesviewfund.css">  
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">

    <script src="<?=ASSETS?>/js/viewfund.js"></script>
    
</head>

<body onload="showProgress(<?=$data['fund']->filled?>,<?=$data['fund']->amount?>);">
<div class="container">
        <div class="c1">
            <img src="<?=ASSETS?>Images/mainPages/<?=$data['table']?>/<?=$data['fund']->picture?>" class="photo">
            <div class="detail">
                <div class="r1">
                    <div class="duration">
                        <ion-icon class="cicon" name="calendar-outline"></ion-icon><?=$data['dategap']?>
                    </div>
                    <div class="keywords">
                        <ion-icon class="cicon" name="pricetags-outline"></ion-icon><?=$data['fund']->keywords?>
                    </div>
                </div>
                <div class="r2">
                    <div class="h">
                        <?=$data['fund']->title?>
                    </div>
                    <div class="description">
                        <?=$data['fund']->content?>   
                    </div>
                </div>
                <div class="r3">
                    <div class="user" <?php if($_SESSION['user_status']){?> style="cursor:pointer;" onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][0]->user_ID ?>'"<?php } ?>>
                            <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                            <div class="userName" style=" font-weight: 500;"><?=($data['creaters'][0])?($data['creaters'][0]->first_name." ".$data['creaters'][0]->last_name):'Invalid User'?></div>
                    </div>
                <?php if($data['fund']->member_ID1){ ?> 
                    <div class="user" <?php if($_SESSION['user_status']){?> style="cursor:pointer;" onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][1]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName"><?=$data['creaters'][1]->first_name." ".$data['creaters'][1]->last_name?></div>
                    </div>
                <?php } ?>
                <?php if($data['fund']->member_ID2){ ?>
                    <div class="user" <?php if($_SESSION['user_status']){?> style="cursor:pointer;" onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][2]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName"><?=$data['creaters'][2]->first_name." ".$data['creaters'][2]->last_name?></div>
                    </div>
                <?php } ?>
                <?php if($data['fund']->member_ID3){ ?>
                    <div class="user" <?php if($_SESSION['user_status']){?> style="cursor:pointer;" onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][3]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName"><?=$data['creaters'][3]->first_name." ".$data['creaters'][3]->last_name?></div>
                    </div>
                <?php } ?>
                </div>
            </div>
            <a class="report" href='<?=ROOT?><?="single".$data['type']?>/report/<?=$data['table']?>/<?=$data['id']?>'>
                Report this fund
            </a>

        </div>
        <div class="c2">
            <div class="r4">
                <!-- <progress value="<?=$data['fund']->filled?>" max="<?=$data['fund']->amount?>"></progress>   -->
                <div class="meter">
                    <div class="progress-value" ></div>
                </div>             
                <div class="Raised">
                    Rs.<?=$data['fund']->filled?> raised of Rs.<?=$data['fund']->amount?>
                </div>
            </div>
            <div class="r5">
                <div class="c3">
                    <div class="count">
                        350<br>
                        Donations 
                    </div>
                    <a class="button1" href="<?=ROOT?>singlefund/donate/<?=$data['category']?>/<?=$data['id']?>">
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
                    <ion-icon class="ticon" name="trending-up-outline"></ion-icon>
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
            </div>
            <div class="r7">
                <div class="comments">Comments</div>
                <form id="commentForm" method="post">
                    <input id="newComment" type="text" name="comment" placeholder="Leave your comment here" required>
                    <button id="entercomment" type="submit">Enter</button>
                </form>

                <?php for ($i = 0; $i < 2; $i++):?>
                    <div>
                        <p class="owner"><?=$data['comments'][$i]->first_name." ".$data['comments'][$i]->last_name?></p>
                        <p class="comment"><?=" - ".$data['comments'][$i]->comment?></p>
                    </div>
                <?php endfor; ?>
                <?php if(count($data['comments'])>2):?>
                    <div id="More">
                    <?php for ($i = 2; $i < count($data['comments']); $i++):?>
                        <div>
                        <p class="owner"><?=$data['comments'][$i]->first_name." ".$data['comments'][$i]->last_name?></p>
                        <p class="comment"><?=" - ".$data['comments'][$i]->comment?></p>
                        </div>
                    <?php endfor; ?> 
                    </div>
                    <p class="seeMore" id="Seemore" onclick="hide()">See More</p>
                <?php endif;?>
            </div>
        </div>
    </div>
    
    
    <!-- <div class="form-popup" id="SForm">
        <form class="form-container">
            <div class="text1">
                Do you think that this fund contains fake or misleading information? Tell us more about it.
            </div>
            <input type="text" class="reportin">
            <button class="button2" type="submit" onclick="closeForm()">ENTER</button>
        </form>
    </div> -->
    
</body>
</html>