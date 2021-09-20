<?php
session_start();

$response = [
    "status" => 1,
    "error" => 1,
    "message" => "Unknown error. Please contact us."
];

if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) ){
    $response["status"] = 0;

    $user_id = $_SESSION["user_id"];

    include "../../models/Database.php";
    include "../../models/Account.php";

    $account_model = new Account();

    $organization_ids = $account_model->get_organizations_by_userid($user_id);
    $organizations = array();

    foreach($organization_ids as $organization){
        $organizations[] = $account_model->get_organizations_by_organizationid($organization["organization_id"])[0];
    }

    $response["error"] = 0;
    $response["message"] = array();

    $response["message"]["donors"] = $account_model->get_donors_by_userid($user_id);
    $response["message"]["giftees"] = $account_model->get_giftees_by_userid($user_id);
    $response["message"]["admins"] = $account_model->get_admins_by_userid($user_id);
    $response["message"]["organizations"] = $organizations;
}

echo json_encode($response);

?>