<?php

    Class Posts extends Controller
    {
        function index($cat="",$type="post")
        {
            $data['category'] = $cat;
            $data['type'] = $type;
            $data['table'] = $cat.$type;

            $data['page_title'] = $data['category']." ".$data['type'];

            $posts = $this->loadModel("post");
            $results = $posts->view_all_posts($data['category']);
            $data['posts'] = $results;

            //show($data);

            $this->view($data['type']."wall",$data);
        }

        function create($cat="",$type="post"){
            $data['category'] = $cat;
            $data['type'] = $type;
            $data['table'] = $cat.$type;

            $data['page_title'] = "Create ".$data['type'];

            $posts = $this->loadModel("post");
            $results = $posts->create($data);
            
            // show($data);

            $this->view($data['type']."wall",$data);
        }
    }

?>