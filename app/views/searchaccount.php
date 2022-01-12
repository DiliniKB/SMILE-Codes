<?php $this->view("footers/footerBlue",$data);?>
<?php $this->view("header",$data);?>
<head>
    <meta charset="utf-8">
      
    <title>Search Accounts</title>

    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylessearchaccount.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">
        
        
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
        <form method="POST" class="search" action="<?=ROOT?>/account/searchaccount">
            <input class="bar" type="text" name="search-box">
            <button type="submit"><ion-icon name="search-outline" class="search-icon"></ion-icon></button>
        </form>
    </div>
    
    <div class="container">
        <?php if(is_array($data['users'])): ?>
            <?php foreach($data['users'] as $user): ?>
                <a class="user" href='<?=ROOT?>account/<?=$user->user_ID ?>'>
                    <ion-icon name="person-circle-outline" class="user-icon"></ion-icon>
                    <?=ucfirst($user->first_name)." ".ucfirst($user->last_name)?>
                </a>
            <?php endforeach; ?>  
        <?php endif; ?>      
    </div>

    <?php $this->view("footers/footerfiles");?>
</body>   
</html>