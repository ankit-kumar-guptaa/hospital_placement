<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Insights | hospitalplacement.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #3a86ff;
            --primary-dark: #2667cc;
            --secondary: #8338ec;
            --accent: #ff006e;
            --light: #f8f9ff;
            --dark: #1a1a2e;
            --text: #4a4a68;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', 'Poppins', sans-serif;
        }
        
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        
        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.7;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 40px 20px;
            position: relative;
        }
        
        /* Header Styles */
        .main-header {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }
        
        .main-header h1 {
            font-size: 3.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        
        .main-header h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, var(--accent), var(--secondary));
            border-radius: 2px;
        }
        
        .main-header p {
            font-size: 1.2rem;
            color: var(--text);
            max-width: 700px;
            margin: 0 auto;
            font-weight: 500;
        }
        
        /* Blog Grid */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px;
            position: relative;
            z-index: 2;
        }
        
        /* Blog Card */
        .blog-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px -10px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            border: none;
        }
        
        .blog-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 60px -15px rgba(58, 134, 255, 0.3);
        }
        
        .card-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--accent);
            color: white;
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            z-index: 3;
            box-shadow: 0 4px 15px rgba(255, 0, 110, 0.3);
        }
        
        .card-image {
            height: 240px;
            overflow: hidden;
            position: relative;
        }
        
        .card-image::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            z-index: 1;
        }
        
        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }
        
        .blog-card:hover .card-image img {
            transform: scale(1.1);
        }
        
        .card-content {
            padding: 30px;
        }
        
        .card-content h2 {
            font-size: 1.8rem;
            color: var(--dark);
            margin-bottom: 15px;
            font-weight: 700;
            line-height: 1.4;
        }
        
        .card-content p {
            color: var(--text);
            margin-bottom: 25px;
            font-size: 1.05rem;
        }
        
        .read-more {
            display: inline-flex;
            align-items: center;
            padding: 12px 28px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(58, 134, 255, 0.3);
        }
        
        .read-more:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--secondary));
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(58, 134, 255, 0.4);
        }
        
        .read-more i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }
        
        .read-more:hover i {
            transform: translateX(5px);
        }
        
        /* Decorative Elements */
        .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            z-index: 1;
        }
        
        .shape-1 {
            width: 300px;
            height: 300px;
            background: var(--primary);
            top: 10%;
            left: 5%;
            animation: float 8s ease-in-out infinite;
        }
        
        .shape-2 {
            width: 200px;
            height: 200px;
            background: var(--secondary);
            bottom: 15%;
            right: 5%;
            animation: float 10s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            50% { transform: translate(20px, 20px) rotate(5deg); }
            100% { transform: translate(0, 0) rotate(0deg); }
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .blog-grid {
                grid-template-columns: 1fr;
                max-width: 600px;
                margin: 0 auto;
            }
        }
        
        @media (max-width: 768px) {
            .main-header h1 {
                font-size: 2.5rem;
            }
            
            .main-header p {
                font-size: 1.1rem;
            }
            
            .card-content {
                padding: 25px;
            }
            
            .card-content h2 {
                font-size: 1.6rem;
            }
        }
        
        @media (max-width: 480px) {
            .main-header h1 {
                font-size: 2rem;
            }
            
            .card-content {
                padding: 20px;
            }
            
            .card-content h2 {
                font-size: 1.4rem;
            }
            
            .read-more {
                padding: 10px 22px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    
    <div class="container">
        <header class="main-header">
            <h1>Hospital Placement Insights</h1>
            <p>Expert articles on healthcare staffing solutions and industry challenges</p>
        </header>
        
        <div class="blog-grid">
            <!-- Article 1 -->
            <article class="blog-card">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Radiologist examining X-ray">
                    <span class="card-badge">Medical Staffing</span>
                </div>
                <div class="card-content">
                    <h2>Addressing the Radiologist Doctors Shortage in India</h2>
                    <p>Explore the growing shortage of radiologists in India and discover how hospitalplacement.com provides innovative solutions to bridge this critical healthcare gap with qualified professionals.</p>
                    <a href="radiologist-shortage.php" class="read-more">Read Article <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
            
            <!-- Article 2 -->
            <article class="blog-card">
                <div class="card-image">
                    <img src="https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Hospital staff working">
                    <span class="card-badge">Recruitment</span>
                </div>
                <div class="card-content">
                    <h2>How to Easily Get the Right Hospital Staff</h2>
                    <p>Learn how hospitalplacement.com revolutionizes healthcare staffing with advanced matching algorithms and comprehensive vetting processes to deliver perfectly matched hospital personnel.</p>
                    <a href="hospital-staff-hiring.php" class="read-more">Read Article <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
        </div>
    </div>
</body>
</html>