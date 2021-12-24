<?php $this->view("header",$data);?>
<head>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylescreateposts.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylespopup.css">

    <script defer type="text/javascript" src="<?=ASSETS?>/js/popup.js"></script>
    <script defer type="text/javascript" src="<?=ASSETS?>/js/postValidation.js"></script>

    
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
            

    <div class="none" onclick="closeForm()"></div>

    <div class="Cat"><?=$data['category']?></div>
    <a id="ButtonF" href="<?=ROOT?>/createfunds/<?=$data['category']?>">Start a Fund</a>
    <a id="ButtonM" href="#">Create Post</a>

    <div id="form">
        <div class="row">    
            <form method="post" style="margin:0px;" class="column" enctype="multipart/form-data"> 
                <input class="input_form" type="text" placeholder="Keywords" name="keywords" required>
                <input class="input_form" type="text" placeholder="Town" name="town" required>
                <input class="input_form" type="text" placeholder="District" name="District" required>
                <input class="input_form" type="text" placeholder="Item" name="Item" required>
                <input class="input_form" type="text" placeholder="Description" name="description" required>

                <div>
                    <label for="type" name="type" required></label>
                    <select class="input_form" id="menu4" name="type" required>
                        <option name="type" value="Giftee">Giftee</option>
                        <option name="type" value="Donor">Donor</option>
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

                <button id="enter" type="submit" name="create" >ENTER</button>        
            
           
            <div class="column">
                <div class="uploadBox">
                    <img id="output_image"/>
                </div>
                <input type="file" class="custom-file-input" onchange="preview_image(event)" name="file" >                    
            </div>
        </div>         
    </div>  
    
    <form id="members">
        <div class="field" id="mem">
            <input class="member" type="text" placeholder="Member1 email" name="member1" >
            <input class="member" type="text" placeholder="Member2 email" name="member2" >
            <input class="member" type="text" placeholder="Member3 email" name="member3" >
        </div>
        <button id="enter" type="submit" onclick="closeForm()">DONE</button>
    </form>  
    
    </form>

</body>   
</html>