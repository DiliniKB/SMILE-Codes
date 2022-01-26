<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesviewpost.css">  
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">      
    
    <script src="<?=ASSETS?>/js/viewfund.js"></script>  
</head>

<body>
<div class="container">
        <div class="c1" onclick="closeForm()">
            <img src="<?=ASSETS?>Images/mainPages/<?=$data['table']?>/<?=$data['post']->picture?>" class="photo">
            <div class="detail">
                <div class="r1">
                    <div class="duration">
                        <ion-icon class="cicon" name="calendar-outline"></ion-icon><?=$data['dategap']?>
                    </div>
                    <div class="keywords">
                        <ion-icon class="cicon" name="pricetags-outline"></ion-icon><?=$data['post']->keywords?>
                    </div>
                </div>
                <div class="r2">
                    <div class="h">
                        <?php if($data['post']->post_type=="Giftee") echo "Need help :"?>
                        <?php if($data['post']->post_type=="Donor") echo "Donating :" ?>
                        <?=$data['post']->item?>
                    </div>
                    <div class="description">
                        <?=$data['post']->content?>   
                    </div>
                </div>
                <div class="r3">
                    <div class="user" <?php if($_SESSION['user_status']){?>onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][0]->user_ID ?>'"<?php } ?>>
                            <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                            <div class="userName" style=" font-weight: 500;">
                                <?php if($data['post']->visibility=="off" || $_SESSION['user_status'] == "1") echo $data['creaters'][0]->first_name." ".$data['creaters'][0]->last_name?>
                                <?php if($data['post']->visibility=="on" && $_SESSION['user_status'] == "0") echo "Anonymous Creator"?>
                            </div>
                    </div>
                <?php if($data['post']->member_ID1){ ?> 
                    <div class="user" <?php if($_SESSION['user_status']){?>onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][1]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName">
                            <?php if($data['post']->visibility=="off" || $_SESSION['user_status'] == "1") echo $data['creaters'][1]->first_name." ".$data['creaters'][1]->last_name?>
                            <?php if($data['post']->visibility=="on" && $_SESSION['user_status'] == "0") echo "Anonymous Member"?>
                        </div>
                    </div>
                <?php } ?>
                <?php if($data['post']->member_ID2){ ?>
                    <div class="user" <?php if($_SESSION['user_status']){?>onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][2]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName">
                            <?php if($data['post']->visibility=="off" || $_SESSION['user_status'] == "1") echo $data['creaters'][2]->first_name." ".$data['creaters'][2]->last_name?>
                            <?php if($data['post']->visibility=="on" && $_SESSION['user_status'] == "0") echo "Anonymous Member"?>
                        </div>
                    </div>
                <?php } ?>
                <?php if($data['post']->member_ID3){ ?>
                    <div class="user" <?php if($_SESSION['user_status']){?>onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][3]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName">
                            <?php if($data['post']->visibility=="off" || $_SESSION['user_status'] == "1") echo $data['creaters'][3]->first_name." ".$data['creaters'][3]->last_name?>
                            <?php if($data['post']->visibility=="on" && $_SESSION['user_status'] == "0") echo "Anonymous Member"?>
                        </div>
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
                    <form action= "mailto: <?php echo $data['creaters'][0]->email ?> ?cc= <?php if($data['post']->member_ID1) echo $data['creaters'][1]->email.";" ?> <?php if($data['post']->member_ID2) echo $data['creaters'][2]->email. ";" ?> <?php if($data['post']->member_ID3) echo $data['creaters'][3]->email.";" ?>&subject= <?php echo "To get more informations about the post on ".$data['post']->item?>" method="POST" enctype="multipart/form-data">
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
                    <button id="entercomment" type="submit">Enter</button>
                </form>
                
                <?php if(!empty($data['comments'])):?>
                    <?php for ($i = 0; $i < 3; $i++):?>
                        <?php if(!empty($data['comments'][$i])):?>
                        <div>
                            <p class="owner"><?=$data['comments'][$i]->first_name." ".$data['comments'][$i]->last_name?></p>
                            <p class="comment"><?=" - ".$data['comments'][$i]->comment?></p>
                        </div>
                        <?php endif;?>
                    <?php endfor; ?>
                    <?php if(count($data['comments'])>5):?>
                        <div id="More">
                        <?php for ($i = 3; $i < count($data['comments']); $i++):?>
                            <div>
                            <p class="owner"><?=$data['comments'][$i]->first_name." ".$data['comments'][$i]->last_name?></p>
                            <p class="comment"><?=" - ".$data['comments'][$i]->comment?></p>
                            </div>
                        <?php endfor; ?> 
                        </div>
                        <p class="seeMore" id="Seemore" onclick="hide()">See More</p>
                    <?php endif;?>
                <?php endif;?>

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
