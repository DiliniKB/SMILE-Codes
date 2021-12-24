<?php $this->view("header",$data);?>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesviewaccount.css">  

</head>

<body>
               

    <!--container-->
    <div class="container">
        <div class="c1">
            <div class="cat">
                <div class="t">
                    <div class="topic">Active Funds</div>
                </div>
                <div class="display">
                    <?php if(is_array($data['funds'])): ?>
                        <?php foreach($data['funds'] as $table): ?>
                            <?php if(is_array($table)):?>
                                <?php foreach($table as $row): ?>
                                    <div class="fpost">
                                        <img src= "<?=ASSETS?>Images/mainPages/<?=$row->table;?>/<?=$row->picture?>" class="photo">
                                        <div class="location">
                                            <div class="town"><?=$row->town?></div>
                                            <div class="district"><?=$row->district?></div>
                                        </div>
                                        <div class="title"><?=$row->title?></div>
                                        <progress value="<?=$row->filled?>" max="<?=$row->amount?>"></progress>
                                        <div class="RaisedOf">Rs <?=$row->filled?> raised of Rs<?=$row->amount?></div>
                                        <p class="delete"><ion-icon name="trash-bin"></ion-icon></p>
                                        <!-- <p class="done">&#x2714;</p> -->
                                        <a class="move" href="<?=ROOT?>singlefund/<?=str_replace("funds","",$row->table); ?>/<?=$row->ID?>"><ion-icon name="arrow-forward-circle"></ion-icon></a> 
                                    </div>
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>  
                    <?php endif; ?>
                </div>
            </div>
            <div class="cat">
                <div class="t">
                    <div class="topic">Active Posts</div>
                </div>
                <div class="display">
                <?php if(is_array($data['posts'])): ?>
                        <?php foreach($data['posts'] as $table): ?>
                            <?php if(is_array($table)):?>
                                <?php foreach($table as $row): ?>
                                    <div class="fpost">
                                        <img src= "<?=ASSETS?>Images/mainPages/<?=$row->table;?>/<?=$row->picture?>" class="photo">
                                        <div class="location">
                                            <div class="town"><?=$row->town?></div>
                                            <div class="district"><?=$row->district?></div>
                                        </div>
                                        <div class="description"><?=$row->content?></div>
                                        <div class="title"><?=$row->item?></div>
                                        <p class="delete"><ion-icon name="trash-bin"></ion-icon></p>
                                        <p class="done"><ion-icon name="checkmark-done-circle"></ion-icon></p>
                                        <a class="move" href="<?=ROOT?>singlepost/<?=str_replace("posts","",$row->table); ?>/<?=$row->ID?>"> <ion-icon name="arrow-forward-circle"></ion-icon></a> 
                                    </div> 
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>  
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
        <div class="c2">
            <div class="name"><?=$data['info']->first_name?> <br> <?=$data['info']->last_name?></div>
            <div class="pp">
                <img src= "<?=UPLOADS?>users/<?=$data['info']->picture?>" class="photo">
            </div>
            <div class="removeacc">Remove account</div>
            <table>
                <tr>
                    <td>NIC</td>
                    <td><?=$data['info']->NIC?></td>
                </tr>
                <tr>
                    <td>address</td>
                    <td><?=$data['info']->address?></td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td><?=$data['info']->DOB?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$data['info']->email?></td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td><?=$data['info']->contact_no?></td>
                </tr>
                <tr>
                    <td>Total amount donated</td>
                    <td>Rs.<?=$data['info']->donateAmount?></td>
                </tr>
                <tr>
                    <td>Fund Count</td>
                    <td><?=$data['info']->fundCount?></td>
                </tr>
                <tr>
                    <td>Post Count</td>
                    <td><?=$data['info']->postCount?></td>
                </tr>
                <tr>
                    <td>Donate Count</td>
                    <td><?=$data['info']->donateCount?></td>
                </tr>
                <tr>
                    <td>Removed Count</td>
                    <td><?=$data['info']->removed_count?></td>
                </tr>
                <tr>
                    <td>Bank account Number</td>
                    <td><?=$data['info']->account_number?></td>
                </tr>
                <tr>
                    <td>Branch name</td>
                    <td><?=$data['info']->branch_name?></td>
                </tr>
                <tr>
                    <td>Bank name</td>
                    <td><?=$data['info']->bank_name?></td>
                </tr>
            </table>
    </div>
    
</body>
