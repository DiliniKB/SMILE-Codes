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
}

?>