<?php
include 'server/DB.php';
include 'server/config.php';
session_start();
if(!isset( $_SESSION['name'])){
    mysqli_close($connection);
    header('location:'.URL.'index.php?');
}

$testType=null;
$testValue = null;
$tableData='';
$DrData='';
if($_SESSION['user_type']!=0){//if its not a patient
    $patId=$_GET['patient_id'];
    $patName=$_GET['patient_name'];
    $DrData='<h2 class="h2 text-center">'.$patName.'</h2>
            <a href="sendMessage.php?user_type='.$_SESSION['user_type'].'&from='.$_SESSION['id'].'&to='.$patId.'" class="btn btn-primary" id="send">שלח הודעה למטופל</a>';
}else{
    $patId=$_SESSION['id'];
    $formType=$_GET['formId'];
    switch ($formType){
        case '1':
            $testType='blood pressure';
            $testValue =$_GET['bloodPressureS'].'/'.$_GET['bloodPressureD'] ;
            break;
        case '2':
            $testType='blood sugar';
            $testValue =$_GET['sugar'];
            break;
        case '3':
            $testType='heart rate';
            $testValue =$_GET['heartBeat'];
            break;
        case '4':
            $testType='saturation';
            $testValue =$_GET['saturation'];
            break;
    }
}

if ($testType!=null){
    $query="INSERT INTO  `studDB19a`.`tb_indices_218` (
            `id` ,
            `pat_id` ,
            `test_type` ,
            `test_value` ,
            `test_time`)
            VALUES (
            NULL ,  '".$patId."', '".$testType."' , '".$testValue."', '".date('Y-m-d H:i:s',time())."'
    );";
    $result = mysqli_query($connection,$query);
}
    $query="SELECT * FROM tb_indices_218 WHERE pat_id='".$patId."'  ORDER BY  `tb_indices_218`.`test_time` DESC";
    $result = mysqli_query($connection,$query);
    $i=1;
    while($row = mysqli_fetch_assoc($result)){
        $tableData.='<tr class="text-center"><th scope="row">'.$i.'</th><td>'.$row['test_type'].'</td><td>'.$row['test_value'].'</td><td>'.$row['test_time'].'</td></tr>';
        ++$i;
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
<body id="formResult">
<header>
    <div>

    </div>
    <!--Navbar-->
    <nav class="navbar navbar-light bg-light lighten-4" >

        <!-- Navbar brand -->
        <a class="navbar-brand " href="main.php?user_type=<?php echo $_SESSION['user_type'];?>">
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
        <div class="container">
            <h1 class="h1 text-center">בדיקות</h1>
            <?php
                echo $DrData;
            ?>
            <table dir="rtl" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th class="col float-right">#</th>
                        <th class="col">בדיקה</th>
                        <th class="col">תוצאה</th>
                        <th class="col">ת. הבדיקה</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php
                        echo $tableData;
                    ?>
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