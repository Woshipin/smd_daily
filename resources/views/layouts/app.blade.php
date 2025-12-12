<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMD - 专业网站设计')</title>
    
    <!-- Google Fonts: Poppins (English) & Noto Sans SC (Chinese) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            /* === FONT CHANGE === */
            font-family: 'Poppins', 'Noto Sans SC', sans-serif;
            line-height: 1.6;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styles */
        .navbar {
            /* === COLOR CHANGE === */
            background: linear-gradient(135deg, #56CCF2 0%, #2F80ED 100%);
            padding: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            color: white;
            font-size: 2rem;
            font-weight: bold;
            padding: 1rem 0;
            text-decoration: none;
            letter-spacing: 2px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 0;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            padding: 1.5rem 1.5rem;
            display: block;
            font-weight: 500;
            transition: background 0.3s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s;
            /* === DROPDOWN ROUNDED CORNERS === */
            border-radius: 8px; 
            overflow: hidden; /* Ensures child items conform to rounded corners */
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 0.8rem 1.5rem;
            color: #333;
            text-decoration: none;
            display: block;
            transition: background 0.3s, padding-left 0.3s;
            border-bottom: 1px solid #f0f0f0;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: #f8f9fa;
            padding-left: 2rem;
        }

        /* Main Content */
        main {
            flex: 1;
        }

        /* Hero Section */
        .hero {
             /* === COLOR CHANGE === */
            background: linear-gradient(135deg, #56CCF2 0%, #2F80ED 100%);
            color: white;
            padding: 6rem 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: fadeInUp 1s 0.2s backwards;
        }

        .cta-button {
            background: white;
            /* === COLOR CHANGE === */
            color: #2F80ED;
            padding: 1rem 3rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: fadeInUp 1s 0.4s backwards;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        /* Services Section */
        .services {
            padding: 5rem 2rem;
            background: #f8f9fa;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #333;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .service-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            /* === COLOR CHANGE === */
            color: #2F80ED;
        }

        .service-card p {
            color: #666;
            line-height: 1.8;
        }

        /* About Section */
        .about {
            padding: 5rem 2rem;
            background: white;
        }

        .about-content {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .about-content p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        /* Stats Section */
        .stats {
            /* === COLOR CHANGE === */
            background: linear-gradient(135deg, #56CCF2 0%, #2F80ED 100%);
            padding: 4rem 2rem;
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .stat-item h3 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
        }

        .stat-item p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            padding: 3rem 2rem 1rem;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.8rem;
        }

        .footer-section a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #34495e;
            color: #bdc3c7;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .nav-menu {
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                /* === COLOR CHANGE === */
                background: linear-gradient(135deg, #56CCF2 0%, #2F80ED 100%);
                display: none;
            }

            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="/" class="logo">SMD</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link">足球 / Football</a>
                    <div class="dropdown">
                        <a href="/football/zh" class="dropdown-item">🇨🇳 中文足球</a>
                        <a href="/football/ms" class="dropdown-item">🇲🇾 Bola Sepak Melayu</a>
                        <a href="/football/th" class="dropdown-item">🇹🇭 ฟุตบอลไทย</a>
                        <a href="/football/en" class="dropdown-item">🇬🇧 English Football</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">赛马 / Horse Racing</a>
                    <div class="dropdown">
                        <a href="/racing/zh" class="dropdown-item">🇨🇳 中文赛马</a>
                        <a href="/racing/ms" class="dropdown-item">🇲🇾 Lumba Kuda Melayu</a>
                        <a href="/racing/th" class="dropdown-item">🇹🇭 แข่งม้าไทย</a>
                        <a href="/racing/en" class="dropdown-item">🇬🇧 English Horse Racing</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">汇率 / Exchange Rate</a>
                    <div class="dropdown">
                        <a href="/exchange/zh" class="dropdown-item">🇨🇳 中文汇率</a>
                        <a href="/exchange/ms" class="dropdown-item">🇲🇾 Kadar Pertukaran Melayu</a>
                        <a href="/exchange/th" class="dropdown-item">🇹🇭 อัตราแลกเปลี่ยนไทย</a>
                        <a href="/exchange/en" class="dropdown-item">🇬🇧 English Exchange Rate</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">彩票 / Lottery</a>
                    <div class="dropdown">
                        <a href="/lottery/zh" class="dropdown-item">🇨🇳 中文彩票</a>
                        <a href="/lottery/ms" class="dropdown-item">🇲🇾 Loteri Melayu</a>
                        <a href="/lottery/th" class="dropdown-item">🇹🇭 ลอตเตอรี่ไทย</a>
                        <a href="/lottery/en" class="dropdown-item">🇬🇧 English Lottery</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>关于SMD / About SMD</h3>
                <p>SMD是一家专业的网站设计公司，致力于为客户提供高质量的数字解决方案。</p>
                <p>SMD is a professional website design company dedicated to providing high-quality digital solutions.</p>
            </div>
            <div class="footer-section">
                <h3>快速链接 / Quick Links</h3>
                <ul>
                    <li><a href="/">首页 / Home</a></li>
                    <li><a href="/about">关于我们 / About Us</a></li>
                    <li><a href="/services">服务 / Services</a></li>
                    <li><a href="/contact">联系我们 / Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>服务范围 / Services</h3>
                <ul>
                    <li><a href="/football">足球系统 / Football System</a></li>
                    <li><a href="/racing">赛马系统 / Racing System</a></li>
                    <li><a href="/exchange">汇率系统 / Exchange System</a></li>
                    <li><a href="/lottery">彩票系统 / Lottery System</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>联系方式 / Contact</h3>
                <ul>
                    <li>📧 Email: info@smd.com</li>
                    <li>📱 Phone: +60 12-345 6789</li>
                    <li>📍 Johor Bahru, Malaysia</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 SMD Website Design. All Rights Reserved. | 版权所有</p>
        </div>
    </footer>
</body>
</html>