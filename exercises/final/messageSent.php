<?php
include 'server/DB.php';
include 'server/config.php';
session_start();
$h1='';
if(!isset($_SESSION['name'])){
    mysqli_close($connection);
    header('location:'.URL.'index.php');
}
if(!isset($_GET['from'])||!isset( $_GET['to'])){
    die();
}

$query="INSERT INTO  `studDB19a`.`tb_messages_218` (
`id` ,
`title` ,
`content` ,
`from_id` ,
`to_id` ,
`is_read`
)
VALUES (
NULL , ' ".$_GET['subject']."',  '".$_GET['content']."',  '".$_GET['from']."', ' ".$_GET['to']."',  '0'
);";
$result = mysqli_query($connection,$query);
if($result){
$h1='ההודעה נשלחה בהצלחה';
}else{
$h1='error';
}
mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="includes/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="includes/style.css">
    <script src="includes/loadNav.js"></script>
    <title>happy life</title>
</head>
<body id="messageSent">
<header>
    <div>

    </div>
    <!--Navbar-->
    <nav class="navbar navbar-light bg-light lighten-4" >

        <!-- Navbar brand -->
        <a class="navbar-brand " href="#">
            <div id="logoIcon" class="img-fluid" alt=""></div>
        </a>

        <!-- Collapse button -->
        <button id="navButton" class="navbar-toggler toggler-example float-right btn-lg" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text "><i
                    class="fa fa-bars "></i></span></button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse bg-light" id="navbarSupportedContent1">

        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
</header>
<main>
    <div class="container text-center">
        <div class="row  justify-content-center ">
            <h1 class="h1 text-center"><?php echo $h1; ?></h1>
        </div>
        <div class="row  justify-content-center ">
            <a href="main.php?user_type=<?php echo $_SESSION['user_type'];?>" class="btn btn-primary btn-lg btn-block" id="send">חזרה לעמוד הבית</a>

        </div>
    </div>
</main>
<nav class="bg-light lighten-4 fixed-bottom">
    <div class="container text-center">
        <div class="row align-items-center justify-content-center footerRow">
            <div class="col text-center">
                <a ref="#" ><img src="images/footerSearch.png" alt=""></a>
            </div>
            <div class="col text-center">
                <a href="#" ><img src="images/footerSettings.png" alt=""></a>
            </div>
            <div class="col text-center">
                <a href="#" ><img src="images/footerEvent.png" alt=""></a>
            </div>
            <div class="col text-center">
                <a href="index.php" ><img src="images/footerHome.png" alt=""></a>
            </div>
            <div class="col text-center">
                <a href="#" ><img src="images/footerReturn.png" alt=""></a>
            </div>
        </div>
    </div>
</nav>
</body>
</html>