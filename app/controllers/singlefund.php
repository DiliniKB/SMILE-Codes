<?php
Class singlefund extends Controller
{

    function index($category, $id)
    {
        $data['category'] = $category;
        $data['type'] = "fund";
        $data['table'] = $category."fund";
        $data['page_title'] = "View ".$data['category']." ".$data['type'];
        $data['id'] = $id;

        $funds = $this->loadModel("fund");
        $results = $funds->view_fund($data);
        $data['fund'] = $results;

        $creaters = $this->loadModel("user");
        $data['creaters'][0] = $creaters->search_user_by_id($data['fund']->user_ID);

        for ($i=1; $i <4 ; $i++) { 
            $member = 'member_ID'.$i;
            if($data['fund']->$member){
                $data['creaters'][$i] = $creaters->search_user_by_id($data['fund']->$member);
            }
        }

        $today = date_create(date('Y-m-d'));
        $create = date_create($data['fund']->create_date);
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

        // show($_SESSION);
        show($data); 

        $this->view("viewfund",$data);
    }

    function report($table="",$id=""){
        $data['table'] = $table."_report";
        $data['fund_id'] = $id;
        $data['page_title'] = "Report fund";
        $data['user_id'] = $_SESSION['user_id'];
        
        if ($_POST) {
            $data['feedback'] = $_POST;
            $data['photos'] = $_FILES;
            $fund = $this->loadModel("fund");
            $fund->report($data);
            // show($data);
        }
        $this->view("report",$data);

    }

    function donate($category="",$id=""){
        $data['page_title'] = "Donate";
        $data['category'] = $category;
        $data['type'] = "fund";
        $data['table'] = $category."fund";
        $data['page_title'] = "View ".$data['category']." ".$data['type'];
        $data['id'] = $id;

        $funds = $this->loadModel("fund");
        $results = $funds->view_fund($data);
        $data['fund'] = $results;

        // show($data);
        $this->view("fundpayment",$data);
    }

    
}