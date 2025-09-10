<?php
// Include database connection if needed for dynamic content
// include "../include/db.php";

/**
 * Function to get all blog posts from the directory
 * @return array Array of blog posts with their details
 */
function getBlogPosts() {
    $blogDir = __DIR__; // Current directory
    $posts = [];
    
    // Get all PHP files in the directory except index.php
    $files = glob($blogDir . '/*.php');
    
    foreach ($files as $file) {
        $filename = basename($file);
        if ($filename !== 'index.php') {
            // Default values
            $title = '';
            $category = '';
            $date = '';
            $readTime = '';
            $excerpt = '';
            $image = '';
            
            // Extract title from filename
            $title = ucwords(str_replace(['-', '.php'], [' ', ''], $filename));
            
            // Read file content to extract metadata if available
            $content = file_get_contents($file);
            
            // Extract title if available in the file
            if (preg_match('/<title>(.*?)<\/title>/s', $content, $matches)) {
                $title = $matches[1];
            } elseif (preg_match('/<h1[^>]*>(.*?)<\/h1>/s', $content, $matches)) {
                $title = strip_tags($matches[1]);
            } elseif (preg_match('/<h2[^>]*>(.*?)<\/h2>/s', $content, $matches)) {
                $title = strip_tags($matches[1]);
            }
            
            // Extract category if available
            if (preg_match('/card-category">(.*?)<\/span>/s', $content, $matches)) {
                $category = $matches[1];
            } elseif (preg_match('/post-category[^>]*>(.*?)<\/span>/s', $content, $matches)) {
                $category = $matches[1];
            } else {
                // Default category based on filename
                if (strpos($filename, 'nurse') !== false) {
                    $category = 'Nursing';
                } elseif (strpos($filename, 'staff') !== false) {
                    $category = 'Staffing';
                } elseif (strpos($filename, 'recruit') !== false) {
                    $category = 'Recruitment';
                } elseif (strpos($filename, 'healthcare') !== false) {
                    $category = 'Healthcare';
                } else {
                    $category = 'Medical';
                }
            }
            
            // Extract date if available
            if (preg_match('/far fa-calendar[^>]*><\/i>\s*(.*?)<\/span>/s', $content, $matches)) {
                $date = trim($matches[1]);
            } else {
                // Generate a random date within the last 3 months
                $date = date('F j, Y', strtotime('-' . rand(1, 90) . ' days'));
            }
            
            // Extract read time if available
            if (preg_match('/far fa-clock[^>]*><\/i>\s*(.*?)<\/span>/s', $content, $matches)) {
                $readTime = trim($matches[1]);
            } else {
                // Generate a random read time
                $readTime = rand(3, 15) . ' min read';
            }
            
            // Extract excerpt if available
            if (preg_match('/card-excerpt">(.*?)<\/p>/s', $content, $matches)) {
                $excerpt = $matches[1];
            } elseif (preg_match('/<p[^>]*>(.*?)<\/p>/s', $content, $matches)) {
                $excerpt = substr(strip_tags($matches[1]), 0, 150) . '...';
            } else {
                $excerpt = 'Explore insights and strategies related to ' . strtolower(str_replace('-', ' ', $filename));
            }
            
            // Extract image if available
            if (preg_match('/card-image">\s*<img src="([^"]+)"/s', $content, $matches)) {
                $image = $matches[1];
            } elseif (preg_match('/<img[^>]*src="([^"]+)"/s', $content, $matches)) {
                $image = $matches[1];
            } else {
                // Default image based on category
                $defaultImages = [
                    'Nursing' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=600&auto=format&fit=crop',
                    'Staffing' => 'https://images.unsplash.com/photo-1551076805-e1869033e561?q=80&w=600&auto=format&fit=crop',
                    'Recruitment' => 'https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=600&auto=format&fit=crop',
                    'Healthcare' => 'https://images.unsplash.com/photo-1581056771107-24ca5f033842?q=80&w=600&auto=format&fit=crop',
                    'Medical' => 'https://images.unsplash.com/photo-1584982751601-97dcc096659c?q=80&w=600&auto=format&fit=crop'
                ];
                $image = $defaultImages[$category] ?? 'https://images.unsplash.com/photo-1581056771107-24ca5f033842?q=80&w=600&auto=format&fit=crop';
            }
            
            $posts[] = [
                'filename' => $filename,
                'title' => $title,
                'category' => $category,
                'date' => $date,
                'readTime' => $readTime,
                'excerpt' => $excerpt,
                'image' => $image
            ];
        }
    }
    
    // Sort posts by date (newest first)
    usort($posts, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });
    
    return $posts;
}

