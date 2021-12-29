<?php $this->view("header",$data);?>
<head>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylescreateposts.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylespopup.css">

    <script defer type="text/javascript" src="<?=ASSETS?>/js/popup.js"></script>
    <script defer type="text/javascript" src="<?=ASSETS?>/js/createpost.js"></script>

    
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

                <div class="terms">
                    <input type="checkbox" required>
                    <p>I agree to all&nbsp;<p class="termsandC" onclick="displayterms()"> terms and conditions</p></p>
                </div>

                <!--<form method="post" id="members">-->
                <div class="field" id="mem">
                        <input class="member" type="email" placeholder="Member1 email" name="member1" >
                        <input class="member" type="email" placeholder="Member2 email" name="member2" >
                        <input class="member" type="email" placeholder="Member3 email" name="member3" >
                </div>
                <!---<button id="enter" type="submit" onclick="closeForm()" name="memberAdd">DONE</button>--->
    </form>
    <div class="termsbox" id="termsbox" >
        <div class="sub-topic">Our service: </div>
        <p>&nbsp;  SMILE is a platform that allow individual, entity or non-profit organization to post a fundraiser (“Fundraiser”) or post details about sharing goods to the SMILE Platform to accept monetary donations (“Donations”) from donors (“Donors”) on behalf of the beneficiary of the Fundraiser or Giftee(“Beneficiary”).  </p>
        <div class="sub-topic">Payment Processing: </div>
        <p>&nbsp;  SMILE will hold all the donations of a fund until the fund is accomplished. Fund will be settled to the fundraiser ensuring its accuracy by considering the reports from the other users. </p>
        <p>&nbsp;  SMILE uses third-party payment processing partners to process Donations for a Fundraiser. You acknowledge and agree that the use of Payment Processors are integral to the Services and that we exchange information with Payment Processors in order to facilitate the provision of Services.</p>
        <p>&nbsp;  Although there are no fees to Organizers to set up a Fundraiser, transaction fees, including credit and debit charges, are deducted from each donation (“Transaction Fees”).</p>
        <div class="sub-topic">Only a platform: </div>
        <p>&nbsp; The Services are administrative platforms only. SMILE facilitates the Donors to make donations to these Fundraisers or to other beneficiary parties. SMILE is not a broker, agent, financial institution, creditor or 501(c)(3) nonprofit corporation.</p>
        <p>&nbsp; SMILE facilitate users to share information about goods that they want to share or gain. Such a person who likes to share (‘Donor’) or a person who like to ask for any good (‘Giftee’) should mention it when creating the post. </p>
        <p>&nbsp; All information and content provided by SMILE relating to the Services is for informational purposes only, and SMILE does not guarantee the accuracy, completeness, timeliness or reliability of any such information or content.</p>
        <p>&nbsp; If a registered user recognizes any fake, misleading, potentially unreliable information regarding any fundraiser program or charity (“material sharing”) user can report the item providing details and evidence. After considering those we will decide whether that item should be removed or not. In such occasion, where a fund is removed from the system, all unsettled donation will be saved as each donor’s account balance. </p>
        <p>&nbsp; SMILE has no control over the conduct of, or any information provided by, a User and hereby disclaims all liability in this regard to the fullest extent permitted by applicable law. We do not guarantee that a Fundraiser will obtain a certain amount of Donations or any Donations at all. We do not endorse any Fundraiser, User, or cause and we make no guarantee, express or implied, that any information provided through the Services is accurate. We expressly disclaim any liability or responsibility for the outcome or success of any Fundraiser. You, as a Donor, must make the final determination as to the value and appropriateness of contributing to any User or Fundraiser.</p>
        <button onclick="displayterms()">CLOSE</button>
    </div>

</body>   
</html>