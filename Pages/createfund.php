<?php
    $cat= trim($_GET['cat'],"'");   
?>

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


<head>
    <meta charset="utf-8">
    <title>Create Funds</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Delius&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../CSS/stylesSmallheader.css">
    <link rel="stylesheet" href="../CSS/stylescreatefunds.css">
        
</head>
<body>
           
    <div class="none" onclick="closeForm()"></div>
    <?php 
        $IPATH= "../";
        include($IPATH."assets/PHP/header3.php")
    ?>

    <div class="Cat"><?php echo $cat;?></div>
    <a id="ButtonF" href="#" >Start a Fund</a>
    <a id="ButtonM" href="createpost.php?cat=<?php echo $cat;?>">Create Post</a>

    <div id="form">
        <div class="row">    
            <form action="functions/insertfund.php?cat=<?php echo $cat;?>" method="post" style="margin:0px;" class="column" id="inputs"> 
                <input class="input_form" type="currency" placeholder="Rs." name="amount" required>
                <input class="input_form" type="text" placeholder="Keywords" name="keywords">
                <input class="input_form" type="text" placeholder="Town" name="town" required>
                <input class="input_form" type="text" placeholder="District" name="District" required>
                <input class="input_form" type="text" placeholder="Title of the Fund" name="Title" required>
                <input class="input_form" type="text" placeholder="Description" name="Description" required>
                <input class="input_form" type="text" placeholder="Account Number" name="accNo" required>
                <input class="input_form" type="text" placeholder="Name of the Bank" name="bankName" required>
                <input class="input_form" type="text" placeholder="Name of the Branch" name="branchName" required>
                <input class="input_form" type="text" placeholder="Account Holder" name="accountHolder" required>
        
                <div style="display: inline;">
                    <input class="input_radio" type="radio" name="usertype" required>
                    <label class="RB">Individual</label>
                    <input class="input_radio" type="radio" onclick="info()" name="usertype" required>
                    <label class="RB">Team</label>
                </div>
                <button id="enter" type="submit">ENTER</button>
                <div class="column">
                    <div class="uploadBox">
                        <img id="output_image"/>
                    </div>
                    <input type="file" class="custom-file-input" accept="image/*" onchange="preview_image(event)" name="photo">
                </div>
            </form>
        </div>
        <form id="members">
        <div class="field" id="mem">
            <input class="member" type="text" placeholder="Search Member1" name="member1" >
            <input class="member" type="text" placeholder="Search Member2" name="member2" >
            <input class="member" type="text" placeholder="Search Member3" name="member3" >
        </div>
        <button id="enter" type="submit" onclick="closeForm()">DONE</button>   
    </div>
    </form>       
    

      
</body>   
</html>
