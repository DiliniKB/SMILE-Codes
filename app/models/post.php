<?php

Class Post{

    function create_post($POST,$FILES,$data)
    {
        $DB = new Database();
        $_SESSION['error'] = '';
        $table = $data['table'];
        $valid = 0;

        $allowed[] = "image/jpeg";
        // $valid = (isset($_POST['amount'])&& isset($_POST['keywords'])&& isset($_POST['town'])&& isset($_POST['District'])&&isset($_POST['Title'])&& isset($_POST['description'])&& isset($_POST['accNo'])&& isset($_POST['bankName'])&&isset($_POST['brachName'])&& isset($_POST['accountHolder'])&& isset($_POST['usertype'])&& isset($_FILES['file']));

        // echo $valid;

        if($_POST)
        {
            if($FILES['file']['name']!="" && $FILES['file']['error']== 0 )
            {
                $folder = $data['table']."/";
                $photoname = clean(date("Y-m-d H:i:s"));
                $destination = "../public/assets/images/mainPages/".strtolower($folder).$photoname;
                move_uploaded_file($FILES['file']['tmp_name'],$destination);
            }
            else 
            {
                $_SESSION['error'] = "This file could not be uploaded";
            }

            if($_SESSION['error'] == "")
            {
                $arr['member_ID1']=$arr['member_ID2']=$arr['member_ID3'] = '0';
                $arr['keywords'] = $_POST['keywords'];
                $arr['town'] = $_POST['town'];
                $arr['district'] = $_POST['District'];
                $arr['item'] = $_POST['Item'];
                $arr['description'] = $_POST['description'];
                $arr['posttype'] = $_POST['type'];
                if (!empty($_POST['Anonymous'])) {
                    $arr['anonymous'] = $_POST['Anonymous'];
                }else{
                    $arr['anonymous'] = "off";
                }
                $arr['image'] = $photoname;
                $arr['date'] = date("Y-m-d");
                $arr['user'] = $_SESSION['user_id'];
                $arr['status'] = 0;

                $query = "INSERT INTO $table  
                (picture ,town, district, item, content, post_type, keywords, user_ID,member_ID1,member_ID2,member_ID3,visibility,create_date,status) 
                VALUES 
                (:image,:town,:district, :item, :description, :posttype,:keywords,:user,:member_ID1,:member_ID2,:member_ID3,:anonymous,:date,:status)";
            
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
        $query = "SELECT * FROM $tablename where status = 0 ORDER BY ID DESC LIMIT $limit OFFSET $offset";
        // echo $query;

        $DB = new Database();
        $result = $DB->read($query);
        if(is_array($result))
        {
            return $result;
        }
        return false;
    }

    function view_post($data){

        // show($data);
         
        $tablename = strtolower($data['table']);
        $id = $data['id'];

        $query = "SELECT * FROM $tablename WHERE ID = $id ";

        $DB = new Database();
        $result = $DB->read($query);

        if(is_array($result))
        {
            return $result[0];
        }
        return false;

    }

    function report($data){

        $DB = new Database();
        $_SESSION['error'] = '';

        $tablename = $data['table'];
        $arr['post'] = $data['post_id'];
        $arr['feedback'] = $data['feedback']['feedback'];
        $arr['user'] = $data['user_id'];
        $arr['date'] = date("Y-m-d H:i:s");
        $allowed = array("image/jpeg","image/png");

        for ($i=0; $i < count($data['photos']['photo']['name']); $i++) { 
            if($data['photos']['photo']['name'][$i]!="" && $data['photos']['photo']['error'][$i]== 0 && in_array($data['photos']['photo']['type'][$i],$allowed))
            {
                $folder1 = "uploads/reports/".$tablename;
                $folder2 = $folder1."/".$arr['post'];
                $folder3 = $folder2."/".$arr['user'];

                if (!file_exists($folder1)) {
                    mkdir($folder1, 0777, true);
                }
                if (!file_exists($folder2)) {
                    mkdir($folder2, 0777, true);
                }
                if (!file_exists($folder3)) {
                    mkdir($folder3, 0777, true);
                    $desination = $folder3."/".$data['photos']['photo']['name'][$i];
                }
                else{ 
                    $desination = $folder3."/".$data['photos']['photo']['name'][$i];
                }
                echo $desination;
                move_uploaded_file($data['photos']['photo']['tmp_name'][$i],$desination);
            }else{
                $_SESSION['error'] = "This file could not be uploaded";

            }
        }

        echo $_SESSION['error'];

        if (!$_SESSION['error']) {
            $query = "INSERT INTO $tablename (post_ID,user_ID,date,feedback) VALUES (:post,:user,:date,:feedback)";

            $result = $DB->write($query,$arr);

            if ($result) {
                header("Location:".ROOT."funds/Medical");
                die;
            }
        }

    }

    function get_search_and_sort($data,$table){
        $DB = new Database();
        $_SESSION['error']="";
        
        $k = $data['keyword'];
        $l = $data['location'];
        $s = $data['sort'];
        $sign = "%";
        $keywords = $sign.$k.$sign;
        $location = $sign.$l.$sign;
        
        switch ($s){
            case 1:
                $order = 'create_date DESC';
                break;
            case 2:
                $order = 'create_date ASC';
                break;
            default:
                $order = 'id ASC';   
        }

        $query = "SELECT * FROM $table WHERE (town LIKE '$location' OR district LIKE '$location') AND keywords LIKE '$keywords' AND status = 0 ";
        $data = $DB->read($query); 
        
        if ($data){
            return $data;
        }
        return false;
    }

    function enter_comment($table,$postId,$comment,$user){
        $DB = new Database();
        $_SESSION['error']=""; 
        $table = $table."_comment";
        $arr['date'] = date("Y-m-d");
        $arr['time'] = date("H:i:s");
        $arr['comment'] = $comment;
        $arr['user'] = $user;
        $arr['postId'] = $postId;
        $query = "INSERT INTO $table (post_ID,user_ID,date,time,comment) VALUES (:postId,:user,:date,:time,:comment)";

        $result = $DB->write($query,$arr);
        
        if($result){
            return true;
        }
        else {
            return false;
        }

    }
    function load_comments($table, $postId){
        $DB = new Database();
        $_SESSION['error']=""; 
        $table = $table."_comment";
        $query = "SELECT * FROM $table INNER JOIN registered_user ON $table.user_ID = registered_user.user_ID WHERE post_ID = $postId ORDER BY date AND time LIMIT 20";
        $result = $DB->read($query);

        if($result){
            return $result;
        }
        else {
            return false;
        }

    }

    function delete_post($table, $id)
    {
        $DB = new Database();
        $_SESSION['error']="";
        $query = "DELETE FROM $table WHERE ID=$id";
        $DB->write($query); 
    }
}


?>
