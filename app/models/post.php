<?php

Class Post{
    function create_post($POST,$FILES,$data)
    {
        $DB = new Database();
        $_SESSION['error'] = '';
        $table = $data['table'];

        $allowed[] = "image/jpeg";
        // $valid = (isset($_POST['amount'])&& isset($_POST['keywords'])&& isset($_POST['town'])&& isset($_POST['District'])&&isset($_POST['Title'])&& isset($_POST['description'])&& isset($_POST['accNo'])&& isset($_POST['bankName'])&&isset($_POST['brachName'])&& isset($_POST['accountHolder'])&& isset($_POST['usertype'])&& isset($_FILES['file']));

        // echo $valid;

        if($_POST)
        {
            if($FILES['file']['name']!="" && $FILES['file']['error']== 0 && in_array($FILES['file']['type'],$allowed))
            {
                $folder = $data['table']."/";
                $destination = "../public/assets/images/mainPages/".strtolower($folder).$FILES['file']['name'];
                move_uploaded_file($FILES['file']['tmp_name'],$destination);
            }
            else 
            {
                $_SESSION['error'] = "This file could not be uploaded";
            }

            if($_SESSION['error'] == "")
            {
                $arr['keywords'] = $_POST['keywords'];
                $arr['town'] = $_POST['town'];
                $arr['District'] = $_POST['District'];
                $arr['Title'] = $_POST['Title'];
                $arr['posttype'] = $_POST['type'];
                $arr['anonymous'] = $_POST['Anonymous'];
                $arr['image'] = $FILES['file']['name'];
                $arr['date'] = date("Y-m-d");
                $arr['user'] = 1;

                $query = "INSERT INTO $table  
                (picture ,town, district, content, post_type, keywords, user_ID,member_ID_1,member_ID_2,member_ID_3,visibility,created_date) 
                VALUES 
                (:image,:town,:district,:title,:posttype,:keywords,:user,:member_ID1,:member_ID2,:member_ID3,:anonymous,:date)";
            
                echo $query;    

                $result = $DB->write($query,$arr);

                if ($result) {
                    header("Location:".ROOT."home");
                    die;
                }else{
                    $_SESSION['error']="wrong username or password";                    
                }
            }
            

        }
        
    }

    function view_all_posts($cat){
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 12;
        $offset = ($page_number - 1) * $limit;
        $tablename = strtolower($cat."post");
        $query = "SELECT * FROM $tablename ORDER BY ID DESC LIMIT $limit OFFSET $offset";
        // echo $query;

        $DB = new Database();
        $data = $DB->read($query);
        if(is_array($data))
        {
            return $data;
        }
        return false;
    }

    function view_post(){
        

    }
}

?>