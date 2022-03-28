<?php

    Class CreateFunds extends Controller
    {
        function index($category){
            $data['category'] = $category;
            show($data);
            if($_SESSION['user_id']){
                if(!$_SESSION['status']){
                    header("Location:".ROOT."createfunds/create/".$category."");
                }
                else{
                    function blocked($str){
                        echo "<script type='text/javascript'>alert('$str');</script>";                        
                    }

                    blocked("This user is blocked");
                    $this->view("");
                    
                }
                
            }else{
                header("Location:".ROOT."home/login");
            }
		    // die;
        }
        
        function create($category)
        {
            $data['category'] = $category;
            $data['type'] = "fund";
            $data['table'] = $data['category']."fund";

            $data['page_title'] = "Start a ".$data['type'];

            $user = $this->loadModel("user");
            $user0 = $user->search_user_by_id($_SESSION["user_id"]);
            // show($user0);

            if($_POST){
                for ($i=1; $i <4 ; $i++) { 
                    $member = 'member'.$i;
                    if($_POST[$member]){
                        $result= $user->search_user_by_email($_POST[$member]);
                        $data[$member] = $result->user_ID;
                        if(!$data[$member]){
                            $_SESSION['error'] = "Please enter a registered email for".$member;
                        }
                    }
                }

                $uploader = $this->loadModel("fund");
                $uploader->create_fund($_POST,$_FILES,$data);
            }

            $data['user'] = $user0;
            // show($data);

            $this->view("create".$data['type'],$data);
        }

    }

?>