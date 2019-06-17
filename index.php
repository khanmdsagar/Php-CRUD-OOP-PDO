<?php
    function __autoload($class){
        require_once "config/$class.php";
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
    <div style="margin: 10px 0px 10px 0px">
        <a href="index.php">Student Manager</a>
    </div>

    <a href="insert.php" class="btn btn-outline-primary btn-sm" style="margin: 10px 0px 20px 0px">Add Student</a>
 
<?php //Getting message?>
<?php
    if(isset($_GET['msg'])){?>
    <div class="alert alert-primary" role="alert">
        <?php 
        $msg = $_GET['msg'];
        echo $msg;
        ?>
    </div>

    <?php
    }
?>
 

    <table class="table table-bordered text-center">
        <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>Sex</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>

      <?php
        //fetching data
        $func = new functions();
        $rows = $func->select();

        $i = 0;

        if(is_array($rows)){
        foreach($rows as $row){$i++; ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['sex'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-sm">Edit</a> &nbsp;
                 <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger">Delete</a></td>
            </tr>
      <?php  
       }
    }
?>
    </table>

    <?php
        if ($rows==0) {?>

        <div class="miniBox text-center">
         <h3 style="color: rgba(0,0,0,.4);">No Data Available</h3>
        </div>
  <?php
}
?>
</div>

</body>
</html>
