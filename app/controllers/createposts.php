<?php

    Class CreatePosts extends Controller
    {
        function index($category){
            $data['category'] = $category;
            show($data);
            header("Location:".ROOT."createposts/create/".$category."");
		    die;
        }
        
        function create($category)
        {
            $data['category'] = $category;
            $data['type'] = "post";
            $data['table'] = $data['category']."post";

            $data['page_title'] = "Start a ".$data['type'];

            $uploader = $this->loadModel("post");
            $results = $uploader->create_post($_POST,$_FILES,$data);

            show($data);
            show($_POST);
            show($_FILES);

            $this->view("create".$data['type'],$data);
        }

    }

?>