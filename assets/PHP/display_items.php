
<?php
    function display_itemsF($connection,$table){
        $table=str_replace(' ', '', $table);
        $query = "select * from ".$table;
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_array($result)){
            echo '    
                <a class=fpost href=viewfund.php>
                    <img src= "../Images/mainPages/'.$table.'/'.$row[1].'" class="photo">
                    <div>
                        <div class="town">'.$row[2].',</div>
                        <div class="district">'.$row[3].'</div>
                    </div>
                    <div class="title">'.$row[4].'</div>
                    <progress value="'.$row[7].'" max="'.$row[6].'"></progress>
                    <div class="RaisedOf">Rs'.$row[7].' raised of Rs'.$row[6].'</div>
                </a>';
            }
        }
    }

    function display_itemsM($connection,$table){
        $table=str_replace(' ', '', $table);
        $query = "select * from ".$table;
        $result = mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            while ($row=mysqli_fetch_array($result)){
            echo ' 
                <div class=fpost>
                    <img src= "../Images/mainPages/'.$table.'/'.$row[1].'" class="photo">
                    <div>
                        <div class="town">'.$row[2].',</div>
                        <div class="district">'.$row[3].'</div>
                    </div>
                    <div class="title">'.$row[4].'</div>
                    <div class="report">Report this post</div>
                    <img src="../Images/mainPages/ChatsCircle.png" class="chaticon" onclick="openChat()">
                    <!--Chat-->
                    <div class="form-popup" id="Chat">
                        <form action="mailto:contact@yourdomain.com" method="POST" enctype="multipart/form-data" name="EmailForm" class="popuptext">
                            <div class="r">
                                Name:
                                <div >
                                    <input type="text" size="19" name="Contact-Name" class="in">
                                </div>
                                
                            </div>
                            <div class="r">
                                Subject:
                                <div>
                                    <input type="text" size="19" name="Subject" class="in"><br>
                                </div>
                                
                            </div>
                            <div class="r">
                                Message:
                                <div >
                                    <textarea name="Contact-Message" rows="3″ cols="10″ class="in"></textarea>
                                </div>
                            </div>
                            <button type="submit" value="Submit" onclick="closeChat()">Send</button>
                            <!--https://blog.getform.io/how-to-create-an-html-form-that-sends-you-an-email/-->            
                        </form>  
                    </div>
                </div>';
            }
        }
    }


?>