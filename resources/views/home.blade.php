<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>SMD Daily - System Control Center</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-core: #05070a;
            --bg-card: rgba(20, 30, 50, 0.4);
            --bg-card-hover: rgba(30, 60, 100, 0.6);
            --border-line: rgba(60, 167, 255, 0.1);
            --bg-label: rgba(60, 167, 255, 0.15);
            --text-label: #3ca7ff;

            /* 主题色 */
            --theme-blue: #3ca7ff;    /* MY Football */
            --theme-red: #ff3c3c;     /* TH Football / Maintain */
            --theme-green: #00ff9d;   /* Horse MY-USD */
            --theme-purple: #bd00ff;  /* Horse MY */
            --theme-orange: #ff9100;  /* Horse TH-USD */
            --theme-pink: #ff007f;    /* Horse TH */
            --theme-gold: #ffd700;    /* Jackpot */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-core);
            background-image: 
                radial-gradient(circle at 15% 50%, rgba(0, 80, 255, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 85% 30%, rgba(0, 198, 255, 0.05) 0%, transparent 40%);
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            animation: bgBreath 8s infinite alternate;
        }

        .gradient-text {
            background: linear-gradient(110deg, #cceeff 0%, #0088ff 25%, #003399 50%, #0088ff 75%, #cceeff 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textFlow 3s linear infinite;
            display: inline-block;
            font-weight: 800;
        }

        @keyframes textFlow {
            0% { background-position: 0% center; }
            100% { background-position: -200% center; }
        }

        /* ================= 导航栏 (Navigation) ================= */
        nav {
            background: rgba(5, 7, 10, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border-line);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between; /* 左右分布 */
            position: relative;
            height: 50px; /* 固定高度防止塌陷 */
        }

        /* Logo - 永远在左侧 */
        .logo {
            font-size: 1.6rem;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            cursor: pointer;
            z-index: 1002;
        }

        .logo-icon {
            font-size: 1.8rem;
            animation: floatIcon 3s ease-in-out infinite;
        }

        /* ================= DESKTOP 专属样式 (>1024px) ================= */
        
        /* 1. 中间导航条 (只在电脑显示) */
        .desktop-center-tabs {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 1001;
        }

        .nav-tabs {
            background: rgba(255, 255, 255, 0.02);
            padding: 5px;
            border-radius: 50px;
            border: 1px solid var(--border-line);
            display: flex;
            gap: 5px;
        }

        .nav-btn {
            background: transparent;
            border: none;
            color: #64748b;
            padding: 0.6rem 1.8rem;
            border-radius: 40px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            white-space: nowrap;
        }

        .nav-btn:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .nav-btn.active {
            background: rgba(0, 136, 255, 0.15);
            color: #3ca7ff;
            border: 1px solid rgba(60, 167, 255, 0.3);
            box-shadow: 0 0 15px rgba(0, 136, 255, 0.2);
        }

        /* 2. 右侧 Admin 按钮 (只在电脑显示) */
        .desktop-admin-container {
            display: block;
        }

        .admin-link { text-decoration: none; }
        .admin-btn { border: 1px solid rgba(255,255,255,0.15); }
        .admin-link:hover .admin-btn {
            border-color: #3ca7ff;
            box-shadow: 0 0 15px rgba(60, 167, 255, 0.4);
            color: #3ca7ff;
        }

        /* 3. 移动端汉堡按钮 (电脑隐藏) */
        .mobile-menu-btn {
            display: none; /* 默认隐藏 */
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 20px;
            background: transparent;
            border: none;
            cursor: pointer;
            z-index: 1003;
        }
        .mobile-menu-btn span {
            width: 100%; height: 2px; background-color: #fff; border-radius: 2px; transition: all 0.3s ease;
        }
        
        /* 移动端菜单下拉框 (默认隐藏) */
        .mobile-dropdown-menu {
            display: none; 
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: rgba(5, 7, 10, 0.98);
            backdrop-filter: blur(25px);
            border-bottom: 1px solid var(--border-line);
            padding: 1rem 2rem 2rem;
            flex-direction: column;
            gap: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            z-index: 999;
        }

        /* ================= 响应式调整 (Mobile/iPad <= 1024px) ================= */
        @media (max-width: 1024px) {
            
            /* 1. 隐藏 Desktop 的中间导航和右侧 Admin */
            .desktop-center-tabs { display: none !important; }
            .desktop-admin-container { display: none !important; }

            /* 2. 显示汉堡菜单 */
            .mobile-menu-btn { display: flex; }

            /* 3. 设置下拉菜单样式 */
            nav.nav-open .mobile-menu-btn span:nth-child(1) { transform: translateY(9px) rotate(45deg); }
            nav.nav-open .mobile-menu-btn span:nth-child(2) { opacity: 0; }
            nav.nav-open .mobile-menu-btn span:nth-child(3) { transform: translateY(-9px) rotate(-45deg); }
            
            nav.nav-open .mobile-dropdown-menu {
                display: flex; /* 打开时显示 */
                animation: slideDownMenu 0.3s ease forwards;
            }

            /* 移动端内部样式重置 */
            .mobile-dropdown-menu .nav-tabs {
                flex-direction: column;
                background: transparent;
                border: none;
                width: 100%;
                padding: 0;
            }
            .mobile-dropdown-menu .nav-btn,
            .mobile-dropdown-menu .admin-btn {
                width: 100%;
                text-align: left;
                padding: 1rem 1.5rem;
                background: rgba(255,255,255,0.05);
                border-radius: 12px;
                margin-bottom: 5px;
            }
            .mobile-dropdown-menu .admin-btn {
                display: flex;
                justify-content: space-between;
                margin-top: 10px;
            }
        }

        @keyframes slideDownMenu {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ================= 其余通用样式 ================= */
        .hero { text-align: center; padding: 5rem 2rem 3rem; }
        .hero h1 { font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 0.5rem; text-transform: uppercase; animation: fadeInUp 0.8s ease 0.2s forwards; opacity: 0; }
        .hero p { color: #94a3b8; font-size: 1.1rem; opacity: 0; animation: fadeInUp 0.8s ease 0.4s forwards; }

        .content-container { flex: 1; max-width: 1400px; margin: 0 auto; padding: 0 2rem 4rem; width: 100%; }
        .tab-content { display: none; }
        .tab-content.active { display: block; }

        .group-section { margin-bottom: 3.5rem; opacity: 0; animation: fadeInUp 0.8s ease forwards; }
        .group-section:nth-child(1) { animation-delay: 0.2s; }
        .group-section:nth-child(2) { animation-delay: 0.3s; }
        .group-section:nth-child(3) { animation-delay: 0.4s; }
        .group-section:nth-child(4) { animation-delay: 0.5s; }

        .group-header { display: flex; align-items: center; gap: 15px; margin-bottom: 1.5rem; border-bottom: 1px solid var(--border-line); padding-bottom: 1rem; }
        .group-icon { font-size: 1.8rem; animation: bounceSoft 2.5s infinite; }
        .group-title { font-size: 1.5rem; }

        .sub-group { margin-bottom: 2rem; position: relative; }
        .sub-group-label { display: inline-block; font-weight: 700; background: var(--bg-label); padding: 4px 12px; border-radius: 6px; margin-bottom: 1rem; border: 1px solid rgba(60, 167, 255, 0.2); font-family: 'Monaco', monospace; }

        .links-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 1.5rem; }
        .grid-fixed-4 { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; }

        .link-card { background: var(--bg-card); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 16px; padding: 1.5rem; text-decoration: none; transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); position: relative; overflow: hidden; display: flex; flex-direction: column; backdrop-filter: blur(10px); opacity: 0; transform: translateY(20px); animation: cardEntry 0.6s ease forwards; }
        
        @media (hover: hover) {
            .link-card:hover { background: var(--bg-card-hover); transform: translateY(-8px) scale(1.02); border-color: rgba(60, 167, 255, 0.6); box-shadow: 0 15px 40px -10px rgba(0, 136, 255, 0.4); z-index: 10; }
            .link-card:hover h4 { color: #fff; text-shadow: 0 0 10px rgba(60, 167, 255, 0.8); }
            .link-card:hover span { background: rgba(0, 136, 255, 0.2); color: #bde0ff; }
            .link-card:hover::before { width: 5px; box-shadow: 0 0 20px currentColor; }
        }
        .link-card:active { transform: scale(0.98); background: var(--bg-card-hover); }

        .link-card h4 { color: #fff; font-size: 1.05rem; margin-bottom: 0.5rem; font-weight: 600; line-height: 1.4; }
        .link-card span { color: #94a3b8; font-size: 0.8rem; font-family: 'Monaco', monospace; background: rgba(0,0,0,0.3); padding: 4px 8px; border-radius: 4px; width: fit-content; word-break: break-all; }
        
        .link-card::before { content: ''; position: absolute; left: 0; top: 0; bottom: 0; width: 3px; transition: 0.3s ease; }
        
        /* 主题颜色类 */
        .theme-blue::before { background: var(--theme-blue); box-shadow: 0 0 10px var(--theme-blue); }
        .theme-red::before { background: var(--theme-red); box-shadow: 0 0 10px var(--theme-red); }
        .theme-green::before { background: var(--theme-green); box-shadow: 0 0 10px var(--theme-green); }
        .theme-purple::before { background: var(--theme-purple); box-shadow: 0 0 10px var(--theme-purple); }
        .theme-orange::before { background: var(--theme-orange); box-shadow: 0 0 10px var(--theme-orange); }
        .theme-pink::before { background: var(--theme-pink); box-shadow: 0 0 10px var(--theme-pink); }
        .theme-gold::before { background: var(--theme-gold); box-shadow: 0 0 10px var(--theme-gold); }

        footer { border-top: 1px solid var(--border-line); padding: 2rem; text-align: center; color: #475569; margin-top: auto; }

        @keyframes bgBreath { 0% { background-color: #05070a; } 100% { background-color: #0a0e14; } }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes cardEntry { from { opacity: 0; transform: translateY(40px) scale(0.95); } to { opacity: 1; transform: translateY(0) scale(1); } }
        @keyframes floatIcon { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
        @keyframes bounceSoft { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.15); filter: brightness(1.2); } }

        @media (max-width: 1200px) {
            .grid-fixed-4 { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 600px) {
            .grid-fixed-4 { grid-template-columns: 1fr; }
            .hero h1 { font-size: 2rem; }
            .nav-container { padding: 0 1rem; }
            .links-grid { grid-template-columns: 1fr; }
            /* .sub-group-label { font-size: 0.75rem; } */
            .group-title { font-size: 1rem; }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <nav id="navbar">
        <div class="nav-container">
            
            <!-- 1. LEFT: Logo -->
            <a href="#" class="logo">
                <span class="logo-icon">💠</span>
                <span class="gradient-text">SMD Daily</span>
            </a>
            
            <!-- 2. CENTER: Tabs (Desktop Only) -->
            <div class="desktop-center-tabs">
                <div class="nav-tabs">
                    <button class="nav-btn active" onclick="switchTab('winbox')">Winbox</button>
                    <button class="nav-btn" onclick="switchTab('atas')">Atas</button>
                    <button class="nav-btn" onclick="switchTab('ddwin')">Ddwin</button>
                </div>
            </div>

            <!-- 3. RIGHT: Admin (Desktop) & Hamburger (Mobile) -->
            <div class="nav-right">
                <!-- Desktop Admin Button -->
                <div class="desktop-admin-container">
                    <a href="http://127.0.0.1:8000/admin" target="_blank" class="admin-link">
                        <button class="nav-btn admin-btn">
                            Admin Dashbaord →
                        </button>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <button class="mobile-menu-btn" onclick="toggleMenu()">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>

        <!-- Mobile Dropdown Menu (Hidden on Desktop) -->
        <div class="mobile-dropdown-menu">
            <div class="nav-tabs">
                <button class="nav-btn active" onclick="switchTab('winbox')">Winbox</button>
                <button class="nav-btn" onclick="switchTab('atas')">Atas</button>
                <button class="nav-btn" onclick="switchTab('ddwin')">DDwin</button>
            </div>
            <a href="http://127.0.0.1:8000/admin" target="_blank" class="admin-link">
                <button class="nav-btn admin-btn">
                    Admin Panel <span>→</span>
                </button>
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <h1 class="gradient-text">Daily Control Center</h1>
        <p>SMD Daily 核心业务管理系统</p>
    </section>

    <!-- Main Content -->
    <div class="content-container">

        <!-- ======================= WINBOX TAB ======================= -->
        <div id="winbox" class="tab-content active">
            
            <!-- 1. Football Data -->
            <div class="group-section">
                <div class="group-header">
                    <span class="group-icon">⚽</span>
                    <h3 class="group-title gradient-text">足球Daily (Football)</h3>
                </div>

                <!-- Row 1: MY Football (Theme: Blue) -->
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-blue);">⚽ MY 足球</span>
                    <div class="links-grid">
                        <a href="http://127.0.0.1:8000/my-football" target="_blank" class="link-card theme-blue">
                            <h4>MY Football (0)</h4>
                            <span>My-Football 0 场</span>
                        </a>
                        <a href="http://127.0.0.1:8000/my-football-1" target="_blank" class="link-card theme-blue">
                            <h4>MY Football (1)</h4>
                            <span>My-Football 1</span>
                        </a>
                        <a href="http://127.0.0.1:8000/my-football-2" target="_blank" class="link-card theme-blue">
                            <h4>MY Football (2)</h4>
                            <span>My-Football 2</span>
                        </a>
                    </div>
                </div>

                <!-- Row 2: TH Football (Theme: Red) -->
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-red);">⚽ TH 足球</span>
                    <div class="links-grid">
                        <a href="http://127.0.0.1:8000/th-football" target="_blank" class="link-card theme-red">
                            <h4>TH Football (0)</h4>
                            <span>TH-Football 0 场</span>
                        </a>
                        <a href="http://127.0.0.1:8000/th-football-1" target="_blank" class="link-card theme-red">
                            <h4>TH Football (1)</h4>
                            <span>TH-Football 1</span>
                        </a>
                        <a href="http://127.0.0.1:8000/th-football-2" target="_blank" class="link-card theme-red">
                            <h4>TH Football (2)</h4>
                            <span>TH-Football 2</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. Horse Racing -->
            <div class="group-section">
                <div class="group-header">
                    <span class="group-icon">🏇</span>
                    <h3 class="group-title gradient-text">赛马Daily (Horse Racing)</h3>
                </div>

                <!-- Row 1: MY (Theme: Purple) -->
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-blue);">🏇 MY 赛马</span>
                    <div class="links-grid">
                        <a href="http://127.0.0.1:8000/my-horse" target="_blank" class="link-card theme-blue">
                            <h4>MY Horse (0)</h4>
                            <span>MY-Horse 0 场</span>
                        </a>
                        <a href="http://127.0.0.1:8000/my-horse-1" target="_blank" class="link-card theme-blue">
                            <h4>MY Horse (1)</h4>
                            <span>MY-Horse 1</span>
                        </a>
                        <a href="http://127.0.0.1:8000/my-horse-2" target="_blank" class="link-card theme-blue">
                            <h4>MY Horse (2)</h4>
                            <span>MY-Horse 2</span>
                        </a>
                    </div>
                </div>

                <!-- Row 2: MY-USD (Theme: Green) -->
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-green);">🏇 MY-USD 赛马</span>
                    <div class="links-grid">
                        <a href="http://127.0.0.1:8000/my-usd-horse" target="_blank" class="link-card theme-green">
                            <h4>MY USD Horse (0)</h4>
                            <span>MY-USD Horse 0 场</span>
                        </a>
                        <a href="http://127.0.0.1:8000/my-usd-horse-1" target="_blank" class="link-card theme-green">
                            <h4>MY USD Horse (1)</h4>
                            <span>MY-USD Horse 1</span>
                        </a>
                        <a href="http://127.0.0.1:8000/my-usd-horse-2" target="_blank" class="link-card theme-green">
                            <h4>MY USD Horse (2)</h4>
                            <span>MY-USD Horse 2</span>
                        </a>
                    </div>
                </div>

                <!-- Row 3: TH (Theme: Pink) -->
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-pink);">🏇 TH 赛马</span>
                    <div class="links-grid">
                        <a href="http://127.0.0.1:8000/th-horse" target="_blank" class="link-card theme-pink">
                            <h4>TH Horse (0)</h4>
                            <span>TH-Horse 0 场</span>
                        </a>
                        <a href="http://127.0.0.1:8000/th-horse-1" target="_blank" class="link-card theme-pink">
                            <h4>TH Horse (1)</h4>
                            <span>TH-Horse 1</span>
                        </a>
                        <a href="http://127.0.0.1:8000/th-horse-2" target="_blank" class="link-card theme-pink">
                            <h4>TH Horse (2)</h4>
                            <span>TH-Horse 2</span>
                        </a>
                    </div>
                </div>

                <!-- Row 4: TH-USD (Theme: Orange) -->
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-orange);">🏇 TH-USD 赛马</span>
                    <div class="links-grid">
                        <a href="http://127.0.0.1:8000/th-usd-horse" target="_blank" class="link-card theme-orange">
                            <h4>TH USD Horse (0)</h4>
                            <span>TH-USD Horse 0 场</span>
                        </a>
                        <a href="http://127.0.0.1:8000/th-usd-horse-1" target="_blank" class="link-card theme-orange">
                            <h4>TH USD Horse (1)</h4>
                            <span>TH-USD Horse 1</span>
                        </a>
                        <a href="http://127.0.0.1:8000/th-usd-horse-2" target="_blank" class="link-card theme-orange">
                            <h4>TH USD Horse (2)</h4>
                            <span>TH-USD Horse 2</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 3. Jackpot System (Theme: Gold) -->
            <div class="group-section">
                <div class="group-header">
                    <span class="group-icon">🎰</span>
                    <h3 class="group-title gradient-text">奖池管理 (Jackpot System)</h3>
                </div>

                <!-- Row 1: All Winbox Jackpot -->
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-gold);">💎 Winbox Jackpot</span>
                    <div class="grid-fixed-4">
                        <!-- 1. MYR Winbox -->
                        <a href="http://127.0.0.1:8000/myr-winbox-jackpot" target="_blank" class="link-card theme-gold">
                            <h4>MYR Winbox Jackpot</h4>
                            <span>Myr-Winbox-Jackpot</span>
                        </a>
                        <!-- 2. MYR-USD Winbox -->
                        <a href="http://127.0.0.1:8000/myr-usd-winbox-jackpot" target="_blank" class="link-card theme-gold">
                            <h4>MYR-USD Winbox Jackpot</h4>
                            <span>Myr-USD-Winbox-Jackpot</span>
                        </a>
                        <!-- 3. THB Winbox -->
                        <a href="http://127.0.0.1:8000/thb-winbox-jackpot" target="_blank" class="link-card theme-gold">
                            <h4>THB Winbox Jackpot</h4>
                            <span>Thb-Winbox-Jackpot</span>
                        </a>
                        <!-- 4. THB-USD Winbox -->
                        <a href="http://127.0.0.1:8000/thb-usd-winbox-jackpot" target="_blank" class="link-card theme-gold">
                            <h4>THB-USD Winbox Jackpot</h4>
                            <span>Thb-USD-Winbox-Jackpot</span>
                        </a>
                    </div>
                </div>

                <!-- Row 2: All Lucky Jackpot -->
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-gold);">🍀 Lucky Jackpot</span>
                    <div class="grid-fixed-4">
                        <!-- 1. MYR Lucky -->
                        <a href="http://127.0.0.1:8000/myr-lucky-jackpot" target="_blank" class="link-card theme-gold">
                            <h4>MYR Lucky Jackpot</h4>
                            <span>Myr-Lucky-Jackpot</span>
                        </a>
                        <!-- 2. MYR-USD Lucky -->
                        <a href="http://127.0.0.1:8000/myr-usd-lucky-jackpot" target="_blank" class="link-card theme-gold">
                            <h4>MYR-USD Lucky Jackpot</h4>
                            <span>Myr-USD-Lucky-Jackpot</span>
                        </a>
                        <!-- 3. TH Lucky -->
                        <a href="http://127.0.0.1:8000/th-lucky-jackpot" target="_blank" class="link-card theme-gold">
                            <h4>TH Lucky Jackpot</h4>
                            <span>Th-Lucky-Jackpot</span>
                        </a>
                        <!-- 4. TH-USD Lucky -->
                        <a href="http://127.0.0.1:8000/th-usd-lucky-jackpot" target="_blank" class="link-card theme-gold">
                            <h4>TH-USD Lucky Jackpot</h4>
                            <span>Th-USD-Lucky-Jackpot</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- 4. Maintain (Theme: Red) -->
            <div class="group-section">
                <div class="group-header">
                    <span class="group-icon">🛠️</span>
                    <h3 class="group-title gradient-text">Winbox系统维护 (Winbox Maintenance)</h3>
                </div>
                
                <div class="sub-group">
                    <span class="sub-group-label" style="border-color: var(--theme-red);">⚠️ All Winbox Maintenance</span>
                    <div class="grid-fixed-4">
                        <a href="http://127.0.0.1:8000/myr-maintain" target="_blank" class="link-card theme-red">
                            <h4>MYR Winbox Maintain</h4>
                            <span>Myr-Winbox-Maintain</span>
                        </a>
                        <a href="http://127.0.0.1:8000/myr-usd-maintain" target="_blank" class="link-card theme-red">
                            <h4>MYR-USD Winbox Maintain</h4>
                            <span>Myr-USD-Winbox-Maintain</span>
                        </a>
                        <a href="http://127.0.0.1:8000/th-maintain" target="_blank" class="link-card theme-red">
                            <h4>TH Winbox Maintain</h4>
                            <span>Th-Winbox-Maintain</span>
                        </a>
                        <a href="http://127.0.0.1:8000/th-usd-maintain" target="_blank" class="link-card theme-red">
                            <h4>TH-USD WinboxMaintain</h4>
                            <span>Th-USD-Winbox-Maintain</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- ======================= ATAS TAB ======================= -->
        <div id="atas" class="tab-content">
            <div class="group-section">
                <h3 class="group-title gradient-text">Atas Configuration</h3>
                <div style="background: rgba(255,255,255,0.02); padding: 3rem; border-radius: 16px; text-align: center; border: 1px dashed rgba(60, 167, 255, 0.3); margin-top: 1rem;">
                    <p style="color: #64748b;">Configuration pending...</p>
                </div>
            </div>
        </div>

        <!-- ======================= DDWIN TAB ======================= -->
        <div id="ddwin" class="tab-content">
            <div class="group-section">
                <h3 class="group-title gradient-text">Ddwin Configuration</h3>
                <div style="background: rgba(255,255,255,0.02); padding: 3rem; border-radius: 16px; text-align: center; border: 1px dashed rgba(60, 167, 255, 0.3); margin-top: 1rem;">
                    <p style="color: #64748b;">Configuration pending...</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer>
        <p>Smart Multimedia Design Management Daily System</p>
    </footer>

    <script>
        // Tab 切换逻辑
        function switchTab(tabId) {
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
            
            // 移除所有按钮的 active 类（包括 desktop 和 mobile）
            document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active'));

            const selectedTab = document.getElementById(tabId);
            if(selectedTab) {
                selectedTab.classList.add('active');
                // 动画重置
                const cards = selectedTab.querySelectorAll('.link-card');
                cards.forEach(card => {
                    card.style.animation = 'none';
                    card.offsetHeight; 
                    card.style.animation = null; 
                });
            }

            // 获取点击的按钮文字，同步激活 Desktop 和 Mobile 菜单里的同名按钮
            const clickedBtn = event.currentTarget || event.target;
            const clickedText = clickedBtn.innerText;

            document.querySelectorAll('.nav-btn').forEach(btn => {
                if (btn.innerText === clickedText) {
                    btn.classList.add('active');
                }
            });

            // 移动端：点击后自动收起菜单
            const navbar = document.getElementById('navbar');
            if(navbar.classList.contains('nav-open')) toggleMenu();
        }

        // Mobile Menu 切换逻辑
        function toggleMenu() {
            document.getElementById('navbar').classList.toggle('nav-open');
        }
    </script>
</body>
</html>