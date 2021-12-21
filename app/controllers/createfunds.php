<?php

    Class CreateFunds extends Controller
    {
        function index($category){
            $data['category'] = $category;
            show($data);
            header("Location:".ROOT."createfunds/create/".$category."");
		    die;
        }
        
        function create($category)
        {
            $data['category'] = $category;
            $data['type'] = "fund";
            $data['table'] = $data['category']."fund";

            $data['page_title'] = "Start a ".$data['type'];

            $uploader = $this->loadModel("fund");
            $results = $uploader->create_fund($_POST,$_FILES,$data);

            show($data);
            show($_POST);
            show($_FILES);

            $this->view("create".$data['type'],$data);
        }

    }

?>