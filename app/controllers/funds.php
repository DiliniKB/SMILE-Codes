<?php

    Class Funds extends Controller
    {

        function index($cat="",$type="fund")
        {
            $data['category'] = $cat;
            $data['type'] = $type;
            $data['table'] = $cat.$type;
            // $data['user'] = $_SESSION['user_id'];

            $data['page_title'] = $data['category']." ".$data['type'];

            $funds = $this->loadModel("fund");
            
            // show($data);
            if ($_POST) {
                show($_POST);
                // show($data);
                $results = $funds->get_search_and_sort($_POST,$data['table']);

            }else{
                $results = $funds->view_all_funds($data['category']);
            }
            $data['funds'] = $results;

            $this->view($data['type']."wall",$data);
        }

        function delete_fund($table,$id)
        {
            $fund = $this->loadModel('fund'); 
            $fund->delete_fund($table,$id);
            // $this->view("blank");
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        
        }


    }

?>