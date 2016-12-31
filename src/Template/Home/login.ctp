<!DOCTYPE html>
<html>
<head>
	<?php
        foreach ($arrCSS1 as $c){
    ?>
        <link rel="stylesheet" href="/uplon/css/<?= $c ?>"/>
    <?php
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
<div class="row">
	<div class="col-sm-4 offset-4">
		<div class="row">
			<div class="col-sm-8 offset-2">
				<h2>Login Form</h2>
				<input type="text" name="" placeholder="Username">
				<input type="text" name="" placeholder="Password">
			</div>
		</div>
	</div>
</div>
</body>
</html>