<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $slug = strtolower(str_replace(' ', '-', $title));
    $main_image = null;

    // Main Image Upload
    $image_dir = '../assets/images/';
    if (!is_dir($image_dir)) {
        mkdir($image_dir, 0755, true);
    }

    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024;

        if (in_array($_FILES['main_image']['type'], $allowed_types) && $_FILES['main_image']['size'] <= $max_size) {
            $main_image = time() . '_' . $_FILES['main_image']['name'];
            move_uploaded_file($_FILES['main_image']['tmp_name'], $image_dir . $main_image);
        }
    }

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO blogs (title, slug, content, image, author) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $slug, $content, $main_image, $author]);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
    <link rel="stylesheet" href="../assets/css/blog.css">
    <!-- CKEditor CDN -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body>
    <div class="form-container">
        <h1>Create a New Blog Post</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="title">Blog Title</label>
            <input type="text" name="title" id="title" required>

            <label for="main_image">Main Image (Featured Image)</label>
            <input type="file" name="main_image" id="main_image" accept="image/*">

            <label for="content">Blog Content</label>
            <textarea name="content" id="content" rows="10"></textarea>

            <label for="author">Author</label>
            <input type="text" name="author" id="author" required>

            <button type="submit" class="btn-submit">Publish Blog</button>
        </form>
    </div>

    <script>
        CKEDITOR.replace('content', {
            height: 400,
            filebrowserUploadUrl: '../assets/js/upload.php', // For image uploads in editor
            extraPlugins: 'justify', // For text alignment
            toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight'] },
                { name: 'styles', items: ['Format', 'Font', 'FontSize'] },
                { name: 'colors', items: ['TextColor', 'BGColor'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar'] },
                { name: 'links', items: ['Link', 'Unlink'] }
            ]
        });
    </script>
</body>
</html>