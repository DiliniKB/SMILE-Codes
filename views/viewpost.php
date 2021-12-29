<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesviewpost.css">  
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">          
</head>

<body>
<div class="container">
        <div class="c1" onclick="closeForm()">
            <img src="<?=ASSETS?>Images/mainPages/<?=$data['table']?>/<?=$data['post']->picture?>" class="photo">
            <div class="detail">
                <div class="r1">
                    <div class="duration">
                        <?php echo "5days"?>
                    </div>
                    <div class="keywords">
                        <?=$data['post']->keywords?>
                    </div>
                </div>
                <div class="r2">
                    <div class="h">
                        <?=$data['post']->item?>
                    </div>
                    <div class="description">
                        <?=$data['post']->content?>   
                    </div>
                </div>
                <div class="r3">
                    <div class="user" <?php if($_SESSION['user_status']){?>onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][0]->user_ID ?>'"<?php } ?>>
                            <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                            <div class="userName" style=" font-weight: 500;"><?=$data['creaters'][0]->first_name." ".$data['creaters'][0]->last_name?></div>
                    </div>
                <?php if($data['post']->member_ID1){ ?> 
                    <div class="user" <?php if($_SESSION['user_status']){?>onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][1]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName"><?=$data['creaters'][1]->first_name." ".$data['creaters'][1]->last_name?></div>
                    </div>
                <?php } ?>
                <?php if($data['post']->member_ID2){ ?>
                    <div class="user" <?php if($_SESSION['user_status']){?>onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][2]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName"><?=$data['creaters'][2]->first_name." ".$data['creaters'][2]->last_name?></div>
                    </div>
                <?php } ?>
                <?php if($data['post']->member_ID3){ ?>
                    <div class="user" <?php if($_SESSION['user_status']){?>onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][3]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName"><?=$data['creaters'][3]->first_name." ".$data['creaters'][3]->last_name?></div>
                    </div>
                <?php } ?>
                </div>
            </div>
            
            <a class="report" href='<?=ROOT?><?="single".$data['type']?>/report/<?=$data['table']?>/<?=$data['id']?>'>
                Report this post
            </a>

        </div>
        
        <div class="c2">
            <div class="r5">
                <div class="c3">
                    <div class="share">41<br>Shares </div>
                    <div class="button1">Share</div>
                </div>
                
            </div>
            
            
            <div class="r7">

                <!--chat-->
                <div class="chat">For More Info</div>
                <form action= "mailto: <?php echo $to ?> ?cc= <?php if($memberID1) echo $to1.";" ?> <?php if($memberID2) echo $to2. ";" ?> <?php if($memberID3) echo $to3.";" ?>&subject= <?php echo $subject?>" method="POST" enctype="multipart/form-data">
                    <!--<input id="message" type="text"  name="message" placeholder="Type your message here" maxlength="150" ></input>-->

                    <div>
                        <p class="note">Contact with the creator of this post by sending an email to get the further Information.</p>
                    </div>

                    <button id="send" type="submit" >Send</button>
                </form>

                <!--comment-->
                <div class="comments">Comments</div>
                <form id="commentForm" method="post">
                    <input id="newComment" type="text" name="comment" placeholder="Leave your comment here" required>
                    <button id="entercomment" type="submit" name="entercomment">Enter</button>
                </form>
                <div>
                    <p class="owner">Ganguli De Silva</p>
                    <p class="comment">- This should be viral</p>
                </div>
                <div>
                    <p class="owner">Ganguli De Silva</p>
                    <p class="comment">- What a little age to have something like that.</p>
                </div>
                
                <p class="seeMore" id="Seemore" onclick="hide()">See more<span>&#9660;</span></p>
                <div id="More">
                    <div>
                        <p class="owner">Ganguli De Silva</p>
                        <p class="comment">- God bless you.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <script src="../assets/Scripts/viewpost.js"></script>
    <!-- <div class="form-popup" id="SForm">
        <form class="form-container">
            <div class="text1">
                Do you think that this post contains fake or misleading information? Tell us more about it.
            </div>
            <input type="text" class="reportin">
            <button class="button2" type="submit" onclick="closeForm()">ENTER</button>
        </form>
    </div> -->
    

    
</body>