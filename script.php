<?php
$api_posts = 'https://jsonplaceholder.typicode.com/posts';
$api_comments = 'https://jsonplaceholder.typicode.com/comments';

$postsJSON = file_get_contents($api_posts);
$commentsJSON = file_get_contents($api_comments);

$posts = json_decode($postsJSON, true);
$comments = json_decode($commentsJSON, true);

$users = ['Андрей', 'Akramooo', 'Вялик', 'Муртус', 'Павелион', 'Наташка', 'Косоглаз', 'Амбал', 'Качок', 'Чернозем'];


// if($users)
// {
//     $pdo = new PDO('mysql:host=localhost;dbname=project','root','root');
    
//     foreach ($users as $user) {
//         $sql = "INSERT INTO users (user_name) VALUES (?)";
//         $statement = $pdo->prepare($sql);
//         $statement->execute([$user]);
//     }
// }

// if($posts)
// {
//     $pdo = new PDO('mysql:host=localhost;dbname=project','root','root');
    
//     $keys = array_keys($posts[0]);
//     $fields = implode(', ', array_diff($keys, ['id'])); 
//     $placeholders = ':' . join(', :', array_map('strval', array_diff($keys, ['id']))); 

//     $sql = "INSERT INTO posts ($fields) VALUES ($placeholders)";
//     $stmt = $pdo->prepare($sql);

//     foreach ($posts as $post) {
//         foreach ($keys as $key) {
//             if ($key !== 'id') { 
//                 $stmt->bindValue(":$key", $post[$key]);
//             }
//         }
//         $stmt->execute();
//     }
// }

// var_dump($comments);die;
// if($comments)
// {
//     $pdo = new PDO('mysql:host=localhost;dbname=project','root','root');
    
//     $keys = array_keys($comments[0]);
//     $fields = implode(', ', array_diff($keys, ['id'])); 
//     $placeholders = ':' . join(', :', array_map('strval', array_diff($keys, ['id']))); 

//     $sql = "INSERT INTO comments ($fields) VALUES ($placeholders)";
//     $stmt = $pdo->prepare($sql);

//     foreach ($comments as $comment) {
//         foreach ($keys as $key) {
//             if ($key !== 'id') { 
//                 $stmt->bindValue(":$key", $comment[$key]);
//             }
//         }
//         $stmt->execute();
//     }
// }

// $loadedPosts = count($posts);
// $loadedComments = count($comments);

// echo '<script>console.log("Загружено ' . $loadedPosts . ' записей и ' . $loadedComments . ' комментариев.");</script>';


?>


