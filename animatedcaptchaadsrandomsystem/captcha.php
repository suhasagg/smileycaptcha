<?php
ob_start();
session_start();

    $image = $_POST['image'];

    if($image == $_SESSION['answer']){
        echo "<b>Great success!</b>\n";
    }else {
        echo "<em>Failure!</em>\n";
    }


ob_end_flush();
?>