<?php
if(isset($_POST['table'])){
    if(isset($_POST['id'])){
        require_once "../Function/Basic.php";
        require_once "../Function/Database.php";
        $basic = new Basic();
        $db = new Database();
        $table = $_POST['table'];
        if($table = "job"){
            $table = "jobs";
            if($db->Execute("delete from applied where Job_Id =".$_POST['id'])){
                $basic->success("Record Deleted");
            }
            else{
                // $basic->error("Record applied Deletion Error", $_SERVER['HTTP_REFERER']);
            }
        }
        if($db->Execute("delete from $table where Id =".$_POST['id'])){
            $basic->success("Record Deleted", $_SERVER['HTTP_REFERER']);
        }
        else{
            $basic->error("Record jobs Deletion Error", $_SERVER['HTTP_REFERER']);
        }
    }
    else{
        echo "Id Not Found";
    }
}
else{
    echo "No table selected";
}
?>