<?php

    Class Home extends Controller
    {
        function index()
        {
            $data['page_title'] = "Homepage";

            $fund = $this->loadModel('fund'); 
            $data['MonthlyLeaderboard'] = $fund->get_monthlyleaderboard();
            $data['Leaderboard'] = $fund->get_leaderboard();
            
            $arr1 = $data['MonthlyLeaderboard'];
            $rank0 = $arr1[0]->user_ID;
            $rank1 = $arr1[1]->user_ID;
            $rank2 = $arr1[2]->user_ID;
            $data['rank0'] = $fund->get_rankers($rank0);
            $data['rank1'] = $fund->get_rankers($rank1);
            $data['rank2'] = $fund->get_rankers($rank2);
            $this->view("index",$data);
        }

        function about()
        {
            $data['page_title'] = "About";
            $this->view("about");
        }

        function login()
        {
            $data['page_title'] = "Login ";
            $user = $this->loadModel("user");
            $user->login($_POST);
            $this->view("login",$data);
        }

        function password_reset()
        {
            $data['page_title'] = "Reset password";
            $user = $this->loadModel("user");
            $user->password_reset();

            $this->view("password_reset",$data);
        }

        function password_reset_done()
        {
            $data['page_title'] = "Reset password";

            $this->view("password_reset_done",$data);
        }

        function logout()
        {
            session_destroy();
            header("location: index");
            //$data['page_title'] = "Homepage";
            //$this->view("index",$data);
        }

        function signup()
        {
            $data['page_title'] = "SignUp ";
            $user = $this->loadModel("user");

            $data['sys_error'] = 0;
            $data['sys_error_type'] = 'error';
            $data['sys_error_msg'] = 'None';

            $data['fname'] = "";
            $data['lname'] = "";
            $data['nic'] = "";
            $data['dob'] = "";
            $data['email'] = "";
            $data['tpnum'] = "";

            $user->signup($_POST, $data);
            $this->view("signup",$data);
        }

        function success()
        {
            $data['page_title'] = "New account created";
            $this->view("account-created",$data);
        }

        function resendemail(){
            if(isset($_SESSION['user_email'])){
                $user = $this->loadModel("user");
                $user->email_send();
                //header('location: success');
            }else{
                echo "Unknown error";
            }

        }

        function verifyemail($number, $token){
            $user = $this->loadModel("user");
            $status = $user->verify_email($number, $token);
            if($status){
                header('location: ../../information');
            }else{
                $data['page_title'] = "Invalid link";
                $this->view("invalid-link",$data);
            }
        }

        function information(){
            $data['page_title'] = "Identity verification ";
            $user = $this->loadModel("user");
            $user->information();
            $this->view("information",$data);
        }

        function completed()
        {
            $data['page_title'] = "All done ";
            $this->view("completed",$data);
        }

        function dashboard()
        {
            $data['page_title'] = "Dashboard";
            $id = $_SESSION['user_id'];

            $user = $this->loadModel("user");
            $userdetails = $user->search_user_by_id($id);
            $data['account_balance'] = $userdetails->balance;

            $funds = $user->get_funds($id,"active");
            $data['activefunds'] = $funds;

            $funds = $user->get_funds($id,"filled");
            $data['filledfunds'] = $funds;

            $funds = $user->get_funds($id,"settled");
            $data['settledfunds'] = $funds;

            $posts = $user->get_posts($id,"active");
            $data['activeposts'] = $posts;

            $posts = $user->get_posts($id,"complete");
            $data['settledposts'] = $posts;
        
            $totalDonated = $user->get_total_donated($id);
            $data['totalDonated'] = $totalDonated['amount'];
            $data['Donatedcount'] = $totalDonated['count'];

            $lmDonated = $user->get_last_month_donations($id);
            $data['lastMonthDonated'] = $lmDonated;
            // show($data);

            $monthlyDonations = $user->get_monthly_donations($id);
            $data['monthlyDonations'] = $monthlyDonations;
            // show($data);

            $this->view("dashboard",$data);

        }

        function settings(){
            $data['page_title'] = "Settings";
            $user = $this->loadModel("user");

            $data['sys_error'] = 0;
            $data['sys_error_type'] = 'error';
            $data['sys_error_msg'] = 'None';

            $user->settings($data);
            $info = $user->setting_data();

            $data['email'] = $info[0]->email;
            $data['profpic'] = $info[0]->picture;
            $data['mobile'] = $info[0]->contact_no;
            $data['bank_name'] = $info[0]->bank_name;
            $data['bank_branch'] = $info[0]->branch_name;
            $data['bank_account'] = $info[0]->account_number;
            
            $this->view("settings",$data);
        }
    }

?>