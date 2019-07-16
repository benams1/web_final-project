<?php
include 'server/config.php';
session_start();
if(!isset($_SESSION['name'])){
    header('location:'.URL.'index.php');
}
$tableLink='reportTestResult.php?user_type='.$_SESSION['user_type'];
?>

<!DOCTYPE html>
<html lang="he">
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
<body id="indexPage">
    <header>
        <div>

        </div>
        <!--Navbar-->
        <nav class="navbar navbar-light bg-light lighten-4">

        <!-- Navbar brand -->
            <a class="navbar-brand " href="main.php">
                <div id="logoIcon" class="img-fluid" alt=""></div>
            </a>
      
        <!-- Collapse button -->
            <button  id="navButton" class="navbar-toggler toggler-example float-right btn-lg" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
          aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text "><i
              class="fa fa-bars "></i></span></button>
      
        <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">

            </div>
        <!-- Collapsible content -->
      
      </nav>
      <!--/.Navbar-->
    </header>
    <main>
        
        <div class="container">
            <h1 class="h1 text-center">בדיקות</h1>
            <table dir="rtl" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th class="col float-right">#</th>
                        <th class="col">בדיקה</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <th scope="row">1</th>
                        <td><a class="text-dark testRef" href="<?php echo $tableLink;?>&form=1">לחץ&nbsp;דם</a></td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">2</th>
                        <td><a class=" text-dark testRef" href="<?php echo $tableLink;?>&form=2">סוכר</a></td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">3</th>
                        <td><a class="text-dark testRef" href="<?php echo $tableLink;?>&form=3">דופק</a></td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">4</th>
                        <td><a class="text-dark testRef" href="<?php echo $tableLink;?>&form=4">סטורציה</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
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
                    <a href="main.php" ><img src="images/footerHome.png" alt=""></a>
                </div>
                <div class="col text-center">
                    <a href="#" ><img src="images/footerReturn.png" alt=""></a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>