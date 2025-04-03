<?php
require_once 'blog/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog_id = $_POST['blog_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    $stmt = $pdo->prepare("INSERT INTO comments (blog_id, name, email, comment) VALUES (?, ?, ?, ?)");
    $stmt->execute([$blog_id, $name, $email, $comment]);

    header("Location: blog.php#blog-" . $blog_id);
    exit;
}
?>