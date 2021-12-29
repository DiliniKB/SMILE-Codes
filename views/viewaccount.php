<?php $this->view("header",$data);?>
<head>    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesviewaccount.css">  

    <script type="text/javascript" src="<?=ASSETS?>js/confir.js"></script>
    <script type="text/javascript" src="<?=ASSETS?>js/viewreport.js"></script>
</head>

<body>
               

    <!--container-->
    <div class="container">
        <div class="c1">
            <div class="cat">
                <div class="t">
                    <div class="topic">Funds</div>
                </div>
                <div class="display">
                    <div class="t2">
                        <div class="topic2">Active</div>
                    </div>
                    <?php if(is_array($data['activefunds'])): ?>
                        <?php foreach($data['activefunds'] as $table): ?>
                            <?php if(is_array($table)):?>
                                <?php foreach($table as $row): ?>
                                <div>
                                    <div class="fpost">
                                        <img src= "<?=ASSETS?>Images/mainPages/<?=$row->table;?>/<?=$row->picture?>" class="photo">
                                        <div class="location">
                                            <div class="town"><?=$row->town?></div>
                                            <div class="district"><?=$row->district?></div>
                                        </div>
                                        <div class="title"><?=$row->title?></div>
                                        <progress value="<?=$row->filled?>" max="<?=$row->amount?>"></progress>
                                        <div class="RaisedOf">Rs <?=$row->filled?> raised of Rs<?=$row->amount?></div>
                                        <div class="icons">
                                            <div class="dmicon">
                                                <a class="delete" href="<?=ROOT?>funds/delete_fund/<?=$row->table?>/<?=$row->ID?>" onclick="confirmation_delete()"><ion-icon name="trash-bin"></ion-icon></a>
                                                <!-- <p class="done">&#x2714;</p> -->
                                                <a class="move" href="<?=ROOT?>singlefund/<?=str_replace("fund","",$row->table); ?>/<?=$row->ID?>"><ion-icon name="arrow-forward-circle"></ion-icon></a>
                                            </div>
                                            <div class="report" onclick=viewreportlist(this)>
                                                <p class="reportIcon"><ion-icon name="alert-circle-outline"></ion-icon></p>
                                                <p><?=$row->report_count?> reports</p>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="reportbox" id="reportbox">
                                        <?php if(property_exists($row, 'reports')):?>
                                            <?php foreach($row->reports as $report):?>
                                                <tr>
                                                    <td>
                                                        <?=$report->date?>
                                                    </td>
                                                    <td>
                                                        <?=$report->feedback?>
                                                    </td>
                                                    <td>
                                                        <button>Detailed Report</button>                                            
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else:?>
                        <p class="nofunds"> No active funds for this user </p>  
                    <?php endif; ?>
                    <div class="t2">
                        <div class="topic2">Filled</div>
                    </div>
                    <?php if(is_array($data['filledfunds'])): ?>
                        <?php foreach($data['filledfunds'] as $table): ?>
                            <?php if(is_array($table)):?>
                                <?php foreach($table as $row): ?>
                                <div>
                                    <div class="fpost">
                                        <img src= "<?=ASSETS?>Images/mainPages/<?=$row->table;?>/<?=$row->picture?>" class="photo">
                                        <div class="location">
                                            <div class="town"><?=$row->town?></div>
                                            <div class="district"><?=$row->district?></div>
                                        </div>
                                        <div class="title"><?=$row->title?></div>
                                        <progress value="<?=$row->filled?>" max="<?=$row->amount?>"></progress>
                                        <div class="RaisedOf">Rs <?=$row->filled?> raised of Rs<?=$row->amount?></div>
                                        <div class="icons2">
                                            <div class="dmicon">
                                                <a class="delete" href="<?=ROOT?>funds/delete_fund/<?=$row->table?>/<?=$row->ID?>" onclick="confirmation_delete()"><ion-icon name="trash-bin"></ion-icon></a>
                                                <p class="done"><ion-icon name="checkmark-done-circle"></ion-icon></p>
                                                <a class="move" href="<?=ROOT?>singlefund/<?=str_replace("fund","",$row->table); ?>/<?=$row->ID?>"><ion-icon name="arrow-forward-circle"></ion-icon></a>
                                            </div>
                                            <div class="report" onclick=viewreportlist(this)>
                                                <p class="reportIcon"><ion-icon name="alert-circle-outline"></ion-icon></p>
                                                <p><?=$row->report_count?> reports</p>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="reportbox" id="reportbox">
                                        <?php if(property_exists($row, 'reports')):?>
                                            <?php foreach($row->reports as $report):?>
                                                <tr>
                                                    <td>
                                                        <?=$report->date?>
                                                    </td>
                                                    <td>
                                                        <?=$report->feedback?>
                                                    </td>
                                                    <td>
                                                        <button>Detailed Report</button>                                            
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>  
                    <?php else:?>
                    <p class="nofunds"> No filled funds for this user </p>
                    <?php endif; ?>
                    <div class="t2">
                        <div class="topic2">Settled</div>
                    </div>
                    <?php if(is_array($data['settledfunds'])): ?>
                        <?php foreach($data['settledfunds'] as $table): ?>
                            <?php if(is_array($table)):?>
                                <?php foreach($table as $row): ?>
                                <div>
                                    <div class="fpost">
                                        <img src= "<?=ASSETS?>Images/mainPages/<?=$row->table;?>/<?=$row->picture?>" class="photo">
                                        <div class="location">
                                            <div class="town"><?=$row->town?></div>
                                            <div class="district"><?=$row->district?></div>
                                        </div>
                                        <div class="title"><?=$row->title?></div>
                                        <progress value="<?=$row->filled?>" max="<?=$row->amount?>"></progress>
                                        <div class="RaisedOf">Rs <?=$row->filled?> raised of Rs<?=$row->amount?></div>
                                        <div class="icons2">
                                            <div class="dmicon">
                                                <a class="delete" href="<?=ROOT?>funds/delete_fund/<?=$row->table?>/<?=$row->ID?>" onclick="confirmation_delete()"><ion-icon name="trash-bin"></ion-icon></a>
                                                <p class="done"><ion-icon name="checkmark-done-circle"></ion-icon></p>
                                                <a class="move" href="<?=ROOT?>singlefund/<?=str_replace("fund","",$row->table); ?>/<?=$row->ID?>"><ion-icon name="arrow-forward-circle"></ion-icon></a>
                                            </div>
                                            <div class="report" onclick=viewreportlist(this)>
                                                <p class="reportIcon"><ion-icon name="alert-circle-outline"></ion-icon></p>
                                                <p><?=$row->report_count?> reports</p>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="reportbox" id="reportbox">
                                        <?php if(property_exists($row, 'reports')):?>
                                            <?php foreach($row->reports as $report):?>
                                                <tr>
                                                    <td>
                                                        <?=$report->date?>
                                                    </td>
                                                    <td>
                                                        <?=$report->feedback?>
                                                    </td>
                                                    <td>
                                                        <button>Detailed Report</button>                                            
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else:?>
                    <p class="nofunds"> No settled funds for this user </p>  
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="cat">
                <div class="t">
                    <div class="topic">Posts</div>
                </div>
                <div class="display">
                    <div class="t2">
                        <div class="topic2">Active</div>
                    </div>
                    <?php if(is_array($data['activeposts'])): ?>
                        <?php foreach($data['activeposts'] as $table): ?>
                            <?php if(is_array($table)):?>
                                <?php foreach($table as $row): ?>
                                <div>
                                    <div class="fpost">
                                        <img src= "<?=ASSETS?>Images/mainPages/<?=$row->table;?>/<?=$row->picture?>" class="photo">
                                        <div class="location">
                                            <div class="town"><?=$row->town?></div>
                                            <div class="district"><?=$row->district?></div>
                                        </div>
                                        <div class="description"><?=$row->content?></div>
                                        <div class="title"><?=$row->item?></div>
                                        <div class="icons2">
                                            <div class="dmicon">
                                                <a class="delete" href="<?=ROOT?>posts/delete_post/<?=$row->table?>/<?=$row->ID?>" onclick="confirmation_delete()"><ion-icon name="trash-bin"><ion-icon name="trash-bin"></ion-icon></a>
                                                <p class="done"><ion-icon name="checkmark-done-circle"></ion-icon></p>
                                                <a class="move" href="<?=ROOT?>singlepost/<?=str_replace("post","",$row->table); ?>/<?=$row->ID?>"> <ion-icon name="arrow-forward-circle"></ion-icon></a> 
                                            </div>
                                            <div class="report" onclick=viewreportlist(this)>
                                                <p class="reportIcon"><ion-icon name="alert-circle-outline"></ion-icon></p>
                                                <p><?=$row->report_count?> reports</p>
                                            </div>    
                                        </div>
                                    </div> 
                                    <div class="reportbox" id="reportbox">
                                        <?php if(property_exists($row, 'reports')):?>
                                            <?php foreach($row->reports as $report):?>
                                                <tr>
                                                    <td>
                                                        <?=$report->date?>
                                                    </td>
                                                    <td>
                                                        <?=$report->feedback?>
                                                    </td>
                                                    <td>
                                                        <button>Detailed Report</button>                                            
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </div>
                                </div> 
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php else:?>
                        <p class="nofunds"> No settled funds for this user </p>  
                    <?php endif; ?>
                    <div class="t2">
                        <div class="topic2">Done</div>
                    </div>
                    <?php if(is_array($data['settledposts'])): ?>
                        <?php foreach($data['settledposts'] as $table): ?>
                            <?php if(is_array($table)):?>
                                <?php foreach($table as $row): ?>
                                <div>
                                    <div class="fpost">
                                        <img src= "<?=ASSETS?>Images/mainPages/<?=$row->table;?>/<?=$row->picture?>" class="photo">
                                        <div class="location">
                                            <div class="town"><?=$row->town?></div>
                                            <div class="district"><?=$row->district?></div>
                                        </div>
                                        <div class="description"><?=$row->content?></div>
                                        <div class="title"><?=$row->item?></div>
                                        <div class="icons2">
                                            <div class="dmicon">
                                                <a class="delete" href="<?=ROOT?>posts/delete_post/<?=$row->table?>/<?=$row->ID?>" onclick="confirmation_delete()"><ion-icon name="trash-bin"><ion-icon name="trash-bin"></ion-icon></a>
                                                <p class="done"><ion-icon name="checkmark-done-circle"></ion-icon></p>
                                                <a class="move" href="<?=ROOT?>singlepost/<?=str_replace("post","",$row->table); ?>/<?=$row->ID?>"> <ion-icon name="arrow-forward-circle"></ion-icon></a> 
                                            </div>
                                            <div class="report" onclick=viewreportlist(this)>
                                                <p class="reportIcon"><ion-icon name="alert-circle-outline"></ion-icon></p>
                                                <p><?=$row->report_count?> reports</p>
                                            </div>    
                                        </div>
                                    </div> 
                                    <div class="reportbox" id="reportbox">
                                        <?php if(property_exists($row, 'reports')):?>
                                            <?php foreach($row->reports as $report):?>
                                                <tr>
                                                    <td>
                                                        <?=$report->date?>
                                                    </td>
                                                    <td>
                                                        <?=$report->feedback?>
                                                    </td>
                                                    <td>
                                                        <button>Detailed Report</button>                                            
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                    </div>
                                </div> 
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>  
                        <?php else:?>
                        <p class="nofunds"> No settled posts for this user </p>  
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
                    <td>Address</td>
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
    </div>
    
</body>
