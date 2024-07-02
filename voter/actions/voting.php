<?php

    session_start();
    include('connect.php');

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $votes = $_POST['groupvotes'];
        $totalvotes = $votes+1;

        $gid = $_POST['groupid'];
        $uid = $_SESSION['id'];
        $updatevotes = mysqli_query($conn, "UPDATE `userdata` SET `votes` = '$totalvotes' WHERE `userdata`.`id` = $gid");
        $updatestatus = mysqli_query($conn, "UPDATE `userdata` SET `status` = 1 WHERE `userdata`.`id` = $uid");


        if($updatevotes && $updatestatus){
            $getgroups = mysqli_query($conn, "Select username,photo,votes,id from `userdata` where standard='group'");
            $groups = mysqli_fetch_all($getgroups,MYSQLI_ASSOC);
            $_SESSION['groups']=$groups;
            $_SESSION['status']=1;

            echo '<script>
                alert("Voted Successful");
                window.location = "../component/dashboard.php";
            </script>';

        }else{
            echo '<script>
                alert("Technical Error, Try after some time");
                window.location = "../component/dashboard.php";
            </script>';
        }
    }


?>