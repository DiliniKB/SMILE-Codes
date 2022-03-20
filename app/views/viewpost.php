<?php $this->view("footers/footerGreen",$data);?>
<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesviewpost.css">  
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">  

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    
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
                    <div class="user" <?php if(array_key_exists('user_status',$_SESSION) AND $_SESSION['user_status'] ){?> style="cursor:pointer;" onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][0]->user_ID ?>'"<?php } ?>>
                            <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                            <div class="userName" style=" font-weight: 500;">
                                <?php if($data['post']->visibility=="off" || (array_key_exists('user_status',$_SESSION) AND $_SESSION['user_status'] == "1")) echo $data['creaters'][0]->first_name." ".$data['creaters'][0]->last_name?>
                                <?php if($data['post']->visibility=="on" ) echo "Anonymous Creator"?>
                            </div>
                    </div>
                <?php if($data['post']->member_ID1){ ?> 
                    <div class="user" <?php if(array_key_exists('user_status',$_SESSION) AND $_SESSION['user_status']){?> style="cursor:pointer;" onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][1]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName">
                            <?php if($data['post']->visibility=="off" || (array_key_exists('user_status',$_SESSION) AND $_SESSION['user_status'] == "1")) echo $data['creaters'][1]->first_name." ".$data['creaters'][1]->last_name?>
                            <?php if($data['post']->visibility=="on" ) echo "Anonymous Member"?>
                        </div>
                    </div>
                <?php } ?>
                <?php if($data['post']->member_ID2){ ?>
                    <div class="user" <?php if(array_key_exists('user_status',$_SESSION) AND $_SESSION['user_status']){?> style="cursor:pointer;" onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][2]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName">
                            <?php if($data['post']->visibility=="off" || (array_key_exists('user_status',$_SESSION) AND $_SESSION['user_status'] == "1")) echo $data['creaters'][2]->first_name." ".$data['creaters'][2]->last_name?>
                            <?php if($data['post']->visibility=="on" ) echo "Anonymous Member"?>
                        </div>
                    </div>
                <?php } ?>
                <?php if($data['post']->member_ID3){ ?>
                    <div class="user" <?php if(array_key_exists('user_status',$_SESSION) AND $_SESSION['user_status']){?> style="cursor:pointer;" onclick="location.href='<?=ROOT?>account/<?=$data['creaters'][3]->user_ID ?>'"<?php } ?>>
                        <img src="<?=ASSETS?>/images/mainPages/User.png" class="userImg">
                        <div class="userName">
                            <?php if($data['post']->visibility=="off" || (array_key_exists('user_status',$_SESSION) AND $_SESSION['user_status'] == "1")) echo $data['creaters'][3]->first_name." ".$data['creaters'][3]->last_name?>
                            <?php if($data['post']->visibility=="on") echo "Anonymous Member"?>
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
                 <!-- <div class="c3">
                    <div class="share">41<br>Shares </div>
                    <div class="button1">Share</div>
                </div>-->

                <div class="c4">
                    <div class="count">41<br>Shares </div>
                    <div class="button1" onclick="view_share()">Share</div>
                    <!-- <div class="button1">Share</div> -->
                    <div class="smbuttons" id="smbuttons">
                        <!-- <div class="fb-share-button" data-href="http://localhost//SMILE/SMILE-git/SMILE-Codes/public/singlefund/<?=$data['category']?>/<?=$data['id']?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FSMILE%2FSMILE-git%2FSMILE-Codes%2Fpublic%2Fsinglefund%2FMedical%2F8&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div> -->
                        <!-- <a href="whatsapp://send?text=This is WhatsApp sharing example using link" data-action="share/whatsapp/share"  target="_blank"><ion-icon name="logo-whatsapp"></ion-icon> </a>   -->
                        <!-- <p id="sharelink" style="display:none;">http://localhost//SMILE/SMILE-git/SMILE-Codes/public/singlefund/<?=$data['category']?>/<?=$data['id']?></p> -->
                        <a href="https://twitter.com/intent/tweet?text=<?=$data['post']->title?>&url=http://localhost//SMILE/SMILE-git/SMILE-Codes/public/singlefund/<?=$data['category']?>/<?=$data['id']?>" class="fa fa-twitter"></a>
                        <a href="https://t.me/share/url?url=http://localhost//SMILE/SMILE-git/SMILE-Codes/public/singlefund/<?=$data['category']?>/<?=$data['id']?>&<?=$data['post']->title?>" class="fa fa-telegram" aria-hidden="true"></a>
                        <!-- <a href="whatsapp://send" data-text="Take a look at this awesome website:" data-href="" class="wa_btn wa_btn_s" style="display:none">Share</a> -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://localhost//SMILE/SMILE-git/SMILE-Codes/public/singlefund/<?=$data['category']?>/<?=$data['id']?>" class="fa fa-facebook" ></a>
                        <button onclick="copylink()" class="fa fa-clone"></button>
                    </div>
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
