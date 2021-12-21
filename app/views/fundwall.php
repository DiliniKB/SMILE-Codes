<?php $this->view("header",$data);?>
<head>
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesFundWall.css">            
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
    
    <!-- <div class="bg2" onclick="closeForm()"> -->
    <!-- </div> -->
    

    <!--selectors-->
    <div class="Cat"><?=$data['page_title']?></div>
    <!-- <a id="ButtonF" href="#" >Fundraising</a>
    <a id="ButtonM" href="<?=ROOT?>posts/<?=$data['category']?>" >Material Sharing</a> -->

    <!--filter -->
    
    <img id="filterButton" src="<?=ASSETS?>/Images/mainPages/Sliders.png" onclick="openForm()">

    <div class="form-popup" id="SForm">
        <form action="/action_page.php" class="form-container">
            <label for="sortBy">Sort By</label>
            <select class="Sort" data-filter-group="SortingOptions">
                <option value=".trending" selected="selected">Trending</option>
                <option value=".recent">Recent</li>
                <option value=".oldest">Oldest</li>
                <option value=".closeToGoal">Close to goal</li>
                <option value=".farFromGoal">Far from goal</li>         
            </select><br><br>

            <label for="location">Location</label>
            <input type="text" name="location" class="inputF"><br><br>

            <label for="keyword">Keyword</label>
            <input type="text" name="keyword" class="inputF"><br><br>

            <button type="submit" class="enter" onclick="closeForm()">ENTER</button><br>
        </form>
    </div>
   
    
    <!--items-->
    <div class="container"> 
        <?php if(is_array($data['funds'])): ?>
            
            <?php foreach($data['funds'] as $row): ?>
                <a class=fpost href="<?=ROOT?>singlefund/<?=$data['category']?>/<?=$row->ID?>">
                    <img src= "<?=ASSETS?>Images/mainPages/<?=$data['table']?>/<?=$row->picture?>" class="photo">
                    <div>
                        <div class="town"><?=$row->town?></div>
                        <div class="district"><?=$row->district?></div>
                    </div>
                    <div class="title"><?=$row->title?></div>
                    <progress value="<?=$row->filled?>" max="<?=$row->amount?>"></progress>
                    <div class="RaisedOf">Rs <?=$row->filled?> raised of Rs<?=$row->amount?></div>
                </a>
            <?php endforeach; ?>  
        <?php endif; ?>  
    </div>

    <!--add new -->
    <a href="<?=ROOT?>/createfunds/<?=$data['category']?>">
        <img id="plus" src="<?=ASSETS?>Images/mainPages/Plus.png">
    </a>
</body>
</html>