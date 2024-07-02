<?php

session_start();
if(!isset($_SESSION['id'])){
    header('location:../');
}
$data = $_SESSION['data'];
if($_SESSION['status']==1)
{
    $status = '<b class="text-success">Voted</b>';
}
else{
    $status = '<b class="text-danger">Not Voted</b>';

}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voting System-dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container my-5">
        <a href="../"><button class="btn btn-outline-warning px-3">Back</button></a>
        <a href="logout.php"><button class="btn btn-outline-danger px-3">Logout</button></a>
        <h1 class="my-3">Voting System</h1>
        <div class="row my-5">
            <div class="col-md-7">
                <!-- Groups -->
                 <?php
                    if(isset($_SESSION['groups'])){
                        $groups = $_SESSION['groups'];
                        for($i=0;$i<count($groups);$i++){
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <img width="100px" src="../uploads/<?php echo $groups[$i]['photo'] ?>" alt="Image1">
                                </div>
                                <div class="col-md-8">
                                    <strong class="h5">Group Name: <?php echo $groups[$i]['username'] ?></strong><br>
                                    <strong class="h5">Votes: <?php echo $groups[$i]['votes'] ?></strong><br>
                                </div>
                            </div>
                            
                    <form action="../actions/voting.php" method="POST">

                            <input type="hidden" name="groupvotes" value="<?php echo $groups[$i]['votes']; ?>">
                            <input type="hidden" name="groupid" value="<?php echo $groups[$i]['id']; ?>">

                            <?php

                                if($_SESSION['status']==1){
                                    ?>
                                    <button class="btn my-3 btn-outline-success">Voted</button>
                                    <?php
                                }else{
                                    ?>
                                    <button class="btn my-3 btn-outline-danger" type="submit">Vote</button>
                                   
                                    <?php
                                }
                            
                            ?>

                    </form>
                    <hr>
                    <?php
                        }
                    }else{
                        ?>
                        <div class="container">
                            <p>No Groups to display</p>
                        </div>
                        <?php
                    }
                    ?>
                    
            </div>
            <div class="col-md-5">
                <!-- userProfile -->
                 <img width="100px" src="../uploads/<?php echo $data['photo']; ?>" alt="user image">
                 <br>
                 <br>
                 <strong class="h5">Name: </strong><?php echo $data['username']; ?><br><br>
                 <strong class="h5">Mobile: </strong><?php echo $data['mobile']; ?><br><br>
                 <strong class="h5">Status: </strong><?php echo $status; ?><br><br>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>