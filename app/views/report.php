<?php $this->view("footers/footerRed",$data);?>
<?php $this->view("header",$data);?>
   
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesfooter.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesreport.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">
    
    <script type="text/javascript" src="../assets/Scripts/report.js"></script>

        
</head>
<body>
            
    <div class="none" onclick="closeForm()"></div>

    <form class="container" method="post" id="inputs" enctype="multipart/form-data"> 
        <div class="column">
            <textarea type="text" placeholder="Enter Your Feedback Here" name="feedback" id="feedback"></textarea>
        </div>
        <div class="column">
            <input id="fileupload" type="file" name="photo" multiple="multiple" />
            <div class="uploadBox" id="preview">
                <div id="dvPreview"></div>
            </div>
            <button id="enter" type="submit" name="report">Report</button>
        </div>
        <!-- <input id="file-input" type="file" class="custom-file-input" multiple> -->
        <!-- <div id="preview"></div> -->
        <!-- <div class="uploadBox" id="preview">
                    <img id="output_image"/>
        </div> -->
    </form>        


</body>   
</html>