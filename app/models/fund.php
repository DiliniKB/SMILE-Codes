<?php

Class fund{

    function create_fund($POST,$FILES,$data){

        $DB = new Database();
        $_SESSION['error'] = '';
        $table = $data['table'];
        $valid = 0;

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
                $arr['member_ID1']=$arr['member_ID2']=$arr['member_ID3'] = '1';
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
                $arr['image'] = $FILES['file']['name'];
                $arr['date'] = date("Y-m-d");

                $query = "INSERT INTO $table  
                (picture,town,district,title,content,amount,keywords,accountnumber,accountholder,bankname,branchname,create_date,member_ID1,member_ID2,member_ID3) 
                VALUES 
                (:image,:town,:district,:title,:description,:amount,:keywords,:accNo,:accountHolder,:bankName,:branchName,:date,:member_ID1,:member_ID2,:member_ID3)";
            
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

    function view_all_funds($cat){
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 12;
        $offset = ($page_number - 1) * $limit;
        $tablename = strtolower($cat."fund");
        $query = "SELECT * FROM $tablename ORDER BY id DESC LIMIT $limit OFFSET $offset";
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
}

?>
