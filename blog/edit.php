<?php
require_once 'config.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ?");
$stmt->execute([$id]);
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $slug = strtolower(str_replace(' ', '-', $title));

    $image = $blog['image'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/images/' . $image);
    }

    $stmt = $pdo->prepare("UPDATE blogs SET title = ?, slug = ?, content = ?, image = ?, author = ? WHERE id = ?");
    $stmt->execute([$title, $slug, $content, $image, $author, $id]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
</head>
<body>
    <div class="form-container">
        <h1>Edit Blog Post</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($blog['title']); ?>" required>

            <label for="content">Content (Use HTML for styling)</label>
            <textarea name="content" id="content" rows="10" required><?php echo htmlspecialchars($blog['content']); ?></textarea>

            <label for="image">Upload New Image (Leave blank to keep current)</label>
            <input type="file" name="image" id="image" accept="image/*">

            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($blog['author']); ?>" required>

            <button type="submit" class="btn-submit">Update Blog</button>
        </form>
    </div>
</body>
</html>