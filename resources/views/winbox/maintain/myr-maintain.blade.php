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
                padding: 20px 30px 40px; 
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
            }

            /* ★★★ 修改：文字组布局 (Desktop) ★★★ */
            .text-group {
                display: flex;
                flex-direction: column;
                align-items: center; /* 关键：改为 center 实现居中对齐 */
                justify-content: center;
                margin-right: 30px;    /* 文字组和图标之间的间距 */
                line-height: 1.1;
            }

            .title-en { 
                font-size: 60px; /* 稍微放大使其更醒目 */
                letter-spacing: 2px; 
            }
            .title-cn { 
                font-size: 60px; 
                margin-top: 5px; /* 在两行字之间加一点空隙 */
                letter-spacing: 5px; /* 增加字间距，更有气势 */
            }

            .icon-wrapper {
                position: relative;
                width: 80px;
                height: 80px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: var(--gold-text);
            }
            .icon-wrapper .fa-gear { font-size: 70px; animation: spin 8s linear infinite; }
            .icon-wrapper .fa-wrench {
                position: absolute;
                font-size: 45px;
                right: -5px; bottom: -5px;
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
            .dot { color: var(--red-dot); font-size: 30px; margin-right: 10px; }
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
                padding: 5px 15px 15px; 
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

            .header-main-icon {
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 40px 10px; /* 调整边距防止溢出 */
            }

            /* ★★★ 修改：文字组布局 (Mobile) ★★★ */
            .text-group {
                display: flex;
                flex-direction: column;
                align-items: center; /* 关键：改为 center 实现居中对齐 */
                margin-right: 15px;
                line-height: 1.2;
            }

            .title-en { 
                font-size: 32px; /* 手机端字体大小 */
                letter-spacing: 1px; 
            }
            .title-cn { 
                font-size: 35px; 
                margin-top: 2px;
                letter-spacing: 3px;
            }

            .icon-wrapper {
                position: relative;
                width: 45px; height: 45px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: var(--gold-text);
            }
            .icon-wrapper .fa-gear { font-size: 40px; animation: spin 8s linear infinite; }
            .icon-wrapper .fa-wrench {
                position: absolute;
                font-size: 25px;
                right: -5px; bottom: -2px;
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
            .dot { color: var(--red-dot); font-size: 30px; margin-right: 6px; }
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
        
        <!-- ★★★ 修改部分：MAINTENANCE/维修 上下居中显示 ★★★ -->
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

</body>
</html>