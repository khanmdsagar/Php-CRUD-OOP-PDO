<?php
    function __autoload($class){
        require_once "config/$class.php";
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $fun = new functions();
        $result = $fun->delete($id);
    }

?>