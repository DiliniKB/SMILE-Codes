<?php

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
            
                if (is_array($data)) {
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
            if (isset($POST['username']) && isset($POST['password'])) 
            {
                $arr['username'] = $POST['username'];
                $arr['password'] = $POST['password'];
                $arr['email'] = $POST['email'];

                $query = "INSERT INTO users (username,password,email,) values (:username,:password,:email)";

                $data = $DB->write($query,$arr);

                if ($data) {
                    $_SESSION['user_status'] = true;
                    header("Location:".ROOT."login");
                    die;
                }else{
                    $_SESSION['error']="wrong username or password";                    
                }
            }else{
                $_SESSION['error']="Please enter a valid username and password";
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
                        if ($row->report_count>0){
                            $report_table = $table."_report";
                            $query2 = "SELECT * FROM $report_table WHERE fund_ID = $row->ID";
                            $row->reports = $DB->read($query2);
                        }
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
                        if ($row->report_count>0){
                            $report_table = $table."_report";
                            $query2 = "SELECT * FROM $report_table WHERE fund_ID = $row->ID";
                            $row->reports = $DB->read($query2);
                        }
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
                        if ($row->report_count>0){
                            $report_table = $table."_report";
                            $query2 = "SELECT * FROM $report_table WHERE fund_ID = $row->ID";
                            $row->reports = $DB->read($query2);
                        }
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
                        if ($row->report_count>0){
                            $report_table = $table."_report";
                            $query2 = "SELECT * FROM $report_table WHERE fund_ID = $row->ID";
                            $row->reports = $DB->read($query2);
                        }
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
                        if ($row->report_count>0){
                            $report_table = $table."_report";
                            $query2 = "SELECT * FROM $report_table WHERE fund_ID = $row->ID";
                            $row->reports = $DB->read($query2);
                        }
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


    }

?>