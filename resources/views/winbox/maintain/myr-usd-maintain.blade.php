<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Maintenance - USD</title>
    <!-- 引入 FontAwesome 图标库 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* =========================================================
           1. 公共基础设置 (SHARED BASE)
        ========================================================= */
        :root {
            --bg-black: #111;
            --gold-gradient: linear-gradient(to bottom, #fff8db 0%, #ffc107 50%, #ff9800 100%);
            --gold-text: #ffc107;
            --dark-blue-text: #0d2650;
            --line-blue: #4077a5;
            --red-dot: #ff0000;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Microsoft YaHei", Arial, sans-serif;
            line-height: 1.5;
            background-color: #f4f4f4;
        }

        img {
            display: block;
            max-width: 100%;
        }

        /* --- 动画定义 --- */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes borderGlow {
            0% { box-shadow: 0 0 5px rgba(255, 193, 7, 0.2); border-color: rgba(255, 193, 7, 0.4); }
            50% { box-shadow: 0 0 20px rgba(255, 193, 7, 0.6); border-color: rgba(255, 193, 7, 1); }
            100% { box-shadow: 0 0 5px rgba(255, 193, 7, 0.2); border-color: rgba(255, 193, 7, 0.4); }
        }
        @keyframes swing {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(15deg); }
            75% { transform: rotate(-15deg); }
            100% { transform: rotate(0deg); }
        }

        /* --- Winbox Logo/Text 样式 (通用) --- */
        .winbox-logo {
            font-family: Arial, sans-serif;
            font-weight: 900;
            font-style: italic;
            background: linear-gradient(to bottom, #fff8db 10%, #ffc107 45%, #ff9800 90%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 8px rgba(255, 193, 7, 0.6)) drop-shadow(0 0 15px rgba(255, 152, 0, 0.4));
            display: block;
        }

        /* --- USD 货币标签样式 (已修改) --- */
        .currency-badge {
            position: absolute;
            top: 25px;
            right: 20px;
            z-index: 100;
            display: flex;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .badge-left {
            /* 修改：50% 硬切分渐变 (浅绿/深绿) */
            background: linear-gradient(to bottom,
                #4cd964 0%,   #4cd964 50%,
                #28a745 50%,  #28a745 100%
            );
            padding: 5px 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.6);
            position: relative;
        }

        .badge-right {
            /* 修改：50% 硬切分渐变 (浅紫/深紫) */
            background: linear-gradient(to bottom,
                #6b5fff 0%,   #6b5fff 50%,
                #4e3cf5 50%,  #4e3cf5 100%
            );
            padding: 5px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.4);
        }

        .badge-right span {
            font-weight: 900;
            font-family: Arial, sans-serif;
            color: #fff;
            font-size: 24px;
            /* 修改：加深文字阴影 */
            text-shadow: 0 2px 0 rgba(0,0,0,0.2);
            letter-spacing: 0.5px;
        }

        .coin-icon {
            width: 32px;
            height: 32px;
            /* 修改：更像图中的青色/白色径向渐变 */
            background: radial-gradient(circle, #49abed 30%, #2471d1 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff; /* 图标颜色改为深青色 */
            font-size: 18px;
            border: 2px solid rgba(255,255,255,0.6);
            box-shadow: 0 2px 2px rgba(0,0,0,0.2);
        }

        /* =========================================
           [NEW] BACK TO TOP BUTTON (Global Styles)
           使用 Section 1 的金色/黑色主题
           ========================================= */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            width: 55px;
            height: 55px;
            border: none;
            outline: none;
            cursor: pointer;
            border-radius: 50%;

            /* Theme Color: Gold/Black */
            background: var(--bg-black); /* 黑色背景 */
            border: 2px solid var(--gold-text); /* 金色边框 */
            box-shadow: 0 6px 15px rgba(0,0,0,0.6), 0 0 10px var(--gold-text); /* 黑色和金色阴影 */

            display: flex;
            align-items: center;
            justify-content: center;

            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            transform: translateY(-3px) scale(1.05);
            background: #1e1e1e; /* 稍微浅一点的黑色 */
            box-shadow: 0 8px 20px rgba(0,0,0,0.8), 0 0 15px var(--gold-text);
        }

        /* The SVG Icon Style - Solid White Arrow */
        .back-to-top svg {
            width: 30px;
            height: 30px;
            fill: var(--gold-text); /* 金色箭头 */
            filter: drop-shadow(0 0 2px rgba(255, 193, 7, 0.5));
        }

        /* =========================================================
           2. 桌面端样式 (DESKTOP STYLES)
        ========================================================= */
        @media only screen and (min-width: 769px) {
            body {
                padding-bottom: 50px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .layout-block {
                width: 50%;
                min-width: 50%;
                max-width: 50%;
                margin: 0 auto;
            }

            .maint-header {
                background-color: var(--bg-black);
                background-image: radial-gradient(circle at 50% 40%, #2a2a2a 0%, #000 70%);
                text-align: center;
                padding: 40px 30px 40px;
                color: white;
                position: relative;
                box-shadow: 0 10px 30px rgba(0,0,0,0.5);
                margin-bottom: 30px;
            }

            .hazard-stripe {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 24px;
                background-image: repeating-linear-gradient(
                    -45deg,
                    #ffc107,
                    #ffc107 30px,
                    #000000 30px,
                    #000000 60px
                );
                box-shadow: 0 -2px 10px rgba(0,0,0,0.5);
                border-top: 2px solid #000;
                z-index: 10;
            }

            /* --- 头部区域 flex 布局 --- */
            .header-main-icon {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 40px;
                position: static; /* 保持默认，让内部文字居中 */
            }

            /* 文字组布局 (Desktop) */
            .text-group {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                /* margin-right: 30px;  <-- REMOVED: 移除右边距 */
                margin-right: 0;
                line-height: 1.1;
                /* 确保宽度占满或居中 */
                text-align: center;
            }

            .title-en {
                font-size: 60px;
                letter-spacing: 2px;
            }
            .title-cn {
                font-size: 60px;
                margin-top: 5px;
                letter-spacing: 5px;
            }

            .icon-wrapper {
                /* CHANGED: 改为绝对定位到左上角 */
                position: absolute;
                top: 30px;
                left: 30px;
                /* End Change */
                width: 80px;
                height: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: var(--gold-text);
            }
            .icon-wrapper .fa-gear { font-size: 70px; animation: spin 8s linear infinite; }
            .icon-wrapper .fa-wrench {
                position: absolute;
                font-size: 45px;
                right: -7px; bottom: -7px;
                color: #fff;
                animation: swing 3s ease-in-out infinite;
                transform-origin: bottom right;
                text-shadow: 0 0 5px rgba(0,0,0,0.5);
            }

            .maintenance-card {
                position: relative;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 193, 7, 0.5);
                border-radius: 12px;
                padding: 40px 25px 25px;
                margin-bottom: 40px;
                display: flex;
                flex-direction: column;
                align-items: center;
                animation: borderGlow 3s infinite;
            }

            .card-border-icon {
                position: absolute;
                top: -25px;
                left: 50%;
                transform: translateX(-50%);
                width: 50px; height: 50px;
                background: #000;
                border: 2px solid var(--gold-text);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--gold-text);
                font-size: 24px;
                box-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
                z-index: 10;
            }

            .logo-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
                margin-bottom: 15px;
                width: 100%;
            }
            .logo-img {
                height: 150px;
                width: 150px;
                object-fit: contain;
                padding: 5px;
            }

            .time-display {
                font-size: 40px;
                font-weight: bold;
                color: #fff;
                margin-top: 5px;
            }
            .time-display .highlight {
                color: var(--gold-text);
                display: block;
                font-size: 40px;
                text-shadow: 0 0 10px rgba(255,193,7,0.3);
            }

            .main-status { display: none; }

            .maint-content {
                background-color: transparent;
                padding: 0 10px;
            }
            .intro-text {
                color: var(--dark-blue-text);
                font-weight: bold;
                font-size: 30px;
                margin-bottom: 40px;
                line-height: 1.6;
            }
            .content-item { margin-bottom: 40px; }
            .provider-header {
                font-size: 30px;
                font-weight: 800;
                color: var(--dark-blue-text);
                display: flex;
                align-items: center;
            }
            .dot { color: var(--red-dot); font-size: 45px; margin-right: 10px; }
            .icon-finger { font-size: 30px; margin-right: 10px; }
            .time-row {
                display: flex;
                align-items: flex-start;
                margin-bottom: 12px;
                font-size: 30px;
                color: #444;
            }
            .time-label { color: #555; margin-right: 8px; }
            .time-val { display: block; font-weight: bold; color: var(--dark-blue-text); font-size: 30px; }
            .notice-block { margin-top: 20px; margin-bottom: 20px; }
            .notice-title {
                color: var(--dark-blue-text);
                font-size: 30px;
                font-weight: bold;
                margin-bottom: 10px;
                display: flex;
                align-items: center;
            }
            .notice-title .red-dot { color: var(--red-dot); font-size: 30px; margin-right: 8px; }
            .notice-text {
                color: var(--dark-blue-text);
                font-size: 30px;
                font-weight: 600;
                line-height: 1.6;
            }
            .separator-line {
                display: block;
                width: 100%;
                height: 6px;
                background-color: var(--line-blue);
                margin: 35px 0;
                border-radius: 2px;
            }
            .footer-logo { text-align: right; margin-top: 20px; opacity: 0.6; }

            /* [NEW] Desktop Back-to-Top Positioning */
            .back-to-top {
                bottom: 50px;
                right: 350px;
                width: 60px;
                height: 60px;
            }
            .back-to-top svg {
                width: 30px;
                height: 30px;
            }
        }

        /* =========================================================
           3. 手机端样式 (MOBILE STYLES)
        ========================================================= */
        @media only screen and (max-width: 768px) {
            body {
                background-color: #fff;
                color: #333;
            }

            .layout-block {
                width: 100%;
                margin: 0;
                display: block;
            }

            .maint-header {
                background-color: var(--bg-black);
                background-image: radial-gradient(circle at 50% 40%, #2a2a2a 0%, #000 70%);
                text-align: center;
                padding: 35px 15px 15px;
                color: white;
                position: relative;
            }

            .hazard-stripe {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 16px;
                background-image: repeating-linear-gradient(
                    -45deg,
                    #ffc107,
                    #ffc107 15px,
                    #000000 15px,
                    #000000 30px
                );
                box-shadow: 0 -2px 5px rgba(0,0,0,0.5);
                border-top: 1px solid #000;
                z-index: 10;
            }

            .currency-badge {
                top: 20px;
                right: 15px;
            }

            .badge-left {
                padding: 4px 8px;
            }
            .badge-right {
                padding: 4px 12px;
            }

            .badge-right span {
                font-size: 20px;
            }

            .coin-icon {
                width: 26px;
                height: 26px;
                font-size: 14px;
                border-width: 1.5px;
            }

            .header-main-icon {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 40px 10px; /* 调整边距防止溢出 */
            }

            /* 文字组布局 (Mobile) */
            .text-group {
                display: flex;
                flex-direction: column;
                align-items: center;
                /* margin-right: 15px; <--- REMOVED: 移除右边距 */
                margin-right: 0;
                line-height: 1.2;
            }

            .title-en {
                font-size: 32px;
                letter-spacing: 1px;
            }
            .title-cn {
                font-size: 35px;
                margin-top: 2px;
                letter-spacing: 3px;
            }

            .icon-wrapper {
                /* CHANGED: 改为绝对定位到左上角 */
                position: absolute;
                top: 15px;
                left: 15px;
                /* End Change */
                width: 45px; height: 45px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: var(--gold-text);
            }
            .icon-wrapper .fa-gear { font-size: 50px; animation: spin 8s linear infinite; }
            .icon-wrapper .fa-wrench {
                position: absolute;
                font-size: 30px;
                right: -15px; bottom: -12px;
                color: #fff;
                animation: swing 3s ease-in-out infinite;
                transform-origin: bottom right;
                text-shadow: 0 0 3px rgba(0,0,0,0.5);
            }

            .maintenance-card {
                position: relative;
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 193, 7, 0.5);
                border-radius: 10px;
                padding: 35px 10px 20px;
                margin-bottom: 30px;
                display: flex;
                flex-direction: column;
                align-items: center;
                animation: borderGlow 3s infinite;
            }

             .card-border-icon {
                position: absolute;
                top: -20px;
                left: 50%;
                transform: translateX(-50%);
                width: 40px; height: 40px;
                background: #000;
                border: 2px solid var(--gold-text);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--gold-text);
                font-size: 18px;
                box-shadow: 0 0 8px rgba(255, 193, 7, 0.5);
                z-index: 10;
            }

            .logo-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                margin-bottom: 10px;
                width: 100%;
            }
            .logo-img {
                height: 100px;
                width: 100px;
                object-fit: contain;
                padding: 3px;
            }

            .time-display {
                font-size: 30px;
                font-weight: bold;
                color: #fff;
            }
            .time-display .highlight {
                color: var(--gold-text);
                display: block;
                margin-top: 2px;
                font-size: 28px;
            }

            .main-status { display: none; }

            .maint-content {
                background-color: #fff;
                padding: 30px 20px;
            }
            .intro-text {
                color: var(--dark-blue-text);
                font-weight: bold;
                font-size: 23px;
                margin-bottom: 25px;
                line-height: 1.5;
            }
            .content-item {
                padding-bottom: 20px;
            }
            .content-item:last-child { border-bottom: none; }
            .provider-header {
                font-size: 22px;
                font-weight: 800;
                color: var(--dark-blue-text);
                display: flex;
                align-items: center;
            }
            .dot { color: var(--red-dot); font-size: 40px; margin-right: 6px; }
            .icon-finger { font-size: 30px; margin-right: 8px; }
            .time-row {
                display: flex;
                align-items: flex-start;
                margin-bottom: 10px;
                font-size: 22px;
                color: #444;
            }
            .time-label { color: var(--dark-blue-text); font-weight: bold; margin-right: 5px; white-space: nowrap; }
            .time-val { display: block; font-weight: bold; color: var(--dark-blue-text); font-size: 23px; }
            .notice-block { margin-top: 10px; margin-bottom: 10px; }
            .notice-title {
                color: var(--dark-blue-text);
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 8px;
                display: flex;
                align-items: center;
            }
            .notice-title .red-dot { color: var(--red-dot); font-size: 30px; margin-right: 6px; }
            .notice-text {
                color: var(--dark-blue-text);
                font-size: 23px;
                font-weight: 600;
                line-height: 1.5;
            }
            .separator-line {
                display: block;
                width: 100%;
                height: 5px;
                background-color: var(--line-blue);
                margin: 20px 0;
                border-radius: 2px;
            }
        }
    </style>
