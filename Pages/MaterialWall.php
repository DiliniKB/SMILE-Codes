<?php
    require "../assets/PHP/dbconfig.php";
    require "../assets/PHP/display_items.php";

    $cat= trim($_GET['cat'],"'");
    $table = str_replace("'","",$_GET['tbl']);
    $tableF = str_replace("post","fund",$table);

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
      
    <title>MW</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../CSS/stylesSmallheader.css">
    <link rel="stylesheet" href="../CSS/stylesMW.css">         
        
</head>

<body>
        
    <script>
        function openForm() {
            document.getElementById("SForm").style.display = "block";
        }
        
        function closeForm() {
            document.getElementById("SForm").style.display = "none";
        }
        function openChat() {
            document.getElementById("Chat").style.display = "flex";
        }
        
        function closeChat() {
            document.getElementById("Chat").style.display = "none";
        }
    </script>
    
    <div class="bg2" onclick="closeForm();closeChat()"></div>
                      
    <?php 
        $IPATH= "../";
        include($IPATH."assets/PHP/header2.php")
    ?>

    
    <!--selectors-->
    <div class="Cat"><?php echo $cat;?></div>
    <a id="ButtonF" href="FundWall.php?tbl= <?php echo $tableF;?>&cat= <?php echo $cat;?>">Fundraising</a>
    <a id="ButtonM" href="#" >Material</a>

    <!--filter -->
    <img id="filterButton" src="<?php echo $IPATH?>/Images/mainPages/Sliders.png" onclick="openForm()">

    <div class="form-popup2" id="SForm">
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
        <?php
            display_itemsM($connection,$table);
        ?>        
    </div>

    <!--add new -->
    <a href="createpost.php?cat=<?php echo $cat;?>">
        <img id="plus" src="<?php echo $IPATH?>/Images/mainPages/Plus.png">
    </a>

    
</body>
</html>