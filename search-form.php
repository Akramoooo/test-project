<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="searcher.css">
    <title>Searcher</title>
</head>


<?php  require "components.php"; 

// var_dump($json_data);?>

<body>

    <div class="main-search-container">
        <div class="form">
            <input type="text" name="search" id="search">
            <button>Поиск</button>
        </div>


        
        <div class="posts-main-container">
            <?php foreach($posts as $post):?>
            <ul class="php-card-container">
                <li>Author: <?=$users[$post["userId"] - 1]["user_name"];?></li>
                <li>Title: <?=$post["title"];?></li>
                <li>Body: <?=$post["body"];?></li>
                <li><a href="commentsPage.php?id=<?=$post['id']?>">Comments</a></li>
            </ul>
            <?php endforeach;?>
        </div>
    </div>
    

</body>
</html>


<script src="search.js"></script>

<script>
let jsonData = <?=json_encode($allPostWhichHaveSpecificComment)?>;
</script>





