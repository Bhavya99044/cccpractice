<?php
    function getParams($var){
        if(isset($_POST[$var])){
            return $_POST[$var];
        }elseif(isset($_GET[$var])){
            return $_GET[$var];
        }elseif(isset($_REQUEST[$var])){
            return $_REQUEST[$var];
        }else{
            return "Var not found!!";
        }
    }
?>