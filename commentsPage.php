<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="searcher.css">
    <title>Comments</title>
</head>
<body>
    
<?php  require "components.php"; 

// var_dump($users);die;?>

<?foreach ($postComments as $postComment):?>
    <ul style="border: 0.5px solid gray;">

        <li>name: <span><?=$postComment["name"]?></span></li>
        <li>email: <span><?=$postComment["email"]?></span></li>
        <li>body: <span><?=$postComment["body"]?></span></li>

    </ul>
<? endforeach;?>
</body>
</html>