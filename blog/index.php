<?php
require_once 'config.php';
$stmt = $pdo->query("SELECT * FROM blogs ORDER BY created_at DESC");
$blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Blog Management</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
</head>
<body>
    <div class="blog-container">
        <h1 class="blog-heading">Admin Blog Management</h1>
        <a href="create.php" class="btn-create">Create New Blog</a>
        <a href="../blog.php" class="btn-view">View User Blog Page</a>
        <div class="blog-grid">
            <?php foreach ($blogs as $blog): ?>
                <div class="blog-card">
                    <?php if ($blog['image']): ?>
                        <img src="../assets/images/<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>">
                    <?php endif; ?>
                    <h2><?php echo htmlspecialchars($blog['title']); ?></h2>
                    <p><?php echo substr(strip_tags($blog['content']), 0, 100) . '...'; ?></p>
                    <a href="view.php?slug=<?php echo htmlspecialchars($blog['slug']); ?>" class="btn-read">Read More</a>
                    <a href="edit.php?id=<?php echo $blog['id']; ?>" class="btn-edit">Edit</a>
                    <a href="delete.php?id=<?php echo $blog['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>