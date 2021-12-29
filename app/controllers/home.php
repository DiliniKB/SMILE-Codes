<?php

    Class Home extends Controller
    {
        function index()
        {
            $data['page_title'] = "Homepage";

            $fund = $this->loadModel('fund'); 
            //$data['monthlyLeaderboard'] = $fund->get_monthlyLeaderboard();
            $data['Leaderboard'] = $fund->get_leaderboard();
            show($data);
            $this->view("index",$data);
            // show($_SESSION);
            // session_destroy();
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

        function logout()
        {
            session_destroy();
            $data['page_title'] = "Homepage";
            $this->view("index",$data);
        }

        function signup()
        {
            $data['page_title'] = "SignUp ";
            $user = $this->loadModel("user");
            $user->login($_POST);
            $this->view("signup",$data);
        }

        function dashboard()
        {
            $data['page_title'] = "Dashboard";
            $data['account_balance'] = 400;
            $data['last_month_total'] = 5100;
            $data['total_donated_amount'] = 14100;
            $data['donation_count'] = 14100;
            
            $user = $this->loadModel("user");

            $funds = $user->get_active_funds($_SESSION["user_id"]);
            $data['activefunds'] = $funds;

            $funds = $user->get_filled_funds($_SESSION["user_id"]);
            $data['filledfunds'] = $funds;
            
            $posts = $user->get_active_posts($_SESSION["user_id"]);
            $data['posts'] = $posts;
            
            // show($data);

            $this->view("dashboard",$data);

        }

        function settings(){
            $data['page_title'] = "Settings";
            $this->view("settings",$data);
        }
    }

?>