<?php
    session_start();
    $cat= trim($_GET['cat'],"'");
    $table = $cat."posts";
?>
<head>
    <meta charset="utf-8">
      
    <title>Create Posts</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../CSS/stylescreatepost.css">
    <link rel="stylesheet" href="../CSS/stylesSmallheader.css">
    <script type='text/javascript'>
        function preview_image(event) 
        {
         var reader = new FileReader();
         reader.onload = function()
         {
          var output = document.getElementById('output_image');
          output.src = reader.result;
         }
         reader.readAsDataURL(event.target.files[0]);
        }

    function info() {
        document.getElementById("members").style.display = "block";
    }

    function closeForm() {
        document.getElementById("members").style.display = "none";
    }
</script> 
        
</head>
<body>
            
    <?php 
        $IPATH= "../";
        include($IPATH."assets/PHP/header0.php")
    ?>

    <div class="none" onclick="closeForm()"></div>

    <div class="Cat"><?php echo $cat;?></div>
    <a id="ButtonF" href="createfund.php?cat=<?php echo $cat;?>">Start a Fund</a>
    <a id="ButtonM" href="#">Create Post</a>

    <div id="form">
        <div class="row">    
            <form action="action_page.php" method="post" style="margin:0px;" class="column"> 
                <input class="input_form" type="text" placeholder="Keywords" name="keywords" required>
                <input class="input_form" type="text" placeholder="Town" name="town" required>
                <input class="input_form" type="text" placeholder="District" name="District" required>
                <input class="input_form" type="text" placeholder="Title" name="Title" required>

                <div>
                    <label for="Type" required></label>
                    <select class="input_form" id="menu4" required>
                        <option value="Giftee">Giftee</option>
                        <option value="Donor">Donor</option>
                    </select>
                </div>

                <div style="display: inline;">
                    <input class="input_radio" type="radio" name="usertype" required>
                    <label class="RB">Individual</label>
                    <input class="input_radio" type="radio" onclick="info()" name="usertype" required>
                    <label class="RB">Team</label>
                </div>

                <div class="input_form" id="anon" >
                    <input type="checkbox" name="Anonymous" > Anonymous
                </div>

                <button id="enter" type="submit">ENTER</button>        
            </form>
           
            <div class="column">
                <input type="file" class="custom-file-input" accept="image/*" onchange="preview_image(event)">
                <div class="uploadBox">
                    <img id="output_image"/>
                </div>
            </div>
        </div>         
    </div>  
    
    <form id="members">
        <div class="field" id="mem">
            <input class="member" type="text" placeholder="Search Member1" name="member1" >
            <input class="member" type="text" placeholder="Search Member2" name="member2" >
            <input class="member" type="text" placeholder="Search Member3" name="member3" >
        </div>
        <button id="enter" type="submit" onclick="closeForm()">DONE</button>
    </form>       

</body>   
</html>
