<?php
    include 'server/DB.php';
    include 'server/config.php';
    session_start();
    $secondLine='';
    $thirdLine='';
    $forthLine ='';
    $forthLineAttr = '"';
    if(!isset($_SESSION['name'])){
        mysqli_close($connection);
        header('location:'.URL.'index.php');
    }
    else {
        $query = "SELECT * FROM tb_user_img_path_218 WHERE user_id='" . $_SESSION['id'] . "'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);
        $imgPath=is_array($row) ? (IMAGES.$row['path']) : (IMAGES.'defaultImg.jpg');
        $imgAlt = $_SESSION['name'];
        $drCssId=null;
        $drCssId=($_SESSION['user_type'] == 2 ) ? ('yaniv'):('') ;
    }
    if ($_SESSION['user_type'] == 0){
        $secondLine='<div class="col-10"><a href="#" class="btn btn-outline-secondary">קביעת תור</a></div>';
        $thirdLine='<div class="col-10"><a href="#" class="btn btn-outline-secondary">תופעות לוואי חדשות</a></div>';
        $forthLine ='<div class="col-10">
            <a href="#" class="float-left"><img src="images/onlineClinic.png" class="images" alt="onlineClinic"></a>
            <a href="#" class="float-center"><img src="images/bloodTest.png"  class="images" alt="bloodTest"></a>
            <a href="tests.php?user_type='.$_SESSION['user_type'].'" class="float-right"><img src="images/bracelet.png"  class="images" alt=""></a></div>';
        $forthLineAttr='" id="fourthLine"';
    }
    if ($_SESSION['user_type'] == 2){
        $secondLine='<div class="col-10"><a href="patienstList.php?user_type='.$_SESSION['user_type'].'" class="btn btn-outline-secondary">רשימת מטופלים</a></div>';
        $thirdLine='<div class="col-10"><a href="#" class="btn btn-outline-secondary">הודעות</a></div>';
        $forthLine ='<div class="col-10"><a href="#" class="btn btn-outline-secondary">דו"חות</a></div>';
        $forthLineAttr='forthLine"';

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
<body id="mainPage">

    <header>
        <div>

        </div>
        <!--Navbar-->
        <nav class="navbar navbar-light bg-light lighten-4">

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
      
          <!-- Links -->

          <!-- Links -->
      
        </div>
        <!-- Collapsible content -->
      
      </nav>
      <!--/.Navbar-->
    </header>
    <?php
        echo '
    <main>
        <div class="container text-center">
            <div class="row justify-content-center firstLine">
                <div >
                    <img src='.$imgPath.' alt='.$imgAlt.' class="float-right img-fluid " id="'.$drCssId.'">
                    <h4  class="float-right ">ערב טוב<br>'.$_SESSION['name']. '</h4>
                </div>
            </div>
            <div class="row justify-content-center secondLine">
                '.$secondLine.'
            </div>
            <div class="row justify-content-center thirdLine">
                '.$thirdLine.'
            </div>
            <div class="row justify-content-center '.$forthLineAttr.'>
                '.$forthLine.'
            </div>
        </div>
        
    </main>';

    ?>
    <nav class="bg-light lighten-4 fixed-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-center footerRow">
                <div class="col text-center">
                    <a ref="#" ><img src="images/footerSearch.png" alt=""></a>
                </div>
                <div class="col text-center">
                    <a href="#" ><img  src="images/footerSettings.png" alt=""></a>
                </div>
                <div class="col text-center">
                    <a href="#" ><img src="images/footerEvent.png" alt=""></a>
                </div>
                <div class="col text-center">
                    <a href="#" ><img src="images/footerHome.png" alt=""></a>
                </div>
                <div class="col text-center">
                    <a href="#" ><img src="images/footerReturn.png" alt=""></a>
                </div>
            </div>
        </div>
    </nav>
    
</body>
</html>