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

            if ($_POST) {
                show($_POST);
                // show($data);
                $results = $posts->get_search_and_sort($_POST,$data['table']);

            }else{
                $results = $posts->view_active_posts($data['category']);
            }
            $data['posts'] = $results;

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

        function delete_post($table,$id)
        {
            $post = $this->loadModel('post'); 
            $post->delete_post($table,$id);
            // $this->view("blank");
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        
        }
    }

?>