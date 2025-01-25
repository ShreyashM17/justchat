<?php
    require_once 'db.php';
    $chat=$_POST['chat'];
    $sql = "INSERT INTO `formula1` (`chat`) VALUES ('$chat')";
    $rs = mysqli_query($con, $sql);
    if($rs){
        header("location: index.html");
    }else{
        die("Someting went wrong");
    }
?>