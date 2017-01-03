<!DOCTYPE html>
<html>
<head>
    <?php
        foreach ($arrCSS1 as $c){
            echo $this->Html->css($c);
        }
    ?>
    <title>Login Page</title>
    <style type="text/css">
        .body{
            background-color: blue;
            opacity: 50%;
        }
    </style>
</head>
<body>

<?= $this->fetch('content') ?>
   
</body>
</html>
