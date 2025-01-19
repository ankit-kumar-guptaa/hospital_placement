<?php
// header.php
?>

<header>
    <div class="container1">
        <div class="logo">
            <img src="https://hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg" alt="Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a></li>
                <li><a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About Us</a></li>
                <li>
                    <a href="#" class="<?php echo basename($_SERVER['PHP_SELF']) == 'pages.php' ? 'active' : ''; ?>">Pages</a>
                    <ul class="dropdown">
                        <li><a href="page1.php">Page 1</a></li>
                        <li><a href="page2.php">Page 2</a></li>
                        <li><a href="page3.php">Page 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="<?php echo basename($_SERVER['PHP_SELF']) == 'services.php' ? 'active' : ''; ?>">Services</a>
                    <ul class="dropdown">
                        <li><a href="service1.php">Service 1</a></li>
                        <li><a href="service2.php">Service 2</a></li>
                        <li><a href="service3.php">Service 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="<?php echo basename($_SERVER['PHP_SELF']) == 'healthcare.php' ? 'active' : ''; ?>">Healthcare Recruitment</a>
                    <ul class="dropdown">
                        <li><a href="healthcare1.php">Healthcare 1</a></li>
                        <li><a href="healthcare2.php">Healthcare 2</a></li>
                        <li><a href="healthcare3.php">Healthcare 3</a></li>
                    </ul>
                </li>
                <li><a href="jobs.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'jobs.php' ? 'active' : ''; ?>">Jobs</a></li>
                <li><a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact Us</a></li>
            </ul>
            <div class="menu-toggle" onclick="toggleMenu()">
                &#9776;
            </div>
        </nav>
    </div>
</header>

<style>
    /* General Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: Arial, sans-serif;
    }
    header {
        background: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 10px 20px;
        position: relative;
        z-index: 1000;
    }
    .container1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .logo {
        display: flex;
        align-items: center;
    }
    .logo img {
        height: 74px;
        margin-right: 10px;
        width: 119px;
    }
    nav {
        display: flex;
        align-items: center;
    }
    .nav-links {
        list-style: none;
        display: flex;
        gap: 20px;
        transition: transform 0.3s ease-in-out;
    }
    .nav-links li {
        position: relative;
    }
    .nav-links li a {
        text-decoration: none;
        font-size: 16px;
        color: #000;
        padding: 8px 12px;
        transition: color 0.3s ease, border-bottom 0.3s ease;
    }
    .nav-links li a.active {
        color: #008cba;
        border-bottom: 2px solid #008cba;
    }
    .nav-links li:hover > a {
        color: #008cba;
    }
    .dropdown {
        display: none;
        position: absolute;
        top: 40px;
        left: 0;
        background: #fff;
        list-style: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        opacity: 0;
        transform: translateY(10px);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    .dropdown li {
        margin: 0;
    }
    .dropdown li a {
        padding: 10px 20px;
        display: block;
        white-space: nowrap;
    }
    .nav-links li:hover .dropdown {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    /* Mobile Styles */
    .menu-toggle {
        display: none;
        font-size: 24px;
        cursor: pointer;
    }
    @media (max-width: 768px) {
        .nav-links {
            display: none;
            flex-direction: column;
            gap: 0;
            position: absolute;
            top: 70px;
            right: 0;
            background: #fff;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            margin-top: 15px;
        }
        .nav-links.show {
            display: flex;
            animation: slideDown 0.3s ease forwards;
        }
        .nav-links li {
            text-align: center;
            padding: 10px 0;
            border-bottom: 1px solid #f2f2f2;
        }
        .dropdown {
            position: static;
            box-shadow: none;
        }
        .menu-toggle {
            display: block;
        }
    }

    /* Animations */
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
</style>

<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('show');
    }

    document.addEventListener('click', function (event) {
        const navLinks = document.querySelector('.nav-links');
        const menuToggle = document.querySelector('.menu-toggle');

        if (!navLinks.contains(event.target) && !menuToggle.contains(event.target)) {
            navLinks.classList.remove('show');
        }
    });
</script>
