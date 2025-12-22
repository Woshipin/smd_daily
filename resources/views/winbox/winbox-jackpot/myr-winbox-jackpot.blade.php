<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>9 WINBOX Lotto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #ffffff;
            min-height: 100vh;
        }
        
        /* =========================================
           SECTION ONE (Mobile) - UPDATED DESIGN
           ========================================= */
        .section-one {
            padding: 60px 10px 30px 10px;
            width: 100%;
            min-height: 105vw; 
            background-image: url("{{ asset('images/winbox_jackpot/9_winbox.jpg') }}");  
            background-repeat: no-repeat;
            background-position: top center;
            background-size: 100% 100%; 
            position: relative;
            overflow: visible; 
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .top-logo-img {
            position: absolute;
            top: 20px;
            right: 15px;
            width: 80px; 
            height: auto;
            z-index: 20;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.3));
        }

        /* 标题部分 */
        .jackpot-title-group {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 5px;
            z-index: 5;
            position: relative;
            line-height: 1.1;
        }

        .jackpot-title-zh {
            font-family: 'Arial Black', "Microsoft YaHei", sans-serif;
            font-size: 34px;
            font-weight: 900;
            
            /* --- 颜色修改开始 --- */
            /* 1. 设置从上(白/米白) 到 下(金黄) 的渐变 */
            background: linear-gradient(180deg, #ffffff 20%, #ffc20e 100%);
            
            /* 2. 将背景裁剪为文字形状 */
            -webkit-background-clip: text;
            background-clip: text;
            
            /* 3. 将文字填充色设为透明，以便露出背景渐变 */
            -webkit-text-fill-color: transparent;
            color: transparent;
            /* --- 颜色修改结束 --- */

            /* 保持原有描边设计 (深褐色) */
            -webkit-text-stroke: 1px #5c2804; 
            
            /* 确保描边在填充的后面 (关键属性) */
            paint-order: stroke fill;
            
            /* 立体投影 */
            filter: drop-shadow(0 3px 0 #5c2804);
            margin-bottom: 5px;
        }

        .jackpot-title-en {
            font-family: 'Arial Black', sans-serif;
            font-size: 24px;
            font-weight: 900;

            /* --- 颜色修改开始 (同上) --- */
            background: linear-gradient(180deg, #ffffff 20%, #ffc20e 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
            /* --- 颜色修改结束 --- */

            /* 保持原有描边 */
            -webkit-text-stroke: 1px #5c2804;
            paint-order: stroke fill;
            filter: drop-shadow(0 3px 0 #5c2804);
        }

        /* 主金额 */
        .main-jackpot-display {
            display: flex;
            align-items: baseline;
            justify-content: center;
            margin-top: 5px;
            margin-bottom: 20px;
            z-index: 5;
            position: relative;
            filter: drop-shadow(0 0 15px rgba(255, 200, 0, 0.6));
        }

        .main-rm-label {
            font-family: 'Arial Black', sans-serif;
            font-style: italic;
            font-size: 30px;
            font-weight: 900;
            color: #ffffff;
            -webkit-text-stroke: 6px #280055; 
            paint-order: stroke fill;
            margin-right: 5px;
        }

        .main-amount-value {
            font-family: 'Arial Black', sans-serif;
            font-size: 50px;
            font-weight: 900;
            color: #ffffff;
            -webkit-text-stroke: 9px #280055;
            paint-order: stroke fill;
            letter-spacing: -1px;
        }

        /* ========================
           信封卡片区域
           ======================== */
        .envelope-grid {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            width: 100%;
            max-width: 600px;
            position: relative;
            z-index: 10;
        }

        .envelope-item {
            position: relative;
            width: 48%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* 
           ================================================
           [UPDATED] 白纸 (Ticket) 样式修改 
           ================================================
        */
        .envelope-ticket {
            width: 90%;
            height: 85px;
            
            /* 左右缺口 */
            background: 
                radial-gradient(circle at 0 30%, transparent 9px, #ffffff 9px) top left, 
                radial-gradient(circle at 100% 30%, transparent 9px, #ffffff 9px) top right;
            background-size: 51% 100%;
            background-repeat: no-repeat;
            
            border-radius: 10px 10px 0 0;
            /* 调整 padding 让文字居中更好看 */
            padding: 5px 2px 0 2px; 
            text-align: center;
            box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1; 
            margin-bottom: -17px;
        }

        /* RM 标签样式 (复刻图中褐色/铜色效果) */
        .ticket-currency {
            font-family: 'Arial Black', sans-serif; /* 加粗字体 */
            color: #b05b00; /* 截图中的深褐色/铜色 */
            font-weight: 900;
            font-size: 17px; /*稍微调大 */
            /* margin-bottom: -2px; */
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            
            /* 细微的白色描边让它在白底上更清晰 */
            -webkit-text-stroke: 0px; 
            text-shadow: 0px 1px 1px rgba(0,0,0,0.1); 
        }
        
        /* 
           数字样式 (复刻图中立体描边阴影效果) 
           关键技术：paint-order: stroke fill (确保描边不吃掉字重) + drop-shadow
        */
        .ticket-value {
            font-family: 'Arial Black', sans-serif;
            /* font-size: 24px;  */
            font-weight: 900;
            /* line-height: 1.1; */
            
            /* 1. 设置很粗的白色描边 */
            -webkit-text-stroke: 6px #ffffff; 
            
            /* 2. 确保填充色在描边之上 (不让描边把字变细) */
            paint-order: stroke fill;
            
            /* 3. 使用 drop-shadow 给整个形状(包括描边)加投影，制造立体感 */
            position: relative;
            z-index: 2;
        }

        /* 橙色主题数字 (亮橙色填充 + 橙色光晕) */
        .orange-theme .ticket-value { 
            color: #ff7e00; 
            filter: drop-shadow(0 2px 3px rgba(255, 126, 0, 0.4));
        } 

        /* 蓝色主题数字 (亮蓝色填充 + 蓝色光晕) */
        .blue-theme .ticket-value { 
            color: #1e88e5; 
            filter: drop-shadow(0 2px 3px rgba(30, 136, 229, 0.4));
        }   

        /* ========================
           信封口袋 (Pocket)
           ======================== */
        .envelope-pocket {
            width: 100%;
            /* padding: 25px 5px 15px 5px;  */
            border-radius: 12px;
            position: relative;
            z-index: 2; 
            text-align: center;
            box-shadow: 0 5px 10px rgba(0,0,0,0.25), inset 0 1px 0 rgba(255,255,255,0.4);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 75px;
        }

        .envelope-pocket.orange-bg {
            background: linear-gradient(180deg, #ffd659 0%, #ffaa00 50%, #f07e05 100%);
        }

        .envelope-pocket.blue-bg {
            background: linear-gradient(180deg, #8cd1ff 0%, #4facfe 50%, #0072ff 100%);
        }

        .pocket-text-zh {
            font-size: 18px;
            color: #ffffff;
            font-weight: bold;
            text-shadow: 0px 2px 2px rgba(160, 80, 0, 0.5), 0 0 2px #b85c00; 
            margin-bottom: 3px;
            line-height: 1.2;
        }
        
        .blue-bg .pocket-text-zh {
             text-shadow: 0px 2px 2px rgba(0, 80, 160, 0.5), 0 0 2px #004e9e;
        }

        .pocket-text-en {
            font-family: 'Arial Narrow', Arial, sans-serif;
            font-size: 15px;
            color: #ffffff;
            font-weight: 700;
            line-height: 1;
            -webkit-text-stroke: 2.5px #c46600; 
            paint-order: stroke fill;
        }
        
        .blue-bg .pocket-text-en {
            -webkit-text-stroke: 2.5px #0056b3;
        }


        /* =========================================
           SECTION TWO & THREE
           ========================================= */
        .section-two {
            background: linear-gradient(135deg, #7130b0 0%, #78379b 100%);
            padding: 20px 10px;
        }

        .third-prize-section {
            border-radius: 25px;
            background: linear-gradient(180deg, #feac55 0%, #f5954a 50%, #e9763d 100%);
            padding: 1px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.4);
            position: relative;
            overflow: visible;
        }

        .third-prize-header { 
            width: 90%;
            margin: -40px auto 0 auto;
            position: relative;
            z-index: 5;
            text-align: center;
            background-color: #ffffff;
            padding: 8px; 
            border-radius: 16px;
            box-shadow: 0 6px 0 #d9d9d9, 0 15px 20px rgba(0,0,0,0.4);
        }

        .third-prize-title { 
            background: linear-gradient(180deg, #fa6d64 0%, #e04b45 40%, #c4322c 100%);
            padding: 5px 0;
            border-radius: 10px;
            font-family: 'Arial Black', sans-serif;
            font-size: 24px;
            color: #ffffff;
            font-weight: 900;
            -webkit-text-stroke: 4px #7a1e17; 
            paint-order: stroke fill;
            filter: drop-shadow(0 2px 0px rgba(0,0,0,0.3));
            box-shadow: inset 0 2px 0 rgba(255,255,255,0.4), 0 5px 0 #921d18, 0 8px 5px rgba(0,0,0,0.3); 
            position: relative;
            top: -2px;
        }

        .third-prize-content { border-radius: 20px; padding: 15px 20px 25px 20px; background: linear-gradient(180deg, #fef9f3 0%, #fef5eb 100%); margin-top: 20px; }
        
        .bonus-badge { 
            padding: 12px 25px; 
            font-size: 19px; 
            margin: 0 auto 10px auto; 
            background: linear-gradient(180deg, #ff7978 0%, #f76869 50%, #ec5250 100%); 
            color: #fff; 
            border-radius: 35px; 
            display: block; 
            font-weight: bold; 
            box-shadow: 0 5px 18px rgba(255,107,122,0.4); 
            border: 3px solid rgba(255,255,255,0.5); 
            width: 100%; 
            max-width: 303px; 
            text-align: center;
        }
        
        .detail-row { flex-direction: row; justify-content: space-between; align-items: center; padding: 10px 0; display: flex; border-bottom: 2px dashed #f0d0b0;}
        .detail-row:last-child { border-bottom: none; padding-bottom: 0; }
        .detail-labels { flex: 1; }
        .detail-label-thai, .detail-label-english { font-size: 13px; color: #a52a2a; font-weight: bold; line-height: 1.3; }
        .detail-label-english { color: #7d5c4d; margin-top: 3px; }
        .detail-value { padding: 10px 10px; font-size: 17px; min-width: 120px; text-align: center; display: flex; align-items: center; justify-content: center; flex-shrink: 0; background: linear-gradient(135deg, #fff 0%, #fffaf5 100%); border-radius: 20px; font-weight: bold; color: #f12a2c; box-shadow: 0 4px 15px rgba(230,57,70,0.15); border: 2px solid rgba(230,57,70,0.1); }

        .summary-section { margin-top: 20px; margin-bottom: 20px; }
        .section-title, .bonus-section-title { color: #0c3c60; font-family: 'Arial', sans-serif; font-weight: bold; font-size: 25px; border-bottom: 3px solid #0c3c60; padding-bottom: 15px; margin-bottom: 15px; }
        .bonus-section-title { margin-top: 40px; }
        .summary-item { margin-bottom: 30px; }
        .summary-item:last-child { margin-bottom: 0; }
        .summary-label { color: #0c3c60; font-size: 25px; font-weight: bold; display: flex; align-items: center; }
        .summary-value { color: red; font-size: 30px; font-weight: bold; margin-top: 8px; }
        .icon-8ball { display: inline-flex; width: 30px; height: 30px; background-color: #333; color: white; border-radius: 50%; align-items: center; justify-content: center; font-weight: bold; font-size: 20px; margin-right: 10px; border: 1px solid #fff; flex-shrink: 0; }

        .section-three { margin-top: 0; padding: 0 10px 20px 10px; }

        /* =========================================
           [IMPROVED] BACK TO TOP BUTTON
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
            
            /* Theme Color: Purple Gradient (Matches Screenshot) */
            background: linear-gradient(135deg, #9b51e0 0%, #5c2804 0%, #7130b0 0%, #521d8c 100%);
            box-shadow: 0 6px 15px rgba(113, 48, 176, 0.5), inset 0 1px 0 rgba(255,255,255,0.3);
            
            /* Flex for centering the SVG */
            display: flex; 
            align-items: center;
            justify-content: center;
            
            /* [NEW] Visibility Animation */
            opacity: 0;           /* เริ่มต้นด้วยการซ่อน (透明) */
            visibility: hidden;   /* เริ่มต้นกดไม่ได้ */
            transform: translateY(20px); /* เลื่อนลงไปนิดหน่อย */
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Animation นุ่มนวล */
        }

        /* Show Class: เมื่อมี class นี้ ปุ่มจะปรากฏขึ้น */
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            transform: translateY(-3px) scale(1.05);
            background: linear-gradient(135deg, #a569e0 0%, #6323a6 100%);
            box-shadow: 0 8px 20px rgba(113, 48, 176, 0.7);
        }

        /* The SVG Icon Style - Solid White Arrow */
        .back-to-top svg {
            width: 24px;
            height: 24px;
            fill: #ffffff; 
            filter: drop-shadow(0 2px 1px rgba(0,0,0,0.2));
        }

        /* =========================================
           DESKTOP VIEW STYLES
           ========================================= */
        @media (min-width: 769px) {
            body { background: #ffffff; }
            .page-wrapper { max-width: 45%; margin: 0 auto; }

            .section-one {
                padding: 120px 20px 40px 20px;
                min-height: 800px;
                background-position: center top;
            }

            .section-two { padding: 30px 10px; }
            .section-three { margin-top: 0; padding: 0 10px 30px 10px; }
    
            .top-logo-img { width: 160px; top: 30px; right: 30px; }

            .jackpot-title-zh { font-size: 65px; -webkit-text-stroke: 2px #5c2804;  filter: drop-shadow(0 5px 0 #5c2804); margin-bottom: 10px;}
            .jackpot-title-en { font-size: 50px; -webkit-text-stroke: 2px #5c2804; filter: drop-shadow(0 5px 0 #5c2804); }

            .main-rm-label { font-size: 60px; -webkit-text-stroke: 10px #280055; margin-right: 15px; }
            .main-amount-value { font-size: 110px; -webkit-text-stroke: 15px #280055; }
    
            .envelope-grid { 
                gap: 30px;
                margin-top: 20px;
                max-width: 90%;
            }
            
            .envelope-ticket {
                width: 90%;
                height: 135px;
                /* padding-top: 20px; */
                /* margin-bottom: -60px; */
                background: 
                    radial-gradient(circle at 0 30%, transparent 12px, #ffffff 12.5px) top left, 
                    radial-gradient(circle at 100% 30%, transparent 12px, #ffffff 12.5px) top right;
                background-size: 51% 100%;
                background-repeat: no-repeat;
            }
            
            /* Desktop Ticket Font Adjustments */
            .ticket-currency { font-size: 30px; margin-bottom: 5px; }
            .ticket-value { font-size: 43px; -webkit-text-stroke: 10px #ffffff; }

            .envelope-pocket { 
                /* padding: 40px 10px 30px 10px;  */
                border-radius: 20px; 
                min-height: 120px;
            }

            .pocket-text-zh { font-size: 35px;  margin-bottom: 8px; }
            .pocket-text-en { font-size: 25px; -webkit-text-stroke: 6px #c46600; }
            .blue-bg .pocket-text-en { -webkit-text-stroke: 6px #0056b3; }
            

            .third-prize-section { border-radius: 35px; margin-bottom: 0; padding: 1px;}
            .third-prize-header { 
                width: 85%;
                margin: -50px auto 0 auto;
                padding: 10px; 
                border-radius: 20px;
                box-shadow: 0 8px 0 #d9d9d9, 0 15px 30px rgba(0,0,0,0.5);
            }
            
            .third-prize-title { 
                font-size: 38px; 
                padding: 10px 0;
                border-radius: 14px;
                -webkit-text-stroke: 6px #7a1e17; 
                box-shadow: inset 0 3px 0 rgba(255,255,255,0.4), 0 8px 0 #921d18, 0 10px 8px rgba(0,0,0,0.3);
            }

            .third-prize-content { border-radius: 28px; padding: 15px 35px 35px 35px; margin-top: 30px; }
            
            .bonus-badge { padding: 15px 35px; font-size: 40px; width: 100%; max-width: 690px; }
            
            .detail-row { padding: 18px 0; }
            .detail-label-thai, .detail-label-english { font-size: 28px; }
            .detail-value { font-size: 28px; width: 250px; min-width: 250px; padding: 15px 35px; border-radius: 30px;}
            .summary-section { margin-top: 40px; }
            .section-title, .bonus-section-title { font-size: 35px; }
            .summary-label { font-size: 35px; }
            .summary-value { font-size: 35px; color: red; }

            /* Desktop Back-to-Top Positioning */
            .back-to-top {
                bottom: 50px;
                right: 400px;
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

<div class="page-wrapper">

    @foreach($jackpots as $jackpot)
        
        <!-- Section 1 -->
        <div class="section-one">
            
            <img src="{{ asset('images/maintain/9_winbox.logo.png') }}" class="top-logo-img" alt="Winbox Logo">

            <div class="jackpot-title-group">
                <div class="jackpot-title-zh">积宝金额</div>
                <div class="jackpot-title-en">Jackpot Pool Amount</div>
            </div>

            <div class="main-jackpot-display">
                <span class="main-rm-label">RM</span>
                <span class="main-amount-value">{{ $jackpot->amount }}</span>
            </div>

            <div class="envelope-grid">
                
                <!-- 橙色信封 -->
                <div class="envelope-item orange-theme">
                    <div class="envelope-ticket">
                        <span class="ticket-currency">RM</span>
                        <div class="ticket-value">{{ $jackpot->prize_value_today }}</div>
                    </div>
                    <div class="envelope-pocket orange-bg">
                        <div class="pocket-text-zh">今日送出奖金</div>
                        <div class="pocket-text-en">Bonus Prize Payout Today</div>
                    </div>
                </div>

                <!-- 蓝色信封 -->
                <div class="envelope-item blue-theme">
                    <div class="envelope-ticket">
                        <span class="ticket-currency">RM</span>
                        <div class="ticket-value">{{ $jackpot->prize_value_current }}</div>
                    </div>
                    <div class="envelope-pocket blue-bg">
                        <div class="pocket-text-zh">当前奖池金额</div>
                        <div class="pocket-text-en">Current Prize Pool Amount</div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Section 2 -->
        <div class="section-two">
            <div class="third-prize-section">
                <div class="third-prize-header">
                    <div class="third-prize-title">{{ $jackpot->third_prize_title }}</div>
                </div>
                
                <div class="third-prize-content">
                    <div class="bonus-badge">{{ $jackpot->bonus_badge }}</div>
                    
                    <div class="detail-row">
                        <div class="detail-labels">
                            <div class="detail-label-thai">{{ $jackpot->detail_label_thai_1 }}</div>
                            <div class="detail-label-thai">{{ $jackpot->detail_label_thai_2 }}</div>
                            <div class="detail-label-english">{{ $jackpot->detail_label_english_1 }}</div>
                            <div class="detail-label-english">{{ $jackpot->detail_label_english_2 }}</div>
                        </div>
                        <div class="detail-value">{{ $jackpot->detail_value_1 }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-labels">
                            <div class="detail-label-thai">中奖名额</div>
                            <div class="detail-label-english">Winning Units</div>
                        </div>
                        <div class="detail-value">{{ $jackpot->detail_value_2 }}</div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-labels">
                            <div class="detail-label-thai">每单位获得</div>
                            <div class="detail-label-english">Bonus Won Per Unit</div>
                        </div>
                        <div class="detail-value">RM {{ $jackpot->detail_value_3 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="section-three">
            <div class="summary-section">
                <div class="section-title">{{ $jackpot->section_title }}</div>
                
                @foreach($jackpotInformationZh as $info)
                    <div class="summary-item">
                        <span class="icon-8ball">8</span><br>
                        <div class="summary-label">{{ $info->summary_label_zh }}</div>
                        <div class="summary-value">{{ $info->summary_value_zh }}</div>
                    </div>
                @endforeach
                
                <div class="bonus-section-title">{{ $jackpot->bonus_section_title }}</div>
                
                @foreach($jackpotInformationEn as $info)
                    <div class="summary-item">
                        <span class="icon-8ball">8</span><br>
                        <div class="summary-label">{{ $info->summary_label_en }}</div>
                        <div class="summary-value">{{ $info->summary_value_en }}</div>
                    </div>
                @endforeach

            </div>
        </div>
    @endforeach

</div>

<!-- [新增] 返回顶部按钮 (实心箭头, 紫色主题) -->
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