<?php
require_once 'blog/config.php';

$slug = $_GET['slug'];
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ?");
$stmt->execute([$slug]);
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$blog) {
    die("Blog not found.");
}

// Fetch comments
$stmt = $pdo->prepare("SELECT * FROM comments WHERE blog_id = ? ORDER BY created_at DESC");
$stmt->execute([$blog['id']]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($blog['title']); ?></title>
    <link rel="stylesheet" href="assets/css/blog.css">
</head>
<body>
    <div class="single-blog-container">
        <h1><?php echo htmlspecialchars($blog['title']); ?></h1>
        <p class="meta">By <?php echo htmlspecialchars($blog['author']); ?> | <?php echo $blog['created_at']; ?></p>
        <?php if ($blog['image']): ?>
            <img src="assets/images/<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['title']); ?>" class="blog-image">
        <?php endif; ?>
        <div class="blog-content">
            <?php echo $blog['content']; ?>
        </div>

        <!-- Comments Section -->
        <div class="comments-section">
            <h3>Comments</h3>
            <div class="comment-list">
                <?php if (count($comments) > 0): ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment">
                            <p><strong><?php echo htmlspecialchars($comment['name']); ?></strong> (<?php echo htmlspecialchars($comment['email']); ?>)</p>
                            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                            <p class="comment-meta">Posted on <?php echo $comment['created_at']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No comments yet. Be the first to comment!</p>
                <?php endif; ?>
            </div>

            <!-- Comment Form -->
            <h3>Leave a Comment</h3>
            <form action="comments.php" method="POST" class="comment-form">
                <input type="hidden" name="blog_id" value="<?php echo $blog['id']; ?>">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" rows="4" required></textarea>
                <button type="submit" class="btn-submit">Post Comment</button>
            </form>
        </div>

        <a href="blog.php" class="btn-back">Back to Blogs</a>
    </div>
</body>
</html>