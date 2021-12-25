<?php $this->view("header",$data);?>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/styles.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylessmileys.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/stylesBigheader.css">

        
</head>

<body>               

    <div class="container">
        <div class="head">  
            Donor of the Week    
        </div>

        <div class="week">  
            <?php
                display_weekF($connection);
            ?>  
        </div>

        
    </div>

    <div class="container2">
        <div class="head">  
            Best of the month   
        </div>

        <div class="month"> 
            <?php
                display_monthF($connection);
            ?>   
            
        </div>
        
        
    </div>

    <div class="container3">
        <div class="head">  
            Smile Makers
        </div>
        
        <div class="all"> 
            <?php
                display_bestF($connection);
            ?>   
            
        </div>
        
    </div>







</body>