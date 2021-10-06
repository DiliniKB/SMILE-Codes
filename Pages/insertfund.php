<?php

    $member1 = "";
    $member2 = "";
    $member3 = "";

    $amount = $_POST['amount'];
    $keywords = $_POST['keywords'];
    $town = $_POST['town'];
    $District = $_POST['District'];
    $Title = $_POST['Title'];
    $Description = $_POST['Description'];
    $accNo = $_POST['accNo'];
    $bankName = $_POST['bankName'];
    $branchName = $_POST['branchName'];
    $accountHolder = $_POST['accountHolder'];
    //$usertype = $_POST['usertype'];
    $photo = $_POST['photo'];
    //$member1 = $_POST['member1'];
    //$member2 = $_POST['member2'];
    //$member3 = $_POST['member3'];


    //database connection
    $conn = new mysqli('localhost' , 'root' , '' , 'smile'); 
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into medicalfunds(amount , keywords, town, district, title, content,
         accountnumber, bankname, branchname, accounttholder,  )
         values (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssssssss", $amount, $keywords, $town, $District, $Title, $Description, $accNo, $bankName, $branchName,
         $accountHolder);
        $stmt->execute();
        echo "inserting successful ";
        $stmt->close();
        $conn->close();
    }
?>