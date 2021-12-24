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

            $user = $this->loadModel("user");

            for ($i=1; $i <4 ; $i++) { 
                $member = 'member'.$i;
                if(array_key_exists($member,$_POST)){
                    $result= $user->search_user_by_email($_POST[$member]);
                    $data[$member] = $result->user_ID;
                    if(!$data[$member]){
                        $_SESSION['error'] = "Please enter a registered email for".$member;
                    }
                }
            }

            $uploader = $this->loadModel("fund");
            $uploader->create_fund($_POST,$_FILES,$data);

            show($data);
            show($_POST);
            show($_FILES);

            $this->view("create".$data['type'],$data);
        }

    }

?>