<?php $this->view("footers/footerMain",$data);?>
<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesleaderboard.css">
    <script type="text/javascript" src="<?=ASSETS?>js/index.js"></script>
    <script>showSlides2(1);</script>
    <script>showSlides(1);</script>
</head>
<body>    

<div class="leaderboard" > 
    
    <div class="heading">Best of the Month</div>

    <?php $arr1 = $data['MonthlyLeaderboard']?> 
    <?php $rank0 = $arr1[0]->user_ID?> 
    <?php $rank1 = $arr1[1]->user_ID?> 
    <?php $rank2= $arr1[2]->user_ID ?> 
    <?php $array0 = $data['rank0']?> 
    <?php $array1 = $data['rank1']?>
    <?php $array2 = $data['rank2']?>
    
    <div class="mySlides fade" id="id1">
        <div class="numbertext">1</div>
        <div class= "photo">
            <img id="pic" src="<?=ASSETS?>Images/profile/<?=$array0[0]->picture?>">
        </div>  
        <div class="name"><?= $array0[0]->first_name?> <?= $array0[0]->last_name?> </div>
        <div class="amount"><?= $arr1[0]->amount?></div>
    </div>

    <div class="mySlides fade" id="id2">
        <div class="numbertext">2</div>
        <div class= "photo">
            <img id="pic" src="<?=ASSETS?>Images/profile/<?=$array1[0]->picture?> ">
        </div>  
        <div class="name"><?= $array1[0]->first_name?> <?= $array1[0]->last_name?></div>
        <div class="amount"><?= $arr1[1]->amount?></div>
    </div>

    <div class="mySlides fade" id="id3">
        <div class="numbertext">3</div>
        <div class= "photo">
            <img id="pic" src="<?=ASSETS?>Images/profile/<?=$array2[0]->picture?> ">
        </div>  
        <div class="name"><?= $array2[0]->first_name?> <?= $array2[0]->last_name?></div>
        <div class="amount"><?= $arr1[2]->amount?></div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    
</div>

<div class="leaderboard2" id="id4">
    
    <div class="heading">Best of the Contributors</div>

    <?php $arr = $data['Leaderboard']?> 

    <div class="mySlides2 fade2">
        <div class="numbertext">1</div>
        <div class= "photo">
            <img id="pic" src="<?=ASSETS?>Images/profile/<?=$arr[0]->picture?> ">
        </div>  
        <div class="name"><?= $arr[0]->first_name?> <?= $arr[0]->last_name?></div>
        <div class="amount"><?= $arr[0]->donateAmount?></div>
    </div>

    <div class="mySlides2 fade2" id="id5">
        <div class="numbertext">2</div>
        <div class= "photo">
            <img id="pic" src="<?=ASSETS?>Images/profile/<?=$arr[1]->picture?>">
        </div>  
        <div class="name"><?= $arr[1]->first_name?> <?= $arr[1]->last_name?></div>
        <div class="amount"><?= $arr[1]->donateAmount?></div>
    </div>

    <div class="mySlides2 fade2" id="id6">
        <div class="numbertext">3</div>
        <div class= "photo">
            <img id="pic" src="<?=ASSETS?>Images/profile/<?=$arr[2]->picture?> ">
        </div>  
        <div class="name"><?= $arr[2]->first_name?> <?= $arr[2]->last_name?></div>
        <div class="amount"><?= $arr[2]->donateAmount?></div>
    </div>

    <div class="mySlides2 fade2" id="id7">
        <div class="numbertext">4</div>
        <div class= "photo">
            <img id="pic" src="<?=ASSETS?>Images/profile/<?=$arr[3]->picture?> ">
        </div>  
        <div class="name"><?= $arr[3]->first_name?> <?= $arr[3]->last_name?></div>
        <div class="amount"><?= $arr[3]->donateAmount?></div>
    </div>

    <div class="mySlides2 fade2" id="id8">
        <div class="numbertext">5</div>
        <div class= "photo">
            <img id="pic" src="<?=ASSETS?>Images/profile/<?=$arr[4]->picture?> ">
        </div>  
        <div class="name"><?= $arr[4]->first_name?> <?= $arr[4]->last_name?></div>
        <div class="amount"><?= $arr[4]->donateAmount?></div>
    </div>

    <a class="prev2" onclick="plusSlides2(-1)">&#10094;</a>
    <a class="next2" onclick="plusSlides2(1)">&#10095;</a>
    
</div>

<br>


    <div class="BlurRectOval" id="quote">If you have something today...</br>That's what you gave yesterday. </br> We </br>Sri lankans </br> rich with humanity.<br>Let's hold hands together.</div>
                   
    <img src="<?=ASSETS?>images/mainPages/1asset_3_1.png" id="image">
    <!-- <img src="<?=ASSETS?>images/mainPages/random lines.png" id="randomLines">-->
    
</body>
</html>