// Get all blog posts
$allPosts = getBlogPosts();

// Pagination settings
$postsPerPage = 6;
$totalPosts = count($allPosts);
$totalPages = ceil($totalPosts / $postsPerPage);
$currentPage = isset($_GET['page']) ? max(1, min($totalPages, intval($_GET['page']))) : 1;
$offset = ($currentPage - 1) * $postsPerPage;

// Get posts for current page
$currentPosts = array_slice($allPosts, $offset, $postsPerPage);

// Get featured post (first post)
$featuredPost = !empty($allPosts) ? $allPosts[0] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Insights & Medical Recruitment Blog | Hospital Placement</title>
    <meta name="description" content="Explore expert insights on healthcare recruitment, medical staffing trends, and hospital placement strategies to optimize your healthcare workforce.">
    <meta name="keywords" content="healthcare blog, medical recruitment, hospital staffing, healthcare insights, medical careers">
     <link rel="icon" type="image/png" href="https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg">

    <!-- Include common assets -->
    <?php include "../include/assets.php"?>
    
    <!-- Blog-specific CSS -->
    <link rel="stylesheet" href="blog-styles.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/include/header.php"; ?>


    
    <!-- Blog Hero Section -->
    <header class="blog-hero">
        <div class="container">
            <div class="hero-content">
                <span class="hero-badge">Healthcare Blog</span>
                <h1>Healthcare Recruitment Insights for Employers</h1>
                <p class="hero-subtitle">Expert strategies, industry innovations, and practical solutions to optimize your healthcare staffing and recruitment processes</p>
                <div class="hero-cta">
                    <a href="#latest-articles" class="btn-primary">Latest Articles</a>
                    <a href="../contact.php" class="btn-outline">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="hero-shape"></div>
    </header>
    
    <!-- Featured Article -->
    <section class="featured-section">
        <div class="container">
            <div class="section-intro">
                <h2 class="section-heading">Featured Article</h2>
                <p class="section-subheading">Our most impactful insights for healthcare employers</p>
            </div>
            
            <?php if ($featuredPost): ?>
            <div class="featured-post">
                <div class="featured-image">
                    <img src="<?php echo htmlspecialchars($featuredPost['image']); ?>" alt="<?php echo htmlspecialchars($featuredPost['title']); ?>">
                    <div class="image-overlay"></div>
                </div>
                <div class="featured-content">
                    <span class="post-category featured-badge"><?php echo htmlspecialchars($featuredPost['category']); ?></span>
                    <h2 class="featured-title"><?php echo htmlspecialchars($featuredPost['title']); ?></h2>
                    <p class="featured-excerpt"><?php echo htmlspecialchars($featuredPost['excerpt']); ?></p>
                    <div class="post-meta">
                        <span><i class="far fa-calendar"></i> <?php echo htmlspecialchars($featuredPost['date']); ?></span>
                        <span><i class="far fa-clock"></i> <?php echo htmlspecialchars($featuredPost['readTime']); ?></span>
                        <span><i class="far fa-user"></i> By Hospital Placement Team</span>
                    </div>
                    <a href="<?php echo htmlspecialchars($featuredPost['filename']); ?>" class="btn-primary">Read Full Article <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <?php else: ?>
            <div class="featured-post">
                <div class="featured-content">
                    <p>No featured articles available at this time.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Blog Posts Grid -->
    <section class="blog-grid" id="latest-articles">
        <div class="container">
            <div class="section-intro">
                <h2 class="section-heading">Latest Articles</h2>
                <p class="section-subheading">Stay updated with our newest insights and expert advice</p>
            </div>
            
            <div class="posts-grid">
                <?php if (!empty($currentPosts)): ?>
                    <?php foreach ($currentPosts as $post): ?>
                        <article class="blog-card">
                            <div class="card-image">
                                <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                                <span class="card-category"><?php echo htmlspecialchars($post['category']); ?></span>
                                <div class="image-overlay"></div>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title"><a href="<?php echo htmlspecialchars($post['filename']); ?>"><?php echo htmlspecialchars($post['title']); ?></a></h3>
                                <p class="card-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                                <div class="card-meta">
                                    <span><i class="far fa-calendar"></i> <?php echo htmlspecialchars($post['date']); ?></span>
                                    <span><i class="far fa-clock"></i> <?php echo htmlspecialchars($post['readTime']); ?></span>
                                </div>
                                <a href="<?php echo htmlspecialchars($post['filename']); ?>" class="read-more">Read Article <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-posts-message">
                        <p>No articles available at this time. Please check back later.</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Pagination Controls -->
            <?php if ($totalPages > 1): ?>
            <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?php echo $currentPage - 1; ?>" class="pagination-link prev-page">
                        <i class="fas fa-chevron-left"></i> Previous
                    </a>
                <?php endif; ?>
                
                <div class="pagination-numbers">
                    <?php 
                    // Calculate range of page numbers to show
                    $range = 2; // Show 2 pages before and after current page
                    $startPage = max(1, $currentPage - $range);
                    $endPage = min($totalPages, $currentPage + $range);
                    
                    // Always show first page
                    if ($startPage > 1) {
                        echo '<a href="?page=1" class="pagination-number">1</a>';
                        if ($startPage > 2) {
                            echo '<span class="pagination-ellipsis">...</span>';
                        }
                    }
                    
                    // Show page numbers in range
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        $activeClass = ($i == $currentPage) ? ' active' : '';
                        echo '<a href="?page=' . $i . '" class="pagination-number' . $activeClass . '">' . $i . '</a>';
                    }
                    
                    // Always show last page
                    if ($endPage < $totalPages) {
                        if ($endPage < $totalPages - 1) {
                            echo '<span class="pagination-ellipsis">...</span>';
                        }
                        echo '<a href="?page=' . $totalPages . '" class="pagination-number">' . $totalPages . '</a>';
                    }
                    ?>
                </div>
                
                <?php if ($currentPage < $totalPages): ?>
                    <a href="?page=<?php echo $currentPage + 1; ?>" class="pagination-link next-page">
                        Next <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            
            <!-- Newsletter Subscription -->
            <div class="newsletter-section">
                <div class="newsletter-box">
                    <div class="newsletter-content">
                        <span class="newsletter-badge">Employer Resources</span>
                        <h3>Healthcare Recruitment Insights for Employers</h3>
                        <p>Subscribe to receive exclusive recruitment strategies, staffing solutions, and industry insights tailored specifically for healthcare employers and HR professionals.</p>
                        <form class="newsletter-form">
                            <div class="form-group">
                                <input type="email" placeholder="Your business email address" required>
                                <button type="submit" class="btn-subscribe">Subscribe <i class="fas fa-paper-plane"></i></button>
                            </div>
                            <div class="form-privacy">
                                <label><input type="checkbox" required> I agree to receive employer-focused content and accept the <a href="../privacy-policy.php">Privacy Policy</a></label>
                            </div>
                        </form>
                    </div>
                    <div class="newsletter-decoration">
                        <div class="decoration-circle"></div>
                        <div class="decoration-dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Include Footer -->
    <?php include "../include/footer.php"?>
    
    <!-- Custom Blog JavaScript -->
    <script>
        // Add any blog-specific JavaScript here
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>