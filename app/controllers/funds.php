<?php

    Class Funds extends Controller
    {

        function index($cat="",$type="fund")
        {
            $data['category'] = $cat;
            $data['type'] = $type;
            $data['table'] = $cat.$type;

            $data['page_title'] = $data['category']." ".$data['type'];

            $funds = $this->loadModel("fund");
            $results = $funds->view_all_funds($data['category']);
            $data['funds'] = $results;

            // show($data);

            $this->view($data['type']."wall",$data);
        }

        function report($table="",$id=""){

            $data['page_title'] = 'Report Fund';
            $data['type'] = 'fund';
            $data['table'] = $table;
            $data['id'] = $id;

            if($_SESSION['user_id']){
                $this->view("report",$data);
            }else{
                header("Location:".ROOT."home/login");
            }
        }

    }

?>