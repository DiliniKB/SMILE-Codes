<?php 

    if (isset($_REQUEST['login'])) {
        $username= $_REQUEST['uname'];
        $password= $_REQUEST['psw'];
    

    function login($conn, $username, $password){
        $sql = "SELECT * FROM registered_user WHERE email_address = '$username'";
        $query = mysqli_query($conn, $sql);
        return $query;    
    }

    if(isset($_REQUEST['login'])){
        $result = login($connection,$username, $password);

        foreach ($result as $r) {
            //$pwd_check = password_verify($password, $r['password']);

            if (password_verify($password, $r['password'])) {
                $_SESSION['username'] = $r['email_address'];
                $_SESSION['fname'] = $r['first_name'];
                header('Location:'."FundWall.php?cat='Medical'");
            }else{
                echo "<script>alert('wrong username or password');</script>";
            }
        }
    }
    }

    $welcome = "../";

    if(isset($_REQUEST['logout'])){
        session_destroy();
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        header('Location:'.$welcome);
        exit();
    }

?>