<?php
require_once 'config.php';

$slug = $_GET['slug'];
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ?");
$stmt->execute([$slug]);
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$blog) {
    die("Blog not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['title']); ?></title>
    <link rel="stylesheet" href="../assets/css/blog.css">
</head>
<body>
    <div class="single-blog-container">
        <h1><?php echo htmlspecialchars($blog['title']); ?></h1>
        <p class="meta">By <?php echo htmlspecialchars($blog['author']); ?> | <?php echo $blog['created_at']; ?></p>
        <?php if ($blog['image']): ?>
            <img src="../assets/images/<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="blog-image">
        <?php endif; ?>
        <div class="blog-content">
            <?php echo $blog['content']; ?>
        </div>
        <a href="index.php" class="btn-back">Back to Blogs</a>
    </div>
</body>
</html>