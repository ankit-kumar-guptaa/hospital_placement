<?php
require_once 'blog/config.php';

// Fetch all blog posts
$stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs - Hospital Placement</title>
    <link rel="stylesheet" href="assets/css/blog.css">
</head>
<body>
    <div class="user-blog-container">
        <h1 class="blog-heading">Our Blogs</h1>
        <div class="blog-grid">
            <?php foreach ($blogs as $blog): ?>
                <a href="single-blog.php?slug=<?php echo htmlspecialchars($blog['slug']); ?>" class="blog-card">
                    <?php if ($blog['image']): ?>
                        <img src="assets/images/<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                    <?php endif; ?>
                    <h2><?php echo htmlspecialchars($blog['title']); ?></h2>
                    <p class="meta">By <?php echo htmlspecialchars($blog['author']); ?> | <?php echo $blog['created_at']; ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>