<?php

Class fund{

    function create_fund($POST,$FILES,$data){

        $DB = new Database();
        $_SESSION['error'] = '';
        $table = $data['table'];
        $valid = 0;

        $allowed[] = "image/jpeg";
        // $valid = (isset($_POST['amount'])&& isset($_POST['keywords'])&& isset($_POST['town'])&& isset($_POST['District'])&&isset($_POST['Title'])&& isset($_POST['description'])&& isset($_POST['accNo'])&& isset($_POST['bankName'])&&isset($_POST['brachName'])&& isset($_POST['accountHolder'])&& isset($_POST['usertype'])&& isset($_FILES['file']));

        // && in_array($FILES['file']['type'],$allowed)
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
                $arr['member_ID1']=$arr['member_ID2']=$arr['member_ID3'] = 0;
                $arr['amount'] = $POST['amount'];
                $arr['keywords'] = $POST['keywords'];
                $arr['town'] = $POST['town'];
                $arr['district'] = $POST['District'];
                $arr['title'] = $POST['Title'];
                $arr['description'] = $POST['description'];
                $arr['accNo'] = $POST['accNo'];
                $arr['bankName'] = $POST['bankName'];
                $arr['branchName'] = $POST['branchName'];
                $arr['accountHolder'] = $POST['accountHolder'];
                $arr['image'] = $photoname;
                $arr['date'] = date("Y-m-d");
                $arr['user'] = $_SESSION['user_id'];

                if(array_key_exists('member1',$data)){
                    $arr['member_ID1'] = $data['member1'];
                }

                if(array_key_exists('member2',$data)){
                    $arr['member_ID2'] = $data['member2'];
                }

                if(array_key_exists('member3',$data)){
                    $arr['member_ID3'] = $data['member3'];
                }                
                
                $query = "INSERT INTO $table  
                (picture,town,district,title,content,amount,keywords,accountnumber,accountholder,bankname,branchname,create_date,user_ID,member_ID1,member_ID2,member_ID3) 
                VALUES 
                (:image,:town,:district,:title,:description,:amount,:keywords,:accNo,:accountHolder,:bankName,:branchName,:date,:user,:member_ID1,:member_ID2,:member_ID3)";

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

    function view_all_funds($cat){
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 12;
        $offset = ($page_number - 1) * $limit;
        $tablename = strtolower($cat."fund");
        $query = "SELECT * FROM $tablename WHERE amount!=filled ORDER BY id DESC LIMIT $limit OFFSET $offset";
        // echo $query;

        $DB = new Database();
        $result = $DB->read($query);
        if(is_array($result))
        {
            return $result;
        }
        return false;
    }

    function view_fund($data){

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

    function payment_verification(){
        
    }

    function report($data){

        $DB = new Database();
        $_SESSION['error'] = '';

        $tablename = $data['table'];
        $arr['fund'] = $data['fund_id'];
        $arr['feedback'] = $data['feedback']['feedback'];
        $arr['user'] = $data['user_id'];
        $arr['date'] = date("Y-m-d H:i:s");
        $allowed = array("image/jpeg","image/png");

        for ($i=0; $i < count($data['photos']['photo']['name']); $i++) { 
            if($data['photos']['photo']['name'][$i]!="" && $data['photos']['photo']['error'][$i]== 0 && in_array($data['photos']['photo']['type'][$i],$allowed))
            {
                $folder1 = "uploads/reports/".$tablename;
                $folder2 = $folder1."/".$arr['fund'];
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
            $query = "INSERT INTO $tablename (fund_ID,user_ID,date,feedback) VALUES (:fund,:user,:date,:feedback)";

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
            case 3:
                $order = '(amount-filled) DESC';
                break;
            case 4:
                $order = '(amount-filled) ASC';
                break;
            default:
                $order = 'id ASC';   
        }

        $query = "SELECT * FROM $table WHERE (town LIKE '$location' OR district LIKE '$location') AND keywords LIKE '$keywords' AND amount!= filled ORDER BY $order";
        $data = $DB->read($query); 
        
        if ($data){
            return $data;
        }
        return false;
    }

    function delete_fund($table, $id)
    {
        $DB = new Database();
        $_SESSION['error']="";
        $query = "DELETE FROM $table WHERE ID=$id";
        $DB->write($query); 
    }

    function get_leaderboard(){
        $DB = new Database();
        $_SESSION['error']="";
        $query = "SELECT * FROM registered_user ORDER BY donateAmount DESC LIMIT 5 ";
        $data = $DB->read($query); 
        
        if ($data){
            return $data;
        }
        return false;

    }

    function get_monthlyleaderboard(){
        $DB = new Database();
        $_SESSION['error']="";  
        $query = "SELECT * FROM animalcarefund_donate UNION SELECT * FROM childrenfund_donate UNION SELECT * FROM educationfund_donate UNION SELECT * FROM medicalfund_donate UNION SELECT * FROM otherfund_donate UNION SELECT * FROM seniorcarefund_donate where date BETWEEN 2021-11-28 AND 2021-12-28 ORDER BY amount DESC LIMIT 3; ";
        $data = $DB->read($query); 
        

            if(isset($data))
            {
                return $data;
            }
            return false;

    }
    function get_rankers($arr){
        $DB = new Database();
        $_SESSION['error']="";  
        $query = "SELECT * FROM registered_user where user_ID = '$arr '";
        $data = $DB->read($query); 

            if(isset($data))
            {
                return $data;
            }
            return false;
    }

    function enter_comment($table,$fundId,$comment,$user){
        $DB = new Database();
        $_SESSION['error']=""; 
        $table = $table."_comment";
        $arr['date'] = date("Y-m-d");
        $arr['time'] = date("H:i:s");
        $arr['comment'] = $comment;
        $arr['user'] = $user;
        $arr['fundId'] = $fundId;
        $query = "INSERT INTO $table (fund_ID,user_ID,date,time,comment) VALUES (:fundId,:user,:date,:time,:comment)";

        $result = $DB->write($query,$arr);
        
        if($result){
            return true;
        }
        else {
            return false;
        }

    }

    function load_comments($table, $fundId){
        $DB = new Database();
        $_SESSION['error']=""; 
        $table = $table."_comment";
        $query = "SELECT * FROM $table WHERE fund_ID = $fundId ORDER BY date AND time LIMIT 20";
        $result = $DB->read($query);

        if($result){
            return $result;
        }
        else {
            return false;
        }

    }
}

?>