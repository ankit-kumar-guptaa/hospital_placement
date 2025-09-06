<?php
// Include database connection if needed for dynamic content
// include "../include/db.php";
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
                <h1>Healthcare Insights & Expertise</h1>
                <p class="hero-subtitle">Expert insights, trends, and advice for healthcare facilities and professionals looking to optimize recruitment, staffing, and management practices</p>
                <div class="hero-cta">
                    <a href="#latest-articles" class="btn-primary">Latest Articles</a>
                    <a href="../contact.php" class="btn-outline">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="hero-shape"></div>
    </header>
    
    <!-- Featured Post Section -->
    <section class="featured-section">
        <div class="container">
            <div class="section-intro">
                <h2 class="section-heading">Featured Article</h2>
                <p class="section-subheading">Our most impactful insights for healthcare professionals</p>
            </div>
            
            <div class="featured-post">
                <div class="featured-image">
                    <img src="https://images.unsplash.com/photo-1631815588090-d4bfec5b1ccb?q=80&w=1200&auto=format&fit=crop" alt="Healthcare professionals in a hospital setting">
                    <div class="image-overlay"></div>
                </div>
                <div class="featured-content">
                    <span class="post-category featured-badge">Featured</span>
                    <h2 class="featured-title">Strategic Approaches to Hospital Staff Hiring in 2024</h2>
                    <p class="featured-excerpt">Discover innovative recruitment strategies that leading healthcare facilities are implementing to attract and retain top medical talent in today's competitive market.</p>
                    <div class="post-meta">
                        <span><i class="far fa-calendar"></i> June 15, 2024</span>
                        <span><i class="far fa-clock"></i> 8 min read</span>
                        <span><i class="far fa-user"></i> By Hospital Placement Team</span>
                    </div>
                    <a href="hospital-staff-hiring.php" class="btn-primary">Read Full Article <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
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
                <!-- Blog Post 1 -->
                <article class="blog-card">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1584982751601-97dcc096659c?q=80&w=600&auto=format&fit=crop" alt="Doctor examining medical scans">
                        <span class="card-category">Medical Staffing</span>
                        <div class="image-overlay"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><a href="addressing-radiologist-shortage.php">Addressing the Radiologist Shortage: Solutions for Hospitals</a></h3>
                        <p class="card-excerpt">Explore effective strategies to overcome the growing radiologist shortage and maintain quality diagnostic services in your healthcare facility.</p>
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> June 10, 2024</span>
                            <span><i class="far fa-clock"></i> 6 min read</span>
                        </div>
                        <a href="addressing-radiologist-shortage.php" class="read-more">Read Article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <!-- Blog Post 2 -->
                <article class="blog-card">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=600&auto=format&fit=crop" alt="Nurses in a hospital corridor">
                        <span class="card-category">Nursing</span>
                        <div class="image-overlay"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><a href="nurse-retention-strategies.php">7 Proven Nurse Retention Strategies for Healthcare Facilities</a></h3>
                        <p class="card-excerpt">Discover practical approaches to improve nurse satisfaction, reduce turnover, and build a stable nursing workforce in your hospital.</p>
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> June 5, 2024</span>
                            <span><i class="far fa-clock"></i> 7 min read</span>
                        </div>
                        <a href="nurse-retention-strategies.php" class="read-more">Read Article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <!-- Blog Post 3 -->
                <article class="blog-card">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?q=80&w=600&auto=format&fit=crop" alt="Healthcare professionals in a meeting">
                        <span class="card-category">Leadership</span>
                        <div class="image-overlay"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><a href="healthcare-leadership-development.php">Building Effective Healthcare Leadership Teams</a></h3>
                        <p class="card-excerpt">Learn how to identify, develop, and retain exceptional healthcare leaders who can drive organizational excellence and improve patient outcomes.</p>
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> May 28, 2024</span>
                            <span><i class="far fa-clock"></i> 9 min read</span>
                        </div>
                        <a href="healthcare-leadership-development.php" class="read-more">Read Article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <!-- Blog Post 4 -->
                <article class="blog-card">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?q=80&w=600&auto=format&fit=crop" alt="Doctor using digital technology">
                        <span class="card-category">Technology</span>
                        <div class="image-overlay"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><a href="healthcare-recruitment-technology.php">How Technology is Transforming Healthcare Recruitment</a></h3>
                        <p class="card-excerpt">Explore the latest technological innovations that are revolutionizing how hospitals find, screen, and hire qualified medical professionals.</p>
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> May 20, 2024</span>
                            <span><i class="far fa-clock"></i> 5 min read</span>
                        </div>
                        <a href="healthcare-recruitment-technology.php" class="read-more">Read Article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
                
                <!-- Blog Post 5 -->
                <article class="blog-card">
                    <div class="card-image">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?q=80&w=600&auto=format&fit=crop" alt="Medical professionals collaborating">
                        <span class="card-category">Recruitment</span>
                        <div class="image-overlay"></div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title"><a href="paramedical-staff-recruitment.php">Best Practices for Paramedical Staff Recruitment</a></h3>
                        <p class="card-excerpt">Discover specialized recruitment strategies for attracting qualified paramedical professionals to strengthen your hospital's support services.</p>
                        <div class="card-meta">
                            <span><i class="far fa-calendar"></i> May 15, 2024</span>
                            <span><i class="far fa-clock"></i> 6 min read</span>
                        </div>
                        <a href="paramedical-staff-recruitment.php" class="read-more">Read Article <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            </div>
            
            <!-- Newsletter Subscription -->
            <div class="newsletter-section">
                <div class="newsletter-box">
                    <div class="newsletter-content">
                        <span class="newsletter-badge">Newsletter</span>
                        <h3>Stay Updated with Healthcare Insights</h3>
                        <p>Subscribe to our newsletter for the latest articles, trends, and expert advice on healthcare recruitment and hospital management.</p>
                        <form class="newsletter-form">
                            <div class="form-group">
                                <input type="email" placeholder="Your email address" required>
                                <button type="submit" class="btn-subscribe">Subscribe <i class="fas fa-paper-plane"></i></button>
                            </div>
                            <div class="form-privacy">
                                <label><input type="checkbox" required> I agree to receive emails and accept the <a href="../privacy-policy.php">Privacy Policy</a></label>
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