</head>
<body>

    <!-- SECTION ONE: 顶部视觉 -->
    <div class="maint-header layout-block">

        <div class="currency-badge">
            <div class="badge-left">
                <div class="coin-icon">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
            </div>
            <div class="badge-right">
                <span>USD</span>
            </div>
        </div>

        <!-- MAINT/维修 上下居中显示 -->
        <div class="header-main-icon">
            <!-- 文字组容器 -->
            <div class="text-group">
                <span class="winbox-logo title-en">MAINTENANCE</span>
                <span class="winbox-logo title-cn">维修</span>
            </div>

            <!-- 图标容器 -->
            <div class="icon-wrapper">
                <i class="fa-solid fa-gear"></i>
                <i class="fa-solid fa-wrench"></i>
            </div>
        </div>

        @foreach($maintainDatas as $data)
        <div class="maintenance-card">
            <div class="card-border-icon">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>

            <div class="logo-container">
                @foreach($data->items as $item)
                    <img class="logo-img" src="{{ asset('storage/' . $item->logo_path) }}" alt="Game Logo">
                @endforeach
            </div>

            <div class="time-display">
                {{ $data->date->format('d/m/Y (D)') }}<br>
                <span class="highlight">
                    {{ $data->start_time->format('H:i') }} - {{ $data->end_time->format('H:i') }} (GMT+8)
                </span>
            </div>
        </div>
        @endforeach

        <div class="hazard-stripe"></div>
    </div>

    <!-- SECTION TWO: 底部内容 -->
    <div class="maint-content layout-block">

        <!-- PART A: 中文区域 -->
        <div class="lang-section-cn">
            <div class="intro-text">
                @foreach($maintainInfos1 as $item)
                    {{ $item->intro_text }}
                @endforeach
            </div>

            @foreach($maintainInfoZhs as $item)
            <div class="content-item">
                <div class="provider-header"><span class="dot">●</span>{{ $item->provider_header }}</div>
                <div class="time-row">
                    <span class="icon-finger">👉</span>
                    <div>
                        <span class="time-label">开始时间:</span>
                        <span class="time-val">
                            {{ $item->start_date }}<br>
                            {{ $item->start_time }}
                        </span>
                    </div>
                </div>
                <div class="time-row">
                    <span class="icon-finger">👉</span>
                    <div>
                        <span class="time-label">完成时间:</span>
                        <span class="time-val">
                            {{ $item->completion_date }}<br>
                            {{ $item->completion_time }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="notice-block">
                <div class="notice-title">
                    <span class="icon-finger">👉</span>维护期间
                </div>
                <div class="notice-text">
                    @foreach($maintainInfos1 as $item)
                        {{ $item->notice_text }}
                    @endforeach
                </div>
            </div>
        </div>

        <div class="separator-line"></div>

        <!-- PART B: 英文区域 -->
        <div class="lang-section-en">

            <div class="intro-text">
                @foreach($maintainInfos2 as $item)
                    {{ $item->intro_text }}
                @endforeach
            </div>

            @foreach($maintainInfoEns as $item)
            <div class="content-item">
                <div class="provider-header"><span class="dot">●</span> {{ $item->provider_header }}</div>
                <div class="time-row">
                    <span class="icon-finger">👉</span>
                    <div>
                        <span class="time-label">Start time:</span>
                        <span class="time-val">
                            {{ $item->start_date }}<br>
                            {{ $item->start_time }}
                        </span>
                    </div>
                </div>
                <div class="time-row">
                    <span class="icon-finger">👉</span>
                    <div>
                        <span class="time-label">Completion time:</span>
                        <span class="time-val">
                            {{ $item->completion_date }}<br>
                            {{ $item->completion_time }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="notice-block">
                <div class="notice-title">
                    <span class="icon-finger">👉</span>During maintenance
                </div>
                <div class="notice-text">
                    @foreach($maintainInfos2 as $item)
                        {{ $item->notice_text }}
                    @endforeach
                </div>
            </div>
        </div>

    </div>

        <!-- [新增] 返回顶部按钮 (实心箭头, 金色/黑色主题) -->
    <button onclick="topFunction()" id="backToTopBtn" class="back-to-top" title="Go to top">
        <!-- 向上实心箭头的 SVG (金色) -->
        <svg viewBox="0 0 24 24">
            <path d="M12 4l-8 8h6v8h4v-8h6z"></path>
        </svg>
    </button>

    <!-- [新增] 用于滚动检测和返回顶部的 JAVASCRIPT -->
    <script>
        // 获取按钮元素
        let mybutton = document.getElementById("backToTopBtn");

        // 监听屏幕滚动事件 (Scroll)
        window.addEventListener('scroll', function() {
            // 如果向下滚动超过 300px，则添加 'show' 类来显示按钮
            if (window.scrollY > 300) {
                mybutton.classList.add("show");
            } else {
                // 否则，移除 'show' 类来隐藏按钮
                mybutton.classList.remove("show");
            }
        });

        // 点击按钮时触发的函数，页面平滑滚动回顶部
        function topFunction() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

</body>
</html>
