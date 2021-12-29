<?php
    function show($stuff){
        echo "<pre>";
        print_r($stuff);
        echo "</pre>";
    }

    function check_message(){

        if(isset($_SESSION['error']) && $_SESSION['error'] != "")
        {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
    }

    function clean($string) {
        $string = str_replace(' ', '', $string); 
        $string = str_replace('-', '', $string); 
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
     }
?>
