<?php
Class singlepost extends Controller
{

    function index($category, $id)
    {
        $data['category'] = $category;
        $data['type'] = "post";
        $data['table'] = $category."post";
        $data['page_title'] = "View ".$data['category']." ".$data['type'];
        $data['id'] = $id;

        $posts = $this->loadModel("post");
        $results = $posts->view_post($data);
        $data['post'] = $results;

        $creaters = $this->loadModel("user");
        $data['creaters'][0] = $creaters->search_user_by_id($data['post']->user_ID);

        for ($i=1; $i <4 ; $i++) { 
            $member = 'member_ID'.$i;
            if($data['post']->$member){
                $data['creaters'][$i] = $creaters->search_user_by_id($data['post']->$member);
            }
        }
        $today = date_create(date('Y-m-d'));
        $create = date_create($data['post']->create_date);
        $dategap = date_diff($create,$today);
        $data['dategap'] = '';
        if($dategap->y){
            $data['dategap'] =+ $dategap->y." Years ";
        }
        if($dategap->m){
            $data['dategap'] =+ $dategap->m." Months ";
        }
        if($dategap->d){
            $data['dategap'] =+ $dategap->d." Days";
        }
        if($today == $create){
            $data['dategap'] = 'Today';
        }else{
            $data['dategap'] = $data['dategap']." ago";
        }

        $comments = $posts->load_comments($data['table'],$data['id']);
        $data['comments'] = $comments;

        if ($_POST) {
            show($_POST);
            if(empty($_SESSION['user_id'])){
                $result = $posts->enter_comment($data['table'],$data['id'],$_POST['comment'],0);
            }
            else{
                $result = $posts->enter_comment($data['table'],$data['id'],$_POST['comment'],$_SESSION['user_id']);
            }
            
            unset($_POST); 
            if ($result){
                header("Refresh:0"); 
            }
        }


        //show($_SESSION);
        //show($data); 

        $this->view("viewpost",$data);
    }

    function report($table="",$id=""){
        $data['table'] = $table."_report";
        $data['post_id'] = $id;
        $data['page_title'] = "Report post";
        $data['user_id'] = $_SESSION['user_id'];
        
        if ($_POST) {
            $data['feedback'] = $_POST;
            $data['photos'] = $_FILES;
            $post = $this->loadModel("post");
            $results = $post->report($data);
            // show($data);
        }
        $this->view("report",$data);

    }

    
}