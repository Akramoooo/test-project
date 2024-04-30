<?php
    $pdo = new PDO("mysql:host=localhost;dbname=project","root","root");

    
    // In this code I received all posts from database
   $sql = "SELECT * FROM posts";
   $stmt = $pdo->prepare($sql);
   $stmt->execute();
   $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

   //In this code I received all comments from database;

   $sql = "SELECT * FROM comments";
   $stmt = $pdo->prepare($sql);
   $stmt->execute();
   $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

   //In this code I received users from database and will be add their on the post cards

   $sql = "SELECT * FROM users";
   $stmt = $pdo->prepare($sql);
   $stmt->execute();
   $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Receive all comments for specific post
   $postId = @$_GET["id"];
   $sql = 'SELECT * FROM comments WHERE postId = :postId';  
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);  
   $stmt->execute();
   $postComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

   

    // Receive the data from ajax and find all posts which comments have data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $jsonData = file_get_contents('php://input');
        $string = json_decode($jsonData, true);
        $searchString = @$string['string'];
        $sql = "SELECT * FROM comments WHERE body LIKE '%$searchString%' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $CommentsPost = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $postIds = [];
        foreach ($CommentsPost as $CommentPost) {
            array_push($postIds, $CommentPost["postId"]);
        }
        array_unique($postIds);
    
        $allPostWhichHaveSpecificComment = [];
        foreach ($postIds as $id) {
            $sql = 'SELECT * FROM posts WHERE id = :id'; 
            $stmt = $pdo->prepare($sql); 
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);  
            $stmt->execute();
            array_push($allPostWhichHaveSpecificComment,  $stmt->fetch(PDO::FETCH_ASSOC));
        }
        $json_data = json_encode($allPostWhichHaveSpecificComment);
        echo $json_data;
        // Завершает выполнение скрипта
        $posts;
        exit();
    }




?>