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

        $fund = $this->loadModel("fund");
        $results = $fund->view_fund($data);
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

        $NDonations = $fund->DonationStat($data['table'],$data['id']);
        $data['numberofdonationsToday'] = $NDonations[0];
        $data['numberofdonations'] = $NDonations[1];
        $data['recentDonor'] = $NDonations[2][0];
        $data['recentDonation'] = $NDonations[2][1];
        $data['topDonor'] = $NDonations[3][0];
        $data['topDonation'] = $NDonations[3][1];

        $comments = $fund->load_comments($data['table'],$data['id']);
        $data['comments'] = $comments;

        if ($_POST) {
            show($_POST);
            if(empty($_SESSION['user_id'])){
                $result = $fund->enter_comment($data['table'],$data['id'],$_POST['comment'],0);
            }
            else{
                $result = $fund->enter_comment($data['table'],$data['id'],$_POST['comment'],$_SESSION['user_id']);
            }
            
            unset($_POST); 
            if ($result){
                header("Refresh:0"); 
            }
        }

        show($data);
        // show($_SESSION); 

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
            show($data);
        }
        $this->view("report",$data);

    }

    function donate($category,$id){
        $data['page_title'] = "Donate";
        $data['category'] = $category;
        $data['type'] = "fund";
        $data['table'] = $category."fund";
        $data['page_title'] = "View ".$data['category']." ".$data['type'];
        $data['id'] = $id;

        $funds = $this->loadModel("fund");
        $results = $funds->view_fund($data);
        $data['fund'] = $results;
        show($data);
        $this->view("fundpayment",$data);
        
    }

    function confirmedDonation($category,$id){
        $data['page_title'] = "Donate";
        $data['category'] = $category;
        $data['type'] = "fund";
        $data['table'] = $category."fund";
        $data['page_title'] = "View ".$data['category']." ".$data['type'];
        $data['id'] = $id;
        $data['amount'] = $_POST['donation'];
        $data['tip'] = $_POST['tip'];
        show($data);
        show($_POST);

        // $data['merchant_id']= $_POST['merchant_id'];
        // $data['order_id'] = $_POST['order_id'];
        // $data['payhere_amount']= $_POST['payhere_amount'];
        // $data['payhere_currency']= $_POST['payhere_currency'];
        // $data['status_code'] = $_POST['status_code'];
        // $data['md5sig'] = $_POST['md5sig'];

        // $merchant_secret = 'XXXXXXXXXXXXX'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

        // $local_md5sig = strtoupper (md5 ( $data['merchant_id'] . $data['order_id'] . $data['payhere_amount'] . $data['payhere_currency'] . $data['status_code'] . strtoupper(md5($merchant_secret) ) );

        // if (($local_md5sig === $data['md5sig']) AND ($data['status_code'] == 2) ){
        //         //TODO: Update your database as payment success
        // }

    }

    function donationSuccess($string){
        $data['page_title'] = "Donate";
        // $data['category'] = $category;
        // $data['type'] = "fund";
        // $data['table'] = $category."fund";
        // $data['page_title'] = "View ".$data['category']." ".$data['type'];
        // $data['id'] = $id;
        // $data['amount'] = $amount;
        // $data['tip'] = $tip;

        // show($data);
        echo $string;
        show($_POST);

        $this->view("blank",$data);
    }

    
}