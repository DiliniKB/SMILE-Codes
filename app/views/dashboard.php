<?php $this->view("header",$data);?>

    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesdashboard.css">    


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total Contribution'],
          ['Jan', 0],
          ['Feb', 0],
          ['March',0],
          ['April', 0],
          ['Jun', 2000],
          ['Jul',1800],
          ['Aug',1700],
          ['Sep',3000],
          ['Oct',500],
          ['Nov',0],
          ['Dec',5100]

        ]);

        var options = {
          title: 'Total Contribution-2021',
          curveType: 'function',
          vAxis: {viewWindowMode: "explicit", viewWindow:{ min: 0 }}
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


</head>

<body>
               
    <div class="container">
        <div class="r1">
            <div id="f2" >Account balance</div>
            <div id="f2" >400.00</div>
        </div>
        <div class="r2">
            <div id="curve_chart" style="width: 900px; height: 500px"></div>
            <div class="c1">
                <div id="f1"> Total in Last month </br><div style="color: #04aa6d;"> Rs.5100.00</div></div>
                <div id="f1"> So far you've donated <div  style="color: #04aa6d;">  Rs.14100.00</div> and made <div style="color: #ff625a;">109</div> Smiles..</div> 
            </div>
        </div>
        <div class="r3">
            <div id="s1">
                <div id="h1">
                    My funds
                </div>
                <div class="funds">
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
                                        <p class="delete">&#128465;</p>
                                        <!-- <p class="done">&#x2714;</p> -->
                                        <a class="move" href="<?=ROOT?>singlefund/<?=str_replace("funds","",$row->table); ?>/<?=$row->ID?>"> &#x279C;</a> 
                                    </div>
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>  
                    <?php endif; ?>
                </div>
            </div>
            <div id="s1">
                <div id="h1">
                    My posts
                </div>
                <div class="posts">
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
                                        <p class="delete">&#128465;</p>
                                        <p class="done">&#x2714;</p>
                                        <a class="move" href="<?=ROOT?>singlepost/<?=str_replace("posts","",$row->table); ?>/<?=$row->ID?>"> &#x279C;</a> 
                                    </div> 
                                <?php endforeach; ?>  
                            <?php endif; ?>
                        <?php endforeach; ?>  
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>   
</body>
