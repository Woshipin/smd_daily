<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Jackpot Mobile View</title>
    <!-- 引入粗体字重 -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        /* =========================================
           GLOBAL RESET & VARIABLES
        ========================================= */
        :root {
            --bg-dark-red: #750e0e;
            --bg-lighter-red: #a31616;
            --card-bg: #fffaf9;
            --text-blue: #0f3e61;
            --text-red: #ff0000;
            --stroke-blue: #0056b3;
            --pill-bg-pink: #fce8e6;
            --font-stack: 'Nunito', sans-serif;
            
            /* Section 3 专用颜色 */
            --sec3-bg-blue: #9ec6ea;
            --sec3-text-blue: #538cc6;
            --sec3-text-red: #c56577;
            --sec3-border: #7facd6;

            /* Header专用颜色 */
            --header-stroke-color: #005bbb;
            --header-shadow-color: #003a75;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-stack);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;    /* 水平居中 */
            background-color: #fff;
        }

        /* =========================================
           [NEW] BACK TO TOP BUTTON (Global Styles)
           使用 Section 1 pools-row 的红色渐变
           ========================================= */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            width: 50px;
            height: 50px;
            border: none;
            outline: none;
            cursor: pointer;
            border-radius: 50%;
            
            /* Theme Color: Red Gradient (Matches Section 1/Pools Row) */
            background: linear-gradient(180deg, #eb4648 0%, #9f0407 100%);
            box-shadow: 0 6px 15px rgba(159, 4, 7, 0.5), inset 0 1px 0 rgba(255,255,255,0.3);
            
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
            /* Slightly brighter red on hover */
            background: linear-gradient(135deg, #ff6b6b 0%, #c81919 100%);
            box-shadow: 0 8px 20px rgba(159, 4, 7, 0.7);
        }

        /* The SVG Icon Style - Solid White Arrow */
        .back-to-top svg {
            width: 24px;
            height: 24px;
            fill: #ffffff; 
            filter: drop-shadow(0 2px 1px rgba(0,0,0,0.2));
        }

        /* ==========================================================================
           MOBILE STYLES (Max-Width: 480px)
        ========================================================================== */
        @media screen and (max-width: 480px) {
            
            .mobile-container {
                width: 100%;
                background-color: #fff;
                z-index: 2;
                position: relative;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
            }

            /* --- Mobile Section 1 --- */
            .section-1 {
                background-image: url("{{ asset('images/lucky_jackpot/luckyjackpot.jpg') }}");
                background-repeat: no-repeat;
                background-position: top center;
                
                /* --- 修改处 (Mobile) --- */
                /* 强制宽和高都为 100%，确保图片完整显示，不被覆盖或裁切 */
                background-size: 100% 100%; 
                
                background-color: #5c0808;  
                padding: 90px 10px 40px 10px;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            /* 新增：用于填充 top-logo 容器的图片样式 */
            .logo-image {
                width: 80%;
                height: 80%;
                object-fit: contain; /* 修改为 contain，确保完整的 logo 显示 */
                display: block;
            }
            
            /* 修改 .top-logo 以匹配截图中的 logo 样式和尺寸 */
            .top-logo {
                position: absolute; top: 10px; right: 5px;
                width: 90px; /* 增大尺寸 */
                /* height: 90px; 增大尺寸 */
                background: none; /* 移除背景 */
                border-radius: 0; /* 移除圆角 */
                border: none; /* 移除边框 */
                color: transparent; /* 文本颜色透明 */
                font-size: 0;      /* 字体大小为 0 */
                display: flex; align-items: center; justify-content: center;
                box-shadow: none; /* 移除阴影 */
                overflow: visible; /* 允许图片形状决定 */
                z-index: 20; /* 确保在顶部 */
            }

            /* --- Header 样式 (Mobile) --- */
            .header-cn {
                font-family: 'Nunito', sans-serif;
                color: #fff; 
                font-size: 28px;
                font-weight: 900;
                line-height: 1.1;
                /* margin-bottom: 2px; */
                -webkit-text-stroke: 6px var(--header-stroke-color);
                paint-order: stroke fill;
                text-shadow: 2px 2px 0px rgba(0,0,0,0.2);
                position: relative; z-index: 10;
            }
            
            .header-en {
                font-family: 'Nunito', sans-serif;
                color: #fff; 
                font-size: 18px;
                font-weight: 800; 
                /* margin-bottom: 10px; */
                line-height: 1;
                -webkit-text-stroke: 6px var(--header-stroke-color);
                paint-order: stroke fill;
                position: relative; z-index: 10;
            }

            .main-jackpot {
                font-family: 'Nunito', sans-serif;
                font-size: 47px;
                font-weight: 800; 
                color: #ffffff;
                /* margin: 5px 0 5px 0; */
                letter-spacing: -1px;
                -webkit-text-stroke: 10px #0f6cd5;
                paint-order: stroke fill;
                text-shadow: 
                    0px 3px 0px #004a99,
                    0px 6px 0px #003063,
                    0px 8px 5px rgba(0,0,0,0.4);
                position: relative; z-index: 10;
            }

            /* --- pools-row --- */
            .pools-row { 
                background: linear-gradient(180deg, #eb4648 0%, #9f0407 100%);
                border-radius: 10px; 
                padding: 20px 15px 15px 15px; 
                display: flex; 
                gap: 5px; 
                justify-content: center;
                box-shadow: inset 0 2px 5px rgba(0,0,0,0.2); 
            }

            .pool-card {
                border-radius: 8px; 
                padding: 10px 4px;
                flex: 1; 
                box-shadow: 0 3px 6px rgba(0,0,0,0.2);
                display: flex; 
                flex-direction: column; 
                justify-content: space-between;
            }

            .pool-card.red {
                background: linear-gradient(180deg, #ffffff 50%, #ffe6e6 100%);
            }

            .pool-card.blue {
                background: linear-gradient(180deg, #ffffff 50%, #e6f7ff 100%);
            }

            .pool-title-cn { font-size: 16px; font-weight: 800; margin-bottom: 2px; }
            .pool-title-en { font-size: 14px; line-height: 1.1; margin-bottom: 5px; font-weight: 600; }
            .pool-card.red .pool-title-cn, .pool-card.red .pool-title-en { color: #d93025; }
            .pool-card.blue .pool-title-cn, .pool-card.blue .pool-title-en { color: #0056b3; }
            
            .price-pill {
                border-radius: 50px; 
                color: white; 
                font-weight: 800; 
                font-size: 16px;
                padding: 6px 2px; 
                width: 100%; 
                display: flex;           
                align-items: center;     
                justify-content: center; 
                text-shadow: 0 1px 2px rgba(0,0,0,0.3); 
            }
            
            .price-pill.red { 
                /* 修改这里: 135deg */
                background: linear-gradient(135deg, #ff7b9a 0%, #eb4c52 40%, #cd1203 100%);
                border: 3px solid #f74f58;
                box-shadow: 0 0 0 2px #ffffff, 0 5px 15px rgba(0, 60, 120, 0.5);
            }
            
            .price-pill.blue { 
                /* 修改这里: 135deg */
                background: linear-gradient(135deg, #7cf0fd 0%, #3fafe1 40%, #044bb5 100%);
                border: 3px solid #286de7;
                box-shadow: 0 0 0 2px #ffffff, 0 5px 15px rgba(0, 60, 120, 0.5);
            }

            /* --- Mobile Section 2 --- */
            .section-2 {
                background: #451707;
                padding: 0px 20px 15px 20px;
                position: relative;
            }

            .section-background {
                background: linear-gradient(180deg, #eb4648 0%, #9d0205 100%);
                padding: 5px 20px 20px 20px;
                border-radius: 15px;
            }

            .section-divider-title {
                color: rgba(255,255,255,0.9); text-align: center; font-size: 20px; font-weight: 700;
                margin-bottom: 10px;  margin-bottom: 7px;  display: flex; align-items: center; justify-content: center; gap: 10px;
                padding: 5px 0px;
            }
            .section-divider-title::before, .section-divider-title::after {
                content: ''; width: 30px; height: 2px; background: #ffefef;
            }

            /* --- 手机端 Gold Button 修改 --- */
            .gold-button {
                width: 90%; margin: 0 auto;
                background: linear-gradient(180deg, #ffe544 0%, #e13f16 100%);
                border: 3px solid #faeeb2; border-radius: 50px;
                color: #fff; font-size: 18px; font-weight: 700;
                text-shadow: 1px 1px 2px rgba(160, 80, 0, 0.8);
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                position: relative; z-index: 10; margin-bottom: -20px;

                /* 修改：强制垂直水平居中 & 统一上下边距 */
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 8px 0; /* 上下都是 8px */
                line-height: 1; /* 避免行高造成偏移 */
            }

            .prize-card {
                background: var(--card-bg); border-radius: 0px; padding: 30px 10px 10px 10px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            }
            .card-row {
                display: flex; justify-content: space-between; align-items: center;
                padding: 10px 0; border-bottom: 1px dashed #dcdcdc;
            }
            .card-row:last-child { border-bottom: none; }
            .label-group { flex: 1; }
            .label-cn { display: block; color: #6d1515; font-weight: 800; font-size: 14px; margin-bottom: 2px; }
            .label-en { display: block; color: #6d1515; font-size: 10px; opacity: 0.8; line-height: 1.2; }
            .value-pill {
                background-color: var(--pill-bg-pink); border-radius: 20px; padding: 6px 10px;
                min-width: 130px; text-align: center; color: #fe0000; font-weight: 800; font-size: 18px;
            }
            .value-pill.small-text { font-size: 16px; }

            /* --- Mobile Section 3 --- */
            .section-3 { 
                width: 100%;
                flex: 1; 
                padding: 20px 20px 40px 20px; 
            }

            .section-3-inner {
                width: 100%; 
                margin: 0 auto;
            }
            .info-header {
                color: #0c3c60; 
                font-size: 25px; 
                font-weight: 600; 
                padding-bottom: 6px;
                margin-bottom: 15px; 
                border-bottom: 3px solid #0c3c60; 
                letter-spacing: 0.5px;
            }
            .info-row { margin-bottom: 20px; }
            .info-label { 
                color: #0c3c60; 
                font-size: 20px; 
                font-weight: 600; 
                margin-bottom: 4px; 
                display: block;
            }
            .info-value { 
                color: #ff0000; 
                font-size: 27px; 
                font-weight: 800; 
                opacity: 0.9;
            }
            .divider-space { height: 10px; }
        }


        /* ==========================================================================
           DESKTOP STYLES (Min-Width: 481px)
        ========================================================================== */
        @media screen and (min-width: 481px) {
            
            .mobile-container {
                width: 52%; /* 模拟手机宽度 */
                max-width: 52%;
                background-color: #fff;
                box-shadow: 0 0 40px rgba(0,0,0,0.3);
                z-index: 2;
            }

            /* --- Desktop Section 1 --- */
            .section-1 {
                background-image: url("{{ asset('images/lucky_jackpot/luckyjackpot.jpg') }}");
                background-repeat: no-repeat;
                background-position: top center;
                
                /* --- 修改处 (Desktop) --- */
                /* 强制图片填满容器的宽和高，不留空白，不裁切 */
                background-size: 100% 100%; 
                
                background-color: #5c0808; 
                padding: 170px 40px 100px 40px;
                text-align: center;
                position: relative;
            }

            /* 新增：用于填充 top-logo 容器的图片样式 */
            .logo-image {
                width: 90%;
                height: 90%;
                object-fit: contain; /* 修改为 contain，确保完整的 logo 显示 */
                display: block;
            }
            
            /* 修改 .top-logo 以匹配截图中的 logo 样式和尺寸 */
            .top-logo {
                position: absolute; top: 15px; right: 15px;
                width: 150px; /* 增大尺寸 */
                height: 150px; /* 增大尺寸 */
                background: none; /* 移除背景 */
                border-radius: 0; /* 移除圆角 */
                border: none; /* 移除边框 */
                color: transparent; /* 文本颜色透明 */
                font-size: 0;      /* 字体大小为 0 */
                display: flex; align-items: center; justify-content: center;
                box-shadow: none; /* 移除阴影 */
                cursor: pointer;
                overflow: visible; /* 允许图片形状决定 */
                z-index: 20; /* 确保在顶部 */
            }

            /* --- Header 样式 (Desktop) --- */
            .header-cn {
                font-family: 'Nunito', sans-serif;
                color: #fff; 
                font-size: 58px;
                font-weight: 900; 
                line-height: 1.1;
                margin-bottom: 0px;
                -webkit-text-stroke: 10px var(--header-stroke-color);
                paint-order: stroke fill;
                text-shadow: 3px 3px 0px rgba(0,0,0,0.2);
                position: relative; z-index: 10;
            }
            
            .header-en {
                font-family: 'Nunito', sans-serif;
                color: #fff; 
                font-size: 42px; 
                font-weight: 800; 
                /* margin-bottom: 20px; */
                line-height: 1.1;
                -webkit-text-stroke: 10px var(--header-stroke-color);
                paint-order: stroke fill;
                position: relative; z-index: 10;
            }

            .main-jackpot {
                font-family: 'Nunito', sans-serif;
                font-size: 100px;
                font-weight: 900; 
                color: #ffffff;
                /* margin: 10px 0 40px 0; */
                letter-spacing: -2px;
                -webkit-text-stroke: 16px #0f6cd5;
                paint-order: stroke fill;
                text-shadow: 
                    0px 5px 0px #004a99, 
                    0px 10px 0px #003063, 
                    0px 15px 10px rgba(0,0,0,0.4);
                position: relative; z-index: 10;
                line-height: 1;
                padding: 10px 0;
            }

            /* --- pools-row --- */
            .pools-row { 
                background: linear-gradient(180deg, #eb4648 0%, #9f0407 100%);
                border-radius: 10px; 
                padding: 25px 25px 20px 25px; 
                display: flex; 
                gap: 10px; 
                justify-content: center; 
                box-shadow: inset 0 2px 5px rgba(0,0,0,0.2);
            }

            .pool-card {
                border-radius: 10px; 
                padding: 18px 6px;
                flex: 1; 
                box-shadow: 0 5px 10px rgba(0,0,0,0.2);
                display: flex; 
                flex-direction: column; 
                justify-content: space-between;
                transition: transform 0.2s;
            }
            .pool-card:hover { transform: translateY(-2px); }

            .pool-card.red {
                background: linear-gradient(180deg, #ffffff 60%, #ffd4d3 100%);
            }

            .pool-card.blue {
                background: linear-gradient(180deg, #ffffff 60%, #b4f0ff 100%);
            }

            .pool-title-cn { font-size: 32px; font-weight: 800; margin-bottom: 4px; }
            .pool-title-en { font-size: 32px; line-height: 1.1; margin-bottom: 8px; font-weight: 600; }
            .pool-card.red .pool-title-cn, .pool-card.red .pool-title-en { color: #d93025; }
            .pool-card.blue .pool-title-cn, .pool-card.blue .pool-title-en { color: #0056b3; }
            
            .price-pill {
                border-radius: 50px; 
                color: white; 
                font-weight: 800; 
                font-size: 35px;
                padding: 12px 4px; 
                width: 100%; 
                display: flex; 
                align-items: center; 
                justify-content: center; 
                text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            }
            
            .price-pill.red { 
                /* 修改这里: 135deg */
                background: linear-gradient(135deg, #ff7b9a 0%, #eb4c52 40%, #cd1203 100%);
                border: 4px solid #f74f58;
                box-shadow: 0 0 0 2px #ffffff, 0 5px 15px rgba(0, 60, 120, 0.5);
            }
            
            .price-pill.blue { 
                /* 修改这里: 135deg */
                background: linear-gradient(135deg, #7cf0fd 0%, #3fafe1 40%, #044bb5 100%);
                border: 4px solid #286de7;
                /* 
                    第一层：0偏移，2px扩散的纯白色
                    第二层：蓝色阴影
                */
                box-shadow: 0 0 0 2px #ffffff, 0 5px 15px rgba(0, 60, 120, 0.5);
            }

            /* --- Desktop Section 2 --- */
            .section-2 {
                background: #451707;
                padding: 0px 45px 30px 45px; /* 这里的 50px padding 是对齐的关键 */
                position: relative;
            }

            .section-background {
                background: linear-gradient(180deg, #eb4648 0%, #9d0205 100%);
                padding: 15px 40px 40px 40px;
                border-radius: 15px;
            }

            .section-divider-title {
                color: rgba(255,255,255,0.9); text-align: center; font-size: 40px; font-weight: 700;
                margin-bottom: 8px; display: flex; align-items: center; justify-content: center; gap: 20px;
                padding: 15px 0px;
            }
            .section-divider-title::before, .section-divider-title::after {
                content: ''; width: 70px; height: 2px; background: #ffefef;
            }

            /* --- 电脑端 Gold Button 修改 --- */
            .gold-button {
                width: 90%; margin: 0 auto;
                background: linear-gradient(180deg, #ffe544 0%, #e13f16 100%);
                border: 5px solid #faeeb2; border-radius: 50px;
                color: #fff; font-size: 42px; font-weight: 700;
                text-shadow: 1px 1px 2px rgba(160, 80, 0, 0.8);
                box-shadow: 0 5px 12px rgba(0,0,0,0.25);
                position: relative; z-index: 10; margin-bottom: -24px;
                cursor: pointer;

                /* 修改：强制垂直水平居中 & 统一上下边距 */
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 12px 0; /* 增加内边距并保持上下一致 */
                line-height: 1; /* 避免行高造成偏移 */
            }
            .gold-button:hover { filter: brightness(1.1); }

            .prize-card {
                background: var(--card-bg); border-radius: 0px; padding: 40px 20px 20px 20px;
                box-shadow: 0 6px 18px rgba(0,0,0,0.15);
            }
            .card-row {
                display: flex; justify-content: space-between; align-items: center;
                padding: 14px 0px 25px 0px; border-bottom: 1px dashed #dcdcdc;
            }
            .card-row:last-child { border-bottom: none; }
            .label-group { flex: 1; }
            .label-cn { display: block; color: #6d1515; font-weight: 800; font-size: 30px; margin-bottom: 3px; }
            .label-en { display: block; color: #6d1515; font-size: 21px; opacity: 0.8; line-height: 1.3; }
            .value-pill {
                background-color: var(--pill-bg-pink); border-radius: 30px; padding: 8px 18px;
                min-width: 320px; text-align: center; color: #fe0000; font-weight: 800; font-size: 30px;
            }
            .value-pill.small-text { font-size: 30px; min-width: 320px; }

            /* --- Desktop Section 3 --- */
            .section-3 { 
                width: 100%; 
                flex: 1;
                display: flex;
                justify-content: center; 
                padding: 30px 0 30px 0;
            }

            .section-3-inner {
                width: 52%;      /* 修改：宽度调整为 47%，与 mobile-container 一致 */
                max-width: 52%;
                /* 新增：增加 50px 的 padding，确保文字内容与 Section 2 内部内容左对齐 */
                /* padding: 0 50px;  */
            }
            .info-header {
                color: #0c3c60;
                font-size: 40px; 
                font-weight: 600; 
                padding-bottom: 8px;
                margin-bottom: 20px; 
                border-bottom: 5px solid #0c3c60;
                letter-spacing: 1px;
            }
            .info-row { margin-bottom: 30px; }
            .info-label { 
                color: #0c3c60;
                font-size: 30px; 
                font-weight: 600; 
                margin-bottom: 8px; 
                display: block;
            }
            .info-value { 
                color: #ff0000;
                font-size: 32px; 
                font-weight: 800; 
            }
            .divider-space { height: 20px; }

            /* [NEW] Desktop Back-to-Top Positioning */
            .back-to-top {
                bottom: 30px;
                right: 350px;
                width: 60px;
                height: 60px;
            }
            .back-to-top svg {
                width: 30px;
                height: 30px;
            }
        }

    </style>
</head>
<body>

    @foreach($jackpots as $jackpot)
        <!-- Section 1 & 2 Container -->
        <div class="mobile-container">
            <!-- SECTION 1 -->
            <section class="section-1">

                <!-- 新增/修改：右上角的 logo -->
                <div class="top-logo">
                    <!-- 请确保该路径指向您的 logo 图片 -->
                    <img src="{{ asset('images/lucky_jackpot/luckyjackpot_logo.png') }}" alt="Logo" class="logo-image">
                </div>
                
                <!-- <div class="header-cn">当前奖池金额</div> -->
                <div class="header-en">当前奖池金额 Current Prize Pool Amount</div>
                
                <div class="main-jackpot">USD{{ $jackpot->amount }}</div>

                <div class="pools-row">
                    <div class="pool-card red">
                        <div>
                            <div class="pool-title-cn">积宝金额</div>
                            <div class="pool-title-en">Jackpot pool amount</div>
                        </div>
                        <div class="price-pill red">USD{{ $jackpot->prize_value_today }}</div>
                    </div>
                    <div class="pool-card blue">
                        <div>
                            <div class="pool-title-cn">今日送出奖金</div>
                            <div class="pool-title-en">Bonus prize payout today</div>
                        </div>
                        <div class="price-pill blue">USD{{ $jackpot->prize_value_current }}</div>
                    </div>
                </div>
            </section>

            <!-- SECTION 2 -->
            <section class="section-2">
                <div class="section-background">
                    <div class="section-divider-title">{{ $jackpot->third_prize_title }}</div>
                    
                    <div class="gold-button">
                        {{ $jackpot->bonus_badge }}
                    </div>

                    <div class="prize-card">
                        <div class="card-row">
                            <div class="label-group">
                                <span class="label-cn">{{ $jackpot->detail_label_thai_1 }}<br>{{ $jackpot->detail_label_thai_2 }}</span>
                                <span class="label-en">N{{ $jackpot->detail_label_english_1 }}<br>{{ $jackpot->detail_label_english_2 }}</span>
                            </div>
                            <div class="value-pill">{{ $jackpot->detail_value_1 }}</div>
                        </div>

                        <div class="card-row">
                            <div class="label-group">
                                <span class="label-cn">中奖单位</span>
                                <span class="label-en">Winning units</span>
                            </div>
                            <div class="value-pill">{{ $jackpot->detail_value_2 }}</div>
                        </div>

                        <div class="card-row">
                            <div class="label-group">
                                <span class="label-cn">每单位获得</span>
                                <span class="label-en">Bonus won per unit</span>
                            </div>
                            <div class="value-pill small-text">USD {{ $jackpot->detail_value_3 }}</div>
                        </div>
                    </div>
                </div>
            </section>

        </div> <!-- mobile-container 结束 -->

        <!-- SECTION 3 (已对齐) -->
        <section class="section-3">
            <div class="section-3-inner">
                <div class="info-header">{{ $jackpot->section_title }}</div>

                @foreach($jackpotInformationZh as $info)
                    <div class="info-row">
                        <div class="info-label">{{ $info->summary_label_zh }}</div>
                        <div class="info-value">{{ $info->summary_value_zh }}</div>
                    </div>
                @endforeach

                <div class="divider-space"></div>

                <div class="info-header">{{ $jackpot->bonus_section_title }}</div>

                @foreach($jackpotInformationEn as $info)
                    <div class="info-row">
                        <div class="info-label">{{ $info->summary_label_en }}</div>
                        <div class="info-value">{{ $info->summary_value_en }}</div>
                    </div>
                @endforeach

            </div>
        </section>
    @endforeach

        <!-- [新增] 返回顶部按钮 (实心箭头, 红色主题) -->
    <button onclick="topFunction()" id="backToTopBtn" class="back-to-top" title="Go to top">
        <!-- 实心箭头 SVG (白色) -->
        <svg viewBox="0 0 24 24">
            <!-- 向上实心箭头的路径 -->
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