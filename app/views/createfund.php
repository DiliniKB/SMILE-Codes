<?php $this->view("header",$data);?>
<script type='text/javascript'>

    function info(){
        document.getElementById("mem").style.display = "block";
    }

    /*function popup(){
        document.getElementById("popup1").style.visibility = "visible";
    }*/

    function closeForm() {
        document.getElementById("mem").style.display = "none";
        //document.getElementById("popup1").style.visibility = "hidden";
    }
</script>     


<head>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylescreatefunds.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylespopup.css">

    <script defer type="text/javascript" src="<?=ASSETS?>/js/createfund.js"></script>
    <script defer type="text/javascript" src="<?=ASSETS?>/js/preview.js"></script>
      
</head>
<body>
           
    <div class="none" onclick="closeForm()"></div>

    <div class="Cat"><?=$data['category']?></div>
    <a id="ButtonF" href="#" >Start a Fund</a>
    <a id="ButtonM" href="<?=ROOT?>/createposts/<?=$data['category']?>">Create Post</a>


    <div id="form">
        <div class="row">          
            <form method="post" style="margin:0px;" class="column" id="inputs" enctype="multipart/form-data"> 
                <input class="input_form" type="number" placeholder="Rs." name="amount" min="100" max="10000000" required>
                <input class="input_form" type="text" placeholder="Keywords" maxlength="30" name="keywords">
                <input class="input_form" type="text" placeholder="Town" name="town" required>
                <div>
                    <label for="District" name="district" required></label>
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
                <input class="input_form" type="text" placeholder="Title of the Fund" maxlength="30" name="Title" required>
                <input class="input_form" type="text" placeholder="Description" name="description" maxlength="150" required>
                <input class="input_form" type="text" placeholder="Account Number" name="accNo" maxlength="20" <?php if(!empty($_SESSION['account_number'])){echo "value=". $_SESSION['account_number']."";}?> required>
                <input class="input_form" type="text" placeholder="Name of the Bank" name="bankName" maxlength="15" <?php if(!empty($_SESSION['bank_name'])){echo "value=". $_SESSION['bank_name']."";}?> required>
                <input class="input_form" type="text" placeholder="Name of the Branch" name="branchName" maxlength="15" <?php if(!empty($_SESSION['branch_name'])){echo "value=". $_SESSION['branch_name']."";}?> required>
                <input class="input_form" type="text" placeholder="Account Holder" name="accountHolder" maxlength="15" <?php if(!empty($_SESSION['fname'])){echo "value=". $_SESSION['fname']."";}?> required>
        
                <div style="display: inline;">
                    <input class="input_radio" type="radio" name="usertype">
                    <label class="RB">Individual</label>
                    <input class="input_radio" type="radio" onclick="popup()" name="usertype">
                    <label class="RB" onclick="popup()" >Team</label>
                </div>
                <button id="enter" type="submit" name="create">ENTER</button>
                <div class="box">
                </div>

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
        </div>  
    </div>
</body>   
</html>
