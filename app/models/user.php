<?php

Class input_checks{
    function check_isset($keys){
        foreach($keys as $key){
            if(!isset($_POST[$key]) || empty($_POST[$key])){
                return false;
            }
        }
    
        return true;
    }

    function merror(&$data,$error, $type, $msg){

        $data['sys_error'] = $error;
        $data['sys_error_type'] = $type;
        $data['sys_error_msg'] = $msg;
    }

    function password_check(&$data){
        if(strlen($_POST['password']) < 8){
            $this->merror($data,1, 'error', 'Password is short');
            return false;
        }
    
        if($_POST['password'] != $_POST['password_confirm']){
            $this->merror($data,1, 'error', 'Passwords doesnt match');
            return false;
        }
        return true;
    }
    
    function phone_check(&$data){
        $regexp = '/^0\d{9}$/';
        if(!preg_match($regexp, $_POST['tpnum'])){
            $this->merror($data,1, 'error', 'Invalid phone number');
            return false;
        }
        return true;
    }
    
    function dob_check(&$data){
        $date = new DateTime($_POST['dob']);
        $now = new DateTime();
        $interval = $now->diff($date);
        if($interval->y < 18){
            $this->merror($data,1, 'error', 'You should be older than 18');
            return false;
        }
        return true;
    }
    
    function email_check(&$data, $DB){
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $this->merror($data,1, 'error', 'Invalid email address');
            return false;
        }
    
        $query = "SELECT * FROM registered_user WHERE email=?";
        $values = [$_POST['email']];

        $rows = $DB->read($query,$values);
    
        if(count($rows) != 0){
            $this->merror($data,1, 'error', 'Email is already exists');
            return false;
        }
    
        return true;
    }
    
    function nic_check(&$data){
        $nic_string =  strtolower($_POST['NIC']);
        $dob = new DateTime($_POST['dob']);
        $flag = true;
    
        switch(strlen($nic_string)){
            case 10:
                if(substr($nic_string,0,2) != substr($dob->format("Y"),2,2)){
                    $flag = false;
                }
                $re1 = '/^\d{9}[x|v]$/';
                if(!preg_match($re1, $nic_string)){
                    $flag = false;
                }
                break;
            case 12:
                if(substr($nic_string,0,4) != $dob->format("Y")){
                    $flag = false;
                }
                $re2 = '/^\d{12}$/';
                if(!preg_match($re2, $nic_string)){
                    $flag = false;
                }
                break;
            default:
                $flag= false;
                break;
        }
    
        if(!$flag){
            $this->merror($data,1, 'error', 'Please check you NIC and DOB again');
        }
    
        return $flag;
    }

    public function email_temp($link){
        $template = "
            <h1>Verify your email address. </h1>
            Please click the following link <br />
            <a href='{link}'>Confirm email</a> <br />
            Not working ? copy and paste following link in the address bar. <br />
            {link} <br /><br /><br /><br />
            - Smile team
        ";

        return str_replace('{link}',$link, $template);
    }

    public function send_mail($data){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://easymail.p.rapidapi.com/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER=> false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                "content-type: application/json",
                "x-rapidapi-host: easymail.p.rapidapi.com",
                "x-rapidapi-key: fb3f121714mshdc80e69ec08cd17p18688cjsn13394dda0baf"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        print_r(curl_error($curl));
        echo $response;

        curl_close($curl);
        
    }
}

    Class User
    {
        function login($POST)//not set
        {
            $DB = new Database();
            $_SESSION['error']="";
            if (isset($POST['uname']) && isset($POST['psw'])) 
            {
                $arr['email'] = $POST['uname'];
                $arr['password'] = $POST['psw'];
                $query = "SELECT * FROM registered_user WHERE email=:email && password=:password LIMIT 1";
                $data = $DB->read($query,$arr);
            
                if (is_array($data) && !empty($data)) {
                    // logged in
                    $_SESSION['user_id'] = $data[0]->user_ID;
                    $_SESSION['user_fname'] = $data[0]->first_name;
                    $_SESSION['user_lname'] = $data[0]->last_name;
                    $_SESSION['user_email'] = $data[0]->email;
                    $_SESSION['user_status'] = ($this->check_admin($data[0]->user_ID))?1:0;
                }else{
                    $_SESSION['error']="wrong username or password";                    
                }
            }else{
                $_SESSION['error']="Please enter a valid username and password";
            }
        }

        function signup($POST)//not set
        {
            $DB = new Database();
            $_SESSION['error']="";

            $input_scan = new input_checks();
            
            if(isset($_POST['signup'])){
                $checks = ['fname', 'lname', 'NIC', 'dob', 'email', 'tpnum', 'password', 'password_confirm'];
                if($input_scan->check_isset($checks)){
                    $flag = true;

                    $data['fname'] = $_POST['fname'];
                    $data['lname'] = $_POST['lname'];
                    $data['nic'] = $_POST['NIC'];
                    $data['dob'] = $_POST['dob'];
                    $data['email'] = $_POST['email'];
                    $data['tpnum'] = $_POST['tpnum'];

                    if(!$input_scan->password_check($data) || !$input_scan->phone_check($data) || !$input_scan->dob_check($data) || !$input_scan->nic_check($data) || !$input_scan->email_check($data, $DB)){
                        $flag = false;
                    }

                    if($flag){
                        $token = md5(uniqid(rand(), true));
                        $number = rand(10000,1000000);

                        $query = "INSERT INTO registered_user (first_name, last_name, password, email, DOB, NIC, fundCount, postCount, donateCount, removed_count, donateAmount, balance, account_number, branch_name, bank_name, picture, address, contact_no, ID_image, selfie) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $values = [$_POST['fname'], $_POST['lname'], $_POST["password"], $_POST['email'], $_POST['dob'], $_POST['NIC'], 0, 0, 0, 0, 0,0, "", "", "", 0, "", $_POST['tpnum'], $token,$number];

                        $info = $DB->write($query,$values);

                        if($info){
                            $_SESSION['user_fname'] = $_POST['fname'];
                            $_SESSION['user_lname'] = $_POST['lname'];
                            $_SESSION['user_email'] = $_POST['email'];
                            $_SESSION['user_status'] = ($this->check_admin($_SESSION['user_id']))?1:0;

                            header('Location:'."resendemail");
                        }else{
                            $input_scan->merror($data,1, 'error', 'Something went wrong');
                        }
                    }
                }else{
                    $input_scan->merror($data,1, 'error', 'Please fill all the fields');
                }
            }


        }

        function email_send(){
            $DB = new Database();
            $inputs = new input_checks();

            $query = "SELECT * FROM registered_user WHERE email=?";
            $data = $DB->read($query,[$_SESSION['user_email']]);

            $_SESSION['user_id'] = $data[0]->user_ID;

            $email = $data[0]->email;
            $token = $data[0]->ID_image;
            $number = $data[0]->selfie;
            $fname = $data[0]->first_name;
            
            $link = ROOT."home/verifyemail/".$number."/".$token;
            $email_body = $inputs->email_temp($link);

            $json_email['from']['name'] = "Smile";
            $json_email['to']['name'] = $fname;
            $json_email['to']['address'] = $email;
            $json_email['subject'] = "Account verification is required";
            $json_email['message'] = $email_body;

            $inputs->send_mail($json_email);
            header("location: success");
        }

        function verify_email($number, $token){
            $DB = new Database();

            $query = "SELECT * FROM registered_user WHERE ID_Image=? AND selfie=?";
            $data = $DB->read($query,[$token, $number]);
            if(!empty($data)){
                $email = $data[0]->email;
                $query = "UPDATE registered_user SET ID_Image='', selfie='' WHERE email=?";
                $DB->read($query,[$email]);
                return true;
            }
            return false;
        }

        function information(){
            if(isset($_POST['photo_submit'])){
                if(!empty($_FILES['selfie_image']['name']) && !empty($_FILES['nic_image']['name'])){
                    $root_path = getcwd().DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR;
                    
                    $filename = $_FILES['selfie_image']['name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $random_name = time().rand(1000,100000).".".$ext;
                    $location = $root_path.'selfie'.DIRECTORY_SEPARATOR.$random_name;
                    move_uploaded_file($_FILES['selfie_image']['tmp_name'], $location);
                    $selfie = $random_name;

                    $filename = $_FILES['nic_image']['name'];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $random_name = time().rand(1000,100000).".".$ext;
                    $location = $root_path.'nic'.DIRECTORY_SEPARATOR.$random_name;
                    move_uploaded_file($_FILES['nic_image']['tmp_name'], $location);
                    $nic = $random_name;

                    $DB = new Database();

                    $query = "UPDATE registered_user SET ID_Image=?, selfie=? WHERE email=?";
                    $DB->read($query,[$nic, $selfie, $_SESSION['user_email']]);
                    header('location: completed');
                }
            }
        }


        function logout() { //not set
            
        }

        function check_admin($id)
        {
            $DB = new Database();
            $_SESSION['error']="";
            if (isset($_SESSION['user_id']))
            {
                $query = "SELECT * FROM admin WHERE user_id=$id LIMIT 1";
                $data = $DB->read($query);
                
                if ($data){
                    return true;
                }
                return false;
            }
        }

        function userauth(){//not set
            //email verificaiton

        }

        function verified_user(){//not set
            //returns true if he is a verified user 
            return true;
        }

        function get_active_funds($id){// set

            $DB = new Database();

            $tables = array('medicalfund','animalcarefund','seniorcarefund','childrenfund','educationfund','otherfund');
            foreach($tables as $table):
                $query = "SELECT * FROM $table WHERE user_ID = $id AND amount>filled ";
                $row = $DB->read($query);
                if(is_array($row)){
                    $result[$table] = $row;
                    foreach ($result[$table] as $row):
                        $row->table = $table;
                        $report_table = $table."_report";
                        $query2 = "SELECT * FROM $report_table WHERE fund_ID = $row->ID ORDER BY date DESC";
                        $row->reports = $DB->read($query2);
                    endforeach;
                }
            endforeach;    

            if(isset($result))
            {
                return $result;
            }
            return false;
        }

        function get_filled_funds($id){
            $DB = new Database();

            $tables = array('medicalfund','animalcarefund','seniorcarefund','childrenfund','educationfund','otherfund');
            foreach($tables as $table):
                $query = "SELECT * FROM $table WHERE user_ID = $id AND (amount<filled OR amount==filled)";
                $row = $DB->read($query);
                if(is_array($row)){
                    $result[$table] = $row;
                    foreach ($result[$table] as $row):
                        $row->table = $table;
                        $report_table = $table."_report";
                        $query2 = "SELECT * FROM $report_table WHERE fund_ID = $row->ID";
                        $row->reports = $DB->read($query2);
                    endforeach;
                }
            endforeach;    

            if(isset($result))
            {
                return $result;
            }
            return false;
        }

        function get_settled_funds($id){
            $DB = new Database();

            $tables = array('medicalfund','animalcarefund','seniorcarefund','childrenfund','educationfund','otherfund');
            foreach($tables as $table):
                $query = "SELECT * FROM $table WHERE user_ID = $id AND status==1 ";
                $row = $DB->read($query);
                if(is_array($row)){
                    $result[$table] = $row;
                    foreach ($result[$table] as $row):
                        $row->table = $table;

                        $report_table = $table."_report";
                        $query2 = "SELECT * FROM $report_table WHERE fund_ID = $row->ID";
                        $row->reports = $DB->read($query2);

                    endforeach;
                }
            endforeach;    

            if(isset($result))
            {
                return $result;
            }
            return false;
        }
    
        function get_active_posts($id){
            $DB = new Database();

            $tables = array('medicalpost','animalcarepost','seniorcarepost','childrenpost','educationpost','otherpost');
            foreach($tables as $table):
                $query = "SELECT * FROM $table WHERE user_ID = $id AND status=1";
                $row = $DB->read($query);
                if(is_array($row)){
                    $result[$table] = $row;
                    foreach ($result[$table] as $row):
                        $row->table = $table;
                        $report_table = $table."_report";
                        $query2 = "SELECT * FROM $report_table WHERE post_ID = $row->ID";
                        $row->reports = $DB->read($query2);
                    endforeach;
                }
            endforeach;    

            if(isset($result))
            {
                
                return $result;
            }
            return false;
        }
    

        function get_settled_posts($id){
            $DB = new Database();

            $tables = array('medicalpost','animalcarepost','seniorcarepost','childrenpost','educationpost','otherpost');
            foreach($tables as $table):
                $query = "SELECT * FROM $table WHERE user_ID = $id AND status=0";
                $row = $DB->read($query);
                if(is_array($row)){
                    $result[$table] = $row;
                    foreach ($result[$table] as $row):
                        $row->table = $table;
                        $report_table = $table."_report";
                        $query2 = "SELECT * FROM $report_table WHERE post_ID = $row->ID";
                        $row->reports = $DB->read($query2);
                    endforeach;
                }
            endforeach;    

            if(isset($result))
            {
                return $result;
            }
            return false;
        }

        function search_user_by_id($id){
            $DB = new Database();
            $_SESSION['error']="";
            $query = "SELECT * FROM registered_user WHERE user_id=$id LIMIT 1";
            $data = $DB->read($query);
            
            if ($data){
                return $data[0];
            }
            return false;
        }

        function search_user_by_email($email){
            $DB = new Database();
            $_SESSION['error']="";
            $query = "SELECT * FROM registered_user WHERE email='$email' LIMIT 1";
            $data = $DB->read($query);
            
            if ($data){
                return $data[0];
            }
            return false;
        }

        function search_users($str){
            $DB = new Database();
            $_SESSION['error']="";
            $sign = "%";
            $string = $sign.$str.$sign;
            $query = "SELECT * FROM registered_user WHERE first_name LIKE '$string' OR last_name LIKE '$string' OR address LIKE '$string'";
            $data = $DB->read($query);
            // echo $query;
            
            if ($data){
                return $data;
            }
            return false;
        }
        
        function get_all_users(){
            $DB = new Database();
            $_SESSION['error']="";
            $query = "SELECT * FROM registered_user LIMIT 15";
            $data = $DB->read($query);

            if ($data){
                return $data;
            }
            return false;

        }

        function get_last_month_donations($id){
            $DB = new Database();

            $tables = array('medicalfund_donate','animalcarefund_donate','seniorcarefund_donate','childrenfund_donate','educationfund_donate','otherfund_donate');
            $total  = 0;
            foreach($tables as $table):
                $query = "SELECT * FROM $table WHERE user_ID = $id AND YEAR(date) = YEAR(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AND MONTH(date) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))";
                $result = $DB->read($query);
                // show($result);
                if ($result):
                    foreach ($result as $row):
                        $total = $total + $row->amount;
                    endforeach;
                endif;
            endforeach;    
    
            return $total;
        }

        function get_total_donated($id){
            $DB = new Database();

            $tables = array('medicalfund_donate','animalcarefund_donate','seniorcarefund_donate','childrenfund_donate','educationfund_donate','otherfund_donate');
            $total['count']  = 0;
            $total['amount'] = 0;
            foreach($tables as $table):
                $query = "SELECT * FROM $table WHERE user_ID = $id";
                $result = $DB->read($query);
                if ($result):
                    foreach ($result as $row):
                        $total['amount'] += $row->amount;
                        $total['count']++;
                    endforeach;
                endif;
            endforeach;    

            return $total;
        }

        function get_monthly_donations($id){
            $DB = new Database();
            $tables = array('medicalfund_donate','animalcarefund_donate','seniorcarefund_donate','childrenfund_donate','educationfund_donate','otherfund_donate');
            $total = array_fill(1,12,0);

            foreach($tables as $table):
                for ($i=1; $i < 13; $i++) { 
                    $query = "SELECT * FROM $table WHERE user_ID = $id AND YEAR(date) = YEAR(CURDATE()) AND MONTH(date) = $i";
                    $result = $DB->read($query);
                    if ($result):
                        foreach ($result as $row):
                            $total[$i] += $row->amount;
                        endforeach;
                    endif; 
                }
            endforeach;
            return $total;
        }

        


    }

?>