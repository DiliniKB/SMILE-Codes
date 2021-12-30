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
        document.getElementById("mem").style.display = "block";
    }

    function closeForm() {
        document.getElementById("mem").style.display = "none";
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
                <div>
                    <label for="District" name="District" required></label>
                    <select class="input_form" name="District" id="menu4" placeholder="District" required>
                        <option value="none">Choose Your District</option>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matale">Matale</option>
                        <option value="Matara">Matara</option>
                        <option value="Moneragala">Moneragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara_Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                </div>
                <input class="input_form" type="text" placeholder="Item" name="Item" required>
                <input class="input_form" type="text" placeholder="Description" name="description" maxlength="150" required>

                <div>
                    <label for="type" name="type" required></label>
                    <select class="input_form" id="menu4" name="type" required>
                        <option name="type" value="Giftee">Giftee</option>
                        <option name="type" value="Donor">Donor</option>
                    </select>
                </div>

                <div style="display: inline; left:50%;">
                    <input class="input_radio" type="radio" onclick="info()" name="usertype" required>
                    <label class="RB">Team</label>
                    <input class="input_radio" type="radio" name="usertype"  onclick="closeForm()" required>
                    <label class="RB">Individual</label>
                    
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

                <!--<form method="post" id="members">-->
                <div class="field" id="mem">
                        <input class="member" type="email" placeholder="Member1 email" name="member1" >
                        <input class="member" type="email" placeholder="Member2 email" name="member2" >
                        <input class="member" type="email" placeholder="Member3 email" name="member3" >
                </div>
                <!---<button id="enter" type="submit" onclick="closeForm()" name="memberAdd">DONE</button>--->
            </form>

</body>   
</html>