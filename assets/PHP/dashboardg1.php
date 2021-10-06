<?php

    require_once('dbconfig.php');

    function display_itemsF($connection){
       
        $query = "select * from medicalfunds limit 3 ";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_array($result)){
            echo '    
                <a class=fpost href=viewfund.php>
                    <img src= "../Images/mainPages/medicalfunds/image'.$row[1].'" class="photo">
                    <div>
                        <div class="town">'.$row[2].',</div>
                        <div class="district">'.$row[3].'</div>
                    </div>
                    <div class="title">'.$row[4].'</div>
                    <progress value="'.$row[7].'" max="'.$row[6].'"></progress>
                    <div class="RaisedOf">Rs'.$row[7].' raised of Rs'.$row[6].'</div>
                    <div class="done">Completed</div>
                    <div class="delete" href="#">Delete</div>
                </div>';
            }
        }
    }

    function display_itemsM($connection){
        
        $query = "select * from medicalposts limit 1";
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_array($result)){
            echo ' 
                <div class=fpost>
                    <img src= "../Images/mainPages/medicalposts/'.$row[1].'" class="photo">
                    <div class="location">
                        <div class="town">'.$row[2].',</div>
                        <div class="district">'.$row[3].'</div>
                    </div>
                    <div class="title">'.$row[4].'</div>
                    <div class="done">Completed</div>
                    <div class="delete" href="#">Delete</div>
                </div>';
            }
        }
    }

?>