<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section>
        <h2>Welcome <?php
        $un=$_GET["reg_un"];
        $pw=$_GET["reg_pass"];
        if($un=="yonit" && $pw=="111"){
            echo $un,' nice to see you again';
        }
        else{
            echo "who are you,<br> ",$un,' please enter registered user name';
        }
        ?></h2>
    </section>
</body>
</html>

