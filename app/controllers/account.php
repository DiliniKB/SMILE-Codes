<?php

Class Account extends Controller
{
    function index($id){
        $data['page_title'] = 'Account Details';

        $user = $this->loadModel("user");

        $info = $user->search_user_by_id($id);
        $data['info'] = $info;

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
        show($data);

        // $this->view("blank",$data);
        $this->view("viewaccount",$data);
    }
    
    function search(){
        $data['page_title'] = 'Search';
        // show($_POST);
        $user = $this-> loadModel("user");
        $data['users'] = $user->get_all_users();
        // show($data);
        $this->view("searchaccount",$data);
        header("Location:".ROOT."account/searchAccount");
		die;
        
    }

    function searchAccount(){
        // show($_POST);
        $data['page_title'] = 'Search';

        $user = $this->loadModel("user");
        $str = $_POST['search-box'];
        $data['users'] = $user->search_users($str);
        // show($data);
        $this->view("searchaccount",$data);
    }

    function block($id){
        $user = $this->loadModel("user");
        $user->block($id);
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }

    function unblock($id){
        $user = $this->loadModel("user");
        $user->unblock($id);
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }



}
?>