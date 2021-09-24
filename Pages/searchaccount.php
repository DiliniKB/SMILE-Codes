<head>
    <meta charset="utf-8">
      
    <title>Search Accounts</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Delius&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=?????&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../CSS/stylessearchaccount.css">
    <link rel="stylesheet" href="../CSS/stylesSmallheader.css">
        
        
</head>
<body>

    <script type='text/javascript'>
        function openForm() {
            document.getElementById("SForm").style.display = "block";
        } 
        function closeForm() {
            document.getElementById("SForm").style.display = "none";
        }
    </script> 

    <div class="bg2" onclick="closeForm()">
    </div>
            
    <?php 
        $IPATH= "../";
        include($IPATH."assets/PHP/header2.php")
    ?>

    <div class="Cat">Search Account</div>

    <!--filter -->    
    <div class="form-popup" id="SForm">
        <form action="/action_page.php" class="form-container">
            <label for="User-Type">Account Type</label>
            <select class="User-Type" data-filter-group="search for a type">
                <option value=".Donor" selected="selected">Donor</option>
                <option value=".Giftee">Giftee</li>       
            </select><br><br>

            <label for="location">Location</label>
            <input type="text" name="location" class="inputF"><br><br>
            <button type="submit" class="enter" onclick="closeForm()">ENTER</button><br>
        </form>
    </div>

    <div class="account-search">
        
        <form method="GET" action="viewaccount.php" class="search">
            <input class="bar" type="text" name="search-box">
            <input class="search-icon" type="image" src="images/MagnifyingGlass2.png" name="submit" alt="submit"/>
        </form>
        
    </div>
    <div>
        <img id="filterButton" src="images/Sliders.png" onclick="openForm()">
    </div>


</body>   
</html>