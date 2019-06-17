<?php
    function __autoload($class){
        require_once "config/$class.php";
    }
?>


<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $sex = $_POST['status'];
        $phone = $_POST['phone'];
        
        $fields = [
            'name'  => $name,
            'sex'   => $sex,
            'phone' => $phone
        ];

        $func = new functions();
        $func->insert($fields);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Student Manager</title>
</head>
<body>
<div class="container">
    <div class="box" style="background-color: #f1f1f1; padding:20px;  position:absolute; top:50%; left:50%; transform: translate(-50%,-50%);">
        <form action="" method="POST">
            <div class="form-group">
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <input name="phone" type="number" class="form-control" id="number" placeholder="Enter phone">
            </div>
            <div>
                <input type="radio" name="status" value="Male"> Male<br>
                <input type="radio" name="status" value="Female"> Female
            </div>
            <input value="Submit" name="submit" type="submit" class="btn btn-primary btn-sm" style="margin: 10px 0px 10px 0px">
        </form>
    </div>
</div>
</body>
</html